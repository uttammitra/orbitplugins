<?php
/**
 * Plugin class logic goes here
 */
class exitpopup{

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

	private $comingsoon_rendered = false;

	function __construct(){

			extract(exitpopup_settings());

          
          
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_popup_ins() {

        // If the single instance hasn't been set, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Get pages and put in assoc array
     */
    function get_pages(){
        $pages = get_pages();
        $page_arr = array();
        if(is_array($pages)){
            foreach($pages as $k=>$v){
                $page_arr[$v->ID] = $v->post_title;
            }
        }
        return $page_arr;
    }

    /**
     * Display admin bar when active
     */
    function admin_bar_menu($str){
        global $exitpopup_settings,$wp_admin_bar;
        extract($exitpopup_settings);

        if(!isset($status)){
            return false;
        }

        $msg = '';
        if($status == '1'){
        	$msg = __('Exit POPUP Mode Active','exitpopup');
        }
    	//Add the main siteadmin menu item
      
    }

    /**
     * Display the default template
     */
    function get_default_template(){
        $file = file_get_contents(exitpopup_PLUGIN_PATH.'/themes/default/index.php');
        return $file;
    }

	/**
     * Get Font Family
     */
    public static function get_font_family($font){
        $fonts                    = array();
        $fonts['_arial']          = 'Helvetica, Arial, sans-serif';
        $fonts['_arial_black']    = 'Arial Black, Arial Black, Gadget, sans-serif';
        $fonts['_georgia']        = 'Georgia,serif';
        $fonts['_helvetica_neue'] = '"Helvetica Neue", Helvetica, Arial, sans-serif';
        $fonts['_impact']         = 'Charcoal,Impact,sans-serif';
        $fonts['_lucida']         = 'Lucida Grande,Lucida Sans Unicode, sans-serif';
        $fonts['_palatino']       = 'Palatino,Palatino Linotype, Book Antiqua, serif';
        $fonts['_tahoma']         = 'Geneva,Tahoma,sans-serif';
        $fonts['_times']          = 'Times,Times New Roman, serif';
        $fonts['_trebuchet']      = 'Trebuchet MS, sans-serif';
        $fonts['_verdana']        = 'Verdana, Geneva, sans-serif';

        if(!empty($fonts[$font])){
            $font_family = $fonts[$font];
        }else{
            $font_family = 'Helvetica Neue, Arial, sans-serif';
        }

        echo $font_family;
    }


    /**
     * Display the Exit POPUP page
     */
    function render_comingsoon_page() {

    	extract(exitpopup_settings());

        if(!isset($status)){
            $err =  new WP_Error('error', __("Please enter your settings.", 'exitpopup'));
            echo $err->get_error_message();
            exit();
        }


        if(empty($_GET['cs_preview'])){
            $_GET['cs_preview'] = false;
        }

        // Check if Preview
        $is_preview = false;
        if ((isset($_GET['cs_preview']) && $_GET['cs_preview'] == 'true')) {
            $is_preview = true;
        }

        // Exit if a custom login page
        if(empty($disable_default_excluded_urls)){
            if(preg_match("/login|admin|dashboard|account/i",$_SERVER['REQUEST_URI']) > 0 && $is_preview == false){
                return false;
            }
        }


        // Check if user is logged in.
        if($is_preview === false){
            if(is_user_logged_in()){
                return false;
            }
        }


        // Finally check if we should show the Exit POPUP page.
        $this->comingsoon_rendered = true;

        // set headers
        if($status == '2'){
            header('HTTP/1.1 503 Service Temporarily Unavailable');
            header('Status: 503 Service Temporarily Unavailable');
            header('Retry-After: 86400'); // retry in a day
            $exitpopup_maintenance_file = WP_CONTENT_DIR."/maintenance.php";
            if(!empty($enable_maintenance_php) and file_exists($exitpopup_maintenance_file)){
                include_once( $exitpopup_maintenance_file );
                exit();
            }
        }

        // render template tags

        $template = $this->get_default_template();
        require_once( exitpopup_PLUGIN_PATH.'/themes/default/functions.php' );
        $template_tags = array(
            '{Title}' => exitpopup_title(),
            '{MetaDescription}' => exitpopup_metadescription(),
            '{Privacy}' => exitpopup_privacy(),
            '{Favicon}' => exitpopup_favicon(),
            '{CustomCSS}' => exitpopup_customcss(),
            '{Head}' => exitpopup_head(),
            '{Footer}' => exitpopup_footer(),
            '{Logo}' => exitpopup_logo(),
            '{Headline}' => exitpopup_headline(),
            '{Description}' => exitpopup_description(),
            '{Credit}' => exitpopup_credit(),
            );
		echo strtr($template, $template_tags);
        exit();

    }

}
