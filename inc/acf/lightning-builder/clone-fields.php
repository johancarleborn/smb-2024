<?php

if (function_exists('acf_add_local_field_group')) {
    // Include the clone fields
    include get_template_directory() . '/inc/acf/acf-arrays/colors.php';

    acf_add_local_field_group([
        'key' => 'group_clone_component_header',
        'title' => 'Component header',
        'fields' => [
            [
                'key' => 'field_clone_top_title',
                'label' => 'Topprubrik',
                'name' => 'top_title',
                'type' => 'text',
                'instructions' => 'Liten text som visas ovanför rubriken',
                'wrapper' => ['width' => 70],
            ],
            [
                'key' => 'field_clone_title',
                'label' => 'Rubrik',
                'name' => 'title',
                'type' => 'text',
                'wrapper' => ['width' => 70],
            ],
            [
                'key' => 'field_clone_title_tag',
                'label' => 'Rubriksnivå',
                'name' => 'title_tag',
                'type' => 'select',
                'choices' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                ],
                'default_value' => 'h2',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'value',
                'wrapper' => ['width' => 15],
            ],
            [
                'key' => 'field_clone_title_tag_message',
                'label' => 'OBS VIKTIGT!',
                'type' => 'message',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_clone_title_tag',
                            'operator' => '==',
                            'value' => 'h1',
                        ],
                    ],
                ],
                'message' => 'Använd endast en (1 st] H1 per sida för en bra SEO!',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ],
            [
                'key' => 'field_clone_text',
                'label' => __('Ingress', 'lightning'),
                'name' => 'text',
                'type' => 'wysiwyg',
                'instructions' => __('Håll det kort och koncist. Max 2-3 meningar.', 'lightning'),
                'tabs' => 'visual',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 1,
            ],
            [
                'key' => 'field_clone_text_align',
                'label' => __('Textjustering', 'lightning'),
                'name' => 'text_align',
                'type' => 'button_group',
                'choices' => [
                    'text-left' => __('Vänster', 'lightning'),
                    'text-center' => __('Center', 'lightning'),
                ],
                'allow_null' => 0,
                'instructions' => __('Appliceras på komponentens huvud och fot. Inte innehållet.', 'lightning'),
                'layout' => 'horizontal',
                'return_format' => 'value',
            ],
            [
                'key' => 'field_lb_clone_footer_link',
                'label' => __('Länk i komponentfoten', 'lightning'),
                'name' => 'component_link',
                'type' => 'link',
                'instructions' => __('Hamnar längst ner under allt innehåll i komponenten', 'lightning'),
                'required' => 0,
                'wrapper' => ['width' => 60]
            ],
            [
                'key' => 'field_lb_clone_footer_link_type',
                'label' => __('Visa länk som', 'lightning'),
                'name' => 'component_link_type',
                'type' => 'button_group',
                'choices' => [
                    'button' => __('Knapp', 'lightning'),
                    'link' => __('Länk', 'lightning'),
                ],
                'default_value' => 'button',
                'layout' => 'horizontal',
                'wrapper' => ['width' => 40],
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_lb_clone_footer_link',
                            'operator' => '!=empty',
                        ],
                    ],
                ],
            ],
        ],
    ]);

    acf_add_local_field_group([
        'key' => 'group_clone_component_settings',
        'title' => 'Component settings',
        'fields' => [
            [
                'key' => 'field_clone_bg_colors',
                'label' => 'Bakgrundsfärg',
                'name' => 'bg_colors',
                'type' => 'button_group',
                'conditional_logic' => 0,
                'wrapper' => [
                    'class' => 'colors-group',
                ],
                'choices' => $bg_colors,
                'default_value' => 'transparent',
                'return_format' => 'value',
                'allow_null' => 0,
                'layout' => 'horizontal',
            ],
            [
                'key' => 'field_clone_text_colors',
                'label' => 'Textfärg',
                'name' => 'text_colors',
                'type' => 'button_group',
                'wrapper' => [
                    'class' => 'colors-group text-colors-group',
                ],
                'choices' => $text_colors,
                'return_format' => 'value',
                'allow_null' => 0,
                'layout' => 'horizontal',
            ],
            [
                'key' => 'field_clone_accent_colors',
                'label' => 'Accentfärg',
                'name' => 'accent_colors',
                'type' => 'button_group',
                'wrapper' => [
                    'class' => 'colors-group text-colors-group',
                ],
                'choices' => $accent_colors,
                'return_format' => 'value',
                'allow_null' => 0,
                'layout' => 'horizontal',
            ],
            [
                'key' => 'field_clone_component_name',
                'label' => 'Komponentens namn',
                'name' => 'component_name',
                'type' => 'text',
                'instructions' => 'Endast för ordning och reda i admin, visas ej på hemsidan.',
            ],
            [
                'key' => 'field_lb_clone_component_hide_component',
                'label' => __('Dölj komponenten', 'lightning'),
                'name' => 'hide_component',
                'type' => 'true_false',
                'message' => 'Döljer komponenten på hemsidan',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Dölj',
                'ui_off_text' => 'Visa',
            ],
        ],
    ]);

    acf_add_local_field_group([
        'key' => 'group_clone_ab_component_header',
        'title' => 'Component AB header',
        'fields' => [
            [
                'key' => 'field_ab_clone_title',
                'label' => 'Rubrik',
                'name' => 'title',
                'type' => 'text',
                'wrapper' => [
                    'width' => '80'
                ],
            ],
            [
                'key' => 'field_ab_clone_title_tag',
                'label' => 'Rubriksnivå',
                'name' => 'title_tag',
                'type' => 'select',
                'wrapper' => [
                    'width' => '20',
                ],
                'choices' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                ],
                'default_value' => 'h2',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'value',
            ],
            [
                'key' => 'field_ab_clone_title_tag_message',
                'label' => 'OBS VIKTIGT!',
                'type' => 'message',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_ab_clone_title_tag',
                            'operator' => '==',
                            'value' => 'h1',
                        ],
                    ],
                ],
                'message' => 'Använd endast en (1 st] H1 per sida för en bra SEO!',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ]
        ]
    ]);

    acf_add_local_field_group([
        'key' => 'group_clone_ab_component_settings',
        'title' => 'Component AB settings',
        'fields' => [
            [
                'key' => 'field_clone_ab_component_name',
                'label' => 'Komponentens namn',
                'name' => 'component_name',
                'type' => 'text',
                'instructions' => 'Endast för ordning och reda i admin, visas ej på hemsidan.',
            ],
            [
                'key' => 'field_ab_clone_component_hide_component',
                'label' => __('Göm komponenten', 'lightning'),
                'name' => 'hide_component',
                'type' => 'true_false',
                'message' => 'Döljer komponenten på hemsidan',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Ja',
                'ui_off_text' => 'Nej',
            ],
        ],
    ]);
}
