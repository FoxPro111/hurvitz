<?php

$editor     = get_sub_field( 'editor' );

if (empty($editor)) {
	return;
} ?>

<div class="hr-editor">
	<div class="container">
		<?php echo wp_kses_post($editor); ?>
	</div>
</div>

