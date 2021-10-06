<?php
$input = $output  = $endeInvalid = '';
$listType = 'unordered';
$endeTitle        = 'Online List to HTML List Converter';
$endeBtnLabel     = 'Convert List to HTML List';
$endePlaceholder  = 'Item 1 
Item 2
Item 3
';
$endePlaceholder2 = 'HTML list output goes here.';
$endeDesc         = 'List to HTML list Converter is an online tool to convert list of items to HTML ordered or unordered list.';

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
    <div class="col-12 col-md-8 text-center mx-auto">
        <?php 
        if(have_posts()): while(have_posts()): the_post(); 
          the_content(); 
        endwhile; endif; 
        ?>
      </div>
      <div class="col-12"> 
        <div class="cm-base64-ende">
          <div class="card cui1">
            <div class="card-body">
              <div class="card-title text-primary text-center mbi_5"><?php echo $endeTitle; ?></div>
              <div class="card-text text-center mb_30">
                <?php echo $endeDesc; ?>
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
      
<?php get_footer();  