<?php
/**
 * Template part for content head
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */


$logo = get_field( 'logo', 'option' );
$popup_button_name = get_field( 'popup_button_name', 'option' );
$popup_contact_form_id = get_field( 'popup_contact_form_id', 'option' );
$address_link = get_field( 'address_link', 'option' );
$phone_number = get_field( 'phone_number', 'option' );
$contact_id = get_field('popup_contact_form_id', 'option');
$popup_title = get_field('popup_contact_form_title', 'option');

?>

<header class="hr-header">
	<div class="hr-header__overlay js-menu-close"></div>
	<div class="container">
		<div class="hr-header__wrap">
			<?php if ($logo) { ?>
				<a href="<?php echo get_home_url(); ?>" class="hr-header__logo">
					<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_url($logo['alt']); ?>">
				</a>
			<?php } ?>
			<div class="hr-header__nav">
				<?php echo hurvitz_main_menu(); ?>

				<div class="hr-header__bar-wrap">
					<?php if ($popup_button_name && $contact_id) { ?>
						<div class="hr-header__popup">
							<a class="js-popup-btn" href="#"><i class="far fa-address-book"></i><?php echo esc_html($popup_button_name); ?></a>
						</div>
					<?php } ?>

					<?php if ($address_link) { ?>
						<div class="hr-header__address">
							<a href="<?php echo esc_url('mailto:' . $address_link); ?>"><i class="far fa-envelope"></i><?php echo esc_html($address_link) ?></a>
						</div>
					<?php } ?>


					<?php if ($phone_number) { ?>
						<div class="hr-header__phone">
							<a href="<?php echo esc_url('tel:' . $phone_number); ?>"><i class="fas fa-phone"></i><?php echo esc_html($phone_number) ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
			<a class="hr-header__burger js-menu-burger" href="#">
				<span></span>
			</a>
		</div>
	</div>
</header>

<?php if ($contact_id) { ?>
	<div class="hr-popup js-popup">
		<a href="#" class="js-popup-close hr-popup__close"><i class="fas fa-times"></i></a>
		<?php if ($popup_title) { ?>
			<h3 class="hr-popup__title"><?php echo esc_html($popup_title); ?></h3>
		<?php } ?>
		<?php echo do_shortcode( '[contact-form-7 id="' . $contact_id . '"]' ); ?>
	</div>
	<div class="js-popup-close hr-popup__bg"></div>
<?php } ?>
