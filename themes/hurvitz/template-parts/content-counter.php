<?php
/**
 * Template part for displaying counter section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$counter_list = get_sub_field( 'counter_list' );
?>

<div class="hurvitz-sc hurvitz-sc--counter">
	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $counter_list ) ) :
        
		//Enqueue scripts
		wp_enqueue_script( 'counter-script', get_template_directory_uri() . '/assets/js/libs/countTo.js', array( 'jquery' ), '', true );
		?>
		<div class="hurvitz-sc__counter-list">
			<?php foreach ( $counter_list as $counter_item ) : ?>
				<div class="hurvitz-sc__counter-item">
					<?php if ( !empty($counter_item['counter_number']) ): ?>
						<span class="hurvitz-sc__counter-number js-counter" data-from="0" data-to="<?php echo esc_attr($counter_item['counter_number']); ?>" data-speed="2000">
							0
						</span>
					<?php endif;

					if ( !empty($counter_item['counter_name']) ): ?>
						<span class="hurvitz-sc__counter-name">
							<?php echo esc_html( $counter_item['counter_name'] ); ?>
						</span>
					<?php endif; ?>

				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>