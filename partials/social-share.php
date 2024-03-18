<?php

/**
 * 
 * Get social share
 * 
 */

if (!function_exists('social_share')) {

    function social_share($post_id, $type = 'row' | 'col', $class = null) {
        if ($type == 'row') {
            $class .= '';
        } elseif ($type == 'col') {
            $class .= ' flex-col';
        }
?>

        <div class="gap-3 flex items-center <?= $class; ?>">
            <?php if ($type == 'col') : ?>
                <h5 class="mb-4 text-sm"><?= __('Dela', 'lightning'); ?></h5>
            <?php endif; ?>

            <a class="facebook-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="popup" title="Dela på Facebook" data-tooltip-top="Dela på Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>', 'popup', 'width=600,height=600'); return false;">

                <img src="<?= get_stylesheet_directory_uri() . '/src/assets/icons/social/icon-fb-d.svg' ?>" alt="Dela på Facebook">
            </a>

            <a class="twitter-share" href="https://twitter.com/intent/tweet?hashtags=lightweb&original_referer=<?php the_permalink(); ?>&ref_src=twsrc%5Etfw&related=lightweb&text=<?php the_title(); ?> <?php the_permalink(); ?>&via=lightweb" target="_blank" title="Dela på X" data-tooltip-top="Dela på X">

                <img src="<?= get_stylesheet_directory_uri() . '/src/assets/icons/social/icon-tw-d.svg' ?>" alt="Dela på LinkedIn">
            </a>

            <a class="linkedin-share" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" alt="Dela på LinkedIn" title="LinkedIn" data-tooltip-top="Dela på LinkedIn">

                <img src="<?= get_stylesheet_directory_uri() . '/src/assets/icons/social/icon-li-d.svg' ?>" alt="Dela på LinkedIn">
            </a>

            <div class="relative flex flex-col items-center gap-3 share-more">
                <button class="<?= $type == 'row' ? 'ac-open-bottom' : 'ac-header'; ?> cursor-pointer group after:!content-none" data-tooltip-top="Mer">
                    <div class="flex items-center justify-center overflow-hidden text-primary-800 bg-white rounded-full text-center text-3xl material-icons-round group-[.active]:hidden">share</div>
                    <div class="items-center justify-center overflow-hidden text-primary-800 bg-white rounded-full text-center text-3xl material-icons-round hidden group-[.active]:flex">close</div>
                </button>

                <div class="absolute flex-col hidden gap-3">
                    <a class="whatsapp-share" href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>" target="_blank" alt="WhatsApp" title="WhatsApp" data-tooltip-top="Dela i WhatsApp">

                        <img src="<?= get_stylesheet_directory_uri() . '/src/assets/icons/social/icon-wa-d.svg' ?>" alt="Dela i WhatsApp">
                    </a>

                    <a class="mail-share" href="mailto:?subject=<?= get_bloginfo('name') ?>: <?php the_title(); ?>&body=<?= 'Läs på ' . get_bloginfo('name') . ': ' . get_the_title() . '%0D%0A' . get_the_permalink(); ?>" target="_blank" alt="E-post" title="E-post" data-tooltip-top="Maila">

                        <div class="text-3xl leading-none text-primary-800 material-icons-round">email</div>

                    </a>
                </div>
            </div>
        </div>
<?php
    }
}
