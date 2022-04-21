<?php 

$term_taxonomy = 'programs-category';
$term_obj_list = get_the_terms( $post->ID, $term_taxonomy );
$term_id = $term_obj_list['0']->term_id;
$term_name = $term_obj_list['0']->name;
$term_slug = $term_obj_list['0']->slug;

?>

<!-- Programs List -->
<div class="card cui2 sidebar-listing">
    <div class="card-header rounded-0 py_20 border-bottom">
        <?php if ($term_name) {
            echo '<h3 class="text-primary f18 mb_0 font_bold">'.$term_name.'</h3>';
        } else {
            echo '<h3 class="text-primary f18 mb_0 font_bold"> Programs</h3>';
        }
        ?>
        
    </div>
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
<!-- Social Icons  -->
<div class="card cui2 typography">
    <div class="card-header rounded-0 py_20 mb_20 border-bottom">
        <h3 class="text-primary f18 mbi_0 font_bold">Follow us</h3>
    </div>
    <div class="card-body pti_0">
        <ul class="socialicons siconsb"> 
          <li class="facebook"><a href="https://www.facebook.com/codematra" title="Code Matra - Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          <li class="codepen"><a href="https://codepen.io/codematra" title="Code Pen - Code Matra" target="_blank"><i class="fab fa-codepen"></i></a></li>
          <li class="youtube"><a href="https://www.youtube.com/channel/UCbD6k-T54c8I-8UI0vqQ79Q" title="Code Matra - Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
          <!-- <li class="twitter"><a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li> -->
          <!-- <li class="instagram"><a href="#" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li> -->
        </ul>
    </div>
</div>