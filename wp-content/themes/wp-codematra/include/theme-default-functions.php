<?php
/*
* Featured Codes Listing
*/
function getfeaturedCategoriesCm() {
  $array = array(
    array(
      'name' => 'Web Design',
      'desc' => 'Codes',
      'icon' => 'fas fa-laptop-code',
      'link' =>'/tag/web-design/',
      'show' => true,
    ),
    array(
      'name' => 'Bootstrap',
      'desc' => 'Codes',
      'icon' => 'fab fa-bootstrap',
      'link' =>'/category/bootstrap/',
      'show' => true,
    ),
    array(
      'name' => 'HTML',
      'desc' => 'Codes',
      'icon' => 'fab fa-html5',
      'link' =>'/category/html/',
      'show' => true,
    ),
    array(
      'name' => 'CSS',
      'desc' => 'Codes',
      'icon' => 'fab fa-css3',
      'link' =>'/category/css/',
      'show' => true,
    ),
    array(
      'name' => 'React Js',
      'desc' => 'Codes',
      'icon' => 'fab fa-react',
      'link' =>'/category/react-js/',
      'show' => true,
    ),
    array(
      'name' => 'React Js',
      'desc' => 'Interview Questions',
      'icon' => 'fab fa-react',
      'link' =>'/interview-questions-category/react-js/',
      'show' => true,
    ),
    array(
      'name' => 'Angular',
      'desc' => 'Codes',
      'icon' => 'fab fa-react',
      'link' =>'/category/angular/',
      'show' => false,
    ),
    array(
      'name' => 'PHP',
      'desc' => 'Codes',
      'icon' => 'fab fa-react',
      'link' =>'/category/php/',
      'show' => true,
    ),
    array(
      'name' => 'PHP',
      'desc' => 'Programs',
      'icon' => 'fab fa-php',
      'link' =>'/programs-category/php/',
      'show' => true,
    ),
    array(
      'name' => 'WordPress',
      'desc' => 'Codes',
      'icon' => 'fab fa-wordpress',
      'link' =>'/category/wordpress/',
      'show' => true,
    ),
    array(
      'name' => 'WordPress',
      'desc' => 'Interview Questions',
      'icon' => 'fab fa-wordpress',
      'link' =>'/interview-questions-category/wordpress/',
      'show' => true,
    ),
    array(
      'name' => 'Python',
      'desc' => 'Codes',
      'icon' => 'fab fa-python',
      'link' =>'/tag/web-design/',
      'show' => false,
    ),
    array(
      'name' => 'Python',
      'desc' => 'Programs',
      'icon' => 'fab fa-python',
      'link' =>'/programs-category/python/',
      'show' => true,
    ),
  );
  return $array;
}

/* 
* Insert Default Pages
*/
add_action('init', 'insertDefaultPages');
function insertDefaultPages() {

    $pages = array (
        'Code Matra',
        'Blog',
        'Base64 Encode and Decode',
        'List To Array Convertor',
        'List To HTML List Convertor',
        'Resume Maker',
        'Excel To Array Convertor',
        'Excel To JSON Convertor',
        'Excel To XML Convertor',
        'Minify CSS',
        'Minify HTML',
        'Minify JS',
        'Interview',
        'Programs',
        'Templates',
        'Sitemap',
        'Privacy Policy',
        'Terms and conditions',
        'Tools',
    );
    if ($pages) {
  
      update_option('show_on_front', 'page'); 
  
      foreach($pages as $page) {
          $pageData = get_page_by_title( $page );
          if (!$pageData) {
  
            // Create new page
            $my_post = array(
              'post_title'    => wp_strip_all_tags( $page ),
              'post_content'  => '',
              'post_status'   => 'publish',
              'post_type'     => 'page',
            );
             
            // Insert page in Database
            wp_insert_post( $my_post );
  
          } else {
  
            // Front Page / Code Matra
            if ($page == 'Code Matra') {
              update_option('page_on_front', $pageData->ID);   
            }
  
            // Blog Page
            if ($page == 'Blog') {
              update_option('page_for_posts', $pageData->ID ); 
            }
          }
      }
    }
  }

// Register Nav Menu 
register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'skythemes-default' ),
        'footer' => __( 'Footer Menu', 'skythemes-default' ),
) );

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );


/* Setup Theme Widgets */
function custom_codematra_widgets_init() { 

  register_sidebar( array(
    'name'          => __( 'Main Sidebar', 'codematra' ),
    'description'   => 'It will display on Post Details OR Listing pages.',
    'id'            => 'main-sidebar-1',
    'before_widget' => '<div id="%1$s" class="card cui2  w-100 typography %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="text-primary pti_20 pri_30 pli_30 pbi_0"><h3 class="mb-0">',
    'after_title'   => '</h3></div>',
  ));  
    
  register_sidebar( array(
    'name'          => __( 'Footer Sidebar1', 'codematra' ),
    'id'            => 'footer-sidebar-1',
    'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title f_20_26 m_b_20 text-uppercase">',
    'after_title'   => '</h3>',
  ));  
   
   register_sidebar( array(
    'name'          => __( 'Footer Sidebar2', 'codematra' ),
    'id'            => 'footer-sidebar-2',
    'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title f_20_26 m_b_20 text-uppercase">',
    'after_title'   => '</h3>',
  )); 
    
   register_sidebar( array(
    'name'          => __( 'Footer Sidebar3', 'codematra' ),
    'id'            => 'footer-sidebar-3',
    'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title f_20_26 m_b_20 text-uppercase">',
    'after_title'   => '</h3>',
  )); 
   
   register_sidebar( array(
    'name'          => __( 'Footer Sidebar4', 'codematra' ),
    'id'            => 'footer-sidebar-4',
    'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title f_20_26 m_b_20 text-uppercase">',
    'after_title'   => '</h3>',
  )); 
  
         
}  
add_action( 'widgets_init', 'custom_codematra_widgets_init',10, 0 ); 
 

/*
* Related Posts Function
*/
function cm_related_posts() {
  $categories = get_the_category();
  if ( $categories ) { ?>
    <div class="cm-related-posts">
      <h2><?php _e( 'Related Posts', 'codematra' ); ?></h2>
      <div class="form-row">
        <?php
        $first_category = esc_attr( $categories[0]->term_id );
        $args = array(
          'cat'                   => array($first_category),
          'post__not_in'          => array($post->ID),
          'posts_per_page'        => 4,
          'ignore_sticky_posts'   => true
        );
        $related_posts = new WP_Query($args);       
        if( $related_posts->have_posts() ) :
          while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
            <div class="col-sm-6">
              <div class="cm_related_post">
                <a class="img_thum_wr" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail('medium'); ?> 
                </a>
                <h3 class="cm_related_post-title">
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>
                <p class="cm_related_post_text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
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
}

/*
  * Related Posts Function
  */
function cm_related_custom_posts($taxonomy = 'tutorial_cat', $post_id = '') {
    if($post_id=='') {
      $post_id = get_the_ID(); 
    }
    if($taxonomy!='') {
      $categories = get_the_terms(get_the_ID(),$taxonomy);
      if ( $categories ) { ?>
        <div class="cm-related-posts">
          <h2><?php _e( 'Related Posts', 'codematra' ); ?></h2>
          <div class="row">
            <?php
            $first_category = esc_attr( $categories[0]->term_id );
              $taxargs = array(
                array(
                    'taxonomy' => $taxonomy,  
                    'field' => 'id',
                    'terms' => $first_category,  
                    'include_children' => false
                  )
                );
            $args = array(
              'post__not_in'          => array($post_id),
              'posts_per_page'        => 4,
              'ignore_sticky_posts'   => true,
              'post_type' => 'tutorial',
              'tax_query' => $taxarg
            );
            $related_posts = new WP_Query($args);
            if( $related_posts->have_posts() ) :
              while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                <div class="col-sm-6">
                  <div class="cm_related_post">
                    <a class="img_thum_wr" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                      <?php the_post_thumbnail('medium'); ?> 
                    </a>
                    <h3 class="cm_related_post-title">
                      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h3>
                    <p class="cm_related_post_text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
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
  }
}

//Current Page Class in Body
function add_page_name_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $page_slug = $post->post_name;    
        $classes[] = 'page-'.$page_slug;
    }
    return $classes;
}
add_filter( 'body_class', 'add_page_name_class' );

/*
 * Limit Search To Post Type
 */
function searchfilter($query) {
  if ($query->is_search && !is_admin() ) {
    $query->set('post_type',array('post', 'programs'));
  }
  return $query;
} 
add_filter('pre_get_posts','searchfilter');


/*
 * Sy Pagination
 */
function theme_pagination() {
  global $wp_query;
  $big = 999999999999;
  $page_format = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type'  => 'array'
  ) );
  if( is_array($page_format) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<div class="custom_paginations pagination-ui"><ul>';
    echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
    foreach ( $page_format as $page ) {
      echo "<li>$page</li>";
    }
    echo '</ul></div>';
  }
}


/*
* Sign Blog Popup
*/

function jscript_redirect($url) {	?> 
	<script >
	window.location.href="<?php echo $url; ?>"; 
	</script>
	<?php 
  die();
}

  
/*
* Admin Script and Styles
*/
function rmradvsys_admin_enqueue_scripts() {
    // wp_enqueue_media();
    wp_enqueue_script('jquery'); 
    // wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script( 'rmradvsys-scripts', get_stylesheet_directory_uri().'/js/custom.js', array( 'jquery'), '20181001', true );
    // wp_localize_script( 'rmradvsys-scripts', 'LOCOBJ', array( 
    //   'ajax_url' => admin_url( 'admin-ajax.php' ),
    //   'tic_security' => wp_create_nonce( 'tic_setting_nonce_action' ),
    // )); 
} 
add_action( 'wp_footer', 'rmradvsys_admin_enqueue_scripts' );  

/*
 * Function Actived Links
 */
function activated($v1, $v2) {
  if($v1==$v2) {
    echo 'active';
  }
}
  
/*
 * cm_theme_entry_meta
 */
function cm_theme_entry_meta() {
  // Translators: used between list items, there is a space after the comma.
  $categories = get_the_category_list( __( ', ', 'codematra' ) );
  if($categories!='') {
    $categories_list = '<span class="category" itemprop="articleSection"><i class="fa fa-bookmark"></i> '. $categories . "</span>";
    echo $categories_list;
  }
 
  $date = sprintf( '<span class="date"><i class="fas fa-clock"></i> <a href="%1$s" title="%2$s" rel="bookmark"><time itemprop="datePublished" datetime="%3$s">%4$s</time></a></span>',
    esc_url( get_permalink() ),
    esc_attr( get_the_time() ), 
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() )
  );
  echo $date;

//  $author = sprintf( '<span itemprop="author"><i class="fas fa-user"></i><span class="author"><a href="%1$s" title="%2$s" rel="">%3$s</a></span></span>',
//      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
//      esc_attr( sprintf( __( 'View all posts by %s', 'codematra' ), get_the_author() ) ),
//      get_the_author()
//  );
    
//  $comment_number = get_comments_number();
//  $comment_number = sprintf( _n( '1 Comment', '%s Comments', $comment_number, 'codematra' ), $comment_number );
//  $comment_number =  sprintf( ' <span class="comments" itemprop="interactionCount"> <i class="fa fa-comment"></i><a href="%1$s" title="%2$s" rel="comments">%2$s</a></span>',
//      get_comments_link(),
//      $comment_number
//  );

// Translators: used between list items, there is a space after the comma.
    $tags = get_the_tag_list( '', __( ', ', 'codematra' ) );
    if($tags!='') {
        $tag_list = '<span class="tags"> <i class="fas fa-tags"></i> '.$tags. '</span>';
        echo $tag_list;
    }

//        echo $author ;
//        echo $comment_number ;
}

function getBadgeColor($name) {
  if (!$name ) {
    return 'bg_green';
  }
  $name = strtolower($name);
  if ($name == 'php') {
    return 'bg_secondary';
  }
  if ($name == 'python') {
    return 'bg_indigo';
  }
  return $badgeColor;
}

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

/*
 * File Upload Function | site: codematra.com
 */
function istl_upload_file($xlsfile) {
  $output = array();
  if($xlsfile) { 
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );
    $_FILES = array ("custom_file_upload" => $xlsfile); 
    $attachment_id = media_handle_upload( 'custom_file_upload', '' ); 
    if ( is_wp_error( $attachment_id ) ) {
        $output['error'] = 1;
    } else {
      $file_path = get_attached_file( $attachment_id );
      $file_url = wp_get_attachment_url( $attachment_id );
      $output['error'] = 0;
      $output['attachment_id'] = $attachment_id; 
      $output['file_path'] = $file_path;    
      $output['file_url'] = $file_url;   
    }
  }  
  return $output; 
}

/*
* File Upload Function 
*/
function istl_upload_file_php($xlsfile) {
  $output = array();
  if($xlsfile) { 
    $errors= array();
    $file_name = $xlsfile['name'];
    $file_size = $xlsfile['size'];
    $file_tmp = $xlsfile['tmp_name'];
    $file_type = $xlsfile['type'];
    $temexplode = explode('.', $file_name);
    $file_ext = strtolower(end($temexplode));
    $expensions= array("xls");
    if(in_array($file_ext,$expensions)=== false){
      $errors[]="extension not allowed, please choose a Excel or .xls file.";
    }
    if($file_size > 2097152) {
      $errors[]='File size must be excately 2 MB';
    }
    $upload_dir = wp_upload_dir();
    $upload_dir_path = $upload_dir['basedir'];   
    if(empty($errors)==true) {
      move_uploaded_file($file_tmp, $upload_dir_path."/xlsfiles/".$file_name);
      $output['error'] = 0;
      $output['attachment_id'] = 0; 
      $output['file_path'] = $upload_dir_path."/xlsfiles/".$file_name;    
      $output['file_url'] = '';   
    } else {
      $output['error'] = 1;
      $output['error_message'] = $errors;
    } 
  }  
  return $output; 
}


/*
* Get my IP
*/
function istl_get_my_ip() {
  if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return apply_filters( 'wpb_get_ip', $ip );
}

/*
* Format JSON
*/
function istl_format_json($json) { 
  $result      = '';
  $pos         = 0;
  $strLen      = strlen($json);
  $indentStr   = '  ';
  $newLine     = "\n";
  $prevChar    = '';
  $outOfQuotes = true;

  for ($i=0; $i<=$strLen; $i++) {
    // Grab the next character in the string.
    $char = substr($json, $i, 1);
    // Are we inside a quoted string?
    if ($char == '"' && $prevChar != '\\') {
      $outOfQuotes = !$outOfQuotes;
    // If this character is the end of an element,
    // output a new line and indent the next line.
    } else if(($char == '}' || $char == ']') && $outOfQuotes) {
      $result .= $newLine;
      $pos --;
      for ($j=0; $j<$pos; $j++) {
        $result .= $indentStr;
      }
    }
    // Add the character to the result string.
    $result .= $char;
    // If the last character was the beginning of an element,
    // output a new line and indent the next line.
    if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
      $result .= $newLine;
      if ($char == '{' || $char == '[') {
        $pos ++;
      }

      for ($j = 0; $j < $pos; $j++) {
        $result .= $indentStr;
      }
    }
    $prevChar = $char;
  }
  return $result;
}
