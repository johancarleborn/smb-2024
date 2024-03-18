<?php

/**
 * Post Type - Vittnesmål 
 */

function testimonial_post_type() {
    $labels = array(
        'name' => _x('Vittnesmål', 'Post Type General Name', 'lightning'),
        'singular_name' => _x('Vittnesmål', 'Post Type Singular Name', 'lightning'),
        'menu_name' => __('Vittnesmål', 'lightning'),
        'name_admin_bar' => __('Vittnesmål', 'lightning'),
        'all_items' => __('Alla vittnesmål', 'lightning'),
        'add_new' => __(' Lägg till', 'lightning'),
        'new_item' => __('Nytt vittnesmål', 'lightning'),
        'edit_item' => __('Redigera vittnesmål', 'lightning'),
        'add_new_item' => __('Namn på personen', 'lightning'),

    );
    $args = array(
        'label' => __('Vittnesmål', 'lightning'),
        'description' => __('Beskrivning av vittnesmål', 'lightning'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'revisions'),
        'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-chat',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'show_in_rest' => 'true',
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'testimonial_post_type', 0);

/**
 * Category taxonomy - vittnesmål 
 */

function testimonial_category_taxonomy() {
    $labels = array(
        'name'                       => _x('Kategorier', 'Taxonomy General Name', 'lightning'),
        'singular_name'              => _x('Kategory', 'Taxonomy Singular Name', 'lightning'),
        'menu_name'                  => __('Kategorier', 'lightning'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('testimonial_category', array('testimonial'), $args);
}
add_action('init', 'testimonial_category_taxonomy', 0);
