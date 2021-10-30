<!-- Popular Posts with Sidebar Start -->
<div data-aos="fade-up" class="popular-posts-section ">
  <h2 class="heading_style type2 f30 text-uppercase mb_20 text-primary"><span class="text-secondary">Featured </span>Posts</h2>
  <div class="row">
    <?php 
        $args = array(
          'post_type'         =>  'post', 
          'posts_per_page'    =>  4, 
          'meta_key'          => 'featured', 
          'meta_value'    => 1, 
          'order'             => 'DESC',
          'orderby'           => 'id',
        );  
        $posts = get_posts($args); 
        if ($posts) {
        foreach($posts as $post) {
        $categories = get_the_terms($post, 'category');
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
          foreach( $categories as $category ) {
            $output .= '<a class="static mr_5 d-inline badge badge-primary" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
          }
        }
        // View Counts
        $views = get_post_meta($post->ID, 'visit_counts', true);
        if (!$views) {
          $views = 0;
        }

        $catbadges = trim( $output, $separator );  
        ?>
        <div class="col-12 col-md-6">
          <div class="card cui2 relative r_0 f14 mb_40 noshadow trans_3 ">
          <a href="<?php the_permalink($post->ID); ?>" class="tdn d-inline-block border-bottom cimgwr min_h_200 h_200 overflow_hidden" >
            <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
            <?php if(has_post_thumbnail()) { ?>
              <img class="card-img-top r_0 hs_12 trans_3 " src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
            <?php } else {  ?>
              <div class="img-altnative font_bold f30 hs_12 trans_3  bg-white text-primary op3 flex center_center min_h_200">
                <?php echo $categories['0']->name; ?>
              </div>
            <?php } ?>
          </a>
          <div class="card-body ">
            <h3 class="f20 mb_10 cheading font_bold lh28">
            <a href="<?php the_permalink($post->ID); ?>" class="tdn d-inline-block text-primary" >
                <?php the_title(); ?>
              </a>
            </h3>
            <div class="d-flex mb_10">
              <?php echo $catbadges; ?> 
            </div>
            <div class="cmeta mb_10 text-muted f12 d-flex justify-content-between">
              <span title="views"><i class="text-primary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $views; ?></span>
              <span title="Posted on"><i class="text-primary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
              <span title="Posted by"><i class="text-primary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
            </div>
            <div class=" cdesc mb_10"><?php echo wp_trim_words(do_shortcode($post->post_content), 15); ?></div>
            <div class="cdesc">
              <a class="link-primary text-secondary tdn" href="<?php the_permalink(); ?>">Read more...</a>
            </div>
          </div>
        </div>
      </div>
      <?php    
        }} else { ?>
            <p >No records found.</p>
          <?php 
        }    
        ?>
  </div>
</div>
<!-- Popular Posts with Sidebar Ends -->
