<?php
/**
 * Clean Blog Theme Customizer
 *
 * @package Clean Blog
 */

function cleanblog_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'contact_page', array(
		'title'       => __( 'Contact Page', 'cleanblog' ),
		'description' => __( "Add your email address where the form will send a message to. Create a page and set the page template to 'Contact Page'. WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally!", TDOMAIN ),
		'priority' => 1
	) );

	$wp_customize->add_setting( 'email', array(
		'default'           => '',
		'type' 				=> 'theme_mod',
		'transport' 		=> 'refresh',
		'sanitize_callback' => 'is_email',
	) );

	$wp_customize->add_control( 'email', array(
		'label'   => __( 'Your Email Address', 'cleanblog' ),
		'section' => 'contact_page',
		'type'    => 'text',
	) );
}
add_action( 'customize_register', 'cleanblog_customize_register' );
