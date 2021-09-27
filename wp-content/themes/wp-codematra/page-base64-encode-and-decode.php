<?php
$input = $output  = $endeInvalid = '';
$activeTool       = 'encode';
$endeTitle        = 'Online Base64 Encoder';
$endeBtnLabel     = 'Encode';
$endePlaceholder  = 'Type or Paste string here to encode..';
$endePlaceholder2 = 'Base64 encoded output will display here...';
$endeDesc         = 'Base64 encoder is an online free tool to convert a string to base64 encoded code.';

if (isset($_GET['tool'])) {
  $activeTool = trim($_GET['tool']);
}

if (isset($_POST['endeinput'])) {
  if ($_POST['endeinput']=='') {
    $endeInvalid = "<p class='alert alert-danger'>Input box should not be empty</p>";
  } else {
    $input = stripslashes(trim($_POST['endeinput']));
  }
}

if ($activeTool == 'encode') {
  $output = base64_encode($input);
} else if ($activeTool == 'decode') {
  $endeTitle        = 'Online Base64 Decoder';
  $endeBtnLabel     = 'Decode';
  $endePlaceholder  = 'Type or Paste base64 encoded code here...';
  $endePlaceholder2 = 'Base64 decoded output will display here...';
  $endeDesc         = 'Base64 decoder is an online free tool to convert base64 encoded code to a string or array etc.';
  $output = base64_decode($input, true);
  if (!$output) {
    $endeInvalid = "<p class='alert alert-danger'>Not a valid base64 code.</p>";
  }
}

get_header(); ?> 
 
<section class="page-section bg-light">
  <h1 class="text-center bg-primary mb_30 text-white ptb_40 f30 lh32">
    <?php the_title(); ?>
  </h1>
  <div class="container">
    <div class="row">

      <div class="col-12">
        <?php 
        if(have_posts()): while(have_posts()): the_post(); 
          the_content(); 
        endwhile; endif; 
        ?>
      </div>

      <div class="col-12"> 
        <div class="cm-base64-ende">

          <div class="tabs flex center_center mb_30">
            <a href="<?php echo site_url('/base64-encode-and-decode'); ?>" class="btn <?php echo ($activeTool == 'encode' || $activeTool == '') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Base64 Encoder
            </a>
            <a href="<?php echo site_url('/base64-encode-and-decode?tool=decode'); ?>" class="btn <?php echo ($activeTool == 'decode' || $activeTool == '') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Base64 Decoder
            </a>
          </div>

          <div class="card cui2 py_20 px_20">
            <div class="card-body">
              <div class="card-title text-primary text-center mbi_5"><?php echo $endeTitle; ?></div>
              <div class="card-text text-center">
                <?php echo $endeDesc; ?>
              </div>
              <?php echo $endeInvalid; ?>
              <form class="fui fui1" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="text_bold mb_5" for="">Input</label>
                  <textarea required="required" rows="10" name="endeinput" class="form-control" placeholder="<?php echo $endePlaceholder; ?>"><?php echo $input; ?></textarea>
                </div>
                <div class="cmbende-actions">
                  <button type="submit" class="btn btn-primary btn-sm btnui1s f20 text-uppercase"><?php echo $endeBtnLabel; ?></button>
                </div>
              </form>
              <hr />
              <form class="fui fui1" action="" method="post" enctype="multipart/form-data">
                <label class="text_bold mb_5" for="">Output</label>
                <textarea rows="10" name="endeinput" class="form-control" placeholder="<?php echo $endePlaceholder2; ?>"><?php echo $output; ?></textarea>
              </form>
            </div>
			    </div>

        </div>
      </div>

    </div>
  </div>
</section>
      
<?php get_footer();  