<?php get_header('tools'); ?>
<section class="section-banner section-banner-pages">
    <div class="container text-center">
         <h2><?php the_title(); ?></h2>
    </div>
</section>
<div class='col-sm-2'>
    <br />
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <!-- Responsive -->
  <ins class="adsbygoogle"
       style="display:block"
       data-ad-client="ca-pub-7518025352548928"
       data-ad-slot="1948211032"
       data-ad-format="auto"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script> 
  <br />
</div>
<div class='col-sm-8'>   
    <h2>Excel To Array Converter</h2>
    
    <div class="excel_upload_form_wr">
        
        <?php 
        
        $current_ip = istl_get_my_ip(); 
        $current_ip_str = str_replace('.', '_', $current_ip); 
        
        
        if(isset($_POST['excel_upload_form_submit'])) {
        
            $files = $_FILES['excel_file_field'];           

            $fileoutput = istl_upload_file_php($files);   
            
            if($fileoutput['error']==0) { 

                update_option($current_ip_str.'_xls', $fileoutput);
            
                ?>
                <div class="alert alert-success">
                    Excel File Uploaded Successfully. 
                </div>
                <?php 
            
            } else {  
                ?>
                <div class="alert alert-warning">
                   <?php echo $fileoutput['error_message']['0'];  ?>
                </div>
                <?php 
            }
        }

        
        ?> 
        
        <form action="" method="post" enctype="multipart/form-data">  

        <div class="form-group">
            <label for="excel_file_field">Upload Excel File(.xls)</label>
            <input type="file" class="form-control-file" name="excel_file_field" id="excel_file_field">
        </div>
        
            <p><button type="submit" name="excel_upload_form_submit" class="btn btn-primary">Get Array</button></p>
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
    
</div>
 <div class='col-sm-2'>
    <br />
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <!-- Responsive -->
  <ins class="adsbygoogle"
       style="display:block"
       data-ad-client="ca-pub-7518025352548928"
       data-ad-slot="1948211032"
       data-ad-format="auto"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script> 
  <br />
</div>
<?php get_footer('tools'); ?> 