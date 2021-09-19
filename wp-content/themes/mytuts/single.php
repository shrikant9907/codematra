<?php 
get_header(); 

$categories = get_the_category();
            
?> 
<h1 class="text-center bg-primary mb_0 text-white ptb_40 f30 lh32"><?php the_title(); ?></h1>

<section class="common-section-ui page-breadcrumb bg-light pti_20 pbi_20">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-primary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <a class="tdn text-primary" href="<?php echo esc_url( get_category_link( $categories['0']->term_id ) ); ?>" class="text-muted"><?php echo $categories['0']->name; ?></a> / <?php echo the_title(); ?></p>
  </div>
</section>

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
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 