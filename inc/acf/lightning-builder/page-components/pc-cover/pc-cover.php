<?php
if (get_row_layout() == 'cover' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['cover_btn', 'cover_btn_2', 'cover_size', 'cover_media_type', 'cover_video', 'cover_img', 'cover_bg_color', 'overlay', 'cover_text_align', 'cover_boxed']));

    if ($cover_size == 1) {
        $cover_height = ' min-h-[280px]';
    } else if ($cover_size == 2) {
        $cover_height = ' min-h-[400px] lg:min-h-[600px]';
    } else if ($cover_size == 3) {
        $cover_height = ' min-h-[calc(100svh-100px)] sm:min-h-[500px] md:min-h-[600px] lg:min-h-[740px]';
    }
?>

    <section <?php component_id($prefix); ?> class="relative pc-cover <?= $cover_boxed ? section_spacing() . ' bg-[transparent]' : ''; ?> <?= !$cover_boxed && $cover_media_type == 'color' ? $cover_bg_color['bg_colors'] : '' ?>">

        <div class="container">
            <?php if ($cover_boxed) : ?>
                <div class="relative px-4 overflow-hidden sm:px-6 md:px-8 lg:px-12 rounded-xl <?= $cover_media_type == 'color' ? $cover_bg_color['bg_colors'] : '' ?>">
                <?php endif; ?>
                <div class="flex items-center py-6 sm:py-8 md:py-16 <?php
                                                                    echo $cover_text_align['text_align'] == 'text-center' ? ' text-center justify-center' : '';
                                                                    echo $cover_height;
                                                                    ?>">


                    <div class="z-10 w-full sm:w-2/3 lg:w-1/2 cover-content py-4 sm:py-6 md:py-12 <?php
                                                                                                    echo s($prefix)['bg_color'] != 'bg-[transparent]' ? 'px-4 sm:px-6 md:px-12 ' : '';
                                                                                                    echo s($prefix)['bg_color']; ?>">


                        <div class="<?= s($prefix)['text_color'] ? s($prefix)['text_color'] : ''; ?>">
                            <?php
                            header_top_title($prefix, s($prefix)['accent_color']);
                            header_title($prefix);
                            header_text($prefix);
                            ?>
                        </div>

                        <div class="flex flex-wrap items-center gap-3 mt-3 md:mt-4 md:gap-6 lg:gap-8 xl:gap-12 <?= $cover_text_align['text_align'] == 'text-center' ? ' text-center justify-center' : ''; ?>">
                            <?php button_link($cover_btn, 'btn-primary'); ?>
                            <?php button_link($cover_btn_2, 'btn-secondary'); ?>
                        </div>
                    </div>

                    <div class="absolute inset-0 z-0 cover-img">
                        <?php if ($cover_media_type === 'img') : ?>
                            <?php image($cover_img, 'full', 'cover-bg-img object-cover h-full w-full'); ?>
                        <?php endif; ?>

                        <?php if ($cover_media_type === 'video') : ?>
                            <?php
                            if ($cover_video) :
                                $url = wp_get_attachment_url($cover_video);
                                $title = get_the_title($cover_video);
                            ?>
                                <video class="object-cover h-full min-w-full cover-bg-img" playsinline autoplay muted loop>
                                    <source src="<?= $url; ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?= overlay($overlay, 'z-0') ?>
                    </div>
                </div>
                <?php if ($cover_boxed) : ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>