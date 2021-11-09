<?php 
  if (is_front_page() || is_home()) { 
    get_template_part( 'template-parts/content', 'loader' );
  }
?>
<?php get_template_part( 'template-parts/section', 'subscription' ); ?>
<?php get_template_part( 'template-parts/footer', 'basic' ); ?>
 
  <div class="text-center fixed_bottom px_20 py_5 cookienotice bg_black text-white">This website uses cookies to ensure you get the best user experience on our website. <a href="<?php echo site_url('/privacy-policy'); ?>">Learn more</a> <button class="cookienotice-btn ml_5 btn btn-sm btn-secondary min_w_25">OK</button></div>

 	<a href="#" class="gotoparrow"><i class="fas fa-arrow-up"></i></a>
 
  <?php wp_footer(); ?>

  
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/highlight.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/highlightjs-line-numbers.js@2.8.0/dist/highlightjs-line-numbers.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/animate/aos.js"></script>
  <script>
    AOS.init();
    hljs.highlightAll();
    hljs.initLineNumbersOnLoad();
  </script>

</body>
</html>  