<?php
if (get_row_layout() == 'hero' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['hero_link', 'hero_small', 'hero_media_type', 'hero_video', 'hero_img', 'hero_link_secondary', 'text', 'top_title', 'hero_type']));
    $is_horizontal = $hero_type == 'horizontal';

    $grid_classes = 'gap-x-4 md:gap-x-6 lg:gap-x-8 md:py-16 items-center lg:py-20 ';
    $text_class = '';
    $title_class = '';
    $image_class = 'hero-bg-img object-cover h-full ';

    if ($is_horizontal) {
        $grid_classes .= ' grid grid-cols-1 md:grid-cols-2 ';
    } else {
        $grid_classes .= 'flex flex-col items-center text-center';
        $text_class .= 'text-center justify-center mx-auto';
        $title_class .= 'max-w-4xl mx-auto mb-4 md:mb-6 lg:mb-8';
        $image_class .= 'mx-auto aspect-video';
    }

    if (s($prefix)['text_align'] == 'text-center') {
        $grid_classes .= 'justify-center ';
    }

?>
    <section id="<?= s($prefix)['component_id']; ?>" class="pc-hero section <?= s($prefix)['bg_color']; ?> <?= s($prefix)['text_color']; ?>">
        <div class="container max-md:px-0">
            <div class="<?= $grid_classes ?>">

                <div class="w-full md:order-1 <?= $is_horizontal ? 'order-2' : 'order-1' ?>">
                    <div class="px-4 py-6 hero-content md:p-0 md:my-0">
                        <?php
                        header_top_title($prefix, s($prefix)['accent_color']);
                        header_title($prefix, $title_class);
                        header_text($prefix, $text_class);
                        ?>

                        <div class="flex gap-4 md:gap-6 lg:gap-8 <?= !$is_horizontal ? 'justify-center md:mb-6 lg:mb-8 xl:mb-12' : '' ?>">
                            <?php btn_l_primary($hero_link, 'mt-8'); ?>
                            <?php btn_l_secondary($hero_link_secondary, 'mt-8'); ?>
                        </div>
                    </div>
                </div>

                <div class="relative top-0 left-0 md:h-full px-0 hero-img md:order-2 h-[320px] md:min-h-[400px] lg:min-h-[600px]  <?= $is_horizontal ? 'order-1' : 'order-2' ?>">
                    <?php if ($hero_media_type === 'img') : ?>
                        <?php image($hero_img, 'full', $image_class); ?>
                    <?php endif; ?>
                    <?php if ($hero_media_type === 'video') : ?>
                        <?php
                        if ($hero_video) :
                            $url = wp_get_attachment_url($hero_video);
                            $title = get_the_title($hero_video);
                        ?>
                            <video class="object-cover w-full h-full hero-bg-img" playsinline autoplay muted loop>
                                <source src="<?= $url; ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>