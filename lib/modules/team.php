<?php

/**
 * Module: Team
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_team($options, $module, $fields, $layout)
{
    if (empty($module) || empty($fields)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'team_1':
            rvb_module_team_1($module, $fields);
            break;
        case 'team_2':
            rvb_module_team_2($module, $fields);
            break;
        case 'team_4':
            rvb_module_team_4($module, $fields);
            break;
        case 'team_7':
            rvb_module_team_7($module, $fields);
            break;
        case 'team_9':
            rvb_module_team_9($options, $module, $fields);
            break;
        case 'team_13':
            rvb_module_team_13($module, $fields);
            break;
        case 'team_27':
            rvb_module_team_27($module, $fields);
            break;
        case 'team_28':
            rvb_module_team_28($module, $fields);
            break;
        case 'team_32':
            rvb_module_team_32($module, $fields);
            break;
    }
}

/**
 * Module: Team 1
 */
function rvb_module_team_1($module, $fields)
{
    $options = [
        'loop' => true,
        'speed' => 1100,
        'spaceBetween' => 30,
        'preloadImages' => false,
        'lazy' => true,
        'parallax' => true,
        'pagination' => [
            'el' => '.swiper-' . $module['unique_id'] . '-pagination',
            'speed' => 1100,
            'clickable' => true,
            'type' => 'fraction',
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
        ],
        'breakpoints' => [
            992 => [
                'slidesPerView' => 2,
            ],
            320 => [
                'slidesPerView' => 'auto',
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
        'mb-3 mb-lg-5 gs_reveal',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-2');
    rvb_component_html_content(
        $module,
        $fields,
        'fs-sm text-muted gs_reveal mb-4',
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-10');
    rvb_component_team(
        $module,
        $fields,
        $type = 'slider',
        $options,
        $layout = 'horizontal',
        $row_class = 'g-0',
        $col1_class = 'col-7 col1',
        $col2_class = 'col-5 col2',
        $image_type = 'normal',
        $image_size = 'medium',
        $image_class = 'w-100',
        $card_class = 'h-100 bg-transparent gs_reveal',
        $card_body_class =
            'h-100 d-flex flex-column justify-content-end align-items-end py-0 pe-0 ps-3',
        $title_type = 'h3',
        $title_class = 'mb-4',
        $card_text_class = '',
        $social_container_class =
            'row row-cols justify-content-start w-100 mx-0',
        $social_item_class = 'col-auto',
        $return = 0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('mt-3 mt-lg-5 align-items-center');
    rvb_module_column_open('col-12 col-lg-2');
    echo '<div class="swiper-' .
        $module['unique_id'] .
        '-pagination swiper-pagination position-relative text-start bottom-0"></div>';
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-2 d-none d-md-block');
    echo '<div class="swiper-button-next fs-md fw-normal position-relative bg-transparent d-flex align-items-center text-dark m-0">Next <i class="fal fa-angle-right ms-3 fa-2x"></i></div>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Team 2
 */
function rvb_module_team_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-white text-dark';

    $options = [
        'loop' => true,
        'speed' => 1100,
        'spaceBetween' => 30,
        'preloadImages' => false,
        'lazy' => true,
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'breakpoints' => [
            1200 => [
                'slidesPerView' => 3,
            ],
            992 => [
                'slidesPerView' => 2,
            ],
            320 => [
                'slidesPerView' => 'auto',
            ],
        ],
    ];

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5 py-lg-6');
    rvb_module_column_open('col-12 col-lg-4');
    rvb_component_heading($module, $fields, 'h2', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3');
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_team(
        $module,
        $fields,
        'slider',
        $options,
        'vertical',
        'g-0',
        'col-12 col-sm-8',
        'col-12 col-sm-4',
        'normal',
        'medium',
        'w-100',
        $style,
        'px-0',
        'h5',
        '',
        '',
        'row row-cols mx-0',
        'col-auto',
        0
    );
    echo '<div class="swiper-nav d-flex flex-column">';
    echo '<div class="btn-' .
        $module['unique_id'] .
        '-prev swiper-button-prev mb-3"><i class="fal fa-angle-left fa-2x"></i></div>';
    echo '<div class="btn-' .
        $module['unique_id'] .
        '-next swiper-button-next"><i class="fal fa-angle-right fa-2x"></i></div>';
    echo '</div>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Team 4
 */
function rvb_module_team_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $style =
        $module['style'] == 'dark'
            ? 'bg-dark text-light border border-light'
            : 'bg-white text-dark border border-dark';

    $options = [
        'loop' => true,
        'speed' => 1100,
        'spaceBetween' => 10,
        'slidesPerView' => 'auto',
        'preloadImages' => false,
        'lazy' => true,
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
        ],
    ];

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-3 pe-5 d-flex flex-column justify-content-between'
    );
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    echo '<div class="btn-' .
        $module['unique_id'] .
        '-next fs-lg bg-transparent">Next <i class="fal fa-angle-right ms-3"></i></div>';
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-9');
    rvb_component_team(
        $module,
        $fields,
        'slider',
        $options,
        'vertical',
        'g-0',
        'col-12 col-sm-8',
        'col-12 col-sm-6',
        'normal',
        'large',
        'w-100',
        $style,
        '',
        'h6',
        '',
        '',
        'd-none',
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
