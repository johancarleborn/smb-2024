<?php

acf_add_local_field_group([
    'key' => 'group_testimonial',
    'title' => 'Roll',
    'fields' => [
        [
            'key' => 'field_lb_testimonial',
            'label' => __('Roll/jobbtitel', 'lightning'),
            'name' => 'role',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_testimonial_company',
            'label' => __('Företag', 'lightning'),
            'name' => 'company',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => 33]
        ],
        [
            'key' => 'field_lb_testimonial_logo',
            'label' => __('Logga/Profilbild', 'lightning'),
            'name' => 'logo',
            'type' => 'image',
            'preview_size' => 'thumbnail',
            'mime_types' => 'svg, jpg, jpeg, png, webp',
            'return_format' => 'id',
            'required' => 0,
            'wrapper' => ['width' => 33]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonial',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active'    => true,
]);
