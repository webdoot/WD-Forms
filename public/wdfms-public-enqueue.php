<?php

/**
 * Public enqueue
 */

add_action('wp_enqueue_scripts', 'wdfms_public_enqueue');     
function wdfms_public_enqueue () {

	wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' ); 
		
	wp_enqueue_style( 'custom-public', WDFMS_PLUGIN_URL . '/asset/css/custom-public.css', array(), WDFMS_VERSION, 'all' );

	wp_enqueue_script( 'custom-admin-js', WDFMS_PLUGIN_URL . '/asset/js/custom-admin.js', array(), WDFMS_VERSION, true );
}