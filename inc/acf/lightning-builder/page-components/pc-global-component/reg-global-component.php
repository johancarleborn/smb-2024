<?php
return [
    'key' => 'layout_global_component',
    'name' => 'global_component',
    'label' => 'Global komponent',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_lb_global_component',
            'label' => __('Välj mallar', 'lightning'),
            'name' => 'global_component',
            'type' => 'post_object',
            'instructions' => __('Välj en eller flera mallar som du skapat under <a href=' . admin_url('/edit.php?post_type=template') . ' target="_blank">Globala mallar</a>. <br> Du kan dra och släppa dem i den ordning du vill att de ska ligga.', 'lightning'),
            'post_type' => ['template'],
            'allow_null' => 0,
            'multiple' => 1,
            'return_format' => 'id',
            'ui' => 1,
            'required' => 0,
            'wrapper' => ['width' => 100]
        ],
    ]
];
