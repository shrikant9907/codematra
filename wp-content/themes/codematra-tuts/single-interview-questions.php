<?php get_header(); ?> 
<div class="single-page bg-light common-section-ui pt_70">
  <div class="container">
    <div class="row row">
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('interview-left'); ?>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card box_shw3 r_0 cui2 w-100 typography">
          <div class="card-body pti_30 pri_30 pli_30 pbi_30">
            <h1 class='text-primary f30'><?php the_title(); ?></h1>
              <?php if(has_post_thumbnail()) { ?>
                <img class="card-img-top r_0 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
              <?php } ?>
            <div class="f16">
              <?php the_content(); ?>
            </div>
            <div class="text-dark bg-light px_10 f12 d-flex justify-content-between">
              <span><i class="fa fa-user mr_5 text-secondary" aria-hidden="true"></i><?php the_author_meta('display_name',$post->post_author); ?></span>
              <span><i class="fa fa-tag mr_5 text-secondary" aria-hidden="true"></i> 
              <?php
              $categories = get_the_terms(get_the_ID(), 'interview-questions-category');
              $separator = ' ';
              $output = '';
              if ( ! empty( $categories ) ) {
                  foreach( $categories as $category ) {
                      $output .= '<a class="text-dark" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                  }
                  echo trim( $output, $separator );
              }

              ?></span> 
              <span><i class="fa fa-clock mr_5 text-secondary" aria-hidden="true"></i> <?php //echo get_the_date(); ?> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
            </div>
            <?php comment_form(); ?>
          </div>
        </div>    
        <div class="single_posts_nav d-flex justify-content-between">
            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): ?>
                <div class='article-prev'>
                <a class="btn btn-primary rounded-0 px_25 mb-3 d-inline-block" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">Previous: <?php //echo esc_attr( $prev_post->post_title ); ?></a>
            </div>
            <?php endif ?>

            <?php
            $next_post = get_next_post();
            if (!empty( $next_post )): ?>
            <div class='article-nextpost'>
                <a class="btn btn-primary rounded-0 px_25 mb-3 d-inline-block" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">Next: <?php //echo esc_attr( $next_post->post_title ); ?></a>
            </div>
            <?php endif; ?>
        </div>
        <?php comment_form(); ?>                    
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('interview-right'); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 