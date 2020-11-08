<?php


class Wdfms 
{

	/*
     * Admin function loader.
     */
    public function load_admin(){        
        // enqueue 
        include_once WDFMS_PLUGIN_DIR . 'admin/wdfms-admin-enqueue.php'; 
        // menu
        include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-admin-menu.php';
        // cpt: "wdfms_form"
        include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-forms.php';
        // cpt: "wdfms_form_entry" 
        include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-forms-entry.php';  

        // Wp ThickBox
        add_action('admin_footer', array($this, 'admin_footer_section'));

        // form process
        include_once WDFMS_PLUGIN_DIR . 'admin/wdfms-form-tmpl-manage.php';    
        

    }
    
    /*
     * Public function loader
     */
    public function load_public(){
        // add session
        add_action('init', array($this, 'register_session'));  
        // enqueue 
        include_once WDFMS_PLUGIN_DIR . 'public/wdfms-public-enqueue.php';   
        // form handler
        include_once WDFMS_PLUGIN_DIR . 'public/wdforms-form-handler.php'; 
        // form process
        include_once WDFMS_PLUGIN_DIR . 'public/wdfms-form-process.php';           
    }
    
    public function run(){
        $this->load_admin();
        $this->load_public();  
    }


    public function register_session() {
        if( ! session_id('wdfms') ) {
            session_start();
        } 
    }

    // Wp ThickBox
    public function admin_footer_section() {           
        echo '<div id="wdfms_tb" style="display:none;"> <p></p> </div>' ;
    } 

}
