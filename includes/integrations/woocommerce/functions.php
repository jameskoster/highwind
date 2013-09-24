<?php

/**
 * Declare WooCommerce support (hides warning messages in the admin)
 * @since  1.1.0
 */
function highwind_supports_woocommerce() {
	add_theme_support( 'woocommerce' );
}


/**
 * Hooks into the Customizer to add WooCommerce specific options
 * @since  1.1.0
 */
function highwind_woocommerce_customize_register( $wp_customize ){
    // WooCommerce Section
    $wp_customize->add_section( 'highwind_woocommerce', array(
        'title'    => __( 'WooCommerce', 'hit' ),
        'priority' => 200,
    ) );

    // WooCommerce Options
    // Header Cart
    $wp_customize->add_setting( 'highwind_woocommerce_options[header_cart]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control( 'highwind_woocommerce_header_cart', array(
        'label'      => __( 'Display Header Cart', 'hit' ),
        'section'    => 'highwind_woocommerce',
        'settings'   => 'highwind_woocommerce_options[header_cart]',
        'type'       => 'checkbox',
    ));

    // Header Search
    $wp_customize->add_setting( 'highwind_woocommerce_options[header_search]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control( 'highwind_woocommerce_header_search', array(
        'label'      => __( 'Display Header Product Search', 'hit' ),
        'section'    => 'highwind_woocommerce',
        'settings'   => 'highwind_woocommerce_options[header_search]',
        'type'       => 'checkbox',
    ));

    // Archive Full Width
    $wp_customize->add_setting( 'highwind_woocommerce_options[archive_fullwidth]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control( 'highwind_woocommerce_archive_fullwidth', array(
        'label'      => __( 'Archives Full Width?', 'hit' ),
        'section'    => 'highwind_woocommerce',
        'settings'   => 'highwind_woocommerce_options[archive_fullwidth]',
        'type'       => 'checkbox',
    ));

    // Product Details Full Width
    $wp_customize->add_setting( 'highwind_woocommerce_options[details_fullwidth]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control( 'highwind_woocommerce_details_fullwidth', array(
        'label'      => __( 'Product Details Full Width?', 'hit' ),
        'section'    => 'highwind_woocommerce',
        'settings'   => 'highwind_woocommerce_options[details_fullwidth]',
        'type'       => 'checkbox',
    ));
}


/**
 * WooCommerce Prep
 * Removes content wrappers and other unnecessary functions etc then hooks in replacements
 * @since 1.1.0
 */
function highwind_woocommerce_prep() {
	$options 			= get_option( 'highwind_woocommerce_options' );
	$archive_fullwidth 	= $options['archive_fullwidth'];
	$details_fullwidth 	= $options['details_fullwidth'];

	// Remove
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	if ( $details_fullwidth && is_product() ) {
		remove_action( 'highwind_content_after', 'highwind_sidebar' );
	}
	if ( ( is_shop() || is_product_category() || is_product_tag() || is_tax( 'product_brand' ) ) && $archive_fullwidth ) {
		remove_action( 'highwind_content_after', 'highwind_sidebar' );
	}
	if ( is_woocommerce() ) {
		remove_action( 'highwind_content_bottom', 'highwind_content_nav', 10 );
		remove_action( 'highwind_content_bottom', 'highwind_comments_template', 20 );
	}

	// Add
	add_action( 'woocommerce_before_main_content', 'highwind_woocommerce_content_wrapper', 10 );
	add_action( 'woocommerce_after_main_content', 'highwind_woocommerce_content_wrapper_end', 10 );
	add_action( 'woocommerce_after_single_product', 'woocommerce_output_product_data_tabs', 10 );
	add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20 );
	add_filter( 'loop_shop_columns', 'highwind_woocommerce_product_columns', 999 );
	add_filter( 'woocommerce_output_related_products_args', 'highwind_woocommerce_related_products' );

    // Dequeue WooCommerce stylesheet(s)
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
        // WooCommerce 2.1 or above is active
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    } else {
        // WooCommerce is less than 2.1
        define( 'WOOCOMMERCE_USE_CSS', false );
    }
}


/**
 * Applies to fullwidth class to the body tag if sepcified in the options
 * @since 1.1.0
 */
function highwind_woocommerce_layout_classes( $classes ) {
	$options 			= get_option( 'highwind_woocommerce_options' );
	$archive_fullwidth 	= $options['archive_fullwidth'];
	$details_fullwidth 	= $options['details_fullwidth'];

	if ( is_product() && $details_fullwidth ) {
		$classes[] = 'fullwidth';
	}

	if ( ( is_shop() || is_product_category() || is_product_tag() || is_tax( 'product_brand' ) ) && $archive_fullwidth ) {
		$classes[] = 'fullwidth';
	}

	return $classes;
}


/**
 * Adds the cart link to 'main' instance of wp_nav_menu
 * @since 1.1.0
 */
function highwind_woocommerce_header_cart( $items, $args ) {
	global $woocommerce;
	$options 			= get_option( 'highwind_woocommerce_options' );
	$header_cart 		= $options['header_cart'];
	$cart_link 			= '';

	if ( is_cart() ) {
		$current_menu_item = 'current-menu-item';
	} else {
		$current_menu_item = '';
	}

	if ( $args->theme_location == 'main' && $header_cart ) {
    	$cart_link = '<li class="cart-link ' . $current_menu_item . '"><a href="' . $woocommerce->cart->get_cart_url() . '" title="' . __( 'View your cart', 'hit' ) . '" class="cart-button">' . $woocommerce->cart->get_cart_total() . ' &ndash; <small>' . sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'hit' ), $woocommerce->cart->cart_contents_count ) . '</small></a></li>';
    }

    $items = $cart_link . $items;
    return $items;
}


/**
 * Enqueues the styles which ensure WooCommerce compatibility
 * @since 1.1.0
 */
function highwind_woocommerce_setup_styles() {
    wp_enqueue_style( 'highwind-woocommerce-styles', get_template_directory_uri() . '/includes/integrations/woocommerce/css/style.css' );
}