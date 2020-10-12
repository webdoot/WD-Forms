<?php


class Wdfms_Admin {

	/*
   * Enqueue style & script.
   */
    public function enqueue(){
        // Styles 
        // wp_enqueue_style( 'w3', WDFMS_PLUGIN_URL . '/asset/css/w3.css', array(), WDFMS_VERSION, 'all' );         
		    // wp_enqueue_style( 'custom-admin', WDFMS_PLUGIN_URL . '/asset/css/custom-admin.css', array(), WDFMS_VERSION, 'all' );

        // Script     
        // wp_register_script( 'jquery-3.4', WDFMS_PLUGIN_URL . '/asset/js/jquery-3.4.1.min.js', array(), WDFMS_VERSION, false );

        
        // wp_enqueue_script( 'custom-admin-js', WDFMS_PLUGIN_URL . '/asset/js/custom-admin.js', array(), WDFMS_VERSION, true );  

        // Loader only on plugin page
        // if ($GLOBALS['parent_file'] == WDFMS_BASEPAGE) {
        //    wp_enqueue_style( 'pace', WDFMS_PLUGIN_URL . '/asset/css/pace.css', array(), WDFMS_VERSION, 'all' );
        //    wp_enqueue_style( 'dataTable', WDFMS_PLUGIN_URL . '/asset/css/dataTables.min.css', array(), WDFMS_VERSION, 'all' );

        //    wp_enqueue_script( 'pace-min-js', WDFMS_PLUGIN_URL . '/asset/js/pace.min.js', array(), WDFMS_VERSION, false ); 
        //    wp_enqueue_script( 'notify-min-js', WDFMS_PLUGIN_URL . '/asset/js/notify.min.js', array('jquery-3.4'), WDFMS_VERSION, false );           
        //    wp_enqueue_script( 'dataTable-js', WDFMS_PLUGIN_URL . '/asset/js/dataTables.min.js', array('jquery-3.4'), WDFMS_VERSION, true ); 
        // }     
       
    }

   
    


	/*
     * Admin menu item.
     */
    public function menu(){
       /// add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
       add_menu_page('WD School', 'WD School', 'manage_options', 'wd-school', array($this, 'admin_set'), 'dashicons-image-filter', 66);
       /// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
       add_submenu_page( 'wd-school', 'Admin Setting', 'Admin Setting', 'manage_options', 'wd-school', array($this, 'admin_set'));
       add_submenu_page( 'wd-school', 'Dashboard', 'Dashboard', 'manage_options', 'wd-school-dashboard', array($this, 'dashboard'));
       add_submenu_page( 'wd-school', 'Student', 'Student', 'manage_options', 'wd-school-student', array($this, 'student'));       
       add_submenu_page( 'wd-school', 'Setting', 'Setting', 'manage_options', 'wd-school-setting', array($this, 'setting'));  	   

    }
    
    /*
     * View pages
     */
    // Setting Page
    public function admin_set(){ 
      // Data
      require_once WDFMS_PLUGIN_DIR . 'admin/data/class-wdfms-admin-setting.php'; 
      $admin_setting = new Wdfms_Admin_Setting();
      $admin_setting->update();
      // Page
      require_once WDFMS_PLUGIN_DIR . 'admin/view/admin-setting-page.php'; 
    }

    // Dashboard Page
    public function dashboard(){ require_once WDFMS_PLUGIN_DIR . 'admin/view/dashboard-page.php'; }  

    // Student Page
    public function student(){ 
      require_once WDFMS_PLUGIN_DIR . 'admin/data/class-wdfms-student.php'; 
      $student_obj = new Wdfms_Student();
      $students = $student_obj->get_items();
      
      require_once WDFMS_PLUGIN_DIR . 'admin/view/student-page.php'; 
    }
    // Setting Page    
    public function setting(){ require_once WDFMS_PLUGIN_DIR . 'admin/view/setting-page.php'; }



    
    
}
