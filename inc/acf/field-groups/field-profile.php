<?php

acf_add_local_field_group([
    'key' => 'group_lb_profile',
    'title' => 'Extra',
    'fields' => [
        [
            'key' => 'field_lb_profile_image',
            'label' => __('Profilbild', 'lightning'),
            'name' => 'profile_image',
            'type' => 'image',
            'instructions' => __('Ladda upp en profilbild', 'lightning'),
            'preview_size' => 'thumbnail',
            'return_format' => 'id',
            'wrapper' => ['width' => 100]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'user_form',
                'operator' => '==',
                'value' => 'all',
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