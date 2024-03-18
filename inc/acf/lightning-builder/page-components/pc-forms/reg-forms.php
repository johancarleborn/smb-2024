<?php
return [
    'key' => 'layout_forms',
    'name' => 'forms',
    'label' => 'Formulär',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_forms_comp_head_tab',
            'label' => 'Komponenthuvud/fot',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_forms_header',
            'label' => 'Header',
            'name' => 'forms',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_header',
            ],
            'display' => 'seamless',
            'prefix_name' => 1
        ],
        [
            'key' => 'field_lb_forms_content_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_forms_code_type',
            'label' => __('Formulärstyp', 'lightning'),
            'name' => 'form_code_type',
            'type' => 'button_group',
            'choices' => [
                'gravityform' => __('Gravity forms', 'lightning'),
                'code' => __('Klistra in kod', 'lightning'),
            ],
            'default_value' => 'gravityform',
        ],
        [
            'key' => 'field_lb_forms_gravityform',
            'label' => __('Formulär', 'lightning'),
            'name' => 'gravityform',
            'type' => 'select',
            'instructions' => __('Välj formulär', 'lightning'),
            'choices' => [],
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'return_format' => 'value',
            'ajax' => 1,
            'placeholder' => __('Välj formulär', 'lightning'),
            'wrapper' => ['width' => 25],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_forms_code_type',
                        'operator' => '==',
                        'value' => 'gravityform',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_forms_code',
            'label' => __('Klistra in kod', 'lightning'),
            'name' => 'form_code',
            'type' => 'textarea',
            'instructions' => __('Klistra in kod från din mailtjänst såsom Mailchimp, Paloma, Rule eller liknande', 'lightning'),
            'required' => 0,
            'esc_html' => 1,
            'wrapper' => ['width' => 70],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_forms_code_type',
                        'operator' => '==',
                        'value' => 'code',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_forms_settings',
            'label' => __('Inställningar för formuläret', 'lightning'),
            'name' => 'form_settings',
            'type' => 'checkbox',
            'instructions' => __('Visa/dölj element från formuläret', 'lightning'),
            'choices' => [
                'title' => __('Visa rubrik', 'lightning'),
                'description' => __('Visa beskrivning', 'lightning'),
                'ajax' => __('Använd ajax', 'lightning'),
            ],
            'default_value' => ['ajax'],
            'allow_custom' => 0,
            'save_custom' => 0,
            'layout' => 'horizontal',
            'toggle' => 0,
            'return_format' => 'value',
            'required' => 0,
            'wrapper' => ['width' => 45],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_forms_code_type',
                        'operator' => '==',
                        'value' => 'gravityform',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_forms_form_position',
            'label' => __('Formulärets position', 'lightning'),
            'name' => 'form_position',
            'type' => 'button_group',
            'choices' => [
                'left' => __('←', 'lightning'),
                'top' => __('↑', 'lightning'),
                'right' => __('→', 'lightning'),
                'bottom' => __('↓', 'lightning'),
            ],
            'default_value' => 'right',
            'wrapper' => ['width' => 20],
        ],
        [
            'key' => 'field_lb_forms_content_type',
            'label' => __('Innehållstyp', 'lightning'),
            'name' => 'content_type',
            'type' => 'button_group',
            'choices' => [
                'text' => __('Text', 'lightning'),
                'image' => __('Bild', 'lightning'),
            ],
            'default_value' => 'text',
        ],
        [
            'key' => 'field_lb_field_lb_forms_text',
            'label' => __('Text', 'lightning'),
            'name' => 'text',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 1,
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_forms_content_type',
                        'operator' => '==',
                        'value' => 'text',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_forms_image',
            'label' => __('Bild', 'lightning'),
            'name' => 'image',
            'type' => 'image',
            'preview_size' => 'thumbnail',
            'mime_types' => 'jpg, jpeg, png, svg',
            'return_format' => 'id',
            'wrapper' => ['width' => 50],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_forms_content_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_forms_full_width_image',
            'label' => __('Fyll ut hela ytan med bilden?', 'lightning'),
            'name' => 'full_width_image',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => 'Ja',
            'ui_off_text' => 'Nej',
            'wrapper' => ['width' => 50],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_forms_content_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_forms_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_forms_colors',
            'label' => 'Färger',
            'name' => 'forms',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'prefix_name' => 1
        ],
        [
            'key' => 'field_lb_forms_component_id',
            'label' => 'Komponentens id (frivillig)',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
