<?php

/**
 *
 * Outputs a popup
 *
 */
if (!function_exists('popup')) {
    function popup() {
        if (!globalACF()['show_popup']) {
            return;
        }

        // Check if cookie li_popup exists and get it's value
        $cookie_is_set = $_COOKIE['li_popup'] ?? false;

        // Check if cookie exists
        if ($cookie_is_set) {
            // If cookie exists, check if it's value is set to closed
            if ($cookie_is_set == 'closed') {
                // If cookie value is true, set $cookie_is_set to true
                $cookie_is_set = true;
            } else {
                // If cookie value is not true, set $cookie_is_set to false
                $cookie_is_set = false;
            }
        } else {
            // If cookie does not exist, set $cookie_is_set to false
            $cookie_is_set = false;
        }

        if ($cookie_is_set) {
            return;
        }
?>


        <div class="fixed !top-0 z-[9999] bg-black/30 inset-0 [&.active]:flex items-center justify-center hidden li-popup group" data-popup_delay="<?= globalACF()['popup_delay'] ?>" data-popup_setcookie="<?= globalACF()['popup_set_cookie'] ?>">

            <div class="relative flex flex-col items-center max-h-[90vh] max-w-[96vw] overflow-auto lg:max-w-4xl md:overflow-hidden rounded-lg popup <?= globalACF()['popup_bg_color']['bg_colors']; ?>">

                <button class="absolute flex items-center gap-3 p-2 text-base text-black transition-colors duration-300 rounded-full cursor-pointer bg-white/20 lg:hover:bg-slate-50 close-li-popup hover:bg-earth-50 active:bg-earth-100 right-4 top-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-white sm:stroke-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>

                </button>

                <div class="grid grid-cols-1 overflow-auto md:gap-4 sm:grid-cols-2">
                    <div class="md:h-full">
                        <?php image(globalACF()['popup_image'], 'medium_large', 'aspect-video sm:aspect-none w-full h-full object-cover') ?>
                    </div>

                    <div class="px-4 py-6 md:py-12 md:px-6 <?= globalACF()['popup_text_color']['text_colors'] ?>">

                        <span class="block mb-2 text-sm font-semibold md:mb-3 <?= globalACF()['popup_accent_color']['accent_colors'] ?>"><?= globalACF()['popup_top_title']; ?></span>
                        <h4 class="md:text-2xl lg:text-2.5xl md:mb-3"><?= globalACF()['popup_title'] ?></h3>
                            <div class="text popup-content"><?= globalACF()['popup_text'] ?></div>

                            <?php if (globalACF()['popup_code_type'] == 'gravityform') :

                                $g_form_title = 'false';
                                $g_form_description = 'false';
                                $g_form_ajax = 'false';
                                foreach (globalACF()['popup_form_settings'] as $setting) {
                                    if ($setting == 'title') {
                                        $g_form_title = 'true';
                                    }
                                    if ($setting == 'description') {
                                        $g_form_description = 'true';
                                    }
                                    if ($setting == 'ajax') {
                                        $g_form_ajax = 'true';
                                    }
                                } ?>

                                <div class="mt-6">
                                    <?= do_shortcode('[gravityform id="' . globalACF()['popup_gravityform'] . '" title="' . $g_form_title . '" description="' . $g_form_description . '" ajax="' . $g_form_ajax . '"]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (globalACF()['popup_code_type'] == 'code') : ?>
                                <div class="mt-6">
                                    <?= globalACF()['popup_code'] ?>
                                </div>
                            <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>

<?php
    }
}
?>