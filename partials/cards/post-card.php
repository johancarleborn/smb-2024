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
        $image_classes = 'object-cover transition-transform duration-300 h-full w-full aspect-4/3';
?>
        <div class="col-span-2 lg:col-span-1 card group" data-post-id="<?= $post_id; ?>">

            <div class="h-full <?= $class; ?>">
                <a class="flex flex-col group-[.picked]/pl:gap-6 group-[.picked]/pl:items-start group-[.picked]/pl:flex-row h-full" href="<?= $link; ?>">

                    <div class="w-full overflow-hidden card-image group-[.picked]/pl:shrink-0 group-[.picked]/pl:max-w-56">
                        <?= image($image_id, 'medium_large', $image_classes . ' '); ?>
                    </div>

                    <div class="flex flex-col md:col-span-3 card-body group-[.picked]/pl:py-0 py-4 xl:py-6 <?= $body_class ?>">

                        <h4 class="mb-2 text-xxl"><?= $title; ?></h4>
                        <div class="group-[.picked]/pl:line-clamp-3"><?= excerpt(40); ?></div>

                        <div class="flex items-center gap-2 mt-2 text-xs font-medium">
                            <?php get_post_terms($post_id, 'category'); ?>
                            <span class="size-1.5 rounded-full shrink-0 bg-primary-900"></span>
                            <date class="text-gray-400"><?= $date; ?></date>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    <?php
    }
}


if (!function_exists('sidebar_post_item')) {

    function sidebar_post_item($post_id) {
        $link = get_permalink();
        $image_id = get_post_thumbnail_id($post_id);
        $name = get_the_author_meta('user_firstname') . ' ' . get_the_author_meta('user_lastname');
    ?>

        <li class="mb-2">
            <a href="<?= $link; ?>" class="flex items-center gap-3 py-3 text-sm text-gray-600 hover:text-gray-800">
                <div class="shrink-0 size-20">
                    <?php image($image_id, 'thumbnail', 'aspect-square w-full object-cover shrink-0') ?>
                </div>
                <div class="">
                    <div class="text-sm font-extrabold text-black-950"><?php the_title(); ?></div>
                    <div class="text-gray-500">Av <strong><?= $name ?></strong></div>
                </div>
            </a>
        </li>

<?php }
}
