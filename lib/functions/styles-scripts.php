<?php

/**
 * Theme Styles & Scripts
 *
 *
 * Entire theme's style and script enqueue.
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function my_theme_styles_scripts()
{
    // Frontend scripts.
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');

        // Swiper css
        wp_register_style(
            'swipercss',
            'https://unpkg.com/swiper@7/swiper-bundle.min.css'
        );

        // Swiper
        wp_register_script(
            'swiper',
            'https://unpkg.com/swiper@7/swiper-bundle.min.js"',
            '',
            '',
            true
        );

        // Main Stylesheet
        wp_enqueue_style(
            'styles',
            REVERB_URL . '/style.min.css',
            [],
            REVERB_VER,
            'all'
        );

        // Font Awesome
        wp_enqueue_script(
            'fontawesome',
            'https://kit.fontawesome.com/f338b49fa9.js',
            '',
            '',
            true
        );

        // Vendors
        wp_enqueue_script(
            'vendors',
            REVERB_URL . '/lib/js/vendor.min.js',
            ['jquery'],
            '',
            true
        );

        // Main JS
        wp_enqueue_script(
            'custom',
            REVERB_URL . '/lib/js/custom.min.js',
            ['jquery'],
            '',
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'my_theme_styles_scripts', 999);
