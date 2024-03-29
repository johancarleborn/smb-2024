<?php
$post_listing_sidebar_most_read_qty = get_field('post_listing_sidebar_most_read_qty');

$most_read_args = [
    'post_type' => 'post',
    'posts_per_page' => $post_listing_sidebar_most_read_qty,
    'meta_key' => 'most_read_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_status' => 'publish',
    'date_query' => [
        'after' => '2 weeks ago',
    ],
];

$most_read_query = new WP_Query($most_read_args);

if ($most_read_query->have_posts()) : ?>

    <aside class="w-full lg:col-span-1">
        <span class="block mb-2 font-extrabold text-pink-600 uppercase text-xxs md:mb-1">Mest lästa</span>
        <h2 class="text-lg font-extrabold tracking-normal text-black-950 font-manrope">Senaste 2 veckorna</h2>

        <ul class="mt-4 space -y-2">
            <?php while ($most_read_query->have_posts()) : $most_read_query->the_post();
                sidebar_post_item(get_the_ID());
            endwhile; ?>
        </ul>
    </aside>

<?php endif;
wp_reset_postdata(); ?>