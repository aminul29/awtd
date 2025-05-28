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

<main id="primary" class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden mt-5">
            <?php
            while (have_posts()) :
                the_post();
            ?>
                <article class="prose max-w-none p-6 sm:p-8">
                    <?php
                    get_template_part('template-parts/content', 'page');
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                    ?>
                        <div class="mt-8 border-t border-gray-200 pt-8">
                            <?php comments_template(); ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </article>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
