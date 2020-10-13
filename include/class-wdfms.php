<?php


class Wdfms {

	/*
     * Admin function loader.
     */
    public function load_admin(){
        // enqueue 
        require_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin-enqueue.php';              
        
        // menu
        require_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin-menu.php';  
                      
        // mics functions
        require_once WDFMS_PLUGIN_DIR . 'include/wdfms-functions.php'; 
        
        // load options
        require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-option.php'; 
        $wdfms_option = new Wdfms_Option();       
        // add_action('admin_init', array($wdfms_option, 'load'));
        
    }
    
    /*
     * Public function loader
     */
    public function load_public(){
        // shortcode
        require_once WDFMS_PLUGIN_DIR . 'public/shortcode/admission-form.php';  
    }
    
    public function run(){
        $this->load_admin();
        $this->load_public();  
    }

}
