<?php

/**
 * Module: Gallery
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_gallery($module, $fields, $layout)
{
    if (empty($layout) || empty($module) || empty($fields)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'gallery_1':
            rvb_module_gallery_1($module, $fields);
            break;
        case 'gallery_2':
            rvb_module_gallery_2($module, $fields);
            break;
        case 'gallery_3':
            rvb_module_gallery_3($module, $fields);
            break;
        case 'gallery_4':
            rvb_module_gallery_4($module, $fields);
            break;
        case 'gallery_5':
            rvb_module_gallery_5($module, $fields);
            break;
        case 'gallery_8':
            rvb_module_gallery_8($module, $fields);
            break;
        case 'gallery_9':
            rvb_module_gallery_9($module, $fields);
            break;
        case 'gallery_9':
            rvb_module_gallery_9($module, $fields);
            break;
        case 'gallery_10':
            rvb_module_gallery_10($module, $fields);
            break;
        case 'gallery_11':
            rvb_module_gallery_11($module, $fields);
            break;
        case 'gallery_12':
            rvb_module_gallery_12($module, $fields);
            break;
        case 'gallery_13':
            rvb_module_gallery_13($module, $fields);
            break;
        case 'gallery_14':
            rvb_module_gallery_14($module, $fields);
            break;
        case 'gallery_15':
            rvb_module_gallery_15($module, $fields);
            break;
        case 'gallery_16':
            rvb_module_gallery_16($module, $fields);
            break;
        case 'gallery_17':
            rvb_module_gallery_17($module, $fields);
            break;
        case 'gallery_18':
            rvb_module_gallery_18($module, $fields);
            break;
        case 'gallery_19':
            rvb_module_gallery_19($module, $fields);
            break;
        case 'gallery_20':
            rvb_module_gallery_20($module, $fields);
            break;
        case 'gallery_21':
            rvb_module_gallery_21($module, $fields);
            break;
        case 'gallery_23':
            rvb_module_gallery_23($module, $fields);
            break;
        case 'gallery_24':
            rvb_module_gallery_24($module, $fields);
            break;
        case 'gallery_30':
            rvb_module_gallery_30($module, $fields);
            break;
        case 'gallery_31':
            rvb_module_gallery_31($module, $fields);
            break;
        case 'gallery_32':
            rvb_module_gallery_32($module, $fields);
            break;
        case 'gallery_33':
            rvb_module_gallery_33($module, $fields);
            break;
        case 'gallery_34':
            rvb_module_gallery_34($module, $fields);
            break;
        case 'gallery_35':
            rvb_module_gallery_35($module, $fields);
            break;
        case 'gallery_36':
            rvb_module_gallery_36($module, $fields);
            break;
        case 'gallery_37':
            rvb_module_gallery_37($module, $fields);
            break;
    }
}

/**
 * Module: Gallery 1
 */
function rvb_module_gallery_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'effect' => 'coverflow',
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 'auto',
        'centeredSlides' => true,
        'spaceBetween' => 15,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'coverflowEffect' => [
            'rotate' => 0,
            'stretch' => 0,
            'depth' => 0,
            'modifier' => 0,
            'slideShadows' => false,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
    ];

    foreach ($source as $item):
        // $meta = get_post($item)->post_content;

        $slides[] = '<div class="swiper-slide">';
        $slides[] =
            '<div class="mask z-index-2 p-4 d-flex align-items-start justify-content-end flex-column" style="background:rgba(0,0,0,0);">';
        $slides[] = '<h5 class="text-white">' . get_the_title($item) . '</h5>';
        $slides[] = !empty($meta)
            ? '<p class="text-light m-0 fs-sm lh-sm">' . $meta . '</p>'
            : '';
        $slides[] = '</div>'; // end mask
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2');
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 pt-4 position-relative'
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
    rvb_module_row_close();
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 col-xl-6 offset-xl-2 pt-4'
    );
    rvb_component_html_content($module, $fields, 'mb-3', 0);
    rvb_component_button_group($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 2
 */
function rvb_module_gallery_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 'auto',
        'spaceBetween' => 15,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '<p class="h6 mt-4 mb-0">' . $item['title'] . '</p>';
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-xl-8');
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal mb-0', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-xl-8 pt-4 position-relative');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 3
 */
function rvb_module_gallery_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 'auto',
        'spaceBetween' => 30,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '<p class="h6 mt-4 mb-0 ms-4">' . $item['title'] . '</p>';
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'container pt-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_container_open($module, 'pb-5 px-0');
    rvb_module_row_open('g-0');
    rvb_module_column_open('col-12');
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
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 4
 */
function rvb_module_gallery_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    console_log($module);

    $style =
        !empty($module['style']) && $module['style'] == 'dark'
            ? 'bg-light'
            : '';

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 'auto',
        'spaceBetween' => 30,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'pagination' => [
            'el' => '.rvb-' . $module['unique_id'] . '-pagination',
            'speed' => 1100,
            'clickable' => true,
            'type' => 'fraction',
        ],
        'scrollbar' => [
            'el' => '.rvb-' . $module['unique_id'] . '-scrollbar',
            'draggable' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide my-4">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'container pt-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_container_open($module, 'pb-5 px-0');
    rvb_module_row_open('g-0');
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new pb-5',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_container_open($module, 'container pt-4 pb-5');
    rvb_module_row_open('align-items-center justify-content-between');
    rvb_module_column_open('col-12 col-lg');
    echo '<div class="swiper-pagination rvb-' .
        $module['unique_id'] .
        '-pagination"></div>';
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg');
    echo '<div class="swiper-scrollbar rvb-' .
        $module['unique_id'] .
        '-scrollbar ' .
        $style .
        '"></div>';
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg d-flex align-items-center justify-content-lg-end'
    );
    echo '<div class="rvb-button-prev btn-' .
        $module['unique_id'] .
        '-prev" tabindex="0" role="button"><i class="fal fa-chevron-left fa-lg" role="none"></i></div>';
    echo '<div class="rvb-button-next btn-' .
        $module['unique_id'] .
        '-next" tabindex="0" role="button"><i class="fal fa-chevron-right fa-lg" role="none"></i></div>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 5
 */
function rvb_module_gallery_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'px-0 py-5');
    rvb_module_row_open('g-0');
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 8
 */
function rvb_module_gallery_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '<p class="mt-3 ms-lg-5">' . $item['title'] . '</p>';
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'px-0 py-5');
    rvb_module_row_open('g-0');
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 9
 */
function rvb_module_gallery_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '<p class="h6 mt-4 mb-0 ms-4">' . $item['title'] . '</p>';
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'px-0 py-5');
    rvb_module_row_open('g-0');
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 10
 */
function rvb_module_gallery_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '<div class="d-flex justify-content-between">'; // end inner
        $slides[] = '<p class="h6 mt-4 mb-0 ms-4">' . $item['title'] . '</p>';
        $slides[] = '<p class="h6 mt-4 mb-0 ms-4">' . $item['title'] . '</p>';
        $slides[] = '</div>'; // end flex
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 mb-4');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        1,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 offset-lg-1');
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-3 offset-lg-1 d-flex align-items-center justify-content-start'
    );
    rvb_component_image(
        $fields['person_info'],
        $fields['person_info']['block_image'],
        'thumb',
        'rounded-circle overflow-hidden me-3',
        '',
        0
    );
    echo '<div>';
    rvb_component_heading(
        $module,
        $fields['person_info'],
        'p',
        'fs-xs mb-0',
        0
    );
    rvb_component_sub_heading(
        $module,
        $fields['person_info'],
        '',
        'fs-xs text-muted mb-0',
        0
    );
    echo '</div>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 11
 */
function rvb_module_gallery_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'pagination' => [
            'el' => '.rvb-' . $module['unique_id'] . '-pagination',
            'clickable' => true,
        ],
    ];

    foreach ($source as $item):
        console_log($item);

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '<div class="d-flex justify-content-between">'; // end inner
        $slides[] = '<p class="h6 mt-4 mb-0 ms-4">' . $item['content'] . '</p>';
        $slides[] = '<p class="h6 mt-4 mb-0 ms-4">' . $item['title'] . '</p>';
        $slides[] = '</div>'; // end flex
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 mb-4');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        1,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5 text-end');
    echo '<p>' . $fields['caption'] . '</p>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 12
 */
function rvb_module_gallery_12($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 mb-4');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_html_content($module, $fields['left_content'], 'mb-4', 0);
    rvb_component_button_group($module, $fields['left_content'], '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_html_content($module, $fields['right_content'], 'mb-4', 0);
    rvb_component_button_group($module, $fields['right_content'], '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 13
 */
function rvb_module_gallery_13($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'pagination' => [
            'el' => '.rvb-' . $module['unique_id'] . '-pagination',
            'clickable' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4', 0);
    rvb_component_html_content($module, $fields, 'mb-5', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 position-relative');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        1,
        1,
        1,
        1,
        0
    );
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_button_group($module, $fields, 'mt-5', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 14
 */
function rvb_module_gallery_14($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'speed' => 1000,
        'grabCursor' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 0,
        'loop' => true,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => [
            'loadPrevNext' => true,
        ],
    ];

    foreach ($source as $item):
        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="inner">';
        $slides[] = wp_get_attachment_image($item['image'], 'large', '', [
            'class' => 'img-cover w-100 h-100',
        ]);
        $slides[] = '</div>'; // end inner
        $slides[] = '</div>'; // end swiper-slide
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4', 0);
    rvb_component_html_content($module, $fields, 'mb-5', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 15
 */
function rvb_module_gallery_15($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_video($module, $fields, '');
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h5', 'mt-5', 0);
    rvb_component_html_content($module, $fields, 'my-4', 0);
    rvb_component_button_group($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 16
 */
function rvb_module_gallery_16($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center mt-4'
    );
    rvb_component_tabbed_content($module, $fields, 'nav-fill', '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 17
 */
function rvb_module_gallery_17($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-md-2 row-cols-lg-4',
        'col',
        '',
        'p-0',
        '',
        '',
        '',
        'h4 mb-2',
        '',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 18
 */
function rvb_module_gallery_18($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-5', 0);
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 19
 */
function rvb_module_gallery_19($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_heading($module, $fields, 'h3', 'mb-5', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 20
 */
function rvb_module_gallery_20($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-7 offset-lg-1');
    rvb_component_heading($module, $fields, 'h3', 'mb-5', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_specs(
        $module,
        $fields['specs'],
        'row row-cols-lg-3',
        'col',
        '',
        '',
        'h5',
        '',
        'mb-0'
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 mt-5');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 21
 */
function rvb_module_gallery_21($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 mb-5');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 col-xl-3');
    rvb_component_heading($module, $fields, 'h3', 'mb-5', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-7 offset-lg-1');
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 23
 */
function rvb_module_gallery_23($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        'large',
        'col-12 col-lg-5 offset-lg-7 h-100',
        '',
        0
    );
    rvb_module_container_open($module, 'py-5 py-lg-6');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_heading($module, $fields, 'h3', 'mb-4', 0);
    rvb_component_html_content($module, $fields, 'fs-lg', 0);
    rvb_component_features(
        $module,
        $fields,
        'row row-cols-md-2 mt-lg-10',
        'col',
        '',
        'p-0',
        'p-0',
        '',
        '',
        'h6',
        '',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 24
 */
function rvb_module_gallery_24($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_heading($module, $fields, 'h2', 'mb-4', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_image($fields, $fields['block_image'], '', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-5 offset-lg-1');
    rvb_component_html_content($module, $fields, '', 0);
    rvb_component_button_group($module, $fields, 'mt-4', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 30
 */
function rvb_module_gallery_30($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);
    $slides = [];
    $options = [
        'loop' => true,
        'speed' => 1000,
        'preloadImages' => false,
        'spaceBetween' => 15,
        'lazy' => true,
        'slidesPerView' => 'auto',
        'freeMode' => [
            'enabled' => true,
            'sticky' => true,
        ],
        'breakpoints' => [
            '992' => [
                'spaceBetween' => 30,
            ],
        ],
    ];

    foreach ($source as $item):
        $title = $item['title'];
        $content = $item['content'];
        $image = $item['image'];

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="img-container h-100 w-100">';
        $slides[] = wp_get_attachment_image($image, 'large', '', [
            'class' => 'img-cover w-100 h-100',
            'data-mdb-caption' => $title . ' | ' . $content,
            'data-mdb-img' => wp_get_attachment_image_url($image, 'full'),
        ]);
        $slides[] = '</div>';
        $slides[] = '</div>';
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-4 col-xl-3 offset-lg-1');
    rvb_component_heading($module, $fields, 'h4', 'mb-5', 0);
    rvb_component_features(
        $module,
        $fields,
        'row',
        'col-12',
        'bg-transparent',
        'p-0',
        'px-0',
        '',
        '',
        'h6 mb-2',
        '',
        '',
        ''
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);

    rvb_module_column_open('col-12 col-lg-7 slider-col z-index-5 py-5');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
}

/**
 * Module: Gallery 31
 */
function rvb_module_gallery_31($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);

    $slides = [];
    $options = [
        'loop' => true,
        'speed' => 1000,
        'preloadImages' => false,
        'spaceBetween' => 15,
        'lazy' => true,
        'slidesPerView' => 'auto',
        'freeMode' => [
            'enabled' => true,
            'sticky' => true,
        ],
        'breakpoints' => [
            '992' => [
                'spaceBetween' => 30,
            ],
        ],
    ];

    foreach ($source as $item):
        $title = $item['title'];
        $content = $item['content'];
        $image = $item['image'];

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="img-container w-100 h-100">';
        $slides[] = wp_get_attachment_image($image, 'large', '', [
            'class' => 'img-cover w-100 h-100',
            'data-mdb-caption' => $title . ' | ' . $content,
            'data-mdb-img' => wp_get_attachment_image_url($image, 'full'),
        ]);
        $slides[] = '</div>';
        $slides[] = '</div>';
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 position-relative lightbox');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new overflow-visible',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 32
 */
function rvb_module_gallery_32($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);

    $slides = [];
    $options = [
        'loop' => true,
        'speed' => 1000,
        'preloadImages' => false,
        'spaceBetween' => 15,
        'lazy' => true,
        'slidesPerView' => 'auto',
        'freeMode' => [
            'enabled' => true,
            'sticky' => true,
        ],
        'breakpoints' => [
            '992' => [
                'spaceBetween' => 30,
            ],
        ],
    ];

    foreach ($source as $item):
        $title = $item['title'];
        $content = $item['content'];
        $image = $item['image'];

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="img-container h-100 w-100">';
        $slides[] = wp_get_attachment_image($image, 'large', '', [
            'class' => 'img-cover w-100 h-100',
            'data-mdb-caption' => $title . ' | ' . $content,
            'data-mdb-img' => wp_get_attachment_image_url($image, 'full'),
        ]);
        $slides[] = '</div>';
        $slides[] = '</div>';
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 position-relative lightbox');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new overflow-visible',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 33
 */
function rvb_module_gallery_33($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_gallery($module, $fields, 'grid', '', 'row-cols-md-3 g-md-4');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 34
 */
function rvb_module_gallery_34($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_gallery($module, $fields, 'grid', '', 'row-cols-md-3 g-md-4');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 35
 */
function rvb_module_gallery_35($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_gallery(
        $module,
        $fields,
        'grid',
        '',
        'row-cols-md-2 row-cols-lg-4 g-md-4'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 36
 */
function rvb_module_gallery_36($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_gallery(
        $module,
        $fields,
        'grid',
        '',
        'row-cols-md-2 row-cols-lg-4'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Gallery 37
 */
function rvb_module_gallery_37($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $source = rvb_component_gallery_source($fields);

    $slides = [];
    $options = [
        'loop' => true,
        'speed' => 1000,
        'preloadImages' => false,
        'spaceBetween' => 15,
        'lazy' => true,
        'slidesPerView' => 'auto',
        'freeMode' => [
            'enabled' => true,
            'sticky' => true,
        ],
        'breakpoints' => [
            '992' => [
                'spaceBetween' => 30,
            ],
        ],
    ];

    foreach ($source as $item):
        $title = $item['title'];
        $content = $item['content'];
        $image = $item['image'];

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<div class="img-container h-100 w-100">';
        $slides[] = wp_get_attachment_image($image, 'large', '', [
            'class' => 'img-cover w-100 h-100',
            'data-mdb-caption' => $title . ' | ' . $content,
            'data-mdb-img' => wp_get_attachment_image_url($image, 'full'),
        ]);
        $slides[] = '</div>';
        $slides[] = '</div>';
    endforeach;

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 position-relative lightbox');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new overflow-visible',
        '',
        0,
        0,
        0,
        0,
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
