<?php

/**
 * Public enqueue
 */

add_action('wp_enqueue_scripts', 'wdfms_public_enqueue');     
function wdfms_public_enqueue () {

	wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' ); 

	wp_enqueue_script( 'wdfms-admission-form-ajax', WDFMS_PLUGIN_URL . '/asset/js/wdfms-public-admission-form-ajax.js', array('jquery-form'), WDFMS_VERSION, true );

	wp_localize_script('wdfms-admission-form-ajax', 'wdfms_ajax', admin_url('admin-ajax.php')); 
		
	wp_enqueue_style('dashicons');

	wp_enqueue_style( 'wdfms-public', WDFMS_PLUGIN_URL . '/asset/css/wdfms-public.css', array(), WDFMS_VERSION, 'all' );

	wp_enqueue_script( 'wdfms-public', WDFMS_PLUGIN_URL . '/asset/js/wdfms-public.js', array(), WDFMS_VERSION, true );
}

	
