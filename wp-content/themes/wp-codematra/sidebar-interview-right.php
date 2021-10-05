<?php 
$term_taxonomy = 'programs-category';
$term_obj_list = get_the_terms( $post->ID, $term_taxonomy );
$term_id = $term_obj_list['0']->term_id;
$term_name = $term_obj_list['0']->name;
$term_slug = $term_obj_list['0']->slug;
?>

<!-- WP Search Start -->
<form class="fui fui1 cui2 box_shw3 search-box mb_20" action="<?php echo site_url(); ?>" method="get" enctype="multipart/form-data" autocomplete="off">
  <div class="search-box">
    <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control" required="required" placeholder="Search...">
    <button type="submit" class="btn btn-sm btn-primary btnui1"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div> 
</form>
<!-- WP Search End -->

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
 