<?php
if (get_row_layout() == 'forms' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['gravityform', 'form_code_type', 'form_code', 'form_position', 'text', 'form_settings', 'content_type', 'image', 'full_width_image']));

    $form_order = $form_position == 'left' || $form_position == 'top' ? 'md:order-first' : 'md:order-last';
    $grid_cols = $form_position == 'left' || $form_position == 'right' ? 'md:grid-cols-2' : 'md:grid-cols-1';
    $max_width = $form_position == 'top' || $form_position == 'bottom' ? 'max-w-3xl mx-auto w-full' : '';
    $image_class = 'w-full';

    if ($full_width_image) {
        $image_class .= ' object-cover h-full';
    } else {
        $image_class .= ' object-contain';
    }

    $form_title = 'false';
    $form_description = 'false';
    $form_ajax = 'false';
    foreach ($form_settings as $setting) {
        if ($setting == 'title') {
            $form_title = 'true';
        }
        if ($setting == 'description') {
            $form_description = 'true';
        }
        if ($setting == 'ajax') {
            $form_ajax = 'true';
        }
    }
?>
    <section id="<?= s($prefix)['component_id']; ?>" class="pc-forms section <?= section_spacing(); ?> <?= s($prefix)['bg_color']; ?>">

        <?php component_header($prefix); ?>

        <div class="container <?= s($prefix)['text_color']; ?>">

            <div class="grid grid-cols-1 gap-4 md:gap-6 lg:gap-8 xl:gap-12 xxl:gap-16 <?= $grid_cols ?> <?= $max_width ?>">

                <?php if ($content_type == 'text') : ?>
                    <?php if ($text) : ?>
                        <div class="text">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>

                <?php else : ?>
                    <?php image($image, 'full', $image_class) ?>
                <?php endif; ?>

                <?php if ($form_code_type == 'gravityform' && $gravityform) : ?>
                    <div class="form <?= $form_order; ?>">
                        <?= do_shortcode('[gravityform id="' . $gravityform . '" title="' . $form_title . '" description="' . $form_description . '" ajax="' . $form_ajax . '"]'); ?>
                    </div>

                <?php elseif ($form_code_type == 'code' && $form_code) : ?>
                    <div class="form <?= $form_order; ?>">
                        <?= $form_code ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <?php component_footer($prefix); ?>

    </section>
<?php endif; ?>