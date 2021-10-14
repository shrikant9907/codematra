<!-- WP Search Start -->
<!-- <form class="fui fui1 cui2 box_shw3 search-box mb_20" action="<?php echo site_url(); ?>" method="get" enctype="multipart/form-data" autocomplete="off">
  <div class="search-box">
    <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control" required="required" placeholder="Search...">
    <button type="submit" class="btn btn-sm btn-primary btnui1"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div> 
</form> -->
<!-- WP Search End -->
<!-- Profile -->
<div class="card cui2 cteam py_0 px_0 text-center mb_20 f14 r_0 border">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">About The Author</h3>
  <div class="cbody px_15">
    <div class="w_150 mx-auto mb_10"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shrikant-profile.jpg" class="r_100p card-img img-thumbnail"></div>
    <div class="f18 mb_0 font_bold"> Shrikant Yadav </div>
    <p class="designation text-muted mb_5">Full Stack Web Developer</p>
    <p class="card-text mb_5">I have 7+ Years of experience in Web Development Technologies. I like to write codes for the beginners to make the technologies easy to learn.</p>
    <div class="socialicons justify-content-center"> 
      <a href="https://www.facebook.com/shrikantyadav9907/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.linkedin.com/in/shrikant9907/" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
      <a href="https://www.instagram.com/shrikant99070/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCbD6k-T54c8I-8UI0vqQ79Q" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</div>

<?php echo do_shortcode('[popularPostsList]'); ?>
<?php echo do_shortcode('[PostsList]'); ?>
<?php echo do_shortcode('[categoriesList]'); ?>

<!-- Tags  -->
<div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Popular Tags at Code Matra</h3>
  <div class="cbody px_15">
    <?php wp_tag_cloud( 'smallest=10&largest=20&number=20' ); ?>
  </div>
</div>

<!-- Subscription -->
<div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Subscribe to Code Matra</h3>
  <div class="cbody px_0">
    <?php echo do_shortcode('[yikes-mailchimp form="1"]'); ?>
  </div>
</div>

<?php echo do_shortcode('[aam_display_ad ad_id="849"]'); ?>
