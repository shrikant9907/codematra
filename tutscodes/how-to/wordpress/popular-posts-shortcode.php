<?php 
/* 
* Show Popular Posts with visit counts | Site - https://codematra.com/
*/
add_shortcode('cmPopularPostsList' ,'popularPostsCodematra');
function popularPostsCodematra($atts) {

  extract(shortcode_atts(array(
    'show_counts' => true,
    'show_heading'    => true,
    'post_type'       => 'post',
    'heading'         => 'Popular Posts',
    'posts_per_page'  => 5,
  ), $atts));

  $posts = get_posts(array(
    'post_type'       => $post_type,
    'posts_per_page'  => $posts_per_page,
    'meta_key'        => 'visit_counts', 
    'order'           => 'DESC',
    'orderby'         => 'meta_value_num',
  ));
  
  if ($show_heading) {
    $output = '<h2 class="text-primary">'.$heading.'</h2>';
  } else {
    $output = '';
  }
  if ( ! empty( $posts ) ) {
    $output .= '<ul>';
    foreach( $posts as $post ) {
      $postID = $post->ID;
      $postTitle = $post->post_title;
      $visitsCount = get_post_meta($postID, 'visit_counts', true);
      $output .= '<li class="position-relative d-flex align-items-center justify-content-between" >';
      $output .= '<a class="text-dark" href="' . esc_url( get_permalink( $postID ) ) . '" >' . esc_html( $postTitle ) . '</a> ';
      if ($show_counts) {
        $output .= '<span class="badge bg-primary"><i class="fas fa-eye mr_5"></i>'.$visitsCount.'</span>';
      }
      $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
  }
}
