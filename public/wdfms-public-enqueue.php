<?php

/**
 * Public enqueue
 */

add_action('wp_enqueue_scripts', 'wdfms_public_enqueue');     
function wdfms_public_enqueue () {

	wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' ); 

	wp_enqueue_script('jquery-form');

	wp_enqueue_script( 'wdfms-admission-form-ajax', WDFMS_PLUGIN_URL . '/asset/js/wdfms-public-admission-form-ajax.js', array(), WDFMS_VERSION, true );
		
	wp_enqueue_style( 'wdfms-public', WDFMS_PLUGIN_URL . '/asset/css/wdfms-public.css', array(), WDFMS_VERSION, 'all' );

	wp_enqueue_script( 'wdfms-public', WDFMS_PLUGIN_URL . '/asset/js/wdfms-public.js', array(), WDFMS_VERSION, true );
}

	
