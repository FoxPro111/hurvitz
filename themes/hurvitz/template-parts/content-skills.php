<?php
/**
 * Template part for displaying skills section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title       = get_sub_field( 'title' );
$title_icon  = get_sub_field( 'title_icon' );
$skills_list = get_sub_field( 'skills_list' );
?>

<div class="hurvitz-sc hurvitz-sc--skills">
	<?php if ( ! empty( $title ) ) : ?>
        <div class="hurvitz-sc__title-wrap">
			<?php if ( ! empty( $title_icon ) ) : ?>
                <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
			<?php endif; ?>
            <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
        </div>
	<?php endif;

	if ( ! empty( $skills_list ) ) :

		//Enqueue scripts
		wp_enqueue_script( 'counter-script', get_template_directory_uri() . '/assets/js/libs/countTo.js', array( 'jquery' ), '', true );
		?>
        <div class="hurvitz-sc__skills-list">
			<?php foreach ( $skills_list as $skill ) : ?>
                <div class="hurvitz-sc__skills-item" data-value="<?php echo esc_attr( $skill['skill_value'] ); ?>">
                    <span class="hurvitz-sc__skills-name">
                        <?php echo esc_html( $skill['skill_name'] ); ?>
                    </span>
                    <div class="hurvitz-sc__skills-value">
                        <span class="counter" data-from="0" data-speed="1500" data-to="<?php echo esc_attr( $skill['skill_value'] ); ?>">0</span>%
                    </div>
                    <div class="hurvitz-sc__skills-line">
                        <div class="active-line"></div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</div>