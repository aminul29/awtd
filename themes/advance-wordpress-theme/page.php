<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package awtd
 */

get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="p-6 sm:p-8">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    echo '<div class="mt-8 border-t border-gray-200 pt-8">';
                    comments_template();
                    echo '</div>';
                endif;

            endwhile;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
