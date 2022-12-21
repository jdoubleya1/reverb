<?php

/**
 * Module: Hero
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_hero($options, $module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'hero_1':
            rvb_module_hero_1($module, $fields);
            break;
        case 'hero_2':
            rvb_module_hero_2($module, $fields);
            break;
        case 'hero_3':
            rvb_module_hero_3($options, $module, $fields);
            break;
        case 'hero_4':
            rvb_module_hero_4($module, $fields);
            break;
        case 'hero_5':
            rvb_module_hero_5($module, $fields);
            break;
        case 'hero_8':
            rvb_module_hero_8($module, $fields);
            break;
        case 'hero_9':
            rvb_module_hero_9($module, $fields);
            break;
        case 'hero_10':
            rvb_module_hero_10($module, $fields);
            break;
        case 'hero_15':
            rvb_module_hero_15($options, $module, $fields);
            break;
    }
}

if (!function_exists('rvb_module_hero_1')) {
    function rvb_module_hero_1($module, $fields)
    {
        if (empty($fields) || empty($fields['slides'])) {
            return;
        }

        $slides = [];

        $options = [
            'grabCursor' => true,
            'loop' => true,
            'speed' => 1100,
            'parallax' => true,
            'autoplay' => false,
            'effect' => 'fade',
            'fadeEffect' => [
                'crossFade' => true,
            ],
            'mousewheelControl' => 1,
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
                'type' => 'fraction',
            ],
        ];

        foreach ($fields['slides'] as $slide) {
            $slides[] =
                '<div class="swiper-slide d-flex flex-column justify-content-end">';
            $slides[] = '<div class="container-xl py-4 py-md-5 py-lg-10 px-0">';
            $slides[] = '<div class="row align-items-lg-center g-0">';
            $slides[] =
                '<div class="col-12 col-lg-5" data-swiper-parallax-y="-100">';
            $slides[] = rvb_component_heading(
                $module,
                $slide,
                'h1',
                'font-weight-bolder mb-4',
                '',
                1
            );
            $slides[] = '</div>'; // end column
            $slides[] =
                '<div class="col-12 col-lg-5 offset-lg-1" data-swiper-parallax-y="-90">';
            $slides[] = rvb_component_html_content(
                $module,
                $slide,
                'fs-xxl lh-sm mb-4',
                1
            );
            $slides[] = '</div>'; //end column
            $slides[] =
                '<div class="col-12 col-lg-5" data-swiper-parallax-y="-100">';
            $slides[] = rvb_component_button_group($module, $slide, '', 1);
            $slides[] = '</div>'; // end column
            $slides[] = '</div>'; // end row
            $slides[] = '</div>'; // end container

            if (!empty($slide['block_image'])):
                $slides[] =
                    '<div class="swiper-image w-100 d-flex align-items-center position-relative">';
                $slides[] = wp_get_attachment_image(
                    $slide['block_image'],
                    'full',
                    '',
                    [
                        'class' => 'img-cover h-100 position-absolute',
                        'data-swiper-parallax' => '-23%',
                    ]
                );
                $slides[] = '<div class="container">';
                $slides[] = '<div class="row">';
                $slides[] =
                    '<div class="col-12 col-lg-6" data-swiper-parallax-y="-50">';
                $slides[] = rvb_component_sub_heading(
                    $module,
                    $fields,
                    'p',
                    'm-0 fs-xxl fw-normal',
                    1
                );
                $slides[] = '</div>';
                $slides[] = '</div>';
                $slides[] = '</div>';
                $slides[] = '</div>';
            endif;

            $slides[] = '</div>'; // end swiper slide
        }

        rvb_module_container_open($module, '');
        rvb_module_row_open('');
        rvb_module_column_open('col-12');
        rvb_component_swiper(
            $module,
            $fields,
            $options,
            join('', $slides),
            'swiper-new overflow-visible',
            '',
            1,
            0,
            1,
            1,
            0
        );
        rvb_module_column_close();
        rvb_module_row_close();
        rvb_module_container_close($module);
        rvb_module_row_close();
    }
}

if (!function_exists('rvb_module_hero_2')) {
    function rvb_module_hero_2($module, $fields)
    {
        if (empty($fields) || empty($fields['slides'])) {
            return;
        }

        $pills = [
            '<ul class="nav nav-tabs d-flex align-items-center z-index-5" id="ex1" role="tablist">',
        ];
        $content = ['<div class="tab-content" id="ex1-content">'];
        $x = 0;

        foreach ($fields['slides'] as $tab):
            $tab_title = $tab['tab_title'];
            $image = !empty($tab['block_image'])
                ? wp_get_attachment_image($tab['block_image'], 'large', '', [
                    'class' => 'img-cover h-100 w-100',
                ])
                : '';
            $active = $x == 0 ? ' show active' : '';
            $active_tab = $x == 0 ? ' active' : '';
            $aria = $x == 0 ? 'true' : 'false';

            $pills[] = '<li class="nav-item" role="presentation">';
            $pills[] =
                '<a class="nav-link text-dark shadow-none bg-transparent px-0 px-3' .
                $active_tab .
                '" id="pills-' .
                $x .
                '-tab" data-mdb-toggle="pill" href="#pills-' .
                $x .
                '" role="tab" aria-controls="pills-' .
                $x .
                '" aria-selected="' .
                $aria .
                '">' .
                $tab_title .
                '</a>';
            $pills[] = '</li>';

            $content[] =
                '<div class="tab-pane position-relative fade' .
                $active .
                '" id="pills-' .
                $x .
                '" role="tabpanel" aria-labelledby="pills-' .
                $x .
                '-tab">';
            $content[] = '<div class="row g-0 mt-5">';
            $content[] =
                '<div class="col-12 col-lg-8 py-5 position-relative z-index-5">';
            $content[] = rvb_component_heading(
                $module,
                $tab,
                'h1',
                'display-1 fw-bold',
                '',
                1
            );
            $content[] = '<div class="row my-4 mt-xl-5">';
            $content[] =
                '<div class="col-12 col-lg-5 lh-sm">' .
                rvb_component_html_content($module, $tab, 'fs-lg', 1) .
                '</div>';
            $content[] =
                '<div class="col-12">' .
                rvb_component_button_group($module, $tab, 'mt-5', 1) .
                '</div>';
            $content[] = '</div>'; // end row
            $content[] = '</div>'; // end column
            $content[] =
                '<div class="col-12 col-lg-8 offset-lg-4 image">' .
                $image .
                '</div>';
            $content[] = '</div>'; // end row
            $content[] = '</div>'; // end tab content

            $x++;
        endforeach;

        $pills[] = '</ul>';
        $content[] = '</div>';

        $slides = [];

        $options = [
            'grabCursor' => true,
            'loop' => true,
            'speed' => 1100,
            'spaceBetween' => 15,
            'slidesPerView' => 'auto',
            'slidesOffsetBefore' => 15,
            'parallax' => true,
            'autoplay' => false,
            'preloadImages' => false,
            'lazy' => [
                'loadPrevNext' => true,
            ],
            'navigation' => [
                'nextEl' => '.btn-' . $module['unique_id'] . '-next',
                'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
            ],
            'breakpoints' => [
                992 => [
                    'spaceBetween' => 30,
                    'slidesOffsetBefore' => 0,
                ],
            ],
        ];

        if (!empty($fields['testimonials'])) {
            foreach ($fields['testimonials'] as $id) {
                $slides[] = '<div class="swiper-slide">';
                $slides[] =
                    '<div class="card rounded-0" style="background:#F5F9FC;">';
                $slides[] =
                    '<div class="icon d-flex align-items-center justify-content-center rounded-circle"><i class="fal fa-user fa-sm"></i></div>';
                $slides[] =
                    '<div class="card-body p-4 fs-sm lh-sm">' .
                    substr(get_field('testimonial', $id), 0, 50) .
                    '...</div>';
                $slides[] = '</div>'; // end card
                $slides[] = '</div>'; // end slide
            }
        }

        rvb_module_container_open($module, '');
        rvb_module_row_open('pt-5 pt-lg-0');
        rvb_module_column_open('col-12');
        echo join('', $pills);
        echo join('', $content);
        echo '<hr />';
        rvb_module_column_close();
        rvb_module_row_close();
        rvb_module_container_close($module);
        !empty($fields['testimonials'])
            ? rvb_component_swiper(
                $module,
                $fields,
                $options,
                join('', $slides),
                'swiper-new pb-4',
                'py-4',
                0,
                0,
                1,
                0,
                0
            )
            : '';
    }
}

if (!function_exists('rvb_module_hero_3')) {
    function rvb_module_hero_3($options, $module, $fields)
    {
        if (empty($fields)) {
            return;
        }

        rvb_module_container_open($module, '');
        rvb_module_row_open('');
        rvb_module_column_open(
            'col-12 col-lg-7 offset-lg-1 col-xl-6 py-5 pb-lg-6 pt-lg-10'
        );
        rvb_component_heading(
            $module,
            $fields,
            'h1',
            'display-1 fw-bold gs_reveal',
            '',
            0
        );
        rvb_component_button_group($module, $fields, 'gs_reveal', 0);
        rvb_module_column_close();
        rvb_module_row_close();

        rvb_component_floating_image(
            $module,
            $fields,
            $fields['block_image'],
            '',
            'position-relative col-12 px-0',
            '',
            0
        );

        rvb_module_container_close($module);
        rvb_component_social_icons(
            $options,
            'position-absolute w-auto d-none d-lg-flex flex-column',
            'col-auto',
            '',
            'gs_reveal',
            0
        );
    }
}

if (!function_exists('rvb_module_hero_4')) {
    function rvb_module_hero_4($module, $fields)
    {
        if (empty($fields) || empty($fields['slides'])) {
            return;
        }

        $slides = [];
        $options = [
            'loop' => true,
            'speed' => 1000,
            'slidesPerView' => 1,
            'effect' => 'fade',
            'fadeEffect' => [
                'crossFade' => true,
            ],
            'parallax' => true,
            'navigation' => [
                'nextEl' => '.btn-' . $module['unique_id'] . '-next',
                'prevEl' => '.btn-' . $module['unique_id'] . '-prev',
            ],
        ];

        foreach ($fields['slides'] as $slide) {
            $slides[] = '<div class="swiper-slide">';
            $slides[] =
                '<div class="content position-absolute z-index-5 pt-4 pe-3 pe-md-4 pe-lg-10 pt-lg-10 text-light">';
            $slides[] = rvb_component_heading(
                $module,
                $slide,
                'h2',
                'h3 m-0 mb-5',
                '',
                1
            );
            $slides[] = rvb_component_html_content($module, $slide, 'mb-0', 1);
            $slides[] = '</div>'; // end content
            $slides[] = rvb_component_image(
                $fields,
                $slide['block_image'],
                'large',
                'swiper-image w-100 h-100 bg-light position-absolute top-0 right-0 z-index-1',
                'img-cover w-100 h-100',
                1
            );
            $slides[] = '</div>'; // end slide
        }

        rvb_module_container_open($module, '');
        rvb_module_row_open('align-items-lg-end');
        rvb_module_column_open('col-12 col-lg-5 pt-5 py-4 py-lg-10');
        rvb_component_heading($module, $fields, 'h1', 'mb-4 my-lg-5', '', 0);
        rvb_component_sub_heading(
            $module,
            $fields,
            '',
            'fs-lg col-lg-8 px-0',
            0
        );
        echo '<i class="fal fa-chevron-down mt-lg-5 fa-3x"></i>';
        rvb_module_column_close();
        rvb_module_column_open(
            'col-12 col-lg-6 offset-lg-1 bg-light h-100 position-relative'
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
        rvb_module_container_close($module);
    }
}

if (!function_exists('rvb_module_hero_5')) {
    function rvb_module_hero_5($module, $fields)
    {
        if (empty($fields) || empty($fields['slides'])) {
            return;
        }

        $slides = [];

        foreach ($fields['slides'] as $slide) {
            $thumb = $slide['block_image'];

            $slides[] =
                '<div class="swiper-slide" data-thumbnail="' .
                ($thumb
                    ? wp_get_attachment_image_url($thumb, 'thumbnail')
                    : '') .
                '">';
            $slides[] = rvb_module_container_open(
                $module,
                'position-relative px-0',
                1
            );
            $slides[] = rvb_module_row_open(
                'd-flex align-items-lg-center mx-0 content-container',
                1
            );
            $slides[] = rvb_module_column_open(
                'col-12 col-lg-4 pb-5 pt-4 py-lg-10 content position-relative z-index-1',
                'data-swiper-parallax-y="-100" data-swiper-parallax-opacity="0"',
                1
            );
            $slides[] = rvb_component_heading(
                $module,
                $slide,
                'h1',
                'mb-4 mb-lg-5',
                '',
                1
            );
            $slides[] = rvb_component_html_content(
                $module,
                $slide,
                'fs-5 mb-0 col-lg-8 px-0',
                1
            );
            $slides[] = rvb_module_column_close(1);
            $slides[] = !empty($slide['block_image'])
                ? '<div class="image col-12 col-lg-7 offset-lg-3 z-index-0 top-0 left-0 bg-light h-100 px-0 overflow-hidden">' .
                    wp_get_attachment_image(
                        $slide['block_image'],
                        'large',
                        '',
                        ['class' => 'swiper-lazy img-cover w-100 h-100']
                    ) .
                    '<div class="swiper-lazy-preloader"></div></div>'
                : '';
            $slides[] = rvb_module_row_close(1);
            $slides[] = rvb_module_container_close($module, 1);
            $slides[] = '</div>'; // end swiper-slide
        }

        rvb_module_row_open('py-5');
        rvb_module_column_open('col-12');
        echo '<div class="swiper over">';
        echo '<div class="swiper-nav container d-flex align-items-center justify-content-start m-0 p-0"><div class="swiper-button-prev position-relative me-4"><i class="fal fa-angle-left fa-3x text-body"></i></div><div class="swiper-button-next position-relative"><i class="fal fa-angle-right fa-3x text-body"></i></div></div>';
        echo '<div class="swiper-wrapper">';
        echo join('', $slides);
        echo '</div>'; // end wrapper
        echo '<div class="swiper-pagination d-none d-lg-block container text-start position-absolute z-index-5 m-0"></div>';
        echo '</div>'; // end swiper
        echo '<div id="nextSlide" class="position-absolute d-none d-lg-flex align-items-center justify-content-end"><div class="content pe-4"><div class="position-relative d-flex align-items-center justify-content-end"><span class="lead font-weight-normal me-2">Next</span><i class="fal fa-angle-right fa-2x text-body"></i></div><h4 class="d-block text-end">Next Slide Title</h4></div><div class="preview_img bg-light"></div></div>';
        rvb_module_column_close();
        rvb_module_row_close();
        rvb_module_row_open('');
        rvb_module_container_open($module, 'swiper-controls');
        rvb_module_container_close($module);
        rvb_module_row_close();

        add_action('wp_footer', 'hero_5_js');
        function hero_5_js()
        {
            wp_enqueue_style('swipercss');
            wp_enqueue_script('swiper');?>
			<script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function() {
					var nextPrev = jQuery('#nextSlide');
					var next__title = nextPrev.find('h4');
					var next__img = nextPrev.find('.preview_img');

					var swiper = new Swiper('.hero_5 .swiper', {
						loop: true,
						speed: 1000,
						slidesPerView: 1,
						effect: 'fade',
						fadeEffect: {
							crossFade: true,
						},
						parallax: true,
						preloadImages: false,
						lazy: {
							loadPrevNext: true,
						},
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
							renderBullet: function(index, className) {
								return (
									'<span class="' +
									className +
									'">0' +
									(index + 1) +
									'</span>'
								);
							},
						},
						on: {
							// update nxt slide preview
							init: function(swiper) {
								var index = this.realIndex;
								var target = jQuery('.hero_5 .swiper-slide').eq(index);
								var title = target.find('.heading').html();
								var thumb = target.data('thumbnail');

								next__title.html(title);
								next__img.css(
									'background',
									'url(' + thumb + ') center/cover no-repeat'
								);
							},
							slideChange: function() {
								var index = this.realIndex;
								var target = jQuery('.hero_5 .swiper-slide').eq(index);
								var title = target.find('.heading').html();
								var thumb = target.data('thumbnail');

								next__title.html(title);
								next__img.css(
									'background',
									'url(' + thumb + ') center/cover no-repeat'
								);
							},
						},
					});

					// go to next slide
					jQuery('#nextSlide').click(function() {
						swiper.slideNext();
					});
				});
			</script>
		<?php
        }
    }
}

if (!function_exists('rvb_module_hero_8')) {
    function rvb_module_hero_8($module, $fields)
    {
        if (empty($fields)) {
            return;
        }

        rvb_module_container_open($module, '');
        rvb_module_row_open('vh-100 align-items-lg-center');
        rvb_module_column_open('col-12 col-lg-5 py-5 py-lg-10');
        rvb_component_heading($module, $fields, 'h1', 'mb-0', '', 0);
        rvb_component_sub_heading(
            $module,
            $fields,
            '',
            'my-4 fs-lg pe-lg-6',
            0
        );
        rvb_component_form($module, $fields, '');
        rvb_component_button_group($module, $fields, 'mt-3', 0);
        rvb_module_column_close();
        rvb_module_row_close();
        rvb_module_container_close($module);
        rvb_component_floating_image(
            $module,
            $fields,
            $fields['block_image'],
            '',
            'col-12 col-lg-6 offset-lg-6 h-100 px-0',
            'img-cover h-100 w-100',
            0
        );
    }
}

if (!function_exists('rvb_module_hero_9')) {
    function rvb_module_hero_9($module, $fields)
    {
        if (empty($fields)) {
            return;
        }

        /*
 <div class="row min-vh-100 align-items-lg-center">
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-2 pb-lg-7">
                <?php heading('h1', 'display-1 font-weight-bolder mb-lg-6'); ?>
                <?php button(''); ?>
            </div>
        </div>
    </div>
</div>
 */
    }
}

if (!function_exists('rvb_module_hero_10')) {
    function rvb_module_hero_10($module, $fields)
    {
        if (empty($fields) || empty($fields['slides'])) {
            return;
        }

        $slides = [];

        foreach ($fields['slides'] as $slide) {
            $slides[] =
                '<div class="swiper-slide d-flex align-items-center h-auto"' .
                (!empty($slide['tab_title'])
                    ? ' data-excerpt="' . $slide['tab_title'] . '"'
                    : '') .
                '>';
            $slides[] = rvb_module_container_open($module, 'my-lg-10', 1);
            $slides[] = rvb_module_row_open('g-0', 1);
            $slides[] = rvb_module_column_open(
                'col-10 col-sm-6 col-lg-7 my-5 my-lg-7 slide-content position-relative z-index-2',
                'data-swiper-parallax-y="-30%"',
                1
            );
            $slides[] = '<div class="inner pe-lg-5 pe-xxl-6">';
            $slides[] = rvb_component_heading(
                $module,
                $slide,
                'h1',
                'display-1 fw-bold text-primary mb-4 gs_reveal',
                '',
                1
            );
            $slides[] = rvb_component_html_content(
                $module,
                $slide,
                'fs-5 fw-normal lh-sm pe-lg-5 gs_reveal',
                1
            );
            $slides[] = rvb_component_button_group(
                $module,
                $slide,
                'gs_reveal',
                1
            );
            $slides[] = '</div>'; // end inner
            $slides[] = rvb_module_column_close(1);
            $slides[] = rvb_module_row_close(1);
            $slides[] = rvb_module_container_close($module, 1);
            $slides[] = !empty($slide['block_image'])
                ? '<div class="swiper-image col-7 offset-5 col-lg-8 offset-lg-4 px-0 position-absolute top-0 left-0 z-index-1 overflow-hidden h-100 px-0 gs_reveal"><img class="img-cover swiper-lazy h-100 w-100" src="' .
                    wp_get_attachment_image_url($slide['block_image'], 'full') .
                    '" data-swiper-parallax-x="-30%" /><div class="swiper-lazy-preloader"></div></div>'
                : '';
            $slides[] = '</div>'; // end swiper-slide
        }

        rvb_module_row_open('');
        rvb_module_column_open('col-12');
        echo '<div class="swiper">';
        echo '<div class="swiper-wrapper">';
        echo join('', $slides);
        echo '</div>';
        echo '</div>';
        rvb_module_column_close();
        rvb_module_row_close();
        rvb_module_row_open('');
        rvb_module_container_open($module, 'swiper-controls');
        echo '<ul class="swiper-pagination row justify-content-lg-center position-relative text-start list-unstyled py-2 py-lg-4 m-0 gs_reveal"></ul>';
        rvb_module_container_close($module);
        rvb_module_row_close();

        add_action('wp_footer', 'hero_10_js');
        function hero_10_js()
        {
            wp_enqueue_style('swipercss');
            wp_enqueue_script('swiper');?>
			<script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function() {
					var swiper = new Swiper('.hero_10 .swiper', {
						grabCursor: true,
						loop: true,
						speed: 1000,
						delay: 8000,
						parallax: true,
						autoplay: false,
						effect: 'fade',
						preloadImages: false,
						lazy: {
							loadPrevNext: true,
						},
						pagination: {
							el: '.hero_10 .swiper-pagination',
							clickable: true,
							type: 'bullets',
							renderBullet: function(index, className) {
								return (
									'<li class="col bg-transparent h-auto text-start ' +
									className +
									'">' +
									'<div class="nav-num fw-normal text-muted">0' +
									(index + 1) +
									'</div>' +
									'<div class="progress mt-2"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>' +
									'<div class="nav-excerpt text-muted mt-2 mt-lg-3 pe-lg-5">' +
									jQuery('.hero_10 .swiper-slide')
									.eq(index + 1)
									.data('excerpt') +
									'</div>' +
									'</li>'
								);
							},
						},
					});

					jQuery(window)
						.on('resize', function() {
							var hh = jQuery('.site-header').outerHeight();
							var wh = jQuery(window).height();
							var nh = jQuery('.hero_10 .swiper-pagination').outerHeight();
							var height = wh - hh - nh;

							jQuery('.hero_10 .swiper-slide').css({
								height: height + 'px'
							});
						})
						.on('resize');
				});
			</script>
		<?php
        }
    }
}

if (!function_exists('rvb_module_hero_15')) {
    function rvb_module_hero_15($options, $module, $fields)
    {
        if (empty($fields)) {
            return;
        }

        $count = count($fields['slides']);
        $slides = [];

        foreach ($fields['slides'] as $slide):
            $slides[] =
                $count > 1
                    ? '<div class="swiper-slide h-100 d-flex align-items-end justify-content-end">'
                    : '<div class="inner h-100 d-flex align-items-end justify-content-end">';
            $slides[] =
                '<div class="social-container z-index-5 me-3 mt-6 position-absolute d-flex align-items-center justify-content-between flex-nowrap flex-column gs_reveal">';
            $slides[] = rvb_component_social_icons($options, '', '', '', '', 1);
            $slides[] =
                '<span class="vertical-text d-inline-block text-uppercase font-weight-bold mt-4 small">Share</span>';
            $slides[] = '</div>';

            $slides[] =
                '<div class="col-12 col-sm-8 col-lg-8 col-xl-4 slide-content text-end position-relative z-index-5 p-lg-5">';
            $slides[] = rvb_component_heading(
                $module,
                $slide,
                'h1',
                'display-3 mb-5 gs_reveal',
                '',
                1
            );
            $slides[] = rvb_component_button_group($module, $slide, '', 1);
            $slides[] = '</div>'; // end column

            $slides[] = rvb_component_floating_image(
                $module,
                $slide,
                $slide['block_image'],
                '',
                'w-100',
                'w-100',
                1
            );
            $slides[] = '</div>';
            $slides[] = '</div>'; // end swiper-slide or inner
        endforeach;

        rvb_module_row_open('g-0');
        rvb_module_column_open('col-12 vh-100');

        echo $count > 1 ? '<div class="swiper h-100">' : '';
        echo $count > 1 ? '<div class="swiper-wrapper h-100">' : '';
        echo join('', $slides);
        echo $count > 1 ? '</div>' : ''; // end swiper-wrapper
        echo $count > 1
            ? '<div class="swiper-pagination position-absolute z-index-3 w-auto ms-lg-7 mb-5 gs_reveal"></div>'
            : '';
        echo $count > 1 ? '</div>' : ''; // end swiper

        rvb_module_column_close();
        rvb_module_row_close();

        add_action('wp_footer', 'hero_10_js');
        function hero_15_js()
        {
            wp_enqueue_style('swipercss');
            wp_enqueue_script('swiper');?>
			<script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function() {
					var swiper = new Swiper('.hero_15 .swiper', {
						direction: 'horizontal',
						grabCursor: true,
						loop: true,
						speed: 1000,
						parallax: true,
						autoplay: false,
						effect: 'fade',
						mousewheelControl: 1,
						preloadImages: false,
						lazy: {
							loadPrevNext: true,
						},
						pagination: {
							el: '.swiper-pagination',
							type: 'custom',
							clickable: true,
							renderCustom: function(swiper, current, total) {
								function numberAppend(d) {
									return d < 10 ? '0' + d.toString() : d.toString();
								}
								return (
									'<span class="swiper-pagination-current d-block mb-2">' +
									numberAppend(current) +
									'</span>' +
									'<span class="swiper-pagination-total d-block text-muted ml-5">/' +
									numberAppend(total) +
									'</span>'
								);
							},
						},
					});
				});
			</script>
<?php
        }
    }
}
