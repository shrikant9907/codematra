<?php 
/*
* Shortcode for alerts
*/ 

add_shortcode('tutsAlert', 'tuts_alert');
function tuts_alert($atts = array(), $content = null) {
  extract(shortcode_atts(array(
    'type' => 'info',
    'uitype' => 'alertui1'
  ), $atts));
  $content = do_shortcode($content);
  ob_start();
  echo '<div class="alert alert-'.$type.' '.$uitype.'">'.$content.'</div>';
  return ob_get_clean();
}

/*
* Shortcode to display code files.
*/

add_shortcode('CodeBlockFile', 'code_block_file');
function code_block_file($atts) {

    extract(shortcode_atts(array(
      'mode' => 'php',
      'file' => 'programs/php/hello-world.php',
    ), $atts));

		ob_start();
    $themeLocation = ABSPATH . '/tutscodes/';
    $fileLocation = $themeLocation . $file;

    if (!file_exists($fileLocation)) {
      echo "File not exists.";
     /* $newCodeFile = fopen($fileLocation, 'w');
      $newCodeFileText = "<?php // Start writing your code here. ?>";
      fwrite($fileLocation, $newCodeFileText);
      fclose(); */
    } else {
      $fileContent = htmlspecialchars(file_get_contents($fileLocation));
      $randCode = rand(5,10);
    ?> 
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror/mode/xml.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror/mode/javascript.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror/mode/css.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror/mode/clike.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror/mode/php.js"></script> 
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/codemirror/mode/python.js"></script> 

      <textarea id='<?php echo $randCode; ?>'><?php echo $fileContent; ?></textarea>
      <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("<?php echo $randCode; ?>"), {
          lineNumbers: true,
          styleActiveLine: true,
          matchBrackets: true,
          mode: "<?php echo $mode; ?>",
          readOnly: true
      });
      </script> 
    <?php
    }
		return ob_get_clean();
} 

/*
* Shortcode interview questions
*/
// [showPostTerms post_type="" category="" taxonomy="" /]
add_shortcode('showPostTerms', 'posts_terms_shortcode');
function posts_terms_shortcode($atts) {

    extract(shortcode_atts(array(
      'post_type' => 'interview-questions',
      'category' => 'wordpress',
    	'taxonomy' => 'interview-questions-category',
    ), $atts));

		ob_start();

    $terms = get_terms( array( 
      'taxonomy' => $taxonomy,
      'parent'   => 0
    ) );
     
    if($terms) {
      echo '<div class="row">';
      foreach($terms as $term) {
        $termname = $term->name;
        $termLink = get_term_link($term);
        ?>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card relative cui2 text-uppercase min_h_200">
            <div class="cbody">
              <a class="d-block tdn f20 font_bold text-white overlay_b absolute d-flex flex center_center" href="<?php echo $termLink; ?>"><span><?php echo $termname; ?></span></a>
            </div>
          </div>
        </div>
        <?php
      }
      echo '</div>';
    }

		return ob_get_clean();
}

/*
* Show Categories with posts counts.
*/
// [categoriesList show_counts="false" show_heading="false" heading="Categories"]
add_shortcode('categoriesList', 'categories_list');
function categories_list($atts) {
  extract(shortcode_atts(array(
    'show_counts' => true,
    'show_heading' => true,
    'heading' => 'Categories',
  ), $atts));

  $categories = get_categories(); 
  if ($show_heading) {
    $output = '<h2 class="f20 font_bold text-primary">'.$heading.'</h2>';
  } else {
    $output = '';
  }
  if ( ! empty( $categories ) ) {
    $output .= '<ul>';
    foreach( $categories as $category ) {
      $count = $category->category_count;
        $output .= '<li class="relative d-flex align-items-center justify-content-between" >';
        $output .= '<a class="text-dark" href="' . esc_url( get_category_link( $category->term_id ) ) . '" >' . esc_html( $category->name ) . '</a> ';
        if ($show_counts) {
          $output .= '<span class="badge bg-primary static">'.$count.'</span>';
        }
        $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
  }
}

/*
* Show Popular Posts with visit counts
*/
add_shortcode('popularPostsList' ,'popular_posts_listing');
function popular_posts_listing($atts) {

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
    $output = '<h2 class="f20 font_bold text-primary">'.$heading.'</h2>';
  } else {
    $output = '';
  }
  if ( ! empty( $posts ) ) {
    $output .= '<ul>';
    foreach( $posts as $post ) {
      $postID = $post->ID;
      $postTitle = $post->post_title;
      $visitsCount = get_post_meta($postID, 'visit_counts', true);
      $output .= '<li class="relative d-flex align-items-center justify-content-between" >';
      $output .= '<a class="text-dark" href="' . esc_url( get_permalink( $postID ) ) . '" >' . esc_html( $postTitle ) . '</a> ';
      if ($show_counts) {
        $output .= '<span class="badge bg-primary static"><i class="fas fa-eye mr_5"></i>'.$visitsCount.'</span>';
      }
      $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
  }
}