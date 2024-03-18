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
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class('pt-12 sm:pt-[60px] md:pt-16 lg:pt-18'); ?>>
	<?php wp_body_open();
	?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'lightning'); ?></a>

		<header id="masthead" class="fixed top-0 z-[1001] w-full site-header bg-white">
			<div class="container">
				<?php get_template_part('components/navbar'); ?>
			</div>
		</header>
		<?php if (function_exists('yoast_breadcrumb')) : ?>
			<?php if (!is_front_page()) : ?>
				<div class="container">
					<?php yoast_breadcrumb('<nav class="breadcrumbs *:text-black/60 *:text-sm">', '</nav>'); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>