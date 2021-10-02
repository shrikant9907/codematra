<?php 
 
    // Update Settings
    if(isset($_POST['update_aam_settings'])) {
        
        // Select Fields
        if(isset($_POST['aam_post_types'])) {
            $aam_post_types             = $_POST['aam_post_types'];
        } else {
            $aam_post_types[] = 'post';
        } 
        
        if(isset($_POST['aam_sidebar'])) {
            $aam_sidebar                = $_POST['aam_sidebar'];
        } else {
            $aam_sidebar                = '';
        }
        
        // Ads Show/hide field
        if(isset($_POST['aam_hide_top_ad'])) {
            $aam_hide_top_ad            = $_POST['aam_hide_top_ad'];
        } else {
            $aam_hide_top_ad = 'no';
        }
        
        if(isset($_POST['aam_hide_bottom_ad'])) {
            $aam_hide_bottom_ad            = $_POST['aam_hide_bottom_ad'];
        } else {
            $aam_hide_bottom_ad = 'no';
        }
        
        if(isset($_POST['aam_hide_before_content_ad'])) {
            $aam_hide_before_content_ad            = $_POST['aam_hide_before_content_ad'];
        } else { 
            $aam_hide_before_content_ad = 'no';
        }
        
        if(isset($_POST['aam_hide_after_content_ad'])) {
            $aam_hide_after_content_ad            = $_POST['aam_hide_after_content_ad'];
        } else {
            $aam_hide_after_content_ad = 'no';
        }
        
        if(isset($_POST['aam_hide_before_sidebar_ad'])) {
            $aam_hide_before_sidebar_ad            = $_POST['aam_hide_before_sidebar_ad'];
        } else {
            $aam_hide_before_sidebar_ad = 'no';
        }
        
        if(isset($_POST['aam_hide_after_sidebar_ad'])) {
            $aam_hide_after_sidebar_ad            = $_POST['aam_hide_after_sidebar_ad'];
        } else {
            $aam_hide_after_sidebar_ad = 'no';
        }
        
        // Content Fields
        $html_script_top                = stripslashes($_POST['html_script_top']);
        $html_script_bottom             = stripslashes($_POST['html_script_bottom']);
        $html_script_before_content     = stripslashes($_POST['html_script_before_content']);
        $html_script_after_content      = stripslashes($_POST['html_script_after_content']);
        $html_script_before_sidebar     = stripslashes($_POST['html_script_before_sidebar']);
        $html_script_after_sidebar      = stripslashes($_POST['html_script_after_sidebar']);
        
        // Update Select Field
        update_option('aam_post_types', $aam_post_types);         
        update_option('aam_sidebar', $aam_sidebar);         
        
        // Update Ads Show/hide Fields
        update_option('aam_hide_top_ad', $aam_hide_top_ad); 
        update_option('aam_hide_bottom_ad', $aam_hide_bottom_ad); 
        update_option('aam_hide_before_content_ad', $aam_hide_before_content_ad); 
        update_option('aam_hide_after_content_ad', $aam_hide_after_content_ad); 
        update_option('aam_hide_before_sidebar_ad', $aam_hide_before_sidebar_ad); 
        update_option('aam_hide_after_sidebar_ad', $aam_hide_after_sidebar_ad); 
        
        // Update Content Settings
        update_option(AAM_PLUGIN_PREFIX.'html_script_top', $html_script_top); 
        update_option(AAM_PLUGIN_PREFIX.'html_script_bottom', $html_script_bottom); 
        update_option(AAM_PLUGIN_PREFIX.'html_script_before_content', $html_script_before_content); 
        update_option(AAM_PLUGIN_PREFIX.'html_script_after_content', $html_script_after_content); 
        update_option(AAM_PLUGIN_PREFIX.'html_script_before_sidebar', $html_script_before_sidebar); 
        update_option(AAM_PLUGIN_PREFIX.'html_script_after_sidebar', $html_script_after_sidebar); 
        
    }
    
        // Get Field Settings
        $aam_post_types                 = get_option('aam_post_types');

        $aam_sidebar                    = get_option('aam_sidebar');
        
        // Get Show/Hide Settings
        $aam_hide_top_ad                = get_option('aam_hide_top_ad');
        $aam_hide_bottom_ad             = get_option('aam_hide_bottom_ad');
        $aam_hide_before_content_ad     = get_option('aam_hide_before_content_ad');
        $aam_hide_after_content_ad      = get_option('aam_hide_after_content_ad');
        $aam_hide_before_sidebar_ad     = get_option('aam_hide_before_sidebar_ad');
        $aam_hide_after_sidebar_ad      = get_option('aam_hide_after_sidebar_ad');

        // Get Content Settings    
        $html_script_top                = get_option(AAM_PLUGIN_PREFIX.'html_script_top');
        $html_script_bottom             = get_option(AAM_PLUGIN_PREFIX.'html_script_bottom');
        $html_script_before_content     = get_option(AAM_PLUGIN_PREFIX.'html_script_before_content');
        $html_script_after_content      = get_option(AAM_PLUGIN_PREFIX.'html_script_after_content');
        $html_script_before_sidebar     = get_option(AAM_PLUGIN_PREFIX.'html_script_before_sidebar');
        $html_script_after_sidebar      = get_option(AAM_PLUGIN_PREFIX.'html_script_after_sidebar');

