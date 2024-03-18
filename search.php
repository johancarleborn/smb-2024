<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package lightning
 */
$found_posts = $wp_query->found_posts;
get_header();
?>

<main id="primary" class="site-main">

	<?php if (have_posts()) : ?>

		<header class="py-4 lg:py-8 page-header">
			<div class="container">
				<h1 class="page-title">
					<?php
					printf(esc_html__('Du sökte efter: %s', 'lightning'), '<span>' . get_search_query() . '</span>');
					?>
				</h1>
			</div>
		</header>

		<div class="container">
			<div class="grid grid-cols-1 gap-2 px-0 post-listing md:px-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:gap-3 lg:gap-4">
				<?php
				while (have_posts()) :
					the_post();

					small_card(get_the_ID(), 'px-4');

				endwhile; ?>
			</div>

			<div class="flex justify-center my-8">
				<?php
				if ($found_posts > 12) :
					btn_load_more('any', 'search');
				endif;
				?>
			</div>
		</div>
	<?php else :
		get_template_part('template-parts/content', 'none');

	endif;
	?>
</main>

<?php
get_sidebar();
get_footer();
