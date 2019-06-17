<?php
/**
 * Template part for displaying contacts section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$contacts_description = get_sub_field( 'contacts_description' );
$contacts_info_list = get_sub_field( 'contacts_info_list' );
$add_map = get_sub_field( 'add_map' );
$map_setting = get_sub_field( 'map_setting' );
$api_key = get_field('api_key', 'option');
?>

<div class="hurvitz-sc hurvitz-sc--contacts">

	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $contacts_description ) ) : ?>
		<div class="hurvitz-sc__contacts-description">
			<?php echo esc_html($contacts_description); ?>
		</div>
	<?php endif;

	if ( !empty($add_map) ):

        //Enqueue scripts
		wp_enqueue_script( 'google-map', "https://maps.googleapis.com/maps/api/js?key={$api_key}");
		wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/assets/js/google-map.js', array( 'jquery' ), '', true );

		$location = $map_setting["map"];
		$map_style = $map_setting["map_style"];

        if( !empty($location) ):
            ?>
            <div class="acf-map" data-map-style="<?php echo esc_attr($map_style); ?>">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif;

	endif;

	if ( ! empty( $contacts_info_list ) ) : ?>
        <div class="hurvitz-sc__contacts-list">
            <?php foreach ( $contacts_info_list as $item ) : ?>
                <div class="hurvitz-sc__contacts-item">
                    <?php
                        $info_icon = $item['contacts_info_item']['info']['info_icon'];
                        $info_text = $item['contacts_info_item']['info']['info_text'];
                        $mail_icon = $item['contacts_info_item']['mail']['mail_icon'];
                        $mail_link = $item['contacts_info_item']['mail']['mail_link'];
                        $is_it_phone_number = $item['contacts_info_item']['info']['is_it_phone_number'];

                        if ( !empty($info_text) ): ?>
                            <div class="hurvitz-sc__contacts-text-wrap">
                                <?php if ( !empty($info_icon) ): ?>
                                    <i class="hurvitz-sc__contacts-icon <?php echo esc_attr($info_icon);?>"></i>
	                            <?php endif; ?>
                                <?php if( $is_it_phone_number ) :
	                                $info_text_phone = preg_replace("/[^\d]/", "", $info_text); ?>
                                    <a href="tel:<?php echo esc_attr($info_text_phone);?>" class="hurvitz-sc__contacts-text"><?php echo esc_html($info_text);?></a>
                                <?php else : ?>
                                    <span class="hurvitz-sc__contacts-text"><?php echo esc_html($info_text);?></span>
	                            <?php endif; ?>
                            </div>
                        <?php endif;

                        if ( !empty($mail_link) ): ?>
                            <div class="hurvitz-sc__contacts-mail-wrap">
		                        <?php if ( !empty($mail_icon) ): ?>
                                    <i class="hurvitz-sc__contacts-icon <?php echo esc_attr($mail_icon);?>"></i>
		                        <?php endif; ?>
                                <a href="mailto:<?php echo esc_url($mail_link); ?>" class="hurvitz-sc__contacts-mail"><?php echo esc_html($mail_link); ?></a>
                            </div>
                        <?php endif;

                    ?>
                </div>
            <?php endforeach; ?>
        </div>
	<?php endif; ?>



</div>