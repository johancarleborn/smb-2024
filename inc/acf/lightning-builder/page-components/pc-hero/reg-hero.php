<?php
return [
    'key' => 'layout_hero',
    'name' => 'hero',
    'label' => 'Hero',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_hero_comp_head_tab',
            'label' => 'Text',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_hero_top_title',
            'label' => __('Topprubrik', 'lightning'),
            'name' => 'hero',
            'type' => 'clone',
            'instructions' => __('Liten rubrik ovanför huvudrubriken', 'lightning'),
            'clone' => ['field_clone_top_title'],
            'display' => 'seamless',
            'layout' => 'table',
            'prefix_name' => 1,
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_hero_title',
            'label' => __('Huvudrubrik', 'lightning'),
            'name' => 'hero',
            'type' => 'clone',
            'clone' => ['field_clone_title'],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
            'wrapper' => ['width' => 70]
        ],
        [
            'key' => 'field_lb_hero_title_tag',
            'label' => __('Rubrikstorlek', 'lightning'),
            'name' => 'hero',
            'type' => 'clone',
            'clone' => ['field_clone_title_tag'],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
            'wrapper' => ['width' => 15]
        ],
        [
            'key' => 'field_lb_hero_text',
            'label' => __('Text', 'lightning'),
            'name' => 'hero',
            'type' => 'clone',
            'clone' => [0 => 'field_clone_text'],
            'display' => 'seamless',
            'layout' => 'table',
            'prefix_name' => 1,
            'required' => 0,
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_hero_content_tab',
            'label' => 'CTA & Media',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_hero_link',
            'label' => 'Primär knapp',
            'name' => 'hero_link',
            'type' => 'link',
            'return_format' => 'array',
            'wrapper' => ['width' => 50]
        ],
        [
            'key' => 'field_lb_hero_link_secondary',
            'label' => 'Sekundär knapp',
            'name' => 'hero_link_secondary',
            'type' => 'link',
            'return_format' => 'array',
            'wrapper' => ['width' => 50]
        ],
        [
            'key' => 'field_lb_hero_media_type',
            'label' => 'Mediatyp',
            'name' => 'hero_media_type',
            'type' => 'button_group',
            'choices' => [
                'img' => 'Bild',
                'video' => 'Video',
            ],
            'allow_null' => 0,
            'layout' => 'horizontal',
            'return_format' => 'value',
        ],
        [
            'key' => 'field_lb_hero_img',
            'label' => 'Bild',
            'name' => 'hero_img',
            'type' => 'image',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_hero_media_type',
                        'operator' => '==',
                        'value' => 'img',
                    ],
                ],
            ],
            'wrapper' => [
                'width' => '50',
            ],
            'return_format' => 'id',
            'preview_size' => 'medium',
            'library' => 'all',
        ],
        [
            'key' => 'field_lb_hero_video',
            'label' => 'Video',
            'name' => 'hero_video',
            'type' => 'file',
            'instructions' => 'Endast mp4-format',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_hero_media_type',
                        'operator' => '==',
                        'value' => 'video',
                    ],
                ],
            ],
            'wrapper' => [
                'width' => '50',
            ],
            'return_format' => 'id',
            'library' => 'all',
            'mime_types' => 'mp4',
        ],
        [
            'key' => 'field_lb_hero_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_hero_type',
            'label' => __('Orientering', 'lightning'),
            'name' => 'hero_type',
            'type' => 'button_group',
            'choices' => [
                'horizontal' => __('Horizontell', 'lightning'),
                'vertical' => __('Vertikal', 'lightning'),
            ],
            'default_value' => 'horizontal',
        ],
        [
            'key' => 'field_lb_hero_colors',
            'label' => 'Färger',
            'name' => 'hero',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_lb_hero_component_id',
            'label' => 'Komponentens id (frivilligt]',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
