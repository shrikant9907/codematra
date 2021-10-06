<?php 
global $post;
$pageslug = $post->post_name;
$outpuarray = array();
$toolTitle = 'Excel (.xls) to Array Converter Online';
$arrayOutputplaceholder = "Array output goes here.";
$excelBtnLabel = "Convert To Array";
$toolDesc = $errorMessage = '' ;

$current_ip = istl_get_my_ip(); 
$current_ip_str = str_replace('.', '_', $current_ip); 

if(isset($_POST['uploadexcel'])) {
  $files = $_FILES['excelfile'];           
  $fileoutput = istl_upload_file_php($files);   
  if($fileoutput['error'] == 0) { 
    update_option($current_ip_str.'_xls', $fileoutput);
  } else {
    $errorMessage = $fileoutput['error_message']['0'];  
  }
}
?>
<?php 
$filedata = get_option($current_ip_str.'_xls');
if($filedata) {            
  if($filedata['error'] == 0) {
    $attachment_id = $filedata['attachment_id'];
    $outpuarray = istl_xls_reader($filedata['file_path']);               
    unlink($filedata['file_path']);  
    delete_option( $current_ip_str.'_xls' ); 
  }                        
}
?> 
<?php 
if (isset($_POST['clear'])) {
  $outpuarray = array();
}
?> 
<?php get_header(); ?>
<h1 class="text-center mb_0 text-secondary border-bottom border-top ptb_40 mont_serrat f30 lh32">
  <?php echo $toolTitle; ?>
</h1>
<section class="common-section-ui page-breadcrumb border-bottom pti_10 pbi_10">
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
            <a href="<?php echo site_url('/excel-to-array-converter/'); ?>" class="btn <?php echo ($pageslug == 'excel-to-array-converter') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Excel To Array
            </a>
            <a href="<?php echo site_url('/excel-to-json-converter/'); ?>" class="btn <?php echo ($pageslug == 'excel-to-json-converter') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Excel To JSON
            </a>
            <a href="<?php echo site_url('/excel-to-xml-converter/'); ?>" class="btn <?php echo ($pageslug == 'excel-to-xml-converter') ? 'btn-primary' : 'btn-light'; ?> btnui1s">
              Excel To XML
            </a>
          </div>
          <div class="card cui1">
            <div class="card-body">
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
              <?php echo $errorMessage; ?>
              <form class="fui fui1" action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Upload Excel File (.xls)</label>
                      <input type="file" class="form-control-file form-control" name="excelfile" id="excelfile" />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Output: Array</label>
                      <textarea rows="10" class="form-control" placeholder="<?php echo $arrayOutputplaceholder; ?>"><?php print_r($outpuarray); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="cmbende-actions flex justify-content-between">
                  <button type="submit" name="uploadexcel" class="btn btn-primary btn-sm btnui3s f20 text-uppercase"><?php echo $excelBtnLabel; ?></button>
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
<?php get_footer(); ?> 