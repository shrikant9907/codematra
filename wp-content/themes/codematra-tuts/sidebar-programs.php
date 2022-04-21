<?php 

$term_taxonomy = 'programs-category';
$term_obj_list = get_the_terms( $post->ID, $term_taxonomy );
$term_id = $term_obj_list['0']->term_id;
$term_name = $term_obj_list['0']->name;
$term_slug = $term_obj_list['0']->slug;

?>

<!-- Programs List -->
<div class="card cui3 r_0 sidebar-listing noshadow">
  <?php if ($term_name) {
    echo '<h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">'.$term_name.'</h3>';
  } else {
    echo '<h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold"> Programs</h3>';
  }
  ?>
  
    <div class="cbody p-0">
        <ul class="listing type2">
        <?php
        $args = array(
          'post_type'         =>  'programs', 
          'posts_per_page'    =>  -1, 
          'orderby'           =>  'id', 
          'order'             =>  'asc', 
          'tax_query'         =>  array(
            array(
              'taxonomy' => 'programs-category',
              'field' => 'slug',
              'terms' => $term_slug, 
              'include_children' => false
            )
          ) 
          );  
        $phpPrograms = get_posts($args); 
        $sn = 0;
        foreach($phpPrograms as $program) {
          $sn++;
        ?>
          <li class="">
            <a class="text-dark" href="<?php echo the_permalink($program->ID); ?>">
              <span class="text-primary"><?php echo $sn; ?>.</span> <?php echo $program->post_title ?>
            </a>
          </li>
        <?php    
        }    
        ?>
        </ul>
    </div>
</div>

<?php echo do_shortcode('[aam_display_ad ad_id="851"]'); ?>  