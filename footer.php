<?php

/**
 * Footer
 *
 * The footer template.
 *
 * @since   2.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
} ?>

<?php wp_footer(); ?>
<?php
$scripts = get_field('footer_scripts', 'options');
echo !empty($scripts) ? $scripts : '';
?>
</body>

</html>