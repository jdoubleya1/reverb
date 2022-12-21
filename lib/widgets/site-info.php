<?php

/**
 * A custom ACF widget.
 */
class site_info extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'site_info', // Base ID
            __('Site Info', 'reverb'), // Name
            [
                'description' => __('A reverb site info', 'reverb'),
                'classname' => 'site-info',
            ] // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $address1 = get_field('business_street_address', 'option');
        $address2 = get_field('business_city_state_zip', 'option');
        $address_link = get_field('business_address_link', 'option');
        $phone = get_field('business_phone_display', 'option');
        $phone_url = get_field('business_phone_url', 'option');

        if (!empty($instance['title'])) {
            echo $args['before_title'] .
                apply_filters('widget_title', $instance['title']) .
                $args['after_title'];
        }

        echo '<ul class="list-unstyled text-dark">';
        echo '<li class="location d-flex align-items-center justify-content-start border-bottom">';
        echo '<div class="icon d-flex align-items-center justify-content-center bg-light text-primary"><i class="fad fa-map-marker-alt"></i></div>';
        echo '<div class="value p-3">';
        echo '<address class="m-0">';
        echo $address1 ? $address1 : '';
        echo $address2 ? $address2 : '';
        echo $address_link
            ? '<p class="m-0"><a href="' .
                $address_link .
                '" class="small text-primary p-0 mt-3 text-capitalize">Click For Directions</a></p>'
            : '';
        echo '</address>';
        echo '</div>';
        echo '</li>';
        echo '<li class="phone d-flex align-items-center justify-content-start border-bottom">';
        echo '<div class="icon d-flex align-items-center justify-content-center bg-light text-primary"><i class="fad fa-phone-alt"></i></div>';
        echo '<div class="value p-3">';
        echo $phone && $phone_url
            ? '<p class="m-0"><a href="tel:/+1-' .
                $phone_url .
                '" class="text-body">' .
                $phone .
                '</a></p>'
            : '';
        echo '</div>';
        echo '</li>';
        echo '<li class="office-hours">';
        echo '<div class="d-flex align-items-center justify-content-start border-bottom">';
        echo '<div class="icon d-flex align-items-center justify-content-center bg-light text-primary""><i class="fad fa-hospital-alt"></i></div>';
        echo '<div class="value p-3">';
        echo '<h6 class="mb-0">Office Hours</h6>';
        echo '</div>';
        echo '</div>';
        $times = get_field('office_hours', 'option');

        if ($times) {
            echo '<table class="table table-striped"><tbody>';
        }

        foreach ($times as $time) {
            $day = $time['day'];
            $open = $time['open'];
            $close = $time['close'];

            echo '<tr>';
            echo $day ? '<td class="fw-bold">' . $day . '</td>' : '';
            echo $open ? '<td>' . $open . '</td>' : '<td></td>';
            echo $close ? '<td>' . $close . '</td>' : '<td></td>';
            echo '</tr>';
        }

        if ($times) {
            echo '</tbody></table>';
        }
        echo '</li>';
        echo '</ul>';

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } ?>
        <p>
            <label for="<?php echo $this->get_field_id(
                'title'
            ); ?>"><?php _e('Title', 'reverb'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'
            ); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
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
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = !empty($new_instance['title'])
            ? strip_tags($new_instance['title'])
            : '';

        return $instance;
    }
} // class ACF_Custom_Widget

// register ACF_Custom_Widget widget
add_action('widgets_init', function () {
    register_widget('site_info');
});
