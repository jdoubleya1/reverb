<?php

/**
 * Module: Features With Photo
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_features_with_photo($module, $fields, $layout)
{
    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'features_with_photo_1':
            rvb_module_features_with_photo_1($module, $fields);
            break;
        case 'features_with_photo_2':
            rvb_module_features_with_photo_2($module, $fields);
            break;
        case 'features_with_photo_3':
            rvb_module_features_with_photo_3($module, $fields);
            break;
        case 'features_with_photo_4':
            rvb_module_features_with_photo_4($module, $fields);
            break;
        case 'features_with_photo_5':
            rvb_module_features_with_photo_5($module, $fields);
            break;
        case 'features_with_photo_6':
            rvb_module_features_with_photo_6($module, $fields);
            break;
        case 'features_with_photo_8':
            rvb_module_features_with_photo_8($module, $fields);
            break;
        case 'features_with_photo_9':
            rvb_module_features_with_photo_9($module, $fields);
            break;
        case 'features_with_photo_10':
            rvb_module_features_with_photo_10($module, $fields);
            break;
        case 'features_with_photo_11':
            rvb_module_features_with_photo_11($module, $fields);
            break;
    }
}

/**
 * Module Features With Photo 1
 */
function rvb_module_features_with_photo_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center pb-4');
    rvb_component_html_content($module, $fields, 'mt-2 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_component_features(
        $module,
        $fields,
        'row justify-content-lg-between',
        'col-12 col-md',
        'bg-transparent shadow-0 mt-4 d-flex flex-row',
        'p-0 me-3',
        'ps-0 pt-1 pe-lg-4',
        'bg-transparent',
        'fa-3x',
        '',
        'h6',
        'pe-lg-5',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 3
 */
function rvb_module_features_with_photo_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-4 offset-lg-7'
            : 'col-12 col-lg-4 offset-lg-1';
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
    rvb_module_row_open('align-items-lg-center rvb-row');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row mt-4',
        'col-12 mb-3',
        'bg-transparent shadow-0 d-flex align-items-center flex-row',
        'p-0 me-3',
        'p-0 pe-lg-4',
        'bg-transparent',
        'fa-lg',
        'm-0',
        'p',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 4
 */
function rvb_module_features_with_photo_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 order-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-2 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' pt-5 py-lg-5');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-3 g-0',
        'col ps-0 pe-3',
        'bg-transparent shadow-0 mt-4 d-flex flex-row flex-sm-column align-items-center align-items-sm-start justify-content-sm-start',
        'p-0',
        'px-0',
        'bg-transparent',
        'fa-3x',
        'm-0 ps-3 ps-sm-0',
        'p',
        'm-0 lh-sm',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 5
 */
function rvb_module_features_with_photo_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-xl-1 order-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 col-xl-5 offset-xl-1'
            : 'col-12 col-lg-6 col-xl-5 order-2 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' pt-5 py-lg-5');
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h2', 'pb-4 mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'pb-4 gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-1 row-cols-md-2 g-4',
        'col mt-4',
        'bg-transparent shadow-0 d-flex flex-row gs_reveal',
        'p-0',
        'p-0 ps-3',
        'bg-transparent',
        'fa-2x fa-fw',
        '',
        'h6',
        'lh-sm',
        'btn btn-link'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 6
 */
function rvb_module_features_with_photo_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 order-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-2 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class);
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-2',
        'col',
        'bg-transparent shadow-0 d-flex flex-row mt-4',
        'p-0',
        'pt-0 pe-0 pb-0',
        'bg-transparent',
        'fa-3x fa-fw',
        '',
        'h6',
        'fs-sm',
        'btn btn-link'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 8
 */
function rvb_module_features_with_photo_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-1 order-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1'
            : 'col-12 col-lg-5 order-2 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' pt-5 py-lg-5');
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large-square',
        '',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-2 g-0',
        'col',
        'bg-transparent shadow-0 mt-4',
        'p-0 mb-3',
        'p-0 pe-4',
        'bg-transparent',
        'fa-2x',
        'mb-2',
        'h6',
        'fs-sm',
        'btn btn-link'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 9
 */
function rvb_module_features_with_photo_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-7'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6'
            : 'col-12 col-lg-6 offset-lg-6 text-end';

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
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' py-5 py-lg-6 py-xl-10');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_features(
        $module,
        $fields,
        'row',
        'col-12',
        'bg-transparent shadow-0 mt-4 d-flex flex-row',
        'p-0 me-3',
        'ps-0 pe-lg-4 pt-0',
        'bg-transparent',
        'fa-2x',
        'mb-3',
        'h6',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 10
 */
function rvb_module_features_with_photo_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-8'
            : 'col-12 col-lg-8 offset-lg-1 order-1 order-lg-2';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-3 offset-lg-1'
            : 'col-12 col-lg-3 order-2 order-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open($c1Class . ' pt-5 py-lg-5');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open($c2Class . ' pt-4 pb-5 py-lg-5 py-xl-6');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_features(
        $module,
        $fields,
        'row',
        'col-12',
        'bg-transparent shadow-0 mt-4',
        'p-0',
        'p-0',
        'bg-transparent',
        'fa-3x mb-4',
        'mb-3',
        'h6',
        'fs-sm',
        'btn btn-link'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Features With Photo 11
 */
function rvb_module_features_with_photo_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $id = $module['unique_id'];
    $features = $fields['features'];
    $tabs = [];
    $content = [];

    for ($i = 0; $i < count($features); $i++) {
        $style = [
            'nav-link bg-transparent fs-sm py-4 ps-0 d-flex align-items-center text-start',
        ];
        $style[] = $module['style'] == 'dark' ? 'text-light' : 'text-dark';
        $style[] = $i == 0 ? ' active' : '';

        $tabs[] = '<li class="nav-item" role="presentation">';
        $tabs[] =
            '<button class="' .
            join(' ', $style) .
            '" id="tab-' .
            $id .
            '-' .
            $i .
            '" data-mdb-toggle="tab" data-mdb-target="#content-' .
            $id .
            '-' .
            $i .
            '" type="button" role="tab" aria-controls="content-' .
            $id .
            '-' .
            $i .
            '" aria-selected="' .
            ($i == 0 ? 'true' : 'false') .
            '">';
        $tabs[] = !empty($features[$i]['icon'])
            ? '<span class="fa-stack fa-2x me-2"><i class="fas fa-circle fa-stack-2x text-dark"></i><i class="' .
                $features[$i]['icon'] .
                ' fa-stack-1x fa-inverse"></i></span>'
            : '';
        $tabs[] = $features[$i]['feature'];
        $tabs[] = '</button>';
        $tabs[] = '</li>';

        $content[] =
            '<div class="tab-pane fade' .
            ($i == 0 ? ' show active' : '') .
            '" id="content-' .
            $id .
            '-' .
            $i .
            '" role="tabpanel" aria-labelledby="tab-' .
            $id .
            '-' .
            $i .
            '">';
        $content[] = '<div class="row mt-5 align-items-stretch">';
        $content[] = !empty($features[$i]['icon_image'])
            ? '<div class="col-12 col-lg-6">' .
                wp_get_attachment_image(
                    $features[$i]['icon_image'],
                    'large',
                    '',
                    ['class' => 'img-cover w-100 h-100']
                ) .
                '</div>'
            : '';
        $content[] = !empty($features[$i]['icon_image'])
            ? '<div class="col-12 col-lg-5 offset-lg-1 py-4">'
            : '<div class="col-12">';
        $content[] = !empty($features[$i]['feature'])
            ? '<h3>' . $features[$i]['feature'] . '</h3>'
            : '';
        $content[] = !empty($features[$i]['html_content'])
            ? '<p class="py-4 mb-0">' . $features[$i]['html_content'] . '</p>'
            : '';
        $content[] = !empty($features[$i]['link'])
            ? '<p class="mb-0"><a href="' .
                $features[$i]['link']['url'] .
                '" class="btn btn-primary btn-lg"' .
                (isset($features[$i]['link']['target'])
                    ? ' target="_blank" rel="noopener noreferrer"'
                    : '') .
                '>' .
                $features[$i]['link']['title'] .
                '<i class="fal fa-lg fa-angle-right ms-2"></i></a></p>'
            : '';
        $content[] = '</div>'; // end col
        $content[] = '</div>'; // end row
        $content[] = '</div>'; //end tab pane
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-4', 0);
    echo '<ul class="nav nav-tabs nav-justified mb-3 border-bottom" id="tabs-' .
        $id .
        '" role="tablist">' .
        join('', $tabs) .
        '</ul>';
    echo '<div class="tab-content" id="tab-content-' .
        $id .
        '">' .
        join('', $content) .
        '</div>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
