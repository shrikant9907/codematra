<?php get_header(); ?> 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php _e('Blog'); ?></h1>
<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php _e('Blog'); ?></p>
  </div>
</section>
<div class="single-page common-section-ui">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-8">
              <?php 
                if(have_posts()): 
                  // $count = 0;
                  while(have_posts()): the_post();  
              ?>
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
              <div class="card cui2 noshadow r_0 w-100 typography">
                <div class="card-body pri_30 pri_30 pli_30 pbi_30">
                    <h2 class='text-primary'><a class="text-primary tdn d-block" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
                    <?php if(has_post_thumbnail()) { ?>
                      <a href="<?php the_permalink(); ?>" class="d-inline-block"><img class="card-img-top r_0 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
                    <?php } ?>
                    <?php 
                      $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
                      if (!$visitsCount) {
                        $visitsCount = 0;
                      }
                      ?>
                    <div class="text-dark px_5 py_5 mb_10 f14 d-flex justify-content-between">
                      <span><i class="fa fa-eye mr_5 text-primary" title="Views" aria-hidden="true"></i><?php echo $visitsCount; ?></span>
                      <span><i class="fa fa-clock mr_5 text-primary" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
                      <span><i class="fa fa-user mr_5 text-primary" aria-hidden="true"></i> <?php the_author(); ?></span>
                      <span><i class="fa fa-tag mr_5 text-primary" aria-hidden="true"></i> 
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
                    <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btnui3s w-100 text-white text_bold">Continue Reading <i class="ml_5 fas fa-angle-double-right"></i></a>
                    </div>
                </div>
              </div>                        
              <?php 
                endwhile; 
                theme_pagination();
                endif; 
              ?>   
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
 

<?php get_footer(); 