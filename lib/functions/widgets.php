<?php

/**
 * Widgets
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

// function sitewide_footer_blocks()
// {
//     register_sidebar(
//         array(
//             'id' => 'footer-blocks',
//             'name' => esc_html__('Site-wide Footer Blocks', 'reverb'),
//             'description' => esc_html__('Blocks in this widget appear in the footer on every page', 'reverb'),
//             'before_widget' => '<div id="%1$s" class="widget %2$s">',
//             'after_widget' => '</div>',
//             'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
//             'after_title' => '</h3></div>'
//         )
//     );
// }
// add_action('widgets_init', 'sitewide_footer_blocks');

function register_custom_widget_area()
{
    register_sidebar([
        'id' => 'sidebar',
        'name' => esc_html__('Sidebar', 'reverb'),
        'description' => esc_html__(
            'Sidebar widget for the Text-9 Module',
            'reverb'
        ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' =>
            '<div class="widget-title-holder"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ]);
}
add_action('widgets_init', 'register_custom_widget_area');

add_filter('dynamic_sidebar_params', 'my_dynamic_sidebar_params');

function my_dynamic_sidebar_params($params)
{
    // get widget vars
    $widget_name = $params[0]['widget_name'];
    $widget_id = $params[0]['widget_id'];

    // bail early if this widget is not a Text widget
    if ($widget_name != 'Derp') {
        return $params;
    }

    $derp = get_sub_field('testimonials', 'widget_' . $widget_id);

    // return
    return $params;
}
