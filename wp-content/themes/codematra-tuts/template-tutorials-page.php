<?php 
/*
* Template Name: Tutorials Page Template
*/
get_header(); 
?> 

<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>

<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo the_title(); ?></p>
  </div>
</section>
<div class="page-section common-section-ui">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <?php get_sidebar('tutorials'); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-8">
              <?php 
                if(have_posts()): 
                  while(have_posts()): the_post();  
              ?>
              <?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ;  ?>
              <div class="card cui1 noshadow r_0 w-100 typography">
                  <?php the_content(); ?>
              </div> 
              <?php 
                endwhile; 
                endif; 
              ?>   
            </div>
      
        </div>
    </div>
</div>
      
<?php get_footer();  