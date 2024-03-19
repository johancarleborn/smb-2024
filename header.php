<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lightning
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open();
	?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'lightning'); ?></a>

		<header id="masthead" class="sticky top-[-1px] h-14 lg:h-[72px] pt-[1px] z-[1001] w-full site-header transition-colors duration-300 flex items-center group/header [&.scrolled]:bg-white [&.scrolled]:shadow-md shadow-black/10">

			<!-- <header id="masthead" class="fixed top-0 z-[1001] w-full site-header bg-white"> -->
			<div class="container">
				<?php get_template_part('components/navbar'); ?>
			</div>
		</header>
		<?php if (function_exists('yoast_breadcrumb')) : ?>
			<?php if (!is_front_page()) : ?>
				<div class="container">
					<?php yoast_breadcrumb('<nav class="breadcrumbs font-manrope *:text-black/60 *:text-sm">', '</nav>'); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>