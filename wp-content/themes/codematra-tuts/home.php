<?php get_header(); ?> 
<!-- Banner UI 1 -->
<div class="banner-section bg-primary text-white mt_0 min_h_500  relative">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="banner-card nobefore">
          <p class="pre-banner-heading f14 text-uppercase mb_20 ">Welcome to codematra.com</p>
          <h1 class="banner-heading f40 lh44 mb_20">An online plateform to learn <u class="text_yellow">coding</u> from the basics.</h1>
          <p class="banner-description mb_30 f16">
            Learn with free online articles on latest technologies, Programs, Interview Questions and MCQs.<br />
            Basic projects and templates to get an understanding of the flow and file structures.
          </p>
          <!-- <div class="banner-actions">
              <a href="#ourTutorials" class="btn mb_20 btn-outline-primary text-uppercase btnui3s d-inline-flex flex center_center"><i class="text-secondary fas fa-user-graduate f20 mr_10"></i>Learn Coding <i class="f16 fa fa-angle-right ml_10" aria-hidden="true"></i></a>
          </div> -->
        </div>
      </div>
      <div class="col-12 d-none d-md-block">
        <p class="pre-banner-heading f16 mb_20">Technologies you will learning here.</p>
        <div class="banner-icons mb_20">
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-bootstrap"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-html5"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-css3"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-react"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-php"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-wordpress"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-python"></i>
          </div>
          <!-- <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-angular"></i>
          </div> -->
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-github"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_60 h_60">
            <i class="fab fa-js"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
                      <a href="<?php the_permalink(); ?>" class="d-inline-block mb_20 w-100"><img class="card-img-top img-fluid r_0 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
                    <?php } ?>
                    <?php 
                      $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
                      if (!$visitsCount) {
                        $visitsCount = 0;
                      }
                      ?>
                    <div class="metatags text-dark px_5 py_5 mb_10 f14 d-flex justify-content-between">
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
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm btnui3s text-white text_bold">Continue Reading <i class="ml_5 fas fa-angle-double-right"></i></a>
                    </div>
                </div>
              </div>                        
              <?php 
                endwhile; 
                ?>
                <div class="text-center">
                  <?php theme_pagination(); ?>
                </div>
                <?php
                endif; 
              ?>   
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <?php get_sidebar('frontpage'); ?>
            </div>
        </div>
    </div>
</div>
 

<?php get_footer(); 