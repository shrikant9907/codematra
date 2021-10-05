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
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <?php echo $term_name; ?> Interview Questions</p>
  </div>
</section>
<div class="interview-page common-section-ui">
  <div class="container">
    <div class="form-row">
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('interview-left'); ?>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
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
            while(have_posts()): 
              the_post();
              $visitsCount = get_post_meta(get_the_ID(), 'visit_counts', true);
              if (!$visitsCount) {
                $visitsCount = 0;
              }
              ?>
              <div class="card cui3 r_0 typography">
                <div class="card-body pbi_0">
                  <h2 class="mb_20 text-primary f24"><?php the_title(); ?></h2>
                  <?php the_content(); ?>
                </div>	
              </div>	
            <?php
            $count++;
          endwhile; 
        endif; ?>         
  		</div>
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('interview-right'); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 