<?php

/**
 * Theme Functions
 *
 * Entire theme's function definitions.
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Globals
 */
define('REVERB_VER', '1.0.0');
define('REVERB_DIR', get_template_directory());
define('REVERB_URL', get_template_directory_uri());

/**
 * Includes
 */
$includes = [
    'styles-scripts.php', // Enqueue styles and scripts
    'acf.php', // ACF functions.
    'class-wp-bootstrap-navwalker.php', // Load custom WordPress nav walker.
    'class-wp-bootstrap-side-navwalker.php', // Load custom WordPress nav walker.
    'components.php', // Load module components
    'modules.php', // Load module framework functions
    'setup.php', // Theme Setup functions.
    'widgets.php', // Load widget areas
];

foreach ($includes as $file) {
    require_once get_template_directory() . '/lib/functions/' . $file;
}

/**
 * Modules
 */
$modules = [
    'apps.php', // Load apps functions
    'call_to_action.php', // Load call to action functions
    'companies.php', // Load companies functions
    'contacts.php', // Load contacts functions
    'content.php', // Load content functions
    'content_with_photo.php', // Load content with photo functions
    'covers.php', // Load covers functions
    'features.php', // Load features functions
    'features_with_photo.php', // Load features with photo functions
    'food_menu.php', // Load food menu functions
    'footers.php', // Load footer functions
    'forms.php', // Load form functions
    'gallery.php', // Load gallery functions
    'grid.php', // Load grid functions
    'headers.php', // Load headers functions
    'headings.php', // Load headings functions
    'hero.php', // Load hero functions
    'portfolio.php', // Load portfolio functions
    'pricing.php', // Load pricing functions
    'products.php', // Load products functions
    'services.php', // Load services functions
    'specifications.php', // Load specifications functions
    'team.php', // Load team functions
    'testimonials.php', // Load testimonials functions
    'text.php', // Load text functions
];

foreach ($modules as $module) {
    require_once get_template_directory() . '/lib/modules/' . $module;
}

/**
 * Widgets
 */
$widgets = [
    'menu.php', // Load Menu widget
    'site-info.php', // Load Site Info widget
];

foreach ($widgets as $widget) {
    require_once get_template_directory() . '/lib/widgets/' . $widget;
}
