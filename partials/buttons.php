<?php

/**
 * Link as button - Primary
 */
if (!function_exists('button_link')) {
    function button_link($link, string $class = null, $data = null) {
        if ($link) { ?>
            <a class="btn <?= $class; ?>" <?= $data; ?> href="<?= $link['url']; ?>" target="<?= $link['target']; ?>">
                <?= $link['title']; ?>
            </a>
        <?php }
    }
}


/**
 * Primary button
 */
if (!function_exists('button')) {
    function button(string $text, string $class = null, $data = null) {
        if ($text) { ?>
            <button class="btn <?= $class; ?>" <?= $data; ?>>
                <?= __($text, 'lightning'); ?>
            </button>
        <?php }
    }
}


/**
 * 
 * Load more button
 * 
 */

if (!function_exists('btn_load_more')) {
    function btn_load_more($post_type = null, $btn_type = 'listing | cat | search', $card_class = null, $body_class = null) {
        $data_set = null;

        if ($btn_type == 'cat') {
            $cat_id = get_queried_object_id();
            $data_set = "data-cat-id='{$cat_id}'";
        } elseif ($btn_type == 'search') {
            $search_query = get_search_query();
            $data_set = "data-search-query='{$search_query}'";
        }

        if ($card_class) {
            $data_set .= "data-card-class='{$card_class}'";
        }

        if ($body_class) {
            $data_set .= "data-card-body='{$body_class}'";
        } ?>

        <button type="button" aria-label="<?= __('Ladda fler poster', 'lightning') ?>" class="btn btn-secondary load-more disabled:border-none group" <?= $data_set ?> data-post-type="<?= $post_type ?>">
            <span class="pointer-events-none load-more-text"><?= __('Ladda fler', 'lightning'); ?></span>
            <ion-icon name="refresh-outline" class="hidden ml-2 pointer-events-none animate-spin group-[.loading]:block"></ion-icon>
        </button>
<?php }
}
