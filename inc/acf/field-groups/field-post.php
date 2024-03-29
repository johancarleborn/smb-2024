<?php

acf_add_local_field_group([
    'key' => 'group_post',
    'title' => 'Roll',
    'fields' => [
        [
            'key' => 'field_62e7e17ea9fda',
            'label' => __('Mest lästa', 'lightning'),
            'name' => 'most_read_count',
            'type' => 'number',
            'wrapper' => ['width' => 100, 'class' => 'popular-admin'],
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active'    => true,
]);
