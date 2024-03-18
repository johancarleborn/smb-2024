<?php
if (get_row_layout() == 'image' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    $anchor_target = sanitize_title(s($prefix)['title']);
    $image_id = get_sub_field('image_id');
?>


    <section id="<?= $anchor_target; ?>" class="pb-4 pc-text-text section md:pb-6">
        <?php if (s($prefix)['title']) : ?>
            <?= '<' . s($prefix)['title_tag'] . '>'; ?>
            <?= s($prefix)['title']; ?>
            <?= '</' . s($prefix)['title_tag'] . '>'; ?>
        <?php endif; ?>
        <?= image($image_id, 'full', 'max-w-full'); ?>
    </section>
<?php endif; ?>