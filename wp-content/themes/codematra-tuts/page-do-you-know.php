<?php get_header(); ?> 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>
<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php the_title(); ?></p>
  </div>
</section>
<div class="common-section-ui pb_60">
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
          if ($handle = opendir('./tuts-images/doyouknow')) {
            while (false !== ($file = readdir($handle))) {
              if ($file != "." && $file != "..") {
                $name = ucfirst(str_replace('-', ' ', basename($file, '.png')));
                ?>
                <div class="col-12 col-md-6">
                  <div class="card cui3 r_0 doyouknow mb_20">
                    <img src="<?php echo site_url('/tuts-images/doyouknow/'. $file); ?>" alt="<?php echo $name; ?>" />
                    <div class="card-body">
                      <p>Share on social media...</p>
                      <ul class="socialicons siconsb"> 
                        <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fcodematra&quote=<?php echo $name; ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fwww.facebook.com%2Fcodematra&title=<?php echo $name; ?>&summary=Do you know - Tips and Tricks from beginners and developers.&source=https%3A%2F%2Fwww.facebook.com%2Fcodematra" title="Linked In" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li class="mailto"><a href="mailto:?subject=<?php echo $name; ?>&body=Do you know - Tips and Tricks from beginners and developers.:%20https%3A%2F%2Fwww.facebook.com%2Fcodematra" title="Mail To" target="_blank"><i class="far fa-envelope"></i></a></li>
                        <!-- <li class="twitter"><a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li> -->
                        <!-- <li class="instagram"><a href="#" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li> -->
                        <!-- <li class="youtube"><a href="#" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li> -->
                      </ul>
                    </div>
                  </div>
                </div>
                <?php
              }
            }
            closedir($handle);
          }
          ?>
        </div>
    </div>
</section>
      
<?php get_footer();  