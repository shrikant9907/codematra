<?php
get_header();
?>

<!-- Banner UI 1 -->
<div class="banner-section bg-primary text-white mt_0 min_h_500  relative">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="banner-card nobefore">
          <p class="pre-banner-heading f14 text-uppercase mb_20 ">Welcome to codematra.com</p>
          <h1 class="banner-heading f40 lh44 mb_20">A online plateform to learn <u class="text_yellow">coding</u> from the basics.</h1>
          <p class="banner-description mb_30 f16">Code Matra is an online platform to learn code from basic level to advanced. We always try to provide high-quality content and codes to our website visitor.</p>
          <div class="banner-actions">
              <a href="#ourTutorials" class="btn mb_20 btn-outline-primary text-uppercase btnui3s d-inline-flex flex center_center"><i class="text-secondary fas fa-user-graduate f20 mr_10"></i>Learn Coding <i class="f16 fa fa-angle-right ml_10" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 d-none d-md-block">
        <p class="pre-banner-heading f16 mb_20 text-center">Technologies you are learning here.</p>
        <div class="banner-icons mb_20">
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-bootstrap"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-html5"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-css3"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-react"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-php"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-wordpress"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-python"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-angular"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-github"></i>
          </div>
          <div class="card cbody noshadow flex center_center w_100 h_100">
            <i class="fab fa-js"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="frontpage" class="common-section-ui ">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-8">         
        <?php get_template_part( 'template-parts/content', 'featured-full' ); ?>
        <?php get_template_part( 'template-parts/content', 'popular-full' ); ?>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar('frontpage'); ?>
      </div>
    </div>
  </div>
</div>


<section id="tools" class="common-section-ui pb_40 pt_0">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Online</span> Tools</h2>
  <div class="onlinetools form-row">
    <?php
      $tools = getToolsList();
      if ($tools) {
        foreach($tools as $tool) {
          extract($tool);
          ?>
          <div class="col-4 col-md-3">
            <a class="<?php echo $color; ?> tdn card cui3c font_bold f26 flex center_center min_h_200" href="<?php echo site_url($link); ?>"><?php echo $name; ?></a>
          </div>
          <?php
        }
      }
    ?>  
  </div>    
  </div>
</section>

<!-- CTA Section -->
<section id="cta-section" class="common-section-ui bg-primary pb_80 text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card cui1 text-white">
          <h2 class="text-white mb_15 text-uppercase">Tell us if you need anything</h2>
          <p class="card-text f16">Your suggestions will help us to improve our website for you.</p>
        </div>
        <a href="<?php echo site_url('contact-us'); ?>" class="btn btn-primary btnui3s">Contact us</a>
      </div>    
  </div>
  </div>
</section>
<!-- CTA Section End -->
<?php   

get_footer();