<?php

/**
 * @package lightning
 */
$tags = get_the_tags();
$tags = join(', ', wp_list_pluck($tags, 'name'));
$featured_image_id = get_post_thumbnail_id();
$date = get_the_date();

get_header();

update_most_read(get_the_ID());
?>
<main id="primary" class="site-main">

	<article id="article-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="relative flex flex-col justify-end entry-header aspect-4/3 md:aspect-hero">

			<div class="relative mx-auto mb-6 md:mb-8 lg:mb-12 z-1 max-w-prose">

				<div class="flex items-center gap-2 mt-2 text-xs font-medium">
					<?php get_post_terms(get_the_ID(), 'category', '', 'text-pink-500'); ?>
					<span class="size-1.5 rounded-full shrink-0 bg-white"></span>
					<date class="text-white"><?= $date; ?></date>
				</div>

				<h1 class="text-white entry-title"><?php the_title(); ?></h1>

			</div>

			<?php if ($featured_image_id) :
				image($featured_image_id, 'full', 'absolute object-cover pointer-events-none w-full h-full left-0 top-0');
			endif; ?>

			<?php overlay(2, '!z-0') ?>
		</header>

		<div class="border-b border-b-gray-200">
			<div class="container py-2">
				<?php yoast_breadcrumb('<nav class="mx-auto w-full max-w-prose line-clamp-1 breadcrumbs font-manrope *:text-black/60 *:text-sm">', '</nav>'); ?>
			</div>
		</div>

		<div class="container">

			<div class="w-full mx-auto mt-6 max-w-prose md:mt-8 lg:mt-12">

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
