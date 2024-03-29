<?php
$sidebar_items = [
    [
        'key' => 'field_lb_post_listing_sidebar',
        'label' => __('Vad du vill visa?', 'lightning'),
        'name' => 'post_listing_sidebar',
        'type' => 'select',
        'instructions' => __('Välj en eller flera alternativ', 'lightning'),
        'choices' => [
            'most_read' => __('Mest lästa', 'lightning'),
        ],
        'allow_null' => 0,
        'multiple' => 1,
        'ui' => 1,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => __('-Välj-', 'lightning'),
        'required' => 0,
        'wrapper' => ['width' => 100]
    ],
    [
        'key' => 'field_lb_post_listing_sidebar_most_read_qty',
        'label' => __('Mest lästa', 'lightning'),
        'name' => 'post_listing_sidebar_most_read_qty',
        'type' => 'number',
        'instructions' => __('Antal inlägg att visa', 'lightning'),
        'required' => 0,
        'conditional_logic' => [
            [
                [
                    'field' => 'field_lb_post_listing_sidebar',
                    'operator' => '==',
                    'value' => 'most_read'
                ]
            ]
        ],
        'wrapper' => ['width' => 100]
    ]
];
