<?php 
ob_start(); 
if(!isset($_GET['xml'])):
  $outputarray = array();
  $toolTitle = 'Excel (.xls) to XML Convertor Online';
  $excelBtnLabel = "Convert To XML";
  $errorMessage = $toolDesc = '';

  if (isset($_POST['clear'])) {
    $outputarray = array();
    $errorMessage = $outputjson = '';
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
              <form class="fui fui1" action="<?php echo site_url('/excel-to-xml-convertor/?xml=1'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="text_bold mb_5" for="">Upload Excel File (.xls)</label>
                      <input type="file" class="form-control-file form-control" name="excelfile" id="excelfile" />
                    </div>
                  </div>
                 </div>
                <div class="cmbende-actions flex justify-content-between">
                  <button type="submit" name="uploadexcel" class="btn btn-primary btn-sm btnui1s f20 text-uppercase"><?php echo $excelBtnLabel; ?></button>
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

<?php 
else:
  $current_ip = istl_get_my_ip(); 
  $current_ip_str = str_replace('.', '_', $current_ip); 
  if(isset($_POST['uploadexcel'])) {
    $files = $_FILES['excelfile'];           
    $fileoutput = istl_upload_file_php($files);   
    if($fileoutput['error']==0) { 
      update_option($current_ip_str.'_xls3', $fileoutput);
    }
  }
  $filedata = get_option($current_ip_str.'_xls3');   
  delete_option( $current_ip_str.'_xls3' ); 
  if($filedata) {  
    header("Content-type: text/xml; charset=utf-8");    
    if($filedata['error']==0) {
      $attachment_id = $filedata['attachment_id'];
      $outputarray = istl_xls_reader($filedata['file_path']);  
      if($outputarray) { 
        $countnum = 1; 
        $arraykeys = $outputarray[1];
        $d = '';
        foreach($outputarray as $out_key => $out_val) {
          if($countnum!=1) {
            $d .='<info>';                             
              foreach($out_val as $out_k => $out_v) { 
                if ($out_k == '' || is_int($out_k)) {
                  $d .='<int'.strtolower(str_replace(' ', '', $arraykeys[$out_k])).'>'.htmlspecialchars($out_v).'</int'.strtolower(str_replace(' ', '', $arraykeys[$out_k])).'>';      
                } else {
                  $d .='<'.strtolower(str_replace(' ', '', $arraykeys[$out_k])).'>'.htmlspecialchars($out_v).'</'.strtolower(str_replace(' ', '', $arraykeys[$out_k])).'>';      
                }
              }                             
            $d .='</info>';  
          }    
          $countnum = $countnum + 1;
        }
        echo trim($d);  
      }
      unlink($filedata['file_path']);   
    }
  }
endif; 

  $output = trim(ob_get_clean()); 
  if(isset($_GET['xml'])) { 
    $output =  trim(str_replace('$','&amp;','<?xml version = "1.0" standalone="yes"?><exceldata>'.$output.'</exceldata>'));
  }
echo $output;  