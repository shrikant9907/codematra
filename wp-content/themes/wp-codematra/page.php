<?php get_header(); ?> 
 
<section class="page-section bg-light">
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
    </div>
</section>
      
<?php get_footer();  