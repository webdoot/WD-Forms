<?php


class Wdfms {

	/*
     * Admin function loader.
     */
    public function load_admin(){
        // enqueue 
        include_once WDFMS_PLUGIN_DIR . 'admin/wdfms-admin-enqueue.php';              
        
        // menu
        include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin-menu.php';  
                      
        // mics functions
        include_once WDFMS_PLUGIN_DIR . 'include/wdfms-functions.php'; 
        
        // load options
        include_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-options.php'; 
        $wdfms_options = new Wdfms_Options();       
        // add_action('admin_init', array($wdfms_option, 'load'));
        
    }
    
    /*
     * Public function loader
     */
    public function load_public(){
        // enqueue 
        include_once WDFMS_PLUGIN_DIR . 'public/wdfms-public-enqueue.php';    

        // shortcodes 
        include_once WDFMS_PLUGIN_DIR . 'public/shortcode/admission-form.php';  
        include_once WDFMS_PLUGIN_DIR . 'public/shortcode/admission-form-view.php'; 

        // form process
        include_once WDFMS_PLUGIN_DIR . 'public/wdfms-admission-form-process.php';  
         
    }
    
    public function run(){
        $this->load_admin();
        $this->load_public();  
    }

}
