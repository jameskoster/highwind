<?php
/**
 * Framework init
 * Loads options, template, functions, hooks
 * @package highwind
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


require_once( get_template_directory() . '/framework/highwind-functions.php' );
require_once( get_template_directory() . '/framework/highwind-template.php' );
require_once( get_template_directory() . '/framework/highwind-hooks.php' );
require_once( get_template_directory() . '/framework/highwind-options.php' );
require_once( get_template_directory() . '/framework/tha-theme-hooks.php' );