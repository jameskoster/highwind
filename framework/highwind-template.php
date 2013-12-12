<?php
/**
 * Highwind template functions
 * @package highwind
 * @since 1.0
 */

/**
 * Navigation Toggle
 * This anchor is used to skip to the navigation if no CSS is loaded and
 * to toggle the display of the navigation on small screens
 * @since 1.0
 * Hooked into highwind_header()
 */
if ( ! function_exists( 'highwind_navigation_toggle' ) ) {
	function highwind_navigation_toggle() {
		?>
		<p class="toggle-container">
			<a href="#navigation" class="nav-toggle button">
				<?php _e( 'Skip to navigation', 'highwind' ); ?>
			</a>
		</p>
		<?php
	}
}


/**
 * Site title
 * Displays the gravatar, site title and description
 * Hooked into highwind_header()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_site_title' ) ) {
	function highwind_site_title() {
		?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="site-intro">
				<?php
					do_action( 'highwind_site_title_link' );
					if ( apply_filters( 'highwind_header_gravatar', true ) ) {
						echo get_avatar( apply_filters( 'highwind_header_gravatar_email', $email = esc_attr( get_option( 'admin_email' ) ) ), 256, '', esc_attr( get_bloginfo( 'name' ) ) );
					}
				?>
				<h1 class="site-title"><?php esc_attr( bloginfo( 'name' ) ); ?></h1>
				<h2 class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></h2>
			</a>
		<?php
	}
}


/**
 * Main Navigation
 * Displays the main navigation
 * Hooked into highwind_header()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_main_navigation' ) ) {
	function highwind_main_navigation() {
		?>

		<?php do_action( 'highwind_navigation_before' ); ?>

		<nav class="main-nav" id="navigation" role="navigation">

			<?php do_action( 'highwind_navigation_top' ); ?>

			<ul class="buttons">
				<li class="home"><a href="<?php echo home_url(); ?>" class="nav-home button"><span><?php _e( 'Home', 'highwind' ); ?></span></a></li>
				<li class="close"><a href="#top" class="nav-close button"><span><?php _e( 'Return to Content', 'highwind' ); ?></span></a></li>
			</ul>
			<hr />
			<h2><?php echo highwind_get_menu_name( 'main' ); ?></h2>
			<?php wp_nav_menu( array(
				'theme_location' => 'main',
				'menu_class' => 'menu',
				'container_class' => 'highwind-navigation',
				'fallback_cb' => '' )
			); ?>

			<?php do_action( 'highwind_navigation_bottom' ); ?>

		</nav><!-- /.main-nav -->

		<?php do_action( 'highwind_navigation_after' ); ?>

		<?php
	}
}


/**
 * Sidebar
 * Displays the sidebar
 * Hooked into highwind_content_after()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_sidebar' ) ) {
	function highwind_sidebar() {
		if ( ! is_page_template( 'templates/template-fullwidth.php' ) ) {
			if ( is_page() ) {
				get_sidebar( 'page' );
			} else if ( is_single() ) {
				get_sidebar( 'post' );
			} else {
				get_sidebar();
			}
		}
	}
}


/**
 * Post Meta
 * Hooked into highwind_entry_bottom()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_post_meta' ) ) {
	function highwind_post_meta() {
		if ( ! is_page() ) {
		?>
		<aside class="post-meta">
			<ul>
				<li class="categories"><?php the_category( ', ' ); ?></li>
				<li class="comment"><?php comments_popup_link( __( '0 Comments', 'highwind' ), __( '1 Comment', 'highwind' ), __( '% Comments', 'highwind' ) ); ?></li>
				<?php the_tags( '<li class="tags">', ', ','</li>' ); ?>
				<?php if ( apply_filters( 'highwind_meta_author_link', true ) ) { ?>
					<li class="author"><?php the_author_posts_link(); ?></li>
				<?php } // endif ?>
			</ul>
		</aside><!-- /.post-meta -->
		<?php
		}
	}
}


/**
 * Post Time
 * Hooked in to highwind_content_header_top()
 * @since 1.0
 */
if ( ! function_exists( 'highwind_post_date' ) ) {
	function highwind_post_date() {
		if ( ! is_page() && ! is_404() ) {
		?>
			<time class="post-date"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'highwind' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a></time>
		<?php
		}
	}
}


/**
 * Comments Navigation
 * @since 1.0
 */
if ( ! function_exists( 'highwind_comment_navigation' ) ) {
	function highwind_comment_navigation() {
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through ?>
			<nav class="navigation navigation-comments">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'highwind' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'highwind' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'highwind' ) ); ?></div>
			</nav>
		<?php } // check for comment navigation
	}
}


/**
 * Content navigation
 * Hooked into highwind_content_bottom
 * @since 1.0
 */
if ( ! function_exists( 'highwind_content_nav' ) ) {
	function highwind_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous )
				return;
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
			return;

		$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

		?>
		<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'highwind' ); ?></h1>

		<?php if ( is_single() ) : // navigation links for single posts ?>

			<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '', 'Previous post link', 'highwind' ) . '</span> %title' ); ?>
			<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '', 'Next post link', 'highwind' ) . '</span>' ); ?>

		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'highwind' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'highwind' ) ); ?></div>
			<?php endif; ?>

		<?php endif; ?>

		</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
		<?php
	}
}

/**
 * Comment Template
 * @since 1.0
 */
if ( ! function_exists( 'highwind_comment' ) ) {
	function highwind_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php } ?>
			<div class="comment-author vcard">
				<?php if ( $args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>

				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="date-link"><?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'highwind' ), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__( 'Edit', 'highwind' ),'  ','' );
					?>
				</div>
				<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ) ?>
			</div>
			<div class="comment-content">
				<?php if ($comment->comment_approved == '0') { ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'highwind' ) ?></em>
					<br />
				<?php } ?>

				<?php comment_text(); ?>
			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</div><!-- /.reply -->
			<?php if ( 'div' != $args['style'] ) { ?>
		</div><!-- /.comment-body -->
		<?php } ?>
	<?php
	}
}


/**
 * Comments Template
 * @since 1.0
 */
if ( ! function_exists( 'highwind_comments_template' ) ) {
	function highwind_comments_template() {
		comments_template( '', true );
	}
}


/**
 * Featured Image
 * @since 1.0
 */
if ( ! function_exists( 'highwind_featured_image' ) ) {
	function highwind_featured_image() {
		global $post;
		if ( ! is_404() ) {
			$post_image_size 	= apply_filters( 'highwind_featured_image_size', 'large' );
			$post_image 		= get_the_post_thumbnail( $post->ID, $post_image_size );
			echo $post_image;
		}
	}
}


/**
 * Footer Widgets
 * Hooked into highwind_footer
 * @since 1.0
 */
function highwind_footer_widgets() {
	if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
		$columns = 3;
	} elseif ( is_active_sidebar( 'footer-sidebar-2' ) ) {
		$columns = 2;
	} elseif ( is_active_sidebar( 'footer-sidebar-1' ) ) {
		$columns = 1;
	} else {
		$columns = 0;
	}
	?>
	<section class="footer-widgets columns-<?php echo $columns; ?>">

		<div class="footer-sidebar first">
			<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
		</div>

		<div class="footer-sidebar second">
			<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
		</div>

		<div class="footer-sidebar third">
			<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
		</div>

	</section>
	<?php
}


/**
 * Credit
 * Hooked into highwind_footer
 * @since 1.0
 */
function highwind_credit() {
	?>
	<p>
		<?php _e( 'Powered by', 'highwind' ); ?> <a href="http://wordpress.org" title="WordPress.org">WordPress</a> &amp; <a href="http://jameskoster.co.uk/highwind/" title="<?php _e( 'Highwind - Customisable and extendable WordPress theme', 'highwind' ); ?>">Highwind</a>.
	</p>
	<?php
}


/**
 * Back to top link
 * Hooked into highwind_footer
 * @since 1.0
 */
function highwind_back_to_top() {
	?>
		<a href="#top" class="back-to-top button">
			<?php apply_filters( 'highwind_back_to_top_text', _e( 'Back to top', 'highwind' ) ); ?>
		</a>
	<?php
}
