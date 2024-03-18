<?php
if (get_row_layout() == 'columns' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['card_view', 'col_qty']));
?>

    <section <?php component_id($prefix); ?> class="pc-columns section <?= section_spacing(); ?> <?= s($prefix)['bg_color']; ?> <?= s($prefix)['text_color']; ?>">

        <?php component_header($prefix); ?>

        <div class="container">
            <div class="grid md:grid-cols-2 xl:grid-cols-<?= $col_qty; ?> gap-6 lg:gap-8 xxl:gap-12">
                <?php if (have_rows('columns_cols')) : ?>

                    <?php while (have_rows('columns_cols')) : the_row();
                        extract(acf_sub_fields(['title', 'text', 'media_type', 'img', 'video', 'icon', 'link', 'inherit']));
                        $is_button = $link && $link['title'] && $card_view;
                        $is_video = ($media_type === 'video');
                        $is_image = ($media_type === 'img');
                        $is_icon = ($media_type === 'icon');
                        $col_bg_color = s('col_color')['bg_color'];
                        $col_text_color = s('col_color')['text_color'];

                        $classNames = 'column flex flex-col h-full overflow-hidden relative';
                        if ($link) {
                            $classNames .= ' group';
                        }
                        if ($card_view) {
                            $classNames .= ' shadow-md';
                        }

                        if (!$inherit) {
                            $classNames .= ' ' . $col_bg_color . ' ' . $col_text_color;
                        }

                        if ($col_bg_color && !$inherit && !$card_view) {
                            $classNames .= ' p-4';
                        }
                    ?>

                        <?php if ($link) : ?>
                            <a class="<?= $classNames; ?>" href="<?= $link['url'] ?>">
                            <?php else : ?>
                                <div class="<?= $classNames; ?>">
                                <?php endif; ?>
                                <?php
                                // IMAGE
                                if ($is_image) : ?>
                                    <div class="overflow-hidden">
                                        <?php image($img, 'full', 'aspect-4/3 object-cover transition-transform duration-300 group-hover:scale-105'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                // VIDEO
                                if ($is_video) :
                                    if ($video) :
                                        $url = wp_get_attachment_url($video);
                                ?>
                                        <div class="overflow-hidden">
                                            <video playsinline autoplay muted loop class="object-cover transition-transform duration-300 aspect-4/3 group-hover:scale-105">
                                                <source src="<?= $url; ?>" type="video/mp4">
                                            </video>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php

                                // TEXT CONTENT
                                if ($text || $title) :
                                    $text_classes = 'text lg:p-6';

                                    if ($is_icon) {
                                        $text_classes .= ' has-icon xl:p-6';
                                    }

                                    if ($card_view) {
                                        $text_classes .= ' p-4';
                                    } else {
                                        $text_classes .= ' !pt-4 md:!pt-6 !p-0';
                                    }

                                    if ($inherit) {
                                        $text_classes .= ' ' . s($prefix)['text_color'];
                                    }

                                ?>
                                    <div class="<?= $text_classes; ?>">
                                        <?php if ($is_icon) : ?>
                                            <div class="inline-flex items-center p-3 mb-4 rounded-full bg-primary-50 sm:mb-4 lg:mb-6">
                                                <?= $icon; ?>
                                            </div>
                                        <?php endif; ?>

                                        <h3><?= $title; ?></h3>
                                        <?= $text; ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                // BUTTON
                                if ($is_button) :
                                    btn_primary($link['title'], 'mx-4 mt-auto mb-4 sm:mx-0 sm:w-full');
                                ?>
                                <?php endif; ?>

                                <?php
                                // LINK (IF NOT USING CARD VIEW)
                                if ($link && $link['title'] && !$card_view) : ?>
                                    <p class="inline-flex items-center mt-2 font-semibold sm:mt-4 md:mt-6 gap-x-4">
                                        <?= $link['title']; ?>
                                        <span class="text-base transition-transform duration-300 material-icons-round group-hover:translate-x-1">arrow_forward_ios</span>
                                    </p>
                                <?php endif; ?>

                                <?php if ($link) : ?>
                            </a>
                        <?php else : ?>
            </div>
        <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>


        </div>
        </div>

        <?php component_footer($prefix); ?>

    </section>
<?php endif; ?>