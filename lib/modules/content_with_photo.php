<?php

/**
 * Module: Content With Photo
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_content_with_photo($module, $fields, $layout)
{
    if (empty($module)) {
        return;
    }

    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'content_with_photo_1':
            rvb_module_content_with_photo_1($module, $fields);
            break;
        case 'content_with_photo_2':
            rvb_module_content_with_photo_2($module, $fields);
            break;
        case 'content_with_photo_3':
            rvb_module_content_with_photo_3($module, $fields);
            break;
        case 'content_with_photo_4':
            rvb_module_content_with_photo_4($module, $fields);
            break;
        case 'content_with_photo_5':
            rvb_module_content_with_photo_5($module, $fields);
            break;
        case 'content_with_photo_6':
            rvb_module_content_with_photo_6($module, $fields);
            break;
        case 'content_with_photo_7':
            rvb_module_content_with_photo_7($module, $fields);
            break;
        case 'content_with_photo_8':
            rvb_module_content_with_photo_8($module, $fields);
            break;
        case 'content_with_photo_9':
            rvb_module_content_with_photo_9($module, $fields);
            break;
        case 'content_with_photo_10':
            rvb_module_content_with_photo_10($module, $fields);
            break;
        case 'content_with_photo_11':
            rvb_module_content_with_photo_11($module, $fields);
            break;
        case 'content_with_photo_12':
            rvb_module_content_with_photo_12($module, $fields);
            break;
        case 'content_with_photo_24':
            rvb_module_content_with_photo_24($module, $fields);
            break;
    }
}

/**
 * Module Content With Photo 1
 */
function rvb_module_content_with_photo_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 offset-lg-6 col-xl-4 offset-xl-8'
            : 'col-12 col-lg-6 col-xl-4';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 col-xl-7'
            : 'col-12 col-lg-6 offset-lg-6 col-xl-7 offset-xl-5 text-end ps-xl-5';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class,
        'img-fluid',
        0
    );
    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' py-5 py-lg-10');
    rvb_component_heading($module, $fields, 'h3', 'mb-3 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 2
 */
function rvb_module_content_with_photo_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5 col-xl-4';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-6 text-end';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class . ' gs_reveal',
        '',
        0
    );
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-sm-2 mt-4 g-0',
        'col mt-4 pe-4 gs_reveal',
        'h6',
        '',
        '',
        0
    );
    rvb_component_button_group($module, $fields, 'gs_reveal mt-4', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 3
 */
function rvb_module_content_with_photo_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-6 text-end';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class,
        '',
        0
    );
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'mt-3 ms-4',
        'mt-4 ps-2 gs_reveal',
        '',
        '',
        '',
        0
    );
    rvb_component_button_group($module, $fields, 'gs_reveal mt-4', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 4
 */
function rvb_module_content_with_photo_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' text-center py-lg-5');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'mt-3 ps-4 ms-0',
        'mt-4 gs_reveal',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 5
 */
function rvb_module_content_with_photo_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-xl-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 col-xl-5 offset-xl-1'
            : 'col-12 col-lg-6 col-xl-5 order-lg-1';

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('align-items-lg-stretch');
    rvb_module_column_open($c1Class . ' text-center col-left');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large',
        'w-100 h-100',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open(
        $c2Class .
            ' py-3 py-md-4 py-lg-5 col-right d-lg-flex justify-content-lg-center flex-lg-column'
    );
    rvb_component_heading(
        $module,
        $fields,
        'h2',
        'gs_reveal',
        'mb-0 gs_reveal',
        0
    );
    rvb_component_html_content($module, $fields, 'mt-3 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 6
 */
function rvb_module_content_with_photo_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-6';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class . ' text-end',
        '',
        0
    );
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-sm-2 mt-4 g-0',
        'col mt-4 pe-4 pe-lg-5 gs_reveal',
        'h4',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 7
 */
function rvb_module_content_with_photo_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'pagination' => [
            'el' => '.rvb-' . $module['unique_id'] . '-pagination',
            'dynamicBullets' => true,
        ],
    ];
    $source = $fields['gallery'];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['id'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' py-3 py-lg-6 text-center');
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
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        '',
        'mb-4 icon',
        '',
        0
    );
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 8
 */
function rvb_module_content_with_photo_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 pt-5 py-lg-5 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' text-center');
    rvb_component_video($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'p', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 9
 */
function rvb_module_content_with_photo_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 py-lg-5 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' pt-5 text-center');
    rvb_component_image(
        $module,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10 text-center');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'mt-4 px-4 px-lg-5 gs_reveal',
        0
    );
    rvb_component_button_group($module, $fields, 'mt-4 mx-3 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 10
 */
function rvb_module_content_with_photo_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-7 col-xl-6'
            : 'col-12 col-lg-7 col-xl-6 offset-xl-1 order-xl-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-xl-1'
            : 'col-12 col-lg-5 order-xl-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-xl-center');
    rvb_module_column_open($c1Class . ' text-center col-left');
    rvb_component_image($module, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10 col-right');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-sm-2 mt-4 g-0',
        'col mt-4 pe-4 gs_reveal',
        'h6',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 11
 */
function rvb_module_content_with_photo_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-6 text-end';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class . ' h-100 py-5',
        '',
        0
    );
    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-2 mt-4 g-0',
        'col mt-4 pe-4 gs_reveal',
        'h6',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 12
 */
function rvb_module_content_with_photo_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open('col-12 col-lg-3 py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'mt-lg-5 fs-lg pe-lg-4 pe-xl-5 mb-0 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-9 pb-5 py-lg-5 text-center');
    rvb_component_gallery(
        $module,
        $fields,
        'lightbox',
        'large-square',
        'row-cols-1 row-cols-md-3'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content With Photo 24
 */
function rvb_module_content_with_photo_24($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $left = $fields['left_content'];
    $center = $fields['center_content'];
    $right = $fields['right_content'];

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-center text-center py-5');
    rvb_module_column_open('col-12 col-lg-4 mb-5 mb-lg-0');
    rvb_component_heading($module, $left, 'h5', 'gs_reveal mb-4', 0);
    rvb_component_html_content($module, $left, 'gs_reveal mb-4', 0);
    rvb_component_button_group($module, $left, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 text-center mb-5 mb-lg-0');
    rvb_component_image(
        $fields,
        $center['block_image'],
        'medium',
        'mb-4 gs_reveal',
        'img-fluid',
        0
    );
    rvb_component_heading($module, $center, 'h5', 'gs_reveal mb-4', 0);
    rvb_component_html_content($module, $center, 'gs_reveal mb-4', 0);
    rvb_component_button_group($module, $center, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4');
    rvb_component_heading($module, $right, 'h5', 'gs_reveal mb-4', 0);
    rvb_component_html_content($module, $right, 'gs_reveal mb-4', 0);
    rvb_component_button_group($module, $right, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
