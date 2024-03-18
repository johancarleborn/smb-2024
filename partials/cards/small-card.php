<?php

/**
 * 
 * Get small card
 * 
 */

if (!function_exists('small_card')) {

    function small_card($post_id, $class = null) {
        $title = relevanssi_get_the_title($post_id);
        $link = get_permalink($post_id);
        $preamble = get_field('preamble', $post_id);
        $image_id = get_post_thumbnail_id($post_id);
        $categories = get_the_terms($post_id, 'category');
        $categories = join(', ', wp_list_pluck($categories, 'name'));
?>

        <div class="card group small-card" data-post-id="<?= $post_id; ?>">
            <div class="h-full pb-8 bg-white border-b md:rounded md:p-3 md:border <?= $class; ?>">
                <a class="flex flex-col h-full" href="<?= $link; ?>">

                    <div class="w-full mb-3 overflow-hidden rounded-sm card-image md:mb-4">
                        <?= image($image_id, 'medium_large', 'object-cover w-full h-full group-hover:scale-105 transition-transform duration-300') ?>
                    </div>

                    <div class="flex flex-col card-body">

                        <?php get_post_terms($post_id, 'category', 'mb-4', 'mb-1'); ?>

                        <h3 class="mb-2 text-2xl"><?= $title; ?></h3>

                        <?php if ($preamble) : ?>
                            <div class="mb-2 !text-base"><?= strip_tags(custom_excerpt(20, 'preamble', $post_id)); ?></div>
                        <?php endif; ?>

                    </div>

                    <?php get_author($post_id, 'date', 'small', 'md:!mt-auto'); ?>
                </a>
            </div>
        </div>
<?php
    }
}
