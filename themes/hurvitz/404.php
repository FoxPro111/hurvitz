<?php

get_header();

$title       = get_field('404_title', 'option');
$description = get_field('404_description', 'option');
$button_name = get_field('404_button_name', 'option');
?>

	<div class="hr-error">
		<div class="container">
			<?php if ( $title ) { ?>
				<h1 class="hr-error__title"><?php echo esc_html($title); ?></h1>
			<?php } ?>
			<?php if ( $description ) { ?>
				<h5 class="hr-error__description"><?php echo esc_html($description); ?></h5>
			<?php } ?>
			<?php if ( $button_name ) { ?>
				<a href="<?php echo get_home_url(); ?>" class="hr-error__btn"><?php echo esc_html($button_name); ?></a>
			<?php } ?>
		</div>
	</div>

<?php get_footer();