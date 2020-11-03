<?php

/**
 * Public enqueue
 */

add_action('admin_enqueue_scripts', 'wdfms_admin_enqueue');     
function wdfms_admin_enqueue () {

	// wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' ); 
		
	wp_enqueue_style( 'wdfms-admin', WDFMS_PLUGIN_URL . '/asset/css/wdfms-admin.css', array(), WDFMS_VERSION, 'all' );

	// wp_register_script( 'jquery-3.4', WDFMS_PLUGIN_URL . '/asset/js/jquery-3.4.1.min.js', array(), WDFMS_VERSION, false );

    wp_enqueue_script( 'custom-admin-js', WDFMS_PLUGIN_URL . '/asset/js/wdfms-admin.js', array(), WDFMS_VERSION, true );

	// Loader only on plugin page
    // if ($GLOBALS['parent_file'] == WDFMS_BASEPAGE) {
    // 	wp_enqueue_style( 'pace', WDFMS_PLUGIN_URL . '/asset/css/pace.css', array(), WDFMS_VERSION, 'all' );

    // 	wp_enqueue_style( 'dataTable', WDFMS_PLUGIN_URL . '/asset/css/dataTables.min.css', array(), WDFMS_VERSION, 'all' );

    // 	wp_enqueue_script( 'pace-min-js', WDFMS_PLUGIN_URL . '/asset/js/pace.min.js', array(), WDFMS_VERSION, false ); 

    // 	wp_enqueue_script( 'notify-min-js', WDFMS_PLUGIN_URL . '/asset/js/notify.min.js', array('jquery-3.4'), WDFMS_VERSION, false ); 

    // 	wp_enqueue_script( 'dataTable-js', WDFMS_PLUGIN_URL . '/asset/js/dataTables.min.js', array('jquery-3.4'), WDFMS_VERSION, true ); 
    // }

    // A style available in WP               
    wp_enqueue_style ('wp-jquery-ui-dialog');
    wp_enqueue_script ('wdfms-dialog', WDFMS_PLUGIN_URL . '/asset/js/wdfms-dialog.js', array('jquery-ui-dialog'), WDFMS_VERSION, true);
    // https://stackoverflow.com/questions/3196392/jquery-ui-dialog-in-wordpress-admin     
}