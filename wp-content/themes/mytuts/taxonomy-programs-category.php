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
<h1 class="text-center bg-primary mb_0 text-white ptb_40 f30 lh32"><?php echo $term_name; ?></h1>
<?php } ?>
<section class="common-section-ui page-breadcrumb bg-light pti_20 pbi_20">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-primary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo $term_name; ?> Programs</p>
  </div>
</section>
<div class="single-page bg-light common-section-ui pt_70">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-8 mx-auto">
      <div class="accordion bg-light accordion-ui2" id="accordion2">
          
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
        $query = new WP_Query( $args );
        $count = 1;
        if($query->have_posts()):
            while($query->have_posts()): 
              $query->the_post();
        ?>
          <div class="card cui2 mbi_10">
            <h3 class="card-header">
              <a class="text_dark f18" href="<?php the_permalink(); ?>">
                <?php echo '<span class="text-primary">'.$count.'.</span> '; the_title(); ?>
              </a>
            </h3>
          </div>	
	    
    <?php
    $count++;
    endwhile;
    wp_reset_query(); 
    endif; ?>         
  		  </div>                  
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 