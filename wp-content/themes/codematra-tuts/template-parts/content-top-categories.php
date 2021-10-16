<div class="card cui2 sidebar-listing r_0 mb_20">
  <h3 class="card-header rounded-0 py_15 px_15 border-bottom text-uppercase  text-primary f16 mb_0 font_bold">
    Technology to Learn...
  </h3>
  <div class="cbody p-0">
    <div class="ourtutorials row no-gutters">
      <?php $fcats = getfeaturedCategoriesCm(); 
      if ($fcats): 
        foreach($fcats as $fcat) {
          if ($fcat['show']) {
          ?>  
          <div class="col-12">
            <div class="card cui1 r_0 noshadow relative mbi_0">
              <a class="tdn overlay_w op0 absolute" href="<?php echo site_url($fcat['link']); ?>"></a>
              <div class="pb_10 pt_5 px_15 relative d-flex align-items-center">
                <div class="ciconrc ciconb mri_10">
                  <i class="<?php echo $fcat['icon']; ?> f18 text-secondary"></i>
                </div>
                <div class="">
                  <h3 class="card-title mbi_5"><a  class="text-primary f16 lh16" href="<?php echo site_url($fcat['link']); ?>"><?php echo $fcat['name']; ?></a></h3>
                  <p class="card-text lh20"><?php echo $fcat['desc']; ?></p>
                </div>
              </div>
            </div>
          </div> 
          <?php } ?>
        <?php } ?>
      <?php endif; ?>
    </div>
  </div>
</div>  