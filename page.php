<?php
/**
 * The page template.
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

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php highwind_entry_top(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php highwind_entry_bottom(); ?>

		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; // end of the loop. ?>

	<?php highwind_content_bottom(); ?>

</section><!-- /.content -->

<?php highwind_content_after(); ?>

<?php get_footer(); ?>