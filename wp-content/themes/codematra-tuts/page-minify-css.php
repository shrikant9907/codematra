<?php 
global $post;
$pageslug = $post->post_name;

$css = '';
$minifyinputplaceholder = "Paste CSS code here.";
$minifyinputplaceholder2 = "Minified css goes here.";
$minifyBtnLabel = "Minify CSS";

if(isset($_POST['inputcss'])) {
  $input = trim($_POST['inputcss']);           
}

$output = str_replace('\"', '"', $input);  
$output = str_replace("\'", "'", $output);   
$output = minify_css($output);

if (isset($_POST['clear'])) {
  $input = $output = '';
}
?> 
<?php get_header(); ?>
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32">
  <?php the_title(); ?>
</h1>
<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <a class="tdn text-secondary" href="<?php echo site_url('/tools'); ?>" class="text-muted">Tools</a> / <?php the_title(); ?></p>
  </div>
</section>  
<section class="page-section common-section-ui">
  <div class="container">
    <div class="row">
      <div class="col-12"> 
        <div class="cm-base64-ende">
          <div class="tabs flex center_center mb_30">
            <a href="<?php echo site_url('/minify-css/'); ?>" class="btn <?php echo ($pageslug == 'minify-css') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Minify CSS
            </a>
            <a href="<?php echo site_url('/minify-html/'); ?>" class="btn <?php echo ($pageslug == 'minify-html') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Minify HTML
            </a>
            <a href="<?php echo site_url('/minify-js/'); ?>" class="btn <?php echo ($pageslug == 'minify-js') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Minify JS
            </a>
          </div>
          <div class="card cui1">
            <div class="card-body">
              <div class="card-title text-primary text-center mbi_5"><?php echo $endeTitle; ?></div>
              <div class="card-text text-center mb_30">
                <?php 
                  if(have_posts()): while(have_posts()): the_post(); 
                    if(get_the_content()) {
                      the_content();
                    } else {
                      echo $toolDesc;
                    } 
                  endwhile; endif; 
                ?>
              </div>
              <?php echo $endeInvalid; ?>
              <form class="fui fui1" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Input CSS</label>
                      <textarea required="required" rows="10" name="inputcss" class="form-control" placeholder="<?php echo $minifyinputplaceholder; ?>"><?php echo $input; ?></textarea>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Output: Minified CSS</label>
                      <textarea rows="10" class="form-control" placeholder="<?php echo $minifyinputplaceholder2; ?>"><?php echo $output; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="cmbende-actions flex justify-content-between">
                  <button type="submit" class="btn btn-primary btn-sm btnui2 f20 text-uppercase"><?php echo $minifyBtnLabel; ?></button>
                  <button type="submit" name="clear" class="btn btn-secondary btn-sm btnui2 f20 text-uppercase">Clear</button>
                </div>
              </form>
            </div>
			    </div>

        </div>
      </div>

    </div>
  </div>
</section>
<?php echo do_shortcode('[aam_display_ad ad_id="854"]'); ?>
<section id="tools" class="common-section-ui pb_40 pt_60 bg-light">
  <div class="container">
  <h2 class="heading_style type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Want to try </span> some more tools...</h2>
  <div class="onlinetools row">
    <?php
      $tools = getToolsList();
      if ($tools) {
        foreach($tools as $tool) {
          extract($tool);
          ?>
          <div class="col-4 col-md-3">
            <a class="<?php echo $color; ?> tdn card cui3c font_bold f26 flex center_center min_h_200" href="<?php echo site_url($link); ?>"><?php echo $name; ?></a>
          </div>
          <?php
        }
      }
    ?>  
  </div>    
  </div>
</section>
<?php get_footer(); ?> 