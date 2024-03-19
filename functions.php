<?php

/**
 * lightning functions and definitions
 *
 * @package lightning
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

// Settings
require get_template_directory() . '/setup/settings.php';

// Enqueue scripts
require get_template_directory() . '/setup/scripts.php';
require get_template_directory() . '/setup/templates/add-template.php';
require get_template_directory() . '/setup/custom-header.php';
require get_template_directory() . '/setup/customizer.php';
require get_template_directory() . '/setup/import-component/import-component.php';
require get_template_directory() . '/setup/acf.php';

// Require all files in the inc folder, not sub folders
$files = glob(__DIR__ . '/inc/*.php');
foreach ($files as $file) {
    require $file;
}

// Require all files in the ajax folder
$ajax_files = glob(__DIR__ . '/inc/ajax/*.php');
foreach ($ajax_files as $file) {
    require($file);
}

// Require all files in the post-types folder
$post_type_files = glob(__DIR__ . '/inc/post-types/*.php');
foreach ($post_type_files as $file) {
    require($file);
}

require lb_path() . 'acf-lightning-builder.php';
