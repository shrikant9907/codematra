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
                  <h1 class="banner-heading f40 mb_10">A online plateform to learn everything from the basics.</h1>
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
         <h2 class="heading_style type2 text-uppercase">What are you looking for?</h2>
         <p class="mb_20">You can learn <strong>PHP</strong>, <strong>React JS</strong>, <strong>Web Design</strong> and many other popular web programming languages on codematra.com</p>

         <!-- Carousel -->
         <div class="ourtutorials four_col_carosusel">
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-primary bt5">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-python text-primary"></i>
                </div>
                <h5 class="card-title mb-0"><a class="text-primary" href="<?php echo site_url('/programs-category/python/'); ?>">Python</a></h5>
                <p class="card-text">Programs</p>
              </div>
            </div>
          </div>
          <!-- <div class="occ-item px_10 hidei" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-primary bt5">
              <div class="card-body"> 
                <div class="ciconrc ciconb">
                  <i class="fab fa-wordpress"></i>
                </div>
                <h5 class="card-title">Django</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div> -->
          <!-- <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-secondary bt5">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fas fa-code"></i>
                </div>
                <h5 class="card-title"><a href="<?php echo site_url('/tutorials/web-design'); ?>">Web Design</a></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div> -->
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-primary bt5">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-angular"></i>
                </div>
                <h5 class="card-title mbi_0 text-primary"><a href="<?php echo site_url('/tag/web-design/'); ?>">Web Design</a></h5>
                <p class="card-text">How to Code</p>
              </div>
            </div>
          </div>
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-secondary bt5">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-react"></i>
                </div>
                <h5 class="card-title mbi_0"><a href="<?php echo site_url('/interview-questions-category/react-js/'); ?>">React JS</a></h5>
                <p class="card-text">Interview Questions</p>
              </div>
            </div>
          </div>
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-primary bt5">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-php text-primary"></i>
                </div>
                <h5 class="card-title mb-0"><a class="text-primary" href="<?php echo site_url('/programs-category/php'); ?>">PHP</a></h5>
                <p class="card-text">Programs</p>
              </div>
            </div>
          </div>
          <div class="occ-item px_10" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-secondary bt5">
              <div class="card-body">
                <div class="ciconrc ciconb">
                  <i class="fab fa-wordpress"></i>
                </div>
                <h5 class="card-title mb-0"><a class="text-secondary" href="<?php echo site_url('/category/wordpress'); ?>">WordPress</a></h5>
                <p class="card-text">How To Code</p>
              </div>
            </div>
          </div>
          <!-- <div class="occ-item px_10 hidei" >
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-primary bt5">
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
            <div class="card cui3c mt_10 r_10 py_30 noshadow border-secondary bt5">
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


<!-- Recent Posts with Sidebar Start -->
<div class="blog-index-page common-section-ui pt_60 pb_40">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20">Recent Posts</h2>
	
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
          $catname = $categories['0']->name;  
          ?>
          <div class="col-12 col-sm-6 col-md-4">
					<div class="card cui1 relative f14">
					<span class="badge bg_indigo text-white absolute r_0 p_5 fixed_top_right">Web Design</span>
					<a href="<?php the_permalink($post->ID); ?>" class="mb_20 d-inline-block border cimgwr min_h_200" >
            <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
            <?php if(has_post_thumbnail()) { ?>
              <img class="card-img-top r_0" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          </a>
					<div class="card-body ">
						<h3 class="f16 mb_10 cheading font_bold lh20">
							<a href="<?php the_permalink($post->ID); ?>" class="d-inline-block text-dark" >
							  <?php the_title(); ?>
							</a>
         		</h3>
						<div class="cmeta text-muted f12 d-flex justify-content-between"><span><i class="fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span> <span><i class="fa fa-calendar mr_5" aria-hidden="true"></i> 1 Dec 2020</span></div>
						<div class="cdesc mb_0"><?php echo wp_trim_words($post->post_content, 15); ?></div>
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
<!-- Recent Posts with Sidebar Ends -->

<!-- Recent Programs with Sidebar Start -->
<div class="blog-index-page common-section-ui bg-light">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20">Recent Programs</h2>
	
	<div class="row">
		<div class="col-12">
			<div class="row">
        <?php 
          $args = array(
                  'post_type'         =>  'programs', 
                  'posts_per_page'    =>  6, 
                  'orderby'           =>  'id', 
                  'order'             =>  'desc', 
          );  
          $programsList = get_posts($args); 
          if ($programsList) {
          foreach($programsList as $progs) {
          $progTerms = get_the_terms($progs, 'programs-category');
          
          $badgeColor = getBadgeColor($progTerms['0']->name);
          ?>
          	<div class="col-12 col-sm-6 col-md-6">
              <div class="card cui3s relative f14 pt_15 min_h_100 ">
              <span class="badge <?php echo $badgeColor; ?> text-white absolute fixed_top_right"><?php echo $progTerms['0']->name; ?></span>
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
                <p class="cdesc mb_10"><?php echo wp_trim_words($progs->post_content, 12); ?></p>
                <div class="cmeta text-muted f12 d-flex justify-content-between"><span><i class="fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span> <span><i class="fa fa-calendar mr_5" aria-hidden="true"></i> <?php echo get_the_time('F j, Y'); ?></span></div>
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
	  <p class="text-center mt_40"><a href="<?php echo site_url('/programs'); ?>" class="btn btn-primary btnui3s">View More Programs</a></p>
    </div>
  
	</div>
</div>
</div>
<!-- Recent Programs with Sidebar Ends -->
 
<section id="interview" class="common-section-ui pb_40 pt_60">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20">Recent Interview Questions</h2>
    <div class="row">
        <div class="col-12 col-md-6">
          <div class="card cui1 r_0 pt_20">
            <div class="card-body">
              <h3 class="card-title text-primary text-uppercase"><span class="text-dark">React Js</span> - Interview Questions</h3>
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
                    <li class="list-item"><a href="<?php the_permalink($top->ID); ?>"><i class="fa fa-angle-right text-primary" aria-hidden="true"></i><?php echo $top->post_title; ?></a></li>
                <?php    
                }} else { ?>
                    <li class="list-item">No records found.</li>
                  <?php 
                }    
                ?>
              </ul>
            </div>
            <p class="text-center"><a class="btn btn-sm btn-primary btnui3" href="<?php echo site_url('interview-questions-category/react-js/'); ?>">More Questions</a></p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card cui1 r_0 pt_20 mb_20">
            <div class="card-body">
            <h5 class="card-title text-primary text-uppercase"><span class="text-dark">WordPress</span> - Interview Questions</h5>
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
                    <li class="list-item"><a href="<?php the_permalink($top->ID); ?>"><i class="fa fa-angle-right text-primary" aria-hidden="true"></i><?php echo $top->post_title; ?></a></li>
                <?php    
                }} else { ?>
                    <li class="list-item text-center">No records found.</li>
                  <?php 
                }    
                ?>
              </ul>
            </div>
            <p class="text-center"><a class="btn btn-sm btn-primary btnui3" href="<?php echo site_url('interview-questions-category/wordpress/'); ?>">More Questions</a></p>
          </div>
        </div>
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
        <a href="<?php echo site_url('contact-us'); ?>" class="btn btn-primary btnui3s">Contact us</a>
      </div>    
  </div>
  </div>
</section>
<!-- CTA Section End -->
 
<?php   

get_footer();