<?php
/**
 * The footer template.
 * @package highwind
 * @since 1.0
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

		<?php highwind_footer_before(); ?>

		</div><!-- /.content-wrapper -->

		<footer class="footer content-wrapper" role="contentinfo">

			<div class="footer-content">

				<?php highwind_footer(); ?>

			</div><!-- /.footer-content -->

		</footer>

		<?php highwind_footer_after(); ?>

	</div><!-- /.inner-wrap -->

</div><!-- /.outer-wrap -->

<?php highwind_body_bottom(); ?>

<?php wp_footer(); ?>

</body>
</html>