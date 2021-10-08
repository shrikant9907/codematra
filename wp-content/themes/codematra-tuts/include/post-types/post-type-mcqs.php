<?php
 /*
  * MCQs Post Type
  */ 
add_action('init','mcqs_post_type', 10);
function mcqs_post_type() {
   
   // Labels
	$labels = array(
		'name' => _x("MCQs", "post type general name"),
		'singular_name' => _x("MCQs", "post type singular name"),
		'menu_name' => 'MCQs',
		'add_new' => _x("Add New", "program"),
		'add_new_item' => __("Add New MCQs"),
		'edit_item' => __("Edit MCQs"),
		'new_item' => __("New MCQs"),
		'view_item' => __("View MCQs"),
		'search_items' => __("Search MCQs"),
		'not_found' =>  __("No MCQs Found"),
		'not_found_in_trash' => __("No MCQs Found in Trash"),
		'parent_item_colon' => ''
	);
	
	// Register post type
	register_post_type('mcqs' , array( 
		'labels' => $labels,
		'public' => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
        'rest_base'          => 'mcqs',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive' => false,
                'menu_icon' => 'dashicons-images-alt2',
		'rewrite' => array('slug' => 'mcqs'),
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies'       => array('mcqs-category', 'mcqs-tags')
	) ); 
}
  
/**
 * MCQs Category Taxonomy
 */
add_action( 'init', 'mcqs_taxonomy', 0 );
function mcqs_taxonomy() {  
	
	// Labels
	$singular = 'MCQs Category';
	$plural = 'MCQs Categories'; 
	$labels = array( 
		'name' => _x( $plural, "taxonomy general name"),
		'singular_name' => _x( $singular, "taxonomy singular name"),
		'search_items' =>  __("Search $singular"),
		'all_items' => __("All $singular"),
		'parent_item' => __("Parent $singular"),
		'parent_item_colon' => __("Parent $singular:"),
		'edit_item' => __("Edit $singular"),
		'update_item' => __("Update $singular"),
		'add_new_item' => __("Add New $singular"),
		'new_item_name' => __("New $singular Name"),
	);
        
	register_taxonomy( strtolower('mcqs-category'), 'MCQs', array(
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => true,
		'show_in_rest'          => true,
		'rest_base'             => 'mcqs-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'labels' => $labels 
	) );
}

/**
 * MCQs Tags Taxonomy
 */
add_action( 'init', 'mcqs_taxonomy2', 0 );
function mcqs_taxonomy2() {  
	
	// Labels
	$singular = 'MCQs Tag';
	$plural = 'MCQs Tags'; 
	$labels = array( 
		'name' => _x( $plural, "taxonomy general name"),
		'singular_name' => _x( $singular, "taxonomy singular name"),
		'search_items' =>  __("Search $singular"),
		'all_items' => __("All $singular"),
		'parent_item' => __("Parent $singular"),
		'parent_item_colon' => __("Parent $singular:"),
		'edit_item' => __("Edit $singular"),
		'update_item' => __("Update $singular"),
		'add_new_item' => __("Add New $singular"),
		'new_item_name' => __("New $singular Name"),
	);
        
	// register_taxonomy( strtolower('mcqs-tags'), 'MCQs', array(
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	'show_in_nav_menus' => true,
	// 	'hierarchical' => true,
	// 	'query_var' => true,
	// 	'rewrite' => true,
	// 	'show_in_rest'          => true,
	// 	'rest_base'             => 'mcqs-tags',
	// 	'rest_controller_class' => 'WP_REST_Terms_Controller',
	// 	'labels' => $labels 
	// ) );
} 

/*
 * MCQs Meta Box
 */
//add_action( 'add_meta_boxes', 'mcqs_meta_box' );
function mcqs_meta_box(){
    add_meta_box( 'mcqs-details', 'MCQs Details', 'mcqs_metabox_cb', 'MCQs', 'normal', 'default');
}
 
function mcqs_metabox_cb($post){
 
    $profolio_metafields = array(
            array(
                'name'=>'mcqs_client',
                'label'=>'Client Name',
                'classes'=>'mcqs-field'
            ), 
            array(
                'name'=>'mcqs_location',
                'label'=>'Location',
                'classes'=>'mcqs-field'
            ), 
            array(
                'name'=>'mcqs_url',
                'label'=>'URL',
                'classes'=>'mcqs-field'
            )
        );    
    $html = '';
    if($profolio_metafields) { 
        foreach($profolio_metafields as $profolio) {
            $values = get_post_meta( $post->ID, $profolio['name'], true );
            $value = isset( $values ) ? esc_attr( $values ) : "";
            $html .= '<label>'.$profolio['label'].'</label>'; 
            $html .= '<input type="text" name="'.$profolio['name'].'" id="'.$profolio['name'].'" style=" margin-bottom:15px; width:100%;" value="'.$value.'" />';          
        }
    }
   
    echo $html;
}

