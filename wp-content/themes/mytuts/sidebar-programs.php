<?php 

$term_taxonomy = 'programs-category';
$term_obj_list = get_the_terms( $post->ID, $term_taxonomy );
$term_id = $term_obj_list['0']->term_id;
$term_name = $term_obj_list['0']->name;
$term_slug = $term_obj_list['0']->slug;

?>

<!-- Programs List -->
<div class="card cui2">
    <div class="card-header rounded-0 pb_0">
        <h3 class="text-primary mb_0">PHP Programs</h3>
    </div>
    <div class="cbody">
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
            <li class="px-0">
                <a class="text_blue" href="<?php echo the_permalink($program->ID); ?>">
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
<div class="card cui2">
    <div class="card-header rounded-0 pb_0">
        <h3 class="text-primary mb_0">Follow us</h3>
    </div>
    <div class="card-body">
        <ul class="socialicons siconsb"> 
            <li class="facebook"><a href="#" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li class="twitter"><a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="instagram"><a href="#" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li class="youtube"><a href="#" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li class="codepen"><a href="#" title="Codepen" target="_blank"><i class="fab fa-codepen text-dark"></i></a></li>
            <li class="github"><a href="#" title="Github" target="_blank"><i class="fab fa-github  text-dark"></i></a></li>
        </ul>
    </div>
</div>