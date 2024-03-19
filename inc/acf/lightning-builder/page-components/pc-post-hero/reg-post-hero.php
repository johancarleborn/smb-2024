<?php
return [
    'key' => 'layout_post_hero',
    'name' => 'post_hero',
    'label' => 'Hero - inlägg',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_post_hero_content_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_post_hero_content_type',
            'label' => __(' ', 'lightning'),
            'name' => 'content_type',
            'type' => 'button_group',
            'choices' => [
                'latest' => __('Senaste', 'lightning'),
                'picked' => __('Utvald', 'lightning'),
            ],
            'default_value' => 'latest',
        ],
        [
            'key' => 'field_lb_post_hero_offset',
            'label' => __('Antal poster att hoppa över', 'lightning'),
            'name' => 'offset',
            'type' => 'number',
            'default_value' => 0,
            'instructions' => __('Du kan välja att hoppa över poster. Användbart t.ex. om du har listat 4 st i början och därefter lagt in en bild och nu vill lista resten.', 'lightning'),
            'wrapper' => ['width' => 50],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_hero_content_type',
                        'operator' => '==',
                        'value' => 'latest',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_hero_picked_posts',
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
            'max' => '1',
            'return_format' => 'id',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_post_hero_content_type',
                        'operator' => '==',
                        'value' => 'picked',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_hero_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_post_hero_colors',
            'label' => 'Färger',
            'name' => 'post_hero',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'prefix_name' => 1
        ],
        [
            'key' => 'field_lb_post_hero_component_id',
            'label' => 'Komponentens id (frivillig)',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
