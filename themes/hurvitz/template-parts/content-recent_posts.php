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

				</div>
			</div>
		</div>
		<div class="row hr-recent__list">
			<?php foreach( $recent_posts as $recent ){
				$post_id = $recent["ID"];

				$categories = wp_get_post_categories( $post_id );

				var_dump($categories);

				?>
				<div class="col-sm-3">
					<div class="hr-recent__post">
						<a href="<?php echo get_permalink($post_id); ?>"></a>
						<h4><?php echo esc_html($recent["post_title"]); ?></h4>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
