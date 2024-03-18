<?php
return [
    'key' => 'layout_logo_banner',
    'name' => 'logo_banner',
    'label' => 'Logotyper',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_logo_banner_comp_head_tab',
            'label' => 'Komponenthuvud/fot',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_logo_banner_header',
            'label' => 'Header',
            'name' => 'logo_banner',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_header',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_lb_logo_banner_content_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_logo_banner_logos',
            'label' => __('Logotyper', 'lightning'),
            'name' => 'logotypes',
            'type' => 'gallery',
            'instructions' => __('Du kan länka loggan om du klickar på själva bilden.', 'lightning'),
            'min' => '1',
            'preview_size' => 'thumbnail',
            'return_format' => 'id',
            'library' => 'all',
            'mime_types' => 'svg,png,jpg,webp,jpeg',
        ],
        [
            'key' => 'field_lb_logo_banner_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_logo_banner_placement',
            'label' => __('Justera innehållet', 'lightning'),
            'name' => 'placement',
            'type' => 'button_group',
            'choices' => [
                'left' => __('Vänster', 'lightning'),
                'center' => __('Centrera', 'lightning'),
            ],
            'default_value' => 'left',
        ],
        [
            'key' => 'field_lb_logo_banner_colors',
            'label' => 'Färger',
            'name' => 'logo_banner',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_lb_logo_banner_small_logo_banner',
            'label' => 'Smal logo_banner?',
            'name' => 'logo_banner_small',
            'type' => 'true_false',
            'instructions' => 'Används på t.ex. kategorisidor.',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => 'Ja',
            'ui_off_text' => 'Nej',
        ],
        [
            'key' => 'field_lb_logo_banner_component_id',
            'label' => 'Komponentens id (frivilligt]',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
