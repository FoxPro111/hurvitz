<?php
/**
 * Template part for displaying pricing section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$pricing_list = get_sub_field( 'pricing_list' );
?>

<div class="hurvitz-sc hurvitz-sc--pricing">
	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $pricing_list ) ) : ?>
		<div class="hurvitz-sc__pricing-list">
			<?php foreach ( $pricing_list as $pricing_item ) : ?>
				<div class="hurvitz-sc__pricing-item">

					<?php if ( !empty($pricing_item['pricing_name']) ): ?>
						<h5 class="hurvitz-sc__pricing-name">
							<?php echo esc_html( $pricing_item['pricing_name'] ); ?>
						</h5>
					<?php endif;

					if ( !empty($pricing_item['pricing_cost']) ): ?>
						<div class="hurvitz-sc__pricing-price">
                                <span class="hurvitz-sc__pricing-price-wrap">
                                    <?php if ( !empty($pricing_item['pricing_currency']) ): ?>
                                        <span class="hurvitz-sc__pricing-currency">
									        <?php echo esc_html( $pricing_item['pricing_currency'] ); ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="hurvitz-sc__pricing-cost">
                                        <?php echo esc_html( $pricing_item['pricing_cost'] ); ?>
                                    </span>
                                </span>
							<?php if ( !empty($pricing_item['pricing_period']) ): ?>
								<span class="hurvitz-sc__pricing-period">
									<span>/</span><?php echo esc_html( $pricing_item['pricing_period'] ); ?>
								</span>
							<?php endif; ?>
						</div>
					<?php endif;

					if ( !empty($pricing_item['pricing_description_list']) ): ?>
						<ul class="hurvitz-sc__pricing-description-list">
							<?php foreach ( $pricing_item['pricing_description_list'] as $pricing_description_item ) :
								$pricing_active = $pricing_description_item['pricing_description_active'] ? 'active' : '';
								if ( !empty($pricing_description_item['pricing_description']) ): ?>
									<li class="<?php echo esc_attr($pricing_active); ?>">
										<?php echo esc_html($pricing_description_item['pricing_description']); ?>
									</li>
								<?php endif;

						    endforeach;?>
						</ul>
					<?php endif;

					if ( !empty($pricing_item['pricing_button']) ):
						$target = !empty( $pricing_item['pricing_button']['target'] )  ? $pricing_item['pricing_button']['target'] : '_self';
						$url = !empty( $pricing_item['pricing_button']['url'] )  ? $pricing_item['pricing_button']['url'] : '#';
						if ( !empty($pricing_item['pricing_button']['title']) ): ?>
							<a class="a-btn-little" href="<?php echo esc_url($url);?>" target="<?php echo esc_attr($target);?>">
								<span><?php echo esc_html($pricing_item['pricing_button']['title']);?></span>
							</a>
						<?php endif;
					endif; ?>

				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>