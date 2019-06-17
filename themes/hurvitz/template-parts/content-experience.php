<?php
/**
 * Template part for displaying experience section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$add_education_history  = get_sub_field( 'add_education_history' );
$education_title        = get_sub_field( 'education_title' );
$education_title_logo   = get_sub_field( 'education_title_logo' );
$education_list         = get_sub_field( 'education_list' );
$add_experience_history = get_sub_field( 'add_experience_history' );
$experience_title       = get_sub_field( 'experience_title' );
$experience_title_logo  = get_sub_field( 'experience_title_logo' );
$experience_list        = get_sub_field( 'experience_list' );
?>

<div class="hurvitz-sc hurvitz-sc--experience">
	<?php if ( $add_education_history && isset( $add_education_history ) && $add_experience_history && isset( $add_experience_history ) ) : ?>
        <div class="hurvitz-sc__exp-educ-list">
            <div class="hurvitz-sc__educ">
	            <?php if ( ! empty( $education_title ) ) : ?>
                <div class="hurvitz-sc__experience-title-wrap hurvitz-sc__title-wrap">
		            <?php if ( ! empty( $education_title_logo ) ) : ?>
                        <i class="hurvitz-sc__experience-title-icon hurvitz-sc__title-icon <?php echo esc_attr( $education_title_logo ); ?>"></i>
		            <?php endif; ?>
                    <h3 class="hurvitz-sc__experience-title hurvitz-sc__title"><?php echo esc_html( $education_title ); ?></h3>
                </div>
	            <?php endif; ?>
                <div class="hurvitz-sc__experience-list">
		            <?php foreach ( $education_list as $education_item ) : ?>
                        <div class="hurvitz-sc__experience-item">
				            <?php if ( ! empty( $education_item['education_start'] ) ) : ?>
                                <div class="hurvitz-sc__experience-period">
                                    <span class="hurvitz-sc__experience-start"><?php echo esc_html( $education_item['education_start'] ); ?></span>
						            <?php if ( ! empty( $education_item['education_end'] ) ) : ?>
                                        <span class="hurvitz-sc__experience-end"><?php echo esc_html( $education_item['education_end'] ); ?></span>
						            <?php else : ?>
                                        <span class="hurvitz-sc__experience-end"><?php esc_html_e( 'nowadays', 'hurvitz' ); ?></span>
						            <?php endif; ?>
                                </div>
				            <?php endif;

				            if ( ! empty( $education_item['education_name'] ) ) : ?>
                                <h5 class="hurvitz-sc__experience-name"><?php echo esc_html( $education_item['education_name'] ); ?></h5>
				            <?php endif;

				            if ( ! empty( $education_item['education_region'] ) ) : ?>
                                <div class="hurvitz-sc__experience-region"><?php echo esc_html( $education_item['education_region'] ); ?></div>
				            <?php endif;

				            if ( ! empty( $education_item['education_description'] ) ) : ?>
                                <div class="hurvitz-sc__experience-description"><?php echo esc_html( $education_item['education_description'] ); ?></div>
				            <?php endif; ?>
                        </div>
		            <?php endforeach; ?>
                </div>
            </div>
            <div class="hurvitz-sc__exp">
		        <?php if ( ! empty( $experience_title ) ) : ?>
                    <div class="hurvitz-sc__experience-title-wrap hurvitz-sc__title-wrap">
				        <?php if ( ! empty( $experience_title_logo ) ) : ?>
                            <i class="hurvitz-sc__experience-title-icon hurvitz-sc__title-icon <?php echo esc_attr( $experience_title_logo ); ?>"></i>
				        <?php endif; ?>
                        <h3 class="hurvitz-sc__experience-title hurvitz-sc__title"><?php echo esc_html( $experience_title ); ?></h3>
                    </div>
		        <?php endif; ?>
                <div class="hurvitz-sc__experience-list">
			        <?php foreach ( $experience_list as $experience_item ) : ?>
                        <div class="hurvitz-sc__experience-item">
					        <?php if ( ! empty( $experience_item['experience_start'] ) ) : ?>
                                <div class="hurvitz-sc__experience-period">
                                    <span class="hurvitz-sc__experience-start"><?php echo esc_html( $experience_item['experience_start'] ); ?></span>
							        <?php if ( ! empty( $experience_item['experience_end'] ) ) : ?>
                                        <span class="hurvitz-sc__experience-end"><?php echo esc_html( $experience_item['experience_end'] ); ?></span>
							        <?php else : ?>
                                        <span class="hurvitz-sc__experience-end"><?php esc_html_e( 'nowadays', 'hurvitz' ); ?></span>
							        <?php endif; ?>
                                </div>
					        <?php endif;

					        if ( ! empty( $experience_item['experience_name'] ) ) : ?>
                                <h5 class="hurvitz-sc__experience-name"><?php echo esc_html( $experience_item['experience_name'] ); ?></h5>
					        <?php endif;

					        if ( ! empty( $experience_item['experience_region'] ) ) : ?>
                                <div class="hurvitz-sc__experience-region"><?php echo esc_html( $experience_item['experience_region'] ); ?></div>
					        <?php endif;

					        if ( ! empty( $experience_item['experience_description'] ) ) : ?>
                                <div class="hurvitz-sc__experience-description"><?php echo esc_html( $experience_item['experience_description'] ); ?></div>
					        <?php endif; ?>
                        </div>
			        <?php endforeach; ?>
                </div>
            </div>
        </div>
	<?php elseif ( $add_education_history && isset( $add_education_history ) ) :
		if ( ! empty( $education_title ) ) : ?>
            <div class="hurvitz-sc__experience-title-wrap hurvitz-sc__title-wrap">
				<?php if ( ! empty( $education_title_logo ) ) : ?>
                    <i class="hurvitz-sc__experience-title-icon hurvitz-sc__title-icon <?php echo esc_attr( $education_title_logo ); ?>"></i>
				<?php endif; ?>
                <h3 class="hurvitz-sc__experience-title hurvitz-sc__title"><?php echo esc_html( $education_title ); ?></h3>
            </div>
		<?php endif; ?>
        <div class="hurvitz-sc__experience-list">
			<?php foreach ( $education_list as $education_item ) : ?>
                <div class="hurvitz-sc__experience-item">
					<?php if ( ! empty( $education_item['education_start'] ) ) : ?>
                        <div class="hurvitz-sc__experience-period">
                            <span class="hurvitz-sc__experience-start"><?php echo esc_html( $education_item['education_start'] ); ?></span>
							<?php if ( ! empty( $education_item['education_end'] ) ) : ?>
                                <span class="hurvitz-sc__experience-end"><?php echo esc_html( $education_item['education_end'] ); ?></span>
							<?php else : ?>
                                <span class="hurvitz-sc__experience-end"><?php esc_html_e( 'nowadays', 'hurvitz' ); ?></span>
							<?php endif; ?>
                        </div>
					<?php endif;

					if ( ! empty( $education_item['education_name'] ) ) : ?>
                        <h5 class="hurvitz-sc__experience-name"><?php echo esc_html( $education_item['education_name'] ); ?></h5>
					<?php endif;

					if ( ! empty( $education_item['education_region'] ) ) : ?>
                        <div class="hurvitz-sc__experience-region"><?php echo esc_html( $education_item['education_region'] ); ?></div>
					<?php endif;

					if ( ! empty( $education_item['education_description'] ) ) : ?>
                        <div class="hurvitz-sc__experience-description"><?php echo esc_html( $education_item['education_description'] ); ?></div>
					<?php endif; ?>
                </div>
			<?php endforeach; ?>
        </div>
	<?php elseif ( $add_experience_history && isset( $add_experience_history ) ) :
		if ( ! empty( $experience_title ) ) : ?>
            <div class="hurvitz-sc__experience-title-wrap hurvitz-sc__title-wrap">
				<?php if ( ! empty( $experience_title_logo ) ) : ?>
                    <i class="hurvitz-sc__experience-title-icon hurvitz-sc__title-icon <?php echo esc_attr( $experience_title_logo ); ?>"></i>
				<?php endif; ?>
                <h3 class="hurvitz-sc__experience-title hurvitz-sc__title"><?php echo esc_html( $experience_title ); ?></h3>
            </div>
		<?php endif; ?>
        <div class="hurvitz-sc__experience-list">
			<?php foreach ( $experience_list as $experience_item ) : ?>
                <div class="hurvitz-sc__experience-item">
					<?php if ( ! empty( $experience_item['experience_start'] ) ) : ?>
                        <div class="hurvitz-sc__experience-period">
                            <span class="hurvitz-sc__experience-start"><?php echo esc_html( $experience_item['experience_start'] ); ?></span>
							<?php if ( ! empty( $experience_item['experience_end'] ) ) : ?>
                                <span class="hurvitz-sc__experience-end"><?php echo esc_html( $experience_item['experience_end'] ); ?></span>
							<?php else : ?>
                                <span class="hurvitz-sc__experience-end"><?php esc_html_e( 'nowadays', 'hurvitz' ); ?></span>
							<?php endif; ?>
                        </div>
					<?php endif;

					if ( ! empty( $experience_item['experience_name'] ) ) : ?>
                        <h5 class="hurvitz-sc__experience-name"><?php echo esc_html( $experience_item['experience_name'] ); ?></h5>
					<?php endif;

					if ( ! empty( $experience_item['experience_region'] ) ) : ?>
                        <div class="hurvitz-sc__experience-region"><?php echo esc_html( $experience_item['experience_region'] ); ?></div>
					<?php endif;

					if ( ! empty( $experience_item['experience_description'] ) ) : ?>
                        <div class="hurvitz-sc__experience-description"><?php echo esc_html( $experience_item['experience_description'] ); ?></div>
					<?php endif; ?>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</div>