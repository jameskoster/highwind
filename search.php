<?php
/**
 * The search template.
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

		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'highwind' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

	</header><!-- .page-header -->

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">

			<header class="entry-header">

				<h1 class="entry-title"><?php _e( 'Nothing Found', 'highwind' ); ?></h1>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'highwind' ); ?></p>

				<?php get_search_form(); ?>

			</div><!-- .entry-content -->

		</article><!-- #post-0 -->

	<?php endif; ?>

	<?php highwind_content_bottom(); ?>

</section>

<?php highwind_content_after(); ?>

<?php get_footer(); ?>