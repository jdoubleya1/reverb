<?php

/**
 * Module: Services
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_services($module)
{
    if (empty($module['acf_fc_layout'])) {
        return;
    }

    // Module Layout
    $layout = $module['acf_fc_layout'];
    $layout = !empty(
        $layout && $module[$layout . '_layout'][0]['acf_fc_layout']
    )
        ? $module[$layout . '_layout'][0]['acf_fc_layout']
        : false;
    $fields = !empty($module['services_layout'])
        ? $module['services_layout'][0]
        : false;

    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'services_1':
            rvb_module_services_1($module, $fields);
            break;
        case 'services_2':
            rvb_module_services_2($module, $fields);
            break;
        case 'services_3':
            rvb_module_services_3($module, $fields);
            break;
        case 'services_5':
            rvb_module_services_5($module, $fields);
            break;
        case 'services_6':
            rvb_module_services_6($module, $fields);
            break;
    }
}

/**
 * Module Services 1
 */
function rvb_module_services_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h3', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_html_content($module, $fields, 'text-center', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_services(
        $module,
        $fields,
        $container_class = 'row row-cols-1 row-cols-md-3 g-4 mt-4',
        $item_class = 'col text-center gs_reveal',
        $card_class = 'h-100',
        $card_header_class = 'p-0',
        $card_body_class = 'p-4 px-lg-5',
        $image_class = 'card-img-top',
        $image_size = 'medium',
        $heading_class = '',
        $heading_type = 'h5',
        $execerpt_class = 'fs-sm',
        $link_class = ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Services 2
 */
function rvb_module_services_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-0', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_services(
        $module,
        $fields,
        $container_class = 'row row-cols-md-3 g-4 mt-5',
        $item_class = 'col text-center gs_reveal',
        $card_class = 'h-100',
        $card_header_class = '',
        $card_body_class =
            'card-img-overlay d-flex align-items-center justify-content-center flex-column p-4 p-xl-5',
        $image_class = 'bg-image',
        $image_size = 'large',
        $heading_class = 'pb-4',
        $heading_type = 'h5',
        $execerpt_class = '',
        $link_class = 'mt-6'
    );
    rvb_module_container_close($module);
}

/**
 * Module Services 3
 */
function rvb_module_services_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_services(
        $module,
        $fields,
        'row row-cols-md-3 g-4',
        'col text-center gs_reveal',
        'bg-dark text-light',
        '',
        'card-img-overlay d-flex justify-content-end flex-column px-4 px-xl-5',
        'card-img',
        'small-square',
        '',
        'h5',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Services 5
 */
function rvb_module_services_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_services(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-2 g-4',
        'col text-start gs_reveal',
        'bg-transparent shadow-0',
        'p-0',
        'px-0 pt-3 pb-0',
        'card-img-top',
        'medium',
        '',
        'h6',
        '',
        ''
    );
    rvb_module_container_close($module);
}

/**
 * Module Services 6
 */
function rvb_module_services_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_services(
        $module,
        $fields,
        'row row-cols-sm-2 g-4',
        'col text-center gs_reveal',
        '',
        'p-0',
        'p-4 px-lg-5 px-xl-7',
        'card-img-top',
        'medium',
        '',
        'h5',
        '',
        ''
    );
    rvb_module_row_open('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_button_group($module, $fields, 'mt-5', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
