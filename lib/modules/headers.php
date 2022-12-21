<?php

/**
 * Module: headers
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_headers($options, $layout)
{
    if (empty($layout)) {
        return;
    }

    $breakpoint = isset($options['options_header_show_nav'])
        ? str_replace('navbar-expand-', '', $options['options_header_show_nav'])
        : 'md';

    switch ($layout) {
        case 'header_1':
            rvb_module_header_1($options, $layout, $breakpoint);
            break;
        case 'header_2':
            rvb_module_header_2($options, $layout, $breakpoint);
            break;
        case 'header_3':
            rvb_module_header_3($options, $layout, $breakpoint);
            break;
        case 'header_4':
            rvb_module_header_4($options, $layout, $breakpoint);
            break;
        case 'header_5':
            rvb_module_header_5($options, $layout, $breakpoint);
            break;
        case 'header_6':
            rvb_module_header_6($options, $layout, $breakpoint);
            break;
        case 'header_7':
            rvb_module_header_7($options, $layout, $breakpoint);
            break;
        case 'header_8':
            rvb_module_header_8($options, $layout, $breakpoint);
            break;
    }
}

/**
 * Module headers 1
 */
function rvb_module_header_1($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);
    rvb_component_header_logo($options);
    rvb_component_header_side_nav('');
    echo '<button type="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav">Toggle sidenav</button>';
    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 2
 */
function rvb_module_header_2($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);
    rvb_component_header_logo($options);
    rvb_component_header_buttons($options, 'ms-auto');
    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 3
 */
function rvb_module_header_3($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);
    rvb_component_header_logo($options);
    rvb_component_header_hamburger($options);
    rvb_module_header_collapse_open($breakpoint, '');
    rvb_component_header_nav('ms-auto');
    rvb_component_header_buttons($options, 'ms-lg-4');
    rvb_module_header_collapse_close();
    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 4
 */
function rvb_module_header_4($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);
    rvb_component_header_logo($options);
    rvb_component_header_hamburger($options);
    rvb_module_header_collapse_open($breakpoint, '');
    rvb_component_header_nav('mx-auto');
    rvb_component_header_buttons($options, '');
    rvb_module_header_collapse_close();
    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 5
 */
function rvb_module_header_5($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);
    rvb_component_header_logo($options);
    rvb_component_header_hamburger($options);
    rvb_module_header_collapse_open($breakpoint, '');
    rvb_component_header_nav('mx-auto');
    rvb_component_header_buttons($options, '');
    rvb_module_header_collapse_close();
    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 6
 */
function rvb_module_header_6($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);
    rvb_component_header_logo($options);
    rvb_component_header_hamburger($options);
    rvb_module_header_collapse_open($breakpoint, '');
    rvb_component_header_nav('');
    rvb_component_header_buttons($options, 'ms-lg-auto');
    rvb_module_header_collapse_close();
    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 7
 */
function rvb_module_header_7($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);

    rvb_component_header_logo($options);
    rvb_component_header_nav('me-auto');
    rvb_component_header_search();
    rvb_component_header_hamburger($options);

    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}

/**
 * Module headers 8
 */
function rvb_module_header_8($options, $layout, $breakpoint)
{
    if (empty($options)) {
        return;
    }

    rvb_module_header_open($options);
    rvb_module_header_nav_open($options, $layout);
    rvb_module_header_bg_image($options);
    rvb_module_header_container_open($options);

    rvb_component_header_logo($options);
    rvb_component_header_nav('');
    rvb_component_header_buttons($options, '');
    rvb_component_header_hamburger($options);

    rvb_module_header_container_close();
    rvb_module_header_nav_close();
    rvb_module_header_close();
}
