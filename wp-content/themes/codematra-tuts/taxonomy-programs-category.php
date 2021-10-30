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
<h1 class="text-center mb_0 text-secondary border-top border-bottom ptb_40 f30 lh32"><?php echo $term_name; ?></h1>
<?php } ?>
<section class="common-section-ui page-breadcrumb border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo $term_name; ?></p>
  </div>
</section>
<div class="single-page common-section-ui">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('program-left'); ?>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
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
              $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
              if (!$visitsCount) {
                $visitsCount = 0;
              }
        ?>
          <div class="card cui3 r_0 mbi_20">
            <h3 class="card-header">
              <a class="text-dark font_normal tdn f14 d-flex justify-content-between" href="<?php the_permalink(); ?>">
                <span><?php echo '<span class="text-dark">'.$count.'.</span> '; the_title(); ?></span>
                <span class="text-primary font_normal f14 d-flex flex center_center" title="views"><i class="static fa fa-eye mr_5" aria-hidden="true"></i><?php echo $visitsCount; ?></span>
              </a>
            </h3>
          </div>	
	    
    <?php
    $count++;
    endwhile;
    wp_reset_query(); 
    endif; ?>         
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('program-right'); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 