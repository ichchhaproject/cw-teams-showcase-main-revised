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
                                <div class="cwts-grid-thumb-wrapper">
                                    <div class="cwts-primary-content">  
                                        <div class="containers">

                                          <div class="team-rows">

                                            <div class="team-wraps">
                                              <div class="team-member text-center">
                                                <div class="team-img">
                                                  <?php if (has_post_thumbnail()): ?>
                                                    <div class="content-wrapper" id="arrow-<?php echo esc_attr($i); ?>">  
                                                        <div class="cwts-grid-image">

                                                            <img src='<?php echo esc_url($img_thumbnail[0]); ?>' alt="<?php the_title(); ?>" />



                                                        </div>
                                                    </div>
                                                    <?php
                                                endif;


                                                ?>
                                                <div class="overlay">
                                                    <div class="team-details text-center">
                                                      <p>
                                                         <?php echo esc_attr($cwts_meta_settings['cw_team_member_description']);?>
                                                     </p>
                                                     <div class="socials mt-20">
                                                        <a href="<?php echo esc_attr($cwts_meta_settings['cw_team_member_fb_link']);?>"><i class="fa fa-facebook"></i></a>
                                                        <a href="<?php echo esc_attr($cwts_meta_settings['cw_team_member_twitter_link']);?>"><i class="fa fa-twitter"></i></a>
                                                        <a href="<?php echo esc_attr($cwts_meta_settings['cw_team_member_google_link']);?>"><i class="fa fa-google-plus"></i></a>
                                                        <a href="mailto:<?php echo esc_attr($cwts_meta_settings['cw_team_member_email']);?>"><i class="fa fa-envelope"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="team-title"><?php echo esc_attr($cwts_meta_settings['cw_team_member_name']);?></h6>
                                        <span><?php echo esc_attr($cwts_meta_settings['cw_team_member_designation']);?></span>
                                    </div>
                                </div>


                            </div>
                        </div> 

                    </div>


                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php

                }
                wp_reset_postdata();
            }
            ?>
