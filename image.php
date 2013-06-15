<?php
/**
 * The template for displaying images.
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

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article <?php post_class(); ?>>

		<header class="post-header">

			<?php highwind_content_header_top(); ?>

			<h1 class="title" data-text="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'highwind' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php highwind_content_header_bottom(); ?>

		</header>

		<section class="article-content">

			<?php highwind_content_entry_top(); ?>

			<div class="attachment">
				<?php
					/**
					 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
					 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
					 */
					$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
					foreach ( $attachments as $k => $attachment ) {
						if ( $attachment->ID == $post->ID )
							break;
					}
					$k++;
					// If there is more than 1 attachment in a gallery
					if ( count( $attachments ) > 1 ) {
						if ( isset( $attachments[ $k ] ) )
							// get the URL of the next image attachment
							$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
						else
							// or get the URL of the first image attachment
							$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
					} else {
						// or, if there's only 1 image, get the URL of the image
						$next_attachment_url = wp_get_attachment_url();
					}
				?>
				<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
				$attachment_size = apply_filters( 'highwind_attachment_size', 848 );
				echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
				?></a>

				<?php if ( ! empty( $post->post_excerpt ) ) : ?>

				<div class="entry-caption">

					<?php the_excerpt(); ?>

				</div>

				<?php endif; ?>

			</div><!-- .attachment -->

			<?php highwind_content_entry_bottom(); ?>

		</section><!--/.article-content-->

		<aside class="post-meta">

			<nav class="gallery-nav">

				<?php next_image_link(); ?>

				<?php previous_image_link(); ?>

			</nav>

		</aside>


	</article><!--/.row-->

	<?php endwhile; // end of the loop. ?>

	<?php highwind_content_bottom(); ?>

</section>

<?php highwind_content_after(); ?>

<?php get_footer(); ?>