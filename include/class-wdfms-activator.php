<?php


class Wdfms_Activator 
{
	
	public static function activate() {

		// create table
		require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-db.php';		
        Wdfms_DB::create_tables();

        // table seed
        // require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-seeder.php';
		// Wdfms_Seeder::seed_tables();	

		// add option
		// require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-option.php';
		// Wdfms_Option::add();	

		// default page creation
		require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-pages.php';		
        Wdfms_Pages::add();
			
    
		flush_rewrite_rules();

	}	

}
