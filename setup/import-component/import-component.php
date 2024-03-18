<?php
add_action('wp_ajax_get_component_name', 'get_component_name');
add_action('wp_ajax_nopriv_get_component_name', 'get_component_name');

function get_component_name() {
    check_ajax_referer('get_component_name', 'security');
    $page_id = $_POST['page_id'];
    // Loopa igenom alla acf layouter från sidan med page_id och skapa en array med dess namn
    $layouts_from_page = get_field_object('lb_components', $page_id, false, true);
    $layout_names = [];

    // Add the value to this page.
    if (!empty($layouts_from_page['value'])) {

        foreach ($layouts_from_page['value'] as $layout) {
            if (!isset($layout['field_lb_' . $layout['acf_fc_layout'] . '_colors_field_clone_component_name']) || empty($layout['field_lb_' . $layout['acf_fc_layout'] . '_colors_field_clone_component_name'])) {
                continue;
            }
            $layout_names[] = $layout['field_lb_' . $layout['acf_fc_layout'] . '_colors_field_clone_component_name'];
        }

        if (count($layout_names) > 0) {
            $message = '- Välj komponent -';
        } else {
            $message = 'Det finns inga komponenter att importera.';
        }

        $response = [
            'status' => 'success',
            'message' => $message,
            'page_id' => $page_id,
            'layout_names' => $layout_names,
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Det finns inga komponenter att importera.',
        ];
    }
    wp_send_json($response);
}


add_action('wp_ajax_import_component', 'import_component');
add_action('wp_ajax_nopriv_import_component', 'import_component');
function import_component() {
    check_ajax_referer('import_component', 'security');
    $page_import_id = $_POST['page_id'];

    // If there aren't any layouts to import, skip the rest.
    if (empty($page_import_id)) {
        return;
    }

    $layout_to_import = $_POST['component'];
    $current_page_id = $_POST['current_page_id'];
    $layouts_from_current_page = get_field('lb_components', $current_page_id, true, true);

    // Flex layouts from this page (field_lb is a Flexible Content field named "Layouts")
    $current_page_flex_layouts = [];

    foreach ($layouts_from_current_page as $layout) {
        $current_page_flex_layouts[] = $layout;
    }

    // Get the layouts value from the selected page.
    $layouts_from_page = get_field_object('lb_components', $page_import_id, false, true);

    // Add the value to this page.
    if (!empty($layouts_from_page['value'])) {
        foreach ($layouts_from_page['value'] as $layout) {

            if (!isset($layout['field_lb_' . $layout['acf_fc_layout'] . '_colors_field_clone_component_name'])) {
                continue;
            }

            if ($layout['field_lb_' . $layout['acf_fc_layout'] . '_colors_field_clone_component_name'] == $layout_to_import) {
                $layout['field_lb_' . $layout['acf_fc_layout'] . '_colors_field_lb_clone_component_hide_component'] = 1;
                $current_page_flex_layouts[] = $layout;
            }
        }
    }

    if (update_field('field_lb', $current_page_flex_layouts, $current_page_id)) {
        // Reset the import fields
        update_field('import_flex_layout_page', [], $current_page_id);
        update_field('import_flex_layout', '', $current_page_id);

        wp_send_json([
            'status' => 'success',
            'message' => 'Komponenten har importerats',
        ]);
    }
}
