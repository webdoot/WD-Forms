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


                // mics functions
        include_once WDFMS_PLUGIN_DIR . 'include/wdfms-functions.php';  
        
        include_once WDFMS_PLUGIN_DIR . 'public/wdforms-shortcode-handler.php';  
                
        // load options
        // include_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-options.php'; 
        // $wdfms_options = new Wdfms_Options();       
        // add_action('admin_init', array($wdfms_option, 'load'));

        
        
    }
    
    /*
     * Public function loader
     */
    public function load_public(){
        // add session
        add_action('init', array($this, 'register_session'));

        // form_id when post_type
        add_action('the_post', array($this, 'get_form_id'));

        // enqueue 
        include_once WDFMS_PLUGIN_DIR . 'public/wdfms-public-enqueue.php';    

        // shortcodes 
        include_once WDFMS_PLUGIN_DIR . 'public/shortcode/admission-form.php';  
        include_once WDFMS_PLUGIN_DIR . 'public/shortcode/admission-form-view.php'; 
        // include_once WDFMS_PLUGIN_DIR . 'public/wdforms-shortcode-handler.php'; 

        // form process
        include_once WDFMS_PLUGIN_DIR . 'public/wdfms-admission-form-process.php';  
         
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

    public function get_form_id(){
        // when wdfms_form post_type open
        if (get_post_type() == 'wdfms_form') {
            $_SESSION['wdfms']['form_id'] = get_the_ID();
        }
    }

}
