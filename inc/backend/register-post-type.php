<?php
//post type registration
defined('ABSPATH') or die("No script kiddies please!");
$labels = array(
    'name' => _x('CW Teams Showcase', 'post type general name', CWTS_TEXT_DOMAIN),
    'singular_name' => _x('CW Teams Showcase', 'post type singular name', CWTS_TEXT_DOMAIN),
    'menu_name' => _x('CW Teams Showcase', 'admin menu', CWTS_TEXT_DOMAIN),
    'name_admin_bar' => _x('CW Teams Showcase', 'add new on admin bar', CWTS_TEXT_DOMAIN),
    'add_new' => _x('Add New Member', 'Total Team', CWTS_TEXT_DOMAIN),
    'add_new_item' => __('Add New Member', CWTS_TEXT_DOMAIN),
    'new_item' => __('New Member', CWTS_TEXT_DOMAIN),
    'edit_item' => __('Edit Member', CWTS_TEXT_DOMAIN),
    'view_item' => __('View Member', CWTS_TEXT_DOMAIN),
    'all_items' => __('Team Members', CWTS_TEXT_DOMAIN),
    'search_items' => __('Search Team Member', CWTS_TEXT_DOMAIN),
    'parent_item_colon' => __('Parent The Team:', CWTS_TEXT_DOMAIN),
    'not_found' => __('No Team Member found.', CWTS_TEXT_DOMAIN),
    'not_found_in_trash' => __('No Team Member found in Trash.', CWTS_TEXT_DOMAIN)
);

$args = array(
    'labels' => $labels,
    'description' => __('Description.', CWTS_TEXT_DOMAIN),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-admin-users',
    'query_var' => true,
    'rewrite' => array('slug' => 'teams'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'thumbnail',)
);

