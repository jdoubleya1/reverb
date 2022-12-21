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

function rvb_module_apps($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'apps_8':
            rvb_module_apps_8($module, $fields);
            break;
    }
}

/**
 * Module: Apps 8
 */
function rvb_module_apps_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $accentTheme = !empty($module['style'])
        ? ($module['style'] == 'dark'
            ? 'bg-light'
            : 'bg-dark')
        : 'bg-dark';

    $theme = !empty($module['style'])
        ? ($module['style'] == 'dark'
            ? 'text-dark'
            : 'text-light')
        : 'text-light';

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 order-2'
            : 'col-12 col-lg-5 col-xl-5 offset-lg-1 offset-xl-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 col-xl-3 order-1 offset-lg-1 offset-xl-2'
            : 'col-12 col-lg-5 col-xl-3';

    echo '<div class="' . $accentTheme . ' bg-accent"></div>';

    rvb_module_container_open($module, 'container');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6 ' . $theme);
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal py-4 pe-lg-5', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' position-relative');
    rvb_component_image($module, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
