<?php

/**
 * Menu items
 */

class Wdfms_Admin_Menu 
{
  public function __construct()
  {
    add_action('admin_menu', array($this, 'menu')); 
  }

  // main menu
	public function menu(){
		/// add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
       add_menu_page('WD Forms', 'WD Forms', 'manage_options', 'wdfms-forms', false, 'dashicons-feedback', 66);  //cpt page
       /// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
       add_submenu_page( 'wdfms-forms', 'Entries', 'Entries', 'manage_options', 'wd-forms-entries', array($this, 'entries'));

	}

    // entries page
    public function entries(){ 
      include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-page-entries.php';
      $wdfms_page_entries = new Wdfms_Page_Entries();
      echo '<div class="wrap"><h1 class="wp-heading-inline">Entries</h1><form method="post">';
      $wdfms_page_entries->prepare_items(); 
      $wdfms_page_entries->display(); 
      echo '</form></div>'; 
    }

}

//class initiate
$wdfms_admin_menu = new Wdfms_Admin_Menu();
