<?php
$footer_copyright =
	get_field('footer_copyright', 'options') ?
	get_field('footer_copyright', 'options') :
	'&copy; ' . date('Y') . ' ' . get_bloginfo('name') . ' - Alla rättigheter förbehållna';
?>

<footer class="py-6 site-footer md:py-9 xl:py-16 bg-slate-100">
	<div class="container">
		<div class="grid grid-cols-2 gap-x-4 gap-y-6 lg:grid-cols-4 sm:gap-12">

			<div class="col-span-2 footer-col md:col-span-1">
				<?php if (globalACF()['footer_logo']) : ?>
					<div class="footer-logo max-w-72">
						<?php image(globalACF()['footer_logo'], 'full'); ?>

						<?php if (globalACF()['footer_logo_dark']) : ?>
							<?php image(globalACF()['footer_logo_dark'], 'full hidden'); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<div>
				<?php if (globalACF()['footer_text_title']) : ?>
					<h2 class="pt-2 mb-0 text-lg tracking-normal text-black font-manrope footer-col-title md:mb-3">
						<?= globalACF()['footer_text_title']; ?>
					</h2>
				<?php endif; ?>

				<?php if (globalACF()['footer_text']) : ?>
					<div class="mt-2 text-black footer-text text *:text-sm *:font-manrope lg:mt-4">
						<?= globalACF()['footer_text']; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if (have_rows('footer_col_repeater', 'options')) : ?>

				<?php while (have_rows('footer_col_repeater', 'options')) : the_row();
					$title = get_sub_field('footer_col_title', 'options');
					$qty = count(get_field('footer_col_repeater', 'options'));
				?>

					<div class="pb-2 footer-col md:border-none">
						<?php if ($title) : ?>
							<h2 class="pt-2 mb-0 text-lg tracking-normal text-black font-manrope footer-col-title md:mb-3"><?= $title; ?></h2>
						<?php endif; ?>

						<?php if (have_rows('footer_col_links', 'options')) : ?>
							<ul class="pt-2 m-0">
								<?php while (have_rows('footer_col_links', 'options')) : the_row();
									$link = get_sub_field('footer_col_link');
									$icon = get_sub_field('icon');

									if ($link) : ?>
										<li class="mb-2">
											<a class="inline-flex items-center text-sm text-black lg:hover:underline lg:hover:text-cta-hover active:text-cta-active footer-col-link gap-x-2" href="<?= $link['url']; ?>">
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
		</div>
	</div>

	<?php if (have_rows('footer_col_social_media', 'options')) : ?>

		<div class="container">

			<ul class="flex items-center gap-4 py-12 sm:justify-center">
				<?php while (have_rows('footer_col_social_media', 'options')) : the_row();
					extract(acf_sub_fields(['footer_col_link', 'footer_col_icon']));
				?>
					<?php if ($footer_col_link) : ?>
						<li class="mb-2">
							<a class="flex items-center justify-start text-base lg:hover:underline lg:hover:text-cta-hover active:text-cta-active footer-col-link" href="<?= $footer_col_link['url']; ?>" target="<?= $footer_col_link['target']; ?>" title="<?= $footer_col_link['title']; ?>">
								<?php if ($footer_col_icon) : ?>
									<?= $footer_col_icon ?>
								<?php endif; ?>

								<span class="ml-2 text-black">
									<?= $footer_col_link['title']; ?>
								</span>
							</a>
						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>

		</div>

	<?php endif; ?>

	<div class="pt-4 text-sm border-t border-t-gray-100">
		<div class="container">
			<div class="flex justify-between gap-4">

				<?php if (have_rows('footer_legal_links', 'option')) : ?>

					<div class="flex items-center gap-4 md:gap-6 lg:gap-8">
						<?php while (have_rows('footer_legal_links', 'option')) : the_row();
							$link = get_sub_field('link');
							if ($link) : ?>
								<a class="text-black lg:hover:text-cta-hover active:text-cta-active lg:hover:underline" href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" title="<?= $link['title']; ?>">
									<?= $link['title']; ?>
								</a>
						<?php endif;
						endwhile; ?>
					</div>

				<?php endif; ?>

				<?php if ($footer_copyright) : ?>
					<?= $footer_copyright ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

</footer>
</div><!-- #page -->

<?php
popup();
wp_footer(); ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>