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
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('mcqs-left'); ?>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
        <div id="accordion" class="mti_0">
        <form action="" method="post">
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
              $option1 = htmlentities(html_entity_decode(get_post_meta(get_the_ID(), 'option1', true)));
              $option2 = htmlentities(html_entity_decode(get_post_meta(get_the_ID(), 'option2', true)));
              $option3 = htmlentities(html_entity_decode(get_post_meta(get_the_ID(), 'option3', true)));
              $option4 = htmlentities(html_entity_decode(get_post_meta(get_the_ID(), 'option4', true)));
              $answer = htmlentities(html_entity_decode(get_post_meta(get_the_ID(), 'correctanswer', true)));
              ?>
              <div class="card cui1 r_0 typography">
                <div class="card-body px-0">
                  <h2 class="mb_20 text-dark f24">
                    Q <?php echo $count; ?>. 
                    <?php echo htmlentities(html_entity_decode(get_the_title())); ?>
                  </h2>
                  <?php the_content(); ?>
                  <p class="bg-light px_10 py_5 flex align-items-center">
                    <input id="option1<?php the_ID(); ?>" class="mr_10" type="radio" value="option1" name="mcqoption<?php the_ID(); ?>" /> 
                    <label class="m-0" for="option1<?php the_ID(); ?>"><?php echo $option1; ?></label>
                  </p>
                  <p class="bg-light px_10 py_5 flex align-items-center">
                    <input id="option2<?php the_ID(); ?>" class="mr_10" type="radio" value="option2" name="mcqoption<?php the_ID(); ?>" />
                    <label class="m-0" for="option2<?php the_ID(); ?>"><?php echo $option2; ?></label>
                  </p>
                  <p class="bg-light px_10 py_5 flex align-items-center">
                    <input id="option3<?php the_ID(); ?>" class="mr_10" type="radio" value="option3" name="mcqoption<?php the_ID(); ?>" />
                    <label class="m-0" for="option3<?php the_ID(); ?>"><?php echo $option3; ?></label>
                  </p>
                  <p class="bg-light px_10 py_5 flex align-items-center">
                    <input id="option4<?php the_ID(); ?>" class="mr_10" type="radio" value="option4" name="mcqoption<?php the_ID(); ?>" />
                    <label class="m-0" for="option4<?php the_ID(); ?>"><?php echo $option4; ?></label>
                  </p>
                    <div class="card cui1 mbi_0">
                      <div id="heading<?php the_ID(); ?>">
                        <button type="button" class="btn btn-sm mb_20 btn-secondary btnui2 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapseTwo">Check Correct Answer</button>
                      </div>
                      <div id="collapse<?php the_ID(); ?>" class="alert alert-info collapse" aria-labelledby="heading<?php the_ID(); ?>" data-parent="#accordion">
                        <?php echo $answer; ?>
                      </div>
                    </div>
                  </div>
              </div>	
            <?php
            $count++;
          endwhile; 
        endif; ?>
        <!-- <p>Submit to check the result.</p> -->
        <!-- <p class="text-center"><button class="btn btn-primary btnui2" type="submit" name="mcq" value="submit">Submit</button></p>          -->
  		  </form>
        </div>	
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <?php get_sidebar('interview-right'); ?>
      </div>
    </div>
  </div>
</div>
       
<?php get_footer(); 