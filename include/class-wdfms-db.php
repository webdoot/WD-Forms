<?php

/*
 * Database tables
 */
	
class Wdfms_DB {
	
    /* 
     * Declare all the table name with sql
     */
    public static $tables = array ( 
      
        "wdfms_forms"         => "`id` int(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                    `s_user_id` bigint(20),
                                    `p_user_id` int(15),
                                    `class_id` varchar(5),
                                    `class_date` date,
                                    `s_rollno` varchar(15),
                                    `s_name` varchar(100),
                                    `s_dob` date,
                                    `s_gender` varchar(10),
                                    `s_img` varchar(200),
                                    `s_address` varchar(200), 
                                    `s_city` varchar(30),
                                    `s_state` varchar(30),
                                    `s_country` varchar(30),
                                    `s_zip` varchar(10),
                                    `s_phone` varchar(15),
                                    `s_email` varchar(100),
                                    `s_bloodgrp` varchar(15),
                                    `s_doj` date,
                                    `p_name` varchar(100), 
                                    `p_gender` varchar(10),
                                    `p_relation` varchar(30),
                                    `p_address` varchar(200),
                                    `p_city` varchar(30),
                                    `p_state` varchar(30),
                                    `p_country` varchar(30),
                                    `p_zip` varchar(10),
                                    `p_edu` varchar(60),
                                    `p_phone` varchar(15),  
                                    `p_email` varchar(100),  
                                    `p_profession` varchar(60),
                                    `p_bloodgrp` varchar(15),
                                    `p1_name` varchar(100), 
                                    `p1_gender` varchar(10),
                                    `p1_relation` varchar(30),
                                    `p1_address` varchar(200),
                                    `p1_city` varchar(30),
                                    `p1_state` varchar(30),
                                    `p1_country` varchar(30),
                                    `p1_zip` varchar(10),
                                    `p1_edu` varchar(60),
                                    `p1_phone` varchar(15),  
                                    `p1_email` varchar(100),  
                                    `p1_profession` varchar(60),
                                    `p1_bloodgrp` varchar(15)",

        
                
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
