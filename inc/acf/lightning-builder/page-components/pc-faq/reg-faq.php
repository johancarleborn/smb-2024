<?php
return [
    'key' => 'layout_faq',
    'name' => 'faq',
    'label' => 'FAQs',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_faq_comp_head_tab',
            'label' => 'Text',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_faq_top_title',
            'label' => __('Topprubrik', 'lightning'),
            'name' => 'faq',
            'type' => 'clone',
            'instructions' => __('Liten rubrik ovanför huvudrubriken', 'lightning'),
            'clone' => ['field_clone_top_title'],
            'display' => 'seamless',
            'prefix_name' => 1,
            'layout' => 'table',
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_faq_title',
            'label' => __('Rubrik', 'lightning'),
            'name' => 'faq',
            'type' => 'clone',
            'clone' => ['field_clone_title'],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
            'wrapper' => ['width' => 70]
        ],
        [
            'key' => 'field_lb_faq_title_tag',
            'label' => __('Rubrikstorlek', 'lightning'),
            'name' => 'faq',
            'type' => 'clone',
            'clone' => ['field_clone_title_tag'],
            'display' => 'seamless',
            'layout' => 'block',
            'prefix_name' => 1,
            'wrapper' => ['width' => 15]
        ],
        [
            'key' => 'field_lb_faq_text',
            'label' => __('Text', 'lightning'),
            'name' => 'faq',
            'type' => 'clone',
            'clone' => [0 => 'field_clone_text'],
            'display' => 'seamless',
            'layout' => 'table',
            'prefix_name' => 1,
            'required' => 0,
            'wrapper' => ['width' => 100]
        ],
        [
            'key' => 'field_lb_faq_link',
            'label' => __('Länk', 'lightning'),
            'name' => 'link',
            'type' => 'clone',
            'clone' => [0 => 'field_lb_clone_footer_link'],
            'display' => 'group',
            'layout' => 'table',
            'prefix_name' => 1,
            'required' => 0,
            'wrapper' => ['width' => 50]
        ],
        [
            'key' => 'field_lb_faq_link_type',
            'label' => __('Länktyp', 'lightning'),
            'name' => 'link_type',
            'type' => 'clone',
            'clone' => [0 => 'field_lb_clone_footer_link_type'],
            'display' => 'group',
            'layout' => 'table',
            'prefix_name' => 1,
            'required' => 0,
            'wrapper' => ['width' => 50]
        ],
        [
            'key' => 'field_lb_faq_content_tab',
            'label' => 'FAQ:er',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_faq_faqs',
            'label' => 'FAQ:er',
            'name' => 'faqs',
            'type' => 'relationship',
            'post_type' => [
                0 => 'faq',
            ],
            'filters' => [
                0 => 'search',
                1 => 'taxonomy',
            ],
            'return_format' => 'id',
        ],
        [
            'key' => 'field_lb_faq_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_faq_colors',
            'label' => 'Färger',
            'name' => 'faq',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'prefix_name' => 1,
        ],
        [
            'key' => 'field_lb_faq_component_id',
            'label' => 'Komponentens id (frivillig)',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
