<?php

// Lägger till Open Graph i Language Attributes
function add_opengraph_doctype($output) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

// Lägger till Open Graph Meta Info i <head>
function og_tags_in_head() {
    global $post;

    if (!is_singular()) // Om det inte är ett inlägg eller en sida
        return;

    $preamble = get_field('preamble', $post->ID);
    echo '<meta property="fb:admins" content="A50BdSM2pBKilfv8_fvtooU"/>';
    echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '"/>';
    if ($preamble) {
        echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags($preamble)) . '"/>';
    } elseif (has_excerpt($post->ID)) {
        echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags(get_the_excerpt($post->ID))) . '"/>';
    }
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '"/>';
    echo '<meta property="og:site_name" content="Lightweb"/>';
    if (!has_post_thumbnail($post->ID)) {
        $default_image = esc_url(get_stylesheet_directory_uri() . '/admin/lw-logo-black.png');
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    } else {
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
        echo '<meta property="og:image" content="' . esc_url($thumbnail_src[0]) . '"/>';
    }

    // Locale
    echo '<meta property="og:locale" content="' . esc_attr(get_locale()) . '"/>';

    // Artikelinformation
    if (is_singular('post')) {
        echo '<meta property="article:published_time" content="' . esc_attr(get_the_time('c')) . '"/>';
        echo '<meta property="article:modified_time" content="' . esc_attr(get_the_modified_time('c')) . '"/>';
        echo '<meta property="article:author" content="' . esc_attr(get_the_author()) . '"/>';
    }
}
add_action('wp_head', 'og_tags_in_head', 5); // Prioritet satt till 5 för att säkerställa att det körs tidigt men kan ändras efter behov
