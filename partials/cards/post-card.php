<?php

/**
 * 
 * Get Post card
 * 
 */

if (!function_exists('post_card')) {

    function post_card(int $post_id, string $class = null, string $body_class = null, int $excerpt_length = 20) {
        $title = get_the_title();
        $link = get_permalink();
        $date = get_the_date();
        $image_id = get_post_thumbnail_id($post_id);
        $image_classes = 'object-cover group-hover:scale-105 transition-transform duration-300 h-full w-full aspect-4/3';
?>
        <div class="col-span-2 lg:col-span-1 card group" data-post-id="<?= $post_id; ?>">

            <div class="h-full <?= $class; ?>">
                <a class="flex flex-col h-full" href="<?= $link; ?>">

                    <div class="w-full overflow-hidden card-image">
                        <?= image($image_id, 'medium_large', $image_classes); ?>
                    </div>

                    <div class="flex flex-col md:col-span-3 card-body p-4 xl:p-6 <?= $body_class ?> <?= str_contains($class, 'bg-[transparent]') ? '!px-0' : ''; ?>">

                        <?php get_post_terms($post_id, 'category', 'mb-4'); ?>

                        <h4 class="mb-2"><?= $title; ?></h4>
                        <small class="mb-4"><?= $date; ?></small>
                        <div class=""><?= custom_excerpt($excerpt_length, 'preamble', $post_id); ?></div>

                    </div>
                </a>
            </div>
        </div>
<?php
    }
}
