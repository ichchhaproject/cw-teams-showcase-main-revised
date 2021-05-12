<?php
if (isset($_POST['cwts_meta_fields'])) {
    $cwts_basic_field_list = (array) $_POST['cwts_meta_fields'];
    $cwts_basic_field_temp = array();
    if (!emptY($cwts_basic_field_list)) {
        foreach ($cwts_basic_field_list as $key => $val) {
            if (is_array($val)) {
                $cwts_basic_field_temp[$key] = array();
                foreach ($val as $k => $v) {
                    if (!is_array($v)) {
                        $cwts_basic_field_temp[$key][$k] = sanitize_text_field($v);
                    } else {
                        $cwts_basic_field_temp[$key][$k] = array_map('sanitize_text_field', $v);
                    }
                }
            } else {
                $cwts_basic_field_temp[$key] = sanitize_text_field($val);
            }
        }
    }
    $cwts_basic_field_temp_array = $cwts_basic_field_temp;
    update_post_meta($post_id, 'cwts_meta_fields', $cwts_basic_field_temp_array);
}