#!/usr/bin/env node

// Creates two new files in inc/acf/lighning-builder/page-components
//
// Usage:
// ./cc: component-name
//
// Output: component-name.php and pc-componenet-name.php
//
//

const fs = require('fs')
const componentName = process.argv[2]
//change - to _ in component name
const componentFileName = componentName.replace(/-/g, '_')

// Skapa reg-component.php
const regcomponent = `<?php
return [
    'key' => 'layout_${componentFileName}',
    'name' => '${componentFileName}',
    'label' => '${componentFileName.charAt(0).toUpperCase() + componentFileName.slice(1)}',
    'display' => 'block', 
    'sub_fields' => [
        [
            'key' => 'field_lb_${componentFileName}_comp_head_tab',
            'label' => 'Komponenthuvud/fot',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_${componentFileName}_header',
            'label' => 'Header',
            'name' => '${componentFileName}',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_header',
            ],
            'display' => 'seamless',
            'prefix_name' => 1
        ],
        [
            'key' => 'field_lb_${componentFileName}_content_tab',
            'label' => 'Innehåll',
            'type' => 'tab',
            'placement' => 'top',
        ],
        // Reg your content fields here by start typing lw. E.g. lwtext
        [
            'key' => 'field_lb_${componentFileName}_settings_tab',
            'label' => 'Visuellt/Inställningar',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'key' => 'field_lb_${componentFileName}_colors',
            'label' => 'Färger',
            'name' => '${componentFileName}',
            'type' => 'clone',
            'clone' => [
                0 => 'group_clone_component_settings',
            ],
            'display' => 'seamless',
            'prefix_name' => 1
        ],
        [
            'key' => 'field_lb_${componentFileName}_component_id',
            'label' => 'Komponentens id (frivillig)',
            'name' => 'component_id',
            'type' => 'text',
            'instructions' => $component_id_instructions,
            'placeholder' => 'my-id',
            'prepend' => '#',
        ]
    ]
];
`

// fs.writeFileSync(`inc/acf/lightning-builder/reg-components/${componentName}/${componentName}.php`, regcomponent)
// fs.writeFileSync(`inc/acf/lightning-builder/page-components/${componentName}/reg-${componentName}.php`, regcomponent)

const path = `inc/acf/lightning-builder/page-components/pc-${componentName}`

if (!fs.existsSync(path)) {
    fs.mkdirSync(path, { recursive: true })
}

fs.writeFileSync(`${path}/reg-${componentName}.php`, regcomponent)

// Skapa pc-component.php
const pagcomponent = `<?php
if ( get_row_layout() == '${componentFileName}' && !s(get_row_layout())['hide_component'] ) :
$prefix = get_row_layout();
extract(acf_sub_fields(['']));
?>
<section id="<?= s($prefix)['component_id']; ?>" class="pc-${componentName} section <?= section_spacing(); ?> <?= s($prefix)['bg_color']; ?>">

    <?php component_header($prefix); ?>

    <div class="container <?= s($prefix)['text_color']; ?>">
    </div>

    <?php component_footer($prefix); ?>

</section>
<?php endif; ?>`

// fs.writeFileSync(`inc/acf/lightning-builder/page-components/${componentName}/pc-${componentName}.php`, pagcomponent)

fs.writeFileSync(`${path}/pc-${componentName}.php`, pagcomponent)

console.log(`The files "${componentName}.php" and "pc-${componentName}.php" have been created successfully in ${path}`)
