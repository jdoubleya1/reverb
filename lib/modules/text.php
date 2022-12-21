<?php

/**
 * Module: Text
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_text($options, $module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'text_1':
            rvb_module_text_1($module, $fields);
            break;
        case 'text_2':
            rvb_module_text_2($module, $fields);
            break;
        case 'text_3':
            rvb_module_text_3($module, $fields);
            break;
        case 'text_4':
            rvb_module_text_4($module, $fields);
            break;
        case 'text_5':
            rvb_module_text_5($module, $fields);
            break;
        case 'text_6':
            rvb_module_text_6($module, $fields);
            break;
        case 'text_7':
            rvb_module_text_7($options, $module, $fields);
            break;
        case 'text_8':
            rvb_module_text_8($module, $fields);
            break;
        case 'text_9':
            rvb_module_text_9($module, $fields);
            break;
        case 'text_10':
            rvb_module_text_10($module, $fields);
            break;
        case 'text_11':
            rvb_module_text_11($module, $fields);
            break;
        case 'text_12':
            rvb_module_text_12($module, $fields);
            break;
        case 'text_13':
            rvb_module_text_13($module, $fields);
            break;
        case 'text_14':
            rvb_module_text_14($module, $fields);
            break;
        case 'text_15':
            rvb_module_text_15($module, $fields);
            break;
        case 'text_16':
            rvb_module_text_16($module, $fields);
            break;
        case 'text_17':
            rvb_module_text_17($module, $fields);
            break;
        case 'text_18':
            rvb_module_text_18($module, $fields);
            break;
        case 'text_19':
            rvb_module_text_19($module, $fields);
            break;
        case 'text_20':
            rvb_module_text_20($module, $fields);
            break;
        case 'text_21':
            rvb_module_text_21($module, $fields);
            break;
        case 'text_22':
            rvb_module_text_22($module, $fields);
            break;
        case 'text_23':
            rvb_module_text_23($module, $fields);
            break;
        case 'text_24':
            rvb_module_text_24($module, $fields);
            break;
        case 'text_25':
            rvb_module_text_25($module, $fields);
            break;
        case 'text_26':
            rvb_module_text_26($module, $fields);
            break;
        case 'text_27':
            rvb_module_text_27($module, $fields);
            break;
        case 'text_28':
            rvb_module_text_28($module, $fields);
            break;
        case 'text_29':
            rvb_module_text_29($module, $fields);
            break;
        case 'text_30':
            rvb_module_text_30($module, $fields);
            break;
        case 'text_31':
            rvb_module_text_31($module, $fields);
            break;
        case 'text_32':
            rvb_module_text_32($module, $fields);
            break;
        case 'text_33':
            rvb_module_text_33($module, $fields);
            break;
        case 'text_37':
            rvb_module_text_37($module, $fields);
            break;
    }
}

/**
 * Module: Text 1
 */
function rvb_module_text_1($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-2');
    rvb_module_column_open('col-12');
    rvb_component_breadcrumb();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 2
 */
function rvb_module_text_2($module, $fields)
{
    $cw = $fields['content_width'];
    $col_class = ['text text-center'];

    switch ($cw) {
        case 'wider':
            $col_class[] = 'col-12 col-lg-10 offset-lg-1';
            break;
        case 'widest':
            $col_class[] = 'col-12';
            break;
        case 'container':
            $col_class[] = 'col-12';
            break;
        default:
            $col_class[] = 'col-12 col-lg-8 offset-lg-2';
            break;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(join(' ', $col_class));
    rvb_component_heading($module, $fields, 'h2', 'my-4 gs_reveal', '', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'lead px-lg-5 px-xl-6 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 3
 */
function rvb_module_text_3($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 text text-center'
    );
    rvb_component_heading($module, $fields, 'h2', 'my-4 gs_reveal', '', 0);
    rvb_component_menu(
        $module,
        $fields,
        'shadow-0 gs_reveal',
        'justify-content-center'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 4
 */
function rvb_module_text_4($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 text');
    rvb_component_heading($module, $fields, 'h3', 'mb-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-6 d-flex align-items-end justify-content-end gs_reveal'
    );
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 5
 */
function rvb_module_text_5($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 text');
    rvb_component_heading($module, $fields, 'h3', 'my-4 gs_reveal', '', 0);
    rvb_component_menu(
        $module,
        $fields,
        'justify-content-start shadow-0 gs_reveal',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 6
 */
function rvb_module_text_6($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 col-xxl-5 text');
    rvb_component_heading($module, $fields, 'h3', 'my-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 7
 */
function rvb_module_text_7($options, $module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 text');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-6 d-flex align-items-lg-end justify-content-lg-end gs_reveal'
    );
    rvb_component_social_icons(
        $options,
        'd-flex',
        'd-flex align-items-center',
        'd-flex align-items-center justify-content-center',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Text 8
 */
function rvb_module_text_8($module, $fields)
{
    rvb_module_container_open($module, 'px-0');
    rvb_module_row_open('position-relative overflow-hidden bg-light g-0');
    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        '',
        '',
        0
    );
    rvb_module_container_open($module, 'container position-relative z-index-4');
    rvb_module_row_open('py-5 py-lg-6');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_heading($module, $fields, 'h2', 'my-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_sub_heading($module, $fields, '', 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_container_open($module, 'container');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 py-5 py-lg-6 gs_reveal'
    );
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 9
 */
function rvb_module_text_9($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5 py-lg-10');
    rvb_module_column_open('col-12 col-lg-3 order-2 order-lg-1');
    rvb_component_sidebar($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-9 ps-lg-5 order-1 order-lg-2');
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 10
 */
function rvb_module_text_10($module, $fields)
{
    rvb_module_container_open($module, 'position-relative overflow-hidden');
    rvb_module_row_open('position-relative');
    rvb_component_scrollSpy($module, $fields, '');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 11
 */
function rvb_module_text_11($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 12
 */
function rvb_module_text_12($module, $fields)
{
    $cw = $fields['content_width'];
    $col_class = [''];

    switch ($cw) {
        case 'wider':
            $col_class[] = 'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2';
            break;
        case 'widest':
            $col_class[] = 'col-12 col-xl-10 offset-xl-1';
            break;
        case 'container':
            $col_class[] = 'col-12';
            break;
        default:
            $col_class[] = 'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3';
            break;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(join(' ', $col_class));
    rvb_component_heading($module, $fields, 'h4', 'mb-4', '', 0);
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 13
 */
function rvb_module_text_13($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3');
    rvb_component_heading($module, $fields, 'h5', 'mb-4', '', 0);
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 14
 */
function rvb_module_text_14($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-7 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h6', 'mb-4', '', 0);
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 col-xl-2');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        [166, 125],
        'w-100 gs_reveal',
        '',
        0
    );
    rvb_component_image_caption($fields['block_image'], 'small');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 15
 */
function rvb_module_text_15($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h5', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'mt-4',
        'gs_reveal',
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
 * Module Text 16
 */
function rvb_module_text_16($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h5', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_split_html_content(
        $module,
        $fields,
        'row gs_reveal',
        'col-12 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3',
        '',
        '',
        'col-12 col-lg-4 col-xl-3',
        '',
        ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Text 17
 */
function rvb_module_text_17($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_split_html_content(
        $module,
        $fields,
        'row',
        'col-12 col-lg-7 offset-lg-2 col-xl-6 offset-xl-3 pe-lg-3 gs_reveal',
        '',
        '',
        'col-12 col-lg-3 col-xl-2 gs_reveal',
        '',
        ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Text 18
 */
function rvb_module_text_18($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h6', 'mb-4 gs_reveal', '', 0);
    rvb_component_unordered_list($module, $fields, '', '', '', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 19
 */
function rvb_module_text_19($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h5', 'mb-4 gs_reveal', '', 0);
    rvb_component_menu($module, $fields, 'shadow-0 gs_reveal', '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 20
 */
function rvb_module_text_20($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-7 offset-lg-2 col-xl-6 offset-xl-3');
    rvb_component_html_content($module, $fields, 'fs-4 lh-sm', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 col-xl-2');
    rvb_component_heading($module, $fields, 'h4', 'mb-3 gs_reveal', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 21
 */
function rvb_module_text_21($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_unordered_list(
        $module,
        $fields,
        'row justify-content-lg-center',
        'col-12 col-sm-6',
        '',
        'my-4',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 22
 */
function rvb_module_text_22($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 mb-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_split_html_content(
        $module,
        $fields,
        'row',
        'col-12 col-md-6 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3 gs_reveal',
        '',
        '',
        'col-12 col-md-6 col-lg-4 col-xl-3 gs_reveal',
        '',
        ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Text 23
 */
function rvb_module_text_23($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_unordered_list(
        $module,
        $fields,
        'row justify-content-lg-center',
        'col-12 col-sm-6',
        'fw-bold mb-2',
        'pe-lg-4 pe-xl-5 pe-xxl-6',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 24
 */
function rvb_module_text_24($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4', 0);
    rvb_component_unordered_list($module, $fields, '', '', '', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 25
 */
function rvb_module_text_25($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        '',
        'gs_reveal',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 col-xl-3');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 26
 */
function rvb_module_text_26($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 col-xl-3');
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
 * Module Text 27
 */
function rvb_module_text_27($module, $fields)
{
    $cw = $fields['content_width'];
    $col_class = [''];

    switch ($cw) {
        case 'wider':
            $col_class[] = 'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2';
            break;
        case 'widest':
            $col_class[] = 'col-12 col-xl-10 offset-xl-1';
            break;
        case 'container':
            $col_class[] = 'col-12';
            break;
        default:
            $col_class[] = 'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3';
            break;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(join(' ', $col_class));
    rvb_component_heading(
        $module,
        $fields,
        'h2',
        'text-center mb-5 gs_reveal',
        '',
        0
    );
    rvb_component_accordion($module, $fields, 'gs_reveal');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 28
 */
function rvb_module_text_28($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3');
    rvb_component_heading(
        $module,
        $fields,
        'h2',
        'text-center mb-5 gs_reveal',
        '',
        0
    );
    rvb_component_accordion($module, $fields, 'gs_reveal');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 29
 */
function rvb_module_text_29($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-5 gs_reveal', '', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'ps-0 mb-0',
        '',
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
 * Module Text 30
 */
function rvb_module_text_30($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text');
    rvb_component_heading($module, $fields, 'h4', 'mb-5 gs_reveal', '', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'ps-0 mb-0',
        'border-bottom pb-4 mb-4',
        'h6',
        'mb-0',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 31
 */
function rvb_module_text_31($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 gs_reveal', '', 0);
    rvb_component_unordered_list(
        $module,
        $fields,
        'ps-0 mb-0',
        'border-bottom pb-4 mb-4',
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
 * Module Text 32
 */
function rvb_module_text_32($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_testimonials(
        $module,
        $fields,
        $type = '',
        $grid_row_class = '',
        $wrap_content = '',
        $blockquote_class = 'row align-items-center g-0',
        $testimonial_class = 'col-12 order-1 fs-lg',
        $title_type = '',
        $author_class = 'col order-3 ps-4',
        $title_class = '',
        $subtitle_class = 'fs-xs',
        $image_class = 'col-auto order-2'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 33
 */
function rvb_module_text_33($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text'
    );
    rvb_component_testimonials(
        $module,
        $fields,
        $type = '',
        $grid_row_class = '',
        $wrap_content = '',
        $blockquote_class = 'border-start border-dark ps-4 py-3',
        $testimonial_class = 'fs-lg',
        $title_type = '',
        $author_class = '',
        $title_class = '',
        $subtitle_class = '',
        $image_class = 'd-none'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Text 37
 */
function rvb_module_text_37($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'mt-3 mb-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
