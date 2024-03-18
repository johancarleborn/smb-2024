<?php
$logo = get_field('footer_logo', 'options');
$logo_dark = get_field('footer_logo_dark', 'options');
$text = get_field('footer_text', 'options');
$social_media_text = get_field('footer_col_social_media_text', 'options');
$footer_copyright =
	get_field('footer_copyright', 'options') ?
	get_field('footer_copyright', 'options') :
	'&copy; ' . date('Y') . ' ' . get_bloginfo('name') . ' - Alla rättigheter förbehållna';
?>

<footer class="py-6 site-footer md:py-9 xl:py-16 bg-slate-100">
	<div class="container">
		<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 md:gap-6 lg:gap-12">
			<div class="footer-col">
				<?php if ($logo) : ?>
					<div class="footer-logo">
						<?php image($logo, 'full'); ?>

						<?php if ($logo_dark) : ?>
							<?php image($logo_dark, 'full hidden'); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ($text) : ?>
					<div class="mt-2 text-black footer-text lg:mt-4">
						<?= $text; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if (have_rows('footer_col_repeater', 'options')) : ?>

				<?php while (have_rows('footer_col_repeater', 'options')) : the_row();
					$title = get_sub_field('footer_col_title', 'options');
					$qty = count(get_field('footer_col_repeater', 'options'));
				?>

					<div class="pb-2 bg-white border border-gray-100 md:bg-transparent footer-col md:border-none">
						<?php if ($title) : ?>
							<h4 class="px-3 pt-2 mb-0 after:content-['\e5cf'] md:after:!content-none text-black footer-col-title md:mb-3 ac-header"><?= $title; ?></h4>
						<?php endif; ?>

						<?php if (have_rows('footer_col_links', 'options')) : ?>
							<ul class="hidden px-3 pt-2 m-0 md:block">
								<?php while (have_rows('footer_col_links', 'options')) : the_row();
									$link = get_sub_field('footer_col_link');
									$icon = get_sub_field('icon');

									if ($link) : ?>
										<li class="mb-2">
											<a class="inline-flex items-center text-black footer-col-link gap-x-2" href="<?= $link['url']; ?>">
												<?php if ($icon) : ?>
													<?= $icon; ?>
												<?php endif; ?>
												<?= $link['title']; ?>
											</a>
										</li>
								<?php
									endif;
								endwhile; ?>
							</ul>
						<?php endif; ?>

					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php if (have_rows('footer_col_social_media', 'options')) : ?>

				<div class="footer-col-so-me">

					<?php if (get_field('footer_title_social_media', 'options')) : ?>
						<h4 class="pt-2 mb-0 text-black footer-col-title md:mb-3">
							<?= get_field('footer_title_social_media', 'options'); ?>
						</h4>
					<?php endif; ?>

					<ul class="pt-3">
						<?php while (have_rows('footer_col_social_media', 'options')) : the_row();
							extract(acf_sub_fields(['footer_col_link', 'footer_col_icon']));
						?>
							<?php if ($footer_col_link) : ?>
								<li>
									<a class="flex items-center justify-start footer-col-link" href="<?= $footer_col_link['url']; ?>" target="<?= $footer_col_link['target']; ?>" title="<?= $footer_col_link['title']; ?>">
										<?php if ($footer_col_icon) : ?>
											<?= $footer_col_icon ?>
										<?php endif; ?>

										<span class="ml-1 text-black">
											<?= $footer_col_link['title']; ?>
										</span>
									</a>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>
					</ul>

					<?php if ($social_media_text) : ?>
						<div class="mt-4 text-black footer-text">
							<?= $social_media_text; ?>
						</div>
					<?php endif; ?>

				</div>
			<?php endif; ?>


		</div>
	</div>

	<?php if ($footer_copyright) : ?>
		<div class="pt-4 mt-4 text-sm border-t border-t-gray-100">
			<div class="container">
				<?= $footer_copyright ?>
			</div>
		</div>
	<?php endif; ?>

</footer>
</div><!-- #page -->
<?php
popup();
wp_footer(); ?>

</body>

</html>