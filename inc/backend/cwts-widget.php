<?php
defined('ABSPATH') or die("No script kiddies please!");

/**
 * CWTS Widget
 */
class CWTS_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'cwts_widget', // Base ID
                __('CWTS Widget', CWTS_TEXT_DOMAIN), // Name OF widget
                array('description' => __('CWTS Widget', CWTS_TEXT_DOMAIN)) // Args For Widget
        );
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $cwts_pro_object = new CWTS_Class();
        ?>
        <div class="cwts-widget-wrap">
            <div class="cwts-widget-input-field-wrap" id="cwts-widget-setting-field">
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', CWTS_TEXT_DOMAIN); ?></label>
                <div class="cwts-widget-input-field">
                    <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo isset($instance['title']) ? $instance['title'] : ''; ?>">        
                </div>
            </div>
            <div class="cwts-widget-input-field-wrap">
                <label for="<?php echo $this->get_field_id('cwts_layout_type'); ?>">
                    <?php echo __('Layout Type', CWTS_TEXT_DOMAIN); ?>
                </label>
                <div class="cwts-widget-input-field">
                    <select id="<?php echo $this->get_field_id('layout_type'); ?>" name="<?php echo $this->get_field_name('layout_type'); ?>" class="cwts-widget-layout-type-dropdown">
                        <option value="grid-layout" <?php echo isset($instance['layout_type']) && $instance['layout_type'] == 'grid-layout' ? 'selected="selected"' : ''; ?>>
                            <?php _e('Grid Layout', CWTS_TEXT_DOMAIN); ?></option>
                        <option value="advanced-layout" <?php echo isset($instance['layout_type']) && $instance['layout_type'] == 'advanced-layout' ? 'selected="selected"' : ''; ?>>
                            <?php _e('Advanced Layout', CWTS_TEXT_DOMAIN); ?></option>
                        
                    </select>
                </div>
            </div>

            <div class="cwts-widget-input-field-wrap">
                <label>
                    <?php echo __('Team Member to Show', CWTS_TEXT_DOMAIN); ?>
                </label>
                <div class="cwts-widget-input-field">
                    <input type="number" id="<?php echo $this->get_field_id('element_number_to_show'); ?>" name="<?php echo $this->get_field_name('element_number_to_show'); ?>" value="<?php echo isset($instance['element_number_to_show']) ? $instance['element_number_to_show'] : '99'; ?>"/>
                </div>
            </div>
            
            
           
            
            

        </div>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? sanitize_text_field($new_instance['title']) : '';
        $instance['layout_type'] = (!empty($new_instance['layout_type']) ) ? sanitize_text_field($new_instance['layout_type']) : '';
        $instance['element_number_to_show'] = (!empty($new_instance['element_number_to_show']) ) ? sanitize_text_field($new_instance['element_number_to_show']) : '';
        return $instance;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        $member_check = (!empty($instance['cwts_add_member_check']) ) ? $instance['cwts_add_member_check'] : array();

        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        if ($instance['layout_type'] == 'grid-layout') {
                echo do_shortcode("[cwteamsshowcase layout='" . $instance['layout_type'] . "' member_number='" . $instance['element_number_to_show'] . "']");
            
        } else if ($instance['layout_type'] == 'advanced-layout') {
                echo do_shortcode("[cwteamsshowcase layout='" . $instance['layout_type'] . "' member_number='" . $instance['element_number_to_show'] . "']");
            
        }  
        echo $args['after_widget'];
    }

}
?>
