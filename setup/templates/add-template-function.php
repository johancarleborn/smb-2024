<?php
add_action('wp_ajax_add_page', 'add_page');
add_action('wp_ajax_nopriv_add_page', 'add_page');

function add_page() {
    check_ajax_referer('add_page', 'security');
    $page_name = $_POST['page_name'];
    $page_id = $_POST['page_id'];
    $template_name = $_POST['template_name'];
    $template_slug = $_POST['template_slug'];

    // Skapa den nya sidan
    if (!empty($page_name)) {
        $page_id = wp_insert_post([
            'post_type'     => 'page',
            'post_title'    => $page_name,
            'post_status'   => 'publish',
            'page_template' => 'template-lightning-builder.php',
        ]);
    } else {
        // Uppdatera den befintliga sidan
        wp_update_post([
            'ID'            => $page_id,
            'page_template' => 'template-lightning-builder.php',
        ]);
    }

    create_template($page_id, $template_slug);

    $response = [
        'status' => 'success',
    ];

    if (!empty($page_name)) {
        $response['message'] = $page_name . ' har skapats med mallen ' . $template_name . ' här.';
        $response['new_page_admin_link'] = get_edit_post_link($page_id);
    }

    wp_send_json($response);

    wp_die();
}


function create_template($page_id, $template_slug) {

    if ($template_slug == 'template-text') {
        $fields = [
            'lb_components' => [
                [
                    'acf_fc_layout' => 'text_text',
                ],
                [
                    'acf_fc_layout' => 'text_text',
                ],
                [
                    'acf_fc_layout' => 'cover',
                ],
                [
                    'acf_fc_layout' => 'text_media',
                ]
            ]
        ];
    } elseif ($template_slug == 'template-archive') {
        $fields = [
            'lb_components' => [
                [
                    'acf_fc_layout' => 'cover',
                ],
                [
                    'acf_fc_layout' => 'post_listing',
                ],
            ]
        ];
    } elseif ($template_slug == 'template-about') {
        $fields = [
            'lb_components' => [
                [
                    'acf_fc_layout' => 'cover',
                ],
                [
                    'acf_fc_layout' => 'text_media',
                ],
                [
                    'acf_fc_layout' => 'text_media',
                ],
            ]
        ];
    }
    foreach ($fields as $field_key => $field_value) {
        update_field($field_key, $field_value, $page_id);
    }
}
