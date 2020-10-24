<?php

class Wdfms_Admin_Menu 
{

	public function menu(){
		/// add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
       add_menu_page('WD Forms', 'WD Forms', 'manage_options', 'wd-forms', array($this, 'all_forms'), 'dashicons-feedback', 66);
       /// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
       add_submenu_page( 'wd-forms', 'All Forms', 'All Forms', 'manage_options', 'wd-forms', array($this, 'all_forms'));

       add_submenu_page( 'wd-forms', 'Entries', 'Entries', 'manage_options', 'wd-forms-entries', array($this, 'entries'));

	}


    // all forms page
    public function all_forms(){ 
      // Data
      require_once WDFMS_PLUGIN_DIR . 'admin/page/class-wdfms-admin-all-forms.php'; 
      $wdfms_admin_all_forms = new Wdfms_Admin_All_Forms();
      $wdfms_admin_all_forms->update();
      // Page
      require_once WDFMS_PLUGIN_DIR . 'admin/page/wdfms-admin-all-forms.php'; 
    }


    // Dashboard Page
    // public function add_forms(){ require_once WDFMS_PLUGIN_DIR . 'admin/view/dashboard-page.php'; }  


    // add forms page
    public function entries(){ 
      include_once WDFMS_PLUGIN_DIR . 'admin/page/entries.php'; 
    }


    public function run(){  
        add_action('admin_menu', array($this, 'menu'));  
    }
}

// class loader
$wdfms_admin_menu = new Wdfms_Admin_Menu();
$wdfms_admin_menu->run();
