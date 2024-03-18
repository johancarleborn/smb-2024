<?php

/**
 * 
 * Get coworker card
 * 
 */

if (!function_exists('coworker_card')) {

    function coworker_card($post_id, $class = null) {
        $title = get_the_title();
        $image_id = get_field('image', $post_id);
        $email = get_field('coworker_email', $post_id);
        $phone = get_field('coworker_phone', $post_id);
        $role = get_field('role', $post_id);
        $terms =  get_the_terms($post_id, 'coworker_category');
?>

        <div class="card" data-post-id="<?= $post_id; ?>">
            <div class="h-full <?= $class; ?>">

                <div class="w-full mb-2 overflow-hidden card-image">
                    <?= image($image_id, 'medium_large', 'object-cover w-full aspect-portrait') ?>
                </div>

                <div class="flex flex-col md:col-span-3 card-body">

                    <p class="mb-1 text-base font-bold lg:text-lg">
                        <?= $title; ?>
                    </p>


                    <div>
                        <?php if ($role) : ?>
                            <p class="mb-1 text-sm font-normal">
                                <strong><?= __('Roll: ', 'lightning') ?></strong><?= $role ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($email) : ?>
                            <a class="block mb-1 text-sm font-normal hover:underline" href="mailto:<?= $email; ?>">
                                <strong><?= __('Mail: ', 'lightning') ?></strong><?= $email; ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($phone) : ?>
                            <a class="block mb-1 text-sm font-normal hover:underline" href="tel:<?= $phone; ?>">
                                <strong><?= __('Tel: ', 'lightning') ?></strong><?= $phone; ?>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>
<?php
    }
}
