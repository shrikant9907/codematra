<?php get_header(); ?>
<div class="excel_upload_form_wr pt_100">
  <?php 
    $current_ip = istl_get_my_ip(); 
    $current_ip_str = str_replace('.', '_', $current_ip); 

    if(isset($_POST['uploadexcel'])) {
      $files = $_FILES['excelfile'];           
      $fileoutput = istl_upload_file_php($files);   
      if($fileoutput['error']==0) { 
        update_option($current_ip_str.'_xls', $fileoutput);
      ?>
        <div class="alert alert-success">Excel File Uploaded Successfully. </div>
      <?php } else { ?>
        <div class="alert alert-warning">
          <?php echo $fileoutput['error_message']['0'];  ?>
        </div>
      <?php }
    }
  ?> 
    
  <form action="" method="post" enctype="multipart/form-data">  
    <div class="form-group">
      <label for="excelfile">Upload Excel File(.xls)</label>
      <input type="file" class="form-control-file" name="excelfile" id="excelfile">
    </div>
    <p><button type="submit" name="uploadexcel" class="btn btn-primary">Get Array</button></p>
  </form>
  <?php 
    $filedata = get_option($current_ip_str.'_xls');
    if($filedata) {            
      if($filedata['error']==0) {
        $attachment_id = $filedata['attachment_id'];
        $outpuarray = istl_xls_reader($filedata['file_path']);               
        unlink($filedata['file_path']);  
        delete_option( $current_ip_str.'_xls' ); 
        echo '<h2>Result</h2>'; 
        echo '<pre class="xls_output_result">';
          print_r($outpuarray);    
        echo '</pre>';
      }                        
    }
  ?>
</div>
<?php get_footer(); ?> 