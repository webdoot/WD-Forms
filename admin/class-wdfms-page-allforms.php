<?php

if( ! class_exists( 'WP_List_Table' ) ) {
    include_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Student Table Class
 */
class Wdfms_Page_Allforms extends WP_List_Table
{
    /* -------------------------- CUSTOMISE------------------------------------ */

    protected $table_name   = 'posts'               ;   // Table name excluding prefix
    protected $record_name  = 'form'                ;   // Name of record (Any thing you give)
    protected $page_slug    = 'wd-forms'            ;   // Page address
    protected $per_page     = 15                    ;   // Record per page
    protected $primary_key  = 'ID'                  ;   // Primery key of record
    protected $noitem_msg   = 'No form entry !!'    ;   // No item Message

    /* 
     * Column name required to display on Table Head. 
     * Syntax: array( 'table_column' => 'Title', .. )
     * Exclude first ID column if not req to display.
     */ 
    protected $columns      = array( 
                                    'post_title' => 'Forms'          ,
                                    'ID'         => 'Shortcode'      ,
                                    'post_date'  => 'Date'           ,
                                );
    /*
     * Columns required to be sorted. true: ASC, false: DEC or Unordered
     * Syntax: array( 'column_name' => array('column_name', true/false) );
     * Absent of column name result no sorting feature on click at column header.
     */
    protected $columns_sort = array(      
                                    'post_title'  => array('post_title', false)  ,
                                    'ID'          => array('ID' , false)         , 
                                    'post_date'   => array('post_date', false)   ,
                                );
    /*
     * Default sortable (single) column. Initial shorting while loading.
     * Mention one from $colums_sort. Preferably first column.
     * Column Name as in Table.
     */
    protected $column_sort_default = 'post_title';

    
    /* 
     * COLUMN WISE CUSTOMISED FUNCTION: Syntax: column_[name], Param: $item['name'].
     * Display the actions [edit, delete] on a column:
     * On Click action $_GET param: 'page', 'action', 'id'
     */
    public function column_post_title($item) {
        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>',$_REQUEST['page'],'edit',$item[$this->primary_key]),
            'delete' => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>',$_REQUEST['page'],'delete',$item[$this->primary_key]),
        );
        return sprintf('%1$s %2$s', $item['post_title'], $this->row_actions($actions) );
    }

    // shortcode.
    public function column_ID($item) {
        // return date('d-m-Y', strtotime($item['created_at']));
        return '[wdforms id="' . $item["ID"] . '"]';
    }

    // Date field DOJ formate change.
    public function column_post_date($item) {
        return date('d-m-Y', strtotime($item['post_date']));
        // return $item['post_date'];
    }


    /* ------------------------------------------------------------------------- */

    public $items   = [];           // Initiate the Items with empty array.

    public function __construct() {
        /*
         * REQUIERED: Set the Parent Default.
         * EDIT: NO
         */
        parent::__construct( array(
            'singular'  => $this->record_name      ,    //singular name of the listed records
            'plural'    => $this->record_name. 's' ,    //plural name of the listed records
            'ajax'      => false                   ,    //does this table support ajax?
        ) );
        
    }

    /*
     * This Function prepare_items() call before display().
     */
    public function prepare_items() {
        // global $role, $usersearch;   //check

        // DB Connect
        global $wpdb; 
        $table_name = $wpdb->prefix . $this->table_name;

        // BULK ACTION (no change)
        $this->process_bulk_action();

        ///-------------------------------------------------///
        // $entry_ids = $wpdb->get_results($wpdb->prepare('SELECT DISTINCT %1$s.entry_id FROM %2$s', $table_name, $table_name ), ARRAY_A);
        // print_r();

        ///-------------------------------------------------///

        /**
         * SEARCH ACTION: 
         * @return $this->items
         */
        $search = isset( $_REQUEST['s'] ) ? wp_unslash( trim( $_REQUEST['s'] ) ) : '';
        if ( '' !== $search ) {
            $search = "%{$search}%"; 

            $where = $wpdb->prepare( "WHERE post_type=%s AND post_status=%s", 'wdforms', 'publish' );

            $this->items = $wpdb->get_results( "SELECT * FROM {$table_name} {$where}", ARRAY_A );
        }
        else {
            $where = $wpdb->prepare( "WHERE post_type=%s AND post_status=%s", 'wdforms', 'publish' );
            $this->items = $wpdb->get_results( "SELECT * FROM {$table_name} {$where}", ARRAY_A );
        }
 
        // Find role
        // $role = isset( $_REQUEST['role'] ) ? $_REQUEST['role'] : '';     

        // SHORTING : (no change)
        usort( $this->items, array( &$this, 'usort_reorder' ) ); 

        // GET COLUMN HEADER : (no change)
        $columns = $this->get_columns();        
        $hidden = array();
        $sortable = $this->get_sortable();
        $this->_column_headers = array($columns, $hidden, $sortable);

        // PAGINATION : (no change)     
        $this->set_pagination_args( array(      
            'total_items' => count($this->items),     
            'per_page'    => $this->per_page,         
        ));
        
        // PER PAGE ITEM : (no change)
        $this->items = array_slice($this->items, (($this->get_pagenum()-1)*$this->per_page), $this->per_page);

        // SEARCH BOX : (no change)
        $this->search_box('Search', 'search_id');
    }

    /* 
     * column_defaul() & get_columns() must match all attributes.
     * It takes attribute from columns(). (local edit)
     * EDIT: NO.
     */
    public function column_default( $item, $column_name ) {
        if (array_key_exists($column_name, $this->columns))
            return $item[ $column_name ];           
        else 
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }

    /*
     * column_defaul() & get_columns() must match all attributes
     * If don't want to display select all in Title: Assign empty value to 'cb'.
     * EDIT: NO.
     */
    public function get_columns(){
        $cb = array('cb' => '<input type="checkbox" />');   // Insert Check Box code.
        return array_merge($cb, $this->columns);
    }

    /*
     * Special parent method to render Check-Box. Also render select all in Title & Footer.
     * This method on work on when get_columns() contains 'cb' in array.
     * EDIT: NO.
     */
    public function column_cb($item) {
        return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item[$this->primary_key] );    
    }

    /*
     * Shortable columns.
     * EDIT: NO.
     */
    public function get_sortable()
    {
        return $this->columns_sort;
    }

    /* 
     * Shorting of columns.
     * $_GET['page'], $_GET['orderby'], $_GET['order'] 
     * EDIT: NO.
     */
    public function usort_reorder( $a, $b ) {
      // Orderby: column for short, default key of this column name
      $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : $this->column_sort_default;
      // Order, default to asc
      $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
      // Determine sort order
      $result = strcmp( $a[$orderby], $b[$orderby] );
      // Send final sort direction to usort
      return ( $order === 'asc' ) ? $result : -$result;
    }


    /*
     * PARENT METHOD: Required Bulk Action. Show in Drop-Down with Apply button on top & bottom.
     * EDIT: NO.
     */
    public function get_bulk_actions() {
      $actions = array(
        'delete'    => 'Delete'
      );
      return $actions;
    }

    /*
     * Bulk Action Process
     * EDIT: NO.
     */
    public function process_bulk_action(){
        global $wpdb;
        $table_name = $wpdb->prefix . $this->table_name ; 

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
    }

    /*
     * No Item message
     */  
    function no_items() {
      _e( $this->noitem_msg );
    }

}




