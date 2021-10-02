<?php

/*
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "You Can not access this page directly." );

/**
 * Class for Awesome Ads Manager Admin
 */
if ( ! class_exists( 'Awesome_Ads_Manager_Admin' ) ) {
    
    /*
    * Class for the Scheduler
    */
    class Awesome_Ads_Manager_Admin {
            
        /*
        * Post type name.
        */
        public $post_type_name = 'Awesome Ads';

        /*
        * Post type singular name.
        */
        public $singular_name = 'Ad';

        /*
        * Post type slug
        */
        public $post_type_slug = 'aam_create_ad';             
            

        /*
         * Construct Function
         */
        public function __construct() {

            // Register Post Type
            add_action( 'init', array(&$this, 'aam_register_post_type'), 0 );
            
            // Add Setting Menu
            add_action( 'admin_menu', array(&$this,'aam_settings_menu') );
            
            // Admin Script
            add_action( 'admin_enqueue_scripts', array(&$this, 'aam_admin_scripts'), 0 ); 
            
            // Meta Box
            add_action( 'add_meta_boxes', array(&$this, 'aam_register_metabox'), 10, 5 ); 
            
            // Save Meta Fields Values
            add_action( 'save_post', array(&$this, 'aam_save_metabox'), 10, 5 ); 
            
        }

        /*
        * Function for register a post type
        */
        public function aam_register_post_type() {

            $plural_name    = $this->post_type_name;
            $singular_name  = $this->singular_name;
            $slug           = $this->post_type_slug;

            $labels = array(
                'name'               => sprintf( __( '%s', AAM_TEXT_DOMAIN ), $plural_name ),
                'singular_name'      => sprintf( __( '%s', AAM_TEXT_DOMAIN ), $singular_name ),
                'menu_name'          => sprintf( __( '%s', AAM_TEXT_DOMAIN ), $plural_name ),
                'all_items'          => sprintf( __( '%s', AAM_TEXT_DOMAIN ), $plural_name ),
                'add_new'            => __( 'Create Ad', AAM_TEXT_DOMAIN ),
                'add_new_item'       => sprintf( __( 'Create New %s', AAM_TEXT_DOMAIN ), $singular_name ),
                'edit_item'          => sprintf( __( 'Edit %s', AAM_TEXT_DOMAIN ), $singular_name ),
                'new_item'           => sprintf( __( 'New %s', AAM_TEXT_DOMAIN ), $singular_name ),
                'view_item'          => sprintf( __( 'View %s', AAM_TEXT_DOMAIN ), $singular_name ),
                'search_items'       => sprintf( __( 'Search %s', AAM_TEXT_DOMAIN ), $plural_name ),
                'not_found'          => sprintf( __( 'No %s found', AAM_TEXT_DOMAIN ), $plural_name ),
                'not_found_in_trash' => sprintf( __( 'No %s found in Trash', AAM_TEXT_DOMAIN ), $plural_name ),
                'parent_item_colon'  => sprintf( __( 'Parent %s:', AAM_TEXT_DOMAIN ), $singular_name )
            );

            /*
            * Default Options
            */
            $defaults = array(
                'labels' => $labels,
                'public' => true,
                'supports' => array('title'), 
                'rewrite' => array(
                    'slug' => $slug,
                )
            );

            register_post_type( $slug, $defaults );

        }
        
        /*
        * Settings Page
        */ 
        function aam_settings_menu(){
            
            // Settings Page
            add_submenu_page(
                'edit.php?post_type='.$this->post_type_slug,
                'Settings',
                'Settings',
                'manage_options',
                'aam-settings',
                array(&$this,'aam_settings_cb') );
            
            // Configuration Page
            add_submenu_page(
                'edit.php?post_type='.$this->post_type_slug,
                'Documentation',
                'Documentation',
                'manage_options',
                'aam-documentation',
                array(&$this,'aam_settings_cb') );
 
        }
        
        
         /*
         * Register Settings Callback
         */  
         function aam_settings_cb(){
         ?>

        <?php require_once AAM_PLUGIN_DIR . 'include/admin/awesome-ads-settings-submit.php'; ?>

            <div class="wrap aam_settings_wrapper">

                <h1><?php echo AAN_PLUGIN_NAME; ?> Settings | Version: <?php echo AAM_PLUGIN_VERSION; ?></h1>             
                
                <?php require_once AAM_PLUGIN_DIR . 'include/admin/awesome-ads-settings-buttons.php'; ?>

                    <form action="" method="post" enctype="multipart/form-data" class="aam_settings_form">
                        <input type="submit" name="update_aam_settings" value="Update Settings" class="button button-primary" />
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <th scope="row">Code for header and footer</th>
                                <td>
                                    <p>Put this code after the opening body tag or wherever you want to show top ads. <code>&lt;?php do_action('aamfw_top_ad');  ?&gt;</code></p>
                                    <p>Put this code before the closing body tag or wherever you want to show footer ads. <code>&lt;?php do_action('aamfw_bottom_ad');  ?&gt;</code></p>
                                </td>
                            </tr>      
                            <tr>
                                <th scope="row">Post Types</th>
                                <td>
                                    <?php
                                    
                                    $post_types = get_post_types(); 
                                    if($post_types) { 
                                    ?>
                                    <ul class="aam_inline_list">
                                        <?php 
                                        // Excluded Post Types
                                        $excluded_posttype = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','aam_create_ad'); 
                                        
                                        foreach($post_types as $post_type_key => $post_type_val) { 
                                        if(!in_array($post_type_key,$excluded_posttype)) {  
                                        ?>
                                        <li>
                                            <input type="checkbox" name="aam_post_types[]" <?php $this->aam_checked($aam_post_types, $post_type_key ); ?> value="<?php echo $post_type_key; ?>" id="aam_post_types_<?php echo $post_type_key; ?>" /><label for="aam_post_types_<?php echo $post_type_key; ?>"><?php echo $post_type_val; ?></label>                                            
                                        </li>
                                        <?php } 
                                        }
                                        ?>
                                    </ul>
                                    <?php } ?>
                                </td>
                            </tr>  
                            
                            <tr>
                                <th scope="row">Sidebar(Right Or Left)</th>
                                <td>
                                    <?php
                                    
                                    global $wp_registered_sidebars;
                                    if($wp_registered_sidebars) { 
                                    ?>
                                    <ul class="aam_inline_list">
                                        <?php 
                                        
                                        foreach($wp_registered_sidebars as $sidebar_key => $sidebar_val) { 
                                            $sidebar_name = $sidebar_val['name'];
                                        ?>
                                        <li>
                                            <input type="checkbox" name="aam_sidebar[]" <?php $this->aam_checked($aam_sidebar, $sidebar_key ); ?> value="<?php echo $sidebar_key; ?>" id="aam_sidebar_<?php echo $sidebar_key; ?>" /><label for="aam_sidebar_<?php echo $sidebar_key; ?>"><?php echo $sidebar_name; ?></label>                                            
                                        </li>
                                        <?php } 
                                        ?>
                                    </ul>
                                    <?php } else {
                                        echo '<p>Sidebar not found.</p>';
                                    } ?>
                                </td>
                            </tr>  
                            <tr>
                                <th scope="row">Show/Hide Ads</th>
                                <td>
                                    
                                    <ul class="aam_inline_list">
                                        <li>
                                            <input type="checkbox" name="aam_hide_top_ad" <?php checked($aam_hide_top_ad, 'yes' ); ?> value="yes" id="aam_hide_top_ad" /><label for="aam_hide_top_ad">Hide Top Ad</label>                                            
                                        </li>
                                        <li>
                                            <input type="checkbox" name="aam_hide_bottom_ad" <?php checked($aam_hide_bottom_ad, 'yes' ); ?> value="yes" id="aam_hide_bottom_ad" /><label for="aam_hide_bottom_ad">Hide Bottom Ad</label>                                            
                                        </li>
                                        <li>
                                            <input type="checkbox" name="aam_hide_before_content_ad" <?php checked($aam_hide_before_content_ad, 'yes' ); ?> value="yes" id="aam_hide_before_content_ad" /><label for="aam_hide_before_content_ad">Before Content Ads</label>                                            
                                        </li>
                                        <li>
                                            <input type="checkbox" name="aam_hide_after_content_ad" <?php checked($aam_hide_after_content_ad, 'yes' ); ?> value="yes" id="aam_hide_after_content_ad" /><label for="aam_hide_after_content_ad">After Content Ads</label>                                            
                                        </li>
                                        <li>
                                            <input type="checkbox" name="aam_hide_before_sidebar_ad" <?php checked($aam_hide_before_sidebar_ad, 'yes' ); ?> value="yes" id="aam_hide_before_sidebar_ad" /><label for="aam_hide_before_sidebar_ad">Before Sidebar Ads</label>                                            
                                        </li>
                                        <li>
                                            <input type="checkbox" name="aam_hide_after_sidebar_ad" <?php checked($aam_hide_after_sidebar_ad, 'yes' ); ?> value="yes" id="aam_hide_after_sidebar_ad" /><label for="aam_hide_after_sidebar_ad">After Sidebar Ads</label>                                            
                                        </li>
                                    </ul>
                                    
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Page Top Ad</th>
                                <td>
                                    <textarea name="html_script_top" id="html_script_top" placeholder="HTML/Script"><?php echo $html_script_top; ?></textarea>
                                    <?php if($html_script_top!='') { ?>
                                    <div class="aam_preview_ads">
                                        <?php echo $html_script_top; ?>
                                    </div>
                                    <?php } ?>
                                </td>                                
                            </tr>    
                            <tr>
                                <th scope="row">Page Bottom Ad</th>
                                <td>
                                    <textarea name="html_script_bottom" id="html_script_bottom" placeholder="HTML/Script"><?php echo $html_script_bottom; ?></textarea>
                                    <?php if($html_script_bottom!='') { ?>
                                    <div class="aam_preview_ads">
                                        <?php echo $html_script_bottom; ?>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>    
                            <tr>
                                <th scope="row">Before Content Ad</th>
                                <td>
                                    <textarea name="html_script_before_content" id="html_script_before_content" placeholder="HTML/Script"><?php echo $html_script_before_content; ?></textarea>
                                       <?php if($html_script_before_content!='') { ?>
                                    <div class="aam_preview_ads">
                                        <?php echo $html_script_before_content; ?>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>    
                            <tr>
                                <th scope="row">After Content Ad</th>
                                <td>
                                    <textarea name="html_script_after_content" id="html_script_after_content" placeholder="HTML/Script"><?php echo $html_script_after_content; ?></textarea>
                                       <?php if($html_script_after_content!='') { ?>
                                    <div class="aam_preview_ads">
                                        <?php echo $html_script_after_content; ?>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>    
                            <tr>
                                <th scope="row">Before Sidebar Ad</th>
                                <td>
                                    <textarea name="html_script_before_sidebar" id="html_script_before_sidebar" placeholder="HTML/Script"><?php echo $html_script_before_sidebar; ?></textarea>
                                       <?php if($html_script_before_sidebar!='') { ?>
                                    <div class="aam_preview_ads">
                                        <?php echo $html_script_before_sidebar; ?>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>    
                            <tr>
                                <th scope="row">After Sidebar Ad</th>
                                <td>
                                    <textarea name="html_script_after_sidebar" id="html_script_after_sidebar" placeholder="HTML/Script"><?php echo $html_script_after_sidebar; ?></textarea>
                                       <?php if($html_script_after_sidebar!='') { ?>
                                    <div class="aam_preview_ads">
                                        <?php echo $html_script_after_sidebar; ?>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>    
                            </tbody>
                        </table>
                        <input type="submit" name="update_aam_settings" value="Update Settings" class="button button-primary" />

                    </form>


            </div>

         <?php 
         
        }
         
        /*
        * Admin Styles and Scripts
        */     
        public function aam_admin_scripts($hook) { 

            wp_enqueue_media();
            wp_enqueue_style( 'aam-admin-style', AAM_PLUGIN_URL.'css/aam-admin-style.css' );
            wp_enqueue_script( 'aam-admin-script', AAM_PLUGIN_URL.'js/aam-admin-script.js' );

        }
        
        /*
        * Check if an array as output for checkbox
        */ 
        function aam_checked($array, $current) {
            if(is_array($array) && in_array($current, $array)) {
                $current = $array = 1;
                checked($array, $current);
            } else {
                // empty
            }
        }
        
        /*
        * Meta Field
        */
        function aam_register_metabox() {
            
            // Options for custom post types
            $screens = get_option('aam_post_types');
            if($screens) {
                foreach($screens as $screen) {
                    add_meta_box( 'aam_meta_box', 'Awesome Ads Options', array(&$this, 'aam_metabox_callback'), $screen,'normal', 'high' );
                }
            }
            
            // Options for create ads
            add_meta_box( 'aam_meta_box', 'Awesome Ads Options', array(&$this, 'aam_custom_ads_metabox_callback'), $this->post_type_slug,'normal', 'high' );
        }
        
        /*
         * Meta Box Call Back Function For Custom Post Types
         */
        function aam_metabox_callback($post) {
            
            $post_id = $post->ID; 
            
            $aam_select_ads_option = get_post_meta($post_id, 'aam_select_ads_option', true);
            
            if($aam_select_ads_option=='') {
                $aam_select_ads_option = 'aam_ads_random_option';
            }
            
            $aam_post_html_before = get_post_meta($post_id, 'aam_post_html_before', true);
            if($aam_post_html_before=='') {
                $aam_post_html_before     = get_option(AAM_PLUGIN_PREFIX.'html_script_before_content');
            }
            
            $aam_post_html_after = get_post_meta($post_id, 'aam_post_html_after', true);
            if($aam_post_html_after=='') {
                $aam_post_html_after      = get_option(AAM_PLUGIN_PREFIX.'html_script_after_content');
            }
            
            $aam_select_ad_before = get_post_meta($post_id, 'aam_select_ad_before', true);
            $aam_select_ad_after = get_post_meta($post_id, 'aam_select_ad_after', true);
            
            // Meta Fields HTML 
            require_once AAM_PLUGIN_DIR . 'include/admin/awesome-ads-posts-metafields.php'; 
            
            
        }
        
        /*
         * Custom Ads Posts Options
         */
        public function aam_custom_ads_metabox_callback($post) {
         
             $post_id = $post->ID;     
            
             $aam_ad_type = get_post_meta($post_id,'aam_ad_type',true);   
             if($aam_ad_type=='') {
                 $aam_ad_type = 'aam_custom_ad';
             }
             
             
             $aam_ad_banner_url = get_post_meta($post_id,'aam_ad_banner_url',true);   
             $aam_ad_external_url = get_post_meta($post_id,'aam_ad_external_url',true);   
             
             $aam_custom_ad_html_script = get_post_meta($post_id,'aam_custom_ad_html_script',true);   
             
             $aam_ad_position_radio = get_post_meta($post_id,'aam_ad_position_radio',true);   
             
             // Create Ads HTML 
             require_once AAM_PLUGIN_DIR . 'include/admin/awesome-ads-create-ads-metafields.php'; 
        }
        
        /**
        * Save meta box content.
        */
        public function aam_save_metabox( $post_id ) {

            // Create Ads
            if ( isset( $_POST['aam_ad_type'] ) ) {
                update_post_meta( $post_id, 'aam_ad_type',  $_POST['aam_ad_type'] );
            }
            if ( isset( $_POST['aam_ad_external_url'] ) ) {
                update_post_meta( $post_id, 'aam_ad_external_url',  $_POST['aam_ad_external_url'] );
            }
            if ( isset( $_POST['aam_ad_banner_url'] ) ) {
                update_post_meta( $post_id, 'aam_ad_banner_url',  $_POST['aam_ad_banner_url'] );
            }
            if ( isset( $_POST['aam_select_ads_option'] ) ) {
                update_post_meta( $post_id, 'aam_select_ads_option',  $_POST['aam_select_ads_option'] );
            }
            if ( isset( $_POST['aam_ad_position_radio'] ) ) {
                update_post_meta( $post_id, 'aam_ad_position_radio',  $_POST['aam_ad_position_radio'] );
            }
            if ( isset( $_POST['aam_post_html_script'] ) ) {
                update_post_meta( $post_id, 'aam_post_html_script',  stripslashes($_POST['aam_post_html_script']));
            }
            if ( isset( $_POST['aam_list_ad_id'] ) ) {
                update_post_meta( $post_id, 'aam_list_ad_id',  $_POST['aam_list_ad_id'] );
            }
            if ( isset( $_POST['aam_custom_ad_html_script'] ) ) {
                update_post_meta( $post_id, 'aam_custom_ad_html_script',  stripslashes($_POST['aam_custom_ad_html_script']) );
            }

            // Posts Ads
            if ( isset( $_POST['aam_ads_random_option'] ) ) {
                update_post_meta( $post_id, 'aam_ads_random_option',  $_POST['aam_ads_random_option'] );
            }
            if ( isset( $_POST['aam_select_ads_option'] ) ) {
                update_post_meta( $post_id, 'aam_select_ads_option',  $_POST['aam_select_ads_option'] );
            }
            if ( isset( $_POST['aam_post_html_before'] ) ) {
                update_post_meta( $post_id, 'aam_post_html_before',  $_POST['aam_post_html_before'] );
            }
            if ( isset( $_POST['aam_post_html_after'] ) ) {
                update_post_meta( $post_id, 'aam_post_html_after',  $_POST['aam_post_html_after'] );
            }
            if ( isset( $_POST['aam_select_ad_before'] ) ) {
                update_post_meta( $post_id, 'aam_select_ad_before',  $_POST['aam_select_ad_before'] );
            }
            if ( isset( $_POST['aam_select_ad_after'] ) ) {
                update_post_meta( $post_id, 'aam_select_ad_after',  $_POST['aam_select_ad_after'] );
            }
        } 
        
        
    }
    
}

$Awesome_Ads_Manager_Admin = new Awesome_Ads_Manager_Admin(); 
