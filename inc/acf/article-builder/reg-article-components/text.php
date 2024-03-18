<?php
return [
    'key' => 'layout_ab_text',
    'name' => 'text',
    'label' => 'Text',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_ab_text_contents_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_ab_choose_second_text',
            'label' => __('Text bredvid varandra?', 'lightning'),
            'name' => 'chose_second_text',
            'type' => 'true_false',
            'message' => __('Visa text i två kolumner', 'lightning'),
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => 'Ja',
            'ui_off_text' => 'Nej',
        ],
        [
            'key' => 'field_ab_text_header_1',
            'label' => 'Header',
            'name' => 'text_title_1',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_ab_component_header',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_ab_text_1',
            'label' => 'Text',
            'name' => 'text_1',
            'type' => 'wysiwyg',
            'media_upload' => 0
        ],
        [
            'key' => 'field_ab_text_title',
            'label' => 'Rubrik',
            'name' => 'text_title_2',
            'type' => 'text',
            'wrapper' => [
                'width' => '80'
            ],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ab_choose_second_text',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ]
        ],
        [
            'key' => 'field_ab_text_title_tag',
            'label' => 'Rubrikstorlek',
            'name' => 'title_tag_2',
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
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ab_choose_second_text',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_ab_text_title_tag_message',
            'label' => 'OBS VIKTIGT!',
            'type' => 'message',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ab_text_title_tag',
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
            'key' => 'field_ab_text_2',
            'label' => 'Text',
            'name' => 'text_2',
            'type' => 'wysiwyg',
            'media_upload' => 0,
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ab_choose_second_text',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_ab_text_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_ab_text_colors',
            'label' => 'Färger',
            'name' => 'text',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_ab_component_settings',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ]
    ]
];
