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

if ($term_name) { ?>
  <h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php echo $term_name; ?></h1>
<?php } ?>
<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo $term_name; ?></p>
  </div>
</section>
<div class="interview-page common-section-ui">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <?php get_sidebar('interview-left'); ?>
      </div>
      <div class="col-12 col-sm-6 col-md-8">
        <?php
          $args = array(
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
            echo '<div class="accordion accordion-ui2" id="iqaccordion">';
            while(have_posts()): 
              the_post();
              $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
              if (!$visitsCount) {
                $visitsCount = 0;
              }
              ?>
              
              <div class="accordion-item mb_20 border-top">
                <h2 class="accordion-header" id="heading<?php echo $count; ?>">
                  <div class="accordion-button bg-white text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>">
                    <?php the_title(); ?>
                  </div>
                </h2>
                <div id="collapse<?php echo $count; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $count; ?>" data-bs-parent="#iqaccordion">
                  <div class="accordion-body typography">
                  <?php the_content(); ?>
                  </div>
                </div>
              </div>
              
            <?php
            $count++;
          endwhile; 
          echo '</div>';
        endif; ?>         
  		</div>
    </div>
  </div>
</div>
       
<?php get_footer(); 