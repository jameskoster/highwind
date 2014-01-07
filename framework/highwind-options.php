<?php
/**
 * Contains the Highwind Options class and other options functions
 * @package highwind
 * @since 1.0
 * @link http://codex.wordpress.org/Theme_Customization_API
 */


/**
 * Options Class
 */
class HighwindOptions {

    /**
     * Registers the settings with WordPress.
     *
     * Used by hook: 'customize_register'
     *
     * @see add_action('customize_register',$func)
     * @param WP_Customize_Manager $wp_customize
     */
    public static function highwind_register( $wp_customize ) {
        /**
         * Theme Option Defaults
         */
        // Layout Default
        $wp_customize->add_setting( 'highwind_theme_options[theme_layout]', array(
            'type'              => 'option',
            'default'           => apply_filters( 'highwind_layout_default', 'sidebar-content' ),
            'sanitize_callback' => 'sanitize_key',
        ) );

        // Link Color Default
        $wp_customize->add_setting( 'link_textcolor', array(
                'default'       => apply_filters( 'highwind_link_textcolor_default', $color = '#53a1b8' )
        ) );

        // Heading Color Default
        $wp_customize->add_setting( 'headercolor', array(
                'default'       => apply_filters( 'highwind_headercolor_default', $color = '#444854' )
        ) );

        // Text Color Default
        $wp_customize->add_setting( 'textcolor', array(
                'default'       => apply_filters( 'highwind_textcolor_default', $color = '#666A76' )
        ) );

        // Background Color Default
        $wp_customize->add_setting( 'background_color', array(
                'default'       => apply_filters( 'highwind_background_color_default', $color = '#f8f8f9' )
        ) );

        // Background Color Default
        $wp_customize->add_setting( 'content_background_color', array(
                'default'       => apply_filters( 'highwind_content_background_color_default', $color = '#f8f8f9' )
        ) );


        /**
         * Theme Option Sections
         */

        // Navigation Section
        $wp_customize->add_section( 'nav', array(
             'title'          => __( 'Navigation', 'highwind' ),
             'theme_supports' => 'menus',
             'priority'       => 100,
        ) );

        // Layout Section
        $wp_customize->add_section( 'highwind_layout', array(
            'title'    => __( 'Layout', 'highwind' ),
            'priority' => 50,
        ) );


        /**
         * Theme Option Controls
         */

        // Link Color Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_textcolor', array(
                'label'      => __( 'Link Color', 'highwind' ),
                'section'    => 'colors',
                'settings'   => 'link_textcolor',
        ) ) );

        // Heading Color Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headercolor', array(
                'label'      => __( 'Header Color', 'highwind' ),
                'section'    => 'colors',
                'settings'   => 'headercolor',
        ) ) );

        // Text Color Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'textcolor', array(
                'label'      => __( 'Text Color', 'highwind' ),
                'section'    => 'colors',
                'settings'   => 'textcolor',
        ) ) );

        // Background Color Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
                'label'      => __( 'Background Color', 'highwind' ),
                'section'    => 'colors',
                'settings'   => 'background_color',
        ) ) );

        // Content Background Color Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_background_color', array(
                'label'      => __( 'Content Background Color', 'highwind' ),
                'section'    => 'colors',
                'settings'   => 'content_background_color',
        ) ) );

        // Layout Control
        $layouts = highwind_layouts();
        $choices = array();
        foreach ( $layouts as $layout ) {
            $choices[$layout['value']] = $layout['label'];
        }
        $wp_customize->add_control( 'highwind_theme_options[theme_layout]', array(
            'section'    => 'highwind_layout',
            'type'       => 'radio',
            'choices'    => $choices,
        ) );
    }


    /**
     * This will output the custom WordPress settings to the theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     */
    public static function highwind_render() {
        ?>
        <!--Customizer CSS-->
        <style type="text/css">
                <?php
                    // Link color applied to color
                    self::generate_css( apply_filters( 'highwind_link_color_color_selectors', $selectors = 'a' ), 'color', 'link_textcolor' );

                    // Link color applied to background
                    self::generate_css( apply_filters( 'highwind_link_color_background_selectors', $selectors = 'input[type="submit"], .button, input[type="button"], .navigation-post a, .navigation-paging a, .header, .comments .bypostauthor > .comment-body .comment-content' ), 'background-color', 'link_textcolor' );

                    // Text color applied to color
                    self::generate_css( apply_filters( 'highwind_text_color_color_selectors', $selectors = 'body, input[type="text"], input[type="password"], input[type="email"], input[type="search"], input.input-text, textarea' ), 'color', 'textcolor' );

                    // Link color applied to border-color
                    self::generate_css( apply_filters( 'highwind_link_color_border_color_selectors', $selectors = '.comments .bypostauthor > .comment-body .comment-content:after' ), 'border-bottom-color', 'link_textcolor' );

                    // Text color applied to background
                    self::generate_css( apply_filters( 'highwind_text_color_background_selectors', $selectors = 'hr, input[type="checkbox"], input[type="radio"]' ), 'background', 'textcolor' );

                    // Text color applied to border color
                    self::generate_css( apply_filters( 'highwind_text_color_border_color_selectors', $selectors = 'input[type="radio"]' ), 'border-color', 'textcolor' );

                    // Header color applied to color
                    self::generate_css( apply_filters( 'highwind_header_color_color_selectors', $selectors = 'h1, h2, h3, h4, h5, h6, .alpha, .beta, .gamma, .delta, .page-title, .post-title' ), 'color', 'headercolor' );

                    // Content Background color applied to color
                    self::generate_css( apply_filters( 'highwind_background_color_color_selectors', $selectors = 'input[type="submit"], .button, input[type="button"], .navigation-post a, .navigation-paging a, input[type="checkbox"]:before, input[type="checkbox"]:checked:before, .comments .bypostauthor > .comment-body .comment-content, .comments .bypostauthor > .comment-body .comment-content a' ), 'color', 'content_background_color' );

                    // Content Background color applied to border-color
                    self::generate_css( apply_filters( 'highwind_background_color_border_color_selectors', $selectors = '.comments .comment-content:after' ), 'border-bottom-color', 'content_background_color' );

                    // Content Background color applied to background
                    self::generate_css( apply_filters( 'highwind_content_background_color_background_selectors', $selectors = '.inner-wrap, .main-nav' ), 'background-color', 'content_background_color' );
                ?>
                @media only screen and (min-width: 769px) {
                    /* Styles only applied to desktop */
                    <?php
                        // Link color applied to background
                        self::generate_css( apply_filters( 'highwind_desktop_link_color_background_selectors',  $selectors = '.main-nav ul.menu ul, .main-nav ul.menu > li:hover > a, .main-nav ul.menu > li > a:hover' ), 'background', 'link_textcolor' );

                        // Link color applied to color
                        self::generate_css( apply_filters( 'highwind_desktop_link_color_background_selectors',  $selectors = '.main-nav ul.menu li.current-menu-item > a' ), 'color', 'link_textcolor', '#' );

                        // Link color applied to border-color
                        self::generate_css( apply_filters( 'highwind_desktop_link_color_border_color_selectors',  $selectors = '.main-nav' ), 'border-color', 'link_textcolor' );

                        // Link color applied to border-bottom-color
                        self::generate_css( apply_filters( 'highwind_desktop_link_color_border_color_selectors',  $selectors = '.main-nav ul.menu li.current-menu-item > a:before' ), 'border-bottom-color', 'link_textcolor' );

                        // Content Background color applied to color
                        self::generate_css( apply_filters( 'highwind_desktop_background_color_color_selectors', $selectors = '.main-nav ul.menu ul a, .main-nav ul.menu > li:hover > a' ), 'color', 'content_background_color', '#' );

                        // Background color applied to background
                        self::generate_css( apply_filters( 'highwind_desktop_background_color_background_selectors', $selectors = 'body' ), 'background-color', 'background_color', '#' );
                    ?>
                }
        </style>
        <!--/Customizer CSS-->
        <?php
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * A custom helper function used within this class to keep code clean.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS property to modify
     * @param string $mod_name The name of the theme_mod option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since 1.0
     */
    public static function generate_css($selector,$style,$mod_name,$prefix='',$postfix='',$echo=true) {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if ( ! empty( $mod ) )
        {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix.$mod.$postfix
            );
            if ( $echo )
            {
                echo $return;
            }
        }
        return $return;
    }

}


/**
 * Custom background
 * @var default background color
 */
function highwind_custom_background() {
    $args = array(
        'default-color' => apply_filters( 'highwind_background_color_default', $color = '#f8f8f9' )
    );
    add_theme_support( 'custom-background', $args );
}


/**
 * Returns the options array for Highwind.
 *
 * @since 1.0
 */
function highwind_get_theme_options() {
    return get_option( 'highwind_theme_options', highwind_get_default_theme_options() );
}


/**
 * Returns the default options for Highwind layout.
 *
 * @since 1.0
 */
function highwind_get_default_theme_options() {
    $default_theme_options = array(
        'theme_layout'      => apply_filters( 'highwind_layout_default', $layout = 'content-sidebar' ),
    );

    if ( is_rtl() )
        $default_theme_options['theme_layout'] = apply_filters( 'highwind_layout_default', 'sidebar-content' );

    return apply_filters( 'highwind_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of layout options registered for Highwind.
 *
 * @since 1.0
 */
function highwind_layouts() {
    $layout_options = array(
        'content-sidebar' => array(
            'value' => 'content-sidebar',
            'label' => __( 'Content on left', 'highwind' ),
        ),
        'sidebar-content' => array(
            'value' => 'sidebar-content',
            'label' => __( 'Content on right', 'highwind' ),
        ),
    );

    return apply_filters( 'highwind_layouts', $layout_options );
}


/**
 * Adds Highwind layout classes to the array of body classes.
 *
 * @since 1.0
 */
function highwind_layout_classes( $existing_classes ) {
    $options                    = highwind_get_theme_options();
    $current_layout             = $options['theme_layout'];
    $background_color           = str_replace( '#', '', get_theme_mod( 'background_color' ) );
    $content_background_color   = str_replace( '#', '', get_theme_mod( 'content_background_color' ) );

    if ( in_array( $current_layout, array( 'content-sidebar', 'sidebar-content' ) ) )
        $classes = array( 'two-column' );
    else
        $classes = array( 'one-column' );

    if ( 'content-sidebar' == $current_layout )
        $classes[] = 'content-sidebar';
    elseif ( 'sidebar-content' == $current_layout )
        $classes[] = 'sidebar-content';
    else
        $classes[] = $current_layout;

    if ( $background_color == $content_background_color ) {
        $classes[] = 'no-background-contrast';
    } else {
        $classes[] = 'background-contrast';
    }

    $classes = apply_filters( 'highwind_layout_classes', $classes, $current_layout );

    return array_merge( $existing_classes, $classes );
}