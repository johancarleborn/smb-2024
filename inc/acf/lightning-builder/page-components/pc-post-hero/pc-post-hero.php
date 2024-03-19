<?php
if (get_row_layout() == 'post_hero' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['content_type', 'offset', 'picked_post']));
    $latest = $content_type == 'latest';
    $picked = $content_type == 'picked';

    $args = [
        'post_type' => 'post',
        'posts_per_page' => 1,
        'offset' => $offset,
    ];

    if ($latest) {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }

    if ($picked) {
        $args['post__in'] = $picked_post;
    }

    $query = new WP_Query($args);
?>
    <section id="<?= s($prefix)['component_id']; ?>" class="pc-post-hero section <?= s($prefix)['bg_color']; ?>">


        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                <a href="<?= get_the_permalink(); ?>" class="group text-white px-6 md:px-8 xl:px-12 xxl:px-16 flex justify-center items-center aspect-hero w-full max-h-[680px] xxl:max-h-[800px] <?= section_spacing(); ?>">

                    <div class="relative mx-auto z-1 max-w-prose">
                        <h1 class=""><?php the_title(); ?></h1>
                        <div class="preamble"><?= excerpt(100); ?></div>

                        <span class="inline-flex items-center gap-2 mt-24 text-[22px] font-extrabold font-manrope">
                            <ion-icon name="chevron-forward" class="transition-transform group-hover:translate-x-1"></ion-icon>
                            <?= __('Läs inlägget', 'lightning'); ?>
                        </span>
                    </div>

                    <?php image(get_post_thumbnail_id(), 'full', 'absolute pointer-events-none top-0 left-0 w-full h-full object-cover z-0'); ?>

                    <?php overlay(2, '!z-0', true) ?>
                </a>

        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

    </section>
<?php endif; ?>