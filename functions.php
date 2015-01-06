<?php
/**
 * Clean Blog functions and definitions
 *
 * @package Clean Blog
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'clean_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clean_blog_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Clean Blog, use a find and replace
	 * to change 'cleanblog' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cleanblog', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1900, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cleanblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
}
endif; // clean_blog_setup
add_action( 'after_setup_theme', 'clean_blog_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function clean_blog_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Clean_Blog_Social_Widget' );

	register_sidebar( array(
		'name'          => __( 'Social Widget Area', 'cleanblog' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Display Social icons in the footer section of the site. Drag only "Clean Blog Social" widget here.', TDOMAIN ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'clean_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clean_blog_scripts() {
	wp_enqueue_style( 'cleanblog-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'clean-blog-style', get_stylesheet_uri() );

	wp_enqueue_style( 'cleanblog-font-awesome-style', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'cleanblog-font-lora', 'http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' );

	wp_enqueue_style( 'cleanblog-font-opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );

	wp_enqueue_script( 'cleanblog-jquery', get_template_directory_uri() . '/js/jquery.js', array(), '', true );

	wp_enqueue_script( 'cleanblog-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );

	if ( is_page_template( 'page-templates/contact.php' ) ) {
		wp_enqueue_script( 'cleanblog-js', get_template_directory_uri() . '/js/clean-blog.js', array(), '', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clean_blog_scripts' );

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
