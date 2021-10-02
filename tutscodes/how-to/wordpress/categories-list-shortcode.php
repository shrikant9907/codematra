<?php 
/*
* Add Categories List with Post Counts in WordPress  | Site - https://codematra.com/
*/
add_shortcode('cmCategoriesList', 'categories_list_codematra');
function categories_list_codematra($atts) {
  extract(shortcode_atts(array(
    'show_counts' => true,
    'show_heading' => true,
    'heading' => 'Categories',
  ), $atts));

  $categories = get_categories(); 
  $output = '<div class="categories-list-codematra">';
  if ($show_heading) {
    $output .= '<h2 class="text-primary">'.$heading.'</h2>';
  }
  if ( ! empty( $categories ) ) {
    $output .= '<ul>';
    foreach( $categories as $category ) {
      $count = $category->category_count;
      $output .= '<li class="position-relative d-flex align-items-center justify-content-between" >';
      $output .= '<a class="text-dark" href="' . esc_url( get_category_link( $category->term_id ) ) . '" >' . esc_html( $category->name ) . '</a> ';
      if ($show_counts) {
        $output .= '<span class="badge bg-primary">'.$count.'</span>';
      }
      $output .= '</li>';
    }
    $output .= '</ul>';
    $output .= '</div>';
    return $output;
  }
}