<?php 
/*
* Shortcode for Social Icons | Site: https://codematra.com/
*/ 
add_shortcode('cmSocial', 'cm_social');
function cm_social($atts = array(), $content = null) {
  extract(shortcode_atts(array(
    'type' => 'info',
    'heading' => "Like / Follow / Subscribe"
  ), $atts));
  $content = do_shortcode($content);
  ob_start();
  ?>
  <div class="card cui2 r_0 mb_20">
    <div class="cbody p-0">
      <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold"><?php echo $heading; ?></h3>
      <ul class="socialicons siconsb px_15 pt_10 pb_5"> 
        <li class="facebook"><a href="https://www.facebook.com/codematra" title="Code Matra - Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li class="codepen"><a href="https://codepen.io/codematra" title="Code Pen - Code Matra" target="_blank"><i class="fab fa-codepen"></i></a></li>
        <li class="youtube"><a href="https://www.youtube.com/channel/UCbD6k-T54c8I-8UI0vqQ79Q" title="Code Matra - Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
        <!-- <li class="twitter"><a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li> -->
        <li class="instagram"><a href="https://www.instagram.com/codematra/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
      </ul>
    </div>  
  </div>
  <?php 
  return ob_get_clean();
}

/*
* Shortcode for alerts | Site: https://codematra.com/
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
* Shortcode for Buttons | Site: https://codematra.com/
*/ 
// [cmButton link="#" label="Demo" target="_blank"]
add_shortcode('cmButton', 'cm_button');
function cm_button($atts = array()) {
  extract(shortcode_atts(array(
    'label' => 'Button',
    'classes' => 'btn btn-primary btnui3 mb_20',
    'link' => '#',
    'target' => '_self',
    ), $atts));

  ob_start();
  echo "<a class='$classes' target='$target' href='$link'>$label</a>";
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
      <pre><code class="language-<?php echo $mode; ?>"><?php echo $fileContent; ?></code></pre>
    <?php
    }
		return ob_get_clean();
} 

/*
* Shortcode Show Post Terms
*/
// [showPostTerms post_type="" category="" taxonomy="" /]
add_shortcode('showPostTerms', 'posts_terms_shortcode');
function posts_terms_shortcode($atts) {

    extract(shortcode_atts(array(
      'post_type' => 'interview-questions',
      'category' => 'wordpress',
    	'taxonomy' => 'interview-questions-category',
      'uitype' => 'block',
      'heading' => 'Interview Questions',
    ), $atts));

		ob_start();

    $terms = get_terms( array( 
      'taxonomy' => $taxonomy,
      'parent'   => 0
    ) );
     
    if($terms) {
      if ($uitype == 'block')  {
        echo '<div class="row">';
        foreach($terms as $term) {
          $termname = $term->name;
          $termLink = get_term_link($term);
          ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card relative cui2 text-uppercase min_h_200">
              <div class="cbody">
                <a class="d-block text-center tdn f20 font_bold text-white overlay_b absolute d-flex flex center_center" href="<?php echo $termLink; ?>"><span><?php echo $termname; ?></span></a>
              </div>
            </div>
          </div>
          <?php
        }
        echo '</div>';
      } else { ?>
        <div class="card cui2 sidebar-listing r_0 mb_20">
          <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold"><?php echo $heading; ?></h3>
          <div class="cbody p-0">
            <ul class="listing type2">
              <?php 
              foreach($terms as $term) {
                $termname = $term->name;
                $termLink = get_term_link($term);
                ?>
                <li class="">
                  <a class="text-dark" href="<?php echo $termLink; ?>">
                    <span class="text-primary"><?php echo $termname; ?></span>
                  </a>
                </li>
                <?php
              }
              ?>
            </ul> 
          </div>
        </div>
      <?php
      }
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
  $output = '';
  if ( ! empty( $categories ) ) {
    ?>
    <div class="card cui2 sidebar-listing r_0 mb_20">
      <?php if ($show_heading) { ?>
        <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold"><?php echo $heading; ?></h3>
      <?php } ?>
      <div class="cbody p-0">
        <ul class="listing type2">
          <?php 
          foreach( $categories as $category ) {
            $count = $category->category_count;
            $output .= '<li class="relative d-flex align-items-center justify-content-between" >';
            $output .= '<a class="text-primary" href="' . esc_url( get_category_link( $category->term_id ) ) . '" >' . esc_html( $category->name ) . '</a> ';
            if ($show_counts) {
              $output .= '<span class="badge bg-primary static">'.$count.'</span>';
            }
            $output .= '</li>';
          }
          echo $output;
        ?>
        </ul> 
      </div>
    </div> 
    <?php 
    return ob_get_clean();
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
  
  $output = '';
  if ( ! empty( $posts ) ) {
    ob_start();
    ?>
    <div class="card cui2 sidebar-listing r_0 mb_20">
      <?php if ($show_heading) { ?>
        <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold"><?php echo $heading; ?></h3>
      <?php } ?>
      <div class="cbody p-0">
        <ul class="listing type2">
        <?php 
        foreach( $posts as $post ) {
          $postID = $post->ID;
          $postTitle = $post->post_title;
          $visitsCount = get_post_meta($postID, 'visit_counts', true);
          $output .= '<li class="relative d-flex align-items-center justify-content-between" >';
          $output .= '<a class="text-primary" href="' . esc_url( get_permalink( $postID ) ) . '" >' . esc_html( $postTitle ) . '</a> ';
          if ($show_counts) {
            $output .= '<span class="badge bg-primary static"><i class="fas fa-eye mr_5"></i>'.$visitsCount.'</span>';
          }
          $output .= '</li>';
        }
        echo $output;
      ?>
      </ul> 
    </div>
  </div>
  <?php 
    return ob_get_clean();
  }
}

/*
* Show Posts with visit counts
*/
add_shortcode('PostsList' ,'posts_listing');
function posts_listing($atts) {

  extract(shortcode_atts(array(
    'show_counts' => true,
    'show_heading'    => true,
    'post_type'       => 'post',
    'heading'         => 'Recent Posts',
    'posts_per_page'  => 5,
  ), $atts));

  $posts = get_posts(array(
    'post_type'       => $post_type,
    'posts_per_page'  => $posts_per_page,
    'order'           => 'DESC',
    'orderby'         => 'id',
  ));
  
  $output = '';
  if ( ! empty( $posts ) ) {
    ob_start();
    ?>
    <div class="card cui2 sidebar-listing r_0 mb_20">
      <?php if ($show_heading) { ?>
        <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold"><?php echo $heading; ?></h3>
      <?php } ?>
      <div class="cbody p-0">
        <ul class="listing type2">
        <?php 
        $output .= '<ul>';
        foreach( $posts as $post ) {
          $postID = $post->ID;
          $postTitle = $post->post_title;
          $visitsCount = get_post_meta($postID, 'visit_counts', true);
          $output .= '<li class="relative d-flex align-items-center justify-content-between" >';
          $output .= '<a class="text-primary" href="' . esc_url( get_permalink( $postID ) ) . '" >' . esc_html( $postTitle ) . '</a> ';
          if ($show_counts) {
            $output .= '<span class="badge bg-primary static"><i class="fas fa-eye mr_5"></i>'.$visitsCount.'</span>';
          }
          $output .= '</li>';
        }
      echo $output;
      ?>
      </ul> 
    </div>
  </div>
  <?php 
    return ob_get_clean();
  }
}

/*
* Related Posts Shortcode
*/
add_shortcode('showRelatedPosts' ,'showRelatedPosts');
function showRelatedPosts() {

  extract(shortcode_atts(array(
    'show_counts' => true,
    'show_heading'    => true,
    'post_type'       => 'post',
    'heading'         => __( '<span class="text-secondary">Related</span> Posts', 'codematra' ),
    'posts_per_page'  => 4,
  ), $atts));

  ob_start();
  $categories = get_the_category();
  if ( $categories ) { ?>
    <div class="cm-related-posts mb_20">
      <h3 class="heading_style type2 text-uppercase text-primary"><?php echo $heading; ?></h3>
      <div class="row">
        <?php
        $first_category = esc_attr( $categories[0]->term_id );
        $first_name = esc_attr( $categories[0]->name );
        $args = array(
          'cat'                   => array($first_category),
          'post__not_in'          => array($post->ID),
          'posts_per_page'        => $posts_per_page,
          'ignore_sticky_posts'   => true
        );
        $related_posts = new WP_Query($args);       
        if( $related_posts->have_posts() ) :
          while ($related_posts->have_posts()) : $related_posts->the_post(); 
          $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  
          // View Counts
          $prviews = get_post_meta(get_the_ID(), 'visit_counts', true);
          if (!$prviews) {
            $prviews = 0;
          }
          ?>
            <div class="col-12 col-sm-6">
              <div class="cm_related_post mb_20 r_0 card cui2">
              <div class="card-body">
                <a class="link-primary tdn border mb_10 d-block min_h_150 h_150 overflow_hidden" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                  <?php if(has_post_thumbnail()) { ?>
                    <img class="img-fluid" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
                  <?php } else { ?>
                    <div class="img-altnative font_bold f30 bg-primary text-white flex center_center min_h_150 h_150 overflow_hidden">
                      <?php echo $first_name; ?>
                    </div>
                  <?php } ?>
                </a>
                <h4 class="cm_related_post-title  mb_10">
                  <a class="text-primary f18 lh22" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h4>
                <p class="cm_related_post_text"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                <div class="cmeta mb_0 text-muted f12 d-flex justify-content-between">
                  <span title="views"><i class="text-primary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $prviews; ?></span>
                  <span title="Posted on"><i class="text-primary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
                  <span title="Posted by"><i class="text-primary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
                </div>
              </div>
              </div>
            </div>
          <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  <?php
  }
  return ob_get_clean();
}