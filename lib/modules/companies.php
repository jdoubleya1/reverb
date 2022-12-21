<?php

/**
 * Module: Companies
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_companies($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'companies_2':
            rvb_module_companies_2($module, $fields);
            break;
        case 'companies_3':
            rvb_module_companies_3($module, $fields);
            break;
        case 'companies_4':
            rvb_module_companies_4($module, $fields);
            break;
        case 'companies_5':
            rvb_module_companies_5($module, $fields);
            break;
        case 'companies_6':
            rvb_module_companies_6($module, $fields);
            break;
        case 'companies_7':
            rvb_module_companies_7($module, $fields);
            break;
        case 'companies_8':
            rvb_module_companies_8($module, $fields);
            break;
        case 'companies_9':
            rvb_module_companies_9($module, $fields);
            break;
        case 'companies_10':
            rvb_module_companies_10($module, $fields);
            break;
        case 'companies_11':
            rvb_module_companies_11($module, $fields);
            break;
        case 'companies_12':
            rvb_module_companies_12($module, $fields);
            break;
        case 'companies_13':
            rvb_module_companies_13($module, $fields);
            break;
        case 'companies_19':
            rvb_module_companies_19($module, $fields);
            break;
        case 'companies_20':
            rvb_module_companies_20($module, $fields);
            break;
        case 'companies_21':
            rvb_module_companies_21($module, $fields);
            break;
        case 'companies_22':
            rvb_module_companies_22($module, $fields);
            break;
        // case 'companies_23':
        //     rvb_module_companies_23($module, $fields);
        //     break;
    }
}

/**
 * Module Companies 2
 */
function rvb_module_companies_2($module, $fields)
{
    if (empty($fields['companies'])) {
        return;
    }

    $slides = [];

    foreach ($fields['companies'] as $company):
        $slides[] = '<div class="swiper-slide border p-4">';
        $slides[] =
            '<div class="d-flex align-items-center justify-content-between w-100">';
        $slides[] = !empty($company['logo'])
            ? '<img src="' .
                wp_get_attachment_image_url($company['logo']) .
                '" class="img-fluid" />'
            : '';
        $slides[] = isset($company['link'])
            ? '<a href="' .
                $company['link']['url'] .
                '" class="fw-bold"' .
                (!empty($company['link']['target']) ? ' target="_blank"' : '') .
                '>' .
                $company['link']['title'] .
                '</a>'
            : '';
        $slides[] = '</div>';
        $slides[] = !empty($company['html_content'])
            ? '<div class="clearfix pt-4 pb-1">' .
                $company['html_content'] .
                '</div>'
            : '';
        $slides[] = !empty($company['name'])
            ? '<p class="small text-uppercase font-weight-bolder m-0">' .
                $company['name'] .
                '</p>'
            : '';
        $slides[] = !empty($company['position'])
            ? '<p class="text-muted small m-0">' . $company['position'] . '</p>'
            : '';
        $slides[] = '</div>';
    endforeach;

    $options = [
        'direction' => 'horizontal',
        'loop' => true,
        'speed' => 1000,
        'spaceBetween' => 15,
        'slidesPerView' => 1,
        'autoplay' => false,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'pagination' => [
            'el' => '.swiper-pagination',
        ],
        'breakpoints' => [
            992 => [
                'spaceBetween' => 30,
                'slidesPerView' => 2,
            ],
        ],
    ];

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_heading(
        $module,
        $fields,
        'h2',
        'd-block text-center mb-5 gs_reveal',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new pb-5',
        'd-flex align-items-stretch',
        1,
        0,
        1,
        1,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 3
 */
function rvb_module_companies_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_heading($module, $fields, 'h2', 'gs_reveal', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'mb-4 gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 pt-5 pb-2');
    rvb_module_row_open(
        'row row-cols-3 row-cols-lg-auto justify-content-center g-4'
    );
    rvb_component_logos($module, $fields, '', 'col', '', 0);
    rvb_module_row_close();
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 4
 */
function rvb_module_companies_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('justify-content-between g-4');
    rvb_component_logos($module, $fields, '', 'col-6 col-sm', '', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 5
 */
function rvb_module_companies_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('mb-5');
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_heading($module, $fields, 'h2', 'gs_reveal', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-5 col-xl-4 offset-lg-1');
    rvb_component_html_content($module, $fields, 'mt-lg-4 gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_row_open('row-cols-2 row-cols-lg-5 g-5');
    rvb_component_logos($module, $fields, '', 'col', '', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 6
 */
function rvb_module_companies_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }
    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('mb-5');
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading($module, $fields, 'h3', 'mb-0 gs_reaveal', '', 0);
    rvb_component_html_content($module, $fields, 'pt-4 gs_reaveal', 0);
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_row_open('row-cols-2 row-cols-sm-3 row-cols-lg-5 g-5');
    rvb_component_logos($module, $fields, '', 'col-6 col-sm', '', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 7
 */
function rvb_module_companies_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }
    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open('col-12 col-lg-4 offset-lg-1');
    rvb_component_html_content($module, $fields, 'pb-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-1');
    rvb_module_row_open('row-cols-2 row-cols-sm-3 g-5');
    rvb_component_logos($module, $fields, '', 'col-6 col-sm', '', 0);
    rvb_module_row_close();
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 8
 */
function rvb_module_companies_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open('col-12 col-lg-2 offset-lg-1');
    rvb_component_html_content($module, $fields, 'mb-4 mb-lg-0', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-9');
    rvb_module_row_open('row-cols-2 row-cols-sm-5 g-5');
    rvb_component_logos($module, $fields, '', 'col-6 col-sm', '', 0);
    rvb_module_row_close();
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 9
 */
function rvb_module_companies_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-4 offset-lg-1 order-lg-2'
            : 'col-12 col-lg-4 offset-lg-1';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-lg-1'
            : 'col-12 col-lg-5 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading(
        $module,
        $fields,
        'h4',
        'mb-4 mb-lg-6 gs_reveal',
        '',
        0
    );
    rvb_component_button_group($module, $fields, 'mb-4 mb-lg-0 gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_column_open($c2Class);
    rvb_component_image(
        $fields,
        $fields['block_image'],
        '',
        'd-flex align-items-center justify-content-center bg-white mb-4',
        '',
        0
    );
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-1 row-cols-sm-3 g-4',
        'col',
        'text-center py-5 rounded-0',
        'py-0',
        'py-0',
        'mx-auto mb-2',
        'fa-lg',
        'fw-bold mb-0',
        '',
        'fs-xs',
        ''
    );
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 10
 */
function rvb_module_companies_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-lg-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-lg-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class);
    rvb_component_heading($module, $fields, 'h2', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'py-4 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_column_open($c2Class);
    rvb_module_row_open('row-cols-3 g-2 g-lg-4 py-5');
    rvb_component_logos(
        $module,
        $fields,
        '',
        'col text-center overflow-visible',
        '',
        0
    );
    rvb_module_row_close();
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 11
 */
function rvb_module_companies_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-lg-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-lg-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open($c1Class . ' mb-lg-4');
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'pt-4 pb-5 gs_reveal', 0);
    rvb_module_row_open('row-cols-2 row-cols-sm-4 g-4 mb-4 mb-lg-0');
    rvb_component_logos($module, $fields, '', 'col', 'gs_reveal', 0);
    rvb_module_row_close();
    rvb_module_column_close('');
    rvb_module_column_open($c2Class);
    rvb_component_image(
        $fields,
        $fields['block_image'],
        'large',
        '',
        'gs_reveal',
        0
    );
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 12
 */
function rvb_module_companies_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-lg-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-lg-1'
            : 'col-12 col-lg-6 offset-lg-1';

    rvb_module_container_open($module, ' py-5');
    rvb_module_row_open('pb-5 align-items-lg-center');
    rvb_module_column_open($c1Class);
    rvb_component_heading(
        $module,
        $fields,
        'h4',
        'mb-4 mb-lg-6 gs_reveal',
        '',
        0
    );
    rvb_component_sub_heading($module, $fields, '', 'fs-md mb-4 gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_column_open($c2Class);
    rvb_component_image(
        $module,
        $fields['block_image'],
        'large-square',
        '',
        'gs_reveal',
        0
    );
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_row_open('row justify-content-center g-4');
    rvb_component_logos($module, $fields, '', 'col-auto', '', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 13
 */
function rvb_module_companies_13($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $c1Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-5 offset-lg-1 order-lg-2'
            : 'col-12 col-lg-5';
    $c2Class =
        $fields['reverse_order'] == true
            ? 'col-12 col-lg-6 order-lg-1'
            : 'col-12 col-lg-6 offset-lg-1';

    $slides = [];

    foreach ($fields['companies'] as $company):
        $name = $company['name'];
        $excerpt = $company['excerpt'];
        $logo = $company['logo'];

        $slides[] = '<div class="swiper-slide px-lg-6">';
        $slides[] = '<div class="row align-items-center">';
        $slides[] = '<div class="' . $c1Class . ' text-center">';
        $slides[] = !empty($name) ? '<p class="h5 mb-4">' . $name . '</p>' : '';
        $slides[] = !empty($excerpt) ? $excerpt : '';
        $slides[] = '</div>';
        $slides[] =
            '<div class="' . $c2Class . ' border py-6 px-5 text-center">';
        $slides[] = !empty($logo)
            ? wp_get_attachment_image($logo, '', '', ['class' => 'img-fluid'])
            : '';
        $slides[] = '</div>';
        $slides[] = '</div>';
        $slides[] = '</div>';
    endforeach;

    $options = [
        'direction' => 'horizontal',
        'loop' => true,
        'speed' => 1000,
        'spaceBetween' => 0,
        'slidesPerView' => 1,
        'autoplay' => false,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
    ];

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        'd-flex align-items-stretch',
        0,
        0,
        1,
        1,
        0
    );
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 19
 */
function rvb_module_companies_19($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('pt-5');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'p', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open(
        'row-cols-3 row-cols-lg-auto g-4 align-items-center justify-content-center mb-5'
    );
    rvb_component_logos($module, $fields, '', 'col text-center', '', 0);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 20
 */
function rvb_module_companies_20($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $slides = [];

    foreach ($fields['logos'] as $company):
        $slides[] = '<div class="swiper-slide">';
        $slides[] =
            '<img src="' .
            esc_url($company['url']) .
            '" alt="' .
            esc_attr($company['alt']) .
            '" class="img-fluid" />';
        $slides[] = '</div>';
    endforeach;

    $options = [
        'direction' => 'horizontal',
        'loop' => true,
        'speed' => 1000,
        'spaceBetween' => 30,
        'slidesPerView' => 'auto',
        'autoplay' => false,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
    ];

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 mb-5 position-relative'
    );
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        1,
        1,
        0
    );
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 text-center pt-5 border-top'
    );
    rvb_component_html_content($module, $fields, 'fs-lg mb-4', 0);
    rvb_component_button_group($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 21
 */
function rvb_module_companies_21($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h5', 'gs_reveal', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 py-4');
    rvb_module_row_open(
        'row-cols-3 justify-content-center align-items-center g-4'
    );
    rvb_component_logos($module, $fields, '', 'col', '', 0);
    rvb_module_row_close();
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 22
 */
function rvb_module_companies_22($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $slides = [];

    foreach ($fields['logos'] as $company):
        $slides[] = '<div class="swiper-slide text-center">';
        $slides[] =
            '<img src="' .
            esc_url($company['url']) .
            '" alt="' .
            esc_attr($company['alt']) .
            '" class="img-fluid" />';
        $slides[] = '</div>';
    endforeach;

    $options = [
        'effect' => 'coverflow',
        'grabCursor' => true,
        'centeredSlides' => true,
        'speed' => 1000,
        'spaceBetween' => 30,
        'slidesPerView' => 'auto',
        'initialSlide' => 2,
        'coverflowEffect' => [
            'rotate' => 0,
            'stretch' => 0,
            'depth' => 500,
            'modifier' => 1,
            'slideShadows' => false,
        ],
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
    ];

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 gs_reveal', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 pb-5 position-relative'
    );
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        1,
        1,
        0
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_html_content($module, $fields, 'lead fs-5 mb-4', 0);
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Companies 23
 */
// function rvb_module_companies_23($module, $fields)
// {
//     if (empty($fields)) {
//         return;
//     }

//     rvb_module_container_open($module, '');
//     rvb_module_row_open('');
//     rvb_module_column_open('col-12 text-center');
//     rvb_component_heading($module, $fields, 'h3', 'pb-5 gs_reveal', '', 0);
//     rvb_module_column_close('');
//     rvb_module_row_close();
//     rvb_module_row_open('grid');
//     rvb_component_logos($module, $fields, '', 'cell', '', 0);
//     rvb_module_row_close();
//     rvb_module_container_close($module);
// }
