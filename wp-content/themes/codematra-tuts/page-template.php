<?php 
/*
* Template Name: Template Details Page
*/
get_header(); 
?> 
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ; 
$visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
if (!$visitsCount) {
  $visitsCount = 0;
}
?>
<h1 class="text-center mb_0 text-secondary border-top ptb_40 border-bottom mont_serrat f30 lh32"><?php the_title(); ?></h1>
<section class="common-section-ui page-breadcrumb border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php the_title(); ?></p>
  </div>
</section>
<section class="page-section common-section-ui">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <?php if(has_post_thumbnail()) { ?>
          <img class="card-img-top r_0 mb_20 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
        <?php } ?>
        <p class="text-muted"><i class="fa fa-eye mr_5 text-primary" title="Views" aria-hidden="true"></i> Views: <?php echo $visitsCount; ?></p>
        <?php the_content(); ?>
      </div>
      <div class="col-12 col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer();  