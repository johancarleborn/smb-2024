<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package lightning
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class="container">
			<header class="py-4 lg:py-8 page-header">
				<h1 class="page-title"><?= __('Ojdå, sidan finns inte.', 'lightning'); ?></h1>
			</header><!-- .page-header -->

			<a class="px-5 py-3 text-sm font-semibold text-white rounded bg-primary-600 hover:bg-primary-700 btn btn-primary md:px-6 md:text-base" href="<?= home_url(); ?>"><?= __('Gå till startsidan', 'lightning'); ?></a>
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
