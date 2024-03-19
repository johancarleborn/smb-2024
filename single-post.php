<?php

/**
 * @package lightning
 */
$tags = get_the_tags();
$tags = join(', ', wp_list_pluck($tags, 'name'));
$featured_image_id = get_post_thumbnail_id();

get_header();
?>
<main id="primary" class="site-main">

	<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">

			<div class="w-full mx-auto mt-6 max-w-prose md:mt-8 lg:mt-12">
				<header class="entry-header">
					<div class="mb-6 md:mb-8">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php get_post_terms(get_the_ID(), 'category'); ?>
					</div>

					<?php if ($featured_image_id) :
						image($featured_image_id, 'full', 'w-full h-auto py-4');
					endif; ?>

					<?php if (get_the_excerpt()) : ?>
						<div class="font-semibold preamble">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>

					<?php get_author(get_the_ID(), 'date', 'medium', 'border-t border-b'); ?>

				</header>

				<div class="entry-content">
					<?php the_content() ?>
				</div>

				<?php get_template_part('components/post', 'footer'); ?>
			</div>

		</div>
	</article>
</main>
<?php

get_footer();
