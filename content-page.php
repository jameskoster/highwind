<?php
/**
 * The template for displaying pages.
 * @package highwind
 * @since 1.0
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<header class="page-header">

	<?php highwind_content_header_top(); ?>

	<h1 class="page-title" data-text="<?php the_title(); ?>"><?php the_title(); ?></h1>

	<?php highwind_content_header_bottom(); ?>

</header><!-- /.page-header -->

<section class="article-content">

	<?php

		highwind_content_entry_top();

		the_content();

		wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'highwind' ) . '</span>', 'after' => '</div>' ) );

		highwind_content_entry_bottom();

	?>

</section><!-- /.article-content -->