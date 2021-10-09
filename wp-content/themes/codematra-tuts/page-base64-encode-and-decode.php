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
  if (!$output && $input) {
    $endeInvalid = "<p class='alert alert-danger'>Not a valid base64 code.</p>";
  }
}

get_header(); ?> 
<h1 class="text-center mb_0 text-secondary border-bottom border-top ptb_40 mont_serrat f30 lh32 text-uppercase">
  <?php the_title(); ?>
</h1>
<section class="common-section-ui page-breadcrumb border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0"><a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / <a class="tdn text-secondary" href="<?php echo site_url('/tools'); ?>" class="text-muted">Tools</a> / <?php the_title(); ?></p>
  </div>
</section> 
<section class="page-section common-section-ui pb_0">
  <div class="container">
    <div class="row">
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

          <div class="card cui2 r_0 py_20 px_20">
            <div class="card-body">
              <div class="card-title text-primary text-center mbi_5"><?php echo $endeTitle; ?></div>
              <div class="max_w_800 mx-auto text-center">
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
              <div class="form-row">
                <div class="col-12 col-md-6">
                  <form class="fui fui1" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Input</label>
                      <textarea required="required" rows="10" name="endeinput" class="form-control" placeholder="<?php echo $endePlaceholder; ?>"><?php echo $input; ?></textarea>
                    </div>
                    <div class="cmbende-actions">
                      <button type="submit" class="btn btn-primary btn-sm btnui3s f20 text-uppercase"><?php echo $endeBtnLabel; ?></button>
                    </div>
                  </form>
                </div>
                <div class="col-12 col-md-6">
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

    </div>
  </div>
</section>
<?php if ($activeTool == 'encode') { ?> 
  <section id="whatisthetool" class="common-section-ui pb_40 pt_60 bg-light border-top f16">
    <div class="container">
      <h2 class="heading_style text-center type2 text-uppercase mb_20 text-primary"><span class="text-secondary">Frequently </span> asked questions</h2>
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div id="accordion2" class="accordion accordion-ui2">
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll1" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll1"><span class="card-title f20 font_bold">
                Q.1 How to use Base64 Encoder?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll1" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>These are the steps to use this tool.</p>
                <p><strong>Step1:</strong> To use Base64 Encoder you have to add some data in the input textarea field.</p>
                <p><strong>Step2:</strong> Click on the Encode button given below the input textarea field.</p>
                <p><strong>Step3:</strong> The encoder will generate a base64 encoded code in the output textarea field.</p>
                <p>Now, You are ready to use that base64 encoded code.</p>
              </div>	
            </div>	
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll2" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll2"><span class="card-title f20 font_bold">
                Q.2 Why we use base64 encoder?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll2" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>We use base64 encoder when we want to transmit or store our binary data into a medium that does not support it. Then the base 64 encoder convert that binary data to ASCII format.</p>
              </div>	
            </div>	
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll3" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll3"><span class="card-title f20 font_bold">
                Q.3 What is Base64?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll3" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>According to Wikipedia, Base64 is a binary to a text encoding scheme that represents binary data in an ASCII string format.</p>
              </div>	
            </div>	
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll4" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll4"><span class="card-title f20 font_bold">
                Q.4 What is Base64 Encoder?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll4" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>Base64 encoder is a tool that converts the data to Base64 encode format.</p>
              </div>	
            </div>
            <div class="card">
              <h3 class="card-header" role="tab" id="heading3">
                <a href="#acccoll5" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="acccoll5"><span class="card-title f20 font_bold">
                Q.5 How to use Base64 Encoder?
                </span> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a>
              </h3>
              <div class="card-body collapse f16 lh24" id="acccoll5" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                <p>These are the steps to use this tool.</p>
                <p><strong>Step1:</strong> To use Base64 Encoder you have to add some data in the input textarea field.</p>
                <p><strong>Step2:</strong> Click on the Encode button given below the input textarea field.</p>
                <p><strong>Step3:</strong> The encoder will generate a base64 encoded code in the output textarea field.</p>
                <p>Now, You are ready to use that base64 encoded code.</p>
              </div>	
            </div>	
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
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