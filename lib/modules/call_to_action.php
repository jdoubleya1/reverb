<?php

/**
 * Module: Call To Action
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_call_to_action($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'call_to_action_1':
            rvb_module_call_to_action_1($module, $fields);
            break;
        case 'call_to_action_2':
            rvb_module_call_to_action_2($module, $fields);
            break;
        case 'call_to_action_3':
            rvb_module_call_to_action_3($module, $fields);
            break;
        case 'call_to_action_4':
            rvb_module_call_to_action_4($module, $fields);
            break;
        case 'call_to_action_5':
            rvb_module_call_to_action_5($module, $fields);
            break;
        case 'call_to_action_6':
            rvb_module_call_to_action_6($module, $fields);
            break;
        case 'call_to_action_7':
            rvb_module_call_to_action_7($module, $fields);
            break;
        case 'call_to_action_8':
            rvb_module_call_to_action_8($module, $fields);
            break;
        case 'call_to_action_9':
            rvb_module_call_to_action_9($module, $fields);
            break;
        case 'call_to_action_10':
            rvb_module_call_to_action_10($module, $fields);
            break;
        case 'call_to_action_11':
            rvb_module_call_to_action_11($module, $fields);
            break;
        case 'call_to_action_12':
            rvb_module_call_to_action_12($module, $fields);
            break;
        case 'call_to_action_13':
            rvb_module_call_to_action_13($module, $fields);
            break;
        case 'call_to_action_14':
            rvb_module_call_to_action_14($module, $fields);
            break;
        case 'call_to_action_15':
            rvb_module_call_to_action_15($module, $fields);
            break;
        case 'call_to_action_23':
            rvb_module_call_to_action_23($module, $fields);
            break;
        case 'call_to_action_24':
            rvb_module_call_to_action_24($module, $fields);
            break;
        case 'call_to_action_25':
            rvb_module_call_to_action_25($module, $fields);
            break;
        case 'call_to_action_26':
            rvb_module_call_to_action_26($module, $fields);
            break;
        case 'call_to_action_27':
            rvb_module_call_to_action_27($module, $fields);
            break;
        case 'call_to_action_28':
            rvb_module_call_to_action_28($module, $fields);
            break;
        case 'call_to_action_29':
            rvb_module_call_to_action_29($module, $fields);
            break;
        case 'call_to_action_30':
            rvb_module_call_to_action_30($module, $fields);
            break;
        case 'call_to_action_31':
            rvb_module_call_to_action_31($module, $fields);
            break;
    }
}

/**
 * Module: Call To Action 1
 */
function rvb_module_call_to_action_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 2
 */
function rvb_module_call_to_action_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_heading($module, $fields, 'h5', 'mb-lg-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_html_content($module, $fields, 'mb-lg-0 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3');
    rvb_component_button_group(
        $module,
        $fields,
        'mb-lg-0 mt-4 mt-lg-0 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 3
 *
 */
function rvb_module_call_to_action_3($module, $fields)
{
    if (empty($fields) || empty($fields['ctas'])) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('row-cols-1 row-cols-md-3 g-3 g-lg-5 py-5');
    rvb_component_cards(
        $module,
        $fields['ctas'],
        'mb-4 mb-md-0',
        'shadow-0 bg-transparent gs_reveal',
        'py-0',
        '',
        ''
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 4
 *
 */
function rvb_module_call_to_action_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3');
    rvb_component_heading(
        $module,
        $fields,
        'h4',
        'mb-4 fw-normal gs_reveal',
        '',
        0
    );
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 5
 *
 */
function rvb_module_call_to_action_5($module, $fields)
{
    if (empty($fields) || empty($fields['ctas'])) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('g-0 py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_module_row_open('row-cols-1 row-cols-md-2 g-3 g-lg-10');
    rvb_component_cards(
        $module,
        $fields['ctas'],
        'mb-3 mb-md-0',
        'shadow-0 bg-transparent gs_reveal',
        '',
        'pe-xl-5 pe-xxl-10 pt-0',
        ''
    );
    rvb_module_row_close();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 6
 *
 */
function rvb_module_call_to_action_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-md-center py-5');
    rvb_module_column_open('col-12 col-md-7 col-lg-6 offset-lg-1');
    rvb_component_heading($module, $fields, 'h3', 'mb-3 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-md-5 col-lg-5 text-md-center mt-4 mt-md-0'
    );
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 7
 *
 */
function rvb_module_call_to_action_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'my-4 px-0');
    rvb_module_row_open('align-items-lg-center g-0 py-5 p-lg-0');
    rvb_module_column_open('col-2 col-lg-1 d-lg-flex align-items-lg-center');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        '',
        'my-lg-3',
        'cta-thumb img-cover h-100 w-100',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-10 col-lg-7 mb-4 mb-lg-0 px-4 px-lg-4');
    rvb_component_heading(
        $module,
        $fields,
        'h3',
        'mb-2 mb-lg-0 gs_reveal',
        '',
        0
    );
    rvb_component_sub_heading(
        $module,
        $fields,
        'p',
        'lead fw-normal mb-0 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-4 d-lg-flex align-items-lg-center justify-content-lg-end px-lg-4 mt-3 mt-lg-0'
    );
    rvb_component_button_group($module, $fields, 'px-4 px-lg-3 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 8
 *
 */
function rvb_module_call_to_action_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-md-center py-5');
    rvb_module_column_open('col-12 col-md-6 col-lg-7 col-xl-8');
    rvb_component_heading($module, $fields, 'h4', 'mb-2 gs_reveal', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'mb-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'fs-sm text-muted mt-3 gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-md-6 col-lg-5 col-xl-4 mt-4 mt-lg-0');
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-2 g-3',
        'col my-3',
        'shadow-0 bg-transparent',
        'p-0 pe-2 pe-sm-3',
        'p-0 pe-2 pe-sm-3',
        '',
        '',
        'mb-2',
        'h6 ',
        'small',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 9
 *
 */
function rvb_module_call_to_action_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 offset-lg-6'
            : 'col-12 col-lg-6';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5'
            : 'col-12 col-lg-5 offset-lg-7';

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' mb-4 mb-lg-0 pt-5 py-lg-6');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-2 g-0 border-bottom py-4 mb-4',
        'col',
        'shadow-0 bg-transparent',
        'p-0',
        '',
        '',
        '',
        'mb-2',
        'h6 ',
        'small',
        ''
    );
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class . ' h-100 z-index-1 gs_reveal',
        '',
        0
    );
}

/**
 * Module: Call To Action 10
 *
 */
function rvb_module_call_to_action_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5 order-2 order-lg-1';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1 order-1 order-lg-2';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class . ' pt-5 py-lg-6 py-xl-10');
    rvb_component_tabbed_content($module, $fields, '', '');
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 11
 *
 */
function rvb_module_call_to_action_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_icon_list(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-2 g-0 mb-3',
        'col gs_reveal py-2',
        '',
        '',
        ''
    );
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' mb-4 mb-lg-0');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        'gs_reveal',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 12
 *
 */
function rvb_module_call_to_action_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h2', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' mb-4 mb-lg-0');
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 13
 *
 */
function rvb_module_call_to_action_13($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h3', 'mt-3 mb-5 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' mb-4 mb-lg-0');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 14
 *
 */
function rvb_module_call_to_action_14($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h4', 'mb-0 mt-3 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' mb-4 mb-lg-0');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 15
 *
 */
function rvb_module_call_to_action_15($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center my-5');
    rvb_module_column_open($c1Class . ' pt-4 py-lg-5');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large',
        'w-100 overflow-hidden',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 23
 *
 */
function rvb_module_call_to_action_23($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 text-center pt-5 py-lg-7'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-5 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-md-3 g-4 mt-4',
        'col-12 col-md mt-4 mt-lg-3',
        'flex-nowrap flex-row shadow-0 bg-transparent h-100',
        'p-0 col-auto',
        'py-0 col',
        'pull-left',
        'fa-2x',
        'mb-2',
        'h6',
        'fs-sm',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 24
 *
 */
function rvb_module_call_to_action_24($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 text-center mb-5 gs_reveal px-0 px-lg-3'
    );
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 mb-5 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 25
 *
 */
function rvb_module_call_to_action_25($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-6 offset-lg-3 py-5 py-lg-6 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mt-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 px-0 px-lg-3 gs_reveal'
    );
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large',
        'w-100',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 26
 *
 */
function rvb_module_call_to_action_26($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 27
 *
 */
function rvb_module_call_to_action_27($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5 py-lg-6');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 28
 *
 */
function rvb_module_call_to_action_28($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_heading($module, $fields, 'h3', 'my-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 29
 *
 */
function rvb_module_call_to_action_29($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 30
 *
 */
function rvb_module_call_to_action_30($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mt-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Call To Action 31
 *
 */
function rvb_module_call_to_action_31($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    console_log($fields);

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('row-cols-1 row-cols-sm-2 g-3 g-lg-5');
    rvb_component_cards(
        $module,
        $fields['ctas'],
        'mb-4 mb-md-0 text-center',
        'shadow-0 mx-auto bg-transparent gs_reveal',
        'py-0',
        'pt-3',
        ''
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}
