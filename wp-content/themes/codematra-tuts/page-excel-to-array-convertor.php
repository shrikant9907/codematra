<?php 
$outpuarray = array();
$toolTitle = 'Excel (.xls) to Array Converter Online';
$arrayOutputplaceholder = "Array output goes here.";
$excelBtnLabel = "Convert To Array";
$endeDesc = $errorMessage = '' ;

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
<section class="page-section bg-light">
  <h1 class="text-center bg-primary mb_30 text-white ptb_40 f30 lh32">
    <?php echo $toolTitle; ?>
  </h1>
  <div class="container">
    <div class="row">
      <div class="col-12"> 
        <div class="cm-base64-ende">
          <div class="card cui1">
            <div class="card-body">
              <div class="card-text text-center mb_30">
                <?php echo $toolDesc; ?>
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
<?php get_footer(); ?> 