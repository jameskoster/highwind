<?php
/**
 * The template for displaying category pages.
 * @package highwind
 * @since 1.3
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
		<?php
			// show an optional category description
			$category_description = category_description();
			if ( ! empty( $category_description ) ) :
				echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
			endif;
		?>

	</header><!-- /.page-header -->

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'loop' ); ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">

			<header class="entry-header">

				<?php highwind_content_header_top(); ?>

				<h1 class="entry-title"><?php _e( 'Nothing Found', 'highwind' ); ?></h1>

				<?php highwind_content_header_bottom(); ?>

			</header><!-- /.entry-header -->

			<div class="entry-content">

				<?php highwind_content_entry_top(); ?>

				<p><?php _e( 'Apologies, but no posts were found in this category. Perhaps searching will help find a related post.', 'highwind' ); ?></p>

				<?php get_search_form(); ?>

				<?php highwind_content_entry_bottom(); ?>

			</div><!-- /.entry-content -->

		</article><!-- /#post-0 -->

	<?php endif; ?>

	<?php highwind_content_bottom(); ?>

</section>

<?php highwind_content_after(); ?>

<?php get_footer(); ?>