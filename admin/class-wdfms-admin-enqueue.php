<?php

class Wdfms_Admin_Enqueue {

	public function load(){
		wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' ); 
		
		wp_enqueue_style( 'custom-admin', WDFMS_PLUGIN_URL . '/asset/css/custom-admin.css', array(), WDFMS_VERSION, 'all' );

		wp_register_script( 'jquery-3.4', WDFMS_PLUGIN_URL . '/asset/js/jquery-3.4.1.min.js', array(), WDFMS_VERSION, false );

        wp_enqueue_script( 'custom-admin-js', WDFMS_PLUGIN_URL . '/asset/js/custom-admin.js', array(), WDFMS_VERSION, true );

		// Loader only on plugin page
        if ($GLOBALS['parent_file'] == WDFMS_BASEPAGE) {
        	wp_enqueue_style( 'pace', WDFMS_PLUGIN_URL . '/asset/css/pace.css', array(), WDFMS_VERSION, 'all' );

        	wp_enqueue_style( 'dataTable', WDFMS_PLUGIN_URL . '/asset/css/dataTables.min.css', array(), WDFMS_VERSION, 'all' );

        	wp_enqueue_script( 'pace-min-js', WDFMS_PLUGIN_URL . '/asset/js/pace.min.js', array(), WDFMS_VERSION, false ); 

        	wp_enqueue_script( 'notify-min-js', WDFMS_PLUGIN_URL . '/asset/js/notify.min.js', array('jquery-3.4'), WDFMS_VERSION, false ); 

        	wp_enqueue_script( 'dataTable-js', WDFMS_PLUGIN_URL . '/asset/js/dataTables.min.js', array('jquery-3.4'), WDFMS_VERSION, true ); 
        }
	}

}