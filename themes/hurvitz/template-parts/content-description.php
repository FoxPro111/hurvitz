<?php

$description = category_description();

if ( is_home() ) {
	$description = get_field('blog_description', 'option');
}

if ( !empty($description) ) { ?>
	<div class="hr-blog-description"><?php echo wp_kses_post($description); ?></div><?php }
?>
