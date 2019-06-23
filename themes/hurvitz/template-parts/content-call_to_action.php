<?php

$text            = get_sub_field('text');
$contact_form_id = get_sub_field('contact_form_id');

if ( empty($contact_form_id) ) {
	return;
}

?>

<div class="hr-call_to_action">
	<div class="container">
		<?php if ( !empty($text) ) { ?>
			<div class="hr-call_to_action__text">
				<?php echo wp_kses_post($text); ?>
			</div>
		<?php } ?>
		<div class="hr-call_to_action__form">
			<?php echo do_shortcode('[contact-form-7 id="' . $contact_form_id . '"]'); ?>
		</div>
	</div>
</div>