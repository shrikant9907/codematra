                <div class="aam_meta_box_wr aam-custom-ads-options">
                    <div class="aam_row">
                        <label for=''>Shortcode</label><br />
                        <p><code>[aam_display_ad ad_id="<?php echo $post_id; ?>"]</code></p>
                    </div>
                    
                    <div class="aam_row">
                        <p><b>Ad Type</b></p>
                        <ul class='aam_ad_type'>
                            <li><input type='radio' class="aam_ad_type_radio" <?php checked($aam_ad_type,'aam_custom_ad'); ?> value='aam_custom_ad' name='aam_ad_type' id='aam_custom_ad' /><label for='aam_custom_ad'>Create Custom Ad</label></li>
                            <li><input type='radio' class="aam_ad_type_radio" <?php checked($aam_ad_type,'aam_html_script_ad'); ?> value='aam_html_script_ad' name='aam_ad_type' id='aam_html_script_ad' /><label for='aam_html_script_ad'>Add HTML/Script Ad</label></li>
                        </ul> 
                    </div>
                    
                    <div class="aam_row">
                        <p><b>Ad Position</b></p>
                        <ul class='aam_ad_position'>
                            <li><input type='radio' class="aam_ad_position_radio" <?php checked($aam_ad_position_radio,'aam_ad_page_top_bottom'); ?> value='aam_ad_page_top_bottom' name='aam_ad_position_radio' id='aam_ad_page_top_bottom' /><label for='aam_ad_page_top'>Page Top/Bottom</label></li>
                            <li><input type='radio' class="aam_ad_position_radio" <?php checked($aam_ad_position_radio,'aam_ad_content_before_after'); ?> value='aam_ad_content_before_after' name='aam_ad_position_radio' id='aam_ad_content_before_after' /><label for='aam_ad_page_bottom'>Content Before/After</label></li>
                            <li><input type='radio' class="aam_ad_position_radio" <?php checked($aam_ad_position_radio,'aam_ad_sidebar_before'); ?> value='aam_ad_sidebar_before' name='aam_ad_position_radio' id='aam_ad_sidebar_before' /><label for='aam_ad_sidebar_before'>Sidebar Before</label></li>
                            <li><input type='radio' class="aam_ad_position_radio" <?php checked($aam_ad_position_radio,'aam_ad_sidebar_after'); ?> value='aam_ad_sidebar_after' name='aam_ad_position_radio' id='aam_ad_sidebar_after' /><label for='aam_ad_sidebar_after'>Sidebar After</label></li>
                        </ul> 
                    </div>
                    
                    <div class="aam_row aam_custom_ad_fields">
                        <label for='aam_ads_image'>Banner Image</label><br />
                        <?php if($aam_ad_banner_url!='') { ?>
                            <div class="aam_banner_image"><img src="<?php echo $aam_ad_banner_url; ?>" alt=""></div>
                            <a class="button button-primary" href="#" post_id="<?php echo $post_id; ?>" id="set_banner_image">Update Banner Image</a>
                        <?php } else { ?>
                            <a class="button button-primary" href="#" post_id="<?php echo $post_id; ?>" id="set_banner_image">Set Banner Image</a>
                        <?php } ?>
                        <input class="aam_disabled"  type="text" placeholder="Set Banner Image Or add URL."  name="aam_ad_banner_url" id="aam_ad_banner_url" value="<?php echo $aam_ad_banner_url; ?>" />
                    </div>

                    <div class="aam_row aam_custom_ad_fields">
                        <label for='aam_ad_external_url'>External URL</label><br />
                        <input placeholder="http://www.example.com/?trackcode=xyz123" type="text" name="aam_ad_external_url" id="aam_ad_external_url" value="<?php echo $aam_ad_external_url; ?>" />
                        <p class="description">Add the affiliate or a URL with tracking code to get commission.</p>
                    </div>
                    <?php if(($aam_ad_banner_url!='') && ($aam_ad_external_url!='')) { ?> 

                    <div class="aam_row aam_custom_ad_fields">
                        <label for=''>Generated HTML</label><br />
                        <textarea name="aam_generate_html_code"><a target="_blank" href="<?php echo $aam_ad_external_url; ?>"><img src="<?php echo $aam_ad_banner_url; ?>" alt="" /></a></textarea>
                        <p class="description">Copy and paste this generate html code in other websites.</p>
                    </div>
                    
                    <div class="aam_row aam_custom_ad_fields">
                        <label for=''>Ad Preview</label><br />
                        <div class="aam_preview_ads">
                            <a target="_blank" href="<?php echo $aam_ad_external_url; ?>"><img src="<?php echo $aam_ad_banner_url; ?>" alt="" /></a>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="aam_row aam_html_script_ad_fields">
                        <label for='aam_custom_ad_html_script'>HTML/Script for ad</label>
                        <textarea name="aam_custom_ad_html_script" id="aam_custom_ad_html_script"><?php echo $aam_custom_ad_html_script; ?></textarea>
                        <p class="description">Paste HTML or Script in this field.</p>
                         <?php if($aam_custom_ad_html_script!='') {
                            ?>
                            <div class="aam_preview_ads">
                                <?php echo $aam_custom_ad_html_script; ?>
                            </div>
                            <?php
                        } ?>
                    </div>
                    
                   
                   
                </div>