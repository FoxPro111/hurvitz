<?php


$args = array(
	'numberposts' => 4,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'suppress_filters' => true
);
$heading = get_sub_field('heading');
$button_name = get_sub_field('button_name');

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

if (empty($recent_posts)) {
	return;
}

?>

<div class="hr-recent hr-section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="hr-recent__title-bar">
					<?php if ( $heading ) { ?>
						<h3 class="hr-section__title hr-recent__title"><?php echo esc_html($heading); ?></h3>
					<?php } ?>

					<?php if ($button_name) { ?>
						<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="hr-recent__btn"><?php echo esc_html($button_name); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row hr-recent__list">
			<?php foreach( $recent_posts as $recent ){
				$post_id = $recent["ID"];

				$thumb = get_the_post_thumbnail_url($post_id, 'full');

				$thumbnail_id = get_post_thumbnail_id( $post_id );
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

				$categories = get_the_terms($post_id, 'category');

				$category = [];
				if ( !empty($categories) ) {
					foreach ( $categories as $key => $item ) {
						$category[$key]['name'] = $item->name;
						$category[$key]['link'] = get_category_link( $item->term_id );
					}
				}

				?>
				<div class="col-sm-6 col-lg-3">
					<div class="hr-recent__post">
						<a class="hr-recent__link" href="<?php echo get_permalink($post_id); ?>"></a>
						<?php if ($thumb) { ?>
							<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" class="js-bg">
						<?php } ?>
						<?php if ($category) {
							?>
							<div class="hr-recent__categories">
								<?php foreach ($category as $item) {
									?>
									<a href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['name']); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
						<h4><?php echo esc_html($recent["post_title"]); ?></h4>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
