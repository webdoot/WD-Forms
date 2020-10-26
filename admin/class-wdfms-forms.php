<?php


/**
 * WD Form  Gen
 */
class Wdfms_Forms
{	
	public function __construct()
	{
		$this->register_wdform_cpt();
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
	        'all_items'             => __( 'All Forms' ),
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
	        'description'		 => 'Wdfms form html',
	        'public'             => true,
	        'hierarchical'       => false,				//default=false
	        'exclude_from_search'=> false,				//default=public opposite value
	        'publicly_queryable' => true,				//default=public value
	        'show_ui'            => true,				//default=public value
	        'show_in_menu'       => 'wdfms-forms',		//default=show_ui value
	        'show_in_nav_menus'  => false,				//default=public value
	        'show_in_admin_bar'  => false,				//default=show_in_menu value
	        'menu_position'      => 65,
	        'menu_icon'       	 => null,				//default=null
	        'capability_type'    => 'post',
	     // 'capabilities'    	 => 'post',				//default=capability_type value
	        'map_meta_cap'    	 => null,				//default=null
	        'supports'           => array( 'title', 'editor' ),
	        'has_archive'        => false,				//default=false
	        'rewrite'            => false,				//default=true
	    );

		register_post_type( "wdfms_form", $args );
	}

}

//class initiate
$wdfms_forms = new Wdfms_Forms();