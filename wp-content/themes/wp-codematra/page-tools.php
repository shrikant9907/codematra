<?php get_header(); ?> 
 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>
<section id="tools" class="common-section-ui pb_40 pt_20">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Free</span> Tools Online</h2>
  <div class="col-content">
    <?php 
      if(have_posts()): while(have_posts()): the_post(); 
        the_content(); 
      endwhile; endif; 
    ?>
  </div>
  <div class="onlinetools row">
    <?php
      $tools = getToolsList();
      if ($tools) {
        foreach($tools as $tool) {
          extract($tool);
          ?>
          <div class="col-12 col-sm-4 col-md-3">
            <a class="<?php echo $color; ?> tdn card cui3c font_bold f26 flex center_center min_h_200" href="<?php echo site_url($link); ?>"><?php echo $name; ?></a>
          </div>
          <?php
        }
      }
    ?>  
  </div>    
  </div>
</section>
      
<?php get_footer();  