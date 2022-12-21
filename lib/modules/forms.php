<?php

/**
 * Module: Forms
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_forms($module, $fields, $layout, $options)
{
    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;

        case 'forms_1':
            rvb_module_forms_1($module, $fields);
            break;
        case 'forms_2':
            rvb_module_forms_2($module, $fields);
            break;
        case 'forms_3':
            rvb_module_forms_3($module, $fields);
            break;
        case 'forms_4':
            rvb_module_forms_4($module, $fields, $options);
            break;
        case 'forms_5':
            rvb_module_forms_5($module, $fields);
            break;
        case 'forms_6':
            rvb_module_forms_6($module, $fields);
            break;
        case 'forms_7':
            rvb_module_forms_7($module, $fields);
            break;
        case 'forms_8':
            rvb_module_forms_8($module, $fields);
            break;
        case 'forms_9':
            rvb_module_forms_9($module, $fields);
            break;
        case 'forms_10':
            rvb_module_forms_10($module, $fields);
            break;
        case 'forms_11':
            rvb_module_forms_11($module, $fields);
            break;
        case 'forms_12':
            rvb_module_forms_12($module, $fields);
            break;
        case 'forms_13':
            rvb_module_forms_13($module, $fields);
            break;
        case 'forms_14':
            rvb_module_forms_14($module, $fields);
            break;
        case 'forms_15':
            rvb_module_forms_15($module, $fields);
            break;
        case 'forms_16':
            rvb_module_forms_16($module, $fields);
            break;
        case 'forms_17':
            rvb_module_forms_17($module, $fields);
            break;
        case 'forms_24':
            rvb_module_forms_24($module, $fields);
            break;
        case 'forms_25':
            rvb_module_forms_25($module, $fields);
            break;
        case 'forms_26':
            rvb_module_forms_26($module, $fields);
            break;
        case 'forms_27':
            rvb_module_forms_27($module, $fields);
            break;
        case 'forms_28':
            rvb_module_forms_28($module, $fields);
            break;
        case 'forms_29':
            rvb_module_forms_29($module, $fields);
            break;
        case 'forms_30':
            rvb_module_forms_30($module, $fields);
            break;
        case 'forms_31':
            rvb_module_forms_31($module, $fields);
            break;
    }
}

function rvb_module_forms_1($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-white text-dark'
            : 'bg-black text-light')
        : '';

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-4 col-xl-auto d-flex align-items-center col-left ' .
            $theme
    );
    rvb_module_form_container_open('d-block px-sm-4 py-5 py-lg-10');
    rvb_component_form($module, $fields, '');
    rvb_module_form_container_close();
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 col-xl text-center pt-5 pt-lg-10 d-flex justify-content-end flex-column col-right'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'mb-4 px-md-0 col-md-8 offset-md-2 col-xl-6 offset-xl-3 gs_reveal',
        0
    );
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large',
        'mt-6 col-12 col-lg-10 offset-lg-1',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_2($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-white text-dark'
            : 'bg-black text-light')
        : '';

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-7 py-5 py-lg-10 px-sm-4 px-xl-5');
    rvb_component_heading($module, $fields, 'h1', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content(
        $module,
        $fields,
        'col-12 col-lg-7 px-0 gs_reveal',
        0
    );
    rvb_component_button_group($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-4 offset-lg-1 d-flex align-items-lg-center position-relative ' .
            $theme
    );
    echo '<div class="accent-bg ' . $theme . '"></div>';
    rvb_module_form_container_open('d-block px-sm-4 py-5 py-lg-10');
    rvb_component_form($module, $fields, '');
    rvb_module_form_container_close();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_3($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5 align-items-stretch');
    rvb_module_column_open(
        'col-12 col-lg-2 offset-lg-1 py-3 d-flex align-items-center ' . $theme
    );
    rvb_component_image($module, $fields['block_image'], 'medium', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-4 p-4 d-flex justify-content-center align-items-start flex-column ' .
            $theme
    );
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-0 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-4 px-lg-5 d-flex align-items-center ' . $theme
    );
    rvb_component_form($module, $fields, 'w-100');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_4($module, $fields, $options)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-4');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_form($module, $fields, 'gs_reveal');
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 offset-lg-5 d-flex');
    echo '<p class="gs_reveal mb-0">Share</p>';
    rvb_component_social_icons($options, 'row g-0', 'col-auto', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_5($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open(' py-5');
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading($module, $fields, 'h4', 'mb-2 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 offset-lg-3');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_6($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading($module, $fields, 'h4', 'mb-2 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 offset-lg-3');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_7($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-4');
    rvb_module_column_open('col-12 col-lg-4 d-flex align-items-center');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-2');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_8($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading(
        $module,
        $fields,
        'h4',
        'mb-3 mb-lg-0 gs_reveal',
        '',
        0
    );
    rvb_component_html_content($module, $fields, 'fs-lg gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-5 offset-lg-2 d-flex align-items-center mt-3 mt-lg-0'
    );
    rvb_component_form($module, $fields, 'w-100');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_9($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-4');
    rvb_module_column_open('col-12 col-lg-6 d-flex justify-content-start');
    rvb_component_icon($module, $fields, 'gs_reveal', 'fa-2x', 0);
    echo '<div class="ps-3">';
    rvb_component_heading($module, $fields, 'h5', 'mb-2 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'fs-sm lh-sm gs_reveal', 0);
    echo '</div>';
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 offset-lg-2');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_10($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-4');
    rvb_module_column_open('col-12 col-lg-5 d-flex align-items-center');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-7');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_11($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-4');
    rvb_module_column_open('col-12 col-lg-4 d-flex align-items-center');
    rvb_component_heading($module, $fields, 'h5', 'mb-0 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5 d-flex align-items-center');
    rvb_component_form($module, $fields, 'w-100');
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-3 d-flex align-items-center justify-content-lg-end'
    );
    rvb_component_button_group($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_12($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';
    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-4 offset-lg-2 order-2'
            : 'col-12 col-lg-4';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-2';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h2', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_13($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';
    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 col-xl-4 offset-lg-7 offset-xl-8'
            : 'col-12 col-lg-5 col-xl-4';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-6';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        $c2Class,
        '',
        0
    );
    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class . ' py-lg-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_form($module, $fields, '');
    rvb_component_html_content($module, $fields, 'mt-4 fs-xs gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_14($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';
    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-1'
            : 'col-12 col-lg-6 offset-lg-1 d-flex align-items-lg-end';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center pt-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_form($module, $fields, '');
    rvb_component_html_content($module, $fields, 'mt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_15($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-light text-dark'
            : 'bg-black text-light')
        : 'bg-light text-dark';
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
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_16($module, $fields)
{
    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 col-xl-5 offset-xl-1 order-2'
            : 'col-12 col-lg-6 col-xl-5 offset-xl-1';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 col-xl-4 order-1'
            : 'col-12 col-lg-5 offset-lg-1 col-xl-4';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' my-5 my-lg-10');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_module_form_container_open(
        'd-block bg-white text-dark shadow-3 p-4 p-xl-5 my-5 rounded text-center gs_reveal'
    );
    rvb_component_form($module, $fields, '');
    rvb_module_form_container_close();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_17($module, $fields)
{
    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-2'
            : 'col-12 col-lg-5 offset-lg-1';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 col-xl-4 offset-lg-1 order-1'
            : 'col-12 col-lg-5 col-xl-4 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' my-5 my-lg-10');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_button($module, $fields, 'gs_reveal');
    rvb_module_column_close();
    rvb_module_column_open($c2Class);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_24($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('pt-5 pt-lg-6');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 text-center px-xl-6'
    );
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open('col-12 mt-5 mt-lg-6');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        '',
        '',
        'img-cover w-100 h-100',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_25($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_26($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h2', 'mb-2 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2');
    rvb_component_form($module, $fields, 'mt-4 mt-lg-0');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_27($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-4 offset-xl-4 text-center'
    );
    rvb_component_form($module, $fields, 'mb-4');
    rvb_component_html_content($module, $fields, 'fs-xs', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_28($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-4 offset-xl-4 text-center'
    );
    rvb_component_form($module, $fields, 'mb-4');
    rvb_component_html_content($module, $fields, 'fs-xs gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_29($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center'
    );
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_30($module, $fields)
{
    $theme = !empty($module['style'])
        ? ($module['style'] == 'light'
            ? 'bg-white text-dark'
            : 'bg-black text-light')
        : '';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-6 offset-lg-3 shadow-3 p-md-4 p-lg-5 text-center ' .
            $theme
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-3 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4', 0);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

function rvb_module_forms_31($module, $fields)
{
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
