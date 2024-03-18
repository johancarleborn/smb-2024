<?php
if (get_row_layout() == 'text_media' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['media_type', 'text', 'link', 'link_type', 'full_width', 'text_media_top_title', 'text_placement', 'text_alignment']));
    $is_img = $media_type === 'img';
    $is_video = $media_type === 'video';
?>

    <section <?php component_id($prefix); ?> class="pc-text-media section <?= $full_width ? 'full-width !py-0' : section_spacing(); ?> <?= s($prefix)['bg_color']; ?> <?= s($prefix)['text_color']; ?>">
        <div class="grid items-<?= $text_alignment ?> md:grid-cols-2 <?= !$full_width ? 'gap-y-6 md:gap-x-6 lg:gap-x-12 container ' : 'gap-y-6 pb-12 md:pb-0'; ?> ">
            <?php if ($text) : ?>
                <div class="mr-0 ml-0 order-2 md:order-<?= $text_placement;
                                                        echo $text_placement === '1' ? ' justify-self-end' : ' justify-self-start';
                                                        echo $full_width ? ' lg:max-w-container-1/2' : '';
                                                        ?>">

                    <div class="text <?= $full_width ? 'container' . compensate_padding($text_placement) : '';
                                        ?>">
                        <div class="<?php
                                    if ($full_width) : echo 'md:py-8';
                                    elseif ($text_alignment === 'start') : echo 'md:pt-6';
                                    elseif ($text_alignment === 'end') : echo 'pb-4 md:pb-6';
                                    endif; ?>
                                ">
                            <?php if ($text_media_top_title) : ?>
                                <span class="block mb-2 text-sm font-semibold uppercase md:mb-3 <?= s($prefix)['accent_color']; ?>">
                                    <?= $text_media_top_title['title']; ?>
                                </span>
                            <?php endif; ?>

                            <?= $text; ?>
                            <?php if ($link) :
                                $link_type === 'button' ? btn_l_primary($link, 'mt-4 lg:mt-6') : custom_link($link, 'text-primary-500 mt-4 lg:mt-6');
                            endif; ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($is_img || $is_video) :
                include __DIR__ . '/parts/pc-media.php';
            endif; ?>
        </div>
    </section>
<?php endif; ?>