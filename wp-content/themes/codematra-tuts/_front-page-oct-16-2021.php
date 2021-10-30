<?php
get_header();
?>

<!-- Banner UI 1 -->
<div class="banner-section bg-primary text-white mt_0 min_h_500  relative">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="banner-card nobefore">
          <p class="pre-banner-heading f14 text-uppercase mb_20 ">Welcome to codematra.com</p>
          <h1 class="banner-heading f40 lh44 mb_20">A online plateform to learn <u class="text_yellow">coding</u> from the basics.</h1>
          <p class="banner-description mb_30 f16">Code Matra is an online platform to learn code from basic level to advanced. We always try to provide high-quality content and codes to our website visitor.</p>
          <div class="banner-actions">
              <a href="#ourTutorials" class="btn mb_20 btn-outline-primary text-uppercase btnui3s d-inline-flex flex center_center"><i class="text-secondary fas fa-user-graduate f20 mr_10"></i>Learn Coding <i class="f16 fa fa-angle-right ml_10" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 d-none d-md-block">
        <p class="pre-banner-heading f16 mb_20 text-center">Technologies you are learning here.</p>
        <div class="banner-icons mb_20">
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-bootstrap"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-html5"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-css3"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-react"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-php"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-wordpress"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-python"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-angular"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-github"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-js"></i>
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
 <section id="ourTutorials" class="common-section-ui f16 border-bottom">
   <div class="container">
     <div class="row">
       <div class="col-12">
         <h2 class="heading_style text-center type2 text-uppercase text-primary"><span class="text-secondary">What</span> do you want to learn?</h2>
         <p class="mb_30 text-center">Choose the topics from the following categories.</p>

         <!-- Carousel -->
         <div class="ourtutorials row">
          <?php $fcats = getfeaturedCategoriesCm(); 
          if ($fcats): 
            foreach($fcats as $fcat) {
              if ($fcat['show']) {
              ?>  
              <div class="col-12 col-sm-6 col-md-4 col-xl-3" >
                <div class="card cui3c r_0 py_30 noshadow relative">
                <a class="tdn overlay_w op0 absolute" href="<?php echo site_url($fcat['link']); ?>"></a>
                  <div class="card-body">
                    <div class="ciconrc ciconb">
                      <i class="<?php echo $fcat['icon']; ?> text-secondary"></i>
                    </div>
                    <h3 class="card-title mbi_10"><a  class="text-primary f22 " href="<?php echo site_url($fcat['link']); ?>"><?php echo $fcat['name']; ?></a></h3>
                    <p class="card-text lh20"><?php echo $fcat['desc']; ?></p>
                    <a href="<?php echo site_url($fcat['link']); ?>" class="btn-sm btn btn-primary btnui3s text-uppercase">Start Now! <i class='ml_5 fas fa-angle-right'></i></a>
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
<div class="popular-posts-section border-bottom common-section-ui bg-light pt_60 pb_40">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Most</span> Popular Codes</h2>
	
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
            <div class="card cui2 relative r_0 f14 mb_40 noshadow trans_3 ">
            <a href="<?php the_permalink($post->ID); ?>" class="tdn d-inline-block border-bottom cimgwr min_h_200 h_200 overflow_hidden" >
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
              <?php if(has_post_thumbnail()) { ?>
                <img class="card-img-top r_0 hs_12 trans_3 " src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
              <?php } else {  ?>
                <div class="img-altnative font_bold f30 hs_12 trans_3  bg-white text-primary op3 flex center_center min_h_200">
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
              <div class=" cdesc mb_10"><?php echo wp_trim_words(do_shortcode($post->post_content), 15); ?></div>
              <div class="cdesc">
                <a class="link-primary text-secondary tdn" href="<?php the_permalink(); ?>">Read more...</a>
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
<div class="recent-posts-section border-bottom common-section-ui pt_60 pb_40">
	<div class="container">
		<h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Recent</span> Codes, Posts and Projects</h2>
	
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
          <div class="col-12 col-sm-6">
					<div class="card cui2 relative r_0 f14">
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
  <p class="text-center mt_40"><a href="<?php echo site_url('/blog'); ?>" class="btn btn-primary btnui3s">View More Posts <i class="ml_5 fas fa-angle-right"></i></a></p>
   
</div>
</div>
<!-- Recent Posts with Sidebar Ends -->


<!-- Recent Programs with Sidebar Start -->
<div class="recent-programs-section border-bottom common-section-ui">
	<div class="container">
	<h2 class="heading_style type2 text-uppercase mb_40 text-primary"><span class="text-secondary">Recent</span> Programs</h2>
	<div class="row">
    <?php 
      // Post Tags
      $programscat = get_terms( array(
        'taxonomy' => 'programs-category', 
        'hide_empty' => true,
        'parent'=>0,
        'order' => 'asc',
        'orderby' => 'name'
    )
    );

    if ( !empty($programscat) ) { 
      foreach( $programscat as $procategory ) { 
      ?>
      <div class="col-12 col-md-6">
      <h3 class="mb_20 text-dark pt_20 text-uppercase"><?php echo $procategory->name; ?></h3>

        <?php 
          $args = array(
                  'post_type'         =>  'programs', 
                  'posts_per_page'    =>  5, 
                  'orderby'           =>  'id', 
                  'order'             =>  'desc', 
                  'tax_query'         =>  array(
                    array(
                      'taxonomy' => 'programs-category',
                      'field' => 'slug',
                      'terms' => $procategory->slug, 
                      'include_children' => false
                    )
                  ) 
          );  
          $programsList = get_posts($args); 
          if ($programsList) {
          foreach($programsList as $progs) {

          // View Counts
          $prviews = get_post_meta($progs->ID, 'visit_counts', true);
          if (!$prviews) {
            $prviews = 0;
          }
          ?>
              <div class="card cui3s bg-light border-0 relative f14 r_10 w-100">
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id($progs->ID)) ;  ?>
              <div class="card-body px_15 py_10">
                <h3 class="f16 m-0 cheading font_bold lh20">
                  <a href="<?php the_permalink($progs->ID); ?>" class="tdn d-inline-block text-primary" >
                   <?php echo $progs->post_title; ?>
                  </a>
              </h3>
                <div class="cmeta mb_0 text-muted f12 d-flex justify-content-between hidei">
                  <span title="views"><i class="text-primary fa fa-eye mr_5" aria-hidden="true"></i> <?php echo $prviews; ?></span>
                  <span title="Posted on"><i class="text-primary fa fa-clock mr_5" aria-hidden="true"></i> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
                  <span title="Posted by"><i class="text-primary fa fa-user mr_5" aria-hidden="true"></i> Shrikant</span>
                </div>
              </div>
              </div>
              
          <?php    
          }} else { ?>
              <p >No records found.</p>
            <?php 
          }    
          ?>
		 	
	    <p class="text-left mt_40"><a href="<?php echo get_term_link( $procategory ); ?>" class="btn btn-sm btn-primary btnui3s">View More <?php echo $procategory->name; ?> <i class="ml_5 fas fa-angle-right"></i></a></p>
    </div>
      <?php
      }
    } 
    ?>

	</div>
</div>
</div>
<!-- Recent Programs with Sidebar Ends -->
 
<section id="interview" class="common-section-ui border-bottom pb_40 pt_60 bg-light">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Recent</span> Interview Questions and Answers</h2>
    <div class="row">
      <?php 
        // Post Tags
        $iqcats = get_terms( array(
          'taxonomy' => 'interview-questions-category', 
          'hide_empty' => true,
          'parent'=>0,
          'order' => 'asc',
          'orderby' => 'name'
      )
      );

      if ( !empty($iqcats) ) { 
        foreach( $iqcats as $iqcat ) { 
        ?>
        <div class="col-12 col-md-6">
          <div class="card cui1 r_0 pt_20">
            <div class="card-body">
              <h3 class="card-title text-primary text-uppercase"><span class="text-dark"><?php echo $iqcat->name; ?></span></h3>
              <ul class="listing type1 licons w-100 mb_10 bg-transparent">
              <?php 
                $args = array(
                  'post_type'         =>  'interview-questions', 
                  'posts_per_page'    =>  5, 
                  'orderby'           =>  'id', 
                  'order'             =>  'DESC', 
                  'tax_query'         =>  array(
                      array(
                        'taxonomy' => 'interview-questions-category',
                        'field' => 'slug',
                        'terms' => $iqcat->slug, 
                        'include_children' => false
                      )
                    ) 
                  );  
                $reactQuestions = get_posts($args); 
                if ($reactQuestions) {
                foreach($reactQuestions as $top) {
                ?>
                    <li class="list-item bg-white mb_10"><a href="<?php the_permalink($top->ID); ?>"><i class="fa fa-angle-right text-secondary" aria-hidden="true"></i><?php echo $top->post_title; ?></a></li>
                <?php    
                }} else { ?>
                    <li class="list-item">No records found.</li>
                  <?php 
                }    
                ?>
              </ul>
            </div>
            <p class="text-left"><a href="<?php echo get_term_link( $iqcat ); ?>" class="btn btn-sm btn-primary btnui3s">View More <?php echo $iqcat->name; ?> <i class="ml_5 fas fa-angle-right"></i></a></p>
          </div>
        </div>
        <?php
        }
      } 
      ?>
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
          <div class="col-4 col-md-3">
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
<section id="cta-section" class="common-section-ui bg-primary pb_80 text-center">
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