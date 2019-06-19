<?php

$cards   = get_sub_field('cards');
$heading = get_sub_field('heading');

if ( empty($cards) ) {
	return;
}

?>

<div class="hr-cards hr-section">
	<div class="container">
		<?php if ( $heading ) { ?>
			<h3 class="hr-section__title"><?php echo esc_html($heading); ?></h3>
		<?php } ?>

		<div class="row hr-cards__list">
			<?php foreach ($cards as $card) {
				$image = $card['image']['url'];
				$image_alt = $card['image']['alt'];
				$description = $card['description'];
				?>
				<div class="col-12 col-lg-3 col-sm-6">
					<div class="hr-cards__item">
						<?php if ($image) { ?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
						<?php } ?>

						<?php if ($description) { ?>
							<h4 class="hr-cards__description"><?php echo esc_html($description); ?></h4>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

