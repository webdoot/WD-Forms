<?php


/**
 * WD Form  Gen
 */
class Wdfms_Forms
{	
	public function __construct()
	{
		// register cpt
		// $this->register_wdform_cpt();
		add_action("init", array($this, "register_wdform_cpt"));

		// display custom column table heading
		add_action("manage_wdfms_form_posts_columns", array($this, "custom_column_heading"));	

		// custom column table render data
		add_action("manage_wdfms_form_posts_custom_column", array($this, "custom_column_data"), 10, 2);	
	}


	public function register_wdform_cpt(){
		$labels = array(
	        'name'                  => __( 'Forms' ),
	        'singular_name'         => __( 'Form' ),
	        'menu_name'             => __( 'Forms' ),
	        'name_admin_bar'        => __( 'Form' ),
	        'add_new'               => __( 'Add New' ),
	        'add_new_item'          => __( 'Add New Form' ),
	        'new_item'              => __( 'New Form' ),
	        'edit_item'             => __( 'Edit Form' ),
	        'view_item'             => __( 'View Form' ),
	        'all_items'             => __( 'Forms' ),
	        'search_items'          => __( 'Search Forms' ),
	        'parent_item_colon'     => __( 'Parent Forms:' ),
	        'not_found'             => __( 'No forms found.' ),
	        'not_found_in_trash'    => __( 'No forms found in Trash.' ),
	        'featured_image'        => __( 'Form Cover Image' ),
	        'set_featured_image'    => __( 'Set cover image' ),
	        'remove_featured_image' => __( 'Remove cover image' ),
	        'use_featured_image'    => __( 'Use as cover image' ),
	        'archives'              => __( 'Form archives' ),
	        'insert_into_item'      => __( 'Insert into form' ),
	        'uploaded_to_this_item' => __( 'Uploaded to this form'),
	        'filter_items_list'     => __( 'Filter forms list' ),
	        'items_list_navigation' => __( 'Forms list navigation' ),
	        'items_list'            => __( 'Forms list' ),
	    );
	 
	    $args = array(
	        'labels'             => $labels,
	        'description'		 => __('Wdfms form html'),
	        'public'             => true,
	        'hierarchical'       => false,				//default=false
	        'exclude_from_search'=> false,				//default=public opposite value
	        'publicly_queryable' => true,				//default=public value
	        'show_ui'            => true,				//default=public value
	        'show_in_menu'       => 'wdfms_form',		//default=show_ui value
	        'show_in_nav_menus'  => false,				//default=public value
	        'show_in_admin_bar'  => false,				//default=show_in_menu value
	        'menu_position'      => 65,
	        'menu_icon'       	 => null,				//default=null
	        'capability_type'    => 'post',
	     // 'capabilities'    	 => 'post',				//default=capability_type value
	        'map_meta_cap'    	 => null,				//default=null
	        'supports'           => array( 'title', 'editor' ),
	        'has_archive'        => false,				//default=false
	        'rewrite'            => false,	//default=true
	    );

		register_post_type( "wdfms_form", $args );
	}

	// custom column heading
	public function custom_column_heading($columns) {
		$columns = array(
			"cb" 	=> "<input type='checkbox' />",
			"title" => "Forms",
			"shortcode" => "Shortcode",
			"date" 	=> "Date"
		);
		return $columns ;
	}


	// custom column render data 
	function custom_column_data($column, $post_id){
		switch ( $column ) {	        
	        case 'shortcode'    :
	            echo '[wdfms_form id="' . $post_id . '"]';
	        break;
		}
	}

}

//class initiate & run
$wdfms_forms = new Wdfms_Forms();