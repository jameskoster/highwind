<?php
/**
 * The template for displaying single posts.
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

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php highwind_entry_top(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php highwind_entry_bottom(); ?>

		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; // end of the loop. ?>

	<?php highwind_content_bottom(); ?>

</section><!-- /.content -->

<?php highwind_content_after(); ?>

<?php get_footer(); ?>