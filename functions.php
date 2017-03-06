<?php
/**
 * CarePanda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CarePanda
 */

if ( ! function_exists( 'carepanda_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carepanda_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CarePanda, use a find and replace
	 * to change 'carepanda' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'carepanda', get_template_directory() . '/languages' );

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
		'main-menu' => esc_html__( 'Main Menu', 'carepanda' ),
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
	add_theme_support( 'custom-background', apply_filters( 'carepanda_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'carepanda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carepanda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carepanda_content_width', 640 );
}
add_action( 'after_setup_theme', 'carepanda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carepanda_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'carepanda' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'carepanda' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'carepanda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function carepanda_scripts() {

	wp_enqueue_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'google-font-raleyway', '//fonts.googleapis.com/css?family=Raleway' );
	wp_enqueue_style( 'google-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans' );

	wp_enqueue_style( 'carepanda-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-2.1.4.min.js?ver=4.4', array(), '1.0' );

	wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js?ver=4.4', array(), '1.0' );

	wp_enqueue_script( 'carepanda-script', get_template_directory_uri() . '/js/footer-script.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carepanda_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* Extend bootstrap menus for WP
* Register Custom Navigation Walker */
require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );

// Enable the use of shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

/*
* Favicon
=====================================*/
function carepanda_favicon() {
	if( get_theme_mod( 'simple_blog_favicon') != "" ):
	  echo '<link rel="Favicon Icon" href="'; echo get_theme_mod( "carepanda_favicon" ); echo '" type="image/ico" sizes="32x32"/>';
	else:
	  echo '<link rel="Favicon Icon" href="'; echo get_template_directory_uri(); echo '/img/ico/favicon.png" type="image/ico" sizes="32x32"/>';
	endif;
}
add_action( 'login_enqueue_scripts', 'carepanda_favicon' );
add_action('wp_head', 'carepanda_favicon');
add_action('admin_head', 'carepanda_favicon');