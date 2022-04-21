<?php 
/*
 * Set visits counts on posts, pages and custom post type. | site: codematra.com
 */
add_action('wp_head', 'setVistsCounts');
function setVistsCounts() {
  global $post;
  $postID = $post->ID;
  if ($postID):
    $visitKey = 'visit_counts';
    $visitCounts = get_post_meta($postID, $visitKey, true);
    
    if ($visitCounts != '' && $visitCounts >= 0):
      $visitCounts++;
      update_post_meta($postID, $visitKey, $visitCounts);
    else:
      $visitCounts = 1;
      delete_post_meta($postID, $visitKey);
      add_post_meta($postID, $visitKey, $visitCounts);
    endif;
    
  endif;
}