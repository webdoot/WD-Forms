<?php


class Wdfms_Deactivator 
{

	public static function deactivate() {

		// remove tables
		require_once WDFMS_PLUGIN_DIR . 'include/class-wdfms-db.php';		
		Wdfms_DB::delete_tables();	

        flush_rewrite_rules();

	}

}
