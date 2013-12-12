<?php
/**
 * The loop template.
 * @package highwind
 * @since 1.0
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php highwind_entry_before(); ?>

<div id="post-wrap" class="post-wrap">

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php highwind_entry_top(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

		<?php highwind_entry_bottom(); ?>

	</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>

</div><!--/.post-wrap-->

<?php highwind_entry_after(); ?>