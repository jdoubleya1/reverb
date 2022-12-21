<?php

/**
 * Theme Setup
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

add_action('after_setup_theme', 'theme_setup');

if (!function_exists('theme_setup')) {
    function theme_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('editor-styles');
        add_theme_support('automatic-feed-links');
        add_theme_support('wp-block-styles');
        add_theme_support('responsive-embeds');
        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script',
        ]);
        add_theme_support('custom-logo');
        add_theme_support('custom-header');
        add_theme_support('custom-background');
        add_theme_support('align-wide');

        load_theme_textdomain(
            'reverb',
            get_template_directory() . '/languages'
        );

        register_nav_menus([
            'primary' => __('Primary Menu', 'reverb'),
            'topbar' => __('Top Bar Menu', 'reverb'),
            'footer' => __('Footer Menu', 'reverb'),
            'footer_left' => __('Footer Left Menu', 'reverb'),
            'footer_right' => __('Footer Right Menu', 'reverb'),
        ]);
    }
}

// Theme options
if (!function_exists('reverb_options')) {
    function reverb_options()
    {
        return wp_load_alloptions();
    }
}

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles()
{
    add_editor_style('../css/custom-editor-style.css');
}
add_action('admin_init', 'wpdocs_theme_add_editor_styles');

// body class
add_filter('body_class', function ($classes) {
    $reverb_options = reverb_options();

    $body_class = '';

    $header = isset(
        $reverb_options['options_header_sticky_header_sticky_header_position']
    )
        ? $reverb_options['options_header_sticky_header_sticky_header_position']
        : get_option('options_header_sticky_header_sticky_header_position');
    !empty($header) ? ($body_class .= ' header-' . $header) : '';

    return array_merge($classes, [$body_class]);
});

// short excerpt
function get_excerpt($limit, $source = null)
{
    $excerpt = $source == 'content' ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(' (\[.*?\])', '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';

    return $excerpt;
}

/**
 * Adjust Brightness
 *
 * Increases or decreases the brightness of a color by a percentage of the current brightness.
 *
 * @param   string  $hexCode        Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`
 * @param   float   $adjustPercent  A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
 *
 * @return  string
 */
function adjustBrightness($hexCode, $adjustPercent)
{
    $hexCode = ltrim($hexCode, '#');

    if (strlen($hexCode) == 3) {
        $hexCode =
            $hexCode[0] .
            $hexCode[0] .
            $hexCode[1] .
            $hexCode[1] .
            $hexCode[2] .
            $hexCode[2];
    }

    $hexCode = array_map('hexdec', str_split($hexCode, 2));

    foreach ($hexCode as &$color) {
        $adjustableLimit = $adjustPercent < 0 ? $color : 255 - $color;
        $adjustAmount = ceil($adjustableLimit * $adjustPercent);

        $color = str_pad(dechex($color + $adjustAmount), 2, '0', STR_PAD_LEFT);
    }

    return '#' . implode($hexCode);
}

/**
 * Debug - Console log
 */
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';

    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }

    echo $js_code;
}

/**
 * Increase Memory Limit
 */
function theme_increase_mem_limit($wp_max_mem_limit)
{
    return '512M';
}
add_filter('admin_memory_limit', 'theme_increase_mem_limit', 10, 3);
