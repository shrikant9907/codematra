<?php
/*
* Add pages in WordPress | Site - codematra.com 
*/

add_action('init', 'add_default_pages');
function add_default_pages()  {

  // Create an array of pages
  $pages = array (
    'Home',
    'About Us',
    'Contact Us',
    'Blog',
  );

  if ($pages) {
    foreach($pages as $page) {

      // Check if page already exists by matching the title
      $pageData = get_page_by_title( $page );
      if (!$pageData) {

        // Arguments for new page 
        $args = array(
          'post_title'    => wp_strip_all_tags( $page ),
          'post_content'  => '',
          'post_status'   => 'publish',
          'post_type'     => 'page',
        );         

        // Insert new page.
        wp_insert_post( $args );
      }

    }
  }
}