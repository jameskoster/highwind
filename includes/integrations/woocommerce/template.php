<?php

/**
 * Replacing the default WooCommerce wrapper
 * @since 1.1.0
 */
function highwind_woocommerce_content_wrapper() {
	?>
		<?php highwind_content_before(); ?>

		<section class="content" role="main">

			<?php highwind_content_top(); ?>
	<?php
}


/**
 * Replacing the default WooCommerce wrapper
 * @since 1.1.0
 */
function highwind_woocommerce_content_wrapper_end() {
	?>
			<?php highwind_content_bottom(); ?>

		</section><!-- /.content -->

		<?php highwind_content_after(); ?>
	<?php
}


/**
 * Display upsells in 3 columns
 * @since 1.1.0
 */
function woocommerce_upsell_display() {
    woocommerce_upsell_display( -1, 3 );
}


/**
 * Display products in 3 columns
 * @since 1.1.0
 */
function highwind_woocommerce_product_columns( $columns ) {
	$columns = apply_filters( 'highwind_woocommerce_products_per_row', 3 );
	return $columns;
}


/**
 * Display 3 related products in 3 columns
 * @since 1.1.0
 */
function highwind_woocommerce_related_products( $args ) {
	$args = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);
	return $args;
}


/**
 * Ensures the cart link updates when products are added to the cart via AJAX
 * @since 1.1.0
 */
function highwind_woocommerce_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	echo '<a href="' . $woocommerce->cart->get_cart_url() . '" title="' . __( 'View your cart', 'highwind' ) . '" class="cart-button">' . $woocommerce->cart->get_cart_total() . ' &ndash; <small>' . sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'hit' ), $woocommerce->cart->cart_contents_count ) . '</small></a>';

	$fragments['a.cart-button'] = ob_get_clean();

	return $fragments;

}


/**
 * Displays the product search in the header if the options specify it
 * @since 1.1.0
 */
function highwind_woocommerce_product_search() {
	$options 			= get_option( 'highwind_woocommerce_options' );
	$header_search 		= $options['header_search'];
	if ( $header_search && ! is_checkout() ) {
		echo '<div class="highwind-product-search">';
			get_product_search_form();
		echo '</div>';
	}
}