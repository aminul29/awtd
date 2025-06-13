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

        <div class="my-12 px-4 md:px-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">What Our Clients Say</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php             
                        $testimonials = new WP_Query([
                            "post_type" => "Testimonial",
                            "posts_per_page" => -1,
                            "orderby" => "date",
                            "order" => "DESC"
                        ]);

                        if($testimonials->have_posts()) : 
                            while($testimonials->have_posts()) : $testimonials->the_post();
                                $rating = get_post_meta(get_the_ID(), "testimonial_rating", true);
                                $author = get_the_title();
                                $content = get_the_content();
                                ?>
                                
                                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
                                    <?php if($rating) : ?>
                                        <div class="flex mb-4">
                                            <?php for($i = 1; $i <= 5; $i++) : ?>
                                                <svg class="w-5 h-5 <?php echo $i <= $rating ? 'text-yellow-400' : 'text-gray-300'; ?>" 
                                                     fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mb-4">
                                        <p class="text-gray-600 italic"><?php echo wp_trim_words($content, 30); ?></p>
                                    </div>

                                    <div class="flex items-center">
                                        <?php if(has_post_thumbnail()) : ?>
                                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                                <?php the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <h3 class="font-semibold text-gray-900"><?php echo esc_html($author); ?></h3>
                                            <span class="text-sm text-gray-500"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        else: ?>
                            <div class="col-span-full text-center py-8">
                                <p class="text-gray-500">No testimonials found</p>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();
