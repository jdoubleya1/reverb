<?php

/**
 * Module: Grid
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_grid($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'grid_1':
            rvb_module_grid_1($module, $fields);
            break;
        case 'grid_2':
            rvb_module_grid_2($module, $fields);
            break;
        case 'grid_3':
            rvb_module_grid_3($module, $fields);
            break;
        case 'grid_5':
            rvb_module_grid_5($module, $fields);
            break;
        case 'grid_6':
            rvb_module_grid_6($module, $fields);
            break;
        case 'grid_7':
            rvb_module_grid_7($module, $fields);
            break;
        case 'grid_8':
            rvb_module_grid_8($module, $fields);
            break;
        case 'grid_9':
            rvb_module_grid_9($module, $fields);
            break;
    }
}

/**
 * Module: Grid 1
 */
function rvb_module_grid_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open(
        'row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 g-lg-4 grid-' .
            $module['unique_id']
    );
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col',
        $card_class =
            'bg-transparent border-0 shadow-0 h-100 hover-shadow text-center',
        $card_body_class = 'lh-sm px-0',
        $card_title_type = 'h6',
        $card_title_class = 'mb-2',
        $tagline_class = 'mb-2',
        $excerpt_class = '',
        $excerpt_length = 60,
        $imf_container_class = 'w-100',
        $img_class = '',
        $img_size = 'medium',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Grid 2
 */
function rvb_module_grid_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('row-cols-1 row-cols-sm-2 row-cols-lg-4');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col',
        $card_class = 'bg-transparent border-0 shadow-0 h-100',
        $card_body_class = 'lh-sm px-0 d-flex flex-column',
        $card_title_type = 'p',
        $card_title_class = 'fw-bold mb-2',
        $tagline_class = 'mt-2 order-3',
        $excerpt_class = '',
        $excerpt_length = 60,
        $imf_container_class = 'w-100',
        $img_class = 'w-100',
        $img_size = 'grid-1-thumb',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Grid 3
 */
function rvb_module_grid_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('row-cols-1 row-cols-sm-2 row-cols-lg-4');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col',
        $card_class = 'border h-100',
        $card_body_class = 'lh-sm',
        $card_title_type = 'h6',
        $card_title_class = 'mb-2',
        $tagline_class = 'mb-2',
        $excerpt_class = '',
        $excerpt_length = 60,
        $imf_container_class = 'w-100',
        $img_class = '',
        $img_size = 'medium',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_row_open('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_button_group($module, $fields, 'mt-5', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Grid 5
 */
function rvb_module_grid_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('row-cols-1 row-cols-lg-3');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col mb-3',
        $card_class = 'bg-transparent border-0 shadow-0 h-100',
        $card_body_class = 'px-0',
        $card_title_type = 'h6',
        $card_title_class = 'mb-2',
        $tagline_class = 'mb-2',
        $excerpt_class = '',
        $excerpt_length = 110,
        $imf_container_class = 'w-100',
        $img_class = 'w-100',
        $img_size = 'grid-5-thumb',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Grid 6
 */
function rvb_module_grid_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('row-cols-1 row-cols-lg-3');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col',
        $card_class = 'bg-transparent border-0 shadow-0 h-100 mb-3',
        $card_body_class = 'px-0',
        $card_title_type = 'h6',
        $card_title_class = 'mb-0',
        $tagline_class = 'd-none',
        $excerpt_class = '',
        $excerpt_length = 60,
        $imf_container_class = 'w-100',
        $img_class = 'w-100',
        $img_size = 'grid-5-thumb',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Grid 7
 */
function rvb_module_grid_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('justify-content-lg-center');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col-12 col-sm-6 col-lg-4',
        $card_class = 'bg-transparent border-0 shadow-0 h-100 text-center',
        $card_body_class = 'lh-sm',
        $card_title_type = 'h6',
        $card_title_class = 'mb-2',
        $tagline_class = 'd-none',
        $excerpt_class = '',
        $excerpt_length = 100,
        $imf_container_class = 'w-100',
        $img_class = 'w-100',
        $img_size = 'grid-5-thumb',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Grid 8
 */
function rvb_module_grid_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close('');
    rvb_module_row_open('row-cols-1 row-cols-sm-2 g-4');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col',
        $card_class = 'bg-transparent border-0 shadow-0 h-100',
        $card_body_class = 'px-0 fs-xs mt-2',
        $card_title_type = 'p',
        $card_title_class = 'fw-bold fs-lg lh-sm mb-0',
        $tagline_class = 'mb-2',
        $excerpt_class = '',
        $excerpt_length = 100,
        $imf_container_class = 'w-100',
        $img_class = 'w-100',
        $img_size = 'grid-8-thumb',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/**
 * Module: Grid 9
 */
function rvb_module_grid_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style =
        !empty($module['style']) && $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-white text-dark';

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('row-cols-1 row-cols-sm-2 g-4');
    rvb_component_grid(
        $module,
        $fields,
        $column_class = 'col',
        $card_class = 'bg-transparent border-0 shadow-0 h-100 ' . $style,
        $card_body_class =
            'card-img-overlay p-4 d-flex flex-column justify-content-center text-light',
        $card_title_type = 'h4',
        $card_title_class = 'mb-0',
        $tagline_class = 'd-none',
        $excerpt_class = 'ps-4 mt-2',
        $excerpt_length = 100,
        $imf_container_class = 'w-100',
        $img_class = 'w-100',
        $img_size = 'grid-9-thumb',
        $link_class = '',
        $return = 0
    );
    rvb_module_row_close();
    rvb_module_container_close($module);
}
