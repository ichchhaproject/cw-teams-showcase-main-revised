<?php defined('ABSPATH') or die("No script kiddies please!");
/**
 * Plugin Name: CW Teams Showcase
 * Plugin URI: http://localhost/team/
 * Description: A custom post type plugin that will let website admins add and showcase team members in the website
 * Version: 1.0.0
 * Author: Ichchha Lamichhane
 * Author URI: http://localhost/team/
 * Text Domain: cwts
 * Domain Path: /languages/
 * License: GPL2
 */
if (!defined('CWTS_VERSION')) {
    define('CWTS_VERSION', '1.0.0');
}
if (!defined('CWTS_CSS_DIR')) {
    define('CWTS_CSS_DIR', plugin_dir_url(__FILE__) . 'css/');
}
if (!defined('CWTS_JS_DIR')) {
    define('CWTS_JS_DIR', plugin_dir_url(__FILE__) . 'js/');
}
if (!defined('CWTS_FILE_DIR')) {
    define('CWTS_FILE_DIR', plugin_dir_path(__FILE__));
}
if (!defined('CWTS_TEXT_DOMAIN')) {
    define('CWTS_TEXT_DOMAIN', 'cwts');
}
include(CWTS_FILE_DIR . 'inc/backend/cwts-widget.php');
if (!class_exists('CWTS_Class')) {
    class CWTS_Class {
    	function __construct() {
    		add_action('init', array($this, 'plugin_text_domain')); //loads text domain for translation ready
            add_action( 'init', array($this, 'cwts_register_post_type' ) );
            add_action( 'init', array($this, 'cwts_register_post_type_taxonomy' ) );
            add_action('add_meta_boxes', array($this, 'cwts_add_metabox'));
            add_action('save_post', array($this, 'cwts_save_meta'));
            add_shortcode('cwteamsshowcase', array($this, 'cwts_shortcode'));
            add_action('wp_enqueue_scripts', array($this, 'cwts_enqueue_frontend_script'));
            add_action('widgets_init', array($this, 'cwts_register_widget'));
        }
        
        /**
         * Plugin Translation
         */
        function plugin_text_domain() {
            load_plugin_textdomain('cwts', false, basename(dirname(__FILE__)) . '/languages/');
        }
        function cwts_register_post_type(){
        	include( CWTS_FILE_DIR . 'inc/backend/register-post-type.php' );
            register_post_type('CW Teams Showcase', $args);
        }
        function cwts_register_post_type_taxonomy(){
        	include( CWTS_FILE_DIR . 'inc/backend/register-post-type-taxonomy.php' );
            register_taxonomy('cwteamshowcase_taxonomy', 'cwteamsshowcase', $args);
        }
        function cwts_add_metabox() {
            add_meta_box('cwts_meta_boxes', __('Team Members Data', CWTS_TEXT_DOMAIN), array($this, 'cwts_add_metabox_callback'), 'cwteamsshowcase', 'normal', 'default');
        }
        function cwts_register_widget() {
            register_widget('CWTS_Widget');
        }

        /*
         * General Setting Metabox callback
         */

        function cwts_add_metabox_callback($post) {
            wp_nonce_field(basename(__FILE__), 'cwts_settings_nonce');
            $cwts_stored_meta_setting = get_post_meta($post->ID);
            include(CWTS_FILE_DIR . 'inc/backend/cwts-general-field.php');
        }
        function cwts_save_meta($post_id) {
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['cwts_settings_nonce']) && wp_verify_nonce($_POST['cwts_settings_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            } else {
                include(CWTS_FILE_DIR . 'inc/backend/save-meta-fields.php');
            }
        }
        function cwts_shortcode($attr) {
            ob_start();
            include( CWTS_FILE_DIR . 'inc/frontend/team-showcase-frontend.php' );
            $html = ob_get_contents();
            ob_get_clean();
            return $html;
        }
        function cwts_enqueue_frontend_script() {
            wp_enqueue_script('cwts-frontend-script', CWTS_JS_DIR . 'frontend.js', array('jquery', 'jquery-ui-slider'), CWTS_VERSION, false);
            wp_enqueue_style('cwts-fontawesome', CWTS_CSS_DIR . 'font-awesome.min.css', array(), CWTS_VERSION);
            wp_enqueue_style('cwts-frontend-css', CWTS_CSS_DIR . 'frontend.css', CWTS_VERSION);
            wp_enqueue_style('cwts-bootstrap-css', CWTS_CSS_DIR . 'bootstrap.css', CWTS_VERSION);
            

        }

    }
    $cwts_object = new CWTS_Class(); //initialization of plugin
}