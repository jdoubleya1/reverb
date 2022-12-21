<?php

/**
 * Module: Content
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_content($module, $fields, $layout)
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
        case 'content_1':
            rvb_module_content_1($module, $fields);
            break;
        case 'content_2':
            rvb_module_content_2($module, $fields);
            break;
        case 'content_3':
            rvb_module_content_3($module, $fields);
            break;
        case 'content_4':
            rvb_module_content_4($module, $fields);
            break;
        case 'content_5':
            rvb_module_content_5($module, $fields);
            break;
        case 'content_6':
            rvb_module_content_6($module, $fields);
            break;
        case 'content_7':
            rvb_module_content_7($module, $fields);
            break;
        case 'content_8':
            rvb_module_content_8($module, $fields);
            break;
        case 'content_9':
            rvb_module_content_9($module, $fields);
            break;
        case 'content_10':
            rvb_module_content_10($module, $fields);
            break;
        case 'content_11':
            rvb_module_content_11($module, $fields);
            break;
        case 'content_12':
            rvb_module_content_12($module, $fields);
            break;
        case 'content_13':
            rvb_module_content_13($module, $fields);
            break;
        case 'content_14':
            rvb_module_content_14($module, $fields);
            break;
        case 'content_15':
            rvb_module_content_15($module, $fields);
            break;
        case 'content_16':
            rvb_module_content_16($module, $fields);
            break;
        case 'content_17':
            rvb_module_content_17($module, $fields);
            break;
        case 'content_18':
            rvb_module_content_18($module, $fields);
            break;
        case 'content_19':
            rvb_module_content_19($module, $fields);
            break;
        case 'content_20':
            rvb_module_content_20($module, $fields);
            break;
        case 'content_21':
            rvb_module_content_21($module, $fields);
            break;
        case 'content_22':
            rvb_module_content_22($module, $fields);
            break;
        case 'content_23':
            rvb_module_content_23($module, $fields);
            break;
        case 'content_24':
            rvb_module_content_24($module, $fields);
            break;
        case 'content_25':
            rvb_module_content_25($module, $fields);
            break;
        case 'content_26':
            rvb_module_content_26($module, $fields);
            break;
        case 'content_27':
            rvb_module_content_27($module, $fields);
            break;
        case 'content_28':
            rvb_module_content_28($module, $fields);
            break;
    }
}

/**
 * Module Content 1
 */
function rvb_module_content_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 col-xl-7');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 2
 */
function rvb_module_content_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-7');
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 3
 */
function rvb_module_content_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 mb-4');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 offset-lg-1 col-lg-5');
    rvb_component_html_content(
        $module,
        $fields['left_content'],
        'pe-lg-4 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_html_content(
        $module,
        $fields['right_content'],
        'ps-lg-4 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 4
 */
function rvb_module_content_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_heading($module, $fields, 'p', 'fs-md gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-1');
    rvb_component_html_content($module, $fields, 'h4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mt-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 5
 */
function rvb_module_content_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 6
 */
function rvb_module_content_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-4 offset-lg-1');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_html_content(
        $module,
        $fields['left_content'],
        'gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3');
    rvb_component_html_content(
        $module,
        $fields['right_content'],
        'mt-3 mt-lg-0 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 7
 */
function rvb_module_content_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('pt-5');
    rvb_module_column_open('col-12 col-lg-7 offset-lg-1');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('pb-5');
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_html_content(
        $module,
        $fields['left_content'],
        'mb-4 mb-lg-0 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3');
    rvb_component_html_content(
        $module,
        $fields['right_content'],
        'mb-4 mb-lg-0 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_html_content($module, $fields, 'text-muted gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 8
 */
function rvb_module_content_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-4 offset-lg-1');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_html_content($module, $fields, 'pb-4 gs_reveal', 0);
    rvb_module_row_open('');
    rvb_component_unordered_list(
        $module,
        $fields['list_1_group']['list_1'],
        'col-6 gs_reveal',
        '',
        '',
        '',
        '',
        0
    );
    rvb_component_unordered_list(
        $module,
        $fields['list_2_group']['list_2'],
        'col-6 gs_reveal',
        '',
        '',
        '',
        '',
        0
    );
    rvb_module_row_close();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 9
 */
function rvb_module_content_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1 mb-4 mb-lg-0');
    rvb_component_heading(
        $module,
        $fields['left_content'],
        'h4',
        'mb-4 gs_reveal',
        '',
        0
    );
    rvb_component_html_content(
        $module,
        $fields['left_content'],
        'gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading(
        $module,
        $fields['right_content'],
        'h4',
        'mb-4 gs_reveal',
        '',
        0
    );
    rvb_component_html_content(
        $module,
        $fields['right_content'],
        'gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 10
 */
function rvb_module_content_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_unordered_list(
        $module,
        $fields['list_1_group']['list_1'],
        'mx-0 gs_reveal',
        '',
        'mb-4',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_unordered_list(
        $module,
        $fields['list_2_group']['list_2'],
        'mt-3 mt-lg-0 mx-0 gs_reveal',
        '',
        'mb-4',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 11
 */
function rvb_module_content_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_component_unordered_list(
        $module,
        $fields['list_1_group']['list_1'],
        'col-12 col-lg-5 offset-lg-1 gs_reveal',
        'py-2 ps-4 mb-3 position-relative',
        'h4 mb-4',
        '',
        '',
        0
    );
    rvb_component_unordered_list(
        $module,
        $fields['list_2_group']['list_2'],
        'col-12 col-lg-5 mt-3 mt-lg-0 gs_reveal',
        'py-2 ps-4 mb-3 position-relative',
        'h4 mb-4',
        '',
        '',
        0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 12
 */
function rvb_module_content_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_tabbed_content(
        $module,
        $fields,
        'd-flex justify-content-lg-center gs_reveal',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 13
 */
function rvb_module_content_13($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_html_content($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 14
 */
function rvb_module_content_14($module, $fields)
{
    if (empty($fields['specs'])) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_specs(
        $module,
        $fields['specs'],
        'row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4',
        'col gs_reveal',
        'd-flex flex-nowrap align-items-start p-3 border-0 h-100',
        'text-center w-auto mb-0 d-flex flex-column',
        'h2 order-2 mb-0 lh-xs',
        'order-1 mb-0 lh-xs',
        'mb-0 ps-4'
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 15
 */
function rvb_module_content_15($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-1 row-cols-md-3 g-4 g-xxl-7',
        'col gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 16
 */
function rvb_module_content_16($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-1 row-cols-md-3 g-4 g-md-5',
        'col gs_reveal',
        'h5',
        '',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 17
 */
function rvb_module_content_17($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 g-lg-5',
        'col gs_reveal',
        'h5',
        '',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 18
 */
function rvb_module_content_18($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, '', 'gs_reveal');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 19
 */
function rvb_module_content_19($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, '', 'gs_reveal');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 20
 */
function rvb_module_content_20($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 21
 */
function rvb_module_content_21($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 22
 */
function rvb_module_content_22($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h2', 'gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'mt-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Content 23
 */
function rvb_module_content_23($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h4', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_html_content($module, $fields, 'mt-4 mb-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_unordered_list(
        $module,
        $fields,
        'row justify-content-lg-center',
        'col-12 col-lg-5 bg-light d-flex align-items-center justify-content-center p-5 py-lg-10 flex-wrap text-center gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 24
 */
function rvb_module_content_24($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row justify-content-around flex-wrap',
        'col-12 col-lg-6 text-center px-5 my-4 gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 25
 */
function rvb_module_content_25($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row',
        'col-12 col-lg-4 px-4 text-center my-4 gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 26
 */
function rvb_module_content_26($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 mb-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_unordered_list(
        $module,
        $fields,
        'row justify-content-lg-center',
        'col-12 col-lg-3 text-center my-4 px-5 gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 27
 */
function rvb_module_content_27($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row',
        'col-12 col-lg-4 px-4 my-4 text-center gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}

/**
 * Module Content 28
 */
function rvb_module_content_28($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_unordered_list(
        $module,
        $fields,
        'row',
        'col-12 col-lg-3 text-center my-4 px-5 gs_reveal',
        'h5',
        'my-4',
        '',
        0
    );
    rvb_module_container_close($module);
}
