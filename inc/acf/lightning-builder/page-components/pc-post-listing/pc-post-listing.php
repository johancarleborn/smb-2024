<?php
if (get_row_layout() == 'post_listing' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['post_type', 'qty', 'offset', 'card_text_colors', 'card_bg_colors', 'content_type', 'columns', 'categories_as_filter']));

    $card_classes = $card_text_colors;
    $grid_classes = 'grid gap-6 lg:gap-8 xxl:gap-12 post-listing items-stretch lg:grid-cols-' . $columns;

    if ($post_type == 'post') {
        $grid_classes .= ' sm:grid-cols-4';
    }

    if ($post_type == 'testimonial') {
        $grid_classes .= ' md:grid-cols-2 items-start';
    }

    if ($post_type == 'coworker') {
        $grid_classes .= ' grid-cols-2 md:grid-cols-3';
    }


    $card_type = $post_type . '_card';

    if ($post_type == 'post') {
        $card_classes .= ' ' . $card_bg_colors;
    }

    $args = [
        'post_type' => $post_type,
        'post_status' => 'publish',
    ];

    if ($content_type == 'latest') {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }

    // Gets the post types from the acf-arrays folder and checks if the post type is in the array
    // If it is, it will get the posts from the picked post type
    if ($content_type == 'picked') {
        include acf_path() . 'acf-arrays/post-types.php';
        foreach ($post_types as $key => $type) {
            if ($key == $post_type) {
                $args['post__in'] = get_sub_field('picked_' . $key);
                $args['orderby'] = 'post__in';
            }
        }
    }

    if ($qty > 0) {
        $args['posts_per_page'] = $qty;
    } else {
        $args['posts_per_page'] = 12;
    }

    if ($offset > 0) {
        $args['offset'] = $offset;
    }

    if ($categories_as_filter) {
        $categories = get_categories(['taxonomy' => 'category', 'hide_empty' => true]);
    }

    $query = new WP_Query($args);
    $found_posts = $query->found_posts;
    $taxonomies = get_taxonomies(['object_type' => [$post_type]]);

?>

    <section <?php component_id($prefix); ?> class="pc-post-listing section <?= section_spacing(); ?> <?= s($prefix)['bg_color']; ?>">

        <?php component_header($prefix); ?>

        <?php include __DIR__ . '/parts/post-filter.php' ?>

        <div class="container <?= s($prefix)['text_color']; ?>">

            <div class="<?= $grid_classes; ?>">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                        if (function_exists($card_type)) :
                            $card_type(get_the_ID(), $card_classes, 10);
                        endif;

                    endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>

            <?php
            if ($found_posts > 12 && $qty < 1) :  ?>
                <div class="flex justify-center my-8">
                    <?= btn_load_more($post_type, null, $card_bg_colors . ' ' . $card_text_colors, '') ?>
                </div>
            <?php
            endif; ?>
        </div>

        <?php component_footer($prefix); ?>

    </section>
<?php endif; ?>