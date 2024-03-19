<?php
if (get_row_layout() == 'faq' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['faqs', 'link', 'link_type']));

    $faq_query = new WP_Query([
        'post_type' => 'faq',
        'posts_per_page' => 500,
        'post__in' => $faqs,
        'orderby' => 'post__in',
    ]);
?>

    <section <?php component_id($prefix); ?> class="pc-faq section <?= section_spacing(); ?> <?= s($prefix)['bg_color']; ?>">
        <div class="container">
            <div class="grid gap-x-16 md:grid-cols-2 gap-y-6">
                <div>
                    <?php component_header($prefix, true); ?>
                    <?php
                    if ($link['component_link']) {
                        if ($link_type['component_link_type'] === 'button') {
                            button_link($link['component_link'], 'btn-primary mt-4 lg:mt-6');
                        } else {
                            custom_link($link['component_link'], 'text-primary-500 mt-4 lg:mt-6');
                        }
                    }
                    ?>
                </div>

                <div>
                    <?php
                    if ($faq_query->have_posts()) : ?>
                        <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                            <details class="mb-8 faq-item border border-gray-200 group <?= s($prefix)['text_color']; ?>">
                                <summary class="p-4 md:p-8 faq-question flex items-center justify-between cursor-pointer [&::-webkit-details-marker]:hidden">
                                    <h4 class="flex items-center w-full gap-4 mb-0">
                                        <span class="block w-full pr-6 md:pr-8"><?= the_title(); ?></span>
                                        <ion-icon name="chevron-down" class="duration-300 group-open:rotate-180"></ion-icon>
                                    </h4>
                                </summary>
                                <div class="px-4 pb-6 faq-answer md:pb-8 md:px-8 text"><?= the_content(); ?></div>
                            </details>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>


    </section>
<?php endif; ?>