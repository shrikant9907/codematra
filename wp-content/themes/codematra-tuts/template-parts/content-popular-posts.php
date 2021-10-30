<div data-aos="fade-up" class="card cui3 sidebar-listing r_0 mb_20 noshadow">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">
    Popular Posts
  </h3>
  <div class="cbody p-0">
    <ul class="listing type2">
      <?php 
          $args = array(
            'post_type'         =>  'post', 
            'posts_per_page'    =>  5, 
            'meta_key'          => 'visit_counts', 
            'order'             => 'DESC',
            'orderby'           => 'meta_value_num',
          );  
          $posts = get_posts($args); 
          if ($posts) {
          foreach($posts as $post) {
          $categories = get_the_terms($post, 'category');
          $separator = ' ';
          $output = '';
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                  $output .= '<a class="text-muted ml_5"  href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'codematra' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>,' . $separator;
              }
          }

          $catbadges = trim( $output, $separator );  

          // View Counts
          $views = get_post_meta($post->ID, 'visit_counts', true);
          if (!$views) {
            $views = 0;
          }
          ?>
            <li  data-aos="fade-up" class="relative d-flex align-items-center">
              <div class="cminleft mr_10 my_5">
                <a href="<?php the_permalink($post->ID); ?>" class="d-inline-block tdn bg-light cimgwr w_50 h_50" >
                  <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
                  <?php if(has_post_thumbnail()) { ?>
                    <img class="h_50 img-fluid border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
                  <?php } ?>
                </a>
              </div>
              <div class="cminright">
                <h3 class="f14 mb_5 font_normal lh20">
                  <a href="<?php the_permalink($post->ID); ?>" class="d-inline-block tdn text-dark" >
                    <?php the_title(); ?>
                  </a>
                </h3>
                <div class="cmeta mb_0 text-muted f12 d-flex align-items-center justify-content-start w-100">
                  <span class="mr_10" title="Views"><i class="text-muted fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $views; ?></span>
                  <span class="d-flex align-items-center" title="Categories"><i class="text-muted fa fa-tag" aria-hidden="true"></i> <?php echo $catbadges; ?></span>
                </div>
              </div>
            </li>
        <?php    
          }} else { ?>
              <p >No records found.</p>
            <?php 
          }    
          ?>
    </ul>
  </div>
</div>  