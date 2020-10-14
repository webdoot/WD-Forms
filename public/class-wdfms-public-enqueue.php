<?php

class Wdfms_Public_Enqueue {

	public function load(){
		wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' ); 
		
		wp_enqueue_style( 'custom-public', WDFMS_PLUGIN_URL . '/asset/css/custom-public.css', array(), WDFMS_VERSION, 'all' );

		wp_enqueue_script( 'custom-admin-js', WDFMS_PLUGIN_URL . '/asset/js/custom-admin.js', array(), WDFMS_VERSION, true );

	}


    public function run(){  
        // Enqueue scripts
        add_action('wp_enqueue_scripts', array($this, 'load'));        

    }

}

// class loader
$wdfms_public_enqueue = new Wdfms_Public_Enqueue(); 
$wdfms_public_enqueue->run();