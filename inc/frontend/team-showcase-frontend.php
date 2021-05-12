<?php

defined('ABSPATH') or die("No script kiddies please!");

global $post;

//Defining Default Shortcode Attributes for frontend 
$layout_type = (isset($attr['layout'])) ? $attr['layout'] : 'grid-layout';     //Slider Control true by default
$cwts_pro_object = new CWTS_Class();
    
    if (isset($layout_type) && $layout_type == 'grid-layout') {
    include(CWTS_FILE_DIR . 'inc/frontend/grid-template.php');
} elseif(isset($layout_type) && $layout_type == 'advanced-layout') {
    include(CWTS_FILE_DIR . 'inc/frontend/advanced-template.php');
}

