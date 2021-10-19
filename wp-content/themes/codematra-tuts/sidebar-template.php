<?php
global $post;
$postid = $post->ID;
$templateName = get_post_meta($postid, 'template_name', true);
$templateLicense = get_post_meta($postid, 'template_license', true);
$templateVersion = get_post_meta($postid, 'template_version', true);
$bootstrapVersion = get_post_meta($postid, 'bs_version', true);
$templateRelease = get_post_meta($postid, 'template_release_date', true);
$templateUpdated = get_post_meta($postid, 'template_last_updated', true);
$templateDownloads = get_post_meta($postid, 'template_download_count', true);
?>

<a data-id="<?php echo $postid; ?>" data-downloads="<?php echo $templateDownloads; ?>" data-template="<?php echo $templateName; ?>" class="trackdownloads f16 btn btn-secondary hs_11 w-100 btnui3s mb_30" href="https://github.com/shrikant9907/cm-blog-template-code-matra/archive/refs/heads/main.zip" download rel="noopener">
  <i class="fas fa-download mr_10"></i>Free Download 
</a>

<!-- About Template -->
<div class="card cui2 noshadow cteam py_0 px_0 mb_20 f14 r_0 border">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">Template Details</h3>
  <div class="cbody p-0">
    <ul class="listing type2">
      <li class="list-item d-flex justify-content-between">
        <span>Template Name</span><span><?php echo $templateName; ?></span>
      </li>
      <li class="list-item d-flex justify-content-between">
        <span>License</span><span><a target="_blank" href="<?php echo $templateLicense; ?>">MIT License</a></span>
      </li>
      <li class="list-item d-flex justify-content-between">
        <span>Version</span><span><?php echo $templateVersion; ?></span>
      </li>
      <li class="list-item d-flex justify-content-between">
        <span>Bootstrap Version</span><span><?php echo $bootstrapVersion; ?></span>
      </li>
      <li class="list-item d-flex justify-content-between">
        <span>Released</span><span><?php echo $templateRelease; ?></span>
      </li>
      <li class="list-item d-flex justify-content-between">
        <span>Last Update</span><span><?php echo $templateUpdated; ?></span>
      </li>
      <li class="list-item d-flex justify-content-between">
        <span>Downloads</span><span class="downloadcounts"><?php echo $templateDownloads; ?></span>
      </li>
      
    </ul>
  </div>
</div>