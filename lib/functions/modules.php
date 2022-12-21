<?php

/**
 * Modules
 *
 * Entire theme's modules definitions.
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Display Blocks
 */
function rvb_modules($post_id = false)
{
    if (!function_exists('get_field')) {
        return;
    }

    $post_id = $post_id ? intval($post_id) : get_the_ID();
    $modules = get_field('blocks', $post_id);
    $options = wp_load_alloptions();
    $content = get_the_content($post_id);

    // header
    rvb_module_header($options);

    // page title bar
    rvb_module_page_title_bar($options);

    // modules loop
    if ($modules && !is_home()) {
        foreach ($modules as $i => $module) {
            rvb_module($options, $module, $i);
        }
    }

    switch (get_post_type($post_id)) {
        case 'post':
            echo is_home() ? rvb_module_post_archive() : '';
            break;
        case 'team':
            rvb_module_team_single($post_id);
            break;
    }

    // page content
    if ($content) {
        echo '<section class="module module-page_content">';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12 py-5 py-lg-10">';
        the_content($post_id);
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }

    // footer
    rvb_module_footer($options);
}

/**
 * Display Module
 *
 */
function rvb_module($options, $module = [], $i = false)
{
    if (rvb_module_disable($module) || empty($module['acf_fc_layout'])) {
        return;
    }

    // Module Layout
    $layout = $module['acf_fc_layout'];
    $fields = !empty($module[$layout . '_layout'])
        ? $module[$layout . '_layout'][0]
        : false;
    $layout = !empty($module[$layout . '_layout'][0]['acf_fc_layout'])
        ? $module[$layout . '_layout'][0]['acf_fc_layout']
        : false;

    rvb_module_open($module, $i);

    switch ($module['acf_fc_layout']) {
        case rvb_module_disable($module):
            break;
        case 'apps':
            rvb_module_apps($module, $fields, $layout);
            break;
        case 'call_to_action':
            rvb_module_call_to_action($module, $fields, $layout);
            break;
        case 'companies':
            rvb_module_companies($module, $fields, $layout);
            break;
        case 'contacts':
            rvb_module_contacts($module, $fields, $layout, $options);
            break;
        case 'content':
            rvb_module_content($module, $fields, $layout);
            break;
        case 'content_with_photo':
            rvb_module_content_with_photo($module, $fields, $layout);
            break;
        case 'covers':
            rvb_module_covers($module, $fields, $layout);
            break;
        case 'features':
            rvb_module_features($module, $fields, $layout);
            break;
        case 'features_with_photo':
            rvb_module_features_with_photo($module, $fields, $layout);
            break;
        case 'food_menu':
            rvb_module_food_menu($module, $fields, $layout);
            break;
        case 'forms':
            rvb_module_forms($module, $fields, $layout, $options);
            break;
        case 'gallery':
            rvb_module_gallery($module, $fields, $layout);
            break;
        case 'grid':
            rvb_module_grid($module, $fields, $layout);
            break;
        case 'headings':
            rvb_module_headings($module, $fields, $layout);
            break;
        case 'hero':
            rvb_module_hero($options, $module, $fields, $layout);
            break;
        case 'portfolio':
            rvb_module_portfolio($module, $fields, $layout);
            break;
        case 'pricing':
            rvb_module_pricing($module, $fields, $layout);
            break;
        case 'products':
            rvb_module_products($module, $fields, $layout);
            break;
        case 'services':
            rvb_module_services($module, $fields, $layout);
            break;
        case 'specifications':
            rvb_module_specifications($module, $fields, $layout);
            break;
        case 'team':
            rvb_module_team($options, $module, $fields, $layout);
            break;
        case 'testimonials':
            rvb_module_testimonials($module, $fields, $layout);
            break;
        case 'text':
            rvb_module_text($options, $module, $fields, $layout);
            break;
    }

    rvb_module_close($module, $i);
}

/**
 * Module Open
 *
 */
function rvb_module_open($module, $i)
{
    if (rvb_module_disable($module)) {
        return;
    }

    $classes = ['module'];
    $inner_classes = ['inner position-relative z-index-4'];
    $layout = $module['acf_fc_layout'];
    $id = !empty($module['unique_id'])
        ? sanitize_title_with_dashes($module['unique_id'])
        : $i + 1;

    // Module Type
    $classes[] = !empty($module['acf_fc_layout'])
        ? 'module-' . $module['acf_fc_layout']
        : '';

    // Module Layout
    $classes[] = !empty($module[$layout . '_layout'][0]['acf_fc_layout'])
        ? $module[$layout . '_layout'][0]['acf_fc_layout']
        : '';

    // Theme Style
    $classes[] = !empty($module['class']) ? $module['class'] : '';
    $classes[] =
        !empty($module['style']) && $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : '';
    $classes[] =
        !empty($module['style']) && $module['style'] == 'light'
            ? 'bg-light text-dark'
            : '';

    // Class field
    $inner_classes[] = !empty($module['inner_css']) ? $module['inner_css'] : '';

    echo '<section class="' .
        join(' ', $classes) .
        '" id="module_' .
        $id .
        '">';

    echo !empty($module[$layout . '_layout'][0]['acf_fc_layout'])
        ? '<div class="fs-xs small p-3 position-absolute top-0 left-0 z-index-5"><strong>Module:</strong> ' .
            $module[$layout . '_layout'][0]['acf_fc_layout'] .
            '</div>'
        : '';

    rvb_color_mode_toggle();
    rvb_module_top_edge_shape($module);
    rvb_module_background($module);

    echo '<div class="' . join(' ', $inner_classes) . '">';
}

/**
 * Module Close
 *
 */
function rvb_module_close($module, $i)
{
    if (rvb_module_disable($module)) {
        return;
    }

    echo '</div>'; // end inner

    rvb_module_bottom_edge_shape($module);

    echo '</section>';
}

/**
 * Module Disable
 *
 */
function rvb_module_disable($module)
{
    $disable = false;

    if (
        !empty($module['disable_module']) &&
        $module['disable_module'] == true
    ) {
        $disable = true;
    }

    return $disable;
}

/**
 * Has Module
 *
 */
function rvb_has_module($module_to_find = '', $post_id = false)
{
    if (!function_exists('get_field')) {
        return;
    }

    $post_id = $post_id ? intval($post_id) : get_the_ID();
    $modules = get_field('rvb_modules', $post_id);
    $has_module = false;

    foreach ($modules as $module) {
        if ($module_to_find == $module['acf_fc_layout']) {
            $has_module = true;
        }
    }

    return $has_module;
}

/**
 * Module Container Open
 *
 */
function rvb_module_container_open($module, $class, $return = 0)
{
    $classes = ['rvb-container'];
    $classes[] = !empty($class) ? $class : false;
    $classes[] = !empty($module['container'])
        ? $module['container']
        : 'container';

    if ($return == 1) {
        return '<div class="' . join(' ', $classes) . ' z-index-5">';
    } else {
        echo '<div class="' . join(' ', $classes) . ' z-index-5">';
    }
}

/**
 * Module Container Close
 *
 */
function rvb_module_container_close($module, $return = 0)
{
    if ($return == 1) {
        return '</div>';
    } else {
        echo '</div>';
    }
}

/**
 * Module Row Open
 */
function rvb_module_row_open($class, $return = 0)
{
    $classes = ['rvb-row row'];
    $classes[] = !empty($class) ? $class : false;

    if ($return == 1) {
        return '<div class="' . join(' ', $classes) . '">';
    } else {
        echo '<div class="' . join(' ', $classes) . '">';
    }
}

/**
 * Module Row Close
 */
function rvb_module_row_close($return = 0)
{
    if ($return == 1) {
        return '</div>';
    } else {
        echo '</div>';
    }
}

/**
 * Module Column Open
 */
function rvb_module_column_open($class, $atts = '', $return = 0)
{
    $classes = ['rvb-column'];
    $classes[] = !empty($class) ? $class : false;

    if ($return == 1) {
        return '<div class="' . join(' ', $classes) . '" ' . $atts . '>';
    } else {
        echo '<div class="' . join(' ', $classes) . '" ' . $atts . '>';
    }
}

/**
 * Module Column Close
 */
function rvb_module_column_close($return = 0)
{
    if ($return == 1) {
        return '</div>';
    } else {
        echo '</div>';
    }
}

/**
 * Module Form Container Open
 */
function rvb_module_form_container_open($class)
{
    $classes = ['form-container'];
    $classes[] = !empty($class) ? $class : false;

    echo '<div class="' . join(' ', $classes) . '">';
}

/**
 * Module Form Container Close
 */
function rvb_module_form_container_close()
{
    echo '</div>';
}

function rvb_color_mode_toggle()
{
    echo '<div class="color-toggle"><button class="light fs-xs p-2">Light</button><button class="dark fs-xs p-2">Dark</button></div>';
}

/**
 * Module Background
 *
 */
function rvb_module_background($module)
{
    rvb_module_background_color($module);
    rvb_module_background_image($module);
    rvb_module_background_gradient($module);
    rvb_module_background_video($module);
}

/**
 * Module Background Color
 *
 */
function rvb_module_background_color($module)
{
    if (!empty($module['background']['background']['background_color'])) {
        $attributes = [''];

        $attributes[] = !empty(
            $module['background']['background']['background_color']
        )
            ? 'data-bgcolor="' .
                $module['background']['background']['background_color'] .
                '"'
            : false;

        echo '<div class="module-bg bg-color position-absolute top-0 left-0 h-100 w-100 z-index-1" ' .
            join(' ', $attributes) .
            '></div>';
    }
}

/**
 * Module Background Image
 *
 */
function rvb_module_background_image($module, $return = 0)
{
    if (!empty($module['background']['background']['background_image'])) {
        $attributes = [''];

        $img = !empty(
            $module['background']['background']['background_image']['ID']
        )
            ? wp_get_attachment_image(
                $module['background']['background']['background_image']['ID'],
                'full',
                '',
                ['class' => 'img-cover w-100 h-100']
            )
            : '';
        $attributes[] =
            'background-position:' .
            (!empty(
                $module['background']['background']['background_image_align']
            )
                ? $module['background']['background']['background_image_align']
                : 'center') .
            ';';
        $attributes[] =
            'opacity:' .
            (!empty(
                $module['background']['background']['background_image_opacity']
            )
                ? $module['background']['background'][
                    'background_image_opacity'
                ]
                : '1') .
            ';';

        $bg =
            '<div class="module-bg bg-image z-index-1" style="' .
            join(' ', $attributes) .
            '">' .
            $img .
            '</div>';

        if ($return == 1) {
            return $bg;
        } else {
            echo $bg;
        }
    }
}

/**
 * Module Background Gradient
 *
 */
function rvb_module_background_gradient($module)
{
    if (!empty($module['background']['background']['gradient_colors'])) {
        $attributes = [''];
        $colors = [''];

        for (
            $i = 0;
            $i < count($module['background']['background']['gradient_colors']);
            ++$i
        ) {
            $colors[] = !empty(
                $module['background']['background']['gradient_colors'][$i][
                    'color'
                ]
            )
                ? $module['background']['background']['gradient_colors'][$i][
                    'color'
                ]
                : '';
        }

        $attributes[] = !empty($colors)
            ? 'data-gradient="' . join(',', $colors) . '"'
            : false;
        $attributes[] = !empty(
            $module['background']['background']['gradient_direction']
        )
            ? 'data-direction="' .
                $module['background']['background']['gradient_direction'] .
                '"'
            : false;

        echo '<div class="module-bg custom-bg-gradient z-index-2" ' .
            join(' ', $attributes) .
            '></div>';
    }
}

/**
 * Module : Background Video
 */

function rvb_module_background_video($module)
{
    if (!empty($module['background']['background']['background_video_type'])) {
        $attributes = [''];

        $attributes[] = !empty(
            $module['background']['background']['background_video_opacity']
        )
            ? 'data-opacity="' .
                $module['background']['background'][
                    'background_video_opacity'
                ] .
                '"'
            : '';
        $type = !empty(
            $module['background']['background']['background_video_type']
        )
            ? $module['background']['background']['background_video_type']
            : '';

        echo '<div class="module-bg bg-video"' . join(' ', $attributes) . '>';

        switch ($type) {
            case 'html5':
                $mp4 = !empty(
                    $module['background']['background']['background_mp4']['url']
                )
                    ? $module['background']['background']['background_mp4'][
                        'url'
                    ]
                    : '';
                $ogv = !empty(
                    $module['background']['background']['background_ogv']['url']
                )
                    ? $module['background']['background']['background_ogv'][
                        'url'
                    ]
                    : '';
                $webm = !empty(
                    $module['background']['background']['background_webm'][
                        'url'
                    ]
                )
                    ? $module['background']['background']['background_webm'][
                        'url'
                    ]
                    : '';

                echo '<video class="video" controls autoplay muted loop>';
                echo $mp4 ? '<source src="' . $mp4 . '" type="video/mp4">' : '';
                echo $ogv ? '<source src="' . $ogv . '" type="video/ogg">' : '';
                echo $webm
                    ? '<source src="' . $webm . '" type="video/webm">'
                    : '';
                echo '</video>';

                break;
            case 'youtube':
                $embed = !empty(
                    $module['background']['background']['background_embed']
                )
                    ? $module['background']['background']['background_embed']
                    : '';
                echo $embed ? $embed : '';
                break;
            case 'vimeo':
                $embed = !empty(
                    $module['background']['background']['background_embed']
                )
                    ? $module['background']['background']['background_embed']
                    : '';
                echo $embed ? $embed : '';
                break;
        }

        echo '</div>';
    }
}

/**
 * Module : Top Edge Shape
 */
function rvb_module_top_edge_shape($module)
{
    if (empty($module['top_edge_shape'])) {
        return;
    }

    $position =
        !empty($module['top_edge_shape']['show_behind_content']) &&
        ($module['top_edge_shape']['show_behind_content'] = 1)
            ? ' z-index-2'
            : ' z-index-4';

    echo $module['top_edge_shape']['html']
        ? '<div class="module-bg edge-shape pe-none top position-relative' .
            $position .
            '">'
        : '';
    echo $module['top_edge_shape']['html']
        ? $module['top_edge_shape']['html']
        : '';
    echo $module['top_edge_shape']['css']
        ? '<style>' . $module['top_edge_shape']['css'] . '</style>'
        : '';
    echo $module['top_edge_shape']['html'] ? '</div>' : '';
}

/**
 * Module : Bottom Edge Shape
 */
function rvb_module_bottom_edge_shape($module)
{
    if (empty($module['bottom_edge_shape'])) {
        return;
    }

    $position =
        !empty($module['bottom_edge_shape']['show_behind_content']) &&
        ($module['bottom_edge_shape']['show_behind_content'] = 1)
            ? ' z-index-2'
            : ' z-index-4';

    echo $module['bottom_edge_shape']['html']
        ? '<div class="module-bg edge-shape pe-none bottom position-relative' .
            $position .
            '">'
        : '';
    echo $module['bottom_edge_shape']['html']
        ? $module['bottom_edge_shape']['html']
        : '';
    echo $module['bottom_edge_shape']['css']
        ? '<style>' . $module['bottom_edge_shape']['css'] . '</style>'
        : '';
    echo $module['bottom_edge_shape']['html'] ? '</div>' : '';
}

/**
 * Module: Page Title Bar
 */

if (!function_exists('rvb_module_page_title_bar')) {
    function rvb_module_page_title_bar($options)
    {
        $disable = get_field('hide_page_title_bar');

        if ($disable == 1) {
            return;
        }

        $status = !empty($options['options_page_title_bar_page_title_bar'])
            ? $options['options_page_title_bar_page_title_bar']
            : '';
        $skin = !empty($options['options_page_title_bar_skin_theme'])
            ? $options['options_page_title_bar_skin_theme']
            : '';
        $bgcolor = !empty(
            $options['options_page_title_bar_background_background_color']
        )
            ? $options['options_page_title_bar_background_background_color']
            : '';
        $bgimg = !empty(
            $options['options_page_title_bar_background_background_image']
        )
            ? $options['options_page_title_bar_background_background_image']
            : '';
        $bgimg = !empty(get_field('title_background_image'))
            ? get_field('title_background_image')
            : $bgimg;
        $bgimg_opacity = !empty(
            $options[
                'options_page_title_bar_background_background_image_opacity'
            ]
        )
            ? $options[
                'options_page_title_bar_background_background_image_opacity'
            ]
            : '';
        $bgimg_align = !empty(
            $options['options_page_title_bar_background_background_image_align']
        )
            ? $options[
                'options_page_title_bar_background_background_image_align'
            ]
            : '';
        $container = !empty($options['options_page_title_bar_title_bar_width'])
            ? $options['options_page_title_bar_title_bar_width']
            : '';
        $gradient_bg = !empty(
            $options['options_page_title_bar_background_gradient_colors']
        )
            ? $options['options_page_title_bar_background_gradient_colors']
            : '';
        $gradient_opacity = !empty(
            $options['options_page_title_bar_background_gradient_opacity']
        )
            ? $options['options_page_title_bar_background_gradient_opacity']
            : '';
        $gradient_direction = !empty(
            $options['options_page_title_bar_background_gradient_direction']
        )
            ? $options['options_page_title_bar_background_gradient_direction']
            : '';
        $heading_weight = !empty(
            $options['options_typography_h1_font_font_weight']
        )
            ? $options['options_typography_h1_font_font_weight']
            : '';

        // set arrays
        $return = [''];
        $class = [''];
        $atts = [''];
        $grad_colors = [''];
        $heading_class = ['h2 m-0 z-index-3 position-relative'];

        // add attributes
        $atts[] = $bgcolor ? ' data-bgcolor="' . $bgcolor . '"' : '';

        // add skin class
        $class[] = $skin ? ' ' . $skin : '';

        // Background gradient
        if ($gradient_bg) {
            for ($i = 0; $i < $gradient_bg; ++$i) {
                $color =
                    $options[
                        'options_page_title_bar_background_gradient_colors_' .
                            $i .
                            '_color'
                    ];
                $grad_colors[] = !empty($color) ? $color : '';
            }
        }

        // The Title
        $title = get_the_title();

        // Testimonials/Team Post Type Titles
        if (is_singular(['testimonials', 'team'])) {
            $cpt_title = get_post_type(get_the_id());

            $title = !empty($options['options_cpt_' . $cpt_title . '_name'])
                ? ucwords(
                    str_replace(
                        '_',
                        ' ',
                        $options['options_cpt_' . $cpt_title . '_name']
                    )
                )
                : $cpt_title;
        }

        !empty($options['page_for_posts']) && is_home()
            ? ($title = get_the_title($options['page_for_posts']))
            : '';

        is_singular('post') ? ($title = get_the_title()) : '';

        // heading weight
        $heading_class[] = !empty($heading_weight) ? $heading_weight : '';

        // return
        $return[] =
            '<section class="module module-page_title_bar pt-10 pb-5 position-relative' .
            join(' ', $class) .
            '"' .
            join(' ', $atts) .
            '>';
        $return[] = $bgimg
            ? '<div class="bg-image z-index-1" data-bg="' .
                wp_get_attachment_url($bgimg, 'full') .
                '" data-bgalign="' .
                $bgimg_align .
                '" data-opacity="' .
                $bgimg_opacity .
                '"></div>'
            : '';
        $return[] = $grad_colors
            ? '<div class="gradient-bg position-absolute top-0 left-0 w-100 h-100 z-index-2" data-gradient="' .
                join(', ', $grad_colors) .
                '" data-direction="' .
                $gradient_direction .
                '" data-opacity="' .
                $gradient_opacity .
                '"></div>'
            : '';
        $return[] =
            $container && $container == 1
                ? '<div class="container-fluid">'
                : '<div class="container">';
        $return[] =
            '<h1 class="' . join(' ', $heading_class) . '">' . $title . '</h1>';
        $return[] = $container ? '</div>' : '';
        $return[] = '</section>';

        echo !empty($status) && $status == 'show' ? join('', $return) : '';
    }
}

/**
 * Module: Header
 */
if (!function_exists('rvb_module_header')) {
    function rvb_module_header($options)
    {
        if (empty($options)) {
            return;
        }

        $layout = !empty(
            $options[
                'options_header_header_layout_0_acfe_flexible_layout_title'
            ]
        )
            ? $options[
                'options_header_header_layout_0_acfe_flexible_layout_title'
            ]
            : get_option(
                'options_header_header_layout_0_acfe_flexible_layout_title'
            );
        $layout = str_replace('Header ', 'header_', $layout);

        rvb_module_headers($options, $layout);

        echo '<main class="site position-relative" id="main" role="main">';
    }
}

/**
 * Header background image
 */
if (!function_exists('rvb_module_header_bg_image')) {
    function rvb_module_header_bg_image($options)
    {
        if (empty($options['options_header_background_background_image'])) {
            return;
        }

        $atts = [''];
        $atts[] = !empty($options['options_header_background_background_image'])
            ? 'data-bg="' .
                wp_get_attachment_image_url(
                    $options['options_header_background_background_image'],
                    'full'
                ) .
                '"'
            : 'data-bg="' .
                wp_get_attachment_image_url(
                    get_option('options_header_background_background_image'),
                    'full'
                ) .
                '"';
        $atts[] = !empty(
            $options['options_header_background_background_image_opacity']
        )
            ? 'data-opacity="' .
                $options['options_header_background_background_image_opacity'] .
                '"'
            : 'data-opacity="' .
                get_option(
                    'options_header_background_background_image_opacity'
                ) .
                '"';

        echo '<div class="bg-image"' . join(' ', $atts) . '></div>';
    }
}

/**
 * Header container open
 */
if (!function_exists('rvb_module_header_container_open')) {
    function rvb_module_header_container_open($options)
    {
        $container = !empty($options['options_header_header_width'])
            ? $options['options_header_header_width']
            : get_option('options_header_header_width');
        $container =
            $container == '1'
                ? '<div class="container-fluid">'
                : '<div class="container-xl">';

        echo $container;
    }
}

/**
 * Header container close
 */
if (!function_exists('rvb_module_header_container_close')) {
    function rvb_module_header_container_close()
    {
        echo '</div>';
    }
}

/**
 * Header container open
 */
if (!function_exists('rvb_module_header_collapse_open')) {
    function rvb_module_header_collapse_open($breakpoint, $class)
    {
        echo '<div class="collapse navbar-collapse d-' .
            $breakpoint .
            '-flex justify-content-' .
            $breakpoint .
            '-end ' .
            $class .
            '" id="navbarNavDropdown">';
    }
}

/**
 * Header container close
 */
if (!function_exists('rvb_module_header_collapse_close')) {
    function rvb_module_header_collapse_close()
    {
        echo '</div>';
    }
}

/**
 * Header open
 */
if (!function_exists('rvb_module_header_open')) {
    function rvb_module_header_open($options)
    {
        echo '<header id="wrapper-navbar">';
    }
}

/**
 * Header close
 */
if (!function_exists('rvb_module_header_close')) {
    function rvb_module_header_close()
    {
        echo '</header>';
    }
}

/**
 * Header nav open
 */
if (!function_exists('rvb_module_header_nav_open')) {
    function rvb_module_header_nav_open($options, $layout)
    {
        $class = ['site-header navbar navbar-scroll'];
        $class[] = $layout;
        $class[] = !empty($options['options_header_show_nav'])
            ? $options['options_header_show_nav']
            : '';
        $class[] = !empty($options['options_header_header_theme'])
            ? $options['options_header_header_theme']
            : 'navbar-light bg-light';
        $class[] = !empty($options['options_header_header_position'])
            ? 'position-' . $options['options_header_header_position']
            : '';
        $class[] = !empty(
            $options['options_header_sticky_header_sticky_header_position']
        )
            ? $options['options_header_sticky_header_sticky_header_position']
            : '';

        $atts = [''];
        $atts[] = !empty($options['options_header_background_background_color'])
            ? 'data-bgcolor="' .
                $options['options_header_background_background_color'] .
                '"'
            : '';
        $atts[] = !empty(
            $options['options_header_sticky_header_background_color']
        )
            ? 'data-stickybg="' .
                $options['options_header_sticky_header_background_color'] .
                '"'
            : '';
        $atts[] = !empty($options['options_header_header_theme'])
            ? 'data-headertheme="' .
                $options['options_header_header_theme'] .
                '"'
            : '';
        $atts[] = !empty($options['options_header_sticky_header_sticky_theme'])
            ? 'data-stickytheme="' .
                $options['options_header_sticky_header_sticky_theme'] .
                '"'
            : '';

        echo '<nav class="' . join(' ', $class) . '"' . join(' ', $atts) . '>';
    }
}

/**
 * Header nav close
 */
if (!function_exists('rvb_module_header_nav_close')) {
    function rvb_module_header_nav_close()
    {
        echo '</nav>';
    }
}

/**
 * Module: Footer
 */
if (!function_exists('rvb_module_footer')) {
    function rvb_module_footer($options)
    {
        if (empty($options)) {
            return;
        }

        $layout = !empty(
            $options[
                'options_footer_footer_layout_0_acfe_flexible_layout_title'
            ]
        )
            ? $options[
                'options_footer_footer_layout_0_acfe_flexible_layout_title'
            ]
            : '';
        $layout = str_replace('Footer ', 'footer_', $layout);

        rvb_module_footer_blocks($options);

        echo '</main>';

        rvb_module_footer_open($options, $layout);
        rvb_module_footer_bg_image($options);
        rvb_module_footer_bg_color($options);
        rvb_module_footer_container_open($options);
        rvb_module_footers($options, $layout);
        rvb_module_footer_container_close();
        rvb_module_footer_close();
    }
}

/**
 * Module: Footer
 */
if (!function_exists('rvb_module_footer_blocks')) {
    function rvb_module_footer_blocks($options)
    {
        $modules = get_field('footer_blocks_blocks', 'options');

        if (empty($modules)) {
            return;
        }

        foreach ($modules as $i => $module) {
            rvb_module($options, $module, $i);
        }
    }
}

if (!function_exists('rvb_module_footer_container_open')) {
    function rvb_module_footer_container_open($options)
    {
        $container = !empty($options['options_footer_container'])
            ? $options['options_footer_container']
            : 'container';
        $container =
            $container == 'container-fluid'
                ? '<div class="container-fluid">'
                : '<div class="container">';

        echo $container;
    }
}

if (!function_exists('rvb_module_footer_container_close')) {
    function rvb_module_footer_container_close()
    {
        echo '</div>';
    }
}

if (!function_exists('rvb_module_footer_open')) {
    function rvb_module_footer_open($options, $layout)
    {
        $style = !empty($options['options_footer_style'])
            ? $options['options_footer_style']
            : '';
        $class = ['site-footer position-relative w-100'];
        $class[] = !empty($layout) ? $layout : '';
        $class[] =
            $style == 'dark' ? 'bg-dark text-light' : 'bg-light text-dark';

        $atts = [''];
        $atts[] = !empty(
            $options[
                'options_footer_footer_layout_0_background_background_color'
            ]
        )
            ? 'data-bgcolor="' .
                $options[
                    'options_footer_footer_layout_0_background_background_color'
                ] .
                '"'
            : '';

        echo '<footer class="' .
            join(' ', $class) .
            '"' .
            join(' ', $atts) .
            ' id="colophon">';
    }
}

if (!function_exists('rvb_module_footer_close')) {
    function rvb_module_footer_close()
    {
        echo '</footer>';
    }
}

/**
 * Footer background image
 */
if (!function_exists('rvb_module_footer_bg_image')) {
    function rvb_module_footer_bg_image($options)
    {
        if (
            !!empty(
                $options['options_footer_footer_background_background_image']
            )
        ) {
            return;
        }

        $atts = [''];

        $atts[] =
            'data-bg="' .
            wp_get_attachment_image_url(
                $options['options_footer_background_background_image'],
                'full'
            ) .
            '"';
        $atts[] = !empty(
            $options['options_footer_background_background_image_opacity']
        )
            ? 'data-opacity="' .
                $options['options_footer_background_background_image_opacity'] .
                '"'
            : '';

        echo '<div class="bg-image"' . join(' ', $atts) . '></div>';
    }
}

/**
 * Footer background color
 */
if (!function_exists('rvb_module_footer_bg_color')) {
    function rvb_module_footer_bg_color($options)
    {
        if (!!empty($options['options_footer_background_background_color'])) {
            return;
        }

        $atts = [''];

        $atts[] =
            'data-bgcolor="' .
            $options['options_footer_background_background_color'] .
            '"';

        echo '<div class="bg-image"' . join(' ', $atts) . '></div>';
    }
}

/**
 * Module: Post Archive
 */
if (!function_exists('rvb_module_post_archive')) {
    function rvb_module_post_archive()
    {
        echo '<section class="module module-post_archive">';
        rvb_module_container_open('', '');
        rvb_module_row_open('row-cols-lg-4 g-3 g-lg-4 py-10');

        if (have_posts()):
            while (have_posts()):

                the_post();
                $id = get_the_id();
                ?>
			<div class="col">
				<div class="card shadow-0">
					<?php echo '<img src="' .
         get_the_post_thumbnail_url($id, 'full') .
         '" class="img-fluid" />'; ?>
					<div class="hover-overlay h-100 w-100">
						<a href="<?php the_permalink(); ?>">
							<div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
						</a>
					</div>

					<div class="card-body">
						<h5 class="card-title"><?php the_title(); ?></h5>
						<?php the_excerpt(); ?>
					</div>
					<div class="card-footer border-0">
						<?php
      $categories = get_the_terms($id, 'category');

      foreach ($categories as $category) {
          echo $category->name !== 'Uncategorized'
              ? '<a href="' .
                  esc_url(get_category_link($category->term_id)) .
                  '" class="btn-link text-primary" title="' .
                  $category->name .
                  '">' .
                  $category->name .
                  '</a>'
              : '';
      }
      ?>
					</div>
				</div>
			</div>
<?php
            endwhile;
            wp_reset_postdata();
        endif;

        rvb_module_row_close('');
        rvb_module_container_close('');
        echo '</section>';
    }
}

/**
 * Module: Team Single
 */
if (!function_exists('rvb_module_team_single')) {
    function rvb_module_team_single($id)
    {
        $return = [];
        $portrait = get_field('portrait', $id);
        $position = get_field('position', $id);
        $social = get_field('social_links', $id);
        $bio = get_field('bio', $id);

        $return[] =
            '<section class="block block-team_single" id="post-' . $id . '">';
        $return[] = '<div class="container py-5 py-lg-10">';
        $return[] = '<div class="row align-items-lg-center">';
        $return[] =
            '<div class="col-12 col-lg-6 col-left overflow-hidden gs_reveal">';
        $return[] = !empty($portrait)
            ? wp_get_attachment_image($portrait, 'large-square', [
                'class' => 'img-fluid',
            ])
            : '';
        $return[] = '</div>';
        $return[] = '<div class="col-12 col-lg-5 offset-lg-1 col-left  py-5">';
        $return[] = '<h1 class="mb-0">' . get_the_title() . '</h1>';
        $return[] = !empty($position)
            ? '<p class="text-muted mb-4">' . $position . '</p>'
            : '';
        $return[] = !empty($social)
            ? '<ul class="list-unstyled d-flex align-item-center justify-content-start social">'
            : '';
        $return[] =
            !empty($social) && !empty($social['facebook'])
                ? '<li class="me-3"><a href="' .
                    $social['facebook'] .
                    '" target="_blank" rel="noopener" class="text-primary" title="' .
                    $social['facebook'] .
                    ' facebook page link"><i class="fab fa-facebook fa-lg text-primary"></i></a></li>'
                : '';
        $return[] =
            !empty($social) && !empty($social['twitter'])
                ? '<li class="me-3"><a href="' .
                    $social['twitter'] .
                    '" target="_blank" rel="noopener" class="text-primary" title="' .
                    $social['twitter'] .
                    ' twitter page link"><i class="fab fa-twitter fa-lg text-primary"></i></a></li>'
                : '';
        $return[] = !empty($social) ? '</ul>' : '';
        $return[] = !empty($bio)
            ? '<div class="bio mt-4">' . $bio . '</div>'
            : '';
        $return[] = '</div>';
        $return[] = '</div>';
        $return[] = '</div>';
        $return[] = '</section>';

        echo join('', $return);
    }
}
