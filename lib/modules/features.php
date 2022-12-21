<?php

/**
 * Module: Features
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_features($module, $fields, $layout)
{
    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'features_1':
            rvb_module_features_1($module, $fields);
            break;
        case 'features_2':
            rvb_module_features_2($module, $fields);
            break;
        case 'features_3':
            rvb_module_features_3($module, $fields);
            break;
        case 'features_4':
            rvb_module_features_4($module, $fields);
            break;
        case 'features_5':
            rvb_module_features_5($module, $fields);
            break;
        case 'features_6':
            rvb_module_features_6($module, $fields);
            break;
        case 'features_7':
            rvb_module_features_7($module, $fields);
            break;
        case 'features_8':
            rvb_module_features_8($module, $fields);
            break;
        case 'features_9':
            rvb_module_features_9($module, $fields);
            break;
        case 'features_10':
            rvb_module_features_10($module, $fields);
            break;
        case 'features_11':
            rvb_module_features_11($module, $fields);
            break;
        case 'features_12':
            rvb_module_features_12($module, $fields);
            break;
        case 'features_13':
            rvb_module_features_13($module, $fields);
            break;
        case 'features_14':
            rvb_module_features_14($module, $fields);
            break;
        case 'features_15':
            rvb_module_features_15($module, $fields);
            break;
        case 'features_16':
            rvb_module_features_16($module, $fields);
            break;
        case 'features_17':
            rvb_module_features_17($module, $fields);
            break;
    }
}

/**
 * Module Features 1
 */
function rvb_module_features_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_icon($module, $fields, '', 'fa-4x', 0);
    rvb_component_heading($module, $fields, 'h4', 'my-4', '', 0);
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 2
 */
function rvb_module_features_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_heading($module, $fields, 'h2', 'gs_reveal', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'fs-lg mt-4 mb-5 gs_reveal',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2');
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-1 row-cols-md-2 row-cols-lg-4',
        $itemClass = 'col text-center gs_reveal',
        $cardClass = '',
        $cardHeaderClass = 'pt-4 pb-0 px-4',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = 'font-weight-bold mb-0',
        $headingType = 'h6',
        $excerptClass = '',
        $linkClass = ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 3
 */
function rvb_module_features_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-md-3',
        $itemClass = 'col p-4 px-xl-5 text-center gs_reveal',
        $cardClass = 'shadow-0',
        $cardHeaderClass = 'pt-4 pb-0 px-4',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = '',
        $headingType = 'h5',
        $excerptClass = '',
        $linkClass = 'mt-4 d-block'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 4
 */
function rvb_module_features_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-sm-2 row-cols-md-4',
        $itemClass = 'col text-center gs_reveal',
        $cardClass = 'h-100',
        $cardHeaderClass = 'pt-4 pb-0 px-4',
        $cardBodyClass = '',
        $iconClass = 'mb-3',
        $iconSize = 'fa-4x',
        $headingClass = 'fw-bold mb-3',
        $headingType = 'h6',
        $excerptClass = 'lh-sm mb-4 mb-lg-0',
        $linkClass = 'mt-4 d-block'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 5
 */
function rvb_module_features_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-3',
        $itemClass = 'col text-center gs_reveal',
        $cardClass = 'h-100',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = 'mt-2',
        $iconSize = 'fa-4x',
        $headingClass = 'h6',
        $headingType = 'h3',
        $excerptClass = 'm-0',
        $linkClass = ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 6
 */
function rvb_module_features_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-sm-2 g-0',
        $itemClass = 'col',
        $cardClass = 'h-100 d-flex flex-row',
        $cardHeaderClass = '',
        $cardBodyClass = 'text-start',
        $iconClass = 'text-start',
        $iconSize = 'fa-4x me-auto',
        $headingClass = 'mt-2 mb-3',
        $headingType = 'h5',
        $excerptClass = 'mb-3',
        $linkClass = 'fw-bold'
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 7
 */
function rvb_module_features_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-sm-2 g-0',
        $itemClass = 'col',
        $cardClass = 'h-100',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = 'mt-1 mb-3',
        $headingType = 'h5',
        $excerptClass = 'mb-3',
        $linkClass = 'fw-bold'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 8
 */
function rvb_module_features_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-1 row-cols-md-3 g-3',
        $itemClass = 'col',
        $cardClass = 'h-100',
        $cardHeaderClass = 'pb-0',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x me-4',
        $headingClass = 'mb-3',
        $headingType = 'h6',
        $excerptClass = '',
        $linkClass = 'fw-bold d-block mt-4'
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 9
 */
function rvb_module_features_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3',
        $itemClass = 'col',
        $cardClass = 'h-100',
        $cardHeaderClass = 'pb-0',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = 'mb-3',
        $headingType = 'h6',
        $excerptClass = 'mb-3',
        $linkClass = ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 10
 */
function rvb_module_features_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100 d-flex flex-row',
        $cardHeaderClass = 'p-0',
        $cardBodyClass = 'p-0 d-flex align-items-center',
        $iconClass = '',
        $iconSize = 'fa-2x me-3',
        $headingClass = '',
        $headingType = '',
        $excerptClass = '',
        $linkClass = 'fs-lg'
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 11
 */
function rvb_module_features_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-col-sm-2 row-cols-lg-4',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100 text-center',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = 'mb-0',
        $headingType = 'h4',
        $excerptClass = 'mx-4 mb-4',
        $linkClass = ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 12
 */
function rvb_module_features_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-sm-2 g-1',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100 p-3 py-5 py-lg-6 px-md-5 px-xl-10 text-center',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-3x',
        $headingClass = '',
        $headingType = 'h5',
        $excerptClass = 'mb-0',
        $linkClass = ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Features 13
 */
function rvb_module_features_13($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style =
        !empty($module['style']) && $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-light text-dark';

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('row-cols-md-2 g-4');
    rvb_module_column_open('col-12 col-lg');
    rvb_component_unordered_list(
        $module,
        $fields['list_1_group']['list_1'],
        $style . ' p-3 p-lg-6 h-100 mb-0',
        'mt-4',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg');
    rvb_component_unordered_list(
        $module,
        $fields['list_2_group']['list_2'],
        $style . ' p-3 p-lg-6 h-100 mb-0',
        'mt-4',
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
 * Module Features 14
 */
function rvb_module_features_14($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2');
    rvb_component_heading($module, $fields, 'h4', 'mb-5 gs_reveal', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-1 row-cols-md-3',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100',
        $cardHeaderClass = 'px-0',
        $cardBodyClass = 'px-0',
        $iconClass = '',
        $iconSize = 'fa-3x',
        $headingClass = '',
        $headingType = 'h6',
        $excerptClass = '',
        $linkClass = ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 15
 */
function rvb_module_features_15($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 text-center', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-2 g-4',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100 d-flex flex-row',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = '',
        $headingType = 'h6',
        $excerptClass = '',
        $linkClass = ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 16
 */
function rvb_module_features_16($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_heading($module, $fields, 'h4', 'mb-5 gs_reveal', '', 0);
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-2 g-4',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100 d-flex flex-row',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = '',
        $headingType = 'h6',
        $excerptClass = '',
        $linkClass = ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features 17
 */
function rvb_module_features_17($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-1');
    rvb_component_features(
        $module,
        $fields,
        $class = 'row row-cols-2 g-4',
        $itemClass = 'col gs_reveal',
        $cardClass = 'h-100 d-flex flex-row',
        $cardHeaderClass = '',
        $cardBodyClass = '',
        $iconClass = '',
        $iconSize = 'fa-4x',
        $headingClass = '',
        $headingType = 'h6',
        $excerptClass = '',
        $linkClass = ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
