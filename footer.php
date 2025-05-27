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

<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">About Us</h3>
                <p class="text-gray-400 text-sm">Your trusted partner in web development and digital solutions.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Services</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Contact Us</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>123 Street Name</li>
                    <li>City, State 12345</li>
                    <li>Phone: (123) 456-7890</li>
                    <li>Email: info@example.com</li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Newsletter</h3>
                <p class="text-gray-400 text-sm">Subscribe to our newsletter for updates.</p>
                <form class="space-y-2">
                    <input type="email" class="w-full px-4 py-2 rounded bg-gray-800 text-white" placeholder="Email Address">
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>