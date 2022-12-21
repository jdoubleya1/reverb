<?php

/**
 * Module: Pricing
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_pricing($module, $fields, $layout)
{
    if (empty($module) || empty($fields) || empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'pricing_3':
            rvb_module_pricing_3($module, $fields);
            break;
        case 'pricing_4':
            rvb_module_pricing_4($module, $fields);
            break;
        case 'pricing_5':
            rvb_module_pricing_5($module, $fields);
            break;
        case 'pricing_8':
            rvb_module_pricing_8($module, $fields);
            break;
        default:
            break;
    }
}

/**
 * Module: Pricing 3
 */
function rvb_module_pricing_3($module, $fields)
{
    if (empty($fields) || empty($fields['pricing'])) {
        return;
    }

    $pricing = $fields['pricing'];

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');

    for ($i = 0; $i < count($pricing); $i++):
        $item = $fields['pricing'][$i];
        $price = $item['price'];
        $term = $item['term_length'];
        $style = $item['list_bullet_style'];
        $icon = $style == 'fontawesome' ? $item['icon'] : '';
        $content = [];

        // add heading to content array
        $content[] = rvb_component_heading(
            $module,
            $item,
            'p',
            'card-title text-center mb-0',
            '',
            1
        );

        // add price to content array
        $content[] = !empty($price)
            ? '<p class="h2 text-center my-3">' .
                $price .
                (!empty($term)
                    ? '<span class="fs-xs text-muted">' . $term . '</span>'
                    : '') .
                '</p>'
            : '';

        // add sub heading to content array
        $content[] = rvb_component_sub_heading(
            $module,
            $item,
            'p',
            'card-text mb-4',
            1
        );

        // add html content to content array
        $content[] = rvb_component_html_content($module, $item, 'card-text', 1);

        // add features to content array
        if (!empty($item['features'])):
            $content[] = '<ul class="fa-ul list-group list-group-flush mb-4">';

            foreach ($item['features'] as $feature) {
                $content[] =
                    '<li class="list-group-item lh-sm border-0 text-start bg-transparent"><span class="fa-li ' .
                    $icon .
                    '"></span>' .
                    $feature['feature'] .
                    '</li>';
            }

            $content[] = '</ul>';
        endif;

        rvb_module_column_open('col-12 col-lg-4 offset-lg-4');
        rvb_component_card(
            $module,
            $card_class = 'h-100 shadow-0 bg-transparent text-center gs_reveal',
            $card_header_class = '',
            $card_body_class = '',
            $card_footer_class = 'border-0',
            '',
            join('', $content),
            '',
            rvb_component_button_group($module, $item, 'd-block', 1),
            0
        );
        rvb_module_column_close();
    endfor;

    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Pricing 4
 */
function rvb_module_pricing_4($module, $fields)
{
    if (empty($fields) || empty($fields['pricing'])) {
        return;
    }

    $pricing = $fields['pricing'];
    $theme = $module['style'] == 'dark' ? 'bg-light' : 'bg-dark';

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('justify-content-around');

    echo '<div class="seperator d-none d-lg-block"><hr class="' .
        $theme .
        '"/></div>';

    for ($i = 0; $i < count($pricing); $i++):
        $item = $fields['pricing'][$i];
        $price = $item['price'];
        $term = $item['term_length'];
        $style = $item['list_bullet_style'];
        $icon = $style == 'fontawesome' ? $item['icon'] : '';
        $content = [];

        // add heading to content array
        $content[] = rvb_component_heading(
            $module,
            $item,
            'p',
            'card-title text-center mb-0',
            '',
            1
        );

        // add price to content array
        $content[] = !empty($price)
            ? '<p class="h2 text-center my-3">' .
                $price .
                (!empty($term)
                    ? '<span class="fs-xs text-muted">' . $term . '</span>'
                    : '') .
                '</p>'
            : '';

        // add sub heading to content array
        $content[] = rvb_component_sub_heading(
            $module,
            $item,
            'p',
            'card-text mb-4',
            1
        );

        // add html content to content array
        $content[] = rvb_component_html_content($module, $item, 'card-text', 1);

        // add features to content array
        if (!empty($item['features'])):
            $content[] = '<ul class="fa-ul list-group list-group-flush mb-4">';

            foreach ($item['features'] as $feature) {
                $content[] =
                    '<li class="list-group-item lh-sm border-0 text-start bg-transparent"><span class="fa-li ' .
                    $icon .
                    '"></span>' .
                    $feature['feature'] .
                    '</li>';
            }

            $content[] = '</ul>';
        endif;

        rvb_module_column_open('col-12 col-lg-4');
        rvb_component_card(
            $module,
            $card_class = 'h-100 shadow-0 bg-transparent text-center gs_reveal',
            $card_header_class = '',
            $card_body_class = '',
            $card_footer_class = 'border-0',
            '',
            join('', $content),
            '',
            rvb_component_button_group($module, $item, 'd-block', 1),
            0
        );
        rvb_module_column_close();
    endfor;

    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Pricing 5
 */
function rvb_module_pricing_5($module, $fields)
{
    if (empty($fields) || empty($fields['pricing'])) {
        return;
    }

    $pricing = $fields['pricing'];
    $theme = $module['style'] == 'dark' ? 'bg-light' : 'bg-dark';

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');

    for ($i = 0; $i < count($pricing); $i++):
        $item = $fields['pricing'][$i];
        $price = $item['price'];
        $term = $item['term_length'];
        $style = $item['list_bullet_style'];
        $icon = $style == 'fontawesome' ? $item['icon'] : '';
        $content = [];

        // add icon to content array
        $content[] = rvb_component_icon($module, $item, 'mb-3', 'fa-3x', 1);

        // add heading to content array
        $content[] = rvb_component_heading(
            $module,
            $item,
            'h5',
            'card-title text-center mb-3 rvb-title',
            '',
            1
        );

        // add sub heading to content array
        $content[] = rvb_component_sub_heading(
            $module,
            $item,
            'p',
            'card-text mb-4 rvb-subheading',
            1
        );

        // add html content to content array
        $content[] = rvb_component_html_content(
            $module,
            $item,
            'card-text rvb-content',
            1
        );

        // add features to content array
        if (!empty($item['features'])):
            $content[] =
                '<ul class="fa-ul list-group list-group-flush mb-4 rvb-features">';

            foreach ($item['features'] as $feature) {
                $content[] =
                    '<li class="list-group-item lh-sm border-0 text-start bg-transparent"><span class="fa-li ' .
                    $icon .
                    '"></span>' .
                    $feature['feature'] .
                    '</li>';
            }

            $content[] = '</ul>';
        endif;

        // add price to content array
        $content[] = !empty($price)
            ? '<p class="h3 text-center mt-3 mb-2 rvb-price">' .
                $price .
                (!empty($term)
                    ? '<span class="fs-xs text-muted">' . $term . '</span>'
                    : '') .
                '</p>'
            : '';

        rvb_module_column_open('col-12 col-lg-4');
        rvb_component_card(
            $module,
            $card_class = 'h-100 shadow-0 bg-transparent text-center gs_reveal',
            $card_header_class = '',
            $card_body_class = 'p-0',
            $card_footer_class = 'border-0',
            '',
            join('', $content),
            '',
            rvb_component_button_group($module, $item, 'd-block', 1),
            0
        );
        rvb_module_column_close();
    endfor;

    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Pricing 8
 */
function rvb_module_pricing_8($module, $fields)
{
    if (empty($fields) || empty($fields['pricing'])) {
        return;
    }

    $pricing = $fields['pricing'];
    $theme = $module['style'] == 'dark' ? 'text-light' : 'text-dark';

    rvb_module_container_open($module, 'py-5');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-xl-3 pt-lg-7 pb-5 d-flex flex-column justify-content-between'
    );
    rvb_module_column_open('');
    rvb_component_heading($module, $fields, 'h4', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'lh-sm gs_reveal', 0);
    rvb_module_column_close();
    rvb_component_button_group($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-xl-9');
    rvb_module_row_open(
        'row-cols-1 row-cols-md-3 g-3 position-relative cards-container'
    );
    echo '<div class="bg-active h-100 position-absolute top-0 left-0 bg-primary d-none d-lg-block" style="opacity:0.3;"></div>';

    for ($i = 0; $i < count($pricing); $i++):
        $item = $fields['pricing'][$i];
        $price = $item['price'];
        $term = $item['term_length'];
        $style = $item['list_bullet_style'];
        $icon = $style == 'fontawesome' ? $item['icon'] : '';
        $content = [];

        // add heading to content array
        $content[] = rvb_component_heading(
            $module,
            $item,
            'p',
            'card-title text-center mb-0',
            '',
            1
        );

        // add price to content array
        $content[] = !empty($price)
            ? '<p class="h2 text-center my-3">' .
                $price .
                (!empty($term)
                    ? '<span class="fs-xs text-muted">' . $term . '</span>'
                    : '') .
                '</p>'
            : '';

        // ad sub heading to content array
        $content[] = rvb_component_sub_heading(
            $module,
            $item,
            'p',
            'card-text mb-4',
            1
        );

        // add features to content array
        if (!empty($item['features'])):
            $content[] = '<ul class="fa-ul list-group list-group-flush mb-4">';

            foreach ($item['features'] as $feature) {
                $content[] =
                    '<li class="list-group-item lh-sm border-0 text-start bg-transparent ' .
                    $theme .
                    '"><span class="fa-li ' .
                    $icon .
                    '"></span>' .
                    $feature['feature'] .
                    '</li>';
            }

            $content[] = '</ul>';
        endif;

        rvb_module_column_open('col');
        rvb_component_card(
            $module,
            $card_class = 'h-100 shadow-0 bg-transparent gs_reveal',
            $card_header_class = '',
            $card_body_class = '',
            $card_footer_class = 'border-0',
            '',
            join('', $content),
            '',
            rvb_component_button_group($module, $item, 'd-block', 1),
            0
        );
        rvb_module_column_close();
    endfor;

    rvb_module_row_close();
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);

    add_action('wp_footer', 'pricing_8_js');
    function pricing_8_js()
    {
        ?>

			<script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function() {
                    if (jQuery('.pricing_8').length > 0) {
                    jQuery('.pricing_8').each(function (index, value) {
                        var bg = jQuery(value).find('.bg-active')
                        var container = jQuery(value).find('.cards-container')
                        var cards = jQuery(value).find('.card')

                        cards.hover(function () {
                        var childPos = jQuery(this).offset()
                        var childWidth = jQuery(this).outerWidth()
                        var parentPos = container.offset()
                        var childOffset = childPos.left - parentPos.left

                        bg.stop().animate(
                            {
                            left: childOffset,
                            width: childWidth,
                            },
                            '150',
                        )
                        })
                    })
                    }    
				});
			</script>
		<?php
    }
}
