<?php

/**
 *
 * Output the component footer
 *
 */
if (!function_exists('component_footer')) {

    function component_footer(string $field_name, bool $cta_only = false) {
        if (s($field_name)['link']) :
            $footer_class = 'container flex mt-8 md:mt-10 xl:mt-12 xxl:mt-16 ';

            if (s($field_name)['text_align'] == 'text-center') {
                $footer_class .= ' text-center justify-center';
            }

            if (!$cta_only) : ?>
                <footer class="<?= $footer_class ?>">
                <?php
            endif;

            if (s($field_name)['link']) :
                s($field_name)['link_type'] === 'button' ? button_link(s($field_name)['link'], 'btn-primary mt-4 lg:mt-6') : custom_link(s($field_name)['link'], 'text-primary-500 mt-4 lg:mt-6');
            endif;

            if (!$cta_only) : ?>
                </footer>
            <?php endif; ?>
<?php
        endif;
    }
}
