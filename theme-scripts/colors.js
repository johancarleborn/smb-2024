// Creates a new file with colors from tailwind.config.js
//
// Usage:
// yarn colors
//
// Output: inc/acf/acf-arrays/color.php
//
// This file is used by the ACF Color Picker field in the Lightning Builder
// to populate the color picker with the colors defined in tailwind.config.js
//
// The colors are also used by the ACF Color Picker field in the Article Builder

const fs = require('fs')
const path = require('path')
const tailwindConfig = require('../tailwind.config.js')

const backgroundColors = tailwindConfig.theme.colors.background
const textColors = tailwindConfig.theme.colors.text
const accentColors = tailwindConfig.theme.colors.accent

const backgroundColorsArray = Object.keys(backgroundColors)
    .map((color) => {
        console.log(color)
        if (typeof backgroundColors[color] === 'string') {
            return `'bg-[${backgroundColors[color]}]' => __('${color}', 'lightning')`
        }

        return Object.keys(backgroundColors[color]).map((shade) => {
            return `'bg-[${backgroundColors[color][shade]}]' => __('${color} ${shade}', 'lightning')`
        })
    })
    .flat()

const textColorsArray = Object.keys(textColors)
    .map((color) => {
        console.log(color)
        if (typeof textColors[color] === 'string') {
            return `'text-[${textColors[color]}]' => __('${color}', 'lightning')`
        }

        return Object.keys(textColors[color]).map((shade) => {
            return `'text-[${textColors[color][shade]}]' => __('${color} ${shade}', 'lightning')`
        })
    })
    .flat()

const accentColorsArray = Object.keys(accentColors)
    .map((color) => {
        console.log(color)
        if (typeof accentColors[color] === 'string') {
            return `'text-[${accentColors[color]}]' => __('${color}', 'lightning')`
        }

        return Object.keys(accentColors[color]).map((shade) => {
            return `'text-[${accentColors[color][shade]}]' => __('${color} ${shade}', 'lightning')`
        })
    })
    .flat()

// const bgColorsArrayString = JSON.stringify(colorsArray, null, 4)
const bgColorsArrayString = backgroundColorsArray.join(' , ')
const textColorsArrayString = textColorsArray.join(' , ')
const accentColorsArrayString = accentColorsArray.join(' , ')

const colorsArrayFile = `<?php
/**
 * DO NOT EDIT! This file is generated by the colors.js script in the scripts folder.
 * To regenerate this file, run 'yarn colors' in the terminal.
 * 
 * 
 * Colors array
 * 
 * @package Lightning_Builder
 * @since 1.0.0
 * 
 * @return array
*/

$bg_colors = [];
$text_colors = [];
$accent_colors = [];

if (is_admin()) {

$bg_colors = [${bgColorsArrayString}];
$text_colors = [${textColorsArrayString}];
$accent_colors = [${accentColorsArrayString}];

    add_action('admin_head', function () use ($bg_colors, $text_colors, $accent_colors) {
        $colors_css = '';

        // merge colors
        $colors = array_merge($bg_colors, $text_colors, $accent_colors);

        if (!empty($colors)) {
            foreach ($colors as $key => $value) {
                preg_match_all('/\\[(.*?)\\]/', $key, $matches);
                $key = $matches[1][0] ?? '';
                $value = strtolower($value);
                $value = str_replace(' ', '-', $value);
                $value = preg_replace('/[^A-Za-z0-9\\-]/', '', $value);
                $colors_css .= "body .colors-group .{$value} { background-color: {$key}; }";
            }
        }

        $output_css = '<style class="color-styles">';
        if (!empty($colors_css)) {
            $output_css .= $colors_css;
        }
        $output_css .= '</style>';
        echo $output_css;
    });
}


    `

const colorsArrayFilePath = path.join(__dirname, '../inc/acf/acf-arrays/colors.php')

fs.writeFile(colorsArrayFilePath, colorsArrayFile, (err) => {
    if (err) {
        console.error(err)
        return
    }
    console.log('Success! Colors array file has been created')
})
