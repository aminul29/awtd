<?php
/**
 * awtd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package awtd
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function advance_wordpress_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on awtd, use a find and replace
		* to change 'advance-wordpress-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'advance-wordpress-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'advance-wordpress-theme' ),
		)
	);

	// Add footer menu registration
	register_nav_menus(
		array(
			'footer-menu' => esc_html__( 'Footer Menu', 'advance-wordpress-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'advance_wordpress_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'advance_wordpress_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function advance_wordpress_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'advance_wordpress_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'advance_wordpress_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function advance_wordpress_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'advance-wordpress-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'advance-wordpress-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'advance_wordpress_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function advance_wordpress_theme_scripts() {
	wp_enqueue_style( 'advance-wordpress-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	// enqueue tailwind css
	wp_enqueue_style( 'advance-wordpress-theme-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), _S_VERSION );
	// enqueue owl carousel
	wp_enqueue_style( 'awtd-owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'awtd-owl-carousel-theme-css', get_template_directory_uri() . '/assets/css/owl.theme.default.css', array(), _S_VERSION );
	wp_style_add_data( 'advance-wordpress-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'advance-wordpress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	// enqueue owl carousel js
	wp_enqueue_script( 'awtd-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'advance_wordpress_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 *
 * Codestar Framework
 * A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 *
 */
require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';
require_once get_theme_file_path() .'/inc/metabox-and-options.php';


/**
 *
 * Testimonial Custom Post Type
 *
 */

function awtd_testimonial_meta_boxes(){
    add_meta_box(
        "testimonial_rating", // id 
        "Rating", // title
        "testimonial_rating_cb", // callback function
        "Testimonial", // post type
        "normal", // context
        "high" // priority

    );
}

function testimonial_rating_cb($post){
    $rating = get_post_meta($post->ID, "testimonial_rating", true);
    echo '<label for="testimonial_rating">Enter Your Rating for the Service </label>';
    echo '<input type="number" name="testimonial_rating" id="testimonial_rating" value="'. esc_attr($rating) .'" min="1" max="5">';
}

function save_testimonial_rating($post_id){
	if(array_key_exists("testimonial_rating", $_POST)){
		update_post_meta($post_id, "testimonial_rating", $_POST["testimonial_rating"]);
	}
}
add_action("save_post_testimonial", "save_testimonial_rating");

function awtd_testimonial(){
    register_post_type("Testimonial", [
        "labels" => [
            "name" => "Testimonials",
            "singular_name" => "Testimonial"
        ],

        "supports" => ["title", "editor", "thumbnail", "page-attributes", "author"],   

        "public" => true,
        "show_ui" => true,
        "register_meta_box_cb" => "awtd_testimonial_meta_boxes"
    ]);
}
add_action("init", "awtd_testimonial");



/**
 *
 * Slider Custom Post Type
 *
 */

function awtd_slider(){
	register_post_type('slide', [
		'labels' => [
			'name' => 'Sliders',
			'singular_name' => 'Slider'
		],
		'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
		'public' => true,
		'show_ui' => true
	]);
}
add_action("init", "awtd_slider");



// Check if elementor is active
if(in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    // if true
    include_once('elementor-addons/addons.php');

    //add admin notice
    function my_custom_admin_notice() {
        ?>
        <div class="notice notice-success is-dismissible">
            <p>Elementor is active. You can now use our Elementor Addons</p>
        </div>
        <?php
    }
    add_action('admin_notices', 'my_custom_admin_notice');
}else{
    // if false; Elementor is not active
    //add admin notice
    function my_custom_admin_notice() {
        ?>
        <div class="notice notice-error">
            <p>Elementor is not active. You cannot use our Elementor Addons</p>
        </div>
        <?php
    }
    add_action('admin_notices', 'my_custom_admin_notice');
}