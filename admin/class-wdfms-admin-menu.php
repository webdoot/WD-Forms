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
       add_menu_page('WD Forms', 'WD Forms', 'manage_options', 'wdfms_form', false, 'dashicons-feedback', 66);  //cpt page
       /// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
       add_submenu_page( 'wdfms_form', 'Test Page', 'Test Page', 'manage_options', 'wdfms_form_test', array($this, 'test'));

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

    // test page
    public function test(){
      echo "<h1> This is test page </h1> <br><br>";
      print "<pre>";
      print_r($GLOBALS);
      print "</pre>";      
    }

}

//class initiate
$wdfms_admin_menu = new Wdfms_Admin_Menu();
