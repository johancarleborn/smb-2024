<?php

/**
 * The template for displaying archive pages
 *
 * @package lightning
 */
$post_type = get_post_type();
$found_posts = $wp_query->found_posts;
get_header();
?>

<main id="primary" class="site-main">

	<?php if (have_posts()) : ?>

		<header class="py-4 lg:py-8 page-header">
			<div class="container">
				<h1 class="page-title"><?= the_archive_title(); ?></h1>
				<div class="archive-description"><?= the_archive_description(); ?></div>
			</div>
		</header>

		<div class="container">
			<div class="grid-cols-4 gap-4 md:grid lg:gap-6 post-listing">
				<?php while (have_posts()) :
					the_post();
					if ('post' === $post_type) : ?>
						<?= post_card(get_the_ID(), 'bg-white text-black', '!px-0', 10); ?>
					<?php else :
						get_template_part('template-parts/content', $post_type);
					endif; ?>
				<?php endwhile; ?>
			</div>
			<?php
			if ($found_posts > 12) : ?>
				<div class="flex justify-center my-8">
					<?= btn_load_more($post_type, 'cat', '', '!px-0') ?>
				</div>
			<?php
			endif; ?>
		</div>

	<?php
	else :

		get_template_part('template-parts/content', 'none'); ?>
	<?php endif; ?>
</main>

<?php
get_sidebar();
get_footer();
