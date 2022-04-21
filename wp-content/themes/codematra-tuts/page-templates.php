<?php get_header(); ?> 
<section class="page-section pb_20">
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php 
        if(have_posts()): while(have_posts()): the_post(); 
        the_content(); 
        endwhile; endif; 
        ?>
      </div>
    </div>
    <div class="row">
    <?php  
      $templates = getSiteTemplatesCm(); 
      if ($templates): 
        foreach($templates as $template) {
          extract($template);
          if ($template['show']) {  ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card cui3s r_0 border relative f14 mb_40 hs_11">
              <a href="<?php echo $link; ?>" class="tdn d-inline-block cimgwr min_h_200">
                <img class="card-img-top r_0" src="<?php echo $imgurl; ?>" alt="<?php echo $name; ?>">
              </a>
              <div class="card-body">
                <h3 class="f14 cheading font_bold lh16">
                  <a href="<?php echo $desc; ?>" class="tdn d-inline-block text-primary"><?php echo $name; ?></a>
                </h3>
                <div class="cdesc lh18 mb_10"><?php echo $desc; ?></div>
                <div class="cdesc lh18 w-100 text-center">
                  <a href="<?php echo $link; ?>" class="btn btn-secondary btnui2 btn-sm">Check Demo</a>
                </div>
              </div>
              </div>
            </div>
          </div>
          <?php }   
        } 
      endif; ?>
  </div>
</section>
      
<?php get_footer();  