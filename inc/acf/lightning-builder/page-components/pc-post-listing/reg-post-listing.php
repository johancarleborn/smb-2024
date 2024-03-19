<?php

return [
    'key' => 'layout_post_listing',
    'name' => 'post_listing',
    'label' => 'Lista poster',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_post_listing_comp_head_tab',
            'label' => 'Komponenthuvud/fot',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_post_listing_header',
            'label' => 'Header',
            'name' => 'post_listing',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_header',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_lb_post_listing_content_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_post_listing_content_type',
            'label' => __('', 'lightning'),
            'name' => 'content_type',
            'type' => 'button_group',
            'choices' => [
                'latest' => __('Senaste', 'lightning'),
                'picked' => __('Utvalda', 'lightning'),
            ],
            'default_value' => 'latest',
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb__post_listing_post_type',
            'label' => __('Posttyp', 'lightning'),
            'name' => 'post_type',
            'type' => 'select',
            'instructions' => __('Välj posttyp', 'lightning'),
            'choices' => $post_types,
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'return_format' => 'value',
            'ajax' => 1,
            'required' => 1,
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_post_listing_columns',
            'label' => __('Antal kolumner?', 'lightning'),
            'name' => 'columns',
            'type' => 'range',
            'instructions' => __('I hur många kolumner vill du visa inläggen? Min 2, max 4.', 'lightning'),
            'min' => '2',
            'max' => '4',
            'default_value' => '4',
            'step' => '1',
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_post_listing_qty',
            'label' => __('Antal poster att visa?', 'lightning'),
            'name' => 'qty',
            'type' => 'number',
            'default_value' => 0,
            'instructions' => __('Väljer du 0 eller inget visas oändligt med en Ladda mer-knapp efter 12 st. Väljer du något annat döljs "Ladda mer"-knappen.', 'lightning'),
            'wrapper' => ['width' => 50],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '==',
                        'value' => 'latest',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_offset',
            'label' => __('Antal poster att hoppa över', 'lightning'),
            'name' => 'offset',
            'type' => 'number',
            'default_value' => 0,
            'instructions' => __('Du kan välja att hoppa över poster. Användbart t.ex. om du har listat 4 st i början och därefter lagt in en bild och nu vill lista resten.', 'lightning'),
            'wrapper' => ['width' => 50],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '==',
                        'value' => 'latest',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_picked_posts',
            'label' => __('Välj Blogginlägg', 'lightning'),
            'name' => 'picked_post',
            'type' => 'relationship',
            'post_type' => [
                'post',
            ],
            'filters' => [
                'search',
                'taxonomy',
            ],
            'min' => '0',
            'return_format' => 'id',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '==',
                        'value' => 'picked',
                    ],
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_picked_cases',
            'label' => __('Välj kundcase', 'lightning'),
            'name' => 'picked_case',
            'type' => 'relationship',
            'post_type' => [
                'case',
            ],
            'filters' => [
                'search',
                'taxonomy',
            ],
            'min' => '0',
            'return_format' => 'id',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '==',
                        'value' => 'picked',
                    ],
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'case',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_picked_coworkers',
            'label' => __('Välj kollega', 'lightning'),
            'name' => 'picked_coworker',
            'type' => 'relationship',
            'post_type' => [
                'coworker',
            ],
            'filters' => [
                'search',
                'taxonomy',
            ],
            'min' => '0',
            'return_format' => 'id',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '==',
                        'value' => 'picked',
                    ],
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'coworker',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_picked_testimonials',
            'label' => __('Välj vittnesmål', 'lightning'),
            'name' => 'picked_testimonial',
            'type' => 'relationship',
            'post_type' => [
                'testimonial',
            ],
            'filters' => [
                'search',
                'taxonomy',
            ],
            'min' => '0',
            'return_format' => 'id',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '==',
                        'value' => 'picked',
                    ],
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'testimonial',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_sidebar_tab',
            'label' => 'Sidomeny',
            'type' => 'tab',
            'placement' => 'top',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_listing_show_sidebar',
                        'operator' => '==',
                        'value' => '1',
                    ],
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ],
                ],
            ],
        ],

        [
            'key' => 'field_lb_post_listing_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_post_listing_show_sidebar',
            'label' => __('Visa sidomeny', 'lightning'),
            'name' => 'show_sidebar',
            'type' => 'true_false',
            'default_value' => 0,
            'message' => 'En ny flik för sidomenyinställningar visas',
            'ui' => 1,
            'ui_on_text' => 'Visa',
            'ui_off_text' => 'Dölj',
        ],
        [
            'key' => 'field_lb_post_listing_categories_as_filter',
            'label' => __('Använd kategorier som filter', 'lightning'),
            'name' => 'categories_as_filter',
            'type' => 'true_false',
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => 'Använd',
            'ui_off_text' => 'Använd inte',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ],
                    [
                        'field' => 'field_lb_post_listing_content_type',
                        'operator' => '!=',
                        'value' => 'picked',
                    ],
                    [
                        'field' => 'field_lb_post_listing_qty',
                        'operator' => '==',
                        'value' => '0',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_card_settings_start',
            'label' => __('Kortinställning', 'lightning'),
            'name' => 'card_settings_start',
            'type' => 'message',
            'esc_html' => 0,
            'new_lines' => 'wpautop',
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_post_listing_cards_bgcolors',
            'label' => 'Kortens bakgundsfärg',
            'name' => 'card_bg_colors',
            'type' => 'button_group',
            'wrapper' => ['class' => 'colors-group bg-colors-group'],
            'choices' => $bg_colors,
            'return_format' => 'value',
            'allow_null' => 0,
            'layout' => 'horizontal',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_listing_cards_colors',
            'label' => 'Kortens textfärg',
            'name' => 'card_text_colors',
            'type' => 'button_group',
            'wrapper' => ['class' => 'colors-group text-colors-group'],
            'choices' => $text_colors,
            'return_format' => 'value',
            'allow_null' => 0,
            'layout' => 'horizontal',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb__post_listing_post_type',
                        'operator' => '!=',
                        'value' => 'coworker',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_card_settings_end',
            'label' => __('', 'lightning'),
            'name' => 'card_settings_end',
            'type' => 'message',
            'esc_html' => 0,
            'new_lines' => 'wpautop',
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_post_listing_colors',
            'label' => 'Färger',
            'name' => 'post_listing',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        // [
        //     'key' => 'field_lb_post_listing_settings',
        //     'label' => __('Visa sök & filtrering?', 'lightning'),
        //     'name' => 'show_search',
        //     'type' => 'true_false',
        //     'instructions' => __('<strong style="color: #000; font-size: 14px;">OBS! Ur funktion för tillfället.</strong>', 'lightning'),
        //     'message' => '',
        //     'default_value' => 0,
        //     'ui' => 1,
        //     'ui_on_text' => 'Ja',
        //     'ui_off_text' => 'Nej',
        // ],
        [
            'key' => 'field_lb_post_listing_component_id',
            'label' => 'Komponentens id (frivillig)',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
