<?php

if ( ! isset( $content_width ) ) {
	$content_width = 750;
}

define( 'TDOMAIN', 'cleanblog' );

function cleanblog_setup() {

	load_theme_textdomain( TDOMAIN, get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	register_nav_menu( 'primary', __( 'Primary Menu', TDOMAIN ) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1900, 9999 );

	$args = array(
		'default-image'          => get_template_directory_uri() . '/img/home-bg.jpg',
		'width'                  => 1900,
		'height'                 => 872,
		'flex-height'            => true,
		'header-text'            => false,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'cleanblog_setup' );

if ( ! function_exists( 'cleanblog_content_nav' ) ) :

function cleanblog_content_nav() {

	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="pager">
			<?php if ( get_next_posts_link() ) : ?>
            <li class="next"><?php next_posts_link( __( 'Older Posts &rarr;', TDOMAIN ) ); ?></li>
        	<?php endif; ?>

        	<?php if ( get_previous_posts_link() ) : ?>
            <li class="previous"><?php previous_posts_link( __( '&larr; Newer Posts', TDOMAIN ) ); ?></li>
        	<?php endif; ?>
        </ul>
	<?php endif;
}
endif;

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Clean Blog 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function cleanblog_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', TDOMAIN ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'cleanblog_wp_title', 10, 2 );

function cleanblog_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Clean_Blog_Social_Widget' );

	register_sidebar( array(
		'name'          => __( 'Social Widget Area', TDOMAIN ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Display Social icons in the footer section of the site. Drag only "Clean Blog Social" widget here.', TDOMAIN ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'cleanblog_widgets_init' );

function cleanblog_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'cleanblog_excerpt_more' );

function cleanblog_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cleanblog_scripts' );

require get_template_directory() . '/inc/customizer.php';