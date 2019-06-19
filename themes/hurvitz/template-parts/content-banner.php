<?php

$slides     = get_sub_field( 'slides' );

if (empty($slides)) {
	return;
}
?>

<div class="hr-banner">
	<div class="swiper-container" data-lazy="true" data-lazy-amount="2">
		<div class="swiper-wrapper">
			<?php foreach ($slides as $slide) {
				$image = $slide['image']['url'];
				$title = $slide['title'];
				$description = $slide['description'];
				?>
				<div class="swiper-slide swiper-lazy" data-background="<?php echo esc_url($image); ?>">
					<div class="swiper-lazy-preloader"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<h2><?php echo esc_html($title); ?></h2>
								<h6><?php echo esc_html($description); ?></h6>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="swiper-button-prev">
			<i class="fas fa-chevron-right"></i>
		</div>
		<div class="swiper-button-next">
			<i class="fas fa-chevron-left"></i>
		</div>
	</div>
</div>
