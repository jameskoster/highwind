<?php
/**
 * The template for comments.
 * @package highwind
 * @since 1.0
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php highwind_comments_before(); ?>

<div id="comments" class="comments" <?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) && is_page() ) { echo 'class="page-nocomments"'; } ?>>

	<?php if ( post_password_required() ) : ?>

		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'highwind' ); ?></p>

	</div><!-- #comments -->

	<?php
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'highwind' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( 'callback=highwind_comment&avatar_size=' . apply_filters( 'highwind_comment_avatar_size', $avatar_size = '96' ) ); ?>
		</ol>

		<?php highwind_comment_navigation(); ?>

	<?php
		elseif ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) && ! is_page() ) :
	?>

	<p class="nocomments"><?php _e( 'Comments are closed.', 'highwind' ); ?></p>

	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- .comments -->

<?php highwind_comments_after(); ?>
