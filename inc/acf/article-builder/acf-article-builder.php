<?php

// Include all files in the acf-arrays folder
$acf_arrays = glob(get_template_directory() . '/inc/acf/acf-arrays/*.php');
foreach ($acf_arrays as $acf_array) {
    include $acf_array;
}

// Include the clone fields
include lb_path() . 'clone-fields.php';

$hide_on_screen = [
    0 => 'the_content',
    1 => 'discussion',
    2 => 'comments',
    3 => 'revisions',
    4 => 'slug',
    5 => 'send-trackbacks',
];

$location = [
    [
        [
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'post',
        ],
    ],
];

// Include the lightning builder
if (function_exists('acf_add_local_field_group')) {
    $fields = [
        [
            'key' => 'field_ab',
            'label' => 'Article Builder',
            'name' => 'ab_components',
            'type' => 'flexible_content',
            'wrapper' => [
                'width' => '',
                'class' => 'article-builder-component',
                'id' => '',
            ],
            'layouts' => [],
            'button_label' => 'Komponent +',
        ]
    ];

    $handle = opendir(__DIR__ . '/reg-article-components/');

    if ($handle) {
        while (false !== ($file_name = readdir($handle))) {
            if ('.' === $file_name || '..' === $file_name || '.gitkeep' === $file_name) {
                continue;
            }

            $component_layout = include_once __DIR__ . '/reg-article-components/' . $file_name;

            if (empty($component_layout)) {
                continue;
            }

            $fields[0]['layouts'][] = $component_layout;

            if (isset($fields[0]['layouts'])) {
                asort($fields[0]['layouts']);
            }
        }

        closedir($handle);
    }

    acf_add_local_field_group([
        'key' => 'group_article_builder',
        'title' => 'Article builder',
        'fields' => $fields,
        'location' => $location,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => $hide_on_screen,
    ]);


    acf_add_local_field_group([
        'key' => 'group_ab_preamble',
        'title' => 'Ingress',
        'fields' => [
            [
                'key' => 'field_ab_preamble',
                'label' => __('Ingress', 'lightning'),
                'name' => 'preamble',
                'type' => 'wysiwyg',
                'default_value' => 0,
                'toolbar' => 'basic',
                'media_upload' => 0,
                'ui' => 1,
            ]
        ],
        'location' => $location,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => $hide_on_screen,
    ]);

    acf_add_local_field_group([
        'key' => 'group_ab_continue_reading',
        'title' => __('Fortsätt läsa (del 2)', 'lightning'),
        'fields' => [
            [
                'key' => 'field_ab_continue_reading',
                'label' => __('Fortsätt läsa', 'lightning'),
                'name' => 'continue_reading',
                'type' => 'relationship',
                'instructions' => __('Om det finns fler delar av den här artikeln (t.ex. en artikelserie) kan du välja att länka till dem här.', 'lightning'),
                'post_type' => [
                    'post',
                ],
                'filters' => [
                    'search',
                    'taxonomy',
                ],
                'max' => 3,
                'return_format' => 'id',
                'required' => 0,
                'wrapper' => ['width' => 100]
            ],
        ],
        'location' => $location,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => $hide_on_screen,
    ]);

    acf_add_local_field_group([
        'key' => 'group_ab_related',
        'title' => __('Relaterat', 'lightning'),
        'fields' => [
            [
                'key' => 'field_ab_picked_related_articles',
                'label' => __('Relaterade artiklar', 'lightning'),
                'name' => 'picked_related_articles',
                'type' => 'relationship',
                'instructions' => __('Om du inte väljer några artiklar väljs det automatiskt utifrån kategori.', 'lightning'),
                'post_type' => [
                    'post',
                ],
                'filters' => [
                    'search',
                    'taxonomy',
                ],
                'max' => 3,
                'return_format' => 'id',
                'required' => 0,
                'wrapper' => ['width' => 100]
            ],
        ],
        'location' => $location,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => $hide_on_screen,
    ]);
};
