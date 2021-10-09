<?php
global $post;
$pageslug = $post->post_name;
$input = $output  = $endeInvalid = '';
$listType = 'unordered';
$endeTitle        = 'Online List to HTML List Converter';
$endeBtnLabel     = 'Convert List to HTML List';
$endePlaceholder  = 'Item 1 
Item 2
Item 3
';
$endePlaceholder2 = 'HTML list output goes here.';
$toolDesc         = 'List to HTML list Converter is an online tool to convert list of items to HTML ordered or unordered list.';

if (isset($_POST['listitems'])) {
  if ($_POST['listitems']=='') {
    $endeInvalid = "<p class='alert alert-danger'>Input box should not be empty</p>";
  } else {
    $input = stripslashes(trim($_POST['listitems']));
    if (isset($_POST['listtype']) && ($_POST['listtype'] == 'ordered')) {
      $listType = $_POST['listtype'];
      $output = '<ol><br /><li>'.trim(str_replace(array("\r\n"), '</li><br /><li>', $input)).'</li><br /></ol>';
    } else {
      $output = '<ul><br /><li>'.trim(str_replace(array("\r\n"), '</li><br /><li>', $input)).'</li><br /></ul>';
    }
    $output = str_replace('<br />', "\r\n", $output);
  }
}

if (isset($_POST['clear'])) {
  $input = $output = '';
}


get_header(); ?> 
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
            <a href="<?php echo site_url('/list-to-array-converter/'); ?>" class="btn <?php echo ($pageslug == 'list-to-array-converter') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              List to Array
            </a>
            <a href="<?php echo site_url('/list-to-html-list-converter/'); ?>" class="btn <?php echo ($pageslug == 'list-to-html-list-converter') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              List to HTML List
            </a>
          </div>
          <div class="card cui1">
            <div class="card-body">
              <div class="card-title text-primary text-center mbi_5"><?php echo $endeTitle; ?></div>
              <div class="card-text text-center mb_30">
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
              </div>
              <?php echo $endeInvalid; ?>
              <form class="fui fui1" action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Input: List (One Item per line)</label>
                      <textarea required="required" rows="10" name="listitems" class="form-control" placeholder="<?php echo $endePlaceholder; ?>"><?php echo $input; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Select List Type: </label>
                      <select class="form-control" name="listtype">
                        <option value="unordered">Unorderd List</option>
                        <option value="ordered">Orders List</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Output: HTML <?php echo $listType; ?> list </label>
                      <textarea rows="10" class="form-control" placeholder="<?php echo $endePlaceholder2; ?>"><?php echo $output; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="cmbende-actions flex justify-content-between">
                  <button type="submit" class="btn btn-primary btn-sm btnui3s f20 text-uppercase"><?php echo $endeBtnLabel; ?></button>
                  <button type="submit" name="clear" class="btn btn-secondary btn-sm btnui3s f20 text-uppercase">Clear</button>
                </div>
              </form>
            </div>
			    </div>

        </div>
      </div>

    </div>
  </div>
</section>
<section id="whatisthetool" class="common-section-ui pb_40 pt_60 bg-light border-top f16">
    <div class="container">
      <h2 class="heading_style text-center type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Frequently </span> asked questions</h2>
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div id="accordion2" class="accordion accordion-ui2">
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll1" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll1"><span class="card-title f20 font_bold">
                Q.1 How to use List to HTML List Convertor?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll1" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>These are the steps to use this tool.</p>
                <p><strong>Step1:</strong> Add your list of items in the left list input box. Each items per line.</p>
                <p><strong>Step2:</strong> Select the type of list ordered or unordered list.</p>
                <p><strong>Step3:</strong> Click on the "Convert List To HTML List" button given below the list input field.</p>
                <p><strong>Step4:</strong> The HTML List will be generated in the right output box.</p>
              </div>	
            </div>	
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll2" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll2"><span class="card-title f20 font_bold">
                Q.2 Why should be use List to HTML List Convertor?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll2" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>It can be use to convert bulk amount on list items HTML ordered or unordered list.</p>
                <p>Specially, Web Designer or Developer can use it for generating a HTML list.</p>
              </div>	
            </div>	
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll3" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll3"><span class="card-title f20 font_bold">
                Q.3 How does it work?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll3" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>It will add the HTML tags based on your input data and type section to generate a HTML list.</p>
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
  <div class="onlinetools form-row">
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
<?php get_footer();  