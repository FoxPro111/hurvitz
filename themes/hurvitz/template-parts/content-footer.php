<?php
/**
 * Template part for content footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

$copyright = get_field( 'copyright', 'option' );
?>

<footer class="hr-footer">
	<div class="container">
		<div class="hr-footer__wrap t-center">
			<?php echo wp_kses_post($copyright); ?>
		</div>
	</div>
</footer>
