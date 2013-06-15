<?php
/**
 * The template for displaying post archives.
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

		<h1 class="archive-title">
			<?php
				if ( is_category() ) :
					printf( __( 'Category Archives: %s', 'highwind' ), '<span>' . single_cat_title( '', false ) . '</span>' );

				elseif ( is_tag() ) :
					printf( __( 'Tag Archives: %s', 'highwind' ), '<span>' . single_tag_title( '', false ) . '</span>' );

				elseif ( is_author() ) :
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					*/
					the_post();
					printf( __( 'Author Archives: %s', 'highwind' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();

				elseif ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'highwind' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'highwind' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'highwind' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

				else :
					_e( 'Archives', 'highwind' );

				endif;
			?>
		</h1>

		<?php
			if ( is_category() ) :
				// show an optional category description
				$category_description = category_description();
				if ( ! empty( $category_description ) ) :
					echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
				endif;

			elseif ( is_tag() ) :
				// show an optional tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) ) :
					echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				endif;

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

				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'highwind' ); ?></p>

				<?php get_search_form(); ?>

				<?php highwind_content_entry_bottom(); ?>

			</div><!-- /.entry-content -->

		</article><!-- /#post-0 -->

	<?php endif; ?>

	<?php highwind_content_bottom(); ?>

</section>

<?php highwind_content_after(); ?>

<?php get_footer(); ?>