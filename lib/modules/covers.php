<?php

/**
 * Module: Covers
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_covers($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'cover_1':
            rvb_module_cover_1($module, $fields);
            break;
        case 'cover_3':
            rvb_module_cover_3($module, $fields);
            break;
        case 'cover_4':
            rvb_module_cover_4($module, $fields);
            break;
        case 'cover_5':
            rvb_module_cover_5($module, $fields);
            break;
        case 'cover_6':
            rvb_module_cover_6($module, $fields);
            break;
        case 'cover_7':
            rvb_module_cover_7($module, $fields);
            break;
        case 'cover_8':
            rvb_module_cover_8($module, $fields);
            break;
        case 'cover_9':
            rvb_module_cover_9($module, $fields);
            break;
        case 'cover_10':
            rvb_module_cover_10($module, $fields);
            break;
        case 'cover_11':
            rvb_module_cover_11($module, $fields);
            break;
        case 'cover_12':
            rvb_module_cover_12($module, $fields);
            break;
        case 'cover_13':
            rvb_module_cover_13($module, $fields);
            break;
        case 'cover_14':
            rvb_module_cover_14($module, $fields);
            break;
        // case 'cover_15':
        // 	rvb_module_cover_15($module, $fields);
        // 	break;
        // case 'cover_16':
        // 	rvb_module_cover_16($module, $fields);
        // 	break;
        // case 'cover_17':
        // 	rvb_module_cover_17($module, $fields);
        // 	break;
        // case 'cover_18':
        // 	rvb_module_cover_18($module, $fields);
        // 	break;
        // case 'cover_19':
        // 	rvb_module_cover_19($module, $fields);
        // 	break;
        // case 'cover_20':
        // 	rvb_module_cover_20($module, $fields);
        // 	break;
    }
}

/**
 * Module Covers 1
 */
function rvb_module_cover_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style = $module['style'] == 'dark' ? 'bg-dark' : 'bg-light';

    rvb_module_container_open($module, 'container');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 text-center my-10 py-10'
    );
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mt-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_row_open('g-0 ' . $style);
    rvb_module_container_open($module, 'container px-0');
    rvb_module_row_open('align-items-center justify-content-between py-4');
    rvb_component_logos($module, $fields, '', 'col', 'gs_reveal', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_row_close();
}

/**
 * Module Covers 3
 */
function rvb_module_cover_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center py-5 py-lg-10'
    );
    rvb_component_heading(
        $module,
        $fields,
        'h2',
        'mb-0 lh-sm gs_reveal',
        'gs_reveal',
        0
    );
    rvb_component_sub_heading(
        $module,
        $fields,
        '',
        'fs-lg mt-3 mt-lg-5 gs_reveal',
        0
    );
    rvb_component_button_group(
        $module,
        $fields,
        'mb-lg-0 mt-3 mt-lg-5 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 4
 */
function rvb_module_cover_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    if (empty($fields['slides'])) {
        return;
    }

    $column_class = [];
    $slides = [];
    $options = [
        'grabCursor' => true,
        'loop' => true,
        'effect' => 'fade',
        'fadeEffect' => [
            'crossFade' => true,
        ],
        'speed' => 1000,
        'parallax' => true,
        'autoplay' => [
            'delay' => 5000,
        ],
        'preloadImages' => false,
        'lazy' => true,
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'pagination' => [
            'el' => '.swiper-pagination',
            'clickable' => true,
        ],
    ];

    // Content Alignment
    $align = $fields['align'];

    switch ($align) {
        case 'left':
            $column_class[] =
                'col-12 col-lg-8 col-xl-6 text-center text-lg-start';
            break;
        case 'center':
            $column_class[] =
                'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center';
            break;
        case 'right':
            $column_class[] =
                'col-12 col-lg-8 offset-lg-3 col-xl-6 offset-xl-5 text-end';
            break;
        default:
            $column_class[] =
                'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center';
            break;
    }

    foreach ($fields['slides'] as $slide):
        $slides[] = '<div class="swiper-slide d-flex align-items-center">';
        $slides[] = '<div class="container z-index-5">';
        $slides[] = rvb_module_row_open('', 1);
        $slides[] = rvb_module_column_open(join(' ', $column_class), '', 1);
        $slides[] = rvb_component_heading(
            $module,
            $slide,
            'h2',
            'mt-5 mt-lg-7 mb-0 text-shadow',
            '',
            1
        );
        $slides[] = rvb_component_sub_heading(
            $module,
            $slide,
            'p',
            'fs-g mt-3 mb-0',
            1
        );
        $slides[] = rvb_component_button_group(
            $module,
            $slide,
            'mt-5 mb-4 mb-lg-8',
            1
        );
        $slides[] = rvb_module_column_close(1);
        $slides[] = rvb_module_row_close(1);
        $slides[] = rvb_module_container_close($module, 1);
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        1,
        0,
        1,
        0,
        0
    );
}

/**
 * Module Covers 5
 */
function rvb_module_cover_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_component_image($fields, $fields['block_image'], '', 'w-100', '', 0);
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 text-center py-5 px-lg-6 mb-6 bg-white text-dark content-inner shadow'
    );
    rvb_component_heading($module, $fields, 'h3', '', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 px-lg-6', 0);
    rvb_component_button_group($module, $fields, 'mt-5', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 6
 */
function rvb_module_cover_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5 py-lg-6');
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_heading($module, $fields, 'h3', '', '', 0);
    rvb_component_sub_heading($module, $fields, '', ' py-4', 0);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 offset-lg-1');
    rvb_component_features(
        $module,
        $fields,
        'row',
        'col-12 my-4 gs_reveal',
        'me-4 shadow-0 bg-transparent row row-cols-2 flex-row',
        'col-auto py-0 px-3',
        'col py-0 px-3',
        '',
        'fa-2x',
        '',
        'h6',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 7
 */
function rvb_module_cover_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 py-5');
    rvb_component_heading(
        $module,
        $fields,
        'h2',
        'text-light gs_reveal',
        '',
        0
    );
    rvb_component_sub_heading(
        $module,
        $fields,
        '',
        'text-light lead font-weight-normal gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        '',
        'gs_reveal',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 8
 */
function rvb_module_cover_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large',
        'w-100 position-absolute top-0 left-0 z-index-1',
        '',
        0
    );

    rvb_module_container_open($module, 'pb-5 pb-lg-3 pt-10');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_module_row_open('bg-white rounded shadow-4 mt-5 mt-lg-10 mx-0');
    rvb_module_column_open('col-12 col-lg-6 py-3 p-lg-4 p-xl-5');
    rvb_component_heading(
        $module,
        $fields['left_content'],
        'h1',
        'h2',
        'm-0',
        0
    );
    rvb_component_html_content($module, $fields['left_content'], 'mb-4', 0);
    rvb_component_button_group($module, $fields['left_content'], '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 py-3 p-lg-4 p-xl-5 border-start');
    rvb_component_heading($module, $fields['right_content'], '', '', 'm-0', 0);
    rvb_component_html_content($module, $fields['right_content'], '', 0);
    rvb_component_button_group($module, $fields['right_content'], 'mt-4', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 9
 */
function rvb_module_cover_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $slides = [];
    $options = [
        'effect' => 'fade',
        'fadeEffect' => [
            'crossFade' => true,
        ],
        'grabCursor' => true,
        'loop' => true,
        'speed' => 1400,
        'delay' => 12000,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => true,
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'pagination' => [
            'el' => '.swiper-pagination',
            'clickable' => true,
        ],
    ];
    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-8 offset-lg-4 col-xl-6 offset-xl-6'
            : 'col-12 col-lg-8 col-xl-6';

    foreach ($fields['slides'] as $slide):
        $slides[] = '<div class="swiper-slide py-10">';
        $slides[] = !empty($slide['background']['background_image'])
            ? '<div class="bg-image" style="background-image:url(' .
                $slide['background']['background_image']['url'] .
                ');opacity:0.4;"></div>'
            : false;
        $slides[] = '<div class="container py-10">';
        $slides[] = '<div class="row">';
        $slides[] = '<div class="' . $c1Class . '">';
        $slides[] = rvb_component_heading($module, $slide, 'h2', '', '', 1);
        $slides[] = rvb_component_sub_heading($module, $slide, 'p', 'py-4', 1);
        $slides[] = rvb_component_button_group($module, $slide, '', 1);
        $slides[] = '</div>'; // end col
        $slides[] = '</div>'; // end row
        $slides[] = '</div>'; // end container
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'px-0');
    rvb_module_row_open('g-0');
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        1,
        0,
        1,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 10
 */
function rvb_module_cover_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';

    rvb_module_container_open($module, '');
    rvb_module_row_open('pt-6 mb-10 pb-10');
    rvb_module_column_open($c1Class . ' pb-10');
    rvb_component_heading($module, $fields, 'h3', 'my-4 gs_reveal', '', 0);
    rvb_component_sub_heading(
        $module,
        $fields,
        '',
        'lead font-weight-normal gs_reveal',
        0
    );
    rvb_component_button_group($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 11
 */
function rvb_module_cover_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';

    rvb_module_container_open($module, '');
    rvb_module_row_open('pt-10 mt-10');
    rvb_module_column_open($c1Class . ' p-5 mb-5 bg-white text-dark shadow-2');
    rvb_component_icon($module, $fields, 'gs_reveal', 'fa-3x', 0);
    rvb_component_heading($module, $fields, 'h4', 'pt-4 gs_reveal', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'pb-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 12
 */
function rvb_module_cover_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7 col-xl-4 offset-xl-8'
            : 'col-12 col-lg-5 col-xl-4';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-10');
    rvb_module_column_open($c1Class . ' p-5 bg-white text-dark shadow-2');
    rvb_component_heading($module, $fields, 'h4', 'pb-5 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 13
 */
function rvb_module_cover_13($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7 col-xl-4 offset-xl-8'
            : 'col-12 col-lg-5 col-xl-4';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        $c1Class . ' py-4 p-sm-4 p-lg-5 bg-white text-dark shadow-2'
    );
    rvb_component_heading($module, $fields, 'h5', 'pb-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Covers 14
 */
function rvb_module_cover_14($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' py-5');
    rvb_component_heading($module, $fields, 'h4', 'pb-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
