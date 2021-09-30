<?php
$input = $output  = $endeInvalid = '';
$activeTool       = 'listtoarray';
$endeTitle        = 'Online List to Array Convertor';
$endeBtnLabel     = 'Convert List to Array';
$endePlaceholder  = 'Item 1 
Item 2
Item 3
';
$endePlaceholder2 = 'Array output will display here.';
$endeDesc         = 'List to array convertor is an online tool to convert list of items to array.';

if (isset($_POST['listitems'])) {
  if ($_POST['listitems']=='') {
    $endeInvalid = "<p class='alert alert-danger'>Input box should not be empty</p>";
  } else {
    $input = stripslashes(trim($_POST['listitems']));
    $output = '$array = array("'.trim(str_replace(array("\r\n"), '", "', $input)).'");';
  }
}

if (isset($_POST['clear'])) {
  $input = $output = '';
}


get_header(); ?> 
 
<section class="page-section bg-light">
  <h1 class="text-center bg-primary mb_30 text-white ptb_40 f30 lh32">
    <?php the_title(); ?>
  </h1>
  <div class="container">
    <div class="row">
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
                      <label class="text_bold mb_5" for="">List (One Item per line)</label>
                      <textarea required="required" rows="10" name="listitems" class="form-control" placeholder="<?php echo $endePlaceholder; ?>"><?php echo $input; ?></textarea>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <label class="text_bold mb_5" for="">PHP Array</label>
                    <textarea rows="10" class="form-control" placeholder="<?php echo $endePlaceholder2; ?>"><?php echo $output; ?></textarea>
                  </div>
                </div>
                <div class="cmbende-actions flex justify-content-between">
                  <button type="submit" class="btn btn-primary btn-sm btnui1s f20 text-uppercase"><?php echo $endeBtnLabel; ?></button>
                  <button type="reset" name="clear" class="btn btn-secondary btn-sm btnui1s f20 text-uppercase">Clear</button>
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