<?php

function login_custom_css_file() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/admin/login-style.css');
}
add_action('login_enqueue_scripts', 'login_custom_css_file');

function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );