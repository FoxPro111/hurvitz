<?php
/**
 * Template part for displaying contact-form section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$form_id = get_sub_field( 'form_id' );
?>

<div class="hurvitz-sc hurvitz-sc--contact-form">

	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( !empty($form_id) ): ?>
		<div class="hurvitz-sc__contact-form">
			<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '"]' ); ?>
		</div>
	<?php endif;

	?>



</div>