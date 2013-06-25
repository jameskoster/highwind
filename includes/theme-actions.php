<?php
/**
 * Highwind actions
 * Functions hooked into actions
 * @package highwind
 * @since 1.0
 */


/**
 * Setup / Init
 */
add_action( 'wp_enqueue_scripts',       		'highwind_add_scripts' );							// Highwind scripts
add_action( 'after_setup_theme',            	'highwind_setup' );									// Set up the theme
add_action( 'widgets_init',                 	'highwind_widgets_init' );							// Widgets


/**
 * Header
 */
add_action( 'highwind_header',                	'highwind_navigation_toggle', 10 );     			// Site title
add_action( 'highwind_header',                	'highwind_site_title', 20 );          				// Site title
add_action( 'highwind_header',                	'highwind_main_navigation', 30 );     				// Navigation
add_filter( 'wp_title',                     	'highwind_wp_title', 10, 2 );         				// Customise wp_title()


/**
 * Content
 */
add_action( 'highwind_content_bottom',   		'highwind_content_nav', 10 );         				// Post navigation
add_action( 'highwind_content_bottom',   		'highwind_comments_template', 20 );     			// Comments
add_action( 'highwind_content_header_top',		'highwind_post_date', 10 );							// Post date
add_action( 'highwind_entry_bottom', 			'highwind_post_meta', 10 );			 				// Post meta
add_action( 'highwind_content_entry_top',		'highwind_featured_image', 20 );					// Adds the featured image to the_content
add_action( 'highwind_content_after', 			'highwind_sidebar' );                 				// The sidebar


/**
 * Footer
 */
add_action( 'highwind_footer', 					'highwind_footer_widgets', 10 );					// Footer widgets
add_action( 'highwind_footer',                	'highwind_credit', 20 );         					// Credit link
add_action( 'highwind_footer',                	'highwind_back_to_top', 30 );         				// Back to top link


/**
 * Comments
 */
add_action( 'comment_form_defaults',        	'highwind_move_textarea' );           				// Re-arrange comment form (text area first)
add_action( 'comment_form_top',             	'highwind_move_textarea' );			 				// Re-arrange comment form (text area first)


/**
 * Options
 */
add_action( 'customize_register',   			array( 'HighwindOptions' , 'highwind_register' ) );	// Register the options
add_action( 'wp_head',              			array( 'HighwindOptions' , 'highwind_render' ) );	// Output the CSS
add_action( 'after_setup_theme',    			'highwind_custom_background' );						// Custom Background
add_filter( 'body_class',           			'highwind_layout_classes' );						// Layout classes based on options