<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awtd
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-50'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site min-h-screen flex flex-col">
	<a class="skip-link screen-reader-text sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'advance-wordpress-theme' ); ?></a>

	<header id="masthead" class="site-header bg-white shadow-md">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
			<div class="flex justify-between items-center">
				<div class="site-branding flex items-start text-left space-x-4 flex-col">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title text-2xl font-bold text-gray-900"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-blue-600 transition-colors" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title text-2xl font-bold text-gray-900"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-blue-600 transition-colors" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$advance_wordpress_theme_description = get_bloginfo( 'description', 'display' );
					if ( $advance_wordpress_theme_description || is_customize_preview() ) :
						?>
						<p class="site-description text-sm text-gray-600"><?php echo $advance_wordpress_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle lg:hidden px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e( 'Primary Menu', 'advance-wordpress-theme' ); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'hidden lg:flex space-x-8 text-gray-700',
							'container_class' => 'primary-menu-container',
							'li_class'       => 'hover:text-blue-600 transition-colors',
						)
					);
					?>
				</nav>
			</div>
		</div>
	</header><!-- #masthead -->
