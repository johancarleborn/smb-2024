<?php
$h_full = $full_width ? 'h-full' : '';
extract(acf_sub_fields(['img', 'video', 'video_controls', 'loop_video', 'video_type', 'embeded_url']));

$image_wrapper_classes = 'flex w-full order-1 ';

$image_classes = 'w-full object-cover ';

if ($is_img) {
    $image_classes .= 'aspect-4/3 ';
}

if ($is_video) {
    $image_classes .= 'aspect-video ';
}

if ($text_placement === '1') {
    $image_wrapper_classes .= 'justify-self-start md:order-2 ';
} else {
    $image_wrapper_classes .= 'justify-self-end md:order-1 ';
}

if ($full_width) {
    $image_wrapper_classes .= '!px-0 md:h-full ';
    $image_classes .= 'md:h-full ';
} else {
    $image_wrapper_classes .= 'min-h-full ';
}
?>
<!-- h-4/3 -->
<div class="<?= $image_wrapper_classes; ?>">

    <?php if ($is_img) : ?>
        <?php if ($img) :
            image($img, 'full', $image_classes);
        endif; ?>
    <?php endif; ?>

    <?php if ($is_video) :
        if ($video_type == 'upload') :
            $url = wp_get_attachment_url($video);
            $title = get_the_title($video);
            if ($video) :
                echo video_player($url, '', $video_controls, $loop_video); ?>
        <?php
            endif;
        else :
            echo video_player($embeded_url, '', $video_controls, $loop_video);
        endif; ?>
    <?php endif; ?>
</div>