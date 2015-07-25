<?php
/**
 * Config
 *
 * @package WordPress
 * @subpackage exitpopup
 * @since 0.1.0
 */

/**
 * Config Settings
 */
function exitpopup_get_options(){

    /**
     * Create new menus
     */

    $exitpopup_options[ ] = array(
        "type" => "menu",
        "menu_type" => "add_options_page",
        "page_name" => __( "Exit POPUP", 'exitpopup' ),
        "menu_slug" => "exitpopup",
        "layout" => "2-col"
    );

    /**
     * Settings Tab
     */
    $exitpopup_options[ ] = array(
        "type" => "tab",
        "id" => "exitpopup_setting",
        "label" => __( "POPUP Settings", 'exitpopup' ),
    );

    $exitpopup_options[ ] = array(
        "type" => "setting",
        "id" => "exitpopup_settings_content",
    );

    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_general",
        "label" => __( "General", 'exitpopup' ),
    );

    $exitpopup_options[ ] = array(
        "type" => "radio",
        "id" => "status",
        "label" => __( "Status", 'exitpopup' ),
        "option_values" => array(
            '0' => __( 'Inactive', 'exitpopup' ),
            '1' => __( 'Enable Exit POPUP Global', 'exitpopup' ),
            '2' => __( 'Enable Exit POPUP Individual Page/Post', 'exitpopup' )
        ),      
        "default_value" => "0"
    );


    // Page Setttings
    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_page_settings",
        "label" => __( "Page Settings", 'exitpopup' )
    );

    $exitpopup_options[ ] = array(
        "type" => "upload",
        "id" => "logo",
        "label" => __( "Logo", 'exitpopup' ),
        "desc" => __('Upload a logo or teaser image (or) enter the url to your image.', 'exitpopup'),
    );

    $exitpopup_options[ ] = array(
        "type" => "textbox",
        "id" => "headline",
        "class" => "large-text",
        "label" => __( "Headline", 'exitpopup' ),
        "desc" => __( "Enter a headline for your page.", 'exitpopup' ),
    );

    $exitpopup_options[ ] = array(
        "type" => "wpeditor",
        "id" => "description",
        "label" => __( "Message", 'exitpopup' ),
        "desc" => __( "Tell the visitor what to expect from your site.", 'exitpopup' ),
        "class" => "large-text"
    );

     $exitpopup_options[ ] = array( "type" => "radio",
        "id" => "footer_credit",
        "label" => __("Powered By exitpopup", 'ultimate-exitpopup-page'),
        "option_values" => array('0'=>__('Nope - Got No Love', 'exitpopup'),'1'=>__('Yep - I Love You Man', 'exitpopup')),
        "desc" => __("Can we show a <strong>cool stylish</strong> footer credit at the bottom the page.", 'exitpopup'),
        "default_value" => "0",
    );


    // Header
    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_header",
        "label" => __( "Header", 'exitpopup' )
    );

    $exitpopup_options[ ] = array(
        "type" => "upload",
        "id" => "favicon",
        "label" => __( "Favicon", 'exitpopup' ),
        "desc" => __('Favicons are displayed in a browser tab. Need Help <a href="http://tools.dynamicdrive.com/favicon/" target="_blank">creating a favicon</a>?', 'exitpopup'),
    );

    $exitpopup_options[ ] = array(
        "type" => "textbox",
        "id" => "seo_title",
        "label" => __( "SEO Title", 'exitpopup' ),
    );

    $exitpopup_options[ ] = array(
        "type" => "textarea",
        "id" => "seo_description",
        "label" => __( "SEO Meta Description", 'exitpopup' ),
        "class" => "large-text"
    );


    $exitpopup_options[ ] = array(
        "type" => "textarea",
        "id" => "ga_analytics",
        "class" => "large-text",
        "label" => __( "Analytics Code", 'exitpopup' ),
        "desc" => __('Paste in your Universal or Classic <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a> code.', 'exitpopup'),
    );


 
  

    // Background
    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_background",
        "label" => __( "Background", 'exitpopup' )
    );


    $exitpopup_options[ ] = array(
        "type" => "color",
        "id" => "bg_color",
        "label" => __( "Background Color", 'exitpopup' ),
        "default_value" => "#fafafa",
        "validate" => 'color',
        "desc" => __( "Choose between having a solid color background or uploading an image. By default images will cover the entire background.", 'exitpopup' )
    );


    $exitpopup_options[ ] = array(
        "type" => "upload",
        "id" => "bg_image",
        "desc" => "",
        "label" => __( "Background Image", 'exitpopup' ),
    );

    $exitpopup_options[ ] = array(
        "type" => "checkbox",
        "id" => "bg_cover",
        "label" => __( "Responsive Background", 'exitpopup' ),
        "desc" => __("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area.", 'exitpopup'),
        "option_values" => array(
             '1' => __( 'Yes', 'exitpopup' ),
        ),
        "default" => "1",
    );

    $exitpopup_options[ ] = array(
        "type" => "select",
        "id" => "bg_repeat",
        "desc" => __('This setting is not applied if Responsive Background is checked', 'exitpopup' ),
        "label" => __( "Background Repeat", 'exitpopup' ),
        "option_values" => array(
            'no-repeat' => __( 'No-Repeat', 'exitpopup' ),
            'repeat' => __( 'Tile', 'exitpopup' ),
            'repeat-x' => __( 'Tile Horizontally', 'exitpopup' ),
            'repeat-y' => __( 'Tile Vertically', 'exitpopup' ),
        )
    );


    $exitpopup_options[ ] = array(
        "type" => "select",
        "id" => "bg_position",
        "desc" => __('This setting is not applied if Responsive Background is checked', 'exitpopup' ),
        "label" => __( "Background Position", 'exitpopup' ),
        "option_values" => array(
            'left top' => __( 'Left Top', 'exitpopup' ),
            'left center' => __( 'Left Center', 'exitpopup' ),
            'left bottom' => __( 'Left Bottom', 'exitpopup' ),
            'right top' => __( 'Right Top', 'exitpopup' ),
            'right center' => __( 'Right Center', 'exitpopup' ),
            'right bottom' => __( 'Right Bottom', 'exitpopup' ),
            'center top' => __( 'Center Top', 'exitpopup' ),
            'center center' => __( 'Center Center', 'exitpopup' ),
            'center bottom' => __( 'Center Bottom', 'exitpopup' ),
        )
    );

    $exitpopup_options[ ] = array(
        "type" => "select",
        "id" => "bg_attahcment",
        "desc" => __('This setting is not applied if Responsive Background is checked', 'exitpopup' ),
        "label" => __( "Background Attachment", 'exitpopup' ),
        "option_values" => array(
            'fixed' => __( 'Fixed', 'exitpopup' ),
            'scroll' => __( 'Scroll', 'exitpopup' ),
        )
    );

    // Background
    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_well",
        "label" => __( "Content", 'exitpopup' )
    );

    $exitpopup_options[ ] = array(
        "type" => "textbox",
        "id" => "max_width",
        "class" => "text-small",
        "label" => __( "Max Width", 'exitpopup' ),
        "desc" => __("By default the max width of the content is set to 600px. Enter a number value if you need it bigger. Example: 900", 'exitpopup'),    );

    $exitpopup_options[ ] = array(
        "type" => "checkbox",
        "id" => "enable_well",
        "label" => __( "Enable Well", 'exitpopup' ),
        "desc" => __("This will wrap your content in a box.", 'exitpopup'),
        "option_values" => array(
             '1' => __( 'Yes', 'exitpopup' ),
        ),
    );



    // Text
    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_text",
        "label" => __( "Text", 'exitpopup' )
    );

    $exitpopup_options[ ] = array(
        "type" => "color",
        "id" => "text_color",
        "label" => __( "Text Color", 'exitpopup' ),
        "default_value" => "#666666",
        "validate" => 'required,color',
    );

    $exitpopup_options[ ] = array(
        "type" => "color",
        "id" => "link_color",
        "label" => __( "Link Color", 'exitpopup' ),
        "default_value" => "#27AE60",
        "validate" => 'required,color',
    );

    $exitpopup_options[ ] = array(
        "type" => "color",
        "id" => "headline_color",
        "label" => __( "Headline Color", 'exitpopup' ),
        "validate" => 'color',
        "default_value" => "#444444",
        "desc" => __('If no Headline Color is chosen then the Link Color will be used. ','exitpopup'),
    );



    $exitpopup_options[ ] = array(
        "type" => "select",
        "id" => "text_font",
        "label" => __( "Text Font", 'exitpopup' ),
        "option_values" => apply_filters('exitpopup_fonts',array(
            '_arial'     => 'Arial',
            '_arial_black' =>'Arial Black',
            '_georgia'   => 'Georgia',
            '_helvetica_neue' => 'Helvetica Neue',
            '_impact' => 'Impact',
            '_lucida' => 'Lucida Grande',
            '_palatino'  => 'Palatino',
            '_tahoma'    => 'Tahoma',
            '_times'     => 'Times New Roman',
            '_trebuchet' => 'Trebuchet',
            '_verdana'   => 'Verdana',
            )),
    );


    // Template
    $exitpopup_options[ ] = array(
        "type" => "section",
        "id" => "exitpopup_section_template",
        "label" => __( "Template", 'exitpopup' )
    );


    $exitpopup_options[ ] = array(
        "type" => "textarea",
        "id" => "custom_css",
        "class" => "large-text",
        "label" => __( "Custom CSS", 'exitpopup' ),
        "desc" => __('Need to tweaks the styles? Add your custom CSS here.','exitpopup'),
    );

   return $exitpopup_options;

}
