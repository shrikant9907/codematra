<?php
ob_start(); 
if(!isset($_GET['xml_output'])) { 
get_header('tools'); ?>
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
    <h2>Excel To XML Converter</h2> 
    
    <div class="excel_upload_form_wr">
        

        
        <form action="<?php echo site_url('/excel-to-xml/?xml_output=1'); ?>" method="post" enctype="multipart/form-data">  

        <div class="form-group">
            <label for="excel_file_field">Upload Excel File(.xls)</label>
            <input type="file" class="form-control-file" name="excel_file_field" id="excel_file_field">
        </div>
        
            <p><button type="submit" name="excel_upload_form_submit" class="btn btn-primary">Get XML</button></p>
        </form>

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
<?php get_footer('tools');  } else { ?> 
        <?php 
        
        $current_ip = istl_get_my_ip(); 
        $current_ip_str = str_replace('.', '_', $current_ip); 
        if(isset($_POST['excel_upload_form_submit'])) {
            $files = $_FILES['excel_file_field'];           
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
                $outpuarray = istl_xls_reader($filedata['file_path']);  
                if($outpuarray) { 
                    $countnum = 1; 
                    $arraykeys = $outpuarray[1];
                    foreach($outpuarray as $out_key => $out_val) {
                        if($countnum!=1) {
                            $d .='<info>';                             
                                foreach($out_val as $out_k => $out_v) { 
                                    $d .='<'.strtolower($arraykeys[$out_k]).'>'.htmlspecialchars($out_v).'</'.strtolower($arraykeys[$out_k]).'>';      
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
 
}
$output = trim(ob_get_clean()); 
if(isset($_GET['xml_output'])) { 
    $output =  trim(str_replace('$','&amp;','<?xml version = "1.0" standalone="yes"?><exceldata>'.$output.'</exceldata>'));
}
echo $output;  