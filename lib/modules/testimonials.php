<?php

/**
 * Module: Testimonials
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_testimonials($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'testimonials_1':
            rvb_module_testimonials_1($module, $fields);
            break;
        case 'testimonials_2':
            rvb_module_testimonials_2($module, $fields);
            break;
        case 'testimonials_3':
            rvb_module_testimonials_3($module, $fields);
            break;
        case 'testimonials_4':
            rvb_module_testimonials_4($module, $fields);
            break;
        case 'testimonials_5':
            rvb_module_testimonials_5($module, $fields);
            break;
        case 'testimonials_6':
            rvb_module_testimonials_6($module, $fields);
            break;
        case 'testimonials_7':
            rvb_module_testimonials_7($module, $fields);
            break;
        case 'testimonials_8':
            rvb_module_testimonials_8($module, $fields);
            break;
        case 'testimonials_9':
            rvb_module_testimonials_9($module, $fields);
            break;
        case 'testimonials_10':
            rvb_module_testimonials_10($module, $fields);
            break;
        case 'testimonials_11':
            rvb_module_testimonials_11($module, $fields);
            break;
    }
}

/**
 * Module: Testimonials 1
 */
function rvb_module_testimonials_1($module, $fields)
{
    if (empty($fields) || empty($fields['testimonials'])) {
        return;
    }

    $testimonials = $fields['testimonials'];
    $slides = [];
    $options = [
        'loop' => true,
        'speed' => 1100,
        'autoplay' => true,
        'slidesPerView' => 1,
        'parallax' => true,
        'effect' => 'fade',
        'fadeEffect' => [
            'crossFade' => true,
        ],
    ];

    foreach ($testimonials as $testimonial) {
        $name = get_the_title($testimonial);
        $sub_title = get_field('sub_title', $testimonial);
        $portrait = get_field('portrait', $testimonial);
        $testimonial = get_field('testimonial', $testimonial);

        $slides[] = '<div class="swiper-slide">';
        $slides[] =
            '<blockquote class="row align-items-start g-0 blockquote m-0">';
        $slides[] =
            '<div class="info d-flex align-items-start col-12 col-lg-4 col-xl-3 offset-xl-1 order-2 order-lg-1 mt-4 mt-lg-0 pe-sm-4">';
        $slides[] = $portrait
            ? '<div class="portrait me-3">' .
                wp_get_attachment_image($portrait, 'thumbnail', '', [
                    'class' => 'rounded-circle img-fluid',
                ]) .
                '</div>'
            : '';
        $slides[] = '<div class="name-wrap">';
        $slides[] = $name ? '<p class="h6 mb-0">' . $name . '</p>' : '';
        $slides[] = $sub_title
            ? '<p class="fs-xs text-muted m-0">' . $sub_title . '</p>'
            : '';
        $slides[] = '</div>';
        $slides[] = '</div>';
        $slides[] = $testimonial
            ? '<div class="col-12 col-lg-8 col-xl-7 position-relative order-1 order-lg-2"><p class="testimonial h5 mb-0 position-relative z-index-2">"' .
                $testimonial .
                '"</p></div>'
            : '';
        $slides[] = '</blockquote>';
        $slides[] = '</div>';
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
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
 * Module: Testimonials 2
 */
function rvb_module_testimonials_2($module, $fields)
{
    if (empty($fields) || empty($fields['testimonials'])) {
        return;
    }

    $testimonials = $fields['testimonials'];
    $slides = [];
    $options = [
        'loop' => true,
        'speed' => 1100,
        'autoplay' => true,
        'slidesPerView' => 1,
        'parallax' => true,
        'effect' => 'fade',
        'fadeEffect' => [
            'crossFade' => true,
        ],
    ];

    foreach ($testimonials as $testimonial) {
        $name = get_the_title($testimonial);
        $sub_title = get_field('sub_title', $testimonial);
        $portrait = get_field('portrait', $testimonial);
        $testimonial = get_field('testimonial', $testimonial);

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<blockquote class="blockquote row g-0 pt-4 pt-lg-5 m-0">';
        $slides[] = $testimonial
            ? '<div class="col-12 position-relative text-center"><p class="testimonial mb-0 lead fw-normal fs-5 lh-sm">"' .
                $testimonial .
                '"</p></div>'
            : '';
        $slides[] =
            '<div class="info mt-4 row g-3 align-items-center justify-content-center flex-nowrap">';
        $slides[] = '<div class="col-auto">';
        $slides[] = $portrait
            ? '<div class="portrait">' .
                wp_get_attachment_image($portrait, 'thumbnail', '', [
                    'class' => 'rounded-circle img-fluid',
                ]) .
                '</div>'
            : '';
        $slides[] = '</div>';
        $slides[] = $name
            ? '<div class="col col-md-auto"><p class="m-0 fw-bold lh-sm name fs-md">' .
                $name .
                (!empty($sub_title) ? ', ' . $sub_title : '') .
                '</p></div>'
            : '';
        $slides[] = '</div>';
        $slides[] = '</blockquote>';
        $slides[] = '</div>';
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('align-items-center justify-content-center');
    rvb_component_logos(
        $module,
        $fields,
        '',
        'col col-md-auto',
        'img-fluid',
        0
    );
    rvb_module_row_close();
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        'swiper-new',
        'align-items-center',
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
 * Module: Testimonials 3
 */
function rvb_module_testimonials_3($module, $fields)
{
    if (empty($fields['testimonials'])) {
        return;
    }

    $testimonials = $fields['testimonials'];
    $slides = ['<div class="swiper testimonials_3_swiper">'];
    $slides[] = '<div class="swiper-wrapper">';

    foreach ($testimonials as $id):
        $name = get_the_title($id);
        $subtitle = get_field('sub_title', $id);
        $testimonial = get_field('testimonial', $id);
        $img = get_field('portrait', $id);
        $atts = [''];
        $atts[] = !empty($name) ? 'data-name="' . $name . '"' : '';
        $atts[] = !empty($subtitle) ? 'data-subtitle="' . $subtitle . '"' : '';
        $atts[] = !empty($img)
            ? 'data-portrait="' .
                wp_get_attachment_image_url($id, 'testimonial-thumb') .
                '"'
            : '';

        $slides[] = '<div class="swiper-slide"' . join(' ', $atts) . '>';
        $slides[] = '<div class="row">';
        $slides[] =
            '<div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">';
        $slides[] =
            '<blockquote class="blockquote text-center my-3 my-md-4 my-lg-5">';
        $slides[] = !empty($testimonial)
            ? '<p class="fs-lg">' . $testimonial . '</p>'
            : '';
        $slides[] = '</blockquote>';
        $slides[] = '</div>';
        $slides[] = '</div>';
        $slides[] = '</div>';
    endforeach;

    $slides[] = '</div>'; // end wrapper
    $slides[] =
        '<ul class="position-relative d-flex justify-content-center text-start list-unstyled swiper-pagination gs_reveal"></ul>'; // swiper pagination
    $slides[] = '</div>'; // end swiper

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h3', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    echo join('', $slides);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);

    add_action('wp_footer', 'testimonials_3_js');
    function testimonials_3_js()
    {
        wp_enqueue_style('swipercss');
        wp_enqueue_script('swiper');?>
		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function() {
				const swiper = new Swiper('.testimonials_3_swiper', {
					loop: true,
					speed: 1100,
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
						type: 'bullets',
						renderBullet: function(index, className) {
							var slide = jQuery('.testimonials_3 .swiper-slide').eq(index + 1);
							var sub_title = slide.data('subtitle');
							var name = slide.data('name');
							var portrait = slide.data('portrait');

							portrait = portrait ?
								'<img src="' +
								portrait +
								'" class="rounded-circle me-4 portrait d-block float-start" alt="' +
								name +
								' ' +
								sub_title +
								' testimonial" />' :
								'<div class="icon float-start"><span class="fa-stack"><i class="fas fa-circle fa-stack-2x text-dark"></i><i class="fad fa-user fa-stack-1x fa-inverse"></i></span></div>';

							return (
								'<li class="col position-relative m-0 p-3 ' +
								className +
								'">' +
								'<div class="bg-image hover-overlay ripple shadow-0" data-mdb-ripple-color="light"><div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div></div>' +
								portrait +
								'<div class="info">' +
								'<h6 class="m-0 name text-start text-primary">' +
								name +
								'</h6>' +
								'<p class="m-0 text-muted small d-block position"> ' +
								sub_title +
								'</p>' +
								'</div>' +
								'</li>'
							);
						},
					},
				});
			});
		</script>
<?php
    }
}

/**
 * Module: Testimonials 4
 */
function rvb_module_testimonials_4($module, $fields)
{
    if (empty($fields['testimonials'])) {
        return;
    }

    $slides = [];
    $options = [
        'loop' => true,
        'slidesPerView' => 1,
        'speed' => 1100,
        'spaceBetween' => 15,
        'breakpoints' => [
            992 => [
                'slidesPerView' => 2,
                'spaceBetween' => 30,
                'navigation' => [
                    'nextEl' => '.btn-' . $module['unique_id'] . '-next',
                    'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
                ],
            ],
        ],
    ];

    foreach ($fields['testimonials'] as $id) {
        $testimonial = get_field('testimonial', $id);
        $portrait = get_field('portrait', $id);
        $name = get_the_title($id);
        $sub_title = get_field('sub_title', $id);

        $slides[] = '<div class="swiper-slide">';
        $slides[] =
            '<blockquote class="d-flex flex-column text-center px-lg-5 px-xl-10 mb-0">';
        $slides[] = $portrait
            ? '<div class="portrait order-1 mb-4 mx-auto">' .
                wp_get_attachment_image($portrait, 'thumbnail', '', [
                    'class' => 'rounded-circle img-fluid',
                ]) .
                '</div>'
            : '';
        $slides[] = $testimonial
            ? '<p class="testimonial order-2">"' . $testimonial . '"</p>'
            : '';
        $slides[] = '<div class="author order-3 mt-4">';
        $slides[] = $name ? '<p class="title h6 mb-0">' . $name . '</p>' : '';
        $slides[] = $sub_title
            ? '<p class="subtitle mb-0 fs-sm">' . $sub_title . '</p>'
            : '';
        $slides[] = '</div>';
        $slides[] = '</blockquote>';
        $slides[] = '</div>';
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
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
 * Module: Testimonials 5
 */
function rvb_module_testimonials_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_component_testimonials(
        $module,
        $fields,
        'grid',
        'row-cols-1 row-cols-lg-3 g-4',
        0,
        'row mb-0',
        'col-12 order-3 pe-lg-5 mb-4 mb-lg-0',
        'h6',
        'col order-2 mb-3 mb-lg-4',
        '',
        'fs-sm',
        'order-1 m-0'
    );
    rvb_module_container_close($module);
}

/**
 * Module: Testimonials 6
 */
function rvb_module_testimonials_6($module, $fields)
{
    if (empty($fields['testimonials'])) {
        return;
    }

    $slides = [];
    $options = [
        'loop' => true,
        'slidesPerView' => 'auto',
        'spaceBetween' => 30,
        'speed' => 1000,
        'navigation' => [
            'nextEl' => '.btn-' . $module['unique_id'] . '-next',
            'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
        ],
        'breakpoints' => [
            992 => [
                'spaceBetween' => 60,
            ],
        ],
    ];

    foreach ($fields['testimonials'] as $id) {
        $testimonial = get_field('testimonial', $id);
        $portrait = get_field('portrait', $id);
        $name = get_the_title($id);
        $sub_title = get_field('sub_title', $id);

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<blockquote class="row g-0 mb-0">';
        $slides[] = $portrait
            ? '<div class="portrait col-auto order-2 me-3">' .
                wp_get_attachment_image($portrait, 'thumbnail', '', [
                    'class' => 'rounded-circle img-fluid',
                ]) .
                '</div>'
            : '';
        $slides[] = $testimonial
            ? '<p class="testimonial col-12 order-1 fs-5 lh-sm pb-4 pe-lg-4">"' .
                $testimonial .
                '"</p>'
            : '';
        $slides[] = '<div class="author col order-3">';
        $slides[] = $name
            ? '<p class="title ls-5 fw-bold mb-0">' . $name . '</p>'
            : '';
        $slides[] = $sub_title
            ? '<p class="subtitle mb-0 fs-sm lh-sm">' . $sub_title . '</p>'
            : '';
        $slides[] = '</div>';
        $slides[] = '</blockquote>';
        $slides[] = '</div>';
    }
    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
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
    echo '<div class="btn-"' .
        $module['unique_id'] .
        '"-next"></div><div class="btn-' .
        $module['unique_id'] .
        '-next"></div>';
}

/**
 * Module: Testimonials 7
 */
function rvb_module_testimonials_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-4', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_testimonials(
        $module,
        $fields,
        'grid',
        'row-cols-1 row-cols-lg-3 g-4',
        0,
        'row bg-light text-dark p-4 g-0',
        'col-12 order-1 fs-lg lh-sm pb-lg-4',
        'h6',
        'col order-3',
        '',
        'fs-sm',
        'order-2 m-0 pe-3'
    );
    rvb_module_container_close($module);
}

/**
 * Module: Testimonials 8
 */
function rvb_module_testimonials_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, ' py-5');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 text-center'
    );
    rvb_component_heading($module, $fields, 'h3', 'pb-4', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_component_testimonials(
        $module,
        $fields,
        'grid',
        'row-cols-1 row-cols-md-2 row-cols-lg-4 g-4',
        0,
        'row g-0',
        'col-12 order-3',
        'h5',
        'col-12 order-2 pt-3 pb-2',
        '',
        'fs-sm text-muted',
        'order-1'
    );
    rvb_module_container_close($module);
}

/**
 * Module: Testimonials 9
 */
function rvb_module_testimonials_9($module, $fields)
{
    if (empty($fields['testimonials'])) {
        return;
    }

    $options = [
        'speed' => 1100,
        'loop' => true,
        'slidesPerView' => 1,
        'spaceBetween' => 15,
        'pagination' => [
            'el' => '.swiper-pagination',
        ],
        'breakpoints' => [
            992 => [
                'slidesPerView' => 2,
                'spaceBetween' => 30,
            ],
        ],
    ];

    foreach ($fields['testimonials'] as $id) {
        $testimonial = get_field('testimonial', $id);
        $portrait = get_field('portrait', $id);
        $name = get_the_title($id);
        $sub_title = get_field('sub_title', $id);

        $slides[] = '<div class="swiper-slide">';
        $slides[] = '<blockquote class="border row g-0 m-0">';
        $slides[] = '<div class="col-auto order-1">';
        $slides[] = $portrait
            ? '<div class="portrait img-container h-100">' .
                wp_get_attachment_image($portrait, 'medium', '', [
                    'class' => 'img-cover w-100 h-100',
                ]) .
                '</div>'
            : '';
        $slides[] = '</div>';
        $slides[] = '<div class="content-wrap">';
        $slides[] = $name
            ? '<h3 class="title mb-0 fs-sm fw-normal text-muted">' .
                $name .
                '</h3>'
            : '';
        $slides[] = $testimonial
            ? '<p class="testimonial my-4 fs-lg fw-bold lh-sm">"' .
                $testimonial .
                '"</p>'
            : '';
        $slides[] = $sub_title
            ? '<p class="subtitle mb-0 fs-md">' . $sub_title . '</p>'
            : '';
        $slides[] = '</div>';
        $slides[] = '</blockquote>';
        $slides[] = '</div>';
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_heading($module, $fields, 'h4', 'pb-4', '', 0);
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
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Testimonials 10
 */
function rvb_module_testimonials_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-1 order-2 order-lg-1');
    rvb_component_testimonials(
        $module,
        $fields,
        'grid',
        '',
        0,
        '',
        'order-1 h4 pb-4',
        'h6',
        'order-3',
        '',
        'fs-sm',
        'd-none'
    );
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-3 offset-lg-1 order-1 order-lg-2 mb-4'
    );
    rvb_component_html_content($module, $fields, 'text-muted', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Testimonials 11
 */
function rvb_module_testimonials_11($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2');
    rvb_component_testimonials(
        $module,
        $fields,
        'grid',
        '',
        0,
        'row',
        'order-1 h4 pb-4',
        'p',
        'col order-3 mt-3',
        'h6',
        'fs-sm',
        'order-2 col-auto d-flex align-items-center'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
