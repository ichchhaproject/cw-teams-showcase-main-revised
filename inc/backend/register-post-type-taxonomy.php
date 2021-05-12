<?php
//post type's taxonomy registration
defined('ABSPATH') or die("No script kiddies please!");
$labels = array(
    'name' => _x('CW Teams Showcase Categories', 'taxonomy general name'),
    'singular_name' => _x('CW Teams Showcase Category', 'taxonomy singular name'),
    'search_items' => __('Search CW Teams Showcase Category'),
    'all_items' => __('All CW Teams Showcase Category'),
    'parent_item' => __('Parent CW Teams Showcase Category'),
    'parent_item_colon' => __('Parent CW Teams Showcase Category:'),
    'edit_item' => __('Edit CW Teams Showcase Category'),
    'update_item' => __('Update CW Teams Showcase Category'),
    'add_new_item' => __('Add New CW Teams Showcase Category'),
    'new_item_name' => __('New CW Teams Showcase Category Name'),
    'menu_name' => __('CW Teams Showcase Category'),
);

$args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => CWTS_TEXT_DOMAIN),
);
