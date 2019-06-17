<?php
/**
 * Template part for displaying about section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title            = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$information_list = get_sub_field( 'information_list' );
$description      = get_sub_field( 'description' );
?>

<div class="hurvitz-sc hurvitz-sc--about">
	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $information_list ) ) : ?>
        <div class="hurvitz-sc__about-list">
			<?php foreach ( $information_list as $information_item ) : ?>
                <div class="hurvitz-sc__about-item">
					<?php echo esc_html( $information_item['information_text'] ); ?>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif;

	if ( ! empty( $description ) ) : ?>
        <div class="hurvitz-sc__about-description">
            <?php echo esc_html( $description ); ?>
        </div>
	<?php endif; ?>
</div>