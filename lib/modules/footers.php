<?php

/**
 * Module: Footers
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_footers($options, $layout)
{
    switch ($layout) {
        case 'footer_1':
            rvb_module_footer_1($options);
            break;
        case 'footer_2':
            rvb_module_footer_2($options);
            break;
        case 'footer_3':
            rvb_module_footer_3($options);
            break;
        case 'footer_4':
            rvb_module_footer_4($options);
            break;
        case 'footer_5':
            rvb_module_footer_5($options);
            break;
        case 'footer_6':
            rvb_module_footer_6($options);
            break;
        case 'footer_7':
            rvb_module_footer_7($options);
            break;
        case 'footer_8':
            rvb_module_footer_8($options);
            break;
        case 'footer_9':
            rvb_module_footer_9($options);
            break;
        case 'footer_10':
            rvb_module_footer_10($options);
            break;
        case 'footer_11':
            rvb_module_footer_11($options);
            break;
        case 'footer_12':
            rvb_module_footer_12($options);
            break;
        case 'footer_13':
            rvb_module_footer_13($options);
            break;
        case 'footer_14':
            rvb_module_footer_14($options);
            break;
        case 'footer_15':
            rvb_module_footer_15($options);
            break;
        case 'footer_16':
            rvb_module_footer_16($options);
            break;
        case 'footer_17':
            rvb_module_footer_17($options);
            break;
        case 'footer_18':
            rvb_module_footer_18($options);
            break;
        case 'footer_19':
            rvb_module_footer_19($options);
            break;
        case 'footer_20':
            rvb_module_footer_20($options);
            break;
        case 'footer_21':
            rvb_module_footer_21($options);
            break;
        case 'footer_22':
            rvb_module_footer_22($options);
            break;
        case 'footer_28':
            rvb_module_footer_28($options);
            break;
        case 'footer_30':
            rvb_module_footer_30($options);
            break;
        case 'footer_31':
            rvb_module_footer_31($options);
            break;
    }
}

/**
 * Module: Footer 1
 */
function rvb_module_footer_1($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('align-items-center py-4');
    rvb_module_column_open('col-12 col-md-6');
    rvb_component_copyright($options, 'text-center text-md-start');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-md-6 text-end');
    rvb_component_social_icons(
        $options,
        'd-flex align-items-center justify-content-center justify-content-md-end mb-0',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 2
 */
function rvb_module_footer_2($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-4 pb-2 p-lg-4 d-flex align-items-center'
    );
    rvb_component_copyright($options, 'd-flex mt-4 mt-lg-0');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-2 pb-4 p-lg-4text-end d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap'
    );
    rvb_component_social_icons(
        $options,
        'd-flex align-items-center justify-content-start justify-content-lg-end mb-0',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 3
 */
function rvb_module_footer_3($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-4 pb-2 p-lg-4 d-flex align-items-center'
    );
    rvb_component_copyright($options, 'd-flex mt-4 mt-lg-0');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-2 pb-4 p-lg-4text-end d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap'
    );
    rvb_component_footer_nav('p-0', 1, '', '');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 4
 */
function rvb_module_footer_4($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-4 pb-2 p-lg-4 d-flex align-items-center justify-content-start flex-wrap'
    );
    rvb_component_copyright($options, 'd-flex mt-4 mt-lg-0');
    rvb_component_footer_nav(
        'p-0 ms-lg-4 mt-4 mt-lg-0 w-100 w-lg-auto',
        1,
        '',
        ''
    );
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-2 pb-4 p-lg-4 d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap'
    );
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 5
 */
function rvb_module_footer_5($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open(
        'footer-logo col-12 col-lg-3 pt-4 pt-lg-0 d-flex align-items-center justify-content-start'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-3 pt-lg-4 p-lg-4 d-flex align-items-center justify-content-center'
    );
    rvb_component_footer_nav('p-0 ms-lg-4 w-100 w-lg-auto', 1, '', '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-3 pt-2 pb-4 p-lg-3 d-flex align-items-center justify-content-start justify-content-lg-end'
    );
    rvb_component_copyright($options, 'd-flex');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 6
 */
function rvb_module_footer_6($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open(
        'footer-logo col-12 col-lg-3 pt-4 pt-lg-0 d-flex align-items-center justify-content-start'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-9 pt-3 pt-lg-4 p-lg-4 d-flex align-items-center justify-content-start justify-content-lg-end'
    );
    rvb_component_footer_nav('p-0 ms-lg-4 w-100 w-lg-auto', 1, '', '');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 7
 */
function rvb_module_footer_7($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open(
        'align-items-center justify-content-between pt-4 py-lg-4'
    );
    rvb_module_column_open(
        'col-12 col-lg-auto d-flex justify-content-center justify-content-lg-start mb-4 mb-lg-0'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg');
    rvb_component_footer_nav(
        'p-0 ms-lg-4 text-center',
        1,
        '',
        'd-lg-flex justify-content-lg-center'
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-auto py-4 py-lg-0');
    rvb_component_social_icons(
        $options,
        'd-flex justify-content-center justify-content-lg-end',
        '',
        'd-flex align-items-center justify-content-center',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12');
    echo '<hr class="m-0" />';
    rvb_module_column_close('');
    rvb_module_row_close('');
    rvb_module_row_open('py-4');
    rvb_module_column_open('col-12 text-center');
    rvb_component_copyright(
        $options,
        'd-flex me-lg-3 w-100 w-lg-auto align-items-center justify-content-center fs-xs'
    );
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 8
 */
function rvb_module_footer_8($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('py-4');
    rvb_module_column_open(
        'col-left col-12 col-lg-5 d-flex align-items-center order-2 order-lg-1'
    );
    rvb_component_footer_left_nav('p-0 w-100', 1);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-center col-12 col-lg-2 mb-4 mb-lg-0 d-flex justify-content-center order-1 order-lg-2'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-right col-12 col-lg-5 d-flex align-items-center order-3'
    );
    rvb_component_footer_right_nav('p-0 w-100', 1);
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 9
 */
function rvb_module_footer_9($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('py-4');
    rvb_module_column_open(
        'col-12 d-flex align-items-center justify-content-center'
    );
    rvb_component_copyright($options, 'd-flex');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 10
 */
function rvb_module_footer_10($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('pb-5');
    rvb_module_column_open(
        'col-12 d-flex align-items-center justify-content-center my-5 my-lg-6'
    );
    rvb_component_social_icons($options, 'd-flex', '', '', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 mb-4 text-center');
    rvb_component_footer_nav(
        'p-0',
        1,
        'w-100',
        'd-flex align-items-center justify-content-center w-100'
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12');
    rvb_component_copyright(
        $options,
        'd-flex w-100 align-items-center justify-content-center'
    );
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 11
 */
function rvb_module_footer_11($options)
{
    if (empty($options)) {
        return;
    }

    $privacy_policy_page_link = get_privacy_policy_url();

    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-4 p-4');
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-3 p-4 border-left');
    rvb_component_footer_nav('p-0', 1, '', '');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-5 p-4 border-left');
    rvb_component_footer_excerpt($options, '');
    rvb_module_column_close('');
    rvb_module_row_close('');

    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-4 p-4 order-3 order-lg-1');
    echo $privacy_policy_page_link
        ? '<a href="' .
            $privacy_policy_page_link .
            '" class="text-muted" title="Privacy Policy">Privacy Policy</a>'
        : '';
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-3 p-4 border-left order-1 order-lg-2'
    );
    rvb_component_social_icons($options, 'd-flex', '', '', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-5 p-4 border-left order-2 order-lg-3'
    );
    rvb_component_footer_form($options, '');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 12
 */
function rvb_module_footer_12($options)
{
    if (empty($options)) {
        return;
    }

    $privacy_policy_page_link = get_privacy_policy_url();

    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 p-4 pt-5 d-flex align-items-center justify-content-start justify-content-lg-center'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 p-4 d-flex align-items-center justify-content-start justify-content-lg-center'
    );
    rvb_component_footer_nav('p-0', 1, '', '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 p-4 d-flex align-items-center justify-content-start justify-content-lg-center'
    );
    rvb_component_social_icons($options, ' d-flex', '', '', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-10 offset-lg-1 p-4 text-center');
    rvb_component_copyright($options, 'd-inline');
    rvb_component_footer_excerpt($options, '');
    echo $privacy_policy_page_link
        ? '<a href="' .
            $privacy_policy_page_link .
            '" class="text-muted" title="Privacy Policy">Privacy Policy</a>'
        : '';
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 13
 */
function rvb_module_footer_13($options)
{
    if (empty($options)) {
        return;
    }

    $privacy_policy_page_link = get_privacy_policy_url();

    rvb_module_row_open('mb-5 mb-lg-7');
    rvb_module_column_open('col-12');
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_row_close('');
    rvb_module_row_open('mb-5 mb-lg-9');
    rvb_module_column_open('col-12 col-lg-6');
    rvb_component_footer_form($options, 'w-100');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 text-lg-right mt-7 mt-lg-0');
    echo '<p class="mb-4">Follow us</p>';
    rvb_component_social_icons(
        $options,
        'd-flex justify-content-lg-end',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_row_close('');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-6 order-2 order-lg-1');
    rvb_component_copyright($options, '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 text-lg-right order-1 order-lg-2 mb-4 mb-lg-0'
    );
    echo $privacy_policy_page_link
        ? '<a href="' .
            $privacy_policy_page_link .
            '" class="text-muted" title="Privacy Policy">Privacy Policy</a>'
        : '';
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 14
 */
function rvb_module_footer_14($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('align-items-center justify-content-between pt-5');
    rvb_module_column_open('col-12 col-md-auto');
    rvb_component_footer_nav('p-0 mx-n2 mx-md-0', 1, '', '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-md-auto d-flex flex-wrap align-items-center justify-content-md-end mt-4 mt-lg-0'
    );
    echo '<p class="mb-3 mb-md-0 me-2">Download app</p>';
    //mobile_app('d-flex mb-0', 'me-3 ms-md-3');
    rvb_module_column_close('');
    rvb_module_row_close('');
    rvb_module_row_open('pb-5 d-flex flex-wrap justify-content-between');
    rvb_module_column_open('col-12');
    echo '<hr />';
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-md-auto');
    rvb_component_copyright($options, '');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-md-auto text-md-right mt-3 mt-md-0');
    rvb_component_footer_privacy($options, '');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 15
 */
function rvb_module_footer_15($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-3 d-flex align-items-center mb-5 mb-lg-0 pe-5 order-1'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 d-flex align-items-center px-lg-5 order-2'
    );
    echo '<p class="mb-0">Subscribe and get news</p>';
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-3 d-flex align-items-center order-4 order-lg-3'
    );
    echo '<p class="mb-0">Follow us:</p>';
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-3 pt-4 pe-5 d-flex align-items-center order-6 order-lg-4'
    );
    rvb_component_copyright($options, 'd-inline small');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 pt-4 px-lg-5 d-flex align-items-center mb-5 mb-lg-0 order-3 order-lg-5'
    );
    rvb_component_footer_form($options, '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-3 pt-4 d-flex align-items-center order-5 order-lg-6'
    );
    rvb_component_social_icons($options, 'd-flex flex-wrap', '', '', '', 0);
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 16
 */
function rvb_module_footer_16($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('py-5 py-lg-10');
    rvb_module_column_open('col-12 col-lg-2 order-3 order-lg-1 mt-5 mt-lg-0');
    rvb_component_footer_logo($options);
    rvb_component_copyright($options, 'd-block small text-muted pe-lg-4 mt-3');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 pt-3 order-1 order-lg-2');
    rvb_component_footer_nav('p-0', 2, 'w-100', 'row row-cols-lg-3 w-100');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-4 pt-3 order-2 order-lg-3');
    echo '<h6 class="text-primary mb-4">Subscribe</h6>';
    rvb_component_footer_form($options, '');
    rvb_component_footer_excerpt($options, 'text-muted small mt-3');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 17
 */
function rvb_module_footer_17($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open('col-6 col-lg-3 pe-lg-5 order-2 order-lg-1');
    rvb_component_footer_logo($options);
    rvb_component_footer_excerpt($options, 'text-muted small mt-3 mb-4');
    rvb_component_social_icons($options, 'd-flex flex-wrap', '', '', '', 0);
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-7 d-flex justify-content-lg-center order-1 order-lg-2'
    );
    rvb_component_footer_nav('p-0 align-items-start mt-3', 2, '', '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-6 col-lg-2 d-flex flex-wrap justify-content-lg-end order-3'
    );
    echo '<p class="font-weight-bold mt-3 mb-3 w-100">Mobile app</p>';
    //mobile_app('w-100', 'mb-3 w-100');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 18
 */
function rvb_module_footer_18($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-8 order-2 order-lg-1');
    rvb_component_footer_nav('p-0 align-items-start mt-3', 2, '', '');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-3 offset-lg-1 text-lg-right order-1 order-lg-2'
    );
    rvb_component_footer_logo($options);
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 pt-lg-4 order-4 order-lg-3');
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-6 text-lg-right small pt-lg-4 order-3 order-lg-4 mb-4 mb-lg-0'
    );
    rvb_component_footer_privacy($options, '');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 19
 */
function rvb_module_footer_19($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-7');
    rvb_component_footer_nav('mega-menu p-0', 2, '', '');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-4 offset-lg-1');
    echo '<p class="font-weight-bold text-uppercase mb-4">Subscribe to our newsletter</p>';
    rvb_component_footer_form($options, 'mb-4');
    rvb_component_footer_excerpt($options, 'text-muted small mt-3 mb-4');
    rvb_component_social_icons(
        $options,
        'd-flex flex-wrap mb-4',
        '',
        '',
        '',
        0
    );
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 20
 */
function rvb_module_footer_20($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('');
    rvb_module_column_open('col-12 mt-6 mb-0 my-lg-7');
    rvb_component_footer_list(
        $options,
        'd-flex justify-content-around flex-wrap flex-lg-nowrap text-center m-0',
        'px-0 col-12 col-lg-auto mb-5 mb-lg-0'
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 mb-4');
    echo '<hr class="m-0" />';
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start align-items-center mb-4 mb-lg-0 order-2 order-lg-1 text-center text-lg-left'
    );
    rvb_component_footer_privacy($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-4 d-flex align-items-center justify-content-center mb-4 mb-lg-0 order-3 order-lg-2 text-center text-lg-left'
    );
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end order-1 order-lg-3 mb-4 mb-lg-0 text-center text-lg-left'
    );
    rvb_component_social_icons($options, 'd-flex flex-wrap m-0', '', '', '', 0);
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 21
 */
function rvb_module_footer_21($options)
{
    if (empty($options)) {
        return;
    }

    $small_heading_left = get_field('footer', 'options')['footer_layout'][0][
        'small_heading_left'
    ];
    $small_heading_right = get_field('footer', 'options')['footer_layout'][0][
        'small_heading_right'
    ];

    rvb_module_row_open('');
    rvb_module_column_open('col-12');
    rvb_component_footer_nav('mega-menu p-0', 2, '', '');
    rvb_module_column_close('');
    rvb_module_row_close('');
    rvb_module_row_open('position-relative');
    rvb_module_column_open('col-6');
    echo $small_heading_left ? $small_heading_left : '';
    rvb_module_column_close('');
    rvb_module_column_open('col-6 text-end');
    echo $small_heading_right ? $small_heading_right : '';
    rvb_module_column_close('');
    rvb_module_column_open('col-12');
    rvb_component_footer_heading($options, 'h1 text-center my-8');
    rvb_module_column_close('');
    rvb_module_column_open('col-6');
    //mobile_app('d-flex m-0', 'me-3');
    rvb_module_column_close('');
    rvb_component_footer_inner_bg();
    rvb_module_row_close('');
}

/**
 * Module: Footer 22
 */
function rvb_module_footer_22($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('py-5 py-lg-10');
    rvb_module_column_open('col-12 col-lg-4 col-xl-3');
    rvb_component_footer_logo($options);
    echo '<p class="mt-4">Making the interface intuitive by building affordances</p>';
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 offset-lg-2 offset-xl-3');
    echo '<h5>Elevating Fresh & Flavorful fine dining by combining the most delicious wild-caught seafood with the freshest sides for an experience you won’t soon forget.</h5>';
    rvb_module_column_close('');
    rvb_module_row_close('');

    rvb_module_row_open('pb-5 pb-lg-10');
    rvb_module_column_open('col-12 col-lg-4 pb-5');
    rvb_component_footer_form($options, '');
    rvb_module_column_close('');
    rvb_module_column_open('col-6 col-lg-3 offset-lg-2');
    echo '<h6>Join Our Family</h6>';
    echo '<p>Click here to download our application</p>';
    rvb_module_column_close('');
    rvb_module_column_open('col-6 col-lg-3');
    echo '<h6>Follow Us On Yelp</h6>';
    echo '<p>Click here to see our yelp page</p>';
    rvb_module_column_close('');
    rvb_module_row_close('');

    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open('col-12 col-lg-4');
    rvb_component_footer_privacy(
        $options,
        'd-inline-block my-4 small text-muted'
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-4 text-center');
    rvb_component_social_icons(
        $options,
        'm-0 d-flex align-items-center justify-content-center justify-content-lg-between justify-content-lg-center',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-4 text-lg-end');
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 28
 */
function rvb_module_footer_28($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('my-5');
    rvb_module_column_open('col-12');
    rvb_component_footer_nav(
        'mb-4 p-0 mega-menu',
        2,
        'w-100',
        'd-flex justify-content-between w-100 font-weight-bold flex-wrap flex-lg-nowrap'
    );
    rvb_component_social_icons(
        $options,
        'm-0 d-flex align-items-center justify-content-center justify-content-lg-between justify-content-lg-center',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 text-center');
    rvb_component_footer_privacy(
        $options,
        'd-inline-block my-4 small text-muted'
    );
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 30
 */
function rvb_module_footer_30($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open('my-5');
    rvb_module_column_open('col-12');
    rvb_component_footer_nav(
        'mb-4 p-0',
        1,
        'w-100',
        'd-flex align-items-center justify-content-md-center w-100 font-weight-bold flex-wrap flex-md-nowrap text-start text-md-center'
    );
    rvb_module_column_close('');
    rvb_module_column_open('col-12 border-top border-bottom py-4');
    rvb_component_social_icons(
        $options,
        'm-0 d-flex align-items-center justify-content-between justify-content-md-center',
        '',
        '',
        '',
        0
    );
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 d-flex align-items-center justify-content-center flex-wrap flex-md-nowrap mt-4'
    );
    rvb_component_footer_sub_heading(
        $options,
        'mb-3 mb-md-0 me-md-4 text-muted small'
    );
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_row_close('');
}

/**
 * Module: Footer 31
 */
function rvb_module_footer_31($options)
{
    if (empty($options)) {
        return;
    }

    rvb_module_row_open(
        'g-0 h-100 w-100 position-absolute top-0 left-0 d-none d-lg-flex'
    );
    rvb_module_column_open('col-12 col-lg-6 bg-white');
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 bg-light');
    rvb_module_column_close('');
    rvb_module_row_close('');

    rvb_module_row_open('');
    rvb_module_container_open($options, 'container');
    rvb_module_row_open('py-lg-10');
    rvb_module_column_open('col-12 col-lg-5 order-2 order-lg-1 col_left');
    echo '<h4 class="mb-3 text-primary">Contact Us</h4>';
    rvb_module_row_open('row my-4 footer-boxes g-0');
    rvb_module_column_open('col-12 col-lg-6 active p-4');
    echo '<p class="font-weight-bold">By Phone</p>';
    echo '<p class="text-muted"><a href="tel:/+1-949-555-4567" title="Phone number link">949.555.4567</a></p>';
    echo '<p class="m-0"><a href="tel:/+1-+1-714-321-2188" class="text-primary text-link">Call Us Today</a></p>';
    rvb_module_column_close('');
    rvb_module_column_open('col-12 col-lg-6 p-4 border-primary');
    echo '<p class="font-weight-bold">By Directions</p>';
    echo '<address class="text-muted">2842 Walnut Ave A<br>Tustin, CA 92780</address>';
    echo '<p class="m-0"><a href="https://www.google.com/maps/search/2842+Walnut+Ave+A,+Tustin,+CA+92780/@33.713156,-117.8068612,17z/data=!3m1!4b1" class="text-primary text-link">Click For Directions</a></p>';
    rvb_module_column_close('');
    rvb_module_row_close('');
    echo '<p class="fw-bold text-primary text-center text-lg-start">Check us out on social media</p>';
    rvb_component_social_icons(
        $options,
        'd-flex align-items-center justify-content-center justify-content-md-start mb-0',
        '',
        '',
        '',
        0
    );
    echo '<hr />';
    rvb_component_copyright($options, 'text-muted small');
    rvb_module_column_close('');
    rvb_module_column_open(
        'col-12 col-lg-5 offset-lg-2 order-1 order-lg-2 pt-5 pt-lg-0 col_right'
    );
    echo '<h4 class="mb-3 text-primary">Schedule a free consultation</h4>';
    rvb_component_footer_form($options, '');
    rvb_module_column_close('');
    rvb_module_row_close('');
    rvb_module_container_close('');
    rvb_module_row_close('');
}
