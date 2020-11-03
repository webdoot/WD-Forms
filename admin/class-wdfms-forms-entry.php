<?php


/**
 * WD Form  Entry
 */
class Wdfms_Forms_Entry
{	
	public function __construct()
	{
		// register cpt
		// $this->register_wdform_cpt();
		add_action("init", array($this, "register_wdform_cpt"));

		// display custom column table heading
		add_action("manage_wdfms_form_entry_posts_columns", array($this, "custom_column_heading"));	

		// custom column table render data
		add_action("manage_wdfms_form_entry_posts_custom_column", array($this, "custom_column_data"), 10, 2);	
	}


	public function register_wdform_cpt(){
		$labels = array(
	        'name'                  => __( 'Entry' ),
	        'singular_name'         => __( 'Entries' ),
	        'menu_name'             => __( 'Entries' ),
	        'name_admin_bar'        => __( 'Entry' ),
	        'add_new'               => __( 'Add New' ),
	        'add_new_item'          => __( 'Add New Entry' ),
	        'new_item'              => __( 'New Entry' ),
	        'edit_item'             => __( 'Edit Entry' ),
	        'view_item'             => __( 'View Entry' ),
	        'all_items'             => __( 'Entries' ),
	        'search_items'          => __( 'Search Entries' ),
	        'parent_item_colon'     => __( 'Parent Entries:' ),
	        'not_found'             => __( 'No forms found.' ),
	        'not_found_in_trash'    => __( 'No forms found in Trash.' ),
	        'featured_image'        => __( 'Entry Cover Image' ),
	        'set_featured_image'    => __( 'Set cover image' ),
	        'remove_featured_image' => __( 'Remove cover image' ),
	        'use_featured_image'    => __( 'Use as cover image' ),
	        'archives'              => __( 'Entry archives' ),
	        'insert_into_item'      => __( 'Insert into entry' ),
	        'uploaded_to_this_item' => __( 'Uploaded to this entry'),
	        'filter_items_list'     => __( 'Filter entries list' ),
	        'items_list_navigation' => __( 'Entries list navigation' ),
	        'items_list'            => __( 'Entries list' ),
	    );
	 
	    $args = array(
	        'labels'             => $labels,
	        'description'		 => __('Wdfms form entries'),
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
	     	// 'capabilities'    	 => array( 'create_posts' => 'do_not_allow' ),	
	        'map_meta_cap'    	 => null,				//default=null
	        'supports'           => array( 'title', 'editor' ),				//array( 'title', 'editor' )
	        'has_archive'        => false,				//default=false
	        'rewrite'            => false,	//default=true
	    );

		register_post_type( "wdfms_form_entry", $args );
	}

	// custom column heading
	public function custom_column_heading($columns) {
		$columns = array(
			"cb" 		 => "<input type='checkbox' />",
			"title"		 => "Form",
			"name"		 => "Name",
			"first_col"	 => "Submission Id",
			"second_col" => "Mobile No",
			"download" 	 => "Download",
			"note"	 	 => "Note",
			"date" 	     => "Date"
		);
		return $columns ;
	}


	// custom column render data 
	public function custom_column_data($column, $post_id){
		switch ( $column ) {	        
	        case 'title' : echo $post_id; break;

	        case 'name'  : echo get_post($post_id)->post_title; break;

	        case 'first_col' : echo $post_id; break;

	        case 'second_col' : 
	        	if(is_serialized(get_post($post_id)->post_content)){
	        		$fields = unserialize(get_post($post_id)->post_content);
	        		echo $fields['mobile'];
	        	} 
	        	else { echo '--'; }	        	
	        	break;

	        case 'download' : 
	        	echo '<a class="dashicons dashicons-pdf" href="#modal-content" style="font-size: 28px"> </a>'; 
	        	break;

	        case 'note' : 
	        	echo '<a class="dashicons dashicons-testimonial" href="#" style="font-size: 28px"> </a>'; 
	        	break;
		}
	}

}

//class initiate & run
$wdfms_forms_entry = new Wdfms_Forms_Entry();