<?php

/*
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "You Can not access this page directly." );

/*
 * Admin Settngs File
 */
require_once AAM_PLUGIN_DIR . 'include/admin/class-awesome-ads-manager-admin.php';

/**
 * Class for Awesome Ads Manager Admin
 */
if ( ! class_exists( 'Awesome_Ads_Manager_Frontend' ) ) {
    
    /*
    * Class for the Scheduler
    */
    class  Awesome_Ads_Manager_Frontend extends Awesome_Ads_Manager_Admin { 
        
        
        /*
        * Construct Function
        */
        public function __construct() {

            // Before and After Content
            //add_filter( 'the_content', array(&$this, 'aam_content_before_after_ads')); 
            //d_filter( 'the_excerpt', array(&$this, 'aam_content_before_after_ads')); 
            
            // Before and After Sidebar
            add_action( 'dynamic_sidebar_before', array(&$this, 'aam_sidebar_before_ads'));
            add_action( 'dynamic_sidebar_after', array(&$this, 'aam_sidebar_after_ads'));
                
            // Front End Script
            add_action( 'wp_enqueue_scripts', array(&$this, 'aam_frontend_scripts'), 0 ); 
            
            // Header Top Ad
            add_action('aamfw_top_ad', array(&$this, 'aamfw_top_ad_function'));
            
            // Footer Bottom Ad
            add_action('aamfw_bottom_ad', array(&$this, 'aamfw_bottom_ad_function'));
            
            // Display Ad Shortcode
            add_shortcode('aam_display_ad', array(&$this, 'aam_display_ad_shortcode'));


        }
        
        /*
         * Content Before After Ads
         */
        public function aam_content_before_after_ads($content) {
            global $post;

            $post_id = $post->ID;
            $posttype = $post->post_type;
            $post_content = $post->post_content;
            
            // Content Section for single and listing page
            if(is_single()) {
                $content = $post_content;
            } else {
                if($posttype!='page')
                $content = wp_trim_words(strip_shortcodes($post_content),105); 
            }
            
            $output = '';
            
            // Before After Options
            $hide_before_ad     = get_option('aam_hide_before_content_ad');
            $hide_after_ad      = get_option('aam_hide_after_content_ad');

            // Before After Ads
            $before_content     = get_option(AAM_PLUGIN_PREFIX.'html_script_before_content');
            $after_content      = get_option(AAM_PLUGIN_PREFIX.'html_script_after_content');
            
            // Before Content
            if($hide_before_ad=='no') {
                $output .= '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$before_content.'</div></div>';
            }
            
            $output .= $content;
            
            // After Content
            if($hide_after_ad=='no') {
                $output .= '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$after_content.'</div></div>';
            }

            return $output;
            
        }
        
        /*
         * Sidebar Before Ad         
         */
        public function aam_sidebar_before_ads($index) {
            
                $before_sidebar_ad     = get_option('aam_hide_before_sidebar_ad');
                $aam_sidebar           = get_option('aam_sidebar');
                $html_script_before_sidebar     = get_option(AAM_PLUGIN_PREFIX.'html_script_before_sidebar');
                 
                 if(($before_sidebar_ad=='no') && (is_array($aam_sidebar)) && (in_array($index,$aam_sidebar))) {
                     echo '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$html_script_before_sidebar.'</div></div>';
                 }
            
        }

        /*
         * Sidebar After Ad         
         */
        public function aam_sidebar_after_ads($index) {

                $after_sidebar_ad      = get_option('aam_hide_after_sidebar_ad');
                $aam_sidebar           = get_option('aam_sidebar');
                $html_script_after_sidebar      = get_option(AAM_PLUGIN_PREFIX.'html_script_after_sidebar');
                
                if(($after_sidebar_ad=='no') && (is_array($aam_sidebar)) && (in_array($index,$aam_sidebar))) {
                     echo '<div class="aam_ads_wrap"> <div class="aam_aligned_center_ad">'.$html_script_after_sidebar.'</div></div>';
                }
        }
        
        /*
        * Front End Styles and Scripts
        */     
        public function aam_frontend_scripts($hook) { 

            wp_enqueue_style( 'aam-style', AAM_PLUGIN_URL.'css/aam-style.css' );
            wp_enqueue_script( 'aam-script', AAM_PLUGIN_URL.'js/aam-script.js' );

            wp_localize_script('aam-script', 'local', array(
                'ajaxurl' => admin_url('admin-ajax.php')
            ));

        }

        /*
         * Function Header Top Ads
         */
        public function aamfw_top_ad_function() {
         
            $html_script_top                = get_option(AAM_PLUGIN_PREFIX.'html_script_top');
           
            if($html_script_top!='') {
                echo '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$html_script_top.'</div></div>';
            } else {
                 $this->aam_get_random_ads('aam_ad_page_top_bottom'); 
            }
            
        }
        
        /*
         * Function Footer Bottom Ads
         */
        public function aamfw_bottom_ad_function() {
        
            $html_script_bottom             = get_option(AAM_PLUGIN_PREFIX.'html_script_bottom');

            if($html_script_bottom!='') {
                echo '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$html_script_bottom.'</div></div>';
            } else {
                $this->aam_get_random_ads('aam_ad_page_top_bottom');    
            } 
            
        }
        
        /*
         * Get Random Top Ads
         */
        public function aam_get_random_ads($metavalue) {
         
                $args = array(
                    'post_type'=> $this->post_type_slug, 
                    'posts_per_page'=> 1,
                    'meta_key' => 'aam_ad_position_radio',
                    'meta_value' => $metavalue,
                    'orderby' => 'rand'
                );
                $aam_ads_list = get_posts($args); 
                if($aam_ads_list) {
                    
                    foreach($aam_ads_list as $aam_ad) {
                        
                        $post_id = $aam_ad->ID;
                        $aam_ad_type = get_post_meta($post_id,'aam_ad_type',true);  
                        
                        if($aam_ad_type=='aam_custom_ad') {
                            
                            $aam_ad_banner_url = get_post_meta($post_id,'aam_ad_banner_url',true);   
                            $aam_ad_external_url = get_post_meta($post_id,'aam_ad_external_url',true);  
                            echo '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">';
                            echo '<a target="_blank" href="'.$aam_ad_external_url.'"><img src="'.$aam_ad_banner_url.'" alt="" /></a>';    
                            echo '</div></div>'; 
                            
                        } else {
                            
                            $aam_custom_ad_html_script = get_post_meta($post_id,'aam_custom_ad_html_script',true);   
                            echo '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$aam_custom_ad_html_script.'</div></div>';
                            
                        }

                    }
                }
            
        }
        
        /*
        * Shortcode for adding image with anchor
        */
        function aam_display_ad_shortcode($atts) {
            extract(shortcode_atts(array(
                'ad_id' => '',
                'ad_show' => 'rand',
                'ad_type' => 'content',
                'target' => '_blank',
            ), $atts));
            $outputad = '';
            if($ad_id!='') {
                $aam_ad_type = get_post_meta($ad_id,'aam_ad_type',true); 
                if($aam_ad_type=='aam_custom_ad') {
                    $img_src = get_post_meta($ad_id,'aam_ad_banner_url',true);   
                    $anc_href = get_post_meta($ad_id,'aam_ad_external_url',true);  
                    $ads_content = '<a href="'.$anc_href.'"><img src="'.$img_src.'" /></a>';
                    $outputad =  '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$ads_content.'</div></div>';
                } else {
                    $aamhtml = get_post_meta($ad_id,'aam_custom_ad_html_script',true);   
                    $outputad = '<div class="aam_ads_wrap"><div class="aam_aligned_center_ad">'.$aamhtml.'</div></div>';
                }
            } else if($ad_show=='rand') {
                ob_start(); 
                if($ad_type=='content') {
                    $this->aam_get_random_ads('aam_ad_content_before_after');
                } else if($ad_type=='sidebar') {
                    $this->aam_get_random_ads('aam_ad_sidebar_before');
                } else if($ad_type=='sidebarafter') {
                    $this->aam_get_random_ads('aam_ad_sidebar_after');
                } else if($ad_type=='topbottom') {
                    $this->aam_get_random_ads('aam_ad_page_top_bottom');
                } 
                $outputad = ob_get_clean(); 
            }

            return $outputad;    
        }

        
    }
    
}

$Awesome_Ads_Manager_Frontend = new Awesome_Ads_Manager_Frontend(); 