<?php
/**
 * odierlite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package odierlite
 */

if ( ! function_exists( 'odierlite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function odierlite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on odierlite, use a find and replace
	 * to change 'odierlite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'odierlite', get_template_directory() . '/languages' );

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
	add_image_size( 'odierlite-full-thumb', 650, 0, true );
	add_image_size( 'odierlite-slider-thumb', 900, 600, true );
	add_image_size( 'odierlite-thumb', 440, 294, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'odierlite' ),
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
	add_theme_support( 'custom-background', apply_filters( 'odierlite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add Logo
	add_theme_support( 'custom-logo', array(
		'height'      => 165,
		'width'       => 420,
		'flex-height' => true,
	) );

}
endif;
add_action( 'after_setup_theme', 'odierlite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function odierlite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'odierlite_content_width', 640 );
}
add_action( 'after_setup_theme', 'odierlite_content_width', 0 );

/**
 *
 * Add Custom editor styles
 *
 */
function odierlite_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'odierlite_add_editor_styles' );

/**
 *
 * Load Google Fonts
 *
 */
function odierlite_google_fonts_url(){

    $fonts_url  = '';
    $Raleway = _x( 'on', 'Raleway font: on or off', 'odierlite' );
    $CrimsonText      = _x( 'on', 'CrimsonText font: on or off', 'odierlite' );
 
    if ( 'off' !== $Raleway || 'off' !== $CrimsonText ){

        $font_families = array();
 
        if ( 'off' !== $Raleway ) {

            $font_families[] = 'Raleway:400,300,500,600,700';

        }
 
        if ( 'off' !== $CrimsonText ) {

            $font_families[] = 'Crimson Text:400,700';

        }
        
 
        $query_args = array(

            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    }
 
    return esc_url_raw( $fonts_url );
}

function odierlite_enqueue_googlefonts() {

    wp_enqueue_style( 'odierlite-googlefonts', odierlite_google_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'odierlite_enqueue_googlefonts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function odierlite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'odierlite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'odierlite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'odierlite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function odierlite_scripts() {
	wp_enqueue_style( 'odierlite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'odierlite-font-awesome-css', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'odierlite-owl-css', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style( 'odierlite-owl-theme-css', get_template_directory_uri() . '/css/owl.theme.css');

	wp_enqueue_script( 'odierlite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'odierlite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'odierlite-owl', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), false, true);
	wp_enqueue_script( 'odierlite-script', get_template_directory_uri() . '/js/odierlite.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( function_exists( 'odierlite_get_custom_style' ) ) {
        wp_add_inline_style( 'odierlite-style', odierlite_get_custom_style() );
    }
}
add_action( 'wp_enqueue_scripts', 'odierlite_scripts' );

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

/**
 * Add theme info page
 */
require get_template_directory() . '/inc/dashboard.php';