<?php if ($content_type != 'picked' && $qty < 1) :
    if ($categories_as_filter) :
        $btn_classes = 'cat-filter first-of-type:ml-4 last-of-type:mr-4 inline-flex items-center px-3 py-2 my-3 transition-colors duration-300 cursor-pointer ring-1 text-primary-500 hover:text-white hover:bg-primary-500 font-medium [&.active]:text-white [&.active]:bg-primary-500';
        // Get total post count
        $total_posts = wp_count_posts('post')->publish;
?>
        <div class="container mb-8 md:mb-10 xl:mb-12 xxl:mb-14">

            <div class="flex items-center gap-2 -mx-4 overflow-auto md:gap-3 lg:gap-4">
                <button type="button" id="all" class="<?= $btn_classes ?> active" data-value="">
                    <?= __('Alla', 'lightning') ?>
                    <span class="inline-flex items-center justify-center text-primary-500 ml-2 text-xs rounded-full bg-white/90 pointer-events-none font-normal py-0.5 px-1.5 min-h-5 min-w-5 shrink-0 ring-1">
                        <?= $total_posts ?>
                    </span>
                </button>

                <?php foreach ($categories as $category) :
                    $cat_id = $category->term_id;
                    $name = $category->name;
                    $slug = $category->slug;
                    $post_qty = $category->count;
                ?>
                    <button type="button" id="<?= $slug; ?>" class="<?= $btn_classes ?>" data-value="<?= $cat_id; ?>">
                        <?= $name; ?>
                        <span class="inline-flex items-center justify-center text-primary-500 ml-2 text-xs rounded-full bg-white/90 pointer-events-none font-normal py-0.5 px-1.5 min-h-5 min-w-5 shrink-0 ring-1">
                            <?= $post_qty ?>
                        </span>
                    </button>
                <?php endforeach; ?>

            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>