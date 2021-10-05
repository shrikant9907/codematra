<?php get_header();
?>
<script>
  window.location.href="<?php echo site_url('/'); ?>";
</script>
<?php 
wp_redirect(site_url('/'));
die();
?>

<section class="page-section common-section-ui bg-light">
    <h1 class="text-center py_40 f30 lh34">Error 404 !!. Page not found.</h1>
                 
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <i class="fas display-1 text-danger fa-frown-open"></i>
                <div class="py_20">
                    <!-- <h2 class="mb_20 text-danger"><b>Opps!</b></h2> -->
                    <h3 class="text_orange f20 lh26 mb_20">The page your are looking for does not exist.</h3>
                    <p><a class="btn btn-primary px_30" href='<?php echo site_url('/'); ?>'>Go To Home page</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>