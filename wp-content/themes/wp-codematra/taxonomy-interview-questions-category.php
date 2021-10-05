<?php get_header();  

// Current Term
$quriedObject = get_queried_object();
$term_id = $quriedObject->term_id;
$term_taxonomy = $quriedObject->taxonomy; 
$term = get_term_by('id', $term_id, $term_taxonomy);
$term_name = $term->name; 
$term_slug = $term->slug; 

global $post;
$post_type = $post->post_type;

if ($term_name) {
?>
<h1 class="text-center bg-primary mb_0 text-white ptb_40 mont_serrat f30 lh32"><?php echo $term_name; ?></h1>
<?php } ?>
<section class="common-section-ui page-breadcrumb bg-light pti_20 pbi_20">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-primary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo $term_name; ?> Interview Questions</p>
  </div>
</section>
<div class="single-page bg-light common-section-ui pt_70">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-8">
          
      <?php
        $args   =   array(
                            'post_type'         =>  $post_type,
                            'posts_per_page'    =>  -1, 
                            'orderby'           =>  'date', 
                            'order'             =>  'asc', 
                            'tax_query'         =>  array(
                                                        array(
                                                                'taxonomy' => $term_taxonomy,
                                                                'field' => 'id',
                                                                'terms' => $term_id, 
                                                                'include_children' => false
                                                            )
                                                        )
                        );  
        query_posts($args);
        $count = 1;
        if(have_posts()):
            while(have_posts()): 
                the_post();
                $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
                if (!$visitsCount) {
                  $visitsCount = 0;
                }
        ?>
        <div class="accordion bg-light accordion-ui2" id="accordion2">
          <div class="card cui2 typography r_10">
            <h3 class="card-header mbi_0" role="tab" id="heading<?php the_ID(); ?>">
              <a class="text-primary" href="#aiqui<?php the_ID(); ?>" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" data-target="#aiqui<?php the_ID(); ?>" aria-controls="aiqui<?php the_ID(); ?>"><span class="card-title"><?php echo $count .'. '; the_title(); ?></span> <i class="fas fa-caret-down"></i> <i class="fas fa-caret-left"></i></a>
            </h3>
            <div class="card-body collapse show pbi_10 pti_0" id="aiqui<?php the_ID(); ?>" role="tabpanel" aria-labelledby="heading<?php the_ID(); ?>" data-parent="#accordion2">
              <?php the_content(); ?>
              <div class="flex hidei">
                <span class="text-primary f14 d-flex flex center_center" title="views"><i class="static fa fa-eye mr_5" aria-hidden="true"></i><?php echo $visitsCount; ?></span>
              </div>
            </div>	
          </div>	
        </div>                  
      
    <?php
    $count++;
    endwhile; 
    endif; ?>         
  		</div>
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 