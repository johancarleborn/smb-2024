<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('component')) {
    /**
     * @param string $component_name
     * @param array $component_label
     * @return string
     */
    function component($component_name, $component_label = []) {
        $img = '';
        $preview_image_path = get_stylesheet_directory() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $component_name) . '/pre-' . $component_name . '.jpg';

        if (file_exists($preview_image_path)) {
            $image_url = get_stylesheet_directory_uri() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $component_name) . '/pre-' . $component_name . '.jpg';
            $img = '<img src="' . esc_url($image_url) . '" />';
        }

        $icon = '';
        $icon_image_path = get_stylesheet_directory() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $component_name) . '/' . $component_name . '.svg';
        if (file_exists($icon_image_path)) {
            $icon_url = get_stylesheet_directory_uri() . '/inc/acf/lightning-builder/page-components/pc-' . str_replace('_', '-', $component_name) . '/' . $component_name . '.svg';
            $icon = '<img src="' . esc_url($icon_url) . '" />';
        }
        $check = '<span class="component-added"><img src="' . get_stylesheet_directory_uri() . '/inc/acf/lightning-builder/parts/check.svg ' . '" /> Skrolla upp</span>';

        return "<a href=\"#\" data-layout=\"{$component_name}\" data-min=\"\" data-max=\"\"><span class=\"component-img\">{$img}</span><span class=\"component-icon\">{$icon}{$component_label} {$check}</span></a>";
    }
}
