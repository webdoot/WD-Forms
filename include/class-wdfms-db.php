<?php

/*
 * Database tables
 */
	
class Wdfms_DB {
	
    /* 
     * Declare all the table name with sql
     */
    public static $tables = array ( 
      
        "wdfms_forms_data"      => "`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT , 
                                    `form_id` BIGINT(20) UNSIGNED NOT NULL , 
                                    `value` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
                                    `date` DATETIME NOT NULL, 
                                     PRIMARY KEY (`id`)",
    );


  /**************** Need not to edit any thing below *************************/

    /*
     * Create all table.
     */
    public static function create_tables(){
        global $wpdb;
        $tables = self::$tables;
        $charset_collate = $wpdb->get_charset_collate();

        foreach ( $tables as $table_name => $sql ) {

            $table_name = $wpdb->prefix . $table_name;
            $table_sql = "CREATE TABLE {$table_name} ( $sql ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta ($table_sql);

        }
    }
    
    /*
     * Delete table.
     */
    public static function delete_tables() {            
        global $wpdb;
        $tables = self::$tables;

        foreach ( $tables as $table_name => $sql) {                
            $table_name = $wpdb->prefix . $table_name;
            $wpdb->query("DROP TABLE IF EXISTS {$table_name}");                
        }           
    }

}
