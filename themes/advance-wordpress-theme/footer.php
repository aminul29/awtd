<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awtd
 */

?>

    <footer id="colophon" class="site-footer bg-gray-900 text-gray-300 py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-white">About Us</h3>
                    <p class="text-sm leading-relaxed">
                        <?php echo get_bloginfo('description'); ?>
                    </p>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-white">Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'menu_class' => 'space-y-2 text-sm',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-white">Contact</h3>
                    <div class="text-sm space-y-2">
                        <p>Email: info@example.com</p>
                        <p>Phone: (123) 456-7890</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-sm">
                        <a href="<?php echo esc_url(__('https://wordpress.org/', 'advance-wordpress-theme')); ?>" 
                           class="hover:text-blue-400 transition-colors duration-200">
                            <?php printf(esc_html__('Proudly powered by %s', 'advance-wordpress-theme'), 'WordPress'); ?>
                        </a>
                    </div>
                    <div class="text-sm">
                        <?php printf(esc_html__('Theme: %1$s by %2$s.', 'advance-wordpress-theme'),
                            'advance-wordpress-theme',
                            '<a href="http://mhdaminul.com" class="hover:text-blue-400 transition-colors duration-200">Md Aminul</a>'
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
