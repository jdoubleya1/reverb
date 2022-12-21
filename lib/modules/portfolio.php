<?php

/**
 * Module: Portfolio
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_portfolio($module, $fields, $layout)
{
    if (empty($module) || empty($fields)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'portfolio_1':
            rvb_module_portfolio_1($module, $fields);
            break;
        case 'portfolio_2':
            rvb_module_portfolio_2($module, $fields);
            break;
        case 'portfolio_3':
            rvb_module_portfolio_3($module, $fields);
            break;
        case 'portfolio_4':
            rvb_module_portfolio_4($module, $fields);
            break;
        case 'portfolio_5':
            rvb_module_portfolio_5($module, $fields);
            break;
        case 'portfolio_6':
            rvb_module_portfolio_6($module, $fields);
            break;
        case 'portfolio_7':
            rvb_module_portfolio_7($module, $fields);
            break;
        case 'portfolio_8':
            rvb_module_portfolio_8($module, $fields);
            break;
        case 'portfolio_9':
            rvb_module_portfolio_9($module, $fields);
            break;
        case 'portfolio_10':
            rvb_module_portfolio_10($module, $fields);
            break;
    }
}

/**
 * Module: Portfolio 1
 */
function rvb_module_portfolio_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 2
 */
function rvb_module_portfolio_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 3
 */
function rvb_module_portfolio_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 4
 */
function rvb_module_portfolio_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 5
 */
function rvb_module_portfolio_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 6
 */
function rvb_module_portfolio_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 7
 */
function rvb_module_portfolio_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 8
 */
function rvb_module_portfolio_8($module, $fields)
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
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 9
 */
function rvb_module_portfolio_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_button_group($module, $fields, 'mt-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Portfolio 10
 */
function rvb_module_portfolio_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_portfolio($module, $fields, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
