<?php

acf_add_local_field_group([
    'key' => 'group_lb_menu',
    'title' => 'Meny',
    'fields' => [
        [
            'key' => 'field_lb_menu_icons',
            'label' => 'Ikon',
            'name' => 'icon',
            'type' => 'select',
            'multiple' => 0,
            'allow_null' => 1,
            'choices' => $icons,
            'default_value' => false,
            'ui' => 1,
            'ajax' => 1,
            'return_format' => 'label',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'nav_menu_item',
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
