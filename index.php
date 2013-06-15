<?php
/**
 * The main template file.
 * @package highwind
 * @since 1.0
 */
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( __( 'You do not have sufficient permissions to access this page!', 'highwind' ) );
}
?>

<?php get_header(); ?>

<?php highwind_content_before(); ?>

<section class="content" role="main">

	<?php highwind_content_top(); ?>

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'loop' ); ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">

			<header class="entry-header">

				<?php highwind_content_header_top(); ?>

				<h1 class="entry-title"><?php _e( 'Nothing Found', 'highwind' ); ?></h1>

				<?php highwind_content_header_bottom(); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php highwind_content_entry_top(); ?>

				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'highwind' ); ?></p>

				<?php get_search_form(); ?>

				<?php highwind_content_entry_bottom(); ?>

			</div><!-- .entry-content -->

		</article><!-- #post-0 -->

	<?php endif; ?>

	<?php highwind_content_bottom(); ?>

</section>

<?php highwind_content_after(); ?>

<?php get_footer(); ?>