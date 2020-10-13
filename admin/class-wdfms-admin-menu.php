<?php

class Wdfms_Admin_Menu {

	public function load(){
		/// add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
       add_menu_page('WD Forms', 'WD Forms', 'manage_options', 'wd-forms', array($this, 'all_forms'), 'dashicons-feedback', 66);
       /// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
       add_submenu_page( 'wd-forms', 'All Forms', 'All Forms', 'manage_options', 'wd-forms', array($this, 'all_forms'));

       add_submenu_page( 'wd-forms', 'Add New', 'Add New', 'manage_options', 'wd-forms-add', array($this, 'dashboard'));

	}


    // all forms page
    public function all_forms(){ 
      // Data
      require_once WDFMS_PLUGIN_DIR . 'admin/data/class-wdfms-admin-all-forms.php'; 
      $wdfms_admin_all_forms = new Wdfms_Admin_All_Forms();
      $wdfms_admin_all_forms->update();
      // Page
      require_once WDFMS_PLUGIN_DIR . 'admin/page/wdfms-admin-all-forms.php'; 
    }


    // Dashboard Page
    // public function add_forms(){ require_once WDFMS_PLUGIN_DIR . 'admin/view/dashboard-page.php'; }  


    // add forms page
    public function add_forms(){ 
      require_once WDFMS_PLUGIN_DIR . 'admin/data/class-wdfms-admin-add-froms.php'; 
      $wdfms_admin_add_forms = new Wdfms_Admin_Add_Forms();
      $students = $wdfms_admin_add_forms->get_items();
      
      require_once WDFMS_PLUGIN_DIR . 'admin/page/wdfms-admin-add-froms.php'; 
    }


    

}