<?php
extract(acf_fields(['picked_related_articles', 'continue_reading']));
?>

<?php if ($continue_reading) :
    foreach ($continue_reading as $next_part_id) : ?>
        <a class="flex items-center justify-between p-4 mt-4 bg-white border rounded md:p-6 group continue-reading-card" href="<?= get_permalink($next_part_id) ?>">
            <div class="d-block">
                <small class="mb-4 d-block"><?= __('Fortsätt läsa', 'lightning'); ?></small>

                <p class="mb-0 text-primary-700 hover:text-primary-800">
                    <strong><?= get_the_title($next_part_id); ?></strong>
                </p>
            </div>
            <span class="transition-transform duration-300 text-primary-700 material-icons-round group-hover:translate-x-1 hover:text-primary-800">
                chevron_right
            </span>
        </a>
    <?php endforeach; ?>
<?php endif; ?>

<h5 class="mt-6 text-sm text-center "><?= __('Dela', 'lightning'); ?></h5>
<?= social_share(get_the_ID(), 'row', 'justify-center py-2'); ?>

<footer class="my-10">
    <div class="related">
        <h3 class="mb-6"><?= __('Relaterat', 'lightning'); ?></h3>

        <?php
        $is_picked_related_articles = true;

        if (!$picked_related_articles) :
            $is_picked_related_articles = false;
            $terms = get_the_terms(get_the_ID(), 'category');
            $picked_related_articles = get_posts([
                'post_type' => get_post_type(),
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'orderby' => 'date',
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $terms[0]->term_id,
                    ]
                ]
            ]);
        endif; ?>
        <?php foreach ($picked_related_articles as $article) :
            $link = get_permalink($article);
            $image_id = get_post_thumbnail_id($article);
            $categories = get_the_terms($article, 'category');
            $categories = join(', ', wp_list_pluck($categories, 'name'));
            $title = get_the_title($article);
            $date = get_the_date('Y/m/d', $article);

            if ($is_picked_related_articles) {
                $article_id = $article;
            } else {
                $article_id = $article->ID;
            }
        ?>
            <a class="grid grid-cols-4 py-3 mb-2 transition-opacity duration-300 border-t text-primary-700 hover:text-primary-800 last:border-b gap-x-3 md:gap-x-4 md:py-4 hover:opacity-80" href="<?= $link; ?>">
                <?php if ($image_id) : ?>
                    <div class="col-span-1">
                        <?= image($image_id, 'medium', 'object-cover h-full w-full'); ?>
                    </div>
                <?php endif; ?>

                <div class="col-span-3 related-card-body">
                    <h4 class="mb-1 text-lg"><strong><?= $title; ?></strong></h4>
                    <p class="hidden mb-1 sm:block"><?= custom_excerpt(10, 'preamble', $article_id); ?></p>
                    <small class="text-xs date"><?= $date; ?></small>
                </div>
            </a>
        <?php endforeach;
        wp_reset_postdata(); ?>
    </div>
</footer>