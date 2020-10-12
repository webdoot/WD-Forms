<?php



class Wdfms {

	/*
     * Admin function loader.
     */
    public function load_admin(){
        
        require_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin.php';              
        $wdfms_admin = new Wdfms_Admin(); 

        // enqueue admin scripts.
        // add_action('admin_enqueue_scripts', array($wdfms_admin, 'enqueue'));
        
        // add admin menu.
        // add_action('admin_menu', array($wdfms_admin, 'menu'));    
                      
        // mics functions
        // require_once WDFMS_PLUGIN_DIR . 'include/wdfms-functions.php'; 
        
        // load options
        require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-option.php'; 
        $wdfms_option = new Wdfms_Option();       
        // add_action('admin_init', array($wdfms_option, 'load'));

        // Remove Jquery Migrate: as it is not required
        // add_filter( 'wp_default_scripts', $af = static function( &$scripts) {         
        //     $scripts->remove( 'jquery');
        //     $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );           
        // }, PHP_INT_MAX );
        // unset( $af );


        
    }
    
    /*
     * Public function loader
     */
    public function load_public(){
              
    }
    
    public function run(){
        $this->load_admin();
        $this->load_public();  
    }

}
