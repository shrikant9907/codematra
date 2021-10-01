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
 <section id="ourTutorials" class="common-section-ui bg-light f16 pb_20">
   <div class="container">
     <div class="row">
       <div class="col-12">
         <h2 class="heading_style type2 text-uppercase text-primary"><span class="text-secondary">What</span> are you looking for?</h2>
         <p class="mb_20">You can learn <strong>PHP</strong>, <strong>React JS</strong>, <strong>Web Design</strong> and many other popular web programming languages on codematra.com</p>

         <!-- Carousel -->
         <div class="ourtutorials four_col_carosusel">
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-python text-secondary"></i>
                </div>
                <h5 class="card-title mb-0"><a class="text-primary" href="<?php echo site_url('/programs-category/python/'); ?>">Python</a></h5>
                <p class="card-text">Programs</p>
              </div>
            </div>
          </div>
          <!-- <div class="occ-item px_10 hidei" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body"> 
                <div class="ciconrc ciconb">
                  <i class="fab fa-wordpress text-secondary"></i>
                </div>
                <h5 class="card-title">Django</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div> -->
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-angular text-secondary"></i>
                </div>
                <h5 class="card-title mbi_0"><a class="text-primary" href="<?php echo site_url('/tag/web-design/'); ?>">Web Design</a></h5>
                <p class="card-text">How to Code</p>
              </div>
            </div>
          </div>
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-react text-secondary"></i>
                </div>
                <h5 class="card-title mbi_0"><a  class="text-primary" href="<?php echo site_url('/interview-questions-category/react-js/'); ?>">React JS</a></h5>
                <p class="card-text">Interview Questions</p>
              </div>
            </div>
          </div>
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-php text-secondary"></i>
                </div>
                <h5 class="card-title mb-0"><a class="text-primary" href="<?php echo site_url('/programs-category/php'); ?>">PHP</a></h5>
                <p class="card-text">Programs</p>
              </div>
            </div>
          </div>
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-wordpress text-secondary"></i>
                </div>
                <h5 class="card-title mb-0"><a class="text-primary" href="<?php echo site_url('/category/wordpress'); ?>">WordPress</a></h5>
                <p class="card-text">How To Code</p>
              </div>
            </div>
          </div>
          <!-- <div class="occ-item px_10 hidei" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-wordpress"></i>
                </div>
                <h5 class="card-title">JavaScript</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div> -->
          <!-- <div class="occ-item px_10 hidei" >
            <div class="card cui3c mt_10 r_10 py_20 border-0">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-wordpress"></i>
                </div>
                <h5 class="card-title">jQuery</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div> -->
        </div>

       </div>
     </div>
   </div>
 </section>
 <!-- Tutorials  Section End -->

<!-- Popular Posts with Sidebar Start -->
<div class="blog-index-page common-section-ui pt_60 pb_40">
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
                  $output .= '<a class="text-dark static mr_5 d-inline badge badge-light border" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
              }
          }

          // View Counts
          $views = get_post_meta($post->ID, 'visit_counts', true);
          if (!$views) {
            $views = 0;
          }

          $catbadges = trim( $output, $separator );  
          ?>
          <div class="col-12 col-sm-6">
					<div class="card cui2 relative f14 mb_40">
          <a href="<?php the_permalink($post->ID); ?>" class="mb_20 hidei d-inline-block border bg-light cimgwr min_h_200" >
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
              <span title="views"><i class="text-secondary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $views; ?></span>
              <span title="Posted on"><i class="text-secondary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
              <span title="Posted by"><i class="text-secondary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
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
		<div class="col-12 col-sm-6 col-md-3 hide">
			<div class="card cui2 noshadow r_0 w-100 typography">
				<div class="">
				   <h2 class='heading_style type2 text-uppercase f16 mb_10 font_bold'>Top Categories</h2>
				   <ul class="f16 listing type2">
						<li><a href="">HTML</a></li>
						<li><a href="">CSS</a></li>
						<li><a href="">Web Design</a></li>
						<li><a href="">React Js</a></li>
				   </ul>
				</div>
			  </div>
		</div>
	</div>
</div>
</div>
<!-- Popular Posts with Sidebar Ends -->

<!-- Recent Posts with Sidebar Start -->
<div class="blog-index-page common-section-ui pt_60 pb_40 bg-light">
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
                  $output .= '<a class="text-dark static mr_5 d-inline badge badge-light border" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
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
              <span title="views"><i class="text-secondary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $views; ?></span>
              <span title="Posted on"><i class="text-secondary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
              <span title="Posted by"><i class="text-secondary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
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
<div class="blog-index-page common-section-ui">
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
                  $proutput .= '<a class="text-dark static mr_5 d-inline badge badge-light border" href="' . esc_url( get_term_link( $progTerm->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'mycourse' ), $progTerm->name ) ) . '">' . esc_html( $progTerm->name ) . '</a>' . $separator;
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
                  <span title="views"><i class="text-secondary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $prviews; ?></span>
                  <span title="Posted on"><i class="text-secondary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
                  <span title="Posted by"><i class="text-secondary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
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
        <div class="col-12 col-md-6">
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
        <div class="col-12 col-md-6">
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
    </div>
  </div>
</section>

<section id="tools" class="common-section-ui pb_40 pt_60">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Online</span> Tools</h2>
  <div class="onlinetools"> 
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/base64-encode-and-decode/'); ?>">Base64 Encoder</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/base64-encode-and-decode/?tool=decode'); ?>">Base64 Decoder</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/list-to-array-convertor/'); ?>">List to Array</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/list-to-html-list-convertor/'); ?>">List to HTML List</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/minify-css/'); ?>">Minify CSS</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/minify-html/'); ?>">Minify HTML</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/minify-js/'); ?>">Minify JS</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/excel-to-array-convertor/'); ?>">Excel To Array</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/excel-to-json-convertor/'); ?>">Excel To JSON</a>
    <a class="btn btn-primary btnui3 mb_20" href="<?php echo site_url('/excel-to-xml-convertor/'); ?>">Excel To XML</a>
    <a class="btn btn-primary btnui3 mb_20" href="#">Resume Maker - Coming Soon</a>
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