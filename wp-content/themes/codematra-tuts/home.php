<?php get_header(); ?> 


<!-- Banner UI 1 -->
<div class="banner-section m-0 bg_light_secondary relative px_30 py_40 d-flex min_h_600 justify-content-center">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-9">
        <div class="bcard">
          <h1 class="pre-banner-heading text-primary f14 text-uppercase mb_20 ">Welcome to codematra.com</h1>
          <h2 class="banner-heading font_normal f40 lh44 mb_20 text_black">Learn Code From The Basics</h2>
          <p class="banner-description mb_30 f16">
            Learn with free online articles on latest technologies, Programs, Interview Questions and MCQs.<br />
            Basic projects and templates to get an understanding of the flow and file structures.
          </p>
          <!-- <div class="banner-actions">
              <a href="#ourTutorials" class="btn mb_10 btn-primary btnhs text-uppercase btnui2 d-inline-flex flex center_center">
                Start Now
                <i class="f16 bi bi-chevron-right ml_10"></i>
              </a>
          </div> -->
        </div>
      </div>
      <div class="col-12 col-md-3 d-none d-md-block">
        <p class="pre-banner-heading f16 mb_20">Technologies to learning here.</p>
        <div class="banner-icons">
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="bi bi-bootstrap"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-html5"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-css3"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-react"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-php"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-wordpress"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-python"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
            <i class="fab fa-github"></i>
          </div>
          <div class="d-inline-block w_60 h_60 f50 mr_20 text-secondary">
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
              <div class="card cui1 noshadow r_0 w-100 typography">
                <div class="card-body p-0">
                    <h2 data-aos="fade-up" class='font_bold mb_20'><a class="text_black tdn d-block" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
                    <?php 
                      $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
                      if (!$visitsCount) {
                        $visitsCount = 0;
                      }
                      ?>
                    <div data-aos="fade-up" class="metatags text-dark px_5 py_5 mb_20 f14 d-flex justify-content-between">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Posted By"><i class="fa fa-user mr_5 text-secondary" aria-hidden="true"></i> <?php the_author(); ?></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Posted At"><i class="fa fa-clock mr_5 text-secondary" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Number of Views"><i class="fa fa-eye mr_5 text-secondary" title="Views" aria-hidden="true"></i><?php echo $visitsCount; ?></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Categories and Tags"><i class="fa fa-tag mr_5 text-secondary" aria-hidden="true"></i> 
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
                    <div class="row">
                      <div class="col-12 col-md-4">
                        <?php if(has_post_thumbnail()) { ?>
                          <a data-aos="fade-up" href="<?php the_permalink(); ?>" class="d-inline-block mb_10 w-100">
                            <img class="card-img-top img-fluid r_0 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
                          </a>
                        <?php } ?>
                      </div>
                      <div class="col-12 col-md-8">
                        <div class="f16 lh30" data-aos="fade-up">
                            <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                            <a href="<?php the_permalink(); ?>" class="mb_20 btn btn-outline-primary btnui2">Continue Reading <i class="ml_5 fas fa-angle-double-right"></i></a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <hr class="my_60" />
                             
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