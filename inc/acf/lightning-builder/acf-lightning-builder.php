<?php

// Include all files in the acf-arrays folder
$acf_arrays = glob(get_template_directory() . '/inc/acf/acf-arrays/*.php');
$lb_parts = glob(get_template_directory() . '/inc/acf/lightning-builder/parts/*.php');
foreach ($acf_arrays as $acf_array) {
    include $acf_array;
}

foreach ($lb_parts as $part) {
    include $part;
}

// Include the clone fields
include lb_path() . 'clone-fields.php';


// Include the lightning builder
if (function_exists('acf_add_local_field_group')) {
    $location = [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ]
        ],
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'template',
            ]
        ]
    ];

    $hide_on_screen = [
        0 => 'the_content',
        1 => 'discussion',
        2 => 'comments',
        3 => 'revisions',
        4 => 'slug',
        5 => 'send-trackbacks',
    ];



    $fields = [
        [
            'key' => 'field_lb',
            'label' => 'Lightning Builder',
            'name' => 'lb_components',
            'type' => 'flexible_content',
            'wrapper' => [
                'width' => '',
                'class' => 'main-builder-component',
                'id' => '',
            ],
            'layouts' => [],
            'button_label' => 'Komponent +',
        ]
    ];

    $handle = opendir(__DIR__ . '/page-components/');
    $componentsArray = [];

    if ($handle) {
        while (false !== ($file_name = readdir($handle))) {
            if ('.' === $file_name || '..' === $file_name || '.gitkeep' === $file_name) {
                continue;
            }

            $component_layout = include_once __DIR__ . '/page-components/' . $file_name . '/reg-' . str_replace('pc-', '', $file_name . '.php');

            if (empty($component_layout)) {
                continue;
            }

            $fields[0]['layouts'][] = $component_layout;
            $componentsArray[] = component($component_layout['name'], $component_layout['label']);


            if (isset($fields[0]['layouts'])) {
                asort($fields[0]['layouts']);
            }
        }

        closedir($handle);
    }
    $components = implode('', $componentsArray);
    $fields[] = [
        'key' => 'field_lb_component_choice',
        'label' => '<h3 class="add-component-heading">Lägg till komponent</h3>',
        'name' => 'lb_component_choice',
        'type' => 'message',
        'message' => '<div class="li-layouts">' . $components . '</div>',
        'esc_html' => 0,
    ];

    acf_add_local_field_group([
        'key' => 'group_lightning_builder',
        'title' => '<span class="lightning-heading">Lightning builder</span>',
        'fields' => $fields,
        'location' => $location,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => $hide_on_screen,
    ]);

    acf_add_local_field_group([
        'key' => 'group_lightning_import_component',
        'title' => 'Importera komponent',
        'fields' => [
            [
                'key' => 'field_lb_import_flex_layout_message',
                'label' => __('<h4 style="font-size: 14px; margin-bottom: 0;">Instruktioner</h4>', 'lightning'),
                'name' => 'import_flex_layout_message',
                'type' => 'message',
                'message' => __('<details style="border: 1px solid #7899c2; padding: 8px 12px;"><summary style="cursor: pointer;"><strong>Läs de här instruktionerna först!</strong></summary>Du kan bara importera komponenter som du har namngivit. Namnger gör du under fliken Visuellt/inställningar på komponenten.<h4 style="font-size: 14px; margin-bottom: 0;">Har du sparat dina ändringar?</h4> Om du har gjort ändringar måste du spara dem först för att de <strong><u>inte ska gå förlorade</u></strong>. <br> <h4 style="font-size: 14px; margin-bottom: 0;">När importen är klar</h4> När komponenten är importerad läggs den som <strong><u>dold</u></strong> och kommer alltså inte att synas på framsidan för besökarna. Inte heller för dig om du vill förhandsgranska sidan. Klicka ur det under fliken <strong><u>Visuellt/inställningar</u></strong> på komponenten.</details>', 'lightning'),
                'esc_html' => 0,
                'new_lines' => 'wpautop',
                'wrapper' => ['width' => 100]
            ],
            [
                'key' => 'field_lb_import_flex_layout_page',
                'label' => 'Sida att importera från',
                'name' => 'import_flex_layout_page',
                'type' => 'post_object',
                'instructions' => 'Välj vilken sida du vill importera komponenten från.',
                'post_type' => [
                    0 => 'page',
                ],
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
                'wrapper' => ['width' => 50],
            ],
            [
                'key' => 'field_lb_import_flex_layout',
                'label' => __('Komponent att importera', 'lightning'),
                'name' => 'import_flex_layout',
                'type' => 'select',
                'instructions' => __('Välj komponenten som du vill importera. <strong>Om du inte ser din komponent har du glömt att namnge den.</strong>', 'lightning'),
                'choices' => [],
                'allow_null' => 1,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => __('Välj komponent', 'lightning'),
                'required' => 0,
                'wrapper' => ['width' => 50],
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_lb_import_flex_layout_page',
                            'operator' => '!=empty',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_lb_import_flex_layout_btn',
                'label' => __('', 'lightning'),
                'name' => 'import_flex_layout_btn',
                'type' => 'message',
                'message' => __('<div><button style="width: 100%; padding: 4px 16px;" type="button" class="button button-primary import-flex-layout-btn">Importera</button></div>', 'lightning'),
                'esc_html' => 0,
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_lb_import_flex_layout_page',
                            'operator' => '!=empty',
                        ],
                    ],
                ],
            ],
        ],
        'location' => $location,
        'position' => 'normal',
        'style' => 'default',
        'menu_order' => 999,
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => $hide_on_screen,
    ]);
};
