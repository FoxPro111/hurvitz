<?php

$services   = get_sub_field('services');
$heading = get_sub_field('heading');
$image = get_sub_field('image');

if ( empty($services) ) {
	return;
}

?>

<div class="hr-services hr-section">
	<div class="container">
		<?php if ( $heading ) { ?>
			<h3 class="hr-section__title"><?php echo esc_html($heading); ?></h3>
		<?php } ?>

		<div class="hr-services__wrap">
			<?php if ($image) {
				$image_url = $image['url'];
				$image_alt = $image['alt'];
				?>
				<div class="hr-services__image">
					<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
				</div>
			<?php } ?>

			<?php if ($services) { ?>
				<ul class="hr-services__list">
					<?php foreach ($services as $service) {
						if (isset($service['service']) && !empty($service['service'])) { ?>
							<li><i class="far fa-check-square"></i><?php echo esc_html($service['service']); ?></li>
						<?php } ?>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</div>

