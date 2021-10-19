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

$downloadCount = get_post_meta(get_the_ID(), 'template_download_count', true);
if (!$downloadCount) {
  $downloadCount = 0;
}
?>
<h1 class="text-center mb_0 text-secondary border-top ptb_40 border-bottom mont_serrat f30 lh32"><?php the_title(); ?></h1>
<section class="common-section-ui page-breadcrumb border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <a class="tdn text-secondary" href="<?php echo site_url('/templates'); ?>" class="text-muted">Templates</a> / <?php the_title(); ?></p>
  </div>
</section>
<section class="page-section common-section-ui pt_40">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <div class="template-preview-card">
          <div class="overlay overlay_b absolute d-none">
            <a class="btn btn-outline-secondary" href="https://shrikant9907.github.io/blog-template/dist/" target="_blank" rel="noopener">
              <i class="fas fa-link mr_10"></i>Launch Live Preview
            </a>
          </div>
          <?php if(has_post_thumbnail()) { ?>
            <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
          <?php } ?>
        </div>
        <p class="text-muted d-flex justify-content-between">
          <span><i class="fa fa-eye mr_5 text-primary" title="Views" aria-hidden="true"></i><?php echo $visitsCount; ?></span>
          <span><i class="fa fa-download mr_5 text-primary" title="Downloads" aria-hidden="true"></i> <span class="downloadcounts"><?php echo $downloadCount; ?></span></span>
        </p>
        <?php the_content(); ?>
      </div>
      <div class="col-12 col-md-4">
        <?php get_sidebar('template'); ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer();  