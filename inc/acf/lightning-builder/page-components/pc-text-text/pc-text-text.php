<?php
if (get_row_layout() == 'text_text' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['text_left', 'text_right', 'show_text_2', 'text_width']));
    $text_center = s($prefix)['text_align'] == 'text-center';
?>

    <section <?php component_id($prefix); ?> class="pc-text-text section <?= section_spacing(); ?> <?= s($prefix)['bg_color']; ?>">

        <?php
        if (!$text_center) : ?>
            <div class="w-full <?= $text_width ?>">
                <?php component_header($prefix); ?>
            </div>
        <?php endif; ?>

        <?php if ($text_left) : ?>
            <div class="container">
                <?php
                if ($text_center) :
                    if (s($prefix)['title'] || s($prefix)['text'] || s($prefix)['top_title']) : ?>
                        <header class="mb-8 md:mb-10 xl:mb-12 xxl:mb-16 <?= s($prefix)['text_align'] == 'text-center' ? 'flex justify-center' : '' ?>">
                            <div class="w-full <?= $text_width ?>">
                                <?php component_header($prefix, true); ?>
                            </div>
                        </header>
                <?php endif;
                endif; ?>

                <div class="text <?= $show_text_2 ? 'grid md:grid-cols-2 gap-y-4 md:gap-6 lg:gap-12' : ''; ?> <?= s($prefix)['text_align'] == 'text-center' ? 'flex justify-center' : '' ?>">

                    <div class="<?= s($prefix)['text_color']; ?> <?= $text_width && $show_text_2 !== true ? $text_width : ''; ?>">
                        <?= $text_left; ?>
                    </div>

                    <?php if ($show_text_2 && $text_right) : ?>
                        <div class="<?= s($prefix)['text_color']; ?>">
                            <?= $text_right; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>

        <?php component_footer($prefix); ?>

    </section>
<?php endif; ?>