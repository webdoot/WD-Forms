<?php



class Wdfms {

	/*
     * Admin function loader.
     */
    public function load_admin(){
        // enqueue 
        require_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin-enqueue.php';              
        $wdfms_admin_enqueue = new Wdfms_Admin_Enqueue();         
        add_action('admin_enqueue_scripts', array($wdfms_admin_enqueue, 'load'));
        
        // menu
        require_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin-menu.php';              
        $wdfms_admin_menu = new Wdfms_Admin_Menu();
        add_action('admin_menu', array($wdfms_admin_menu, 'load'));    
                      
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
              
    }
    
    public function run(){
        $this->load_admin();
        $this->load_public();  
    }

}
