jQuery(document).ready(function($) {
    
    // Media Uploader
    jQuery('#set_banner_image').click(function(event) {
        event.preventDefault();
        
         var mediaUploader;
         var button_clicked = jQuery(this);
        
            // Reopen Media Uploader if already open
            if (mediaUploader) {
              mediaUploader.open();
              return;
            }
            // Extend the wp.media object
            mediaUploader = wp.media.frames.file_frame = wp.media({
              title: 'Banner Image',
              button: {
              text: 'Set Banner Image'
            }, multiple: false });

            // Add Return URL to Text Field
            mediaUploader.on('select', function() {
              var attachment = mediaUploader.state().get('selection').first().toJSON();
              var image_url = attachment.url;
              button_clicked.prev('.aam_banner_image').remove();
              button_clicked.before('<div class="aam_banner_image"><img src="'+image_url+'" alt="" /></div>').text('Update Banner Image');
              button_clicked.next().val(image_url).addClass('aam_disabled   ');
            });
            // Open the uploader dialog
            mediaUploader.open();

    });
    
    
    // Tab Ads Type Select
    var aam_custom_ad_button = jQuery('#aam_custom_ad');
    var aam_html_ad_button = jQuery('#aam_html_script_ad');
    var aam_custom_ad_fields = jQuery('.aam_custom_ad_fields');
    var aam_html_ad_fields = jQuery('.aam_html_script_ad_fields');
    
    jQuery('.aam_ad_type_radio').each(function(){
        if(jQuery(this).is(':checked')) {
            var thisval = jQuery(this).val(); 
            if(thisval==='aam_custom_ad') {
                aam_html_ad_fields.hide(); 
                aam_custom_ad_fields.show();                
            }
            if(thisval==='aam_html_script_ad') {
                aam_custom_ad_fields.hide();
                aam_html_ad_fields.show(); 
            }
        }
    });
    
    aam_custom_ad_button.click(function(){
        aam_html_ad_fields.hide(); 
        aam_custom_ad_fields.show();  
    });
    
    aam_html_ad_button.click(function(){
        aam_custom_ad_fields.hide();
        aam_html_ad_fields.show(); 
    });
    
    // Post, Page or Custom Post Type Fields
    var aam_ads_random_option = jQuery('#aam_ads_random_option');
    var aam_ads_list_option = jQuery('#aam_ads_list_option');
    var aam_ads_html_option = jQuery('#aam_ads_html_option');
    
    var aam_ads_html_field = jQuery('.aam_ads_html_field');
    var aam_select_ad_field = jQuery('.aam_select_ad_field');
    
    jQuery('.aam_select_ads_option').each(function(){
        if(jQuery(this).is(':checked')) {
            var thisval = jQuery(this).val(); 
            if(thisval==='aam_ads_list_option') {
                aam_ads_html_field.hide(); 
                aam_select_ad_field.show();                
            }
            if(thisval==='aam_ads_html_option') {
                aam_select_ad_field.hide();
                aam_ads_html_field.show(); 
            }
            if(thisval==='aam_ads_random_option') {
                aam_select_ad_field.hide();
                aam_ads_html_field.hide(); 
            }
        }
    });
    
    aam_ads_random_option.click(function(){
        aam_ads_html_field.hide(); 
        aam_select_ad_field.hide();  
    });
    aam_ads_list_option.click(function(){
        aam_ads_html_field.hide(); 
        aam_select_ad_field.show();  
    });
    aam_ads_html_option.click(function(){
        aam_select_ad_field.hide();  
        aam_ads_html_field.show(); 
    });
 
    
    
});