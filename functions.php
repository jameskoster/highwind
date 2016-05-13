<?php
/**
 * Highwind functions and definitions
 * @package highwind
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Load Theme Actions
 */
require_once( get_template_directory() . '/includes/theme-actions.php' );


/**
 * Load Framework
 */
require_once( get_template_directory() . '/framework/highwind-init.php' );


/**
 * Integrations
 */
if ( is_woocommerce_activated() ) {
	require_once( get_template_directory() . '/includes/integrations/woocommerce/setup.php' );
	require_once( get_template_directory() . '/includes/integrations/woocommerce/functions.php' );
	require_once( get_template_directory() . '/includes/integrations/woocommerce/template.php' );
}
require_once( get_template_directory() . '/includes/integrations/jetpack/functions.php' );


/**
 * Custom Functions
 * Add any custom code below. To protect your changes during updates create a child theme instead.
 * http://codex.wordpress.org/Child_Themes
 */