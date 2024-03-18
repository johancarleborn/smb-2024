<?php

/**
 * Output the video player, based on the video type
 */

function video_player($video_url, $classes = null, $controls = false, $autoplay = true) {
    $url = $video_url;
    $is_youtube = strpos($url, 'youtube');
    $is_vimeo = strpos($url, 'vimeo');
    $is_mp4 = strpos($url, '.mp4');

    $video_url = parse_url($url);
    $video_type = null;
    if ($is_youtube) {
        $video_id = $video_url['query'];
        parse_str($video_id, $video_id);
        $video_id = $video_id['v'];
        $video_type = 'youtube';
    } elseif ($is_vimeo) {
        $video_id = $video_url['path'];
        $video_id = str_replace('/', '', $video_id);
        $video_type = 'vimeo';
    } elseif ($is_mp4) {
        $video_id = $video_url['path'];
        $video_id = str_replace('/', '', $video_id);
        $video_type = 'html5';
    }
?>
    <div class="aspect-video relative video-player-wrapper w-full <?= $classes; ?>" data-video-type="<?= $video_type; ?>" data-video-id="<?= $video_id; ?>" data-video-controls="<?= $controls ? $controls : 0; ?>" data-video-autoplay="<?= $autoplay ? $autoplay : 0; ?>">

        <div class="flex items-center w-full h-full video-player *:w-full *:h-full">
            <?php if ($is_mp4) : ?>
                <video class="aspect-video" <?= $controls ? 'controls' : ''; ?> <?= $autoplay ? ' loop autoplay playsinline muted' : 'controls'; ?>>
                    <source src="<?= $url; ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        </div>
        <?php if ($autoplay) : ?>
            <div class="absolute inset-0 z-10 flex items-center justify-center p-4 lg:p-6 <?= $controls ? 'play-video group/play cursor-pointer' : '' ?>">
                <?php if ($controls) : ?>
                    <span class="p-2 text-5xl text-white transition-all duration-300 rounded-full pointer-events-none material-icons-round lg:opacity-0 lg:group-hover/play:opacity-100 lg:text-6xl lg:group-hover/play:bg-black/40">play_circle_outline</span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

<?php } ?>