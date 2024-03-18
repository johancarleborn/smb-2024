<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lightning
 */

get_header();
$post_type = get_post_type();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="grid-cols-4 gap-4 md:grid lg:gap-6 post-listing">

            <?php
            if (have_posts()) :
                $found_posts = $wp_query->found_posts;
                if (is_home() && !is_front_page()) :
            ?>

                    <h1 class="sr-only page-title">
                        <?php single_post_title(); ?>
                    </h1>

            <?php
                endif;

                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>

        </div>
        <?php
        if ($found_posts > 12) : ?>
            <div class="flex justify-center my-8">
                <?= btn_load_more($post_type, '', '', '!px-0') ?>
            </div>
        <?php
        endif; ?>
    </div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
