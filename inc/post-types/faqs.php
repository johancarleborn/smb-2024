<?php

/**
 * Post Type - FAQ 
 */

function faq_post_type() {
    $labels = array(
        'name' => _x('FAQ', 'Post Type General Name', 'lightning'),
        'singular_name' => _x('FAQ', 'Post Type Singular Name', 'lightning'),
        'menu_name' => __('FAQ', 'lightning'),
        'name_admin_bar' => __('FAQ', 'lightning'),
        'archives' => __('Arkiv', 'lightning'),
        'attributes' => __('Attribut', 'lightning'),
        'parent_item_colon' => __('Föräldrarobjekt', 'lightning'),
        'all_items' => __('Alla FAQer', 'lightning'),
        'add_new_item' => __('Lägg till FAQ', 'lightning'),
        'add_new' => __(' Lägg till', 'lightning'),
        'new_item' => __('Ny FAQ', 'lightning'),
        'edit_item' => __('Redigera FAQ', 'lightning'),
        'update_item' => __('Uppdatera FAQ', 'lightning'),
        'view_item' => __('Visa FAQ', 'lightning'),
        'view_items' => __('Visa FAQer', 'lightning'),
        'search_items' => __('Sök FAQ', 'lightning'),
        'not_found' => __('Hittades inte', 'lightning'),
        'not_found_in_trash' => __('Hittades inte i papperskorgen', 'lightning'),
        'featured_image' => __('Utvald bild', 'lightning'),
        'set_featured_image' => __('Ange utvald bild', 'lightning'),
        'remove_featured_image' => __('Ta bort utvald bild', 'lightning'),
        'use_featured_image' => __('Använd utvald bild', 'lightning'),
        'insert_into_item' => __('Lägg till i FAQ', 'lightning'),
        'uploaded_to_this_item' => __('Uppladdat till det här objektet', 'lightning'),
        'items_list' => __('FAQ lista', 'lightning'),
        'items_list_navigation' => __('FAQ list-navigation', 'lightning'),
        'filter_items_list' => __('Filtrera FAQ lista', 'lightning'),
    );
    $args = array(
        'label' => __('FAQ', 'lightning'),
        'description' => __('Beskrivning av FAQ', 'lightning'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'revisions'),
        'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'show_in_rest' => 'true',
    );
    register_post_type('faq', $args);
}
add_action('init', 'faq_post_type', 0);

/**
 * Category taxonomy - FAQ 
 */

function faq_category_taxonomy() {
    $labels = array(
        'name'                       => _x('Kategorier', 'Taxonomy General Name', 'lw'),
        'singular_name'              => _x('Kategory', 'Taxonomy Singular Name', 'lw'),
        'menu_name'                  => __('Kategorier', 'lw'),
        'all_items'                  => __('Alla kategorier', 'lw'),
        'parent_item'                => __('Föräldrarobjekt', 'lw'),
        'parent_item_colon'          => __('Föräldrarobjekt:', 'lw'),
        'new_item_name'              => __('Nytt objektnamn', 'lw'),
        'add_new_item'               => __('Lägg till ny', 'lw'),
        'edit_item'                  => __('Redigera', 'lw'),
        'update_item'                => __('Uppdatera', 'lw'),
        'view_item'                  => __('Visa', 'lw'),
        'separate_items_with_commas' => __('Separera objekt med komma', 'lw'),
        'add_or_remove_items'        => __('Lägg till eller ta bort objekt', 'lw'),
        'choose_from_most_used'      => __('Välj från mest använda', 'lw'),
        'popular_items'              => __('Populära objekt', 'lw'),
        'search_items'               => __('Sök objekt', 'lw'),
        'not_found'                  => __('Inget funnet', 'lw'),
        'no_terms'                   => __('Inga objekt', 'lw'),
        'items_list'                 => __('Objektlista', 'lw'),
        'items_list_navigation'      => __('Items list navigation', 'lw'),
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
    register_taxonomy('faq_category', array('faq'), $args);
}
add_action('init', 'faq_category_taxonomy', 0);
