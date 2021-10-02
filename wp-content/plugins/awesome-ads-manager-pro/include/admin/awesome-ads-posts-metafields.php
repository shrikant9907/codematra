                <div class="aam_meta_box_wr">
                    <div class="aam_row">
                        <p><b>Select Ads Option</b></p>
                        <ul class='ads_select_option'>
                            <li><input type='radio' <?php checked('aam_ads_random_option', $aam_select_ads_option); ?> value='aam_ads_random_option' name='aam_select_ads_option' class="aam_select_ads_option" id='aam_ads_random_option' /><label for='aam_ads_random_option'>Random Ads From List</label></li>
                            <li><input type='radio' <?php checked('aam_ads_html_option', $aam_select_ads_option); ?> value='aam_ads_html_option' name='aam_select_ads_option' class="aam_select_ads_option" id='aam_ads_html_option' /><label for='aam_ads_html_option'>Ad with HTML/Script</label></li>
                            <li><input type='radio' <?php checked('aam_ads_list_option', $aam_select_ads_option); ?> value='aam_ads_list_option' name='aam_select_ads_option' class="aam_select_ads_option" id='aam_ads_list_option' /><label for='aam_ads_list_option'>Select Ad From List</label></li>
                        </ul> 
                    </div>
                    
                    <div class="aam_row aam_ads_html_field">
                        <label for='aam_post_html_before'>HTML/Script Ad Content Before</label>
                        <textarea name="aam_post_html_before" id="aam_post_html_before"><?php echo $aam_post_html_before; ?></textarea>
                        <label for='aam_post_html_after'>HTML/Script Ad Content Before</label>
                        <textarea name="aam_post_html_after" id="aam_post_html_after"><?php echo $aam_post_html_after; ?></textarea> 
                    </div>
                    
                    <div class="aam_row aam_select_ad_field">
                        <?php 
                            $args = array(
                                            'post_type'=> $this->post_type_slug, 
                                            'posts_per_page'=> -1,
                                            'meta_key' => 'aam_ad_position_radio',
                                            'meta_value' => 'aam_ad_content_before_after',
                                            'order' => 'desc',
                                            'orderby' => 'date'
                                        );
                            $aam_ads_list = get_posts($args); 
                        if($aam_ads_list) { 
                        ?>
                        <label for='aam_select_ad_before'>Select Ad Content Before</label>
                        <select name="aam_select_ad_before" id="aam_select_ad_before">
                            <?php foreach($aam_ads_list as $ad) { ?> 
                                <option <?php selected( $aam_select_ad_before ,$ad->ID); ?> value="<?php echo $ad->ID; ?>"><?php echo $ad->post_title; ?></option>
                            <?php } ?>
                        </select>
                        <label for='aam_select_ad_after'>Select Ad Content After</label>
                        <select name="aam_select_ad_after" id="aam_select_ad_after">
                            <?php foreach($aam_ads_list as $ad) { ?> 
                                <option <?php selected( $aam_select_ad_after ,$ad->ID); ?> value="<?php echo $ad->ID; ?>"><?php echo $ad->post_title; ?></option>
                            <?php } ?>
                        </select>
                        <?php } else { ?>
                        <p>No Ads Found. <a href="<?php echo admin_url('post-new.php?post_type=aam_create_ad'); ?>" target="_blank">Click here</a> to create ad.</p>
                        <?php } ?>
                    </div>
                      
                </div>