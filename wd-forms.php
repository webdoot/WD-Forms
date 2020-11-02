<?php

/**
 * Plugin Name:       WD-Forms
 * Plugin URI:        https://github.com/webdoot/wd-forms
 * Description:       WD Forms is a general developer form creator wordpress plugin.
 * Version:           1.0.0
 * Author:            WEBDOOT
 * Author URI:        https://github.com/webdoot
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wd-forms
 * Domain Path:       /languages
 */


defined( 'ABSPATH' ) || exit;

define('WDFMS_VERSION', '1.0.0' );
define('WDFMS_BASENAME', plugin_basename(__FILE__));   // used in plugin custome links.
define('WDFMS_BASEPAGE', 'wd-forms');   				// plugin page parmalink
define('WDFMS_PLUGIN_DIR', plugin_dir_path(__FILE__));     // output trailing slash.
define('WDFMS_PLUGIN_URL', plugins_url() . '/' . WDFMS_BASEPAGE);      

/*
 * Activation.
 */
register_activation_hook( __FILE__, 'wdfms_activatior' );
function wdfms_activatior(){
	flush_rewrite_rules();
}


/*
 * Deactivation.
 */
register_deactivation_hook( __FILE__, 'wdfms_deactivatior' );
function wdfms_deactivatior(){
	flush_rewrite_rules();
}

/*
 * Custom link
 */
add_filter('plugin_action_links_' . WDFMS_BASENAME, 'wdfms_custom_setting_link');
function wdfms_custom_setting_link($links){
    $setting_link = '<a href="admin.php?page=wd-forms">Settings</a>';
    array_push($links, $setting_link);
    return $links;
}  

/** 
 * Run plugin
 */
include_once WDFMS_PLUGIN_DIR . 'class-wdfms.php';
if (class_exists('Wdfms')){
    $wdfms = new Wdfms();
    $wdfms->run();
}




