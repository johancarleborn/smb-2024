<?php

// ACF settings page for the theme
add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {

        $theme_settings = array(
            'page_title' => 'Generella inställningar',
            'icon_url' => get_stylesheet_directory_uri() . '/src/assets/theme/theme_lightning.svg',
            'menu_slug' => 'theme-settings',
            'position' => '998.99'
        );
        acf_add_options_page($theme_settings);

        $popup = array(
            'page_title' => 'Popup',
            'icon_url' => get_stylesheet_directory_uri() . '/src/assets/theme/popup.svg',
            'menu_slug' => 'theme-popup',
            'position' => '998.99'
        );
        acf_add_options_page($popup);

        $theme_header = array(
            'page_title' => 'Sidhuvud',
            'icon_url' => get_stylesheet_directory_uri() . '/src/assets/theme/theme_header.svg',
            'menu_slug' => 'theme-header',
            'position' => '999.99'
        );
        acf_add_options_page($theme_header);

        $theme_footer = array(
            'page_title' => 'Sidfoten',
            'icon_url' => get_stylesheet_directory_uri() . '/src/assets/theme/theme_footer.svg',
            'menu_slug' => 'theme-footer',
            'position' => '999.99'
        );
        acf_add_options_page($theme_footer);


        // Include the setting pages
        include_once get_stylesheet_directory() . '/inc/acf/theme-settings.php';
        include_once get_stylesheet_directory() . '/inc/acf/popup.php';
        include_once get_stylesheet_directory() . '/inc/acf/theme-header.php';
        include_once get_stylesheet_directory() . '/inc/acf/theme-footer.php';
    }


    // Require all files in the field-groups folder, not sub folders
    $field_groups = glob(get_stylesheet_directory() . '/inc/acf/field-groups/*.php');
    foreach ($field_groups as $fields) {
        require $fields;
    }
});


// Adds title to flexible content component from text field
// https://www.advancedcustomfields.com/resources/acf-fields-flexible_content-layout_title/
add_filter('acf/fields/flexible_content/layout_title/name=lb_components', 'acf_fields_flexible_content_layout_title', 10, 4);
add_filter('acf/fields/flexible_content/layout_title/name=ab_components', 'acf_fields_flexible_content_layout_title', 10, 4);

function acf_fields_flexible_content_layout_title($title, $field, $layout, $i) {

    $icon_image_path = get_stylesheet_directory() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $layout['name']) . '/' . $layout['name'] . '.svg';
    $preview_image_path = get_stylesheet_directory() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $layout['name']) . '/pre-' . $layout['name'] . '.jpg';

    if (file_exists($preview_image_path)) {
        $image_url = get_stylesheet_directory_uri() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $layout['name']) . '/pre-' . $layout['name'] . '.jpg';
        $title = '<div class="preview-image"><span>Förhandsvisning</span><img style="margin-right: 8px; margin-bottom: -8px;" src="' . esc_url($image_url) . '" /></div>' . $title;
    }

    if (file_exists($icon_image_path)) {
        $icon_url = get_stylesheet_directory_uri() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $layout['name']) . '/' . $layout['name'] . '.svg';
        $title = '<img class="icon-image" style="margin-right: 8px; margin-bottom: -8px;" src="' . esc_url($icon_url) . '" height="26px" />' . $title;
    }

    $title = $title;

    // Load text sub field
    if ($text = get_sub_field('component_name')) {
        $title .= ' - <b style="color:#1e4ca0">' . strip_tags($text) . '</b>';
    }

    if (empty(get_sub_field('component_name'))) {
        if ($text = get_sub_field('title')) {
            $title .= ' - <b style="color:#1e4ca0">' . strip_tags($text) . '</b>';
        }
    }

    if (get_sub_field('hide_component')) {
        $title .= ' - <b style="color:#aaa;"><ion-icon name="eye-off-outline" style="width:16px;"></ion-icon> Dold</b>';
    }

    if ($layout['name'] == 'post_listing') {
        $offset = get_sub_field('offset') ? ' (Hoppar över ' . get_sub_field('offset') . ')</span>' : '';
        $qty = get_sub_field('qty') ? get_sub_field('qty') : 'alla';

        $title .= ' - <b style="color:#4364f7; margin-left: 4px; margin-right: 4px;" class="featured-post">Visar ' . $qty . ' inlägg. <span style="color: #859bfe;">' . $offset . '</b>';
    }

    return $title;
}


// Check if the component_id field only contains valid characters
function check_component_id($valid, $value, $field, $input_name) {
    // If value is empty, return valid because it's not required
    if (empty($value)) {
        return $valid;
    } else {
        // Bail early if value is already invalid.
        if ($valid !== true) {
            return $valid;
        }

        // Check if string only contains lowercase letters, numbers, underscores and hyphens and doesn't start with a number
        if (!preg_match('/^[a-z][a-z0-9_-]*$/', $value)) {
            $valid = 'Endast små bokstäver, siffror, bindestreck och understreck. Får inte börja med siffra.';
        }

        return $valid;
    }
}
// Apply to all "component_id" fields.
add_filter('acf/validate_value/name=component_id', 'check_component_id', 10, 4);


// Add gravity form id and name as choices to the select field
add_filter('acf/load_field/key=field_lb_theme_popup_gravityform', 'acf_load_field_field_lb_forms_form');
add_filter('acf/load_field/key=field_lb_forms_gravityform', 'acf_load_field_field_lb_forms_form');
function acf_load_field_field_lb_forms_form($field) {
    $forms = GFAPI::get_forms();
    if (empty($forms)) {
        return $field;
    }

    $choices = array();
    foreach ($forms as $form) {
        $choices[$form['id']] = $form['title'];
    }
    $field['choices'] = $choices;
    return $field;
}
