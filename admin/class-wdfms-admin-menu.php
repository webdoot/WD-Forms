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


    // allforms page
    public function all_forms(){ 
      require_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-page-allforms.php'; 
      $wdfms_page_allforms = new Wdfms_Page_Allforms();
      echo '<div class="wrap"><h2>Form Entries</h2><form method="post">';
      $wdfms_page_allforms->prepare_items(); 
      $wdfms_page_allforms->display(); 
      echo '</form></div>'; 
    }


    // Dashboard Page
    // public function add_forms(){ require_once WDFMS_PLUGIN_DIR . 'admin/view/dashboard-page.php'; }  


    // add forms page
    public function entries(){ 
      include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-page-entries.php';
      $wdfms_page_entries = new Wdfms_Page_Entries();
      echo '<div class="wrap"><h2>Form Entries</h2><form method="post">';
      $wdfms_page_entries->prepare_items(); 
      $wdfms_page_entries->display(); 
      echo '</form></div>'; 
    }


    public function run(){  
        add_action('admin_menu', array($this, 'menu'));  
    }
}

// class loader
$wdfms_admin_menu = new Wdfms_Admin_Menu();
$wdfms_admin_menu->run();
