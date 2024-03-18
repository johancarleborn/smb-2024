<?php

/**
 *
 * Output the component header
 *
 */
function header_top_title($field_name, $top_title_class = '') {
    if ($field_name) { ?>
        <span class="block mb-2 text-sm font-semibold uppercase md:mb-3 <?= $top_title_class ?>">
            <?= s($field_name)['top_title'] ?>
        </span>
        <?php }
}

function header_title($field_name, $title_class = '') {
    if ($field_name) {
        echo '<' . s($field_name)['title_tag'] . ' class="' . $title_class . ' hyphens-manual" >';
        echo s($field_name)['title'];
        echo '</' . s($field_name)['title_tag'] . '>';
    }
}

function header_text($field_name, $text_class = '') {
    if ($field_name) {

        $text_class .= ' text relative preamble ' . s($field_name)['text_color'];

        if ($field_name !== 'text_text' && s($field_name)['text_align'] == 'text-center') {
            $text_class .= ' mx-auto';
        }

        if ($field_name !== 'text_text') {
            $text_class .= ' max-w-prose';
        }

        echo '<div class="' . $text_class . '">';
        echo s($field_name)['text'];
        echo '</div>';
    }
}

function component_header(string $field_name, $text_only = false) {
    if (s($field_name)['title'] || s($field_name)['text']) {
        $title_class = s($field_name)['text_color'];
        $accent_color = s($field_name)['accent_color'];

        if (!$text_only) { ?>
            <header class="container mb-8 md:mb-10 xl:mb-12 xxl:mb-16 <?= s($field_name)['text_align'] ?>">
            <?php
        }

        header_top_title($field_name, $accent_color);
        header_title($field_name, $title_class);
        header_text($field_name);

        if (!$text_only) { ?>
            </header>
<?php }
    }
}
