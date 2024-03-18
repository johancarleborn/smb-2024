<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lightning
 */

?>

<section class="no-results not-found">
	<header class="py-4 lg:py-8 page-header">
		<div class="container">
			<h1 class="page-title"><?php esc_html_e('Kunde inte hitta något', 'lightning'); ?></h1>

			<?php if (function_exists('relevanssi_didyoumean')) {
				relevanssi_didyoumean(
					get_search_query(false),
					'<p>Menade du: ',
					'</p>',
					5
				);
			} ?>
		</div>
	</header><!-- .page-header -->

	<div class="container page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__('Ready to publish your first post? <a href="%1$s">Börja här</a>.', 'lightning'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);

		elseif (is_search()) :
		?>

			<p><?php esc_html_e('Inget matchade din sökning, prova med något annat.', 'lightning'); ?></p>
		<?php
		else :
		?>

			<p><?php esc_html_e('Det verkar inte som att vi hittar vad du letar efter. Prova med en sökning.', 'lightning'); ?></p>
		<?php

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->