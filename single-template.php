<?php

/**
 * @package lightning
 * 
 * Denna är endast till för att kunna förhandsvisa sina globala mallar när man bygger upp dem.
 * 
 */

// Prevent search engines from indexing this page
header('X-Robots-Tag: noindex');

get_header();
$user = wp_get_current_user();
if (is_user_logged_in() && current_user_can('administrator')) :
?>
	<main id="primary" class="site-main">
		<?php get_template_part('template-parts/content', 'page') ?>
	</main>

<?php
else :
	wp_redirect(home_url());
	exit;
endif;

get_footer();
