<?php 
get_header(); 

$categories = get_the_category();
            
?> 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php echo $categories['0']->name; ?></h1>

<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <a class="tdn text-secondary" href="<?php echo esc_url( get_category_link( $categories['0']->term_id ) ); ?>" class="text-muted"><?php echo $categories['0']->name; ?></a> / <?php echo the_title(); ?></p>
  </div>
</section>

<div class="single-page common-section-ui">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-8">
        <div class="card cui2 r_0 w-100 typography">
          <div class="card-body pri_30 pli_30 pbi_30">
            <h2 class='text-dark'><?php the_title(); ?></h3>
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  
              $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
              if (!$visitsCount) {
                $visitsCount = 0;
              }
              ?>
              <?php if(has_post_thumbnail()) { ?>
                <img class="card-img-top r_0 mb_20 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
              <?php } ?>
            <div class="metatags text-dark px_5 py_5 mb_10 f14 d-flex justify-content-between">
              <span><i class="fa fa-eye mr_5 text-dark" title="Views" aria-hidden="true"></i><?php echo $visitsCount; ?></span>
              <span><i class="fa fa-clock mr_5 text-dark" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
              <span><i class="fa fa-user mr_5 text-dark" aria-hidden="true"></i> Shrikant</span>
              <span><i class="fa fa-tag mr_5 text-dark" aria-hidden="true"></i> 
              <?php
              $categories = get_the_category();
              $separator = ', ';
              $output = '';
              if ( ! empty( $categories ) ) {
                  foreach( $categories as $category ) {
                      $output .= '<a class="text-dark" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                  }
                  echo trim( $output, $separator );
              }

              ?>
              </span> 
            </div>
            <div class="f16">
              <?php the_content(); ?>
            </div>
          </div>
        </div>  
        <div class="single_posts_nav d-flex justify-content-between mb_20">
            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): ?>
                <div class='article-prev'>
                <a class="btn btn-primary btnui2 rounded-0 px_25 mb-3 d-inline-block" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"> <i class="fas fa-angle-left mr_5"></i>Previous <?php //echo esc_attr( $prev_post->post_title ); ?></a>
            </div>
            <?php endif ?>

            <?php
            $next_post = get_next_post();
            if (!empty( $next_post )): ?>
            <div class='article-nextpost'>
                <a class="btn btn-primary btnui2 rounded-0 px_25 mb-3 d-inline-block" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">Next <i class="fas fa-angle-right ml_5"></i> <?php //echo esc_attr( $next_post->post_title ); ?></a>
            </div>
            <?php endif; ?>
        </div>      
        <div class="mb_20 card cui2 r_0">
          <div class="card-body fui fui3">
              <?php comment_form(); ?>                
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
    <?php echo do_shortcode('[showRelatedPosts columns=" col-md-3"]'); ?>
  </div>
</div>
       
<?php get_footer(); 