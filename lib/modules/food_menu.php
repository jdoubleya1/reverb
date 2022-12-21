<?php

/**
 * Module: Food Menu
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_food_menu($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'food_menu_1':
            rvb_module_food_menu_1($module, $fields);
            break;
        case 'food_menu_2':
            rvb_module_food_menu_2($module, $fields);
            break;
    }
}

/**
 * Module: Food Menu 1
 */
function rvb_module_food_menu_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style = $module['style'] == 'dark' ? 'bg-dark' : 'bg-light';

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 py-5 py-lg-10');
    rvb_component_food_menu(
        $module,
        $fields,
        'grid',
        'align-items-stretch mt-3',
        'col-12 col-lg-4 mb-3',
        '',
        'p-4 p-lg-5 position-relative z-index-2',
        false,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Food Menu 2
 */
function rvb_module_food_menu_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style = $module['style'] == 'dark' ? 'bg-dark' : 'bg-light';

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 py-5 py-lg-10');
    rvb_component_food_menu(
        $module,
        $fields,
        'tabs',
        '',
        '',
        'bg-transparent hover-shadow',
        '',
        true,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
