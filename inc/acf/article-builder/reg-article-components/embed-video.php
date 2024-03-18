<?php
return [
    'key' => 'layout_embed_video',
    'name' => 'embed_video',
    'label' => 'Video',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_ab_embed_video_contents_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_ab_embed_video_header',
            'label' => 'Header',
            'name' => 'embed_video',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_ab_component_header',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_ab_embed_video',
            'label' => __('Video-url', 'lightning'),
            'name' => 'embed_video_url',
            'type' => 'text',
            'instructions' => __('Klistra in videons URL. <br> Exempel: https://www.youtube.com/watch?v=8IsC9pjNpz0', 'lightning'),
            'required' => 1,
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_ab_embed_video_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_ab_embed_video_colors',
            'label' => 'Färger',
            'name' => 'embed_video',
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
