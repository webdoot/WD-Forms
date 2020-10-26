<?php

/**
 * Form Post Type (custom post)
 */

class Wdfms_Form_Handler {

	public function __construct() {

		// Register wpforms custom post type.
		$this->register_cpt();

	}

	public function register_cpt() {

		$labels = array(
		    'name'                  => _x( 'Forms', 'Post type general name' ),
		    'singular_name'         => _x( 'Form', 'Post type singular name' ),
		    'menu_name'             => _x( 'Forms', 'Admin Menu text' ),
		    'name_admin_bar'        => _x( 'Form', 'Add New on Toolbar' ),
		    'add_new'               => __( 'Add New' ),
		    'add_new_item'          => __( 'Add New Form' ),
		    'new_item'              => __( 'New Form' ),
		    'edit_item'             => __( 'Edit Form' ),
		    'view_item'             => __( 'View Form' ),
		    'all_items'             => __( 'All Forms' ),
		    'search_items'          => __( 'Search Forms' ),
		    'parent_item_colon'     => __( 'Parent Forms:' ),
		    'not_found'             => __( 'No form found.' ),
		    'not_found_in_trash'    => __( 'No form found in Trash.' ),
		    'featured_image'        => _x( 'Form Image', 'Overrides the “Featured image” phrase' ),
		    'set_featured_image'    => _x( 'Set form image', 'Overrides the “Set featured image” phrase' ),
		    'remove_featured_image' => _x( 'Remove form image', 'Overrides the “Remove featured image” phrase'),
		    'use_featured_image'    => _x( 'Use form image', 'Overrides the “Use featured image” phrase' ),
		    'archives'              => _x( 'Form archives', 'The post type archive label used in nav menus' ),
		    'insert_into_item'      => _x( 'Insert into form', 'Overrides the “Insert into post/page phrase' ),
		    'uploaded_to_this_item' => _x( 'Uploaded to this form', 'Overrides the “Uploaded to this post/page” phrase' ),
		    'filter_items_list'     => _x( 'Filter forms list', 'Screen reader text for filter links heading' ),
		    'items_list_navigation' => _x( 'Forms list navigation', 'Screen reader text for pagination heading' ),
		    'items_list'            => _x( 'Forms list', 'Screen reader text for items list heading' ),
		);

		$args = array(
		    'labels'              => $labels,
		    'public'              => true,
		    'exclude_from_search' => false,
		    'publicly_queryable'  => true,
		    'show_ui'             => true,
		    // 'show_in_nav_menus'   => true,
		    'show_in_menu'        => true,
		    'show_in_admin_bar'   => true,
		    'menu_position'       => 5,
		    'menu_icon'           => 'dashicons-admin-appearance',
		    'capability_type'     => 'post',
		    'hierarchical'        => false,
		    'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		    'has_archive'         => true,
		    'rewrite'             => false,
		    'query_var'           => true
		);
		register_post_type( 'wdforms', $args ); 
	}


}


// class loader
$wdfms_form_handler = new Wdfms_Form_Handler();
// $wdfms_form_handler->run();