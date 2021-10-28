<?php get_template_part( 'template-parts/content', 'author-profile' ); ?>
<?php get_template_part( 'template-parts/content', 'featured-posts' ); ?>
<?php get_template_part( 'template-parts/content', 'popular-posts' ); ?>
<?php get_template_part( 'template-parts/content', 'top-categories' ); ?>

<!-- Tags  -->
<div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Popular Tags at Code Matra</h3>
  <div class="cbody px_15">
    <?php wp_tag_cloud( 'smallest=10&largest=20&number=10' ); ?>
  </div>
</div>

<!-- Subscription -->
<!-- <div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Subscribe to Code Matra</h3>
  <div class="cbody px_0">
    <?php //echo do_shortcode('[yikes-mailchimp form="1"]'); ?>
  </div>
</div> -->
<?php echo do_shortcode('[aam_display_ad ad_id="849"]'); ?>