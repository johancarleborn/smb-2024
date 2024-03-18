<?php

/**
 * 
 * Get Testimonial card
 * 
 */

if (!function_exists('testimonial_card')) {

    function testimonial_card($post_id, $class = null) {
        extract(acf_fields(['role', 'company', 'logo']));
        $title = get_the_title();
        $content = get_the_content();
?>
        <div class="card group testimonial" data-post-id="<?= $post_id; ?>">
            <div class="relative h-full border border-primary-100 p-4 md:p-6 flex flex-col gap-4 <?= $class; ?>">

                <div class="mb-2 card-body line-clamp-5 xxl:line-clamp-4 cursor-s-resize">
                    <span class="pointer-events-none"><?= $content; ?></span>
                </div>

                <div class="flex items-center gap-3 md:gap-4">
                    <?= image($logo, 'thumbnail', 'object-cover aspect-square rounded-full border w-10 h-10') ?>
                    <div>
                        <p class="mb-0 text-sm font-semibold"><?= $title; ?></p>
                        <?php if ($role) : ?>
                            <small class="text-sm opacity-70"><?= $role; ?></small>
                        <?php endif; ?>
                        <?php if ($company) : ?>
                            <small class="text-sm"><strong><?= $company; ?></strong></small>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
<?php
    }
}
