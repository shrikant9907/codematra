<?php get_header(); ?> 
<h1 class="text-center bg-primary mb_0 text-white ptb_40 f30 lh32">Search Result</h1>

<section class="common-section-ui page-breadcrumb bg-light pti_20 pbi_20">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-primary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / Search Result for <?php echo $_GET['s']; ?></p>
  </div>
</section>
<!-- Banner UI 1 -->
<section class="common-section-ui bg-light pt_0">
  <div class="container">
      <div class="row">
          <div class="col-12">
            <div class="cui2 card">
              <form class="cbody fui fui1 search-box" action="" method="get" enctype="multipart/form-data" autocomplete="off">
                  <div class="search-box">
                    <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control" required="required" placeholder="Search Codes, Programs, Tutorials, Interview Questions etc...">
                    <button type="submit" class="btn btn-primary btnui2 f14i">Search</button>
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
        <div class="card cui2 mbi_15">
          <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_title(); ?>" class="d-inline-block hidei"><img class="card-img-top r_0" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
          <?php } ?>
          <div class="card-body pri_30 pli_30 pbi_30">
             <div class="text_bold f18 mb_10"><a class="tdn text-primary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
             <div class="text-dark px_5 py_5 mb_10 f12 d-flex justify-content-between">
               <span><i class="fa fa-user mr_5 text-primary" aria-hidden="true"></i> <?php the_author(); ?></span>
               <span><i class="fa fa-clock mr_5 text-primary" aria-hidden="true"></i> <?php //echo get_the_date(); ?> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' ); ?></span>
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