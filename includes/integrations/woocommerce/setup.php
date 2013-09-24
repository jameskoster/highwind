<?php
/**
 * Contains code which makes Highwind compatible with WooThemes' WooCommerce eCommerce plugin.
 * http://www.woothemes.com/woocommerce/
 * @since  1.1.0
 */

// Declare WooCommerce support
add_action( 'after_setup_theme', 'highwind_supports_woocommerce' );


// Add options to the customizer
add_action( 'customize_register', 'highwind_woocommerce_customize_register' );


// Prepare WooCommerce, fix the layout etc
add_action( 'wp', 'highwind_woocommerce_prep' );


// Add the fullwidth class to the body tag if specified in the options
add_filter( 'body_class', 'highwind_woocommerce_layout_classes' );


// Header cart functions
add_filter( 'wp_nav_menu_items', 'highwind_woocommerce_header_cart', 10, 2 );
add_filter( 'add_to_cart_fragments', 'highwind_woocommerce_cart_fragment' );


// Product search functions
add_action( 'highwind_content_before', 'highwind_woocommerce_product_search' );


// Add style
add_action( 'wp_enqueue_scripts', 'highwind_woocommerce_setup_styles', 999 );