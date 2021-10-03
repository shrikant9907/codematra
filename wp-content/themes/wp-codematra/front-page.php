<?php
get_header();
?>

<!-- Banner UI 1 -->
<div class="banner-section bg_primary bg_gred_primary text-white mt_0 min_h_400">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="banner-card nobefore">
                  <p class="pre-banner-heading f14 text-uppercase mb_10 ">Welcome to codematra.com</p>
                  <h1 class="banner-heading f40 mb_10">A online plateform to learn <u class="text_yellow">coding</u> from the basics.</h1>
                  <p class="banner-description mb_30">Code Matra is an online platform to learn code from basic level to advanced. We always try to provide high-quality content and codes to our website visitor.</p>
                  <!-- <p class="banner-description mb_30">We working here to provide the Tutorials, Codes, Interview Questions and Quizzes for your work and job preparation.</p> -->
                  <div class="banner-actions">
                      <a href="#ourTutorials" class="btn btn-secondary btnui3s"><i class="fas fa-laptop-code mr_10"></i> Start learning! <i class="fa fa-angle-right ml_10" aria-hidden="true"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<section class="common-section-ui pb_80 hidei">
  <div class="container">
    <h2 class="heading_style type2 text-uppercase">How to start learning?</h2>
    <p class="mb_20">Start read the tutorials or watch videos to get the understanding of programming. <br /> 
      Practice yourself with the examples and projects available on our website also try to create your own. <br >
      Test your programming skills by solving the quzzes and MCQ's.
      Once your found yourself ready prepare for a Job interview. <br >
    </p>
    <div class="contact_details bg_primary">
      <div class="row no-gutters">
          <div class="col-12 col-md-3">
              <div class="card-contact-details order-0 text-white py_30 position-relative pl_60 border-left-0">
                  <i class="fas fa-book-reader position-absolute f26 lh28"></i>
                  <div class="card-text f14 lh18">Start learning</div>
                  <div class="card-number font-weight-bold f16 lh22">Read Tutorials</div>
              </div>
          </div>
          <div class="col-12 col-md-3">
              <div class="card-contact-details order-0 text-white py_30 position-relative pl_60">
                  <i class="fas fa-laptop-code position-absolute f26 lh28"></i>
                  <div class="card-text f14 lh18">Practice your self with</div>
                  <div class="card-number font-weight-bold f16 lh22">Examples and Codes</div>
              </div>
          </div>
          <div class="col-12 col-md-3">
              <div class="card-contact-details order-0 text-white py_30 position-relative pl_60">
                  <i class="fa fa-check position-absolute f26 lh28"></i>
                  <div class="card-text f14 lh18">Test your skills on</div>
                  <div class="card-number font-weight-bold f16 lh22">Quizzes and MCQ's</div>
              </div>
          </div>
          <div class="col-12 col-md-3">
            <div class="card-contact-details order-0 text-white py_30 position-relative pl_60">
                <i class="fa fa-tasks position-absolute f26 lh28"></i>
                <div class="card-text f14 lh18">Prepare for interviews:</div>
                <div class="card-number font-weight-bold f16 lh22">Check questions</div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- Tutorials  Section -->
 <section id="ourTutorials" class="common-section-ui bg-light f16">
   <div class="container">
     <div class="row">
       <div class="col-12">
         <h2 class="heading_style text-center type2 text-uppercase text-primary"><span class="text-secondary">What</span> are you looking for?</h2>
         <p class="mb_20 text-center">Choose the topics from the following categories.</p>

         <!-- Carousel -->
         <div class="ourtutorials four_col_carosusel">
          <?php $fcats = getfeaturedCategoriesCm(); 
          if ($fcats): 
            foreach($fcats as $fcat) {
              if ($fcat['show']) {
              ?>  
              <div class="occ-item px_10" >
                <div class="card cui3c mt_10 r_10 py_20 border-0">
                  <div class="card-body">
                    <div class="ciconrc ciconb">
                      <a class="text-primary" href="<?php echo site_url($fcat['link']); ?>"><i class="<?php echo $fcat['icon']; ?> text-secondary"></i></a>
                    </div>
                    <h3 class="card-title mbi_0"><a  class="text-primary f22 " href="<?php echo site_url($fcat['link']); ?>"><?php echo $fcat['name']; ?></a></h3>
                    <p class="card-text"><?php echo $fcat['desc']; ?></p>
                    <a href="<?php echo site_url($fcat['link']); ?>" class="btn-sm btn btn-primary btnui3s text-uppercase">Start Learning <i class='ml_5 fas fa-angle-right'></i></a>
                  </div>
                </div>
              </div> 
              <?php } ?>
            <?php } ?>
          <?php endif; ?>
        </div>

       </div>
     </div>
   </div>
 </section>
 <!-- Tutorials  Section End -->

<!-- Popular Posts with Sidebar Start -->
<div class="popular-posts-section common-section-ui pt_60 pb_40">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Popular</span> Posts</h2>
	
	<div class="row">
		<div class="col-12">
			<div class="row">
      <?php 
          $args = array(
            'post_type'         =>  'post', 
            'posts_per_page'    =>  6, 
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
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card cui2 relative r_0 f14 mb_40 hs_11">
            <a href="<?php the_permalink($post->ID); ?>" class="tdn d-inline-block border cimgwr min_h_200" >
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
              <?php if(has_post_thumbnail()) { ?>
                <img class="card-img-top r_0" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
              <?php } else {  ?>
                <div class="img-altnative font_bold f30 bg-primary text-white flex center_center min_h_200">
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
              <div class="cdesc mb_10"><?php echo wp_trim_words(do_shortcode($post->post_content), 15); ?></div>
              <div class="cdesc">
                <a class="link-primary text-secondary tdn font_bold" href="<?php the_permalink(); ?>">Continue Reading...</a>
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
	</div>
</div>
</div>
<!-- Popular Posts with Sidebar Ends -->

<!-- Recent Posts with Sidebar Start -->
<div class="recent-posts-section common-section-ui pt_60 pb_40 bg-light">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Recent</span> Posts</h2>
	
	<div class="row">
		<div class="col-12">
			<div class="row">
      <?php 
          $args = array(
                  'post_type'         =>  'post', 
                  'posts_per_page'    =>  6, 
                  'orderby'           =>  'id', 
                  'order'             =>  'desc', 
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
          <div class="col-12 col-sm-6 col-md-4">
					<div class="card cui2 relative f14">
          <a href="<?php the_permalink($post->ID); ?>" class="hidei mb_20 d-inline-block border bg-light cimgwr min_h_200" >
            <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
            <?php if(has_post_thumbnail()) { ?>
              <img class="card-img-top r_0" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          </a>
          <div class="card-body ">
						<h3 class="f16 mb_10 cheading font_bold lh20">
							<a href="<?php the_permalink($post->ID); ?>" class="d-inline-block text-primary" >
							  <?php the_title(); ?>
							</a>
         		</h3>
					  <div class="d-flex mb_10">
              <?php echo $catbadges; ?> 
            </div>
            <div class="cdesc mb_10"><?php echo wp_trim_words($post->post_content, 15); ?></div>
						<div class="cmeta mb_0 text-muted f12 d-flex justify-content-between">
              <span title="views"><i class="text-primary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $views; ?></span>
              <span title="Posted on"><i class="text-primary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
              <span title="Posted by"><i class="text-primary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
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
 
	</div>
  <p class="text-center mt_40"><a href="<?php echo site_url('/blog'); ?>" class="btn btn-secondary btnui3s">View More Posts</a></p>
   
</div>
</div>
<!-- Recent Posts with Sidebar Ends -->


<!-- Recent Programs with Sidebar Start -->
<div class="recent-programs-section common-section-ui">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Recent</span> Programs</h2>
	
	<div class="row">
		<div class="col-12">
			<div class="row">
        <?php 
          $args = array(
                  'post_type'         =>  'programs', 
                  'posts_per_page'    =>  4, 
                  'orderby'           =>  'id', 
                  'order'             =>  'desc', 
          );  
          $programsList = get_posts($args); 
          if ($programsList) {
          foreach($programsList as $progs) {
          $progTerms = get_the_terms($progs, 'programs-category');

          $separator = ' ';
          $proutput = '';
          if ( ! empty( $progTerms ) ) {
              foreach( $progTerms as $progTerm ) {
                  $proutput .= '<a class="static mr_5 d-inline badge badge-primary" href="' . esc_url( get_term_link( $progTerm->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $progTerm->name ) ) . '">' . esc_html( $progTerm->name ) . '</a>' . $separator;
              }
          }
          
          $termbadges = trim( $proutput, $separator );  

          // View Counts
          $prviews = get_post_meta($progs->ID, 'visit_counts', true);
          if (!$prviews) {
            $prviews = 0;
          }
          ?>
          	<div class="col-12 col-sm-6 col-md-6">
              <div class="card cui3s border-0 relative f14 pt_15 min_h_100 ">
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id($progs->ID)) ;  ?>
              <?php if(has_post_thumbnail($progs->ID)) { ?>
              <a href="<?php the_permalink($progs->ID); ?>" class="d-inline-block cimgwr" >
                <img class="card-img-top r_0 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
              </a>
              <?php } ?>
              <div class="card-body ">
                <h3 class="f16 mb_10 cheading font_bold lh20">
                  <a href="<?php the_permalink($progs->ID); ?>" class="d-inline-block text-primary" >
                   <?php echo $progs->post_title; ?>
                  </a>
              </h3>
              <div class="d-flex mb_10">
                <?php echo $termbadges; ?> 
              </div>
                <p class="cdesc mb_10"><?php echo wp_trim_words($progs->post_content, 12); ?></p>
                <div class="cmeta mb_0 text-muted f12 d-flex justify-content-between">
                  <span title="views"><i class="text-primary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $prviews; ?></span>
                  <span title="Posted on"><i class="text-primary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
                  <span title="Posted by"><i class="text-primary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
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
	  <p class="text-center mt_40"><a href="<?php echo site_url('/programs'); ?>" class="btn btn-secondary btnui3s">View More Programs</a></p>
    </div>
  
	</div>
</div>
</div>
<!-- Recent Programs with Sidebar Ends -->
 
<section id="interview" class="common-section-ui pb_40 pt_60 bg-light">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Recent</span> Interview Questions and Answers</h2>
    <div class="row">
        <div class="col-12 col-md-4">
          <div class="card cui1 r_0 pt_20">
            <div class="card-body">
              <h3 class="card-title text-primary text-uppercase"><span class="text-dark">React Js</span></h3>
              <ul class="listing type1 licons w-100 mb_20">
              <?php 
                $args = array(
                        'post_type'         =>  'interview-questions', 
                        'posts_per_page'    =>  5, 
                        'orderby'           =>  'id', 
                        'order'             =>  'asc', 
                        'tax_query'         =>  array(
                                                    array(
                                                            'taxonomy' => 'interview-questions-category',
                                                            'field' => 'slug',
                                                            'terms' => 'react-js', 
                                                            'include_children' => false
                                                    )
                                                ) 
                        );  
                $reactQuestions = get_posts($args); 
                if ($reactQuestions) {
                foreach($reactQuestions as $top) {
                ?>
                    <li class="list-item"><a href="<?php the_permalink($top->ID); ?>"><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i><?php echo $top->post_title; ?></a></li>
                <?php    
                }} else { ?>
                    <li class="list-item">No records found.</li>
                  <?php 
                }    
                ?>
              </ul>
            </div>
            <p class="text-center"><a class="btn btn-sm btn-secondary btnui3" href="<?php echo site_url('interview-questions-category/react-js/'); ?>">More Questions</a></p>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card cui1 r_0 pt_20 mb_20">
            <div class="card-body">
            <h5 class="card-title text-primary text-uppercase"><span class="text-dark">WordPress</span></h5>
              <ul class="listing type1 licons w-100 mb_20">
              <?php 
                $args = array(
                        'post_type'         =>  'interview-questions', 
                        'posts_per_page'    =>  5, 
                        'orderby'           =>  'id', 
                        'order'             =>  'asc', 
                        'tax_query'         =>  array(
                                                    array(
                                                            'taxonomy' => 'interview-questions-category',
                                                            'field' => 'slug',
                                                            'terms' => 'wordpress', 
                                                            'include_children' => false
                                                    )
                                                ) 
                        );  
                $wpQuestions = get_posts($args); 
                if ($wpQuestions) {
                foreach($wpQuestions as $top) {
                ?>
                    <li class="list-item"><a href="<?php the_permalink($top->ID); ?>"><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i><?php echo $top->post_title; ?></a></li>
                <?php    
                }} else { ?>
                    <li class="list-item text-center">No records found.</li>
                  <?php 
                }    
                ?>
              </ul>
            </div>
            <p class="text-center"><a class="btn btn-sm btn-secondary btnui3" href="<?php echo site_url('interview-questions-category/wordpress/'); ?>">More Questions</a></p>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card cui1 r_0 pt_20 mb_20">
            <div class="card-body">
            <h5 class="card-title text-primary text-uppercase"><span class="text-dark">PHP</span></h5>
              <ul class="listing type1 licons w-100 mb_20">
              <?php 
                $args = array(
                        'post_type'         =>  'interview-questions', 
                        'posts_per_page'    =>  5, 
                        'orderby'           =>  'id', 
                        'order'             =>  'asc', 
                        'tax_query'         =>  array(
                                                    array(
                                                            'taxonomy' => 'interview-questions-category',
                                                            'field' => 'slug',
                                                            'terms' => 'php', 
                                                            'include_children' => false
                                                    )
                                                ) 
                        );  
                $wpQuestions = get_posts($args); 
                if ($wpQuestions) {
                foreach($wpQuestions as $top) {
                ?>
                    <li class="list-item"><a href="<?php the_permalink($top->ID); ?>"><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i><?php echo $top->post_title; ?></a></li>
                <?php    
                }} else { ?>
                    <li class="list-item text-center">No records found.</li>
                  <?php 
                }    
                ?>
              </ul>
            </div>
            <p class="text-center"><a class="btn btn-sm btn-secondary btnui3" href="<?php echo site_url('interview-questions-category/php/'); ?>">More Questions</a></p>
          </div>
        </div>
    </div>
  </div>
</section>

<section id="tools" class="common-section-ui pb_40 pt_60">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Online</span> Tools</h2>
  <div class="onlinetools row">
    <?php
      $tools = getToolsList();
      if ($tools) {
        foreach($tools as $tool) {
          extract($tool);
          ?>
          <div class="col-12 col-sm-4 col-md-3">
            <a class="<?php echo $color; ?> tdn card cui3c font_bold f26 flex center_center min_h_200" href="<?php echo site_url($link); ?>"><?php echo $name; ?></a>
          </div>
          <?php
        }
      }
    ?>  
  </div>    
  </div>
</section>
  
<!-- CTA Section -->
<section id="cta-section" class="common-section-ui bg-dark pb_80 text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card cui1 text-white">
          <h2 class="text-white mb_15 text-uppercase">Tell us if you need anything</h2>
          <p class="card-text f16">Your suggestions will help us to improve our website for you.</p>
        </div>
        <a href="<?php echo site_url('contact-us'); ?>" class="btn btn-secondary btnui3s">Contact us</a>
      </div>    
  </div>
  </div>
</section>
<!-- CTA Section End -->
 
<?php   

get_footer();