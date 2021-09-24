<?php
/* 
* Add category name as the body class for posts in WordPress | Site - codematra.com
*/
add_filter('body_class','addCategoryAsBodyClass');
function addCategoryAsBodyClass($classes) {
  // Check if post single page
  if (is_single()) {
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
      foreach( $categories as $category) {
        $classes[] = sanitize_title($category->name);
      }
    }
  }
  return $classes;   
}