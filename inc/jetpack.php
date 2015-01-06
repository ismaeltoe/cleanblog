<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Clean Blog
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function cleanblog_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'cleanblog_jetpack_setup' );
