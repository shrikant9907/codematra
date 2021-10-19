<?php 

add_action( 'wp_ajax_download_counter', 'download_counter_function' );
add_action( 'wp_ajax_nopriv_download_counter', 'download_counter_function' );
function download_counter_function() {
    
    $postid = $_POST['id']; 
    $downloadCount = get_post_meta($postid,'template_download_count',true);
    
    if($downloadCount) {
      $downloadCount++;
      update_post_meta($postid,'template_download_count',$downloadCount);       
    } else { 
      update_post_meta($postid,'template_download_count', 1);       
    }

    return $downloadCount;
    wp_die();
}