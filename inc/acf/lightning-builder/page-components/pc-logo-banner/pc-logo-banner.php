<?php
if (get_row_layout() == 'logo_banner' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['logotypes', 'placement']));
?>

    <section <?php component_id($prefix); ?> class="pc-logobanner section py-8 sm:py-10 md:py-12 lg:py-14 xl:py-16 2xl:py-18 xxl:py-24 <?= s($prefix)['bg_color']; ?> <?= s($prefix)['text_color']; ?>">
        <?php component_header($prefix); ?>

        <div class="container">
            <div class="flex flex-wrap gap-4 md:gap-6 items-center <?= $placement == 'center' ? 'justify-center' : '' ?>">
                <?php if ($logotypes) : ?>
                    <?php
                    foreach ($logotypes as $logotype) :
                        $image_url = get_field('image_url', $logotype);
                        $image_wrapper_class = 'w-[calc(50%-8px)] sm:w-[calc(32.8%-8px)] md:w-[calc(24.7%-16px)] lg:w-[calc(16.6667%-20px)]';
                    ?>
                        <?php if ($image_url) : ?>
                            <a href="<?= $image_url; ?>" target="_blank" class="<?= $image_wrapper_class ?>">
                            <?php else : ?>
                                <div class="<?= $image_wrapper_class ?>">
                                <?php endif; ?>

                                <?php image($logotype, 'full', 'object-contain !w-full !h-auto'); ?>


                                <?php if (!$image_url) : ?>
                                </div>
                            <?php else : ?>
                            </a>
                        <?php endif; ?>
                    <?php
                    endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

        <?php component_footer($prefix); ?>
    </section>
<?php endif; ?>