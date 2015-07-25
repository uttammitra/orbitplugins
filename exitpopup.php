<?php
/*
Plugin Name: Exit Popup
Plugin URI: http://squaretrix.com
Version: 1.0
Author: Uttam Mitra
Author Email: mitra.uttam@gmail.com
Description: Exit Popups are the best way to engage visitors leaving your website. Show offers, social buttons, email signup forms or customize it as you like.
*/

/**
 * Default Constants
 */
define( 'exitpopup_SHORTNAME', 'exitpopup' ); // Used to reference namespace functions.
define( 'exitpopup_SLUG', 'exitpopup/exitpopup.php' ); // Used for settings link.
define( 'exitpopup_TEXTDOMAIN', 'exitpopup' ); // Your textdomain
define( 'exitpopup_PLUGIN_NAME', __( 'Exit POPUP', 'exitpopup' ) ); // Plugin Name shows up on the admin settings screen.
define( 'exitpopup_VERSION', '1.0.1'); // Plugin Version Number.
define( 'exitpopup_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'exitpopup_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); 

// Global
global $exitpopup_settings;

require_once( 'cms/exitpopup-settings.php' );
$exitpopup_settings = exitpopup_settings();

require_once( 'include/class-exitpopup.php' );
add_action( 'plugins_loaded', array( 'exitpopup', 'get_popup_ins' ) );


function exitpopup_installtion(){
	require_once( 'include/default-settings.php' );
	add_option('exitpopup_settings_content',unserialize($exitpopup_settings_deafults['exitpopup_settings_content']));
	add_option('exitpopup_settings_design',unserialize($exitpopup_settings_deafults['exitpopup_settings_design']));
	
}
register_activation_hook( __FILE__, 'exitpopup_installtion' );



if( is_admin() ) {
// Admin Only
	require_once( 'include/config-settings.php' );
    require_once( 'cms/framework.php' );
    add_action( 'plugins_loaded', array( 'exitpopup_ADMIN', 'get_instance' ) );
} else {
// Public only

exitpopupcore();

}
