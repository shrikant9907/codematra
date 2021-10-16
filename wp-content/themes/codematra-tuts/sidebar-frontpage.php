<?php get_template_part( 'template-parts/content', 'latest-posts' ); ?>
<?php get_template_part( 'template-parts/content', 'top-categories' ); ?>
<?php echo do_shortcode('[showPostTerms uitype="listing" ]'); ?>
<?php echo do_shortcode('[showPostTerms post_type="programs" taxonomy="programs-category" heading="Programs" uitype="listing" ]'); ?>