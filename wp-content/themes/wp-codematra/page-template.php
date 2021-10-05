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
<section class="page-section pb_20">
<h1 class="text-center bg-primary mb-5 text-white ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <?php if(has_post_thumbnail()) { ?>
          <img class="card-img-top r_0 mb_20 border" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
        <?php } ?>
        <p class="text-muted"><i class="fa fa-eye mr_5 text-primary" title="Views" aria-hidden="true"></i> Views: <?php echo $visitsCount; ?></p>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer();  