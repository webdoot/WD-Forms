<?php


class Wdfms_Activator 
{
	
	public static function activate() {

		// create table
		require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-db.php';		
        Wdfms_DB::create_tables();			
    
		flush_rewrite_rules();

	}	

}
