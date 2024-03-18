<?php
acf_add_local_field_group([
    'key' => 'group_theme_settings',
    'title' => 'Generella inställningar',
    'fields' => [
        [
            'key' => 'field_theme_settings_404_tab',
            'label' => '404',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_theme_settings_404_text',
            'label' => 'Text',
            'name' => 'four_o_four_text',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 0,
        ],
        [
            'key' => 'field_theme_settings_404_text_2',
            'label' => 'Text 2',
            'name' => 'four_o_four_text_two',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 0,
        ],
    ],
    'location' => [
        [
            [
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-settings',
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
