<?php
/**
 * organic food functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package organic_food
 */

if ( ! function_exists( 'organic_food_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function organic_food_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on organic food, use a find and replace
	 * to change 'organic-food' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'organic-food', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'organic-food' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'organic_food_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'organic_food_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function organic_food_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'organic_food_content_width', 640 );
}
add_action( 'after_setup_theme', 'organic_food_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function organic_food_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'organic-food' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'organic-food' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'organic_food_widgets_init' );

/**
 * Enqueue scripts and styles.
 */



function organic_food_scripts() {

	wp_enqueue_style( 'fs-style', get_stylesheet_uri() );


	//Add Slick slider CSS
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/vendor/slick-1.6.0/slick/slick.css' );
	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/vendor/slick-1.6.0/slick/slick-theme.css' );
	
	/*Add slick slider js*/
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/vendor/slick-1.6.0/slick/slick.js', array( 'jquery' ), '1', true );

	/* Add Foundation CSS */
	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation6/css/foundation.css' );
	wp_enqueue_style( 'foundation-app', get_stylesheet_directory_uri() . '/foundation6/css/app.css' );

	


	/* Add Foundation JS */
	//wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation6/js/vendor/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-modernizr-js', get_template_directory_uri() . '/foundation6/js/vendor/foundation.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-what-input-js', get_template_directory_uri() . '/foundation6/js/vendor/what-input.js', array( 'jquery' ), '1', true );
	

	/* Foundation Init JS */
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation6/js/app.js', array( 'jquery' ), '1', true );
	

	//UNDERSCORES
	wp_enqueue_script( 'fs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'organic_food_scripts' );

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
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function title_excerpt_length( $title ) {
	if (strlen($title)<=30)
	{
		return substr($title, 0, 20);
	}
	else
	{
		return substr($title, 0, 30).'.. Read more';
	}
}




require('admin-user-control/admin-for-landing-page.php');


//add css for admin page

function enqueue_styles()
{
	wp_enqueue_style( 'check161', get_stylesheet_directory_uri() . '/admin-user-control/css/admin.css' );
  	  
}


add_action( 'admin_enqueue_scripts', 'enqueue_styles');





