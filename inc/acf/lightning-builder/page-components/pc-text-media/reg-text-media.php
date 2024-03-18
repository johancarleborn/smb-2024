<?php
return [
    'key' => 'layout_text_media',
    'name' => 'text_media',
    'label' => 'Text & Media',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_text_media_content_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_text_media_top_title',
            'label' => __('Topprubrik', 'lightning'),
            'name' => 'text_media_top_title',
            'type' => 'clone',
            'instructions' => __('Liten rubrik ovanför huvudrubriken', 'lightning'),
            'clone' => ['field_clone_title'],
            'display' => 'group',
            'layout' => 'table',
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_text_media_text_content',
            'label' => 'Text',
            'name' => 'text',
            'type' => 'wysiwyg',
            'tabs' => 'visual',
            'toolbar' => 'full',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_lb_text_media_link',
            'label' => 'Länk',
            'name' => 'link',
            'type' => 'link',
            'return_format' => 'array',
            'wrapper' => ['width' => 60],
        ],
        [
            'key' => 'field_lb_text_media_link_type',
            'label' => __('Visa länk som', 'lightning'),
            'name' => 'link_type',
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
                        'field' => 'field_lb_text_media_link',
                        'operator' => '!=empty',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_alignment',
            'label' => __('Textposition', 'lightning'),
            'name' => 'text_alignment',
            'type' => 'button_group',
            'instructions' => 'Välj textpositionen för denna komponent.',
            'layout' => 'vertical',
            'wrapper' => ['width' => 60],
            'choices' => [
                'start' => __('Toppen ↑', 'lightning'),
                'center' => __('Mitten →', 'lightning'),
                'end' => __('Botten ↓', 'lightning'),
            ],
            'default_value' => 'center',
        ],
        [
            'key' => 'field_lb_text_media_placement',
            'label' => 'Sida för text',
            'name' => 'text_placement',
            'type' => 'button_group',
            'wrapper' => ['width' => 40],
            'choices' => [
                1 => 'Vänster',
                2 => 'Höger',
            ],
            'allow_null' => 0,
            'default_value' => 1,
            'layout' => 'horizontal',
            'return_format' => 'value',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '!=',
                        'value' => 'split',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_media_tab',
            'label' => 'Media',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_text_media_type',
            'label' => 'Mediatyp',
            'name' => 'media_type',
            'type' => 'button_group',
            'choices' => [
                'img' => 'Bild',
                'video' => 'Video',
            ],
            'wrapper' => ['width' => 60],
            'return_format' => 'value',
            'allow_null' => 0,
            'layout' => 'horizontal',
        ],
        [
            'key' => 'field_lb_text_media_img',
            'label' => 'Bild',
            'name' => 'img',
            'type' => 'image',
            'instructions' => 'Bildformat: 4:3',
            'wrapper' => ['width' => 60],
            'return_format' => 'id',
            'preview_size' => 'medium',
            'library' => 'all',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '==',
                        'value' => 'img',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_video_type',
            'label' => __('Typ av video', 'lightning'),
            'name' => 'video_type',
            'type' => 'button_group',
            'choices' => [
                'upload' => __('Ladda Upp', 'lightning'),
                'embeded' => __('Vimeo/Youtube', 'lightning'),
            ],
            'default_value' => 'upload',
            'wrapper' => ['width' => 40],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '==',
                        'value' => 'video',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_video',
            'label' => 'Video',
            'name' => 'video',
            'type' => 'file',
            'instructions' => 'Filformat: mp4, bildformat: 16:9',
            'wrapper' => ['width' => 60],
            'return_format' => 'id',
            'library' => 'all',
            'mime_types' => 'mp4',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '==',
                        'value' => 'video',
                    ],
                    [
                        'field' => 'field_lb_text_media_video_type',
                        'operator' => '==',
                        'value' => 'upload',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_post_featured_video_embeded',
            'label' => __('Url', 'lightning'),
            'name' => 'embeded_url',
            'type' => 'text',
            'instructions' => __('Klistra in videons URL. <br> Exempel: https://vimeo.com/266439181', 'lightning'),
            'required' => 0,
            'wrapper' => ['width' => 60],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_video_type',
                        'operator' => '==',
                        'value' => 'embeded',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_full_media',
            'label' => __('Fyll ut media', 'lightning'),
            'name' => 'full_width',
            'type' => 'true_false',
            'instructions' => __('Fungerar endast med bilder och uppladdade videos. Dvs. ej Youtube eller Vimeo', 'lightning'),
            'ui' => 1,
            'ui_on_text' => __('Ja', 'lightning'),
            'ui_off_text' => __('Nej', 'lightning'),
            'wrapper' => ['width' => 40],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '!=',
                        'value' => 'video',
                    ],
                ],
                [
                    [
                        'field' => 'field_lb_text_media_video_type',
                        'operator' => '!=',
                        'value' => 'embeded',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_video_loop',
            'label' => 'Autostarta video',
            'name' => 'loop_video',
            'type' => 'true_false',
            'wrapper' => ['width' => 60],
            'message' => 'Videon autostartar, loopar och är mutad',
            'ui_on_text' => 'Ja',
            'ui_off_text' => 'Nej',
            'ui' => 1,
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '==',
                        'value' => 'video',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_show_video_controls',
            'label' => 'Visa videoknappar',
            'name' => 'video_controls',
            'type' => 'true_false',
            'wrapper' => ['width' => 40],
            'message' => 'Visar t.ex. play-knapp osv.',
            'ui_on_text' => 'Ja',
            'ui_off_text' => 'Nej',
            'default_value' => true,
            'ui' => 1,
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_text_media_type',
                        'operator' => '==',
                        'value' => 'video',
                    ],
                    [
                        'field' => 'field_lb_text_media_video_loop',
                        'operator' => '==',
                        'value' => '1',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_text_media_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_text_media_colors',
            'label' => 'Färger',
            'name' => 'text_media',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_lb_text_media_component_id',
            'label' => 'Komponentens id (frivillig)',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
