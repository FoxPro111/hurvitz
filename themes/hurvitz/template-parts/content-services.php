<?php
/**
 * Template part for displaying services section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$services_list = get_sub_field( 'services_list' );
?>

<div class="hurvitz-sc hurvitz-sc--services">
	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $services_list ) ) : ?>
		<div class="hurvitz-sc__services-list">
			<?php foreach ( $services_list as $services_item ) : ?>

				<div class="hurvitz-sc__services-item">
					<?php if ( !empty($services_item['service_icon']) ): ?>
						<i class="hurvitz-sc__services-icon <?php echo esc_attr($services_item['service_icon']);?>"></i>
					<?php endif;

					if ( !empty($services_item['service_name']) ): ?>
						<h5 class="hurvitz-sc__services-name">
							<?php echo esc_html( $services_item['service_name'] ); ?>
						</h5>
					<?php endif;

					if ( !empty($services_item['service_description']) ): ?>
						<div class="hurvitz-sc__services_description">
							<?php echo esc_html( $services_item['service_description'] ); ?>
						</div>
					<?php endif; ?>
				</div>

			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>