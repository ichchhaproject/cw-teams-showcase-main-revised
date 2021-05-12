<?php
defined('ABSPATH') or die("No direct script allowed!!!");
$post_id = intval($post->ID);
$cwts_meta_settings = get_post_meta($post_id, 'cwts_meta_fields', true);
$cwts_meta_array = array();
?>
<div class="cwts-default-setting-tab-wrapper cwts-default-setting-field-wrapper clearfix" id='cwts-basic-layout-setting'>
    <div class="cwts-setting-tab-content" id="content-cwts-setting-general">
        <div class="cwts-default-setting-field-wrapper" id='cwts-basic-layout-setting'>
            <div class="cwts-setting-tab-content-inner" id="content-cwts-setting-general-input-type">
                <div class="cwts-input-field-wrap" id="cwts-background-field">
                    <label>
                        <?php echo __('Team Member Name', CWTS_TEXT_DOMAIN); ?>
                    </label>
                    <div class="cwts-input-field">
                        <input type="text" name="cwts_meta_fields[cw_team_member_name]" value="<?php
                        if (isset($cwts_meta_settings['cw_team_member_name']) && !empty($cwts_meta_settings['cw_team_member_name'])) {
                            echo esc_attr($cwts_meta_settings['cw_team_member_name']);
                        }
                        ?>"/>
                    </div>
                </div>
                <div class="cwts-input-field-wrap cwts-sortable-general-info-field">
                                        <label>
                                            <?php echo __('Designation', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="text" name="cwts_meta_fields[cw_team_member_designation]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_designation']) && !empty($cwts_meta_settings['cw_team_member_designation'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_designation']);
                                            }
                                            ?>"/>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="cwts-input-field-wrap cwts-sortable-general-info-field">
                                        <label>
                                            <?php echo __('Address', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="text" name="cwts_meta_fields[cw_team_member_address]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_address']) && !empty($cwts_meta_settings['cw_team_member_address'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_address']);
                                            }
                                            ?>"/>
                                        </div>
                                        
                                    </div>
                                    <div class="cwts-input-field-wrap cwts-sortable-general-info-field">
                                        <label>
                                            <?php echo __('Email Address', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="email" class="cwts-basic-color-call" name="cwts_meta_fields[cw_team_member_email]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_email']) && !empty($cwts_meta_settings['cw_team_member_email'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_email']);
                                            }
                                            ?>"/>
                                        </div>
                                        
                                    </div>
                                    <div class="cwts-input-field-wrap cwts-sortable-general-info-field">
                                        <label>
                                            <?php echo __('Short Description', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="text" class="cwts-basic-color-call" name="cwts_meta_fields[cw_team_member_description]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_description']) && !empty($cwts_meta_settings['cw_team_member_description'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_description']);
                                            }
                                            ?>"/>
                                        </div>
                                        
                                    </div>
                                    <div class="cwts-input-field-wrap cwts-sortable-general-info-field">
                                        <label>
                                            <?php echo __('Social Media Links', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <label>
                                            <?php echo __('Facebook Link', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="text" class="cwts-basic-color-call" name="cwts_meta_fields[cw_team_member_fb_link]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_fb_link']) && !empty($cwts_meta_settings['cw_team_member_fb_link'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_fb_link']);
                                            }
                                            ?>"/>
                                        </div>
                                        <label>
                                            <?php echo __('Twitter Link', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="text" class="cwts-basic-color-call" name="cwts_meta_fields[cw_team_member_twitter_link]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_twitter_link']) && !empty($cwts_meta_settings['cw_team_member_twitter_link'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_twitter_link']);
                                            }
                                            ?>"/>
                                        </div>
                                        <label>
                                            <?php echo __('Google Plus Link', CWTS_TEXT_DOMAIN); ?>
                                        </label>
                                        <div class="cwts-input-field">
                                            <input type="text" class="cwts-basic-color-call" name="cwts_meta_fields[cw_team_member_google_link]" value="<?php
                                            if (isset($cwts_meta_settings['cw_team_member_google_link']) && !empty($cwts_meta_settings['cw_team_member_google_link'])) {
                                                echo esc_attr($cwts_meta_settings['cw_team_member_google_link']);
                                            }
                                            ?>"/>
                                        </div>

                                        
                                    </div>
                
                                   
            </div>
            
        </div>
        
    </div>
</div>


</div> 