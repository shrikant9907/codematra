<!-- WP Search Start -->
<form class="fui fui1 cui2 box_shw3 search-box mb_20" action="<?php echo site_url(); ?>" method="get" enctype="multipart/form-data" autocomplete="off">
  <div class="search-box">
    <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control" required="required" placeholder="Search...">
    <button type="submit" class="btn btn-sm btn-primary btnui1"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div> 
</form>
<!-- WP Search End -->

<?php echo do_shortcode('[popularPostsList]'); ?>
<?php echo do_shortcode('[PostsList]'); ?>

<!-- Tags  -->
<div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Tag Cloud</h3>
  <div class="cbody px_15">
    <?php wp_tag_cloud( 'smallest=10&largest=20&number=50' ); ?>
  </div>
</div>

<!-- Subscription -->
<div class="card cui2 sidebar-listing r_0 mb_20 wp-block-tag-cloud">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Subscribe</h3>
  <div class="cbody px_0">
    <?php echo do_shortcode('[yikes-mailchimp form="1"]'); ?>
  </div>
</div>
