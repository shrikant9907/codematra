<?php get_header(); ?> 
<div class="single-page bg-light common-section-ui pt_70">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-8">
        <div class="card cui2 w-100 typography">
          <div class="card-body pri_30 pli_30 pbi_30">
            <h1 class='text-primary'><?php the_title(); ?></h1>
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
              <?php if(has_post_thumbnail()) { ?>
                <img class="card-img-top r_0 mb_20" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
              <?php } ?>
            <div class="text-dark px_5 py_5 mb_10 f14 d-flex justify-content-between">
              <span><i class="fa fa-user mr_5 text-primary" aria-hidden="true"></i> <?php the_author(); ?></span>
              <span><i class="fa fa-tag mr_5 text-primary" aria-hidden="true"></i> 
              <?php
              $categories = get_the_category();
              $separator = ' ';
              $output = '';
              if ( ! empty( $categories ) ) {
                  foreach( $categories as $category ) {
                      $output .= '<a class="text-dark" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                  }
                  echo trim( $output, $separator );
              }

              ?></span> 
              <span><i class="fa fa-clock mr_5 text-primary" aria-hidden="true"></i> <?php //echo get_the_date(); ?> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
            </div>
            <div class="f16">
              <?php the_content(); ?>
            </div>
          </div>
        </div>                        
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 