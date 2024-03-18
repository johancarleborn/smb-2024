<?php

acf_add_local_field_group([
    'key' => 'group_theme_header',
    'title' => 'Sidhuvud',
    'fields' => [
        [
            'key' => 'field_lb_theme_header_menu_tab',
            'label' => 'Meny',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_theme_settings_logo_image',
            'label' => 'Logga',
            'name' => 'site_logo',
            'type' => 'image',
            'return_format' => 'id',
            'preview_size' => 'medium',
            'library' => 'all',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_theme_settings_logo_choice',
                        'operator' => '==',
                        'value' => 'logo',
                    ],
                ],
            ],
            'wrapper' => [
                'width' => '50',
            ]
        ],
        [
            'key' => 'field_lb_theme_settings_menu_btn',
            'label' => __('Knapp till höger', 'lightning'),
            'name' => 'menu_btn',
            'type' => 'link',
            'instructions' => __('T.ex. Kontaktknapp', 'lightning'),
            'required' => 0,
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_theme_header_script_tab',
            'label' => 'Script',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_theme_header_script',
            'label' => __('Script', 'lightning'),
            'name' => 'head_script',
            'type' => 'textarea',
            'instructions' => __('Här kan du klistra in script som ska vara inom head-taggen. T.ex. Google Analytics.', 'lightning'),
            'rows' => 12,
            'esc_html' => 1,
            'placeholder' => '<script type="text/javascrip...',
            'required' => 0,
            'wrapper' => ['width' => 100]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-header',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'show_in_rest' => 0,
]);
