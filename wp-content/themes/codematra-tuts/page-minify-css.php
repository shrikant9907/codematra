<?php 
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
                      <label class="text_bold mb_5" for="">Input CSS</label>
                      <textarea required="required" rows="10" name="inputcss" class="form-control" placeholder="<?php echo $minifyinputplaceholder; ?>"><?php echo $input; ?></textarea>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <label class="text_bold mb_5" for="">Output: Minified CSS</label>
                    <textarea rows="10" class="form-control" placeholder="<?php echo $minifyinputplaceholder2; ?>"><?php echo $output; ?></textarea>
                  </div>
                </div>
                <div class="cmbende-actions flex justify-content-between">
                  <button type="submit" class="btn btn-primary btn-sm btnui3s f20 text-uppercase"><?php echo $minifyBtnLabel; ?></button>
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
<?php get_footer(); ?> 