<?php
/**
 * Template part for displaying clients section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$clients_list = get_sub_field( 'clients_list' );
?>

<div class="hurvitz-sc hurvitz-sc--clients">
	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $clients_list ) ) : ?>
		<div class="hurvitz-sc__clients-list">
			<?php foreach ( $clients_list as $client_item ) : ?>

				<div class="hurvitz-sc__clients-item">
					<?php if ( !empty($client_item['client_image']) ):
						if ( !empty($client_item['client_link']) ): ?>
							<a class="hurvitz-sc__clients-image" href="<?php echo esc_url($client_item['client_link']);?>" target="_blank">
								<img src="<?php echo esc_attr($client_item['client_image']['url']);?>" alt="<?php echo esc_attr($client_item['client_image']['title']);?>">
							</a>
						<?php else : ?>
							<div class="hurvitz-sc__clients-image">
								<img src="<?php echo esc_attr($client_item['client_image']['url']);?>" alt="<?php echo esc_attr($client_item['client_image']['title']);?>">
							</div>
						<?php endif;
					endif; ?>

				</div>

			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>