<?php

acf_add_local_field_group([
    'key' => 'group_lb_image',
    'title' => 'Bild',
    'fields' => [
        [
            'key' => 'field_lb_image_url',
            'label' => __('Länka bilden', 'lightning'),
            'name' => 'image_url',
            'type' => 'url',
            'instructions' => __('Funkar i logotyp-komponenten.', 'lightning'),
            'required' => 0,
            'wrapper' => ['width' => 100]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'attachment',
                'operator' => '==',
                'value' => 'image',
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
