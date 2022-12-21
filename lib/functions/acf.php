<?php

/**
 * ACF Functions
 *
 * Custom functions for ACF fields
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

// Speed up admin
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// Create Theme Options Page
add_action('acf/init', 'rvb_theme_options');
function rvb_theme_options()
{
    // Check function exists.
    if (function_exists('acf_add_options_sub_page')) {
        // Add parent.
        $parent = acf_add_options_page([
            'page_title' => __('Reverb', 'reverb'),
            'menu_title' => __('Reverb', 'reverb'),
            'menu_slug' => 'theme-options',
            'post_id' => 'options',
            'capability' => 'edit_posts',
            'autoload' => true,
            'show_in_graphql' => true,
            'redirect' => false,
            'position' => 2,
            'icon_url' => 'dashicons-rss',
        ]);

        // Add sub page.
        $child = acf_add_options_sub_page([
            'page_title' => __('Footer Blocks', 'reverb'),
            'menu_title' => __('Footer Blocks', 'reverb'),
            'parent_slug' => $parent['menu_slug'],
            'autoload' => true,
            'show_in_graphql' => true,
            'post_id' => 'options',
        ]);
    }
}

// // force acf labels left
// add_filter(
//     'acf/validate_field_group',
//     'my_acf_field_group_default_label_placement',
//     20
// );
// function my_acf_field_group_default_label_placement($field_group)
// {
//     $field_group['label_placement'] = 'left';

//     return $field_group;
// }

/**
 * Populate ACF select field options with Gravity Forms form ids
 */
function acf_populate_gf_forms_ids($field)
{
    if (class_exists('GFFormsModel')) {
        $choices[] = 'Select a form';

        foreach (\GFFormsModel::get_forms() as $form) {
            $choices[$form->id] = $form->title;
        }

        $field['choices'] = $choices;
    }

    return $field;
}
add_filter('acf/load_field/name=form', 'acf_populate_gf_forms_ids');
add_filter('acf/load_field/name=footer_form', 'acf_populate_gf_forms_ids');
add_filter('acf/load_field/name=sidebar_form', 'acf_populate_gf_forms_ids');

/**
 * Populate ACF select field options with Image Sizes
 */
function acf_populate_image_sizes($field)
{
    $sizes = wp_get_registered_image_subsizes();

    if ($sizes) {
        foreach ($sizes as $key => $image_size) {
            $choices[] = $key;
        }

        $field['choices'] = $choices;
    }

    return $field;
}
add_filter('acf/load_field/name=image_size', 'acf_populate_image_sizes');

/**
 * Unique block id
 */
if (class_exists('acf_field')) {
    class acf_field_unique_id extends acf_field
    {
        function __construct()
        {
            $this->name = 'unique_id';
            $this->label = __('Unique ID', 'reverb');
            $this->category = 'layout';
            $this->l10n = [];

            parent::__construct();
        }

        function render_field($field)
        {
?>
            <input type="text" readonly="readonly" name="<?php echo esc_attr(
                                                                $field['name']
                                                            ); ?>" value="<?php echo esc_attr($field['value']); ?>" />
<?php
        }

        function update_value($value, $post_id, $field)
        {
            if (!$value) {
                $value = uniqid();
            }
            return $value;
        }

        function validate_value($valid, $value, $field, $input)
        {
            return true;
        }
    }

    // create field
    new acf_field_unique_id();
}

/**
 * ACF Extended Thumbnail Preview hooks
 */

// APPS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=apps_8',
    'acf_flexible_apps_8_thumbnail',
    10,
    3
);
function acf_flexible_apps_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/apps/apps-8.jpg';
}

// SERVICES BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter(
    'acfe/flexible/thumbnail/layout=services_1',
    'acf_flexible_services_1_thumbnail',
    10,
    3
);
function acf_flexible_services_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/services/services-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=services_2',
    'acf_flexible_services_2_thumbnail',
    10,
    3
);
function acf_flexible_services_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/services/services-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=services_3',
    'acf_flexible_services_3_thumbnail',
    10,
    3
);
function acf_flexible_services_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/services/services-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=services_5',
    'acf_flexible_services_5_thumbnail',
    10,
    3
);
function acf_flexible_services_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/services/services-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=services_6',
    'acf_flexible_services_6_thumbnail',
    10,
    3
);
function acf_flexible_services_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/services/services-6.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// PRODUCTS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=products_1',
    'acf_flexible_products_1_thumbnail',
    10,
    3
);
function acf_flexible_products_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_2',
    'acf_flexible_products_2_thumbnail',
    10,
    3
);
function acf_flexible_products_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_3',
    'acf_flexible_products_3_thumbnail',
    10,
    3
);
function acf_flexible_products_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_5',
    'acf_flexible_products_5_thumbnail',
    10,
    3
);
function acf_flexible_products_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_6',
    'acf_flexible_products_6_thumbnail',
    10,
    3
);
function acf_flexible_products_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_7',
    'acf_flexible_products_7_thumbnail',
    10,
    3
);
function acf_flexible_products_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_8',
    'acf_flexible_products_8_thumbnail',
    10,
    3
);
function acf_flexible_products_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_9',
    'acf_flexible_products_9_thumbnail',
    10,
    3
);
function acf_flexible_products_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=products_10',
    'acf_flexible_products_10_thumbnail',
    10,
    3
);
function acf_flexible_products_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/products/products-10.jpg';
}

// PRICING BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=pricing_3',
    'acf_flexible_pricing_3_thumbnail',
    10,
    3
);
function acf_flexible_pricing_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/pricing/pricing-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=pricing_4',
    'acf_flexible_pricing_4_thumbnail',
    10,
    3
);
function acf_flexible_pricing_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/pricing/pricing-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=pricing_5',
    'acf_flexible_pricing_5_thumbnail',
    10,
    3
);
function acf_flexible_pricing_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/pricing/pricing-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=pricing_8',
    'acf_flexible_pricing_8_thumbnail',
    10,
    3
);
function acf_flexible_pricing_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/pricing/pricing-8.jpg';
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FEATURES BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=features_1',
    'acf_flexible_features_1_thumbnail',
    10,
    3
);
function acf_flexible_features_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_2',
    'acf_flexible_features_2_thumbnail',
    10,
    3
);
function acf_flexible_features_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_3',
    'acf_flexible_features_3_thumbnail',
    10,
    3
);
function acf_flexible_features_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_4',
    'acf_flexible_features_4_thumbnail',
    10,
    3
);
function acf_flexible_features_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_5',
    'acf_flexible_features_5_thumbnail',
    10,
    3
);
function acf_flexible_features_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_6',
    'acf_flexible_features_6_thumbnail',
    10,
    3
);
function acf_flexible_features_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_7',
    'acf_flexible_features_7_thumbnail',
    10,
    3
);
function acf_flexible_features_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_8',
    'acf_flexible_features_8_thumbnail',
    10,
    3
);
function acf_flexible_features_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_9',
    'acf_flexible_features_9_thumbnail',
    10,
    3
);
function acf_flexible_features_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_10',
    'acf_flexible_features_10_thumbnail',
    10,
    3
);
function acf_flexible_features_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_11',
    'acf_flexible_features_11_thumbnail',
    10,
    3
);
function acf_flexible_features_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_12',
    'acf_flexible_features_12_thumbnail',
    10,
    3
);
function acf_flexible_features_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_13',
    'acf_flexible_features_13_thumbnail',
    10,
    3
);
function acf_flexible_features_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_14',
    'acf_flexible_features_14_thumbnail',
    10,
    3
);
function acf_flexible_features_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_15',
    'acf_flexible_features_15_thumbnail',
    10,
    3
);
function acf_flexible_features_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_16',
    'acf_flexible_features_16_thumbnail',
    10,
    3
);
function acf_flexible_features_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_17',
    'acf_flexible_features_17_thumbnail',
    10,
    3
);
function acf_flexible_features_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features/features-17.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FEATURES WITH PHOTO BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_1',
    'acf_flexible_features_with_photo_1_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_1_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_3',
    'acf_flexible_features_with_photo_3_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_3_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_4',
    'acf_flexible_features_with_photo_4_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_4_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_5',
    'acf_flexible_features_with_photo_5_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_5_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_6',
    'acf_flexible_features_with_photo_6_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_6_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_8',
    'acf_flexible_features_with_photo_8_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_8_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_9',
    'acf_flexible_features_with_photo_9_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_9_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_10',
    'acf_flexible_features_with_photo_10_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_10_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_11',
    'acf_flexible_features_with_photo_11_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_11_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_12',
    'acf_flexible_features_with_photo_12_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_12_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_13',
    'acf_flexible_features_with_photo_13_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_13_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_14',
    'acf_flexible_features_with_photo_14_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_14_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_15',
    'acf_flexible_features_with_photo_15_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_15_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_16',
    'acf_flexible_features_with_photo_16_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_16_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_17',
    'acf_flexible_features_with_photo_17_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_17_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_18',
    'acf_flexible_features_with_photo_18_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_18_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=features_with_photo_19',
    'acf_flexible_features_with_photo_19_thumbnail',
    10,
    3
);
function acf_flexible_features_with_photo_19_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/features_with_photo/features_with_photo_19.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COVER BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=cover_1',
    'acf_flexible_cover_1_thumbnail',
    10,
    3
);
function acf_flexible_cover_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_3',
    'acf_flexible_cover_3_thumbnail',
    10,
    3
);
function acf_flexible_cover_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_4',
    'acf_flexible_cover_4_thumbnail',
    10,
    3
);
function acf_flexible_cover_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_5',
    'acf_flexible_cover_5_thumbnail',
    10,
    3
);
function acf_flexible_cover_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_6',
    'acf_flexible_cover_6_thumbnail',
    10,
    3
);
function acf_flexible_cover_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_7',
    'acf_flexible_cover_7_thumbnail',
    10,
    3
);
function acf_flexible_cover_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_8',
    'acf_flexible_cover_8_thumbnail',
    10,
    3
);
function acf_flexible_cover_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_9',
    'acf_flexible_cover_9_thumbnail',
    10,
    3
);
function acf_flexible_cover_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_10',
    'acf_flexible_cover_10_thumbnail',
    10,
    3
);
function acf_flexible_cover_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_11',
    'acf_flexible_cover_11_thumbnail',
    10,
    3
);
function acf_flexible_cover_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_12',
    'acf_flexible_cover_12_thumbnail',
    10,
    3
);
function acf_flexible_cover_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_13',
    'acf_flexible_cover_13_thumbnail',
    10,
    3
);
function acf_flexible_cover_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_14',
    'acf_flexible_cover_14_thumbnail',
    10,
    3
);
function acf_flexible_cover_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_15',
    'acf_flexible_cover_15_thumbnail',
    10,
    3
);
function acf_flexible_cover_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_16',
    'acf_flexible_cover_16_thumbnail',
    10,
    3
);
function acf_flexible_cover_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_17',
    'acf_flexible_cover_17_thumbnail',
    10,
    3
);
function acf_flexible_cover_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_18',
    'acf_flexible_cover_18_thumbnail',
    10,
    3
);
function acf_flexible_cover_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_19',
    'acf_flexible_cover_19_thumbnail',
    10,
    3
);
function acf_flexible_cover_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=cover_20',
    'acf_flexible_cover_20_thumbnail',
    10,
    3
);
function acf_flexible_cover_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/cover/cover-20.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CTA BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_1',
    'acf_flexible_call_to_action_1_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_2',
    'acf_flexible_call_to_action_2_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_3',
    'acf_flexible_call_to_action_3_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_4',
    'acf_flexible_call_to_action_4_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_5',
    'acf_flexible_call_to_action_5_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_6',
    'acf_flexible_call_to_action_6_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_7',
    'acf_flexible_call_to_action_7_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_8',
    'acf_flexible_call_to_action_8_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_9',
    'acf_flexible_call_to_action_9_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_10',
    'acf_flexible_call_to_action_10_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_11',
    'acf_flexible_call_to_action_11_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_12',
    'acf_flexible_call_to_action_12_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_13',
    'acf_flexible_call_to_action_13_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_14',
    'acf_flexible_call_to_action_14_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_15',
    'acf_flexible_call_to_action_15_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_23',
    'acf_flexible_call_to_action_23_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_24',
    'acf_flexible_call_to_action_24_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_24_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-24.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_25',
    'acf_flexible_call_to_action_25_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_25_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-25.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_26',
    'acf_flexible_call_to_action_26_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_26_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-26.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_27',
    'acf_flexible_call_to_action_27_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_27_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-27.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_28',
    'acf_flexible_call_to_action_28_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_28_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-28.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_29',
    'acf_flexible_call_to_action_29_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_29_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-29.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_30',
    'acf_flexible_call_to_action_30_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_30_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-30.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=call_to_action_31',
    'acf_flexible_call_to_action_31_thumbnail',
    10,
    3
);
function acf_flexible_call_to_action_31_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/call-to-action/call-to-action-31.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// TEAM BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=team_1',
    'acf_flexible_team_1_thumbnail',
    10,
    3
);
function acf_flexible_team_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/team/team-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=team_2',
    'acf_flexible_team_2_thumbnail',
    10,
    3
);
function acf_flexible_team_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/team/team-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=team_4',
    'acf_flexible_team_4_thumbnail',
    10,
    3
);
function acf_flexible_team_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/team/team-4.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FORMS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=forms_1',
    'acf_flexible_forms_1_thumbnail',
    10,
    3
);
function acf_flexible_forms_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_2',
    'acf_flexible_forms_2_thumbnail',
    10,
    3
);
function acf_flexible_forms_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_3',
    'acf_flexible_forms_3_thumbnail',
    10,
    3
);
function acf_flexible_forms_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_4',
    'acf_flexible_forms_4_thumbnail',
    10,
    3
);
function acf_flexible_forms_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_5',
    'acf_flexible_forms_5_thumbnail',
    10,
    3
);
function acf_flexible_forms_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_6',
    'acf_flexible_forms_6_thumbnail',
    10,
    3
);
function acf_flexible_forms_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_7',
    'acf_flexible_forms_7_thumbnail',
    10,
    3
);
function acf_flexible_forms_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_8',
    'acf_flexible_forms_8_thumbnail',
    10,
    3
);
function acf_flexible_forms_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_9',
    'acf_flexible_forms_9_thumbnail',
    10,
    3
);
function acf_flexible_forms_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_10',
    'acf_flexible_forms_10_thumbnail',
    10,
    3
);
function acf_flexible_forms_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_11',
    'acf_flexible_forms_11_thumbnail',
    10,
    3
);
function acf_flexible_forms_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_12',
    'acf_flexible_forms_12_thumbnail',
    10,
    3
);
function acf_flexible_forms_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_13',
    'acf_flexible_forms_13_thumbnail',
    10,
    3
);
function acf_flexible_forms_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_14',
    'acf_flexible_forms_14_thumbnail',
    10,
    3
);
function acf_flexible_forms_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_15',
    'acf_flexible_forms_15_thumbnail',
    10,
    3
);
function acf_flexible_forms_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_16',
    'acf_flexible_forms_16_thumbnail',
    10,
    3
);
function acf_flexible_forms_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_17',
    'acf_flexible_forms_17_thumbnail',
    10,
    3
);
function acf_flexible_forms_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_18',
    'acf_flexible_forms_18_thumbnail',
    10,
    3
);
function acf_flexible_forms_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_19',
    'acf_flexible_forms_19_thumbnail',
    10,
    3
);
function acf_flexible_forms_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_20',
    'acf_flexible_forms_20_thumbnail',
    10,
    3
);
function acf_flexible_forms_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_21',
    'acf_flexible_forms_21_thumbnail',
    10,
    3
);
function acf_flexible_forms_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_22',
    'acf_flexible_forms_22_thumbnail',
    10,
    3
);
function acf_flexible_forms_22_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-22.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_23',
    'acf_flexible_forms_23_thumbnail',
    10,
    3
);
function acf_flexible_forms_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_24',
    'acf_flexible_forms_24_thumbnail',
    10,
    3
);
function acf_flexible_forms_24_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-24.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_25',
    'acf_flexible_forms_25_thumbnail',
    10,
    3
);
function acf_flexible_forms_25_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-25.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_26',
    'acf_flexible_forms_26_thumbnail',
    10,
    3
);
function acf_flexible_forms_26_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-26.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_27',
    'acf_flexible_forms_27_thumbnail',
    10,
    3
);
function acf_flexible_forms_27_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-27.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_28',
    'acf_flexible_forms_28_thumbnail',
    10,
    3
);
function acf_flexible_forms_28_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-28.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_29',
    'acf_flexible_forms_29_thumbnail',
    10,
    3
);
function acf_flexible_forms_29_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-29.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_30',
    'acf_flexible_forms_30_thumbnail',
    10,
    3
);
function acf_flexible_forms_30_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-30.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_31',
    'acf_flexible_forms_31_thumbnail',
    10,
    3
);
function acf_flexible_forms_31_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-31.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_32',
    'acf_flexible_forms_32_thumbnail',
    10,
    3
);
function acf_flexible_forms_32_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-32.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_33',
    'acf_flexible_forms_33_thumbnail',
    10,
    3
);
function acf_flexible_forms_33_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-33.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_34',
    'acf_flexible_forms_34_thumbnail',
    10,
    3
);
function acf_flexible_forms_34_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-34.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_35',
    'acf_flexible_forms_35_thumbnail',
    10,
    3
);
function acf_flexible_forms_35_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-35.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_36',
    'acf_flexible_forms_36_thumbnail',
    10,
    3
);
function acf_flexible_forms_36_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-36.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_37',
    'acf_flexible_forms_37_thumbnail',
    10,
    3
);
function acf_flexible_forms_37_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-37.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_38',
    'acf_flexible_forms_38_thumbnail',
    10,
    3
);
function acf_flexible_forms_38_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-38.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_39',
    'acf_flexible_forms_39_thumbnail',
    10,
    3
);
function acf_flexible_forms_39_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-39.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_40',
    'acf_flexible_forms_40_thumbnail',
    10,
    3
);
function acf_flexible_forms_40_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-40.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_41',
    'acf_flexible_forms_41_thumbnail',
    10,
    3
);
function acf_flexible_forms_41_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-41.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_42',
    'acf_flexible_forms_42_thumbnail',
    10,
    3
);
function acf_flexible_forms_42_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-42.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_43',
    'acf_flexible_forms_43_thumbnail',
    10,
    3
);
function acf_flexible_forms_43_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-43.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_44',
    'acf_flexible_forms_44_thumbnail',
    10,
    3
);
function acf_flexible_forms_44_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-44.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_45',
    'acf_flexible_forms_45_thumbnail',
    10,
    3
);
function acf_flexible_forms_45_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-45.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_46',
    'acf_flexible_forms_46_thumbnail',
    10,
    3
);
function acf_flexible_forms_46_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-46.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_47',
    'acf_flexible_forms_47_thumbnail',
    10,
    3
);
function acf_flexible_forms_47_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-47.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_48',
    'acf_flexible_forms_48_thumbnail',
    10,
    3
);
function acf_flexible_forms_48_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-48.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=forms_49',
    'acf_flexible_forms_49_thumbnail',
    10,
    3
);
function acf_flexible_forms_49_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/forms/Forms-49.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// GALLERY BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=gallery_1',
    'acf_flexible_gallery_1_thumbnail',
    10,
    3
);
function acf_flexible_gallery_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_2',
    'acf_flexible_gallery_2_thumbnail',
    10,
    3
);
function acf_flexible_gallery_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_3',
    'acf_flexible_gallery_3_thumbnail',
    10,
    3
);
function acf_flexible_gallery_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_4',
    'acf_flexible_gallery_4_thumbnail',
    10,
    3
);
function acf_flexible_gallery_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_5',
    'acf_flexible_gallery_5_thumbnail',
    10,
    3
);
function acf_flexible_gallery_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_8',
    'acf_flexible_gallery_8_thumbnail',
    10,
    3
);
function acf_flexible_gallery_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_9',
    'acf_flexible_gallery_9_thumbnail',
    10,
    3
);
function acf_flexible_gallery_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_10',
    'acf_flexible_gallery_10_thumbnail',
    10,
    3
);
function acf_flexible_gallery_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_11',
    'acf_flexible_gallery_11_thumbnail',
    10,
    3
);
function acf_flexible_gallery_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_12',
    'acf_flexible_gallery_12_thumbnail',
    10,
    3
);
function acf_flexible_gallery_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_13',
    'acf_flexible_gallery_13_thumbnail',
    10,
    3
);
function acf_flexible_gallery_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_14',
    'acf_flexible_gallery_14_thumbnail',
    10,
    3
);
function acf_flexible_gallery_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_15',
    'acf_flexible_gallery_15_thumbnail',
    10,
    3
);
function acf_flexible_gallery_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_16',
    'acf_flexible_gallery_16_thumbnail',
    10,
    3
);
function acf_flexible_gallery_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_17',
    'acf_flexible_gallery_17_thumbnail',
    10,
    3
);
function acf_flexible_gallery_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_18',
    'acf_flexible_gallery_18_thumbnail',
    10,
    3
);
function acf_flexible_gallery_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_19',
    'acf_flexible_gallery_19_thumbnail',
    10,
    3
);
function acf_flexible_gallery_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_20',
    'acf_flexible_gallery_20_thumbnail',
    10,
    3
);
function acf_flexible_gallery_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_21',
    'acf_flexible_gallery_21_thumbnail',
    10,
    3
);
function acf_flexible_gallery_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_23',
    'acf_flexible_gallery_23_thumbnail',
    10,
    3
);
function acf_flexible_gallery_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_24',
    'acf_flexible_gallery_24_thumbnail',
    10,
    3
);
function acf_flexible_gallery_24_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-24.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_30',
    'acf_flexible_gallery_30_thumbnail',
    10,
    3
);
function acf_flexible_gallery_30_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-30.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_31',
    'acf_flexible_gallery_31_thumbnail',
    10,
    3
);
function acf_flexible_gallery_31_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-31.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_32',
    'acf_flexible_gallery_32_thumbnail',
    10,
    3
);
function acf_flexible_gallery_32_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-32.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_33',
    'acf_flexible_gallery_33_thumbnail',
    10,
    3
);
function acf_flexible_gallery_33_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-33.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_34',
    'acf_flexible_gallery_34_thumbnail',
    10,
    3
);
function acf_flexible_gallery_34_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-34.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_35',
    'acf_flexible_gallery_35_thumbnail',
    10,
    3
);
function acf_flexible_gallery_35_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-35.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_36',
    'acf_flexible_gallery_36_thumbnail',
    10,
    3
);
function acf_flexible_gallery_36_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-36.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=gallery_37',
    'acf_flexible_gallery_37_thumbnail',
    10,
    3
);
function acf_flexible_gallery_37_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/gallery/Gallery-37.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// TESTIMONIALS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_1',
    'acf_flexible_testimonials_1_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_2',
    'acf_flexible_testimonials_2_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_3',
    'acf_flexible_testimonials_3_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_4',
    'acf_flexible_testimonials_4_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_5',
    'acf_flexible_testimonials_5_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_6',
    'acf_flexible_testimonials_6_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_7',
    'acf_flexible_testimonials_7_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_8',
    'acf_flexible_testimonials_8_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_9',
    'acf_flexible_testimonials_9_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_10',
    'acf_flexible_testimonials_10_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_11',
    'acf_flexible_testimonials_11_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_12',
    'acf_flexible_testimonials_12_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_13',
    'acf_flexible_testimonials_13_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_14',
    'acf_flexible_testimonials_14_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_15',
    'acf_flexible_testimonials_15_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_16',
    'acf_flexible_testimonials_16_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_17',
    'acf_flexible_testimonials_17_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_18',
    'acf_flexible_testimonials_18_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_19',
    'acf_flexible_testimonials_19_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_20',
    'acf_flexible_testimonials_20_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_21',
    'acf_flexible_testimonials_21_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_22',
    'acf_flexible_testimonials_22_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_22_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-22.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=testimonials_23',
    'acf_flexible_testimonials_23_thumbnail',
    10,
    3
);
function acf_flexible_testimonials_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/customers/Customers-23.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// GRID THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=grid_1',
    'acf_flexible_grid_1_thumbnail',
    10,
    3
);
function acf_flexible_grid_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_2',
    'acf_flexible_grid_2_thumbnail',
    10,
    3
);
function acf_flexible_grid_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_3',
    'acf_flexible_grid_3_thumbnail',
    10,
    3
);
function acf_flexible_grid_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_4',
    'acf_flexible_grid_4_thumbnail',
    10,
    3
);
function acf_flexible_grid_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_5',
    'acf_flexible_grid_5_thumbnail',
    10,
    3
);
function acf_flexible_grid_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_6',
    'acf_flexible_grid_6_thumbnail',
    10,
    3
);
function acf_flexible_grid_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_7',
    'acf_flexible_grid_7_thumbnail',
    10,
    3
);
function acf_flexible_grid_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_8',
    'acf_flexible_grid_8_thumbnail',
    10,
    3
);
function acf_flexible_grid_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_9',
    'acf_flexible_grid_9_thumbnail',
    10,
    3
);
function acf_flexible_grid_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_10',
    'acf_flexible_grid_10_thumbnail',
    10,
    3
);
function acf_flexible_grid_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=grid_11',
    'acf_flexible_grid_11_thumbnail',
    10,
    3
);
function acf_flexible_grid_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/grid/Grid-11.jpg';
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FOOTER THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=footer_1',
    'acf_flexible_footer_1_thumbnail',
    10,
    3
);
function acf_flexible_footer_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_2',
    'acf_flexible_footer_2_thumbnail',
    10,
    3
);
function acf_flexible_footer_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_3',
    'acf_flexible_footer_3_thumbnail',
    10,
    3
);
function acf_flexible_footer_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_4',
    'acf_flexible_footer_4_thumbnail',
    10,
    3
);
function acf_flexible_footer_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_5',
    'acf_flexible_footer_5_thumbnail',
    10,
    3
);
function acf_flexible_footer_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_6',
    'acf_flexible_footer_6_thumbnail',
    10,
    3
);
function acf_flexible_footer_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_7',
    'acf_flexible_footer_7_thumbnail',
    10,
    3
);
function acf_flexible_footer_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_8',
    'acf_flexible_footer_8_thumbnail',
    10,
    3
);
function acf_flexible_footer_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_9',
    'acf_flexible_footer_9_thumbnail',
    10,
    3
);
function acf_flexible_footer_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_10',
    'acf_flexible_footer_10_thumbnail',
    10,
    3
);
function acf_flexible_footer_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_11',
    'acf_flexible_footer_11_thumbnail',
    10,
    3
);
function acf_flexible_footer_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_12',
    'acf_flexible_footer_12_thumbnail',
    10,
    3
);
function acf_flexible_footer_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_13',
    'acf_flexible_footer_13_thumbnail',
    10,
    3
);
function acf_flexible_footer_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_14',
    'acf_flexible_footer_14_thumbnail',
    10,
    3
);
function acf_flexible_footer_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_15',
    'acf_flexible_footer_15_thumbnail',
    10,
    3
);
function acf_flexible_footer_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_16',
    'acf_flexible_footer_16_thumbnail',
    10,
    3
);
function acf_flexible_footer_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_17',
    'acf_flexible_footer_17_thumbnail',
    10,
    3
);
function acf_flexible_footer_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_18',
    'acf_flexible_footer_18_thumbnail',
    10,
    3
);
function acf_flexible_footer_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_19',
    'acf_flexible_footer_19_thumbnail',
    10,
    3
);
function acf_flexible_footer_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_20',
    'acf_flexible_footer_20_thumbnail',
    10,
    3
);
function acf_flexible_footer_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_21',
    'acf_flexible_footer_21_thumbnail',
    10,
    3
);
function acf_flexible_footer_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_22',
    'acf_flexible_footer_22_thumbnail',
    10,
    3
);
function acf_flexible_footer_22_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-22.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_23',
    'acf_flexible_footer_23_thumbnail',
    10,
    3
);
function acf_flexible_footer_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_24',
    'acf_flexible_footer_24_thumbnail',
    10,
    3
);
function acf_flexible_footer_24_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-24.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_25',
    'acf_flexible_footer_25_thumbnail',
    10,
    3
);
function acf_flexible_footer_25_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-25.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_26',
    'acf_flexible_footer_26_thumbnail',
    10,
    3
);
function acf_flexible_footer_26_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-26.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_27',
    'acf_flexible_footer_27_thumbnail',
    10,
    3
);
function acf_flexible_footer_27_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-27.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_28',
    'acf_flexible_footer_28_thumbnail',
    10,
    3
);
function acf_flexible_footer_28_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-28.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_29',
    'acf_flexible_footer_29_thumbnail',
    10,
    3
);
function acf_flexible_footer_29_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-29.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=footer_30',
    'acf_flexible_footer_30_thumbnail',
    10,
    3
);
function acf_flexible_footer_30_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/footer/Footer-30.jpg';
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// HERO BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=hero_1',
    'acf_flexible_hero_1_thumbnail',
    10,
    3
);
function acf_flexible_hero_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=hero_2',
    'acf_flexible_hero_2_thumbnail',
    10,
    3
);
function acf_flexible_hero_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=hero_3',
    'acf_flexible_hero_3_thumbnail',
    10,
    3
);
function acf_flexible_hero_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=hero_4',
    'acf_flexible_hero_4_thumbnail',
    10,
    3
);
function acf_flexible_hero_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=hero_5',
    'acf_flexible_hero_5_thumbnail',
    10,
    3
);
function acf_flexible_hero_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=hero_8',
    'acf_flexible_hero_8_thumbnail',
    10,
    3
);
function acf_flexible_hero_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=hero_10',
    'acf_flexible_hero_10_thumbnail',
    10,
    3
);
function acf_flexible_hero_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/hero/Hero-10.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// HEADINGS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=headings_1',
    'acf_flexible_headings_1_thumbnail',
    10,
    3
);
function acf_flexible_headings_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_2',
    'acf_flexible_headings_2_thumbnail',
    10,
    3
);
function acf_flexible_headings_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_3',
    'acf_flexible_headings_3_thumbnail',
    10,
    3
);
function acf_flexible_headings_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_4',
    'acf_flexible_headings_4_thumbnail',
    10,
    3
);
function acf_flexible_headings_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_5',
    'acf_flexible_headings_5_thumbnail',
    10,
    3
);
function acf_flexible_headings_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_6',
    'acf_flexible_headings_6_thumbnail',
    10,
    3
);
function acf_flexible_headings_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_7',
    'acf_flexible_headings_7_thumbnail',
    10,
    3
);
function acf_flexible_headings_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_8',
    'acf_flexible_headings_8_thumbnail',
    10,
    3
);
function acf_flexible_headings_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_9',
    'acf_flexible_headings_9_thumbnail',
    10,
    3
);
function acf_flexible_headings_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_10',
    'acf_flexible_headings_10_thumbnail',
    10,
    3
);
function acf_flexible_headings_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_11',
    'acf_flexible_headings_11_thumbnail',
    10,
    3
);
function acf_flexible_headings_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_12',
    'acf_flexible_headings_12_thumbnail',
    10,
    3
);
function acf_flexible_headings_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_13',
    'acf_flexible_headings_13_thumbnail',
    10,
    3
);
function acf_flexible_headings_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_14',
    'acf_flexible_headings_14_thumbnail',
    10,
    3
);
function acf_flexible_headings_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_15',
    'acf_flexible_headings_15_thumbnail',
    10,
    3
);
function acf_flexible_headings_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=headings_16',
    'acf_flexible_headings_16_thumbnail',
    10,
    3
);
function acf_flexible_headings_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/headings/Title-16.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COMPANIES BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// add_filter(
//     'acfe/flexible/thumbnail/layout=companies_1',
//     'acf_flexible_companies_1_thumbnail',
//     10,
//     3
// );
// function acf_flexible_companies_1_thumbnail($thumbnail, $field, $layout)
// {
//     return get_stylesheet_directory_uri() .
//         '/lib/admin/img/companies/Companies-1.jpg';
// }

add_filter(
    'acfe/flexible/thumbnail/layout=companies_2',
    'acf_flexible_companies_2_thumbnail',
    10,
    3
);
function acf_flexible_companies_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_3',
    'acf_flexible_companies_3_thumbnail',
    10,
    3
);
function acf_flexible_companies_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_4',
    'acf_flexible_companies_4_thumbnail',
    10,
    3
);
function acf_flexible_companies_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_5',
    'acf_flexible_companies_5_thumbnail',
    10,
    3
);
function acf_flexible_companies_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_6',
    'acf_flexible_companies_6_thumbnail',
    10,
    3
);
function acf_flexible_companies_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_7',
    'acf_flexible_companies_7_thumbnail',
    10,
    3
);
function acf_flexible_companies_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_8',
    'acf_flexible_companies_8_thumbnail',
    10,
    3
);
function acf_flexible_companies_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_9',
    'acf_flexible_companies_9_thumbnail',
    10,
    3
);
function acf_flexible_companies_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_10',
    'acf_flexible_companies_10_thumbnail',
    10,
    3
);
function acf_flexible_companies_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_11',
    'acf_flexible_companies_11_thumbnail',
    10,
    3
);
function acf_flexible_companies_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_12',
    'acf_flexible_companies_12_thumbnail',
    10,
    3
);
function acf_flexible_companies_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_13',
    'acf_flexible_companies_13_thumbnail',
    10,
    3
);
function acf_flexible_companies_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_14',
    'acf_flexible_companies_14_thumbnail',
    10,
    3
);
function acf_flexible_companies_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_15',
    'acf_flexible_companies_15_thumbnail',
    10,
    3
);
function acf_flexible_companies_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_16',
    'acf_flexible_companies_16_thumbnail',
    10,
    3
);
function acf_flexible_companies_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_17',
    'acf_flexible_companies_17_thumbnail',
    10,
    3
);
function acf_flexible_companies_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_18',
    'acf_flexible_companies_18_thumbnail',
    10,
    3
);
function acf_flexible_companies_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_19',
    'acf_flexible_companies_19_thumbnail',
    10,
    3
);
function acf_flexible_companies_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_20',
    'acf_flexible_companies_20_thumbnail',
    10,
    3
);
function acf_flexible_companies_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_21',
    'acf_flexible_companies_21_thumbnail',
    10,
    3
);
function acf_flexible_companies_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=companies_22',
    'acf_flexible_companies_22_thumbnail',
    10,
    3
);
function acf_flexible_companies_22_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/companies/Companies-22.jpg';
}

// add_filter(
//     'acfe/flexible/thumbnail/layout=companies_23',
//     'acf_flexible_companies_23_thumbnail',
//     10,
//     3
// );
// function acf_flexible_companies_23_thumbnail($thumbnail, $field, $layout)
// {
//     return get_stylesheet_directory_uri() .
//         '/lib/admin/img/companies/Companies-23.jpg';
// }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// PORTFOLIO BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_1',
    'acf_flexible_portfolio_1_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_2',
    'acf_flexible_portfolio_2_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_3',
    'acf_flexible_portfolio_3_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_4',
    'acf_flexible_portfolio_4_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_5',
    'acf_flexible_portfolio_5_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_6',
    'acf_flexible_portfolio_6_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_7',
    'acf_flexible_portfolio_7_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_8',
    'acf_flexible_portfolio_8_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_9',
    'acf_flexible_portfolio_9_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=portfolio_10',
    'acf_flexible_portfolio_10_thumbnail',
    10,
    3
);
function acf_flexible_portfolio_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/portfolio/Portfolio-10.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// HEADER BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=header_1',
    'acf_flexible_header_1_thumbnail',
    10,
    3
);
function acf_flexible_header_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_2',
    'acf_flexible_header_2_thumbnail',
    10,
    3
);
function acf_flexible_header_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_3',
    'acf_flexible_header_3_thumbnail',
    10,
    3
);
function acf_flexible_header_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_4',
    'acf_flexible_header_4_thumbnail',
    10,
    3
);
function acf_flexible_header_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_5',
    'acf_flexible_header_5_thumbnail',
    10,
    3
);
function acf_flexible_header_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_6',
    'acf_flexible_header_6_thumbnail',
    10,
    3
);
function acf_flexible_header_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_7',
    'acf_flexible_header_7_thumbnail',
    10,
    3
);
function acf_flexible_header_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_8',
    'acf_flexible_header_8_thumbnail',
    10,
    3
);
function acf_flexible_header_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_9',
    'acf_flexible_header_9_thumbnail',
    10,
    3
);
function acf_flexible_header_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_10',
    'acf_flexible_header_10_thumbnail',
    10,
    3
);
function acf_flexible_header_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_11',
    'acf_flexible_header_11_thumbnail',
    10,
    3
);
function acf_flexible_header_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_12',
    'acf_flexible_header_12_thumbnail',
    10,
    3
);
function acf_flexible_header_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_13',
    'acf_flexible_header_13_thumbnail',
    10,
    3
);
function acf_flexible_header_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_14',
    'acf_flexible_header_14_thumbnail',
    10,
    3
);
function acf_flexible_header_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_15',
    'acf_flexible_header_15_thumbnail',
    10,
    3
);
function acf_flexible_header_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_16',
    'acf_flexible_header_16_thumbnail',
    10,
    3
);
function acf_flexible_header_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_17',
    'acf_flexible_header_17_thumbnail',
    10,
    3
);
function acf_flexible_header_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_18',
    'acf_flexible_header_18_thumbnail',
    10,
    3
);
function acf_flexible_header_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_19',
    'acf_flexible_header_19_thumbnail',
    10,
    3
);
function acf_flexible_header_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_20',
    'acf_flexible_header_20_thumbnail',
    10,
    3
);
function acf_flexible_header_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_21',
    'acf_flexible_header_21_thumbnail',
    10,
    3
);
function acf_flexible_header_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_22',
    'acf_flexible_header_22_thumbnail',
    10,
    3
);
function acf_flexible_header_22_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-22.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_23',
    'acf_flexible_header_23_thumbnail',
    10,
    3
);
function acf_flexible_header_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_24',
    'acf_flexible_header_24_thumbnail',
    10,
    3
);
function acf_flexible_header_24_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-24.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_25',
    'acf_flexible_header_25_thumbnail',
    10,
    3
);
function acf_flexible_header_25_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-25.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_26',
    'acf_flexible_header_26_thumbnail',
    10,
    3
);
function acf_flexible_header_26_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-26.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_27',
    'acf_flexible_header_27_thumbnail',
    10,
    3
);
function acf_flexible_header_27_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-27.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=header_28',
    'acf_flexible_header_28_thumbnail',
    10,
    3
);
function acf_flexible_header_28_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/header/header-28.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// SPECIFICATIONS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=specifications_1',
    'acf_flexible_specifications_1_thumbnail',
    10,
    3
);
function acf_flexible_specifications_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_2',
    'acf_flexible_specifications_2_thumbnail',
    10,
    3
);
function acf_flexible_specifications_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_3',
    'acf_flexible_specifications_3_thumbnail',
    10,
    3
);
function acf_flexible_specifications_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_4',
    'acf_flexible_specifications_4_thumbnail',
    10,
    3
);
function acf_flexible_specifications_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_5',
    'acf_flexible_specifications_5_thumbnail',
    10,
    3
);
function acf_flexible_specifications_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_6',
    'acf_flexible_specifications_6_thumbnail',
    10,
    3
);
function acf_flexible_specifications_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_7',
    'acf_flexible_specifications_7_thumbnail',
    10,
    3
);
function acf_flexible_specifications_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_8',
    'acf_flexible_specifications_8_thumbnail',
    10,
    3
);
function acf_flexible_specifications_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=specifications_9',
    'acf_flexible_specifications_9_thumbnail',
    10,
    3
);
function acf_flexible_specifications_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/specifications/specifications-9.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CONTACTS BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_2',
    'acf_flexible_contacts_2_thumbnail',
    10,
    3
);
function acf_flexible_contacts_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_3',
    'acf_flexible_contacts_3_thumbnail',
    10,
    3
);
function acf_flexible_contacts_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_4',
    'acf_flexible_contacts_4_thumbnail',
    10,
    3
);
function acf_flexible_contacts_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_5',
    'acf_flexible_contacts_5_thumbnail',
    10,
    3
);
function acf_flexible_contacts_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_6',
    'acf_flexible_contacts_6_thumbnail',
    10,
    3
);
function acf_flexible_contacts_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_7',
    'acf_flexible_contacts_7_thumbnail',
    10,
    3
);
function acf_flexible_contacts_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_8',
    'acf_flexible_contacts_8_thumbnail',
    10,
    3
);
function acf_flexible_contacts_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_10',
    'acf_flexible_contacts_10_thumbnail',
    10,
    3
);
function acf_flexible_contacts_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_11',
    'acf_flexible_contacts_11_thumbnail',
    10,
    3
);
function acf_flexible_contacts_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=contacts_12',
    'acf_flexible_contacts_12_thumbnail',
    10,
    3
);
function acf_flexible_contacts_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/contacts/Contacts-12.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CONTENT BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=content_1',
    'acf_flexible_content_1_thumbnail',
    10,
    3
);
function acf_flexible_content_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_2',
    'acf_flexible_content_2_thumbnail',
    10,
    3
);
function acf_flexible_content_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_3',
    'acf_flexible_content_3_thumbnail',
    10,
    3
);
function acf_flexible_content_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_4',
    'acf_flexible_content_4_thumbnail',
    10,
    3
);
function acf_flexible_content_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_5',
    'acf_flexible_content_5_thumbnail',
    10,
    3
);
function acf_flexible_content_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_6',
    'acf_flexible_content_6_thumbnail',
    10,
    3
);
function acf_flexible_content_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_7',
    'acf_flexible_content_7_thumbnail',
    10,
    3
);
function acf_flexible_content_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_8',
    'acf_flexible_content_8_thumbnail',
    10,
    3
);
function acf_flexible_content_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_9',
    'acf_flexible_content_9_thumbnail',
    10,
    3
);
function acf_flexible_content_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_10',
    'acf_flexible_content_10_thumbnail',
    10,
    3
);
function acf_flexible_content_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_11',
    'acf_flexible_content_11_thumbnail',
    10,
    3
);
function acf_flexible_content_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_12',
    'acf_flexible_content_12_thumbnail',
    10,
    3
);
function acf_flexible_content_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_13',
    'acf_flexible_content_13_thumbnail',
    10,
    3
);
function acf_flexible_content_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_14',
    'acf_flexible_content_14_thumbnail',
    10,
    3
);
function acf_flexible_content_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_15',
    'acf_flexible_content_15_thumbnail',
    10,
    3
);
function acf_flexible_content_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_16',
    'acf_flexible_content_16_thumbnail',
    10,
    3
);
function acf_flexible_content_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_17',
    'acf_flexible_content_17_thumbnail',
    10,
    3
);
function acf_flexible_content_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_18',
    'acf_flexible_content_18_thumbnail',
    10,
    3
);
function acf_flexible_content_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_19',
    'acf_flexible_content_19_thumbnail',
    10,
    3
);
function acf_flexible_content_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_20',
    'acf_flexible_content_20_thumbnail',
    10,
    3
);
function acf_flexible_content_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_21',
    'acf_flexible_content_21_thumbnail',
    10,
    3
);
function acf_flexible_content_21_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_22',
    'acf_flexible_content_22_thumbnail',
    10,
    3
);
function acf_flexible_content_22_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-22.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_23',
    'acf_flexible_content_23_thumbnail',
    10,
    3
);
function acf_flexible_content_23_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_24',
    'acf_flexible_content_24_thumbnail',
    10,
    3
);
function acf_flexible_content_24_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-24.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_25',
    'acf_flexible_content_25_thumbnail',
    10,
    3
);
function acf_flexible_content_25_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-25.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_26',
    'acf_flexible_content_26_thumbnail',
    10,
    3
);
function acf_flexible_content_26_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-26.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_27',
    'acf_flexible_content_27_thumbnail',
    10,
    3
);
function acf_flexible_content_27_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-27.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_28',
    'acf_flexible_content_28_thumbnail',
    10,
    3
);
function acf_flexible_content_28_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content/Content-28.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CONTENT WITH PHOTO BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_1',
    'acf_flexible_content_with_photo_1_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_1_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_2',
    'acf_flexible_content_with_photo_2_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_2_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_3',
    'acf_flexible_content_with_photo_3_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_3_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_4',
    'acf_flexible_content_with_photo_4_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_4_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_5',
    'acf_flexible_content_with_photo_5_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_5_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_6',
    'acf_flexible_content_with_photo_6_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_6_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_7',
    'acf_flexible_content_with_photo_7_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_7_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_8',
    'acf_flexible_content_with_photo_8_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_8_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_9',
    'acf_flexible_content_with_photo_9_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_9_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_10',
    'acf_flexible_content_with_photo_10_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_10_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_11',
    'acf_flexible_content_with_photo_11_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_11_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_12',
    'acf_flexible_content_with_photo_12_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_12_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_13',
    'acf_flexible_content_with_photo_13_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_13_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_14',
    'acf_flexible_content_with_photo_14_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_14_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_15',
    'acf_flexible_content_with_photo_15_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_15_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_16',
    'acf_flexible_content_with_photo_16_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_16_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_17',
    'acf_flexible_content_with_photo_17_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_17_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_18',
    'acf_flexible_content_with_photo_18_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_18_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_19',
    'acf_flexible_content_with_photo_19_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_19_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_20',
    'acf_flexible_content_with_photo_20_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_20_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_21',
    'acf_flexible_content_with_photo_21_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_21_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-21.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_22',
    'acf_flexible_content_with_photo_22_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_22_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-22.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_23',
    'acf_flexible_content_with_photo_23_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_23_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-23.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=content_with_photo_24',
    'acf_flexible_content_with_photo_24_thumbnail',
    10,
    3
);
function acf_flexible_content_with_photo_24_thumbnail(
    $thumbnail,
    $field,
    $layout
) {
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/content-with-photo/Content-With-Photo-24.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// TEXT BLOCK THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter(
    'acfe/flexible/thumbnail/layout=text_1',
    'acf_flexible_text_1_thumbnail',
    10,
    3
);
function acf_flexible_text_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_2',
    'acf_flexible_text_2_thumbnail',
    10,
    3
);
function acf_flexible_text_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_3',
    'acf_flexible_text_3_thumbnail',
    10,
    3
);
function acf_flexible_text_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_4',
    'acf_flexible_text_4_thumbnail',
    10,
    3
);
function acf_flexible_text_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_5',
    'acf_flexible_text_5_thumbnail',
    10,
    3
);
function acf_flexible_text_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_6',
    'acf_flexible_text_6_thumbnail',
    10,
    3
);
function acf_flexible_text_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_7',
    'acf_flexible_text_7_thumbnail',
    10,
    3
);
function acf_flexible_text_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_8',
    'acf_flexible_text_8_thumbnail',
    10,
    3
);
function acf_flexible_text_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-8.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_9',
    'acf_flexible_text_9_thumbnail',
    10,
    3
);
function acf_flexible_text_9_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-9.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_10',
    'acf_flexible_text_10_thumbnail',
    10,
    3
);
function acf_flexible_text_10_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-10.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_11',
    'acf_flexible_text_11_thumbnail',
    10,
    3
);
function acf_flexible_text_11_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-11.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_12',
    'acf_flexible_text_12_thumbnail',
    10,
    3
);
function acf_flexible_text_12_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-12.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_13',
    'acf_flexible_text_13_thumbnail',
    10,
    3
);
function acf_flexible_text_13_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-13.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_14',
    'acf_flexible_text_14_thumbnail',
    10,
    3
);
function acf_flexible_text_14_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-14.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_15',
    'acf_flexible_text_15_thumbnail',
    10,
    3
);
function acf_flexible_text_15_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-15.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_16',
    'acf_flexible_text_16_thumbnail',
    10,
    3
);
function acf_flexible_text_16_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-16.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_17',
    'acf_flexible_text_17_thumbnail',
    10,
    3
);
function acf_flexible_text_17_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-17.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_18',
    'acf_flexible_text_18_thumbnail',
    10,
    3
);
function acf_flexible_text_18_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-18.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_19',
    'acf_flexible_text_19_thumbnail',
    10,
    3
);
function acf_flexible_text_19_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-19.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_20',
    'acf_flexible_text_20_thumbnail',
    10,
    3
);
function acf_flexible_text_20_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-20.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_27',
    'acf_flexible_text_27_thumbnail',
    10,
    3
);
function acf_flexible_text_27_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-27.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_28',
    'acf_flexible_text_28_thumbnail',
    10,
    3
);
function acf_flexible_text_28_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-28.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_31',
    'acf_flexible_text_31_thumbnail',
    10,
    3
);
function acf_flexible_text_31_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-31.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=text_32',
    'acf_flexible_text_32_thumbnail',
    10,
    3
);
function acf_flexible_text_32_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-32.jpg';
}
add_filter(
    'acfe/flexible/thumbnail/layout=text_33',
    'acf_flexible_text_33_thumbnail',
    10,
    3
);
function acf_flexible_text_33_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-33.jpg';
}
add_filter(
    'acfe/flexible/thumbnail/layout=text_37',
    'acf_flexible_text_37_thumbnail',
    10,
    3
);
function acf_flexible_text_37_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() . '/lib/admin/img/text/Text-37.jpg';
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Top Menu Block THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter(
    'acfe/flexible/thumbnail/layout=top_menu_1',
    'acf_flexible_top_menu_1_thumbnail',
    10,
    3
);
function acf_flexible_top_menu_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/top_menu/top_menu_1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=top_menu_2',
    'acf_flexible_top_menu_2_thumbnail',
    10,
    3
);
function acf_flexible_top_menu_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/top_menu/top_menu_2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=top_menu_3',
    'acf_flexible_top_menu_3_thumbnail',
    10,
    3
);
function acf_flexible_top_menu_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/top_menu/top_menu_3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=top_menu_4',
    'acf_flexible_top_menu_4_thumbnail',
    10,
    3
);
function acf_flexible_top_menu_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/top_menu/top_menu_4.jpg';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Bottom Menu Block THUMBNAILS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_1',
    'acf_flexible_bottom_menu_1_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_1_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_1.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_2',
    'acf_flexible_bottom_menu_2_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_2_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/top_menu_2.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_3',
    'acf_flexible_bottom_menu_3_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_3_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_3.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_4',
    'acf_flexible_bottom_menu_4_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_4_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_4.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_5',
    'acf_flexible_bottom_menu_5_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_5_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_5.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_6',
    'acf_flexible_bottom_menu_6_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_6_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_6.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_7',
    'acf_flexible_bottom_menu_7_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_7_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_7.jpg';
}

add_filter(
    'acfe/flexible/thumbnail/layout=bottom_menu_8',
    'acf_flexible_bottom_menu_8_thumbnail',
    10,
    3
);
function acf_flexible_bottom_menu_8_thumbnail($thumbnail, $field, $layout)
{
    return get_stylesheet_directory_uri() .
        '/lib/admin/img/bottom_menu/bottom_menu_8.jpg';
}
