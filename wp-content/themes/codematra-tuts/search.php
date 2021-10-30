<?php get_header(); ?> 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php _e('Search Result'); ?> for <?php echo $_GET['s']; ?></h1>

<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php _e('Search Result'); ?> / <?php echo $_GET['s']; ?></p>
  </div>
</section>

<section class="page-section common-section-ui">
  <div class="container">
      <div class="row">
          <div class="col-12">
            <div class="cui2 card r_0">
              <form class="cbody fui fui1 search-box" action="" method="get" enctype="multipart/form-data" autocomplete="off">
                  <div class="search-box">
                    <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control" required="required" placeholder="Search Codes, Programs, Tutorials, Interview Questions etc...">
                    <button type="submit" class="btn btn-primary btnui1 f14i">Search</button>
                  </div> 
              </form>
            </div>
          </div>
      </div>
  </div>
  
  <div class="container">
    <div class="row">
      <?php  
      if(have_posts()): 
        $count = 0;
        while(have_posts()): the_post();  
        $image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ; 
      ?>
      <div class="col-12 col-sm-6">
        <div class="card cui3 r_0 mbi_20">
          <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_title(); ?>" class="d-inline-block hidei"><img class="card-img-top r_0" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
          <?php } ?>
          <div class="card-body p-0">
             <div class="text_bold f18 mb_10"><a class="tdn text-primary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
             <div class="text-dark px_5 py_5 mb_10 f12 d-flex justify-content-between">
               <span><i class="fa fa-user mr_5 text-secondary" aria-hidden="true"></i> <?php the_author(); ?></span>
               <span><i class="fa fa-clock mr_5 text-secondary" aria-hidden="true"></i> <?php //echo get_the_date(); ?> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
              </div>
             <p class=""><?php echo wp_trim_words(get_the_content(), 18) ?></p>
             <div class="text-left"><a href="<?php the_permalink(); ?>" class="text-primary tdn"><?php _e('View More Details'); ?> <i class="ml_5 fas fa-angle-double-right    "></i></a></div>  
          </div>
        </div>
      </div>
      <?php  
        endwhile; 
        wp_reset_query();
        else:
          ?>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="">Content not found for <span class="text_bold text-primary"><?php echo $_GET['s']; ?></span>.</div>
              </div>
            </div>
          </div>
          <?php
        endif; 
      ?>      
    </div>
  </div>
</section>
      
<?php get_footer(); 