<?php

/**
 * Module: Headings
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_headings($module, $fields, $layout)
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
        case 'headings_1':
            rvb_module_headings_1($module, $fields);
            break;
    }
}

/**
 * Module Headings 1
 */

function rvb_module_headings_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    switch ($fields['content_align']) {
        case 'left':
            $c1Class = 'col-12 col-lg-8 col-xl-6';
            $c2Class = 'col-12 col-lg-7';
            break;
        case 'center':
            $c1Class =
                'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center';
            $c2Class =
                'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center';
            break;
        case 'right':
            $c1Class =
                'col-12 col-lg-8 offset-lg-4 col-xl-6 offset-xl-6 text-end';
            $c2Class =
                'col-12 col-lg-8 offset-lg-4 col-xl-6 offset-xl-6 text-end';
            break;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h2', 'mb-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_html_content($module, $fields, 'mt-4 fs-lg gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
