<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package highwind
 * @since 1.0
 */
?>

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

<?php highwind_content_before(); ?>

<section class="content" role="main">

	<?php highwind_content_top(); ?>

	<header class="page-header">

		<?php highwind_content_header_top(); ?>

		<h1 class="page-title" data-text="<?php the_title(); ?>"><?php _e( '404 not found', 'highwind' ); ?></h1>

		<?php highwind_content_header_bottom(); ?>

	</header><!-- /.page-header -->

	<section class="article-content">

		<?php highwind_content_entry_top(); ?>

		<p><?php _e( 'It seems the page you\'re looking for no longer (or indeed never did) exists at this location. Please try searching...', 'highwind' ); ?>

		<?php

			// Display a search form and some helpful widgets

			$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives.', 'highwind' ) ) . '</p>';

			get_search_form();

			the_widget( 'WP_Widget_Recent_Posts' );

			the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

			the_widget( 'WP_Widget_Tag_Cloud' );
		?>

		<?php highwind_content_entry_bottom(); ?>

	</section>

	<?php highwind_content_bottom(); ?>

</section>

<?php highwind_content_after(); ?>

<?php get_footer(); ?>