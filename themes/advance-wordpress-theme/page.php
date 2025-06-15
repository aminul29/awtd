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

        <div class="my-12 px-4 md:px-8">
            <div class="max-w-7xl mx-auto">
                <?php 
                
                $slider = new WP_Query([
                    "post_type" => "slide",
                    "posts_per_page" => -1
                ]);

                $html = '
                    <script>
                        jQuery(document).ready(function($) {
                            $(".awtd-slide.owl-carousel").owlCarousel({
                                loop: true,
                                margin: 0,
                                nav: true,
                                dots: true,
                                autoplay: true,
                                autoplayTimeout: 5000,
                                autoplayHoverPause: true,
                                smartSpeed: 1000,
                                animateOut: "fadeOut",
                                items: 1,
                                navText: [
                                    \'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" /></svg>\',
                                    \'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z" clip-rule="evenodd" /></svg>\'
                                ],
                                responsive: {
                                    0: {
                                        nav: false
                                    },
                                    768: {
                                        nav: true
                                    }
                                }
                            });
                        });
                    </script>                
                ';

                $html .='
                    <div class="awtd-slider-wrap">
                        <div class="awtd-slide owl-carousel">';
                        
                        if($slider->have_posts()) :
                            
                            while($slider->have_posts()) : $slider->the_post();
                            $post_id = get_the_ID();

                            $slide_options = get_post_meta( $post_id, 'cs_slide_options', true );
            
                            // Get button text
                            if (isset($slide_options['slide_button_text'])) {
                                $button_text = $slide_options['slide_button_text'];
                            } else {
                                $button_text = '';
                            }

                            // Get button URL
                            if (isset($slide_options['slide_button_url'])) {
                                $button_url = esc_url($slide_options['slide_button_url']);
                            } else {
                                $button_url = '#';
                            }

                            // Get button target
                            if (isset($slide_options['slide_button_target']) && $slide_options['slide_button_target']) {
                                $button_target = '_blank';
                            } else {
                                $button_target = '_self';
                            }

                            // Only display the button if both text and URL are provided
                            $button_html = '';
                            if ( ! empty( $button_text ) && ! empty( $button_url ) ) {
                                $button_html = '
                                    <a href="' . $button_url . '" class="btn bg-indigo-600 text-white hover:bg-indigo-700 transition-colors py-2 px-4 rounded mt-4" target="' . $button_target . '">
                                        ' . $button_text . '
                                    </a>
                                ';
                            }

                            $html .='
                                <div class="slide-item relative">
                                    '.(has_post_thumbnail() ? get_the_post_thumbnail($post_id, 'full', ['class' => 'w-full h-auto']) : '').'
                                    <div class="slide-content absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                                        <h2>'. get_the_title() .'</h2>
                                        <div class="slide-description max-w-2xl">
                                            '. wp_trim_words(get_the_content(), 30) .'
                                        </div>
                                        '.$button_html.'
                                    </div>
                                </div>
                            ';

                            endwhile;
                            wp_reset_postdata();

                        else:
                            $html .='
                            <div class="col-span-full text-center py-8">
                                <p class="text-gray-500">No Slide found</p>
                            </div>';
                        endif;

                        $html .='
                        </div>
                    </div>
                ';
                echo $html;
                ?>
            </div> 
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

        <div class="p-6 sm:p-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-20">Recent Blog Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $blog_posts = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ]);

                if ($blog_posts->have_posts()) :
                    while ($blog_posts->have_posts()) : $blog_posts->the_post();
                        ?>
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="aspect-w-16 aspect-h-9">
                                    <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="p-4">
                                <div class="text-sm text-gray-500 mb-2">
                                    <?php echo get_the_date(); ?> • <?php echo get_the_category_list(', '); ?>
                                </div>
                                
                                <h2 class="text-xl font-semibold text-gray-900 mb-2">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-indigo-600 transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="text-gray-600 mb-4">
                                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <span class="text-gray-500">By </span>
                                            <span class="text-gray-900 font-medium"><?php the_author(); ?></span>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                        Read More →
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">No posts found</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();
