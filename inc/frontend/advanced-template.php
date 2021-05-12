<?php

defined('ABSPATH') or die("No script kiddies please!");

$category_array = array();
$sort_by = (isset($attr['sort_by'])) ? $attr['sort_by'] : '';
$category_id = (isset($attr['category_id'])) ? $attr['category_id'] : '';
$filter_taxonomy = 'cwteamshowcase_taxonomy';
$myArray = explode(',', $category_id);
$filter_terms = get_terms($filter_taxonomy);
foreach ($myArray as $filter_key => $filter_val) {
    array_push($category_array, $filter_val);
}

$category_array_check = array_filter($category_array);
if (!empty($category_array_check)) {
    $category_array_value = array(
        array(
            'taxonomy' => 'cwteamshowcase_taxonomy',
            'field' => 'term_id',
            'terms' => $category_array
        ),
    );
} else {
    $category_array_value = '';
}

if (!empty($member_id)) {
    $member_array = explode(',', $member_id);
} else {
    $member_array = '';
}
$template_array = array('template-1', 'template-8', 'template-25');
$random_num = rand(111111111, 999999999);
$member_number = (isset($attr['member_number'])) ? $attr['member_number'] : '10';
$order = (isset($attr['order'])) ? $attr['order'] : 'DESC';
$orderby = (isset($attr['orderby'])) ? $attr['orderby'] : 'date';
$additional_detail_type = (isset($attr['additional_detail_type'])) ? $attr['additional_detail_type'] : 'popup';
?>
<div class="cwts-wrapper">
    <div class="cwts-content-outer-wrap container">
        <div class="cwts-layout-contents row team-row">             
            <?php
            $team_member_qry = new WP_Query(array(
                'post_type' => 'cwteamsshowcase',
                'post_status' => 'publish',
                'tax_query' => $category_array_value,
                'post__in' => $member_array,
                'posts_per_page' => $member_number,
                'order' => $order,
                'orderby' => $orderby
            ));

            $i = 1;
            if ($team_member_qry->have_posts()) {
                while ($team_member_qry->have_posts()) {
                    $team_member_qry->the_post();
                    $img_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail',false);
                    $cwts_meta_settings = get_post_meta(get_the_id(), 'cwts_meta_fields', true);
                    $count = $team_member_qry->post_count;
                    $team_title = get_the_title();
                    if ($i == 1) {
                        ?>
                        <div class="grid-row-wrapper col-md-4 col-sm-6 team-wrap">
                            <div class="grid-row-wrapper-inner clearfix">
                                <?php
                            }
                            ?>
                            <div class="cwts-inner-whole-wrapper">
                                <div class="user-wrap">
                                    <article class="material-card Red">
                                        <h2>
                                            <span><?php echo esc_attr($cwts_meta_settings['cw_team_member_name']);?></span>
                                            <strong>
                                                <i class="fa fa-fw fa-star"></i>
                                                <?php echo esc_attr($cwts_meta_settings['cw_team_member_designation']);?>
                                            </strong>
                                        </h2>
                                        <div class="mc-content">
                                            <div class="img-container">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <div class="content-wrapper" id="arrow-<?php echo esc_attr($i); ?>">  
                                                        <div class="cwts-advanced-image">
                                                           
                                                            <img src='<?php echo esc_url($img_thumbnail[0]); ?>' alt="<?php the_title(); ?>" />
                                                            
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <?php
                                                endif;
                                                
                                                
                                                ?>
                                            </div>
                                            <div class="mc-description">
                                               <?php echo esc_attr($cwts_meta_settings['cw_team_member_description']);?>
                                           </div>
                                       </div>
                                       <a class="mc-btn-action">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <div class="mc-footer">
                                        <h4>
                                            Social
                                        </h4>
                                        <a href="<?php echo esc_attr($cwts_meta_settings['cw_team_member_fb_link']);?>" class="fa fa-fw fa-facebook"></a>
                                        <a href="<?php echo esc_attr($cwts_meta_settings['cw_team_member_twitter_link']);?>" class="fa fa-fw fa-twitter"></a>
                                        <a href="<?php echo esc_attr($cwts_meta_settings['cw_team_member_google_link']);?>"class="fa fa-fw fa-google-plus"></a>
                                    </div>
                                </article>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <?php
                
            }
            wp_reset_postdata();
        }
        ?>
        