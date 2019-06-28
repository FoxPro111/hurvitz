<?php

$category = get_queried_object();

$title = get_the_archive_title();

if (is_home()) {
	$title = get_field( 'blog_title', 'option' );
}

?>

<div class="hr-breadcrumbs">
	<div class="container">
		<div class="hr-breadcrumbs__wrap">
			<div class="hr-breadcrumbs__title">
				<h1><?php echo $title; ?></h1>
			</div>
			<div class="hr-breadcrumbs__list">
				<ul>
					<li><a href="<?php echo get_home_url(); ?>"><?php esc_html_e('Home', 'hurvitz'); ?></a></li>
					<li><?php echo $title; ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
