<?php
acf_add_local_field_group([
    'key' => 'group_theme_popup',
    'title' => 'Popup',
    'fields' => [
        [
            'key' => 'field_lb_theme_popup_text_tab',
            'label' => 'Text',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_theme_poup_show_popup',
            'label' => __('Använd popup', 'lightning'),
            'name' => 'show_popup',
            'type' => 'true_false',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => 'Aktiv',
            'ui_off_text' => 'Inaktiv',
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_theme_popup_delay',
            'label' => __('Antal sekunder innan den visas', 'lightning'),
            'name' => 'popup_delay',
            'type' => 'number',
            'min' => '0',
            'default_value' => 3,
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_theme_popup_set_cookie',
            'label' => __('Antal dagar innan den ska visas igen', 'lightning'),
            'name' => 'popup_set_cookie',
            'type' => 'number',
            'instructions' => 'När popupen stängs av besökaren sätts en cookie som gör att den inte visas igen på hens enhet under det antal dagar som anges här.',
            'min' => '1',
            'default_value' => 10,
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_theme_popup_top_title',
            'label' => __('Topprubrik', 'lightning'),
            'name' => 'popup_top_title',
            'type' => 'text',
        ],
        [
            'key' => 'field_lb_theme_popup_title',
            'label' => __('Rubrik', 'lightning'),
            'name' => 'popup_title',
            'type' => 'text',
        ],
        [
            'key' => 'field_lb_theme_popup_text',
            'label' => __('Text', 'lightning'),
            'name' => 'popup_text',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 0,
            'delay' => 1,
        ],
        [
            'key' => 'field_lb_theme_popup_media_tab',
            'label' => 'Bild & formulär',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_theme_popup_image',
            'label' => __('Bild', 'lightning'),
            'name' => 'popup_image',
            'type' => 'image',
            'preview_size' => 'thumbnail',
            'mime_types' => 'jpg,jpeg,png,webp',
            'return_format' => 'id',
        ],
        [
            'key' => 'field_lb_theme_popup_code_type',
            'label' => __('Formulärstyp', 'lightning'),
            'name' => 'popup_code_type',
            'type' => 'button_group',
            'choices' => [
                'gravityform' => __('Gravity forms', 'lightning'),
                'code' => __('Klistra in kod', 'lightning'),
            ],
            'default_value' => 'gravityform',
        ],
        [
            'key' => 'field_lb_theme_popup_gravityform',
            'label' => __('Formulär', 'lightning'),
            'name' => 'popup_gravityform',
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
                        'field' => 'field_lb_theme_popup_code_type',
                        'operator' => '==',
                        'value' => 'gravityform',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_theme_popup_settings',
            'label' => __('Inställningar för formuläret', 'lightning'),
            'name' => 'popup_form_settings',
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
                        'field' => 'field_lb_theme_popup_code_type',
                        'operator' => '==',
                        'value' => 'gravityform',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_theme_popup_code',
            'label' => __('Klistra in kod', 'lightning'),
            'name' => 'popup_code',
            'type' => 'textarea',
            'instructions' => __('Klistra in kod från din mailtjänst såsom Mailchimp, Paloma, Rule eller liknande', 'lightning'),
            'required' => 0,
            'esc_html' => 1,
            'wrapper' => ['width' => 100],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_lb_theme_popup_code_type',
                        'operator' => '==',
                        'value' => 'code',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_lb_theme_popup_settings_tab',
            'label' => 'Visuellt',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_theme_popup_bg_color',
            'label' => __('Bakgrundsfärg', 'lightning'),
            'name' => 'popup_bg_color',
            'type' => 'clone',
            'clone' => ['field_clone_bg_colors'],
            'display' => 'seamless',
            'layout' => 'table',
        ],
        [
            'key' => 'field_lb_theme_popup_text_color',
            'label' => __('Textfärg', 'lightning'),
            'name' => 'popup_text_color',
            'type' => 'clone',
            'clone' => ['field_clone_text_colors'],
            'display' => 'seamless',
            'layout' => 'table',
        ],
        [
            'key' => 'field_lb_theme_popup_accent_color',
            'label' => __('Textfärg', 'lightning'),
            'name' => 'popup_accent_color',
            'type' => 'clone',
            'clone' => ['field_clone_accent_colors'],
            'display' => 'seamless',
            'layout' => 'table',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-popup',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
]);