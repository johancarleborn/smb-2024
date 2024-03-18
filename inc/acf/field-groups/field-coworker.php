<?php

acf_add_local_field_group([
    'key' => 'group_coworker',
    'title' => 'Kontaktuppgifter',
    'fields' => [
        [
            'key' => 'field_lb_coworker_email',
            'label' => __('E-post', 'lightning'),
            'name' => 'coworker_email',
            'type' => 'email',
            'maxlength' => 50,
            'required' => 0,
            'wrapper' => ['width' => 50]
        ],

        [
            'key' => 'field_lb_coworker_phone',
            'label' => __('Telefonnummer', 'lightning'),
            'name' => 'coworker_phone',
            'type' => 'text',
            'maxlength' => 50,
            'required' => 0,
            'wrapper' => ['width' => 50]
        ],
        [
            'key' => 'field_lb_coworker_role',
            'label' => __('Roll', 'lightning'),
            'name' => 'role',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => 50]
        ],
        [
            'key' => 'field_lb_coworker_image',
            'label' => __('Profilbild', 'lightning'),
            'name' => 'image',
            'type' => 'image',
            'preview_size' => 'thumbnail',
            'mime_types' => 'jpg, jpeg, png, webp',
            'return_format' => 'id',
            'required' => 0,
            'wrapper' => ['width' => 50]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'coworker',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active'    => true,
]);
