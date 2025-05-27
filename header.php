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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white'); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="min-h-screen flex flex-col">

        <header id="masthead" class="sticky top-0 z-50 bg-white shadow-md">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between py-4">
                    <div class="site-branding flex-shrink-0">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        }
                        if (is_front_page() && is_home()) :
                        ?>
                            <h1 class="site-title text-2xl font-bold">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-900 hover:text-blue-600 transition-colors" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title text-2xl font-bold mb-0">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-900 hover:text-blue-600 transition-colors" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </p>
                        <?php
                        endif;
                        $awtd_description = get_bloginfo('description', 'display');
                        if ($awtd_description || is_customize_preview()) :
                        ?>
                            <p class="site-description text-sm text-gray-600 mb-0">
                                <?php echo $awtd_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <nav id="site-navigation" class="main-navigation ml-auto">
                        <button class="menu-toggle lg:hidden px-4 py-2 bg-gray-100 rounded-md hover:bg-gray-200"
                            aria-controls="primary-menu"
                            aria-expanded="false">
                            <?php esc_html_e('Primary Menu', 'awtd'); ?>
                        </button>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'hidden lg:flex items-center justify-end space-x-6 text-gray-700',
                                'container'      => false,
                            )
                        );
                        ?>
                    </nav>
                </div>
            </div>
        </header>