<?php

/**
 * Module: Contacts
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_contacts($module, $fields, $layout, $options)
{
    if (empty($module)) {
        return;
    }

    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'contacts_2':
            rvb_module_contacts_2($module, $fields, $options);
            break;
        case 'contacts_3':
            rvb_module_contacts_3($module, $fields, $options);
            break;
        case 'contacts_4':
            rvb_module_contacts_4($module, $fields, $options);
            break;
        case 'contacts_5':
            rvb_module_contacts_5($module, $fields, $options);
            break;
        case 'contacts_6':
            rvb_module_contacts_6($module, $fields, $options);
            break;
        case 'contacts_7':
            rvb_module_contacts_7($module, $fields, $options);
            break;
        case 'contacts_8':
            rvb_module_contacts_8($module, $fields, $options);
            break;
        case 'contacts_9':
            rvb_module_contacts_9($module, $fields, $options);
            break;
        case 'contacts_10':
            rvb_module_contacts_10($module, $fields, $options);
            break;
        case 'contacts_11':
            rvb_module_contacts_11($module, $fields, $options);
            break;
        case 'contacts_12':
            rvb_module_contacts_12($module, $fields, $options);
            break;
    }
}

/**
 * Module Contacts 2
 */
function rvb_module_contacts_2($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center py-5');
    rvb_module_column_open('col-12 col-lg-5');
    rvb_component_heading($module, $fields, 'h3', 'pb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1');
    rvb_component_email($module, $fields, 'gs_reveal', 0);
    rvb_component_phone($module, $fields, 'gs_reveal', 0);
    rvb_component_fax($module, $fields, 'gs_reveal', 0);
    rvb_component_address($module, $fields, 'pt-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3');
    echo '<p>Follow Us</p>';
    rvb_component_social_icons($options, 'row', 'col-auto', '', '', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 3
 */
function rvb_module_contacts_3($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $slides = [];
    $options = [
        'grabCursor' => true,
        'loop' => true,
        'speed' => 1100,
        'delay' => 8000,
        'parallax' => true,
        'preloadImages' => false,
        'lazy' => true,
        'pagination' => [
            'el' => '.slider_pagination',
            'clickable' => true,
            'type' => 'bullets',
        ],
    ];

    if (!empty($fields['locations'])) {
        foreach ($fields['locations'] as $location) {
            $slides[] = '<div class="swiper-slide py-5">';
            $slides[] = rvb_component_floating_image(
                $module,
                $location,
                $location['block_image'],
                '',
                'w-100 h-100',
                '',
                1
            );
            $slides[] =
                '<div class="mask z-index-3" style="background-color: rgba(0, 0, 0, 0.6);"></div>';
            $slides[] = rvb_module_container_open(
                $module,
                'position-relative z-index-4',
                1
            );
            $slides[] = rvb_module_row_open('', 1);
            $slides[] = rvb_module_column_open('col-12 col-lg-6', '', 1);
            $slides[] = rvb_component_address($module, $location, '', 1);
            $slides[] = rvb_module_column_close(1);
            $slides[] = rvb_module_column_open(
                'col-12 col-lg-6 text-lg-end',
                '',
                1
            );
            $slides[] = rvb_component_phone($module, $location, '', 1);
            $slides[] = rvb_component_fax($module, $location, '', 1);
            $slides[] = rvb_module_column_close(1);
            $slides[] = rvb_module_row_close(1);
            $slides[] = rvb_module_row_open('', 1);
            $slides[] = rvb_module_column_open(
                'col-12 col-lg-6 offset-lg-3 text-center',
                '',
                1
            );
            $slides[] = rvb_component_heading(
                $module,
                $location,
                'h1',
                'mt-6 mb-10',
                '',
                1
            );
            $slides[] = rvb_module_column_close(1);
            $slides[] = rvb_module_row_close(1);
            $slides[] = rvb_module_container_close($module, 1);
            $slides[] = '</div>';
        }
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-4');
    rvb_component_heading($module, $fields, 'h2', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-2');
    rvb_component_html_content($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-2 d-flex justify-content-lg-center');
    rvb_component_button_group($module, $fields, '', 0);
    rvb_module_column_close();
    rvb_module_column_open(
        'col-12 col-lg-3 offset-lg-1 d-flex justify-content-lg-end'
    );
    rvb_component_email($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
    rvb_module_column_open('container-fluid bg-dark text-white px-0');
    rvb_component_swiper(
        $module,
        $fields,
        $options,
        join('', $slides),
        $container_class = 'swiper-new',
        $wrapper_class = '',
        $pagination = 0,
        $external_pagination = 0,
        $navigation = 0,
        $external_navigation = 0,
        $return = 0
    );
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-6 mt-n5 position-relative z-index-5');
    rvb_component_social_icons($options, 'row', 'col-auto', '', 'gs_reveal', 0);
    rvb_module_column_close();
}

/**
 * Module Contacts 4
 */
function rvb_module_contacts_4($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $style =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-white text-dark';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        '',
        '',
        0
    );
    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-5 col-xl-4 offset-lg-6 offset-xl-7 my-5 my-md-6 py-5 px-sm-5 shadow-3 ' .
            $style
    );
    rvb_component_heading($module, $fields, 'h4', 'mb-2 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-3 gs_reveal', 0);
    rvb_component_address($module, $fields, 'gs_reveal', 0);
    rvb_component_email($module, $fields, 'd-flex gs_reveal', 0);
    rvb_component_phone($module, $fields, 'd-flex gs_reveal', 0);
    rvb_component_fax($module, $fields, 'd-flex gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 5
 */
function rvb_module_contacts_5($module, $fields, $options)
{
    if (empty($fields) || empty($fields['locations'])) {
        return;
    }

    $locations = $fields['locations'];
    $pills = [''];
    $content = [''];
    $x = 0;

    foreach ($locations as $location):
        $active_pill = '';
        $active_content = '';
        $title = $location['heading'];
        $email = $location['email']['email'];
        $phone = $location['phone']['phone'];
        $fax = $location['fax']['fax'];
        $address_1 = $location['address']['address_1'];
        $address_2 = $location['address']['address_2'];
        $city = $location['address']['city'];
        $state = $location['address']['state'];
        $zip = $location['address']['zip'];
        $button = !empty($location['button_single'])
            ? $location['button_single']
            : '';

        if ($x == 0) {
            $active_pill = ' active';
            $active_content = ' show active';
        }

        // pill
        $pills[] = '<li class="nav-item" role="presentation">';
        $pills[] =
            '<a class="nav-link shadow-0 fw-bold bg-transparent text-uppercase py-4 text-dark ' .
            $active_pill .
            '" id="ex1-tab-' .
            $x .
            '" data-mdb-toggle="pill" href="#ex1-pills-' .
            $x .
            '" role="tab" aria-controls="ex1-pills-' .
            $x .
            '" aria-selected="true">' .
            $title .
            '</a>';
        $pills[] = '</li>';

        // content wrapper
        $content[] =
            '<div class="tab-pane py-5 px-6 border-top fade' .
            $active_content .
            '" id="ex1-pills-' .
            $x .
            '" role="tabpanel" aria-labelledby="ex1-tab-' .
            $x .
            '">';
        $content[] = '<div class="row justify-content-md-between">';

        //address
        $content[] = '<address class="col-12 col-md-auto fs-md">';
        $content[] = '<p class="fs-md fw-bold">Address</p>';
        $content[] = $address_1 ? $address_1 . '<br />' : '';
        $content[] = $address_2 ? $address_2 . '<br />' : '';
        $content[] = $city ? $city . ', ' : '';
        $content[] = $state ? $state : '';
        $content[] = $zip ? ' ' . $zip : '';
        $content[] = '</address>';

        // email
        if ($email):
            $content[] = '<div class="col-12 col-md-auto">';
            $content[] = '<p class="fs-md fw-bold">Email</p>';
            $content[] =
                '<p class="fs-md"><a href="mailto:' .
                $email .
                '" class="btn-link">' .
                $email .
                '</a></p>';
            $content[] = '</div>';
        endif;

        //phone
        if ($phone || $fax):
            $content[] = '<div class="col-12 col-md-auto">';
            $content[] = '<p class="fs-md fw-bold">Phone</p>';
            $content[] = $phone
                ? '<p><a href="tel:+' .
                    $phone .
                    '" class="btn-link" title="Call Today">' .
                    $phone .
                    '</a></p>'
                : '';
            $content[] = $fax
                ? '<p><a href="tel:+' .
                    $fax .
                    '" class="btn-link" title="Fax Today">' .
                    $fax .
                    '</a></p>'
                : '';
            $content[] = '</div>';
        endif;

        // button
        $content[] = '<div class="col-12 col-md-auto">';
        $content[] = rvb_component_button_group($module, $location, '', 1);
        $content[] = '</div>';
        $content[] = '</div>';
        $content[] = '</div>';

        $x++;
    endforeach;

    rvb_module_container_open($module, 'pb-lg-6');
    rvb_module_row_open(
        'align-items-end position-relative pt-5 pt-lg-10 contact-top'
    );
    rvb_module_column_open('col-12 z-index-2 mt-5 mt-lg-10');
    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        'vw-100',
        '',
        '',
        0
    );
    echo !empty($pills)
        ? '<ul class="nav nav-pills justify-content-center bg-white text-body mx-0" id="ex1" role="tablist">' .
            join('', $pills) .
            '</ul>'
        : '';
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_row_open('contact-bottom');
    rvb_module_column_open('col-12');
    echo !empty($content)
        ? '<div class="tab-content bg-white text-body shadow-4" id="ex1-content">' .
            join('', $content) .
            '</div>'
        : '';
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 6
 */
function rvb_module_contacts_6($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $theme =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-white text-dark';

    rvb_module_row_open('position-relative g-0');
    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        'position-relative h-100 z-index-1',
        '',
        0
    );
    rvb_module_row_close();
    rvb_module_container_open($module, 'z-index-2 py-5');
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-3 offset-lg-1 py-5');
    rvb_component_address($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-3 py-5');
    rvb_component_phone($module, $fields, 'gs_reveal', 0);
    rvb_component_fax($module, $fields, 'gs_reveal', 0);
    rvb_component_email($module, $fields, 'mt-3 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 position-relative');
    rvb_component_form(
        $module,
        $fields,
        'position-absolute bg-white p-5 form_dark shadow bottom-0 mb-3'
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 7
 */
function rvb_module_contacts_7($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $theme =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-white text-dark';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        'w-100',
        '',
        0
    );
    rvb_module_container_open($module, 'z-index-2');
    rvb_module_row_open('');
    rvb_module_column_open(
        'form-container col-12 col-lg-7 p-5 z-index-2 mt-10 py-10 position-relative ' .
            $theme
    );
    echo '<div class="bg-image bg-color ' . $theme . '"></div>';
    echo '<div class="icon position-absolute top-0 d-flex align-items-center justify-content-center ' .
        $theme .
        '"><i class="fal fa-2x fa-envelope"></i></div>';
    echo '<div class="container-fluid position-relative z-index-2">';
    rvb_component_social_icons($options, '', '', '', '', 0);
    rvb_component_heading($module, $fields, 'h3', 'gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-5 gs_reveal', 0);
    rvb_module_row_open('mb-6');
    rvb_module_column_open('col col-lg-6');
    rvb_component_address($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col col-lg-6');
    rvb_component_phone($module, $fields, 'gs_reveal', 0);
    rvb_component_fax($module, $fields, 'gs_reveal', 0);
    rvb_component_email($module, $fields, 'gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('');
    rvb_module_column_open('col-12 col-lg-9');
    rvb_component_form($module, $fields, '');
    rvb_module_column_close();
    rvb_module_row_close();
    echo '</div>';
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 8
 */
function rvb_module_contacts_8($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $theme =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-white text-dark';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        'w-100',
        '',
        0
    );
    rvb_module_container_open($module, 'z-index-2');
    rvb_module_row_open('');
    rvb_module_column_open(
        'form-container col-12 col-lg-5 offset-lg-1 p-5 z-index-2 position-relative pe-lg-10 py-10 ' .
            $theme
    );
    rvb_component_heading($module, $fields, 'h3', 'mb-3 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'mb-5 gs_reveal', 0);
    rvb_component_address($module, $fields, 'mb-4 fs-md gs_reveal', 0);
    rvb_component_phone($module, $fields, 'fs-md gs_reveal', 0);
    rvb_component_fax($module, $fields, 'fs-md gs_reveal', 0);
    rvb_component_email($module, $fields, 'fs-md gs_reveal', 0);
    rvb_component_form($module, $fields, 'mt-5 gs_reveal');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 9
 */
function rvb_module_contacts_9($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $theme =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-light text-dark';

    rvb_component_floating_image(
        $module,
        $fields,
        $fields['block_image'],
        '',
        'w-100',
        '',
        0
    );
    rvb_module_container_open($module, 'position-relative z-index-2');
    rvb_module_row_open('');
    rvb_module_column_open(
        'col-12 col-lg-10 offset-lg-1 py-5 py-lg-6 px-lg-5 px-xl-10 ' . $theme
    );
    rvb_component_heading(
        $module,
        $fields,
        'h3',
        'text-center mb-3 gs_reveal',
        '',
        0
    );
    rvb_component_html_content(
        $module,
        $fields,
        'text-center mb-5 gs_reveal',
        0
    );
    rvb_component_form($module, $fields, 'mt-5 gs_reveal');
    rvb_module_column_close('');
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 10
 */
function rvb_module_contacts_10($module, $fields, $options)
{
    if (empty($fields)) {
        return;
    }

    $theme =
        $module['style'] == 'dark'
            ? 'bg-dark text-light'
            : 'bg-light text-dark';

    rvb_module_container_open($module, '');
    rvb_module_row_open('py-5');
    rvb_module_column_open('col-12 col-lg-4 text-center');
    rvb_component_address($module, $fields, 'mb-0 text-center gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 text-center');
    rvb_component_email($module, $fields, 'mb-0 text-center gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 text-center');
    rvb_component_phone($module, $fields, 'mb-0 text-center gs_reveal', 0);
    rvb_component_fax($module, $fields, 'mb-0 gs_reveal', 0);
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_row_open('border-top py-5');
    rvb_module_column_open('col-12 col-lg-8 offset-lg-2 text-center');
    rvb_component_html_content($module, $fields, 'mb-4 gs_reveal', 0);
    rvb_component_social_icons(
        $options,
        'row justify-content-center',
        'col-auto',
        'd-flex align-items-center justify-content-center ' . $theme,
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 11
 */
function rvb_module_contacts_11($module, $fields, $options)
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
    rvb_module_column_open('col-12 col-lg-4 offset-lg-4 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_email($module, $fields, 'gs_reveal', 0);
    rvb_component_phone($module, $fields, 'gs_reveal', 0);
    rvb_component_fax($module, $fields, 'gs_reveal', 0);
    rvb_component_address($module, $fields, 'my-4 gs_reveal', 0);
    rvb_component_social_icons(
        $options,
        'row justify-content-center',
        'col-auto',
        'd-flex align-items-center justify-content-center ' . $theme,
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module Contacts 12
 */
function rvb_module_contacts_12($module, $fields, $options)
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
    rvb_module_column_open('col-12 col-lg-6 offset-lg-3 text-center');
    rvb_component_heading($module, $fields, 'h3', 'mb-4 gs_reveal', '', 0);
    rvb_component_html_content($module, $fields, 'gs_reveal', 0);
    rvb_component_form($module, $fields, 'mt-4 gs_reveal');
    rvb_module_column_close();
    rvb_module_column_open('col-12 border-top my-5');
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 offset-lg-4 text-center');
    rvb_component_email($module, $fields, 'gs_reveal', 0);
    rvb_component_phone($module, $fields, 'gs_reveal', 0);
    rvb_component_fax($module, $fields, 'gs_reveal', 0);
    rvb_component_address($module, $fields, 'mt-4 mb-0 gs_reveal', 0);
    rvb_component_social_icons(
        $options,
        'row justify-content-center gs_reveal',
        'col-auto',
        'd-flex align-items-center justify-content-center mt-5 ' . $theme,
        '',
        0
    );
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
