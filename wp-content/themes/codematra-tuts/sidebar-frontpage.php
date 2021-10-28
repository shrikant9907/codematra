<?php get_template_part( 'template-parts/content', 'featured-posts' ); ?>
<?php get_template_part( 'template-parts/content', 'popular-posts' ); ?>
<?php get_template_part( 'template-parts/content', 'top-categories' ); ?>
<!-- Tags  -->
<div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-secondary f16 mb_0 font_bold">Popular Tags</h3>
  <div class="cbody px_15">
    <?php wp_tag_cloud( 'smallest=10&largest=20&number=20' ); ?>
  </div>
</div>