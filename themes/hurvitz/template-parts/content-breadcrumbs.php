<?php

$category = $category_link = $category_name = '';

$title = get_the_archive_title();

if ( is_home() ) {
	$title = get_field('blog_title', 'option');
}

if ( is_singular() ) {
	$title    = get_the_title();
	$category = get_the_category();

	if ( isset($category[0]) ) {
		$category_link = get_category_link($category[0]->term_id);
		$category_name = $category[0]->name;
	}
} ?>

<div class="hr-breadcrumbs">
	<div class="container">
		<div class="hr-breadcrumbs__wrap">
			<div class="hr-breadcrumbs__title">
				<h1><?php echo $title; ?></h1>
			</div>
			<div class="hr-breadcrumbs__list">
				<ul>
					<li><a href="<?php echo get_home_url(); ?>"><?php esc_html_e('Home', 'hurvitz'); ?></a></li>
					<?php if ( $category_link ) { ?>
						<li><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category_name); ?></a>
						</li>
					<?php } ?>
					<li><?php echo $title; ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
