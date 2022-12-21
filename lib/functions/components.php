<?php

/**
 * Components
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Component : Heading
 */
if (!function_exists('rvb_component_heading')) {
    function rvb_component_heading(
        $module,
        $fields,
        $type,
        $class,
        $tagline_class = '',
        $return = 0
    ) {
        if (empty($fields['heading'])) {
            return;
        }

        $heading = [];
        $classes = ['heading'];
        $classes[] = !empty($class) ? $class : '';
        $classes[] = !empty($fields['heading_class'])
            ? $fields['heading_class']
            : '';
        $classes[] = !empty($fields['display_type'])
            ? $fields['display_type']
            : '';
        $classes[] = !empty($fields['heading_align'])
            ? $fields['heading_align']
            : '';
        $tagline_classes = ['tagline'];
        $tagline_classes[] = $tagline_class;

        $type = !empty($fields['heading_type'])
            ? $fields['heading_type']
            : $type;
        $text = !empty($fields['heading']) ? $fields['heading'] : '';

        $heading[] = !empty($fields['tagline'])
            ? '<p class="' .
                join(' ', $tagline_classes) .
                '">' .
                $fields['tagline'] .
                '</p>'
            : '';
        $heading[] =
            '<' .
            $type .
            ' class="' .
            join(' ', $classes) .
            '">' .
            $text .
            '</' .
            $type .
            '>';

        if ($return == 1) {
            return join('', $heading);
        }

        echo join('', $heading);
    }
}

/**
 * Component : Sub Heading
 */
if (!function_exists('rvb_component_sub_heading')) {
    function rvb_component_sub_heading($module, $fields, $type, $class, $return)
    {
        if (empty($fields['sub_heading'])) {
            return;
        }

        $classes = ['sub_heading'];
        $classes[] = !empty($class) ? $class : false;

        if ($return == 1) {
            return '<p class="' .
                join(' ', $classes) .
                '" role="heading">' .
                $fields['sub_heading'] .
                '</p>';
        } else {
            echo '<p class="' .
                join(' ', $classes) .
                '" role="heading">' .
                $fields['sub_heading'] .
                '</p>';
        }
    }
}

/**
 * Component : HTML Content
 */
if (!function_exists('rvb_component_html_content')) {
    function rvb_component_html_content($module, $fields, $class, $return)
    {
        if (empty($fields['html_content'])) {
            return;
        }

        $classes = ['html-content'];
        $classes[] = !empty($class) ? $class : false;

        $content =
            '<div class="' .
            join(' ', $classes) .
            '">' .
            $fields['html_content'] .
            '</div>';

        if ($return == 1) {
            return $content;
        } else {
            echo $content;
        }
    }
}

/**
 * Component : Unordered List
 */
if (!function_exists('rvb_component_unordered_list')) {
    function rvb_component_unordered_list(
        $module,
        $fields,
        $class,
        $item_class,
        $title_class,
        $excerpt_class,
        $button_class,
        $return
    ) {
        if (empty($fields['list_items'])) {
            return;
        }

        $items = [];
        $classes = [''];
        $classes[] = !empty($class) ? $class : false;
        $classes[] = !empty($fields['list_bullet_style'])
            ? $fields['list_bullet_style']
            : false;
        $style = !empty($fields['list_bullet_style'])
            ? $fields['list_bullet_style']
            : '';
        $el = 'ul';

        if (!empty($style)) {
            switch ($style) {
                case 'font-awesome':
                    $classes[] = 'fa-ul';
                    break;
                case 'image':
                    $classes[] = 'list-unstyled';
                    break;
                case 'numbered':
                    $el = 'ol';
                    break;
            }
        }

        foreach ($fields['list_items'] as $item) {
            $items[] = '<li class="list-item ' . $item_class . '">';
            $items[] =
                $style == 'font-awesome' && !empty($item['icon'])
                    ? '<span class="fa-li icon"><i class="' .
                        $item['icon'] .
                        '"></i></span>'
                    : '';
            $items[] =
                $style == 'image' && !empty($item['block_image'])
                    ? wp_get_attachment_image(
                        $item['block_image'],
                        ['68', '55'],
                        '',
                        ['class' => 'img-fluid']
                    )
                    : '';
            $items[] = !empty($item['list_item'])
                ? '<p class="' .
                    $title_class .
                    '">' .
                    $item['list_item'] .
                    '</p>'
                : '';
            $items[] = !empty($item['excerpt'])
                ? '<p class="' .
                    $excerpt_class .
                    '">' .
                    $item['excerpt'] .
                    '</p>'
                : '';
            $items[] = rvb_component_button_group(
                $module,
                $item,
                $button_class,
                1
            );
            $items[] = '</li>';
        }

        $list =
            '<' .
            $el .
            ' class="' .
            join(' ', $classes) .
            '">' .
            (!empty($fields['list_title'])
                ? '<h6 class="list-title ' .
                    $title_class .
                    '">' .
                    $fields['list_title'] .
                    '</h6>'
                : '') .
            join('', $items) .
            '</' .
            $el .
            '>';

        if ($return == 1) {
            return $list;
        } else {
            echo $list;
        }
    }
}

/**
 * Component : Icon List
 */
if (!function_exists('rvb_component_icon_list')) {
    function rvb_component_icon_list(
        $module,
        $fields,
        $class,
        $item_class,
        $title_class,
        $excerpt_class,
        $link_class
    ) {
        if (empty($fields['list_items'])) {
            return;
        }

        $items = [];
        $classes = ['fa-ul'];
        $classes[] = !empty($class) ? $class : false;

        foreach ($fields['list_items'] as $item) {
            $items[] = '<li class="' . $item_class . '">';
            $items[] = !empty($item['icon'])
                ? '<span class="fa-li"><i class="' .
                    $item['icon'] .
                    '"></i></span>'
                : false;
            // $items[] = '<a href="#!">sdfsdf</a>';
            $items[] = !empty($item['list_item'])
                ? '<p class="' .
                    $title_class .
                    '">' .
                    $item['list_item'] .
                    '</p>'
                : false;
            $items[] = !empty($item['excerpt'])
                ? '<p class="' .
                    $excerpt_class .
                    '">' .
                    $item['excerpt'] .
                    '</p>'
                : false;
            $items[] = '</li>';
        }

        echo '<ul class="' .
            join(' ', $classes) .
            '">' .
            join('', $items) .
            '</ul>';
    }
}

/**
 * Component : Form
 */
if (!function_exists('rvb_component_form')) {
    function rvb_component_form($module, $fields, $container_class)
    {
        if (empty($fields['form'])) {
            return;
        }

        echo '<div class="' . $container_class . '">';
        echo do_shortcode(
            '[gravityform id="' .
                $fields['form'] .
                '" title="false" description="false" ajax="true" tabindex="0"]'
        );
        echo '</div>';
    }
}

/**
 * Component Button Group
 */
if (!function_exists('rvb_component_button_group')) {
    function rvb_component_button_group($module, $fields, $class, $return)
    {
        if (empty($fields['button_group']['buttons'])) {
            return;
        }

        // Button group wrapper class
        $groupClass = ['button-group d-grid gap-2'];
        $groupClass[] = !empty($fields['button_group']['button_wrap'])
            ? $fields['button_group']['button_wrap']
            : '';
        $groupClass[] = !empty($fields['button_group']['button_wrapper_class'])
            ? $fields['button_group']['button_wrapper_class']
            : '';
        $groupClass[] = !empty($class) ? $class : false;

        // button group wrapper open
        $btns = ['<div class="' . join(' ', $groupClass) . '">'];

        foreach ($fields['button_group']['buttons'] as $button) {
            // button class
            $classes = ['me-lg-2'];
            $classes[] = !empty($button['button_size'])
                ? $button['button_size']
                : false;
            $classes[] = !empty($button['button_style'])
                ? $button['button_style']
                : false;
            $classes[] = !empty($button['button_class'])
                ? $button['button_class']
                : false;

            // button attributes
            $attributes = [''];
            $attributes[] = !empty($button['button_link']['url'])
                ? 'href="' . $button['button_link']['url'] . '"'
                : false;
            $attributes[] = !empty($button['button_link']['title'])
                ? 'title="' . $button['button_link']['title'] . '"'
                : false;
            $attributes[] = !empty($button['button_link']['target'])
                ? 'target="_blank"'
                : false;

            // button type
            $type = !empty($button['button_type'])
                ? $button['button_type']
                : '';

            // button text
            $text = !empty($button['button_link']['title'])
                ? $button['button_link']['title']
                : '';

            // button icon
            $icon = !empty($button['button_icon'])
                ? '<i class="' . $button['button_icon'] . ' ms-2"></i>'
                : '';

            // modal
            if ($type == 'modal') {
                $id = $button['unique_id'];
                $bodyClass = $button['modal_body_class'];
                $theme = $button['modal_skin_theme'];

                $btns[] =
                    '<button type="button" class="' .
                    join(' ', $classes) .
                    '" data-mdb-toggle="modal" data-mdb-target="#modal' .
                    $id .
                    '">' .
                    $text .
                    '</button>';
                $btns[] =
                    '<div class="modal fade" id="modal' .
                    $id .
                    '" tabindex="-1" aria-labelledby="modal' .
                    $id .
                    'Label" aria-hidden="true">';
                $btns[] =
                    '<div class="modal-dialog modal-dialog-scrollable ' .
                    $button['modal_location'] .
                    ' ' .
                    $button['modal_size'] .
                    '">';
                $btns[] = '<div class="modal-content ' . $theme . '">';
                $btns[] = '<div class="modal-header border-0 text-end">';
                $btns[] =
                    '<button type="button" class="bg-transparent p-0 ms-auto border-0 ' .
                    $theme .
                    '" data-mdb-dismiss="modal" aria-label="Close"><i class="fal fa-2x fa-times"></i></button>';
                $btns[] = '</div>';
                $btns[] =
                    '<div class="modal-body ' .
                    $bodyClass .
                    '">' .
                    $button['modal_content'] .
                    '</div>';
                $btns[] = '</div>';
                $btns[] = '</div>';
                $btns[] = '</div>';
            } else {
                $btns[] =
                    '<a ' .
                    join(' ', $attributes) .
                    ' class="' .
                    join(' ', $classes) .
                    '" role="button">' .
                    $text .
                    $icon .
                    '</a>';
            }
        }

        // Button group wrapper close
        $btns[] = '</div>';

        if ($return == 1) {
            return join('', $btns);
        } else {
            echo join('', $btns);
        }
    }
}

/**
 * Component : Image
 */
if (!function_exists('rvb_component_image')) {
    function rvb_component_image(
        $fields,
        $id,
        $size,
        $container_class,
        $class,
        $return = 0
    ) {
        if (empty($id)) {
            return;
        }

        $image = [];
        $atts = [];
        $img_classes = [];

        $img_classes[] = !empty($fields['image_fit'])
            ? $fields['image_fit']
            : 'img-cover w-100 h-100';
        $img_classes[] = !empty($class) ? $class : '';
        $img_classes[] = !empty($fields['image_shadow'])
            ? $fields['image_shadow']
            : '';
        $img_classes[] = !empty($fields['image_shape'])
            ? $fields['image_shape']
            : '';

        $container_classes = ['img-container position-relative'];
        $container_classes[] = !empty($container_class) ? $container_class : '';
        $container_classes[] = !empty($fields['image_shadow']) ? 'p-3' : '';
        $container_classes[] = !empty($fields['image_animation'])
            ? 'gs_img_reveal ' . $fields['image_animation']
            : '';
        $container_classes[] =
            !empty($fields['image_ripple']) && $fields['image_ripple'] == 1
                ? 'ripple'
                : '';
        $container_classes[] =
            !empty($fields['image_hover_overlay']) &&
            $fields['image_hover_overlay'] == 1
                ? 'hover-overlay'
                : '';
        $container_classes[] =
            !empty($fields['image_shadow_hover_effect']) &&
            $fields['image_shadow_hover_effect'] == 1
                ? 'hover-shadow'
                : '';

        $atts[] = !empty($fields['image_ripple_color'])
            ? 'data-mdb-ripple-color="' . $fields['image_ripple_color'] . '"'
            : '';

        $atts[] = !empty($fields['image_ripple_duration'])
            ? 'data-mdb-ripple-duration="' .
                $fields['image_ripple_duration'] .
                '"'
            : '';

        $size = !empty($size) ? $size : 'full';

        $image[] =
            '<div class="' .
            join(' ', $container_classes) .
            '"' .
            (!empty($atts) ? join(' ', $atts) : '') .
            '>';
        $image[] = wp_get_attachment_image($id, $size, false, [
            'class' => join(' ', $img_classes),
        ]);
        $image[] = image_mask($fields);
        $image[] = hover_overlay($fields);
        $image[] = '</div>'; // end image container

        if ($return == 1) {
            return join('', $image);
        }

        echo join('', $image);
    }
}

/**
 * Component : Image Caption
 */
if (!function_exists('rvb_component_image_caption')) {
    function rvb_component_image_caption($id, $class)
    {
        if (empty($id)) {
            return;
        }

        echo '<p class="' .
            $class .
            '">' .
            wp_get_attachment_caption($id) .
            '</p>';
    }
}

if (!function_exists('image_mask')) {
    function image_mask($fields)
    {
        if (empty($fields['image_mask'])) {
            return;
        }

        $mask =
            '<div class="mask"' .
            (!empty($fields['image_mask_color'])
                ? ' style="background-color:' .
                    $fields['image_mask_color'] .
                    '"'
                : '') .
            '></div>';

        return $mask;
    }
}

/**
 * Component : Hover Overlay
 */
if (!function_exists('hover_overlay')) {
    function hover_overlay($fields)
    {
        if (empty($fields['image_hover_overlay'])) {
            return;
        }

        $overlay =
            '<div class="mask"' .
            (!empty($fields['image_hover_overlay_color'])
                ? ' style="background-color:' .
                    $fields['image_hover_overlay_color'] .
                    '"'
                : '') .
            '></div>';

        return $overlay;
    }
}

/**
 * Component : Floating Image
 */
if (!function_exists('rvb_component_floating_image')) {
    function rvb_component_floating_image(
        $module,
        $fields,
        $id,
        $size = 'large',
        $container_class = '',
        $img_class = '',
        $return = 0
    ) {
        if (empty($id)) {
            return;
        }

        $classes = ['floating-img overflow-hidden z-index-3'];
        $classes[] = !empty($container_class) ? $container_class : false;
        $classes[] = !empty($fields['image_shadow'])
            ? $fields['image_shadow']
            : false;
        $classes[] =
            !empty($fields['image_shadow_hover_effect']) &&
            $fields['image_shadow_hover_effect'] == 1
                ? 'hover-shadow'
                : false;
        $classes[] = !empty($fields['image_shape'])
            ? $fields['image_shape']
            : false;
        $classes[] =
            !empty($fields['image_ripple']) && $fields['image_ripple'] == 1
                ? 'ripple'
                : false;
        $classes[] =
            !empty($fields['image_hover_overlay']) &&
            $fields['image_hover_overlay'] == 1
                ? 'hover-overlay'
                : false;

        $img_classes = ['img-cover w-100 h-100'];
        $img_classes[] = !empty($img_class) ? $img_class : false;

        $size = !empty($size) ? $size : 'full';

        $img = wp_get_attachment_image($id, $size, '', [
            'class' => join(' ', $img_classes),
        ]);

        if ($return == 1) {
            return '<div class="' .
                join(' ', $classes) .
                '">' .
                $img .
                '</div>';
        } else {
            echo '<div class="' . join(' ', $classes) . '">' . $img . '</div>';
        }
    }
}

/**
 * Component : Features
 */
if (!function_exists('rvb_component_features')) {
    function rvb_component_features(
        $module,
        $fields,
        $class,
        $itemClass,
        $cardClass,
        $cardHeaderClass,
        $cardBodyClass,
        $iconClass,
        $iconSize,
        $headingClass,
        $headingType,
        $excerptClass,
        $linkClass
    ) {
        if (empty($fields['features'])) {
            return;
        }

        $features = [];

        foreach ($fields['features'] as $feature) {
            $classes = ['features'];
            $classes[] = !empty($class) ? $class : false;

            $itemClasses = ['feature'];
            $itemClasses[] = !empty($itemClass) ? $itemClass : false;

            $cardHeaderClasses = ['card-header'];
            $cardHeaderClasses[] = !empty($cardHeaderClass)
                ? $cardHeaderClass
                : false;

            $cardBodyClasses = ['card-body'];
            $cardBodyClasses[] = !empty($cardBodyClass)
                ? $cardBodyClass
                : false;

            $cardClasses = ['card'];
            $cardClasses[] = !empty($cardClass) ? $cardClass : false;
            $cardClasses[] = !empty($feature['card_options']['style'])
                ? $feature['card_options']['style']
                : '';
            $cardClasses[] = !empty($feature['card_options']['shadow'])
                ? $feature['card_options']['shadow']
                : '';
            $cardClasses[] = !empty(
                $feature['card_options']['add_hover_shadow']
            )
                ? 'hover-shadow'
                : '';

            // card attributes
            $card_atts = !empty($feature['card_options']['background_color'])
                ? ' data-bgcolor="' .
                    $feature['card_options']['background_color'] .
                    '"'
                : '';

            // features
            $features[] = '<div class="' . join(' ', $itemClasses) . '">';
            $features[] =
                '<div class="' .
                join(' ', $cardClasses) .
                '"' .
                $card_atts .
                '>';
            $features[] =
                '<div class="' . join(' ', $cardHeaderClasses) . ' border-0">';
            $features[] =
                $feature['icon_type'] == 'image'
                    ? rvb_component_image(
                        $feature,
                        $feature['icon_image'],
                        '',
                        'icon',
                        '',
                        1
                    )
                    : '';
            $features[] =
                $feature['icon_type'] == 'fontawesome'
                    ? rvb_component_icon(
                        $module,
                        $feature,
                        'icon ' . $iconClass,
                        $iconSize,
                        1
                    )
                    : '';
            $features[] = '</div>'; // end card-header

            // card body
            $features[] =
                '<div class="' . join(' ', $cardBodyClasses) . ' border-0">';

            // card title
            $features[] = rvb_component_heading(
                $module,
                $feature,
                $headingType,
                $headingClass,
                '',
                1
            );

            // html content
            $features[] = rvb_component_html_content(
                $module,
                $feature,
                $excerptClass,
                1
            );
            $features[] = !empty($feature['link'])
                ? '<a href="' .
                    $feature['link']['url'] .
                    '" title="' .
                    $feature['link']['title'] .
                    '" class="' .
                    $linkClass .
                    '"></a>'
                : false;
            $features[] = '</div>'; // end card-body
            $features[] = !empty($feature['background_image'])
                ? rvb_module_background_image(
                    $feature['background_image'],
                    'full',
                    'center',
                    1
                )
                : '';
            $features[] = '</div>'; // end card
            $features[] = '</div>';
        }

        echo !empty($fields['features_heading'])
            ? '<h6>' . $fields['features_heading'] . '</h6>'
            : '';

        echo $features
            ? '<div class="' .
                join(' ', $classes) .
                '">' .
                join($features) .
                '</div>'
            : '';
    }
}

/**
 * Component : Icon
 */
if (!function_exists('rvb_component_icon')) {
    function rvb_component_icon($module, $fields, $class, $size, $return)
    {
        if (empty($fields['icon'])) {
            return;
        }

        if (empty($return) || $return == 0) {
            echo '<div class="icon ' .
                $class .
                '"><i class="' .
                $fields['icon'] .
                ' ' .
                $size .
                '"></i></div>';
        } else {
            return '<div class="icon ' .
                $class .
                '"><i class="' .
                $fields['icon'] .
                ' ' .
                $size .
                '"></i></div>';
        }
    }
}

/**
 * Component : Accordion
 */
if (!function_exists('rvb_component_accordion')) {
    function rvb_component_accordion($module, $fields, $class)
    {
        if (empty($fields['accordion'])) {
            return;
        }

        $id = $module['unique_id'];

        // accordion wrapper
        $accordion =
            '<div class="accordion accordion-flush" id="accordion_' .
            $id .
            '">';

        // accordion items
        for ($i = 0; $i < count($fields['accordion']); $i++) {
            $title = !empty($fields['accordion'][$i]['title'])
                ? $fields['accordion'][$i]['title']
                : '';
            $content = !empty($fields['accordion'][$i]['content'])
                ? $fields['accordion'][$i]['content']
                : '';

            $accordion .=
                '<div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading' .
                $i .
                '">
                <button class="accordion-button collapsed text-start fs-5 py-4 lh-sm" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapse' .
                $i .
                '" aria-expanded="false" aria-controls="flush-collapse' .
                $i .
                '">' .
                $title .
                '</button>
                </h2>
                <div id="flush-collapse' .
                $i .
                '" class="accordion-collapse collapse" aria-labelledby="flush-heading' .
                $i .
                '" data-mdb-parent="#accordion_' .
                $id .
                '">
                <div class="accordion-body text-start">' .
                $content .
                '</div>
                </div>
            </div>';
        }

        // close accordion wrapper
        $accordion .= '</div>';

        echo $accordion;
    }
}

/**
 * Component : Gallery
 */
if (!function_exists('rvb_component_gallery')) {
    function rvb_component_gallery(
        $module,
        $fields,
        $type = 'grid',
        $img_size = 'large',
        $class = '',
        $img_class = '',
        $return = 0
    ) {
        if (empty($fields) || empty($fields['gallery_source'])) {
            return;
        }

        $source = $fields['gallery_source'];
        $items = [];
        $return = [];

        // Item wrap
        switch ($type) {
            case 'slider':
                wp_enqueue_style('swipercss');
                wp_enqueue_script('swiper');

                $wrap_open = '<div class="swiper-slide px-0">';
                $wrap_close = '</div>';
                break;
            case 'grid':
                $wrap_open = '<div class="grid-item col">';
                $wrap_close = '</div>';
                break;
            case 'lightbox':
                $wrap_open = '<div class="grid-item col">';
                $wrap_close = '</div>';
                break;
            default:
                $wrap_open = '<div>';
                $wrap_close = '</div>';
                break;
        }

        // Gallery Items
        switch ($source) {
            case 'custom':
                $gallery = $fields['custom_gallery'];

                if (empty($gallery)) {
                    break;
                }

                foreach ($gallery as $item) {
                    $items[] = $wrap_open;
                    $items[] = wp_get_attachment_image(
                        $item['id'],
                        'full',
                        '',
                        ['class' => 'img-cover w-100 h-100']
                    );
                    $items[] = $wrap_close;
                }

                break;
            case 'portfolio':
                $portfolio = $fields['select_a_portfolio'];

                foreach ($portfolio as $item) {
                    $items[] = get_field('gallery', $item->ID);
                }

                break;
            case 'gallery':
                $gallery = $fields['select_a_gallery'];

                if (empty($gallery)) {
                    break;
                }

                foreach ($gallery as $item) {
                    $items[] = $wrap_open;
                    $items[] =
                        '<div class="mask z-index-2 p-4 p-lg-5 d-flex align-items-start justify-content-end flex-column" style="background:rgba(0,0,0,0.2);">';
                    $items[] =
                        '<h5 class="text-white">' .
                        get_the_title($item->ID) .
                        '</h5>';
                    $items[] =
                        '<a href="' .
                        get_the_permalink($item->ID) .
                        '" class="btn btn-outline-white mt-3">View full ' .
                        get_the_title($item->ID) .
                        ' gallery</a>';
                    $items[] = '</div>'; // end mask
                    $items[] = wp_get_attachment_image($item->ID, 'full', '', [
                        'class' => 'img-cover w-100 h-100',
                    ]);
                    $items[] = $wrap_close;
                }

                break;
            default:
                break;
        }

        // Open container
        $return[] =
            $type == 'slider'
                ? '<div class="swiper ' .
                    $class .
                    '"><div class="swiper-wrapper d-flex align-items-center">'
                : '';
        $return[] = $type == 'grid' ? '<div class="row ' . $class . '">' : '';
        $return[] =
            $type == 'lightbox'
                ? '<div class="lightbox"><div class="row ' . $class . '">'
                : '';
        $return[] = join('', $items);
        $return[] =
            $type == 'slider'
                ? '</div><div class="swiper-pagination"></div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div></div>'
                : '';
        $return[] = $type == 'grid' ? '</div>' : '';
        $return[] = $type == 'lightbox' ? '</div></div>' : '';

        if ($return == 1) {
            return $return;
        } else {
            echo join('', $return);
        }
    }
}

/**
 * Gallery Source
 */
if (!function_exists('rvb_component_gallery_source')) {
    function rvb_component_gallery_source($fields)
    {
        if (empty($fields)) {
            return;
        }

        $source = $fields['gallery_source'];

        // Gallery Items
        switch ($source) {
            case 'custom':
                $gallery = $fields['custom_gallery'];

                if (empty($gallery)) {
                    break;
                }

                for ($i = 0; $i < count($gallery); $i++) {
                    $image = $gallery[$i]['id'];

                    $items[$i]['id'] = '';
                    $items[$i]['title'] = $gallery[$i]['title'];
                    $items[$i]['content'] = $gallery[$i]['description'];
                    $items[$i]['image'] = $image;
                }

                break;
            case 'portfolio':
                $gallery = $fields['select_a_portfolio'];

                if (empty($gallery)) {
                    break;
                }

                foreach ($gallery as $item) {
                    $items[] = get_field('gallery', $item->ID);
                }

                break;
            case 'gallery':
                $gallery = $fields['select_a_gallery'];

                if (empty($gallery)) {
                    break;
                }

                foreach ($gallery as $item) {
                    $items[] = $item->ID;
                }

                break;
            case 'menu_items':
                $gallery = $fields['select_menu_items'];

                for ($i = 0; $i < count($gallery); $i++) {
                    $id = $gallery[$i];
                    $meta = get_post($id);
                    $title = $meta->post_title;
                    $content = $meta->post_content;
                    $image = get_post_thumbnail_id($id);

                    $items[$i]['id'] = $id;
                    $items[$i]['title'] = $title;
                    $items[$i]['content'] = $content;
                    $items[$i]['image'] = $image;
                }

                break;
            default:
                break;
        }

        return $items;
    }
}

/**
 * Component : Video
 */
if (!function_exists('rvb_component_video')) {
    function rvb_component_video($module, $fields, $class)
    {
        if (empty($fields['video_type'])) {
            return;
        }

        $type = $fields['video_type'];

        $ratio = !empty($fields['aspect_ratio'])
            ? $fields['aspect_ratio']
            : 'ratio-16x9';

        switch ($type) {
            case 'html5':
                if (empty($fields['html5'])) {
                    break;
                }

                $video =
                    '' .
                    '<div class="ratio ' .
                    $ratio .
                    ' ' .
                    $class .
                    '">' .
                    '<video class="video" controls data-video>' .
                    (!empty($fields['html5']['mp4'])
                        ? '<source src="' .
                            $fields['html5']['mp4'] .
                            '" type="video/mp4">'
                        : '') .
                    (!empty($fields['html5']['webm'])
                        ? '<source src="' .
                            $fields['html5']['webm'] .
                            '" type="video/webm">'
                        : '') .
                    (!empty($fields['html5']['ogv'])
                        ? '<source src="' .
                            $fields['html5']['ogv'] .
                            '" type="video/ogg">'
                        : '') .
                    '</video>' .
                    '</div>';
                break;
            case 'youtube':
                if (empty($fields['youtube'])) {
                    break;
                }

                $video =
                    '' .
                    '<div class="ratio ' .
                    $ratio .
                    ' ' .
                    $class .
                    '">' .
                    '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' .
                    $fields['youtube'] .
                    '"?rel=0&controls=0&modestbranding=1" allowfullscreen></iframe>' .
                    '</div>';
                break;
            case 'vimeo':
                if (empty($fields['vimeo'])) {
                    break;
                }

                $video =
                    '' .
                    '<div class="ratio ' .
                    $ratio .
                    ' ' .
                    $class .
                    '">' .
                    '<iframe src="//player.vimeo.com/video/' .
                    $fields['vimeo'] .
                    '"></iframe>' .
                    '</div>';
                break;
        }

        echo $video;
    }
}

/**
 * Component: Team
 */
function rvb_component_team(
    $module,
    $fields,
    $type = 'grid',
    $slider_options = [],
    $layout = '',
    $row_class = '',
    $col1_class = '',
    $col2_class = '',
    $image_type = 'normal',
    $image_size = 'full',
    $image_class = '',
    $card_class = '',
    $card_body_class = '',
    $title_type = '',
    $title_class = '',
    $card_text_class = '',
    $social_container_class = '',
    $social_item_class = '',
    $return = 0
) {
    if (empty($fields)) {
        return;
    }

    $cards = [];
    $cardClass = ['card h-100 w-100 shadow-0 hover-overlay ripple'];
    $cardClass[] = $card_class;
    $cardBodyClass = ['card-body'];
    $cardBodyClass[] = $card_body_class;
    $rowClass = ['row'];
    $rowClass[] = $row_class;
    $col1Class = [''];
    $col1Class[] = $col1_class;
    $col2Class = [''];
    $col2Class[] = $col2_class;
    $titleClass = ['card-title'];
    $titleClass[] = $title_class;
    $cardTextClass = ['card-text'];
    $cardTextClass[] = $card_text_class;
    $socialContainerClass = ['social list-unstyled'];
    $socialContainerClass[] = $social_container_class;
    $socialItemClass = [''];
    $socialItemClass[] = $social_item_class;
    $container_class = '';

    // Type: Slider or grid
    switch ($type) {
        case 'slider':
            wp_enqueue_style('swipercss');
            wp_enqueue_script('swiper');

            $cards[] =
                '<div class="swiper' .
                (!empty($slider_options) ? ' swiper-new' : '') .
                '"' .
                (!empty($slider_options)
                    ? ' data-swiper=' . json_encode($slider_options)
                    : '') .
                '>';
            $cards[] = '<div class="swiper-wrapper">';
            $container_class = 'swiper-slide';
            break;
        case 'grid':
            $cards[] = '<div class="' . join(' ', $rowClass) . '">';
            $container_class = 'col';
            break;
    }

    // Display: Custom selected or all team members
    switch ($fields['team_display']) {
        case 'custom':
            if (empty($fields['team_members'])) {
                break;
            }

            $team = $fields['team_members'];

            break;
        default:
            $team = [];
            $num = !empty($fields['team_#']) ? $fields['team_#'] : -1;

            $args = [
                'post_type' => 'team',
                'post_status' => 'publish',
                'posts_per_page' => $num,
            ];

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $id = get_the_id();
                    $team[] = $id;
                endwhile;
                wp_reset_postdata();
            endif;

            break;
    }

    if (empty($team)) {
        return;
    }

    // Build team members
    foreach ($team as $id) {
        if (empty($id)) {
            return;
        }

        $name = get_the_title($id);
        $url = get_the_permalink($id);
        $img = !empty(get_field('portrait', $id))
            ? '<div class="img-container">' .
                wp_get_attachment_image(
                    get_field('portrait', $id),
                    $image_size,
                    '',
                    ['class' => 'img-cover h-100 w-100 ' . $image_class]
                ) .
                '</div>'
            : '';
        $position = get_field('position', $id);
        $social = get_field('social_links', $id);
        $facebook = $social['facebook'];
        $twitter = $social['twitter'];
        $category = !empty(get_the_terms($id, 'team_category'))
            ? esc_html(get_the_terms($id, 'team_category')[0]->name)
            : '';

        $cards[] = '<div class="' . $container_class . '">';
        $cards[] = '<div class="' . join(' ', $cardClass) . '">';
        $cards[] =
            $layout == 'horizontal'
                ? '<div class="' . join(' ', $rowClass) . '">'
                : ''; // start horizontal row
        $cards[] =
            $layout == 'horizontal'
                ? '<div class="' . join(' ', $col1Class) . '">'
                : ''; // start horizontal column 1
        $cards[] = $image_type == 'normal' && $img ? $img : '';
        $cards[] =
            $image_type == 'background' && $img
                ? '<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">' .
                    $img .
                    '<a href="' .
                    $url .
                    '" title="' .
                    $name .
                    '"><div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div></a></div>'
                : '';
        $cards[] = $layout == 'horizontal' ? '</div>' : ''; // end horizontal column 1
        $cards[] =
            $layout == 'horizontal'
                ? '<div class="' . join(' ', $col2Class) . '">'
                : ''; // start horizontal column 2
        $cards[] = '<div class="' . join(' ', $cardBodyClass) . '">';
        $cards[] = !empty($category)
            ? '<p class="category">' . $category . '</p>'
            : '';
        $cards[] = $name
            ? '<' .
                $title_type .
                ' class="' .
                join(' ', $titleClass) .
                '">' .
                $name .
                '</' .
                $title_type .
                '>'
            : '';
        $cards[] = $position ? '<p class="position">' . $position . '</p>' : '';
        $cards[] = $social
            ? '<ul class="' . join(' ', $socialContainerClass) . '">'
            : '';
        $cards[] =
            $social && $facebook
                ? '<li class="' .
                    join(' ', $socialItemClass) .
                    '"><a href="' .
                    $facebook .
                    '" target="_blank" rel="noopener" class="text-primary" title="' .
                    $name .
                    ' facebook page link"><i class="fab fa-facebook fa-lg text-primary"></i></a></li>'
                : '';
        $cards[] =
            $social && $twitter
                ? '<li class="' .
                    join(' ', $socialItemClass) .
                    '"><a href="' .
                    $twitter .
                    '" target="_blank" rel="noopener" class="text-primary" title="' .
                    $name .
                    ' twitter page link"><i class="fab fa-twitter fa-lg text-primary"></i></a></li>'
                : '';
        $cards[] = $social ? '</ul>' : '';
        $cards[] = '</div>';
        $cards[] = $layout == 'horizontal' ? '</div>' : ''; // end horizontal column 2
        $cards[] = $layout == 'horizontal' ? '</div>' : ''; // end horizontal row
        $cards[] = '</div>';
        $cards[] = '</div>';
    }

    if (empty($cards)) {
        return;
    }

    switch ($type) {
        case 'slider':
            $cards[] = '</div>'; // end row
            break;
        case 'grid':
            $cards[] = '</div>'; // end swiper-wrapper
            $cards[] = '</div>'; // end  swiper
            break;
    }

    if ($return == 1) {
        return join('', $cards);
    } else {
        echo join('', $cards);
    }
}

/**
 * Component : Cards
 */
function rvb_component_cards(
    $module,
    $fields,
    $column_class,
    $card_class,
    $card_header_class,
    $card_body_class,
    $card_footer_class
) {
    if (empty($fields)) {
        return;
    }

    $cards = '';
    $card_class .=
        $module['style'] == 'dark'
            ? ' bg-dark text-light'
            : ' bg-light text-dark';

    foreach ($fields as $fields) {
        $cards .=
            rvb_module_column_open(
                'col' . (!empty($column_class) ? ' ' . $column_class : '')
            ) .
            rvb_module_column_open(
                'card h-100' . (!empty($card_class) ? ' ' . $card_class : '')
            ) .
            rvb_module_column_open(
                'card-header border-0 ' . $card_header_class
            ) .
            rvb_component_icon($module, $fields, '', 'fa-3x', 0) .
            rvb_module_column_close('') .
            rvb_module_column_open('card-body ' . $card_body_class) .
            rvb_component_heading(
                $module,
                $fields,
                'h5',
                'card-title mb-2',
                '',
                0
            ) .
            rvb_component_html_content($module, $fields, 'card-text', 0) .
            rvb_module_column_close('') .
            rvb_module_column_open(
                'card-footer border-0 ' . $card_footer_class
            ) .
            rvb_component_button_group($module, $fields, '', 0) .
            rvb_module_column_close('') .
            rvb_module_column_close('') .
            rvb_module_column_close('');
    }
    return $cards;
}

/**
 * Component: Card
 */
if (!function_exists('rvb_component_card')) {
    function rvb_component_card(
        $module,
        $card_class = '',
        $card_header_class = '',
        $card_body_class = '',
        $card_footer_class = '',
        $image = '',
        $title = '',
        $content = '',
        $card_footer = '',
        $return = 0
    ) {
        $card = [];

        $card[] = '<div class="card ' . $card_class . '">';
        $card[] = !empty($image)
            ? '<div class="img-container">' .
                wp_get_attachment_image($image, 'medium', false, [
                    'class' => 'img-cover',
                ]) .
                '</div>'
            : '';
        $card[] = '<div class="card-body ' . $card_body_class . '">';
        $card[] = !empty($title) ? $title : '';
        $card[] = !empty($content) ? $content : '';
        $card[] = '</div>'; // end card body
        $card[] = !empty($card_footer)
            ? '<div class="card-footer ' .
                $card_footer_class .
                '">' .
                $card_footer .
                '</div>'
            : '';
        $card[] = '</div>'; // end card

        if ($return == 1) {
            return join('', $card);
        }

        echo join('', $card);
    }
}

/**
 * Component : Logos
 */
if (!function_exists('rvb_component_logos')) {
    function rvb_component_logos(
        $module,
        $fields,
        $img_size,
        $container_class,
        $image_class,
        $return = 0
    ) {
        if (empty($fields['logos'])) {
            return;
        }

        $logos = [];

        foreach ($fields['logos'] as $image):
            $thumb = !empty($img_size)
                ? $image['sizes']['thumbnail']
                : $image['url'];
            $img = !empty($img_size)
                ? $image['sizes'][$img_size]
                : $image['url'];

            $logos[] = '<div class="img-container ' . $container_class . '">';
            $logos[] = '<div class="inner">';
            $logos[] =
                '<img src="' .
                esc_url($thumb) .
                '" data-mdb-img="' .
                esc_url($img) .
                '" alt="' .
                esc_attr($image['alt']) .
                '" class="img-fluid ' .
                $image_class .
                '" />';
            $logos[] = '</div>'; // end inner
            $logos[] = '</div>'; // end img container
        endforeach;

        if ($return == 1) {
            return join('', $logos);
        } else {
            echo join('', $logos);
        }
    }
}

/**
 * Menu
 */
if (!function_exists('rvb_component_menu')) {
    function rvb_component_menu($module, $fields, $navbar_class, $nav_class)
    {
        if (empty($fields['links'])) {
            return;
        }

        echo '<nav class="navbar navbar-expand-lg ' . $navbar_class . '">';
        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>';
        echo '<div class="collapse navbar-collapse ' .
            $nav_class .
            '" id="navbarNavAltMarkup">';
        echo '<div class="navbar-nav">';

        foreach ($fields['links'] as $link) {
            $link = $link['link'];
            $title = !empty($link['title']) ? $link['title'] : '';
            $url = !empty($link['url']) ? $link['url'] : '';
            $target = !empty($link['target'])
                ? ' target="_blank" rel="noopener noreferrer"'
                : '';

            echo '<a href="' .
                $url .
                '" class="nav-item nav-link" title="' .
                $title .
                ' link"' .
                $target .
                '>' .
                $title .
                '</a>';
        }

        echo '</div>';
        echo '</div>';
        echo '</nav>';
    }
}

/**
 * Social Icons
 */
function rvb_component_social_icons(
    $options,
    $container_class,
    $item_class,
    $link_class,
    $icon_class,
    $return
) {
    if (empty($options['options_social_icons'])) {
        return;
    }

    $container_classes = ['social-icons list-unstyled mb-0'];
    $container_classes[] = !empty($container_class) ? $container_class : '';

    $icons = [''];
    $item_classes = [];
    $item_classes[] = !empty($item_class) ? $item_class : '';
    $link_classes = [
        'btn btn-floating btn-lg shadow-0 bg-light ripple-surface',
    ];
    $link_classes[] = !empty($options['options_icon_style'])
        ? $options['options_icon_style']
        : '';
    $link_classes[] = !empty($link_class) ? $link_class : '';

    $icons[] = '<ul class="' . join(' ', $container_classes) . '">';

    for ($i = 0; $i < $options['options_social_icons']; $i++) {
        $icon_classes = [''];
        $icon_classes[] = !empty($icon_class) ? $icon_class : '';
        $icon_classes[] = !empty(
            $options['options_social_icons_' . $i . '_social_icon']
        )
            ? $options['options_social_icons_' . $i . '_social_icon']
            : '';

        $title = !empty($options['options_social_icons_' . $i . '_social_icon'])
            ? str_replace(
                'fab fa-',
                '',
                $options['options_social_icons_' . $i . '_social_icon']
            )
            : '';

        $icons[] = '<li class="' . join(' ', $item_classes) . '">';
        $icons[] = !empty(
            $options['options_social_icons_' . $i . '_social_url']
        )
            ? '<a href="' .
                $options['options_social_icons_' . $i . '_social_url'] .
                '" class="' .
                join(' ', $link_classes) .
                '" title="' .
                $title .
                '" aria-label="' .
                $title .
                '" target="_blank" rel="noopener noreferrer" role="button">'
            : '';
        $icons[] =
            '<i class="' . join(' ', $icon_classes) . '" role="none"></i>';
        $icons[] = !empty(
            $options['options_social_icons_' . $i . '_social_url']
        )
            ? '</a>'
            : '';
        $icons[] = '</li>';
    }

    $icons[] = '</ul>';

    if ($return == 1) {
        return join('', $icons);
    } else {
        echo join('', $icons);
    }
}

/**
 * Split HTML Content
 */
if (!function_exists('rvb_component_split_html_content')) {
    function rvb_component_split_html_content(
        $module,
        $fields,
        $container_class,
        $left_container_class,
        $left_heading_class,
        $left_content_class,
        $right_container_class,
        $right_heading_class,
        $right_content_class
    ) {
        if (empty($fields)) {
            return;
        }

        $left = $fields['left_content'];
        $left_heading = $left['heading'];
        $left_content = $left['html_content'];

        $right = $fields['right_content'];
        $right_heading = $right['heading'];
        $right_content = $right['html_content'];

        echo '<div class="' .
            $container_class .
            '">' .
            '<div class="' .
            ($left_container_class ? $left_container_class : '') .
            ' col-left">' .
            ($left_heading
                ? '<h3 class="' .
                    $left_heading_class .
                    '">' .
                    $left_heading .
                    '</h3>'
                : '') .
            ($left_content
                ? '<div class="content ' .
                    $left_content_class .
                    '">' .
                    $left_content .
                    '</div>'
                : '') .
            '</div>' .
            '<div class="' .
            ($right_container_class ? $right_container_class : '') .
            ' col-right">' .
            ($right_heading
                ? '<h3 class="' .
                    $right_heading_class .
                    '">' .
                    $right_heading .
                    '</h3>'
                : '') .
            ($right_content
                ? '<div class="content ' .
                    $right_content_class .
                    '">' .
                    $right_content .
                    '</div>'
                : '') .
            '</div>' .
            '</div>';
    }
}

/**
 * Testimonials
 */
if (!function_exists('rvb_component_testimonials')) {
    function rvb_component_testimonials(
        $module,
        $fields,
        $type,
        $grid_row_class,
        $wrap_content,
        $blockquote_class,
        $testimonial_class,
        $title_type,
        $author_class,
        $title_class,
        $subtitle_class,
        $image_class
    ) {
        if (empty($fields['testimonials'])) {
            return;
        }

        if ($type == 'slider') {
            wp_enqueue_style('swipercss');
            wp_enqueue_script('swiper');
        }

        echo $type == 'slider'
            ? '<div class="swiper"><div class="swiper-wrapper">'
            : '';
        echo empty($type) || $type == 'grid'
            ? '<div class="row ' . $grid_row_class . '">'
            : '';

        foreach ($fields['testimonials'] as $id) {
            $title = get_the_title($id);
            $subtitle = get_field('sub_title', $id);
            $portrait = get_field('portrait', $id);
            $testimonial = get_field('testimonial', $id);

            echo $type == 'slider' ? '<div class="swiper-slide">' : '';
            echo empty($type) || $type == 'grid' ? '<div class="col">' : '';

            $title_type = !empty($title_type) ? $title_type : 'p';

            echo '<blockquote' .
                (!empty($blockquote_class)
                    ? ' class="' . $blockquote_class . '"'
                    : '') .
                '>' .
                '<div class="portrait p-0' .
                (!empty($image_class) ? ' ' . $image_class : '') .
                '">' .
                wp_get_attachment_image($portrait, 'thumbnail', '', [
                    'class' => 'rounded-circle img-fluid',
                ]) .
                '</div>' .
                ($wrap_content == 1 ? '<div class="content-wrap">' : '') .
                '<p class="testimonial' .
                (!empty($testimonial_class) ? ' ' . $testimonial_class : '') .
                '">"' .
                $testimonial .
                '"</p>' .
                '<div class="author ' .
                $author_class .
                '">' .
                '<' .
                $title_type .
                ' class="title mb-0' .
                (!empty($title_class) ? ' ' . $title_class : '') .
                '">' .
                $title .
                '</' .
                $title_type .
                '>' .
                '<p class="subtitle mb-0' .
                (!empty($subtitle_class) ? ' ' . $subtitle_class : '') .
                '">' .
                $subtitle .
                '</p>' .
                ($wrap_content == 1 ? '</div>' : '') .
                '</div>' .
                '</blockquote>';
            echo '</div>';
        }
        echo $type == 'slider'
            ? '</div><div class="swiper-pagination"></div></div>'
            : '';
        echo empty($type) || $type == 'grid' ? '</div>' : '';
    }
}

/**
 * Component : Scrollspy
 */
function rvb_component_scrollSpy($module, $fields, $class)
{
    if (empty($fields['scrollspy'])) {
        return;
    }

    $body = '';
    $menu = '';

    for ($i = 0; $i < count($fields['scrollspy']); $i++) {
        // $body
        $body .= '<section class="pb-5" id="example-' . $i . '">';
        !empty($fields['scrollspy'][$i]['heading'])
            ? ($body .= '<h5>' . $fields['scrollspy'][$i]['heading'] . '</h5>')
            : '';
        !empty($fields['scrollspy'][$i]['html_content'])
            ? ($body .= $fields['scrollspy'][$i]['html_content'])
            : '';
        $body .= '</section>';

        // $menu
        !empty($fields['scrollspy'][$i]['heading'])
            ? ($menu .=
                '<li class="nav-item text-start"><a class="nav-link" href="#example-' .
                $i .
                '">' .
                $fields['scrollspy'][$i]['heading'] .
                '</a></li>')
            : '';
    }

    echo '<div class="col-auto col-md-3 col-xl-2 d-none d-md-flex position-relative"><ul class="nav flex-column nav-pills w-100">' .
        $menu .
        '</ul></div><div class="col-12 col-lg-8 offset-md-1 col-xl-6 pb-5 pb-lg-10">';
    rvb_component_heading($module, $fields, 'h3', 'mb-4', '', 0);
    rvb_component_sub_heading($module, $fields, '', 'mb-5 lead fw-normal', 0);
    echo $body . '</div>';
}

/**
 * Component: Sidebar
 */
function rvb_component_sidebar($module, $fields, $class)
{
    if (empty($fields)) {
        return;
    }

    if (is_active_sidebar('sidebar')):
        dynamic_sidebar('sidebar');
    endif;
}

/**
 * Tabbed Content
 */
if (!function_exists('rvb_component_tabbed_content')) {
    function rvb_component_tabbed_content(
        $module,
        $fields,
        $tab_class,
        $body_class
    ) {
        if (empty($fields['tabbed_content'])) {
            return;
        }

        $tabs = '';
        $content = '';
        $x = 0;

        foreach ($fields['tabbed_content'] as $tab) {
            $tab_text = $tab['tab_text'];
            $tab_content = $tab['tab_content'];
            $active_tab = '';
            $active = '';
            $selected = '';

            if ($x == 0) {
                $active_tab = ' active';
                $active = ' show active';
                $selected = '  aria-selected="true"';
            }

            if ($tab_text && $tab_content) {
                $tabs .=
                    '
						<li class="nav-item" role="presentation">
							<a class="nav-link' .
                    $active_tab .
                    '" id="ex1-tab-' .
                    $x .
                    '" data-mdb-toggle="pill" href="#ex1-pills-' .
                    $x .
                    '" role="tab" aria-controls="ex1-pills-' .
                    $x .
                    '"' .
                    $selected .
                    '>
								' .
                    $tab_text .
                    '
							</a>
						</li>';
                $content .=
                    '
						<div class="tab-pane fade' .
                    $active .
                    '" id="ex1-pills-' .
                    $x .
                    '" role="tabpanel" aria-labelledby="ex1-tab-' .
                    $x .
                    '-tab">
							' .
                    $tab_content .
                    '
						</div>';
            }
            $x++;
        }

        echo '<ul class="nav nav-pills mb-4 ' .
            $tab_class .
            '" id="ex1" role="tablist">';
        echo $tabs;
        echo '</ul>';

        echo '<div class="tab-content ' . $body_class . '" id="ex1-content">';
        echo $content;
        echo '</div>';
    }
}

/**
 * Specifications
 */
if (!function_exists('rvb_component_specs')) {
    function rvb_component_specs(
        $module,
        $fields,
        $container_class,
        $item_class,
        $inner_class,
        $spec_container_class,
        $spec_class,
        $tagline_class,
        $description_class
    ) {
        if (empty($fields)) {
            return;
        }

        $specs = [];

        foreach ($fields as $spec) {
            $specs[] = '<div class="spec-item ' . $item_class . '">';
            $specs[] = '<div class="inner ' . $inner_class . '">';
            $specs[] =
                '<div class="spec-heading ' . $spec_container_class . '">';
            $specs[] = !empty($spec['spec'])
                ? '<p class="spec ' .
                    $spec_class .
                    '">' .
                    $spec['spec'] .
                    '</p>'
                : '';
            $specs[] = !empty($spec['tagline'])
                ? '<p class="tagline fs-xs text-uppercase ' .
                    $tagline_class .
                    '">' .
                    $spec['tagline'] .
                    '</p>'
                : '';
            $specs[] = '</div>';
            $specs[] = !empty($spec['description'])
                ? '<p class="desc ' .
                    $description_class .
                    '">' .
                    $spec['description'] .
                    ' </p>'
                : '';
            $specs[] = '</div>'; // ens inner
            $specs[] = '</div>'; // end item
        }

        echo '<div class="' .
            $container_class .
            '">' .
            join('', $specs) .
            '</div>';
    }
}

/**
 * Component: Slider
 *
 */
if (!function_exists('rvb_component_slider')) {
    function rvb_component_slider(
        $module,
        $fields,
        $slide_html_open,
        $slide_html_close,
        $show_nav,
        $pagination,
        $custom_pagination,
        $class,
        $heading_class,
        $subheading_class,
        $button_class
    ) {
        if (empty($fields)) {
            return;
        }

        wp_enqueue_style('swipercss');
        wp_enqueue_script('swiper');

        $style = $module['style'] == 'dark' ? 'text-light' : 'text-dark';

        $slides = [];
        $count = count($fields);

        foreach ($fields as $slide) {
            $slides[] = $count > 1 ? '<div class="swiper-slide py-10">' : '';
            $slides[] = !empty($slide['background']['background_image'])
                ? '<div class="bg-image" style="background-image:url(' .
                    $slide['background']['background_image']['url'] .
                    ');opacity:0.4;"></div>'
                : false;
            $slides[] = !empty($slide_html_open) ? $slide_html_open : false;
            $slides[] = rvb_component_heading(
                $module,
                $slide,
                'h2',
                $heading_class,
                '',
                1
            );
            $slides[] = rvb_component_sub_heading(
                $module,
                $slide,
                'p',
                $subheading_class,
                1
            );
            $slides[] = rvb_component_button_group(
                $module,
                $slide,
                $button_class,
                1
            );
            $slides[] = !empty($slide_html_close) ? $slide_html_close : false;
            $slides[] = $count > 1 ? '</div>' : ''; // end swiper-slide
        }

        $slider = [];
        $slider[] = $count > 1 ? '<div class="swiper ' . $class . '">' : '';
        $slider[] = $count > 1 ? '<div class="swiper-wrapper">' : '';
        $slider[] = join('', $slides);
        $slider[] = $count > 1 ? '</div>' : ''; // end swiper-wrapper
        $slider[] =
            !empty($custom_pagination) && $pagination == 1 && $count > 1
                ? $custom_pagination
                : ($pagination == 1
                    ? '<div class="swiper-pagination"></div>'
                    : false);
        $slider[] =
            $show_nav == 1 && $count > 1
                ? '<div class="swiper-button-prev ' . $style . '"></div>'
                : false;
        $slider[] =
            $show_nav == 1 && $count > 1
                ? '<div class="swiper-button-next ' . $style . '"></div>'
                : false;
        $slider[] = $count > 1 ? '</div>' : ''; // end swiper

        echo join('', $slider);
    }
}

/**
 * Component: Services
 */
if (!function_exists('rvb_component_services')) {
    function rvb_component_services(
        $module,
        $fields,
        $container_class,
        $item_class,
        $card_class,
        $card_header_class,
        $card_body_class,
        $image_class,
        $image_size,
        $heading_class,
        $heading_type,
        $excerpt_class,
        $link_class
    ) {
        if (empty($fields)) {
            return;
        }

        $classes = ['services'];
        $classes[] = !empty($container_class) ? $container_class : '';
        $itemClasses = ['service'];
        $itemClasses[] = !empty($item_class) ? $item_class : '';
        $cardClasses = ['card'];
        $cardClasses[] = !empty($card_class) ? $card_class : '';
        $cardHeaderClasses = ['card-header'];
        $cardHeaderClasses[] = !empty($card_header_class)
            ? $card_header_class
            : '';
        $cardBodyClasses = ['card-body'];
        $cardBodyClasses[] = !empty($card_body_class) ? $card_body_class : '';
        $services = [];

        foreach ($fields['services'] as $service) {
            $link = '';
            $link = !empty(
                $service['button_group']['buttons'][0]['button_link']['url']
            )
                ? $service['button_group']['buttons'][0]['button_link']['url']
                : '';

            $services[] = '<div class="' . join(' ', $itemClasses) . '">'; // item
            $services[] =
                '<div class="' .
                join(' ', $cardClasses) .
                ' ' .
                $service['style'] .
                '">'; /// card
            $services[] = !empty($service['block_image'])
                ? '<div class="ripple position-relative" data-mdb-ripple-color="light">' .
                    rvb_component_image(
                        $service,
                        $service['block_image'],
                        $image_size,
                        '',
                        $image_class,
                        1
                    ) .
                    (!empty($link) ? '<a href="' . $link . '">' : '') .
                    '<div class="mask z-index-5" style="background-color: rgba(251, 251, 251, 0.15);"></div>' .
                    (!empty($link) ? '</a>' : '') .
                    '</div>'
                : '';
            $services[] = '<div class="' . join(' ', $cardBodyClasses) . '">';
            $services[] = !empty($service)
                ? rvb_component_heading(
                    $module,
                    $service,
                    $heading_type,
                    $heading_class . ' card-title',
                    '',
                    1
                )
                : '';
            $services[] = rvb_component_html_content(
                $module,
                $service,
                $excerpt_class . ' card-text',
                1
            );
            $services[] = !empty($service['link'])
                ? rvb_component_button_return(
                    $module,
                    $service['link'],
                    $link_class,
                    0
                )
                : '';
            $services[] = '</div>'; // end card body
            $services[] = '</div>'; // end card
            $services[] = '</div>'; // end item
        }

        //echo !empty($fields['features_heading']) ? '<h6>' . $fields['features_heading'] . '</h6>' : '';

        echo '<div class="' .
            join(' ', $classes) .
            '">' .
            join('', $services) .
            '</div>';
    }
}

/**
 * Component: Address
 */

if (!function_exists('rvb_component_address')) {
    function rvb_component_address($module, $fields, $class, $return)
    {
        if (empty($fields['address'])) {
            return;
        }

        $address_1 = $fields['address']['address_1'];
        $address_2 = $fields['address']['address_2'];
        $city = $fields['address']['city'];
        $state = $fields['address']['state'];
        $zip = $fields['address']['zip'];

        $address = ['<address class="address ' . $class . '">'];
        $address[] = !empty($fields['address']['icon'])
            ? '<i class="' . $fields['address']['icon'] . '"></i>'
            : '';
        $address[] = !empty($fields['address']['heading'])
            ? '<p class="heading pe-3">' .
                $fields['address']['heading'] .
                '</p>'
            : '';
        $address[] = !empty($address_1) ? $address_1 . '<br/>' : '';
        $address[] = !empty($address_2) ? $address_2 . '<br/>' : '';
        $address[] = !empty($city) ? $city . ', ' : '';
        $address[] = !empty($state) ? $state . ' ' : '';
        $address[] = !empty($zip) ? $zip : '';
        $address[] = '</address>';

        if ($return == 1) {
            return join('', $address);
        } else {
            echo join('', $address);
        }
    }
}

/**
 * Component: Phone
 */
if (!function_exists('rvb_component_phone')) {
    function rvb_component_phone($module, $fields, $class, $return)
    {
        if (empty($fields['phone'])) {
            return;
        }

        $field = $fields['phone']['phone'];

        $phone = [];
        $phone[] = '<div class="phone ' . $class . '">';
        $phone[] = !empty($fields['phone']['icon'])
            ? '<i class="' . $fields['phone']['icon'] . '"></i>'
            : '';
        $phone[] = !empty($fields['phone']['heading'])
            ? '<p class="heading pe-1">' . $fields['phone']['heading'] . '</p>'
            : '';
        $phone[] = !empty($field)
            ? '<a href="tel:+' . $field . '" title="Call us at ' . $field . '">'
            : '';
        $phone[] = !empty($field) ? $field : '';
        $phone[] = !empty($field) ? '</a>' : '';
        $phone[] = '</div>';

        if ($return == 1) {
            return join('', $phone);
        } else {
            echo join('', $phone);
        }
    }
}

/**
 * Component: Fax
 */
if (!function_exists('rvb_component_fax')) {
    function rvb_component_fax($module, $fields, $class, $return)
    {
        if (empty($fields['fax'])) {
            return;
        }

        $field = $fields['fax']['fax'];

        $fax = [];
        $fax[] = '<div class="fax ' . $class . '">';
        $fax[] = !empty($fields['fax']['icon'])
            ? '<i class="' . $fields['fax']['icon'] . '"></i>'
            : '';
        $fax[] = !empty($fields['fax']['heading'])
            ? '<p class="heading pe-1">' . $fields['fax']['heading'] . '</p>'
            : '';
        $fax[] = !empty($field) ? '<a href="+' . $field . '">' : '';
        $fax[] = !empty($field) ? $field : '';
        $fax[] = !empty($field) ? '</a>' : '';
        $fax[] = '</div>';

        if ($return == 1) {
            return join('', $fax);
        } else {
            echo join('', $fax);
        }
    }
}

/**
 * Component: Email
 */
if (!function_exists('rvb_component_email')) {
    function rvb_component_email($module, $fields, $class, $return)
    {
        if (empty($fields['email'])) {
            return;
        }

        $field = $fields['email']['email'];

        $email = [];
        $email[] = '<div class="email ' . $class . '">';
        $email[] = !empty($fields['email']['icon'])
            ? '<i class="' . $fields['email']['icon'] . '"></i>'
            : '';
        $email[] = !empty($fields['email']['heading'])
            ? '<p class="heading pe-1">' . $fields['email']['heading'] . '</p>'
            : '';
        $email[] = !empty($field) ? '<a href="mailto:' . $field . '">' : '';
        $email[] = !empty($field) ? $field : '';
        $email[] = !empty($field) ? '</a>' : '';
        $email[] = '</div>';

        if ($return == 1) {
            return join('', $email);
        } else {
            echo join('', $email);
        }
    }
}

/**
 * Component: Grid
 */
if (!function_exists('rvb_component_grid')) {
    function rvb_component_grid(
        $module,
        $fields,
        $column_class = '',
        $card_class = '',
        $card_body_class = '',
        $card_title_type = 'h6',
        $card_title_class = '',
        $tagline_class = '',
        $excerpt_class = '',
        $excerpt_length = '',
        $img_container_class = '',
        $img_class = '',
        $img_size = 'large',
        $link_class = '',
        $return = 0
    ) {
        if (empty($fields) || empty($fields['grid_item_type'])) {
            return;
        }

        switch ($fields['grid_item_type']) {
            case 'custom':
                break;
            case 'post':
                $args = [
                    'post_type' => 'post',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $fields['grid_items'][$i][
                            'block_image'
                        ] = get_post_thumbnail_id();
                        $fields['grid_items'][$i]['heading'] = get_the_title();
                        $fields['grid_items'][$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $fields['grid_items'][$i]['image_shadow'] = '';
                        $fields['grid_items'][$i][
                            'image_shadow_hover_effect'
                        ] = false;
                        $fields['grid_items'][$i]['image_ripple'] = false;
                        $fields['grid_items'][$i]['image_mask'] = false;
                        $fields['grid_items'][$i]['image_mask_color'] = '';
                        $fields['grid_items'][$i]['image_mask_opacity'] = '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay'
                        ] = false;
                        $fields['grid_items'][$i]['image_hover_overlay_color'] =
                            '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay_opacity'
                        ] = '';
                        $fields['grid_items'][$i]['link']['target'] = '';
                        $fields['grid_items'][$i]['link'][
                            'title'
                        ] = get_the_title();
                        $fields['grid_items'][$i]['link'][
                            'url'
                        ] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;

                break;
            case 'page':
                if ($fields['show_all'] == true) {
                    $args = [
                        'post_type' => 'page',
                        'posts_per_page' => !empty($fields['items_to_show'])
                            ? $fields['items_to_show']
                            : -1,
                        'order' => 'ASC',
                        'orderby' => 'date',
                    ];

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()):
                        $i = 0;
                        while ($the_query->have_posts()):
                            $the_query->the_post();
                            $fields['grid_items'][$i][
                                'block_image'
                            ] = get_post_thumbnail_id();
                            $fields['grid_items'][$i][
                                'heading'
                            ] = get_the_title();
                            $fields['grid_items'][$i][
                                'html_content'
                            ] = get_excerpt($excerpt_length);
                            $fields['grid_items'][$i]['image_shadow'] = '';
                            $fields['grid_items'][$i][
                                'image_shadow_hover_effect'
                            ] = false;
                            $fields['grid_items'][$i]['image_ripple'] = false;
                            $fields['grid_items'][$i]['image_mask'] = false;
                            $fields['grid_items'][$i]['image_mask_color'] = '';
                            $fields['grid_items'][$i]['image_mask_opacity'] =
                                '';
                            $fields['grid_items'][$i][
                                'image_hover_overlay'
                            ] = false;
                            $fields['grid_items'][$i][
                                'image_hover_overlay_color'
                            ] = '';
                            $fields['grid_items'][$i][
                                'image_hover_overlay_opacity'
                            ] = '';
                            $fields['grid_items'][$i]['link']['target'] = '';
                            $fields['grid_items'][$i]['link'][
                                'title'
                            ] = get_the_title();
                            $fields['grid_items'][$i]['link'][
                                'url'
                            ] = get_the_permalink();
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                } else {
                    for ($i = 0; $i < count($fields['grid_pages']); $i++) {
                        $id = $fields['grid_pages'][$i];
                        $fields['grid_items'][$i][
                            'block_image'
                        ] = get_post_thumbnail_id($id);
                        $fields['grid_items'][$i]['heading'] = get_the_title(
                            $id
                        );
                        $fields['grid_items'][$i][
                            'html_content'
                        ] = get_the_excerpt($id);
                        $fields['grid_items'][$i]['image_shadow'] = '';
                        $fields['grid_items'][$i][
                            'image_shadow_hover_effect'
                        ] = false;
                        $fields['grid_items'][$i]['image_ripple'] = false;
                        $fields['grid_items'][$i]['image_mask'] = false;
                        $fields['grid_items'][$i]['image_mask_color'] = '';
                        $fields['grid_items'][$i]['image_mask_opacity'] = '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay'
                        ] = false;
                        $fields['grid_items'][$i]['image_hover_overlay_color'] =
                            '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay_opacity'
                        ] = '';
                        $fields['grid_items'][$i]['link']['target'] = '';
                        $fields['grid_items'][$i]['link'][
                            'title'
                        ] = get_the_title($id);
                        $fields['grid_items'][$i]['link'][
                            'url'
                        ] = get_the_permalink($id);
                    }
                }

                break;
            case 'portfolio':
                $args = [
                    'post_type' => 'portfolio',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $fields['grid_items'][$i][
                            'block_image'
                        ] = get_post_thumbnail_id();
                        $fields['grid_items'][$i]['heading'] = get_the_title();
                        $fields['grid_items'][$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $fields['grid_items'][$i]['image_shadow'] = '';
                        $fields['grid_items'][$i][
                            'image_shadow_hover_effect'
                        ] = false;
                        $fields['grid_items'][$i]['image_ripple'] = false;
                        $fields['grid_items'][$i]['image_mask'] = false;
                        $fields['grid_items'][$i]['image_mask_color'] = '';
                        $fields['grid_items'][$i]['image_mask_opacity'] = '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay'
                        ] = false;
                        $fields['grid_items'][$i]['image_hover_overlay_color'] =
                            '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay_opacity'
                        ] = '';
                        $fields['grid_items'][$i]['link']['target'] = '';
                        $fields['grid_items'][$i]['link'][
                            'title'
                        ] = get_the_title();
                        $fields['grid_items'][$i]['link'][
                            'url'
                        ] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                break;
            case 'gallery':
                $args = [
                    'post_type' => 'gallery',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $fields['grid_items'][$i][
                            'block_image'
                        ] = get_post_thumbnail_id();
                        $fields['grid_items'][$i]['heading'] = get_the_title();
                        $fields['grid_items'][$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $fields['grid_items'][$i]['image_shadow'] = '';
                        $fields['grid_items'][$i][
                            'image_shadow_hover_effect'
                        ] = false;
                        $fields['grid_items'][$i]['image_ripple'] = false;
                        $fields['grid_items'][$i]['image_mask'] = false;
                        $fields['grid_items'][$i]['image_mask_color'] = '';
                        $fields['grid_items'][$i]['image_mask_opacity'] = '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay'
                        ] = false;
                        $fields['grid_items'][$i]['image_hover_overlay_color'] =
                            '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay_opacity'
                        ] = '';
                        $fields['grid_items'][$i]['link']['target'] = '';
                        $fields['grid_items'][$i]['link'][
                            'title'
                        ] = get_the_title();
                        $fields['grid_items'][$i]['link'][
                            'url'
                        ] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                break;
            case 'procedures':
                $args = [
                    'post_type' => 'procedures',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                    'post_parent' => get_the_id(),
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $fields['grid_items'][$i][
                            'block_image'
                        ] = get_post_thumbnail_id();
                        $fields['grid_items'][$i]['heading'] = get_the_title();
                        $fields['grid_items'][$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $fields['grid_items'][$i]['image_shadow'] = '';
                        $fields['grid_items'][$i][
                            'image_shadow_hover_effect'
                        ] = false;
                        $fields['grid_items'][$i]['image_ripple'] = false;
                        $fields['grid_items'][$i]['image_mask'] = false;
                        $fields['grid_items'][$i]['image_mask_color'] = '';
                        $fields['grid_items'][$i]['image_mask_opacity'] = '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay'
                        ] = false;
                        $fields['grid_items'][$i]['image_hover_overlay_color'] =
                            '';
                        $fields['grid_items'][$i][
                            'image_hover_overlay_opacity'
                        ] = '';
                        $fields['grid_items'][$i]['link']['target'] = '';
                        $fields['grid_items'][$i]['link'][
                            'title'
                        ] = get_the_title();
                        $fields['grid_items'][$i]['link'][
                            'url'
                        ] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                break;
        }

        $grid = [];
        $columnClass = [''];
        $cardClass = ['card'];
        $cardBodyClass = ['card-body'];
        $imgContainerClass = [''];
        $imgClass = [''];
        $cardTitleClass = ['card-title'];
        $excerptClass = ['card-text'];
        $linkClass = [''];
        $taglineClass = [''];

        $columnClass[] = $column_class;
        $cardClass[] = $card_class;
        $cardBodyClass[] = $card_body_class;
        $imgContainerClass[] = $img_container_class;
        $imgClass[] = $img_class;
        $cardTitleClass[] = $card_title_class;
        $excerptClass[] = $excerpt_class;
        $taglineClass[] = $tagline_class;
        $linkClass[] = $link_class;

        foreach ($fields['grid_items'] as $item) {
            $grid[] = '<div class="' . join(' ', $columnClass) . '">';
            $grid[] = '<div class="' . join(' ', $cardClass) . ' gs_reveal">';
            $grid[] =
                (!empty($item['link']['url'])
                    ? '<a href="' .
                        $item['link']['url'] .
                        '" title="' .
                        $item['link']['title'] .
                        '"' .
                        (!empty($item['link']['target'])
                            ? ' target="' .
                                $item['link']['target'] .
                                '" rel="noopener noreferrer"'
                            : '') .
                        ' class="' .
                        join(' ', $linkClass) .
                        '">'
                    : '') .
                '<div class="mask"></div>' .
                (!empty($item['link']['url']) ? '</a>' : '');
            $grid[] = rvb_component_image(
                $item,
                $item['block_image'],
                $img_size,
                join(' ', $imgContainerClass),
                join(' ', $imgClass),
                1
            );
            $grid[] = '<div class="' . join(' ', $cardBodyClass) . '">';
            $grid[] = !empty($item['heading'])
                ? rvb_component_heading(
                    $module,
                    $item,
                    $card_title_type,
                    join(' ', $cardTitleClass),
                    join(' ', $taglineClass),
                    1
                )
                : '';
            $grid[] = !empty($item['html_content'])
                ? rvb_component_html_content(
                    $module,
                    $item,
                    join(' ', $excerptClass),
                    1
                )
                : '';
            $grid[] = '</div>'; // end card body
            $grid[] = '</div>'; // end card
            $grid[] = '</div>'; // end column
        }

        if ($return == 1) {
            return join('', $grid);
        } else {
            echo join('', $grid);
        }
    }
}

if (!function_exists('rvb_component_grid_items')) {
    function rvb_component_grid_items($fields)
    {
        if (empty($fields['grid_item_type'])) {
            return;
        }

        $items = [];
        $excerpt_length = 50;

        switch ($fields['grid_item_type']) {
            case 'custom':
                break;
            case 'post':
                $args = [
                    'post_type' => 'post',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $items[$i]['block_image'] = get_post_thumbnail_id();
                        $items[$i]['heading'] = get_the_title();
                        $items[$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $items[$i]['image_shadow'] = '';
                        $items[$i]['image_shadow_hover_effect'] = false;
                        $items[$i]['image_ripple'] = false;
                        $items[$i]['image_mask'] = false;
                        $items[$i]['image_mask_color'] = '';
                        $items[$i]['image_mask_opacity'] = '';
                        $items[$i]['image_hover_overlay'] = false;
                        $items[$i]['image_hover_overlay_color'] = '';
                        $items[$i]['image_hover_overlay_opacity'] = '';
                        $items[$i]['link']['target'] = '';
                        $items[$i]['link']['title'] = get_the_title();
                        $items[$i]['link']['url'] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;

                break;
            case 'page':
                if ($fields['show_all'] == true) {
                    $args = [
                        'post_type' => 'page',
                        'posts_per_page' => !empty($fields['items_to_show'])
                            ? $fields['items_to_show']
                            : -1,
                        'order' => 'ASC',
                        'orderby' => 'date',
                    ];

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()):
                        $i = 0;
                        while ($the_query->have_posts()):
                            $the_query->the_post();
                            $items[$i]['block_image'] = get_post_thumbnail_id();
                            $items[$i]['heading'] = get_the_title();
                            $items[$i]['html_content'] = get_excerpt(
                                $excerpt_length
                            );
                            $items[$i]['image_shadow'] = '';
                            $items[$i]['image_shadow_hover_effect'] = false;
                            $items[$i]['image_ripple'] = false;
                            $items[$i]['image_mask'] = false;
                            $items[$i]['image_mask_color'] = '';
                            $items[$i]['image_mask_opacity'] = '';
                            $items[$i]['image_hover_overlay'] = false;
                            $items[$i]['image_hover_overlay_color'] = '';
                            $items[$i]['image_hover_overlay_opacity'] = '';
                            $items[$i]['link']['target'] = '';
                            $items[$i]['link']['title'] = get_the_title();
                            $items[$i]['link']['url'] = get_the_permalink();
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                } else {
                    for ($i = 0; $i < count($fields['grid_pages']); $i++) {
                        $id = $fields['grid_pages'][$i];
                        $items[$i]['block_image'] = get_post_thumbnail_id($id);
                        $items[$i]['heading'] = get_the_title($id);
                        $items[$i]['html_content'] = get_the_excerpt($id);
                        $items[$i]['image_shadow'] = '';
                        $items[$i]['image_shadow_hover_effect'] = false;
                        $items[$i]['image_ripple'] = false;
                        $items[$i]['image_mask'] = false;
                        $items[$i]['image_mask_color'] = '';
                        $items[$i]['image_mask_opacity'] = '';
                        $items[$i]['image_hover_overlay'] = false;
                        $items[$i]['image_hover_overlay_color'] = '';
                        $items[$i]['image_hover_overlay_opacity'] = '';
                        $items[$i]['link']['target'] = '';
                        $items[$i]['link']['title'] = get_the_title($id);
                        $items[$i]['link']['url'] = get_the_permalink($id);
                    }
                }

                break;
            case 'portfolio':
                $args = [
                    'post_type' => 'portfolio',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $items[$i]['block_image'] = get_post_thumbnail_id();
                        $items[$i]['heading'] = get_the_title();
                        $items[$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $items[$i]['image_shadow'] = '';
                        $items[$i]['image_shadow_hover_effect'] = false;
                        $items[$i]['image_ripple'] = false;
                        $items[$i]['image_mask'] = false;
                        $items[$i]['image_mask_color'] = '';
                        $items[$i]['image_mask_opacity'] = '';
                        $items[$i]['image_hover_overlay'] = false;
                        $items[$i]['image_hover_overlay_color'] = '';
                        $items[$i]['image_hover_overlay_opacity'] = '';
                        $items[$i]['link']['target'] = '';
                        $items[$i]['link']['title'] = get_the_title();
                        $items[$i]['link']['url'] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                break;
            case 'gallery':
                $args = [
                    'post_type' => 'gallery',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $items[$i]['block_image'] = get_post_thumbnail_id();
                        $items[$i]['heading'] = get_the_title();
                        $items[$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $items[$i]['image_shadow'] = '';
                        $items[$i]['image_shadow_hover_effect'] = false;
                        $items[$i]['image_ripple'] = false;
                        $items[$i]['image_mask'] = false;
                        $items[$i]['image_mask_color'] = '';
                        $items[$i]['image_mask_opacity'] = '';
                        $items[$i]['image_hover_overlay'] = false;
                        $items[$i]['image_hover_overlay_color'] = '';
                        $items[$i]['image_hover_overlay_opacity'] = '';
                        $items[$i]['link']['target'] = '';
                        $items[$i]['link']['title'] = get_the_title();
                        $items[$i]['link']['url'] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                break;
            case 'procedures':
                $args = [
                    'post_type' => 'procedures',
                    'posts_per_page' => !empty($fields['items_to_show'])
                        ? $fields['items_to_show']
                        : -1,
                    'order' => 'ASC',
                    'orderby' => 'date',
                    'post_parent' => get_the_id(),
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()):
                    $i = 0;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $items[$i]['block_image'] = get_post_thumbnail_id();
                        $items[$i]['heading'] = get_the_title();
                        $items[$i]['html_content'] = get_excerpt(
                            $excerpt_length
                        );
                        $items[$i]['image_shadow'] = '';
                        $items[$i]['image_shadow_hover_effect'] = false;
                        $items[$i]['image_ripple'] = false;
                        $items[$i]['image_mask'] = false;
                        $items[$i]['image_mask_color'] = '';
                        $items[$i]['image_mask_opacity'] = '';
                        $items[$i]['image_hover_overlay'] = false;
                        $items[$i]['image_hover_overlay_color'] = '';
                        $items[$i]['image_hover_overlay_opacity'] = '';
                        $items[$i]['link']['target'] = '';
                        $items[$i]['link']['title'] = get_the_title();
                        $items[$i]['link']['url'] = get_the_permalink();
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                break;
        }

        return $items;
    }
}

/**
 * Component: Portfolio
 */
if (!function_exists('rvb_component_portfolio')) {
    function rvb_component_portfolio($module, $fields, $return)
    {
        if (empty($fields)) {
            return;
        }

        $portfolio = [''];
        $type = $fields['type'];
        $lt = $fields['link_type'];
        $parent_class = ['parent d-grid'];
        $parent_class[] = $lt == 'lightbox' ? 'lightbox' : '';
        $show_title = !empty($fields['show_title'])
            ? $fields['show_title'][0]
            : 0;

        // Open portfolio container
        $portfolio[] = '<div class="' . join(' ', $parent_class) . '">';

        switch ($type) {
            case 'portfolios':
                $items = $fields['portfolios'];

                if (empty($items)) {
                    break;
                }

                for ($x = 0; $x < count($items); $x++) {
                    $title = get_the_title($items[$x]);
                    $url = get_the_permalink($items[$x]);
                    $thumb = get_the_post_thumbnail_url($items[$x], 'large');
                    $detail = get_the_post_thumbnail_url($items[$x], 'full');
                    $srcset = wp_get_attachment_image_srcset(
                        $items[$x],
                        'large'
                    );
                    $alt = get_post_meta(
                        $items[$x],
                        '_wp_attachment_image_alt',
                        true
                    );

                    $portfolio[] =
                        '<div class="item div' .
                        $x .
                        ' position-relative overflow-hidden">';
                    $portfolio[] = !empty($url)
                        ? '<a href="' .
                            esc_url($url) .
                            '" title="' .
                            $title .
                            '">'
                        : '';
                    $portfolio[] =
                        '<div class="img-container hover-zoom h-100 w-100 position-relative gs_reveal">';
                    $portfolio[] =
                        '<img src="' .
                        esc_url($thumb) .
                        '" srcset="' .
                        esc_attr($srcset) .
                        '" class="h-100 w-100 img-cover position-relative"' .
                        ($lt == ' lightbox'
                            ? ' data-mdb-img="' . esc_url($detail) . '" '
                            : '') .
                        ' alt="' .
                        esc_textarea($alt) .
                        '" />';
                    $portfolio[] = '</div>'; // end image container
                    $portfolio[] =
                        $show_title == 1
                            ? '<div class="portfolio-title position-absolute left-0 bottom-0 z-index-5 px-4 py-3 text-light">' .
                                $title .
                                '</div>'
                            : '';
                    $portfolio[] = !empty($url) ? '</a>' : '';
                    $portfolio[] = '</div>'; // end item
                }

                break;
            case 'portfolio_gallery':
                if (empty($fields['portfolio_gallery_images'])) {
                    break;
                }

                $id = $fields['portfolio_gallery_images'][0];
                $items = get_field('gallery', $id);

                if (empty($items)) {
                    break;
                }

                for ($x = 0; $x < count($items); $x++) {
                    $title = wp_get_attachment_caption($items[$x]);
                    $thumb = wp_get_attachment_image_url($items[$x], 'large');
                    $detail = wp_get_attachment_image_url($items[$x]);
                    $srcset = wp_get_attachment_image_srcset(
                        $items[$x],
                        'large'
                    );
                    $alt = get_post_meta(
                        $items[$x],
                        '_wp_attachment_image_alt',
                        true
                    );

                    $portfolio[] =
                        '<div class="item div' .
                        $x .
                        ' position-relative overflow-hidden">';
                    $portfolio[] =
                        '<div class="img-container hover-zoom h-100 w-100 position-relative gs_reveal">';
                    $portfolio[] =
                        '<img src="' .
                        esc_url($thumb) .
                        '" srcset="' .
                        esc_attr($srcset) .
                        '" class="h-100 w-100 img-cover position-relative" data-mdb-caption="' .
                        $title .
                        '" ' .
                        ($lt == ' lightbox'
                            ? ' data-mdb-img="' . esc_url($detail) . '" '
                            : '') .
                        ' alt="' .
                        esc_textarea($alt) .
                        '" />';
                    $portfolio[] = '</div>'; // end image container
                    $portfolio[] =
                        $show_title == 1
                            ? '<div class="portfolio-title position-absolute left-0 bottom-0 z-index-5 px-4 py-3 text-light">' .
                                $title .
                                '</div>'
                            : '';
                    $portfolio[] = '</div>'; // end item
                }
                break;
            case 'custom':
                $items = $fields['custom_items'];

                if (empty($items)) {
                    break;
                }

                for ($x = 0; $x < count($items); $x++) {
                    $img_id = $items[$x]['image'];
                    $title = $items[$x]['title'];
                    $thumb = wp_get_attachment_image_url($img_id, 'large');
                    $detail = wp_get_attachment_image_url($img_id);
                    $srcset = wp_get_attachment_image_srcset($img_id, 'large');
                    $alt = get_post_meta(
                        $img_id,
                        '_wp_attachment_image_alt',
                        true
                    );

                    $portfolio[] =
                        '<div class="item div' .
                        $x .
                        ' position-relative overflow-hidden">';
                    $portfolio[] =
                        '<div class="img-container hover-zoom h-100 w-100 position-relative gs_reveal">';
                    $portfolio[] =
                        '<img src="' .
                        esc_url($thumb) .
                        '" srcset="' .
                        esc_attr($srcset) .
                        '" class="h-100 w-100 img-cover position-relative" data-mdb-caption="' .
                        $title .
                        '" ' .
                        ($lt == ' lightbox'
                            ? ' data-mdb-img="' . esc_url($detail) . '" '
                            : '') .
                        ' alt="' .
                        esc_textarea($alt) .
                        '" />';
                    $portfolio[] = '</div>'; // end image container
                    $portfolio[] =
                        $show_title == 1
                            ? '<div class="portfolio-title position-absolute left-0 bottom-0 z-index-5 px-4 py-3 text-light">' .
                                $title .
                                '</div>'
                            : '';
                    $portfolio[] = '</div>'; // end item
                }

                break;
        }

        // close portfolio container
        $portfolio[] = '</div>';

        if ($return == 1) {
            return join('', $portfolio);
        } else {
            echo join('', $portfolio);
        }
    }
}

/**
 * Component: Products
 */
if (!function_exists('rvb_component_products')) {
    function rvb_component_products($module, $fields, $columns, $return)
    {
        if (empty($fields)) {
            return;
        }

        if (!function_exists('wc_get_product')) {
            return;
        }

        $atts = [''];
        $products = $fields['products_to_show'];
        $limit = $fields['number_of_products_to_show'];
        $category = $fields['products_category'];
        $columns = !empty($columns) ? $columns : 2;
        $custom = $fields['custom_products'];
        $skus = [''];
        $catIds = [];
        $catSlugs = [];

        if (!empty($custom)) {
            foreach ($custom as $id) {
                $prod = wc_get_product($id);
                $skus[] = $prod->get_sku();
            }
        }

        if (!empty($category)) {
            foreach ($category as $id) {
                $term = get_term($id, 'product_cat');
                $catSlugs[] = $term->slug;

                if ($term->term_id) {
                    $catIds[] = $term->term_id;
                }
            }
        }

        if ($products !== 'categoryDetails') {
            $atts[] = !empty($limit) ? 'limit="' . $limit . '"' : '';
            $atts[] = !empty($products) ? 'orderby="date"' : '';
            $atts[] =
                !empty($products) && $products == 'onsale'
                    ? 'on_sale="true"'
                    : '';
            $atts[] =
                !empty($products) && $products == 'toprated'
                    ? 'top_rated="true"'
                    : '';
            $atts[] =
                !empty($products) && $products == 'bestselling'
                    ? 'best_selling="true"'
                    : '';
            $atts[] = !empty($category)
                ? 'category="' . join(', ', $catSlugs) . '" cat_operator="IN"'
                : '';

            echo do_shortcode(
                '[recent_products' .
                    join(' ', $atts) .
                    ' columns="' .
                    $columns .
                    '"]'
            );
        } else {
            echo do_shortcode(
                '[product_categories number="' .
                    $limit .
                    '" hide_empty="1" columns="' .
                    $limit .
                    '" ids="' .
                    join(',', $catIds) .
                    '"]'
            );
        }
    }
}

if (!function_exists('rvb_component_food_menu')) {
    function rvb_component_food_menu(
        $module,
        $fields,
        $type,
        $row_class,
        $column_class,
        $card_class,
        $cardBody_class,
        $showImages = false,
        $return = 0
    ) {
        if (empty($fields)) {
            return;
        }

        $menu = [];
        $data = rvb_component_food_menu_data($fields, $fields['type']);

        if (empty($data)) {
            return;
        }

        $card = ['card h-100 rounded'];
        $card[] = $card_class;
        $card[] = !empty($cat['parent']['class'])
            ? $cat['parent']['class']
            : '';

        $cardBody = ['card-body'];
        $cardBody[] = $cardBody_class;

        switch ($type) {
            case 'grid':
                $row = ['row lightbox'];
                $card[] = !empty($cat['parent']['style'])
                    ? $cat['parent']['style']
                    : 'bg-light text-dark';
                $menu[] = '<div class="' . join(' ', $row) . '">';

                foreach ($data as $cat) {
                    $column = [''];
                    $column[] = $column_class;

                    $menu[] = '<div class="' . join(' ', $column) . '">';
                    $menu[] = '<div class="' . join(' ', $card) . '">';
                    $menu[] = !empty($cat['parent']['image'])
                        ? '<div class="bg-image">' .
                            (!empty($cat['parent']['style']) &&
                            $cat['parent']['style'] == 'bg-dark text-light'
                                ? '<div class="mask" style="background: rgb(2,0,36);background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(31,39,45,0.4) 100%);"></div>'
                                : '<div class="mask" style="background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.78) 100%);"></div>') .
                            '' .
                            wp_get_attachment_image(
                                $cat['parent']['image'],
                                'large',
                                '',
                                ['class' => 'img-cover h-100 w-100']
                            ) .
                            '</div>'
                        : '';
                    $menu[] = '<div class="' . join(' ', $cardBody) . '">';
                    $menu[] = !empty($cat['parent']['name'])
                        ? '<h5 class="card-title">' .
                            $cat['parent']['name'] .
                            '</h5>'
                        : '';
                    $menu[] = !empty($cat['parent']['description'])
                        ? '<div class="card-text">' .
                            $cat['parent']['description'] .
                            '</div>'
                        : '';
                    $menu[] = '<ul class="list-group list-group-flush">';

                    foreach ($cat['children'] as $child) {
                        $menu[] =
                            '<li class="list-group-item bg-transparent px-0 py-4 ' .
                            (!empty($cat['parent']['style']) &&
                            $cat['parent']['style'] == 'bg-dark text-light'
                                ? 'bg-transparent text-light'
                                : 'bg-transparent text-dark') .
                            '">';
                        $menu[] =
                            !empty($child['image']) && $showImages == true
                                ? wp_get_attachment_image(
                                    $child['image'],
                                    'large',
                                    '',
                                    [
                                        'class' => 'img-fluid mb-4',
                                        'data-mdb-img' => wp_get_attachment_image_url(
                                            $child['image'],
                                            'full'
                                        ),
                                    ]
                                )
                                : '';
                        $menu[] =
                            '<div class="d-flex w-100 justify-content-between">';
                        $menu[] = !empty($child['name'])
                            ? '<h4 class="h6 mb-1">' . $child['name'] . '</h4>'
                            : '';
                        $menu[] = !empty($child['price'])
                            ? '<small class="fw-bold">$' .
                                $child['price'] .
                                '</small>'
                            : '';
                        $menu[] = '</div>';
                        $menu[] = !empty($child['content'])
                            ? '<p>' . $child['content'] . '</p>'
                            : '';
                        $menu[] = '</li>';
                    }

                    $menu[] = '</ul>';
                    $menu[] = '</div>'; // end card body
                    $menu[] = '</div>'; // end card
                    $menu[] = '</div>'; // end col
                }

                $menu[] = '</div>'; // end row
                break;
            case 'tabs':
                $tabs = [];
                $content = [];

                for ($i = 0; $i < count($data); $i++) {
                    $tabs[] =
                        '<li class="nav-item' .
                        ($i == 0 ? ' active' : '') .
                        '" role="presentation">';
                    $tabs[] =
                        '<a class="nav-link' .
                        ($i == 0 ? ' active' : '') .
                        '" id="ex3-tab-' .
                        $i .
                        '" data-mdb-toggle="tab" href="#ex3-tabs-' .
                        $i .
                        '" role="tab" aria-controls="ex3-tabs-' .
                        $i .
                        '" aria-selected="true">' .
                        $data[$i]['parent']['name'] .
                        '</a>';
                    $tabs[] = '</li>';

                    $content[] =
                        '<div class="tab-pane fade' .
                        ($i == 0 ? 'show active' : '') .
                        '" id="ex3-tabs-' .
                        $i .
                        '" role="tabpanel" aria-labelledby="ex3-tab-' .
                        $i .
                        '">';
                    $content[] =
                        '<div class="row row-cols-lg-2 g-3 g-lg-4 lightbox">';

                    for ($x = 0; $x < count($data[$i]['children']); $x++) {
                        $child = $data[$i]['children'][$x];

                        $content[] = '<div class="col-12 col-lg">';
                        $content[] =
                            '<div class="' .
                            join(' ', $card) .
                            ' shadow-0 h-100">';
                        $content[] = '<div class="row align-items-lg-center">';
                        $content[] = '<div class="col-12 col-lg-4">';
                        $content[] =
                            !empty($child['image']) && $showImages == true
                                ? '<div class="img-container w-100 h-100 bg-light" style="height:150px;">' .
                                    wp_get_attachment_image(
                                        $child['image'],
                                        'large',
                                        '',
                                        [
                                            'class' => 'img-cover h-100 w-100',
                                            'data-mdb-img' => wp_get_attachment_image_url(
                                                $child['image'],
                                                'full'
                                            ),
                                        ]
                                    ) .
                                    '</div>'
                                : '';
                        $content[] = '</div>'; // end column
                        $content[] = '<div class="col-12 col-lg-8">';
                        $content[] =
                            '<div class="' . join(' ', $cardBody) . '">';
                        $content[] = !empty($child['name'])
                            ? '<h4 class="h6 mb-1 float-start">' .
                                $child['name'] .
                                '</h4>'
                            : '';
                        $content[] = !empty($child['price'])
                            ? '<small class="fw-bold float-end">$' .
                                $child['price'] .
                                '</small>'
                            : '';
                        $content[] = !empty($child['content'])
                            ? '<p class="mb-0 clearfix fs-sm">' .
                                $child['content'] .
                                '</p>'
                            : '';
                        $content[] = '</div>'; // end card-body
                        $content[] = '</div>'; // end column
                        $content[] = '</div>'; // end row
                        $content[] = '</div>'; // end card
                        $content[] = '</div>'; // end column
                    }

                    $content[] = '</div>'; // end row
                    $content[] = '</div>'; // end tab-pane
                }

                echo '<ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">' .
                    join('', $tabs) .
                    '</ul>';
                echo '<div class="tab-content" id="ex2-content">' .
                    join('', $content) .
                    '</div>';

                break;
        }

        if ($return == 1) {
            return join('', $menu);
        }

        echo join('', $menu);
    }
}

if (!function_exists('rvb_component_food_menu_data')) {
    function rvb_component_food_menu_data($fields, $type)
    {
        $arr = [];

        // Build menu categories and items array
        switch ($type) {
            case 'custom':
                if (empty($fields['food_menu'])) {
                    break;
                }

                for ($i = 0; $i < count($fields['food_menu']); $i++) {
                    $category = $fields['food_menu'][$i];

                    $arr[$i]['parent']['id'] = $i;
                    $arr[$i]['parent']['name'] = !empty($category['category'])
                        ? $category['category']
                        : '';
                    $arr[$i]['parent']['description'] = !empty(
                        $category['excerpt']
                    )
                        ? $category['excerpt']
                        : '';
                    $arr[$i]['parent']['image'] = !empty(
                        $category['background_image']
                    )
                        ? $category['background_image']
                        : '';
                    $arr[$i]['parent']['style'] = !empty($category['style'])
                        ? $category['style']
                        : '';
                    $arr[$i]['parent']['class'] = !empty($cat['class'])
                        ? $cat['class']
                        : '';

                    if (!empty($category['items'])) {
                        for ($x = 0; $x < count($category['items']); $x++) {
                            $arr[$i]['children'][$x]['id'] = $x;
                            $arr[$i]['children'][$x]['name'] = !empty(
                                $category['items'][$x]['title']
                            )
                                ? $category['items'][$x]['title']
                                : '';
                            $arr[$i]['children'][$x]['content'] = !empty(
                                $category['items'][$x]['excerpt']
                            )
                                ? $category['items'][$x]['excerpt']
                                : '';
                            $arr[$i]['children'][$x]['price'] = !empty(
                                $category['items'][$x]['price']
                            )
                                ? $category['items'][$x]['price']
                                : '';
                            $arr[$i]['children'][$x]['image'] = !empty(
                                $category['items'][$x]['image']
                            )
                                ? $category['items'][$x]['image']
                                : '';
                        }
                    }
                }

                break;
            case 'category':
                $terms = $fields['menu_categories'];

                if (empty($terms)) {
                    break;
                }

                for ($i = 0; $i < count($terms); $i++) {
                    $id = $terms[$i];
                    $args = [
                        'post_type' => 'menu',
                        'post_status' => 'publish',
                        'nopaging' => true,
                        'posts_per_page' => '-1',
                        'order' => 'DESC',
                        'orderby' => 'menu_order',
                        'tax_query' => [
                            [
                                'taxonomy' => 'menu_categories',
                                'field' => 'term_id',
                                'terms' => $id,
                            ],
                        ],
                    ];
                    $new_query = new WP_Query($args);
                    $posts = $new_query->posts;

                    // Add Parent level items to array
                    $arr[$i]['parent']['id'] = $id;
                    $arr[$i]['parent']['name'] = get_term($id)->name;
                    $arr[$i]['parent']['description'] = get_term(
                        $id
                    )->description;
                    $arr[$i]['parent']['image'] = get_field(
                        'featured_image',
                        'term_' . $id
                    );
                    $arr[$i]['parent']['style'] = get_field(
                        'style',
                        'term_' . $id
                    );
                    $arr[$i]['parent']['class'] = get_field(
                        'class',
                        'term_' . $id
                    );

                    // Add children to array
                    for ($x = 0; $x < count($posts); $x++) {
                        $arr[$i]['children'][$x]['id'] = $posts[$x]->ID;
                        $arr[$i]['children'][$x]['name'] =
                            $posts[$x]->post_title;
                        $arr[$i]['children'][$x]['content'] =
                            $posts[$x]->post_content;
                        $arr[$i]['children'][$x]['price'] = get_field(
                            'price',
                            $posts[$x]->ID
                        );
                        $arr[$i]['children'][$x]['image'] = !empty(
                            get_post_thumbnail_id($posts[$x]->ID)
                        )
                            ? get_post_thumbnail_id($posts[$x]->ID)
                            : '';
                    }
                }

                break;
            case 'posttype':
                $taxonomy = 'menu_categories';

                // Gets every "category" (term) in this taxonomy to get the respective posts
                $terms = get_terms($taxonomy);

                if (empty($terms)) {
                    break;
                }

                for ($i = 0; $i < count($terms); $i++) {
                    $id = $terms[$i]->term_id;
                    $args = [
                        'post_type' => 'menu',
                        'post_status' => 'publish',
                        'nopaging' => true,
                        'posts_per_page' => '-1',
                        'order' => 'DESC',
                        'orderby' => 'menu_order',
                        'tax_query' => [
                            [
                                'taxonomy' => $taxonomy,
                                'field' => 'term_id',
                                'terms' => $id,
                            ],
                        ],
                    ];

                    // The Query
                    $new_query = new WP_Query($args);
                    $posts = $new_query->posts;

                    // Add Parent level items to array
                    $arr[$i]['parent']['id'] = $id;
                    $arr[$i]['parent']['name'] = get_term($id)->name;
                    $arr[$i]['parent']['description'] = get_term(
                        $id
                    )->description;
                    $arr[$i]['parent']['image'] = get_field(
                        'featured_image',
                        'term_' . $id
                    );

                    // Add children to array
                    for ($x = 0; $x < count($posts); $x++) {
                        $arr[$i]['children'][$x]['id'] = $posts[$x]->ID;
                        $arr[$i]['children'][$x]['name'] = get_the_title(
                            $posts[$x]->ID
                        );
                        $arr[$i]['children'][$x]['content'] = !empty(
                            $posts[$x]->post_content
                        )
                            ? $posts[$x]->post_content
                            : '';
                        $arr[$i]['children'][$x]['price'] = get_field(
                            'price',
                            $posts[$x]->ID
                        );
                        $arr[$i]['children'][$x]['image'] = !empty(
                            get_post_thumbnail_id($posts[$x]->ID)
                        )
                            ? get_post_thumbnail_id($posts[$x]->ID)
                            : '';
                    }
                }

                break;
        }

        return $arr;
    }
}

/**
 * Header Buttons
 */
if (!function_exists('rvb_component_header_buttons')) {
    function rvb_component_header_buttons($options, $class)
    {
        if (!!empty($options['options_header_button_group_buttons'])) {
            return;
        }

        $buttons = [
            '<div class="cta-container d-grid gap-2 d-md-block ' .
            $class .
            '">',
        ];

        for (
            $i = 0;
            $i < $options['options_header_button_group_buttons'];
            $i++
        ) {
            $link = !empty(
                $options[
                    'options_header_button_group_buttons_' . $i . '_button_link'
                ]
            )
                ? unserialize(
                    $options[
                        'options_header_button_group_buttons_' .
                            $i .
                            '_button_link'
                    ]
                )
                : '';
            $url = !empty($link['url']) ? $link['url'] : '';
            $title = !empty($link['title']) ? $link['title'] : '';
            $target = !empty($link['target'])
                ? ' target="_blank" rel="noopener noreferrer"'
                : '';
            $style = !empty(
                $options[
                    'options_header_button_group_buttons_' .
                        $i .
                        '_button_style'
                ]
            )
                ? $options[
                    'options_header_button_group_buttons_' .
                        $i .
                        '_button_style'
                ]
                : '';
            $style .= !empty(
                $options[
                    'options_header_button_group_buttons_' . $i . '_button_size'
                ]
            )
                ? ' ' .
                    $options[
                        'options_header_button_group_buttons_' .
                            $i .
                            '_button_size'
                    ]
                : '';

            $buttons[] =
                '<a href="' .
                $url .
                '" class="btn ' .
                $style .
                '" title="' .
                $title .
                '"' .
                $target .
                ' role="button">' .
                $title .
                '</a>';
        }

        $buttons[] = '</div>';

        echo join('', $buttons);
    }
}

/**
 * Header Cart
 */
if (!function_exists('rvb_component_header_cart')) {
    function rvb_component_header_cart()
    {
        ?>
		<div class="header-cart">
			<i class="fas fa-shopping-cart"></i>
		</div>
	<?php
    }
}

/**
 * Header Hamburger
 */
if (!function_exists('rvb_component_header_hamburger')) {
    function rvb_component_header_hamburger($options)
    {
        $style = !empty($options['options_header_header_theme'])
            ? ' ' . $options['options_header_header_theme']
            : '';

        $stroke = '';

        $search = 'navbar-dark';
        if (preg_match("/{$search}/i", $style)) {
            $stroke = 'stroke-light';
        } else {
            $stroke = 'stroke-dark';
        }
        ?>
		<!-- Toggle button -->
		<div class="toggle-container">
			<svg class="navbar-toggler p-0" type="button" viewBox="0 0 100 100" width="80" data-mdb-toggle="collapse" data-mdb-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle Navigation">
				<path class="line top <?php echo $stroke; ?>" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
				<path class="line middle <?php echo $stroke; ?>" d="m 30,50 h 40" />
				<path class="line bottom <?php echo $stroke; ?>" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
			</svg>
		</div>
	<?php
    }
}

/**
 * Header Nav
 */
if (!function_exists('rvb_component_header_nav')) {
    function rvb_component_header_nav($class)
    {
        echo '<h2 id="main-nav-label" class="sr-only">Main Navigation</h2>';

        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'navbar-nav ' . $class,
            'fallback_cb' => '',
            'menu_id' => 'main',
            'walker' => new reverb_WP_Bootstrap_Navwalker(),
        ]);
    }
}

/**
 * Header Side Nav
 */
if (!function_exists('rvb_component_header_side_nav')) {
    function rvb_component_header_side_nav($class)
    {
        echo '<h2 id="sidenav-label" class="sr-only">Side Navigation</h2>';

        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'sidenav ' . $class,
            'fallback_cb' => '',
            'menu_id' => 'sidenav',
            'walker' => new reverb_WP_Bootstrap_Side_Navwalker(),
        ]);
    }
}

/**
 * Header Logo
 */
if (!function_exists('rvb_component_header_logo')) {
    function rvb_component_header_logo($options)
    {
        if (!!empty($options['options_default_logo'])) {
            return;
        }

        $id = $options['options_default_logo'];
        $img = wp_get_attachment_image($id, 'full');

        echo $img
            ? '<div class="navbar-brand"><a rel="home" href="' .
                esc_url(home_url()) .
                '" title="' .
                esc_attr(get_bloginfo('name', 'display')) .
                '" itemprop="url">' .
                $img .
                '</a></div>'
            : (is_front_page() && is_home()
                ? '<div class="navbar-brand"><h1 class="mb-0"><a rel="home" href="' .
                    esc_url(home_url(' / ')) .
                    '" title="' .
                    esc_attr(get_bloginfo('name', 'display')) .
                    '" itemprop="url">' .
                    get_bloginfo('name') .
                    '</a></h1></div>'
                : '<a class="navbar-brand" rel="home" href="' .
                    esc_url(home_url(' / ')) .
                    '" title="' .
                    esc_attr(get_bloginfo('name', 'display')) .
                    '" itemprop="url">' .
                    get_bloginfo('name') .
                    '</a>');
    }
}

/**
 * Header Search Form
 */
if (!function_exists('rvb_component_header_search')) {
    function rvb_component_header_search()
    {
        ?>
		<div class="site-search">
			<i class="far fa-search site-search"></i>
			<?php get_template_part('searchform'); ?>
		</div>
	<?php
    }
}

/**
 * Footer Logo
 */
if (!function_exists('rvb_component_footer_logo')) {
    function rvb_component_footer_logo($options)
    {
        $logo = !empty($options['options_footer_footer_logo'])
            ? wp_get_attachment_image_url(
                $options['options_footer_footer_logo'],
                'full'
            )
            : get_option('options_footer_footer_logo');

        echo $logo
            ? '<a class="navbar-brand" rel="home" href="' .
                esc_url(home_url('/')) .
                '" title="' .
                esc_attr(get_bloginfo('name', 'display')) .
                '" itemprop="url"><img src="' .
                esc_url($logo) .
                '" class="footer-logo" alt="footer logo" /></a>'
            : '';
    }
}

/**
 * Copyright
 */
if (!function_exists('rvb_component_copyright')) {
    function rvb_component_copyright($options, $class)
    {
        $copyright = !empty($options['options_footer_copyright'])
            ? $options['options_footer_copyright']
            : get_option('options_footer_copyright');

        $date = date('Y');

        if (!$copyright) {
            $copyright = !empty($options['blogname'])
                ? $options['blogname']
                : get_bloginfo('name');
        }

        echo '<p class="copyright m-0 ' .
            $class .
            '">© ' .
            $date .
            ' ' .
            $copyright .
            '</p>';
    }
}

/**
 * Footer Nav
 */
if (!function_exists('rvb_component_footer_nav')) {
    function rvb_component_footer_nav(
        $class,
        $depth,
        $nav_container_class,
        $navbar_class
    ) {
        ?>
		<nav id="footer-nav" class="navbar d-flex navbar-expand-lg shadow-0<?php echo $class
      ? ' ' . $class
      : ''; ?>" aria-labelledby="footer-nav-label">
			<h2 id="footer-nav-label" class="sr-only">
				<?php esc_html_e('Footer Navigation', 'reverb'); ?>
			</h2>

			<?php
   $container_class = 'd-block w-100';
   $menu_class = 'navbar-nav list-unstyled';

   if ($nav_container_class) {
       $container_class .= ' ' . $nav_container_class;
   }

   if ($navbar_class) {
       $menu_class .= ' ' . $navbar_class;
   }

   wp_nav_menu([
       'theme_location' => 'footer',
       'container_class' => $container_class,
       'container_id' => 'footer-wrapper',
       'menu_class' => $menu_class,
       'fallback_cb' => '',
       'menu_id' => 'footer-menu',
       'depth' => $depth,
   ]);?>
		</nav>
	<?php
    }
}

/**
 * Footer Left Nav
 */
if (!function_exists('rvb_component_footer_left_nav')) {
    function rvb_component_footer_left_nav($class, $depth)
    {
        ?>

		<nav id="footer-left-nav" class="navbar d-flex navbar-expand<?php echo $class
      ? ' ' . $class
      : ''; ?>" aria-labelledby="footer-left-nav-label">
			<h2 id="footer-left-nav-label" class="sr-only">
				<?php esc_html_e('Footer Left Navigation', 'reverb'); ?>
			</h2>

			<?php wp_nav_menu([
       'theme_location' => 'footer_left',
       'container_class' => 'd-flex',
       'container_id' => 'footer-wrapper',
       'menu_class' => 'navbar-nav',
       'fallback_cb' => '',
       'menu_id' => 'footer-left-menu',
       'depth' => $depth,
       'walker' => new reverb_WP_Bootstrap_Navwalker(),
   ]); ?>
		</nav>
	<?php
    }
}

/**
 * Footer Right Nav
 */
if (!function_exists('rvb_component_footer_right_nav')) {
    function rvb_component_footer_right_nav($class, $depth)
    {
        ?>

		<nav id="footer-right-nav" class="navbar d-flex navbar-expand<?php echo $class
      ? ' ' . $class
      : ''; ?>" aria-labelledby="footer-right-nav-label">
			<h2 id="footer-right-nav-label" class="sr-only">
				<?php esc_html_e('Footer Right Navigation', 'reverb'); ?>
			</h2>

			<?php wp_nav_menu([
       'theme_location' => 'footer_right',
       'container_class' => 'd-flex',
       'container_id' => 'footer-wrapper',
       'menu_class' => 'navbar-nav',
       'fallback_cb' => '',
       'menu_id' => 'footer-right-menu',
       'depth' => $depth,
       'walker' => new reverb_WP_Bootstrap_Navwalker(),
   ]); ?>
		</nav>
<?php
    }
}

/**
 * Footer Form
 */
if (!function_exists('rvb_component_footer_form')) {
    function rvb_component_footer_form($options)
    {
        $form = !empty($options['options_footer_footer_layout_0_form'])
            ? $options['options_footer_footer_layout_0_form']
            : get_option('options_footer_footer_layout_0_form');

        echo $form
            ? do_shortcode(
                '[gravityform id="' .
                    $form .
                    '" title="false" description="false" ajax="true" tabindex="88"]'
            )
            : '';
    }
}

/**
 * Footer Excerpt
 */
if (!function_exists('rvb_component_footer_excerpt')) {
    function rvb_component_footer_excerpt($options, $class)
    {
        $excerpt = !empty($options['options_footer_footer_layout_0_excerpt'])
            ? $options['options_footer_footer_layout_0_excerpt']
            : get_option('options_footer_footer_layout_0_excerpt');

        echo $excerpt
            ? '<p class="mb-0 ' . $class . '">' . $excerpt . '</p>'
            : '';
    }
}

/**
 * Footer Privacy Policy
 */
if (!function_exists('rvb_component_footer_privacy')) {
    function rvb_component_footer_privacy($class)
    {
        $privacy_policy_page_link = get_privacy_policy_url();

        echo $privacy_policy_page_link
            ? '<a href="' .
                $privacy_policy_page_link .
                '" class="text-muted ' .
                $class .
                '" title="Privacy Policy">Privacy Policy</a>'
            : '';
    }
}

/**
 * Footer List
 */
if (!function_exists('rvb_component_footer_list')) {
    function rvb_component_footer_list($options, $class, $item_class)
    {
        $total = !empty($options['options_footer_footer_layout_0_list_items'])
            ? $options['options_footer_footer_layout_0_list_items']
            : get_option('options_footer_footer_layout_0_list_items');

        if ($total):
            $items = '';

            $items .= '<ul class="list-unstyled w-100 ' . $class . '">';

            for ($i = 0; $i < $total; $i++) {
                $title = !empty(
                    $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_list_item'
                    ]
                )
                    ? $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_list_item'
                    ]
                    : get_option(
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_list_item'
                    );
                $excerpt = !empty(
                    $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_excerpt'
                    ]
                )
                    ? $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_excerpt'
                    ]
                    : get_option(
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_excerpt'
                    );
                $link = !empty(
                    $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_link'
                    ]
                )
                    ? unserialize(
                        $options[
                            'options_footer_footer_layout_0_list_items_' .
                                $i .
                                '_button_single_button_link'
                        ]
                    )
                    : get_option(
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_link'
                    );
                $link_url = $link['url'] ? $link['url'] : '';
                $link_target = $link['target'] ? $link['target'] : '';
                $link_title = $link['title'] ? $link['title'] : '';
                $size = !empty(
                    $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_size'
                    ]
                )
                    ? $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_size'
                    ]
                    : get_option(
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_size'
                    );
                $style = !empty(
                    $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_style'
                    ]
                )
                    ? $options[
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_style'
                    ]
                    : get_option(
                        'options_footer_footer_layout_0_list_items_' .
                            $i .
                            '_button_single_button_style'
                    );
                $target = $link_target
                    ? ' target="_blank" rel="noopener noreferrer"'
                    : '';
                $style .= $size ? ' ' . $size : '';

                $items .= '<li class="px-4 ' . $item_class . '">';
                $items .= $title
                    ? '<p class="font-weight-bold">' . $title . '</p>'
                    : '';
                $items .= $excerpt ? $excerpt : '';
                $items .= $link
                    ? '<a href="' .
                        $link_url .
                        '" class="' .
                        $style .
                        ' btn-block mt-4" title="' .
                        $link_title .
                        '"' .
                        $target .
                        '>' .
                        $link_title .
                        '</a>'
                    : '';
                $items .= '</li>';
            }

            $items .= '</ul>';

            return $items;
        endif;

        return false;
    }
}

/**
 * Footer Heading
 */
if (!function_exists('rvb_component_footer_heading')) {
    function rvb_component_footer_heading($options, $class)
    {
        $heading = !empty($options['options_footer_footer_layout_0_heading'])
            ? $options['options_footer_footer_layout_0_heading']
            : get_option('options_footer_footer_layout_0_heading');

        echo $heading ? '<h2 class="' . $class . '">' . $heading . '</h2>' : '';
    }
}

/**
 * Footer Sub Heading
 */
if (!function_exists('rvb_component_footer_sub_heading')) {
    function rvb_component_footer_sub_heading($options, $class)
    {
        $sub_heading = !empty(
            $options['options_footer_footer_layout_0_sub_heading']
        )
            ? $options['options_footer_footer_layout_0_sub_heading']
            : get_option('options_footer_footer_layout_0_sub_heading');

        echo $sub_heading
            ? '<p class="' . $class . '">' . $sub_heading . '</p>'
            : '';
    }
}

/**
 * Footer Inner Block Background
 */
if (!function_exists('rvb_component_footer_inner_bg')) {
    function rvb_component_footer_inner_bg()
    {
        $footer = get_field('footer', 'options');
        $footer_bg = $footer['footer_layout'][0]['background'];
        $atts = '';
        //echo '<pre>' . print_r($footer_bg, true) . '</pre>';

        $background_default = $footer_bg['default_styles'];
        $background_color = $footer_bg['background_color'];
        $background_custom = $footer_bg['custom_background_color'];
        $background_image = $footer_bg['background_image']['url'];
        $background_opacity = $footer_bg['background_image_opacity'];
        $classes = '';

        // Background Style
        if ($background_default == 'light') {
            $classes .= ' text-dark bg-light';
        } elseif ($background_default == 'dark') {
            $classes .= ' text-light bg-dark';
        }

        if ($background_color) {
            if ($background_color == 'bg-custom') {
                $atts .= ' data-bgcolor="' . $background_custom . '"';
            } else {
                $classes .= ' ' . $background_color;
            }
        }

        // add background color
        echo $background_color || $background_default
            ? '<div class="bg-color ' .
                $classes .
                '" data-bgcolor="' .
                $background_color .
                '" data-opacity="' .
                $background_opacity .
                '"></div>'
            : '';

        // add background image
        echo $background_image
            ? '<div class="bg-image" data-bg="' .
                $background_image .
                '" data-opacity="' .
                $background_opacity .
                '"></div>'
            : '';
    }
}

if (!function_exists('rvb_component_swiper')) {
    function rvb_component_swiper(
        $module,
        $fields,
        $options,
        $slides,
        $container_class = '',
        $wrapper_class = '',
        $pagination = 0,
        $external_pagination = 0,
        $navigation = 0,
        $external_navigation = 0,
        $return = 0
    ) {
        if (empty($slides)) {
            return;
        }

        wp_enqueue_style('swipercss');
        wp_enqueue_script('swiper');

        $swiper = [''];
        $container = ['swiper'];
        $container[] = $container_class;
        $wrapper = ['swiper-wrapper'];
        $wrapper[] = $wrapper_class;

        $swiper[] =
            '<div class="' .
            join(' ', $container) .
            '" data-swiper=' .
            json_encode($options) .
            '>';
        $swiper[] = '<div class="' . join(' ', $wrapper) . '">';
        $swiper[] = $slides;
        $swiper[] = '</div>'; // end wrapper
        $swiper[] =
            $pagination == 1 && $external_pagination == 0
                ? '<div class="swiper-pagination rvb-' .
                    $module['unique_id'] .
                    '-pagination"></div>'
                : '';
        $swiper[] =
            $navigation == 1 && $external_navigation == 0
                ? '<div class="rvb-button-prev btn-' .
                    $module['unique_id'] .
                    '-prev"><i class="fal fa-chevron-left fa-lg" role="none"></i></div><div class="rvb-button-next btn-' .
                    $module['unique_id'] .
                    '-next"><i class="fal fa-chevron-right fa-lg" role="none"></i></div>'
                : '';
        $swiper[] = '</div>'; // end swiper

        // external controls
        $swiper[] =
            $pagination == 1 && $external_pagination == 1
                ? '<div class="swiper-pagination rvb-' .
                    $module['unique_id'] .
                    '-pagination"></div>'
                : '';
        $swiper[] =
            $navigation == 1 && $external_navigation == 1
                ? '<div class="rvb-button-prev btn-' .
                    $module['unique_id'] .
                    '-prev"><i class="fal fa-chevron-left fa-lg" role="none"></i></div><div class="rvb-button-next btn-' .
                    $module['unique_id'] .
                    '-next"><i class="fal fa-chevron-right fa-lg" role="none"></i></div>'
                : '';

        if ($return == 1) {
            return $swiper;
        } else {
            echo join('', $swiper);
        }
    }
}

/**
 * Breadcrumb
 */
function rvb_component_breadcrumb()
{
    echo '<nav aria-label="breadcrumb">';
    echo '<ol class="breadcrumb">';

    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a href="' .
            home_url() .
            '" title="home page">Home</a></li>';

        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';

            the_category(' </li><li class="breadcrumb-item"> ');

            if (is_single()) {
                echo '</li><li class="breadcrumb-item active">' .
                    get_the_title() .
                    '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item">' . get_the_title() . '</li>';
        }
    } elseif (is_tag()) {
        single_tag_title();
    } elseif (is_day()) {
        echo "<li class='breadcrumb-item'>Archive for ";
        the_time('F jS, Y');
        echo '</li>';
    } elseif (is_month()) {
        echo "<li class='breadcrumb-item'>Archive for ";
        the_time('F, Y');
        echo '</li>';
    } elseif (is_year()) {
        echo "<li class='breadcrumb-item'>Archive for ";
        the_time('Y');
        echo '</li>';
    } elseif (is_author()) {
        echo "<li class='breadcrumb-item'>Author Archive";
        echo '</li>';
    } elseif (!empty($_GET['paged']) && !empty($_GET['paged'])) {
        echo '<li>Blog Archives';
        echo '</li>';
    } elseif (is_search()) {
        echo "<li class='breadcrumb-item'>Search Results";
        echo '</li>';
    }
    echo '</ol>';
    echo '</nav>';
}
