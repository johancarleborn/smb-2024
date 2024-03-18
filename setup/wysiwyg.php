<?php
defined( 'ABSPATH' ) || exit;

// add custom style formats
add_filter( 'mce_buttons_2', 'register_wysiwyg_buttons' );
function register_wysiwyg_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'wysiwyg_button_formats' );
function wysiwyg_button_formats( $init_array ) {

    $style_formats = array(
        array(
            'title' => 'Button Solid',
            'inline' => 'a',
            'classes' => 'u-button default',
            'wrapper' => true,
        ),
        array(
            'title' => 'Button Transparent',
            'inline' => 'a',
            'classes' => 'u-link demo',
            'wrapper' => true,
        ),
    );

    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;
}

// add custom js
add_filter( 'mce_external_plugins', 'wysiwyg_plugin' );
function wysiwyg_plugin( $plugins ) {
    $plugins['wysiwyg'] = get_template_directory_uri() . '/assets/js/wysiwyg.js';
    return $plugins;
}

// add custom css
add_action( 'init', 'wysiwyg_styles' );
function wysiwyg_styles() {
    add_editor_style( 'assets/css/wysiwyg.css' );
}

// allow <span> in editor
add_filter( 'tiny_mce_before_init', 'tinymce_init' );
function tinymce_init( $init ) {
    $init['extended_valid_elements'] .= ', span';
    $init['verify_html'] = false;
    return $init;
}
