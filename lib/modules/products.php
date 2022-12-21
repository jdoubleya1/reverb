<?php

/**
 * Module: Products
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_products($module, $fields, $layout)
{
    if (empty($module) || empty($layout)) {
        return;
    }

    if (
        !in_array(
            'woocommerce/woocommerce.php',
            apply_filters('active_plugins', get_option('active_plugins'))
        )
    ) {
        echo '<div class="p-3 m-5 bg-danger rounded w-auto d-inline-flex text-light">Woocommerce must be installed and activated to use this block.</div>';
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'products_1':
            rvb_module_products_1($module, $fields);
            break;
        case 'products_2':
            rvb_module_products_2($module, $fields);
            break;
        case 'products_3':
            rvb_module_products_3($module, $fields);
            break;
        case 'products_5':
            rvb_module_products_5($module, $fields);
            break;
        case 'products_6':
            rvb_module_products_6($module, $fields);
            break;
        case 'products_7':
            rvb_module_products_7($module, $fields);
            break;
        case 'products_8':
            rvb_module_products_8($module, $fields);
            break;
        case 'products_9':
            rvb_module_products_9($module, $fields);
            break;
        case 'products_10':
            rvb_module_products_10($module, $fields);
            break;
    }
}

/**
 * Module: Products 1
 */
function rvb_module_products_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_products($module, $fields, 5, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 2
 */
function rvb_module_products_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 text-center');
    rvb_component_heading($module, $fields, 'h4', 'mb-5 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    rvb_component_products($module, $fields, 5, 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 3
 */
function rvb_module_products_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_button_group($module, $fields, 'mb-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12');
    echo '<i class="fa-regular fa-chevron-left nav-left"></i>';
    rvb_component_products($module, $fields, 4, '');
    echo '<i class="fa-regular fa-chevron-right nav-right"></i>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);

    add_action('wp_footer', 'products_3_js');
    function products_3_js()
    {
        wp_enqueue_style('swipercss');
        wp_enqueue_script('swiper');?>
		
        <script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function() {
				
					var t = jQuery(".products_3");
					var products = t.find(".products");
					var product = products.children("li");

					t.find(".woocommerce").attr("class", "woocommerce swiper");

					products.replaceTag('<div class="swiper-wrapper py-4">', false);

					product.replaceTag('<div class="swiper-slide border">', false);

					products.each(function () {
						jQuery(this)
							.find("img")
							.addClass("swiper-lazy")
							.attr("data-src", jQuery(this).attr("src"))
							.attr("src", "");
					});

					var p3Swiper = new Swiper(".products_3 .swiper", {
						init: false,
						loop: true,
						speed: 1100,
						spaceBetween: 30,
                        slidesPerView: 'auto',
						preloadImages: false,
						lazy: true,
						navigation: {
							nextEl: ".nav-next",
							prevEl: ".nav-prev",
						},
						breakpoints: {
							992: {
								slidesPerView: 4,
							},
							768: {
								slidesPerView: 2,
							},
						},
					});

					p3Swiper.init();
				});
			</script>
		<?php
    }
}

/**
 * Module: Products 5
 */
function rvb_module_products_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_products($module, $fields, 4, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 6
 */
function rvb_module_products_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    $theme =
        $module['style'] == 'dark'
            ? 'bg-light text-dark'
            : 'bg-dark text-light';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open(
        'col-12 col-lg-6 text-center py-4 px-md-4 p-lg-8 ' . $theme
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-0 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mt-3 gs_reveal', 0);
    rvb_component_button_group($module, $fields, 'mt-5 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_products($module, $fields, 2, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 7
 */
function rvb_module_products_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12');
    rvb_component_products($module, $fields, 3, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 8
 */
function rvb_module_products_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 text-center');
    rvb_component_products($module, $fields, 2, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 9
 */
function rvb_module_products_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-5 gs_reveal', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 text-center');
    rvb_component_products($module, $fields, 2, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Products 10
 */
function rvb_module_products_10($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1');
    rvb_component_products($module, $fields, 2, '');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
