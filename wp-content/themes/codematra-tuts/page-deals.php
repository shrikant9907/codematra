<?php get_header(); ?> 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>

<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo the_title(); ?></p>
  </div>
</section>

<div class="single-page common-section-ui">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php 
                if(have_posts()): while(have_posts()): the_post(); 
                the_content(); 
                endwhile; endif; 
                ?>
            </div>
            <div class="col-12 col-md-8 mx-auto">
              <div class="card cui4 stext relative r_0 mb_20">
                <a class="overlay_b absolute op0" target="_blank" href="https://deletezero.com/my-account/aff.php?aff=85"></a>
                <div class="ciconr litem mbi_0 max_w_200">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/delete-zero-logo.png" alt='Delete Zero - Cheap Hosting Plans' />
                </div>
                <div class="card-body">
                  <div class="card-text"> 
                    <h3 class="f24 mb_10 text-dark">Delete Zero - Cheap Hosting Plans</h3> 
                    <p>Delete Zero is providing the cheap hosting plans. Starting from 450 INR / Year. It is a great deal for beginner or startups to start their website in low cast. Check out the best hosting plans now. </p>
                    <p class="mbi_0"><a class="btn btn-primary btnui2" href="https://deletezero.com/my-account/aff.php?aff=85">Grab The Deal Now! <i class="fa fa-angle-right ml_10" aria-hidden="true"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</section>
      
<?php get_footer();  