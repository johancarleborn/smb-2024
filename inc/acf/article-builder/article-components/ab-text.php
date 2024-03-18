<?php
if (get_row_layout() == 'text' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    $text_1 = get_sub_field('text_1');
    $text_2 = get_sub_field('text_2');
    $title_2 = get_sub_field('text_title_2');
    $title_tag_2 = get_sub_field('title_tag_2');
    $show_second_text = get_sub_field('chose_second_text');
    $anchor_target = sanitize_title(s('text_title_1')['title']);
?>

    <section id="<?= $anchor_target; ?>" class="pb-4 ab-text section md:pb-6">
        <div class="flex">
            <?php if ($text_1) : ?>
                <div <?= $show_second_text ? 'class="col-sm-6"' : ''; ?>>
                    <?php if (s('text_title_1')['title']) : ?>
                        <?= '<' . s('text_title_1')['title_tag'] . '>'; ?>
                        <?= s('text_title_1')['title']; ?>
                        <?= '</' . s('text_title_1')['title_tag'] . '>'; ?>
                    <?php endif; ?>

                    <?= $text_1; ?>
                </div>
            <?php endif; ?>

            <?php if ($show_second_text && $text_2) : ?>
                <div <?= $show_second_text ? 'class="col-sm-6"' : ''; ?>>
                    <?php if ($title_2) : ?>
                        <?= '<' . $title_tag_2 . '>'; ?>
                        <?= $title_2; ?>
                        <?= '</' . $title_tag_2 . '>'; ?>
                    <?php endif; ?>

                    <?= $text_2; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>