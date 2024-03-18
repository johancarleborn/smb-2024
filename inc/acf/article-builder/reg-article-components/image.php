<?php
return [
    'key' => 'layout_image',
    'name' => 'image',
    'label' => 'Bild',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_ab_image_contents_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_ab_image_header',
            'label' => 'Header',
            'name' => 'image',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_ab_component_header',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_ab_image',
            'label' => __('Bild', 'lightning'),
            'name' => 'image_id',
            'type' => 'image',
            'preview_size' => 'thumbnail',
            'return_format' => 'id',
            'required' => 1,
        ],
        [
            'key' => 'field_ab_image_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_ab_image_colors',
            'label' => 'Färger',
            'name' => 'image',
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
