<?php
/**
 * Highwind functions
 * @package highwind
 * @since 1.0
 */
/**
 * Setup Theme
 * Hooked into after_setup_theme()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_setup' ) ) {
	function highwind_setup() {
		apply_filters( 'highwind_header_args', $header_args = array(
			'header-text'	=> false,
			'width'			=> 2500,
			'height'		=> 600,
		) );

		// Navigation
		register_nav_menu( 'main', __( 'Main menu', 'highwind' ) );

		// Theme Support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-header', $header_args );
		add_theme_support( 'automatic-feed-links' );

		// Editor Styles
		add_action( 'init', 'highwind_add_editor_styles' );

		// Localisation
		load_theme_textdomain( 'highwind', get_template_directory() . '/languages' );

		// Content width
		if ( ! isset( $content_width ) ) $content_width = 1089;
	}
}


/**
 * Enqueue scripts
 * Hooked into wp_enqueue_scripts()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_add_scripts' ) ) {
	function highwind_add_scripts() {
		// Register styles
		wp_register_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' );

		// Enqueue styles
		wp_enqueue_style( 'highwind-styles', get_stylesheet_uri(), array( 'open-sans' ), '1.2.3' );

		// Enqueue Scripts
		wp_enqueue_script( 'highwind-plugins', get_template_directory_uri() . '/framework/js/plugins.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'highwind-script', get_template_directory_uri() . '/framework/js/script.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/framework/js/modernizr.min.js', array( 'jquery' ), '2.6.2' );
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/framework/js/fitvids.min.js', array( 'jquery' ), '1.0' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}


/**
 * Widget init
 * Hooked into widgets_init()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_widgets_init' ) ) {
	function highwind_widgets_init() {

		// The sidebar
	    register_sidebar( array(
	    	'name'          => __( 'Sidebar', 'highwind' ),
			'id'            => 'primary-sidebar',
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget' 	=> '</aside>',
		    'before_title' 	=> '<h2>',
		    'after_title' 	=> '</h2>',
		) );

		// The footer
		register_sidebar( array(
	    	'name'          => __( 'Footer #1', 'highwind' ),
			'id'            => 'footer-sidebar-1',
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget' 	=> '</aside>',
		    'before_title' 	=> '<h2>',
		    'after_title' 	=> '</h2>',
		) );
		register_sidebar( array(
	    	'name'          => __( 'Footer #2', 'highwind' ),
			'id'            => 'footer-sidebar-2',
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget' 	=> '</aside>',
		    'before_title' 	=> '<h1>',
		    'after_title' 	=> '</h1>',
		) );
		register_sidebar( array(
	    	'name'          => __( 'Footer #3', 'highwind' ),
			'id'            => 'footer-sidebar-3',
		    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		    'after_widget' 	=> '</aside>',
		    'before_title' 	=> '<h2>',
		    'after_title' 	=> '</h2>',
		) );
	}
}


/**
 * Move textarea above name / email / address in comment form
 * @since 1.0
 */
if ( ! function_exists( 'highwind_move_textarea' ) ) {
	function highwind_move_textarea( $input = array () ) {
	    static $textarea = '';

	    if ( 'comment_form_defaults' === current_filter() ) {
	        $textarea = $input['comment_field']; 	// Copy the field to our internal variable …
	        $input['comment_field'] = ''; 			// … and remove it from the defaults array.
	        return $input;
	    }

	    if ( is_singular( 'post' ) || is_page() ) {
			print $textarea;
		}
	}
}


/**
 * Get menu name
 * @since 1.0
 */
if ( ! function_exists( 'highwind_get_menu_name' ) ) {
	function highwind_get_menu_name( $location ){
	    if ( ! has_nav_menu( $location ) ) return false;
	    $menus 		= get_nav_menu_locations();
	    $menu_title = wp_get_nav_menu_object( $menus[$location] ) -> name;
	    return $menu_title;
	}
}


/**
 * Add editor styles
 * @since 1.0
 */
if ( ! function_exists( 'highwind_add_editor_styles' ) ) {
	function highwind_add_editor_styles() {
		add_editor_style( 'framework/css/editor-styles.css' );
	}
}


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 * @since 1.0
 */
if ( ! function_exists( 'highwind_wp_title' ) ) {
	function highwind_wp_title( $title, $sep ) {
		global $page, $paged;

		if ( is_feed() )
			return $title;

		// Add the blog name
		$title .= esc_attr( get_bloginfo( 'name' ) );

		// Add the blog description for the home/front page.
		$site_description = esc_attr( get_bloginfo( 'description', 'display' ) );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " $sep $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			$title .= " $sep " . sprintf( __( 'Page %s', 'highwind' ), max( $paged, $page ) );

		return $title;
	}
}


/**
 * Checks if WooCommerce is activated
 * @since 1.1
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}