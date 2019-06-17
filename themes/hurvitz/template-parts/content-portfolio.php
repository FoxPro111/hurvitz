<?php
/**
 * Template part for displaying portfolio section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */
?>

<?php
$title          = get_sub_field( 'title' );
$title_icon            = get_sub_field( 'title_icon' );
$portfolio_item = get_sub_field( 'portfolio_item' );
$add_filter     = get_sub_field( 'add_filter' );
?>

<div class="hurvitz-sc hurvitz-sc--portfolio">
	<?php if ( ! empty( $title ) ) : ?>
    <div class="hurvitz-sc__title-wrap">
		<?php if ( ! empty( $title_icon ) ) : ?>
            <i class="hurvitz-sc__title-icon <?php echo esc_attr( $title_icon ); ?>"></i>
		<?php endif; ?>
        <h3 class="hurvitz-sc__title"><?php echo esc_html( $title ); ?></h3>
    </div>
    <?php endif;

	if ( ! empty( $portfolio_item ) ) :

		//FILTER GROUP
		if ( $add_filter ): ?>
            <ul class="hurvitz-sc__portfolio-filter">
                <li class="active hurvitz-sc__portfolio-filter-item" data-filter="*"><?php esc_html_e('all', 'hurvitz');?></li>
				<?php
				$portfolio_category = array();

				foreach ( $portfolio_item as $item ) :
					$terms = get_the_terms( $item, 'portfolio-category' );

					foreach ( $terms as $term ):
						$portfolio_category[ $term->name ] = $term->name;
					endforeach;
				endforeach;

				foreach ( $portfolio_category as $cat ) :
					$filter = str_replace( ' ', '-', $cat ); ?>
                    <li class="hurvitz-sc__portfolio-filter-item"
                        data-filter=".<?php echo esc_attr( $filter ); ?>">
						<?php echo esc_html( $cat ); ?>
                    </li>
				<?php endforeach; ?>
            </ul>
		<?php endif;
		?>
        <div class="hurvitz-sc__portfolio-list grid">
			<?php foreach ( $portfolio_item as $item ) :
				$terms = get_the_terms( $item, 'portfolio-category' );
				foreach ( $terms as $term ):
					$portfolio_category = $term->name;
					$filter_class = str_replace( ' ', '-', $portfolio_category ); ?>
                    <div class="hurvitz-sc__portfolio-item-wrap grid-item <?php echo esc_attr( $filter_class ); ?>">
                        <div class="hurvitz-sc__portfolio-item">
							<?php $portfolio_image = get_the_post_thumbnail_url( $item );
							if ( ! empty( $portfolio_image ) ): ?>
                                <div class="hurvitz-sc__portfolio-img">
									<?php $alt = ! empty( get_the_title( $item ) ) ? get_the_title( $item ) : 'alt'; ?>
                                    <img src="<?php echo esc_url( $portfolio_image ); ?>"
                                         alt="<?php echo esc_attr( $alt ); ?>">
                                </div>
							<?php endif; ?>
                            <div class="hurvitz-sc__portfolio-info">
								<?php
								$portfolio_url   = get_the_permalink( $item );
								$portfolio_title = get_the_title( $item );
								?>
                                <a class="hurvitz-sc__portfolio-title" href="<?php echo esc_url( $portfolio_url ); ?>"
                                   target="_self"><?php echo esc_html( $portfolio_title ); ?></a>
                                <div class="hurvitz-sc__portfolio-category-list">
									<?php
									if ( ! empty( $portfolio_category ) ): ?>
                                        <span class="hurvitz-sc__portfolio-category-item">
                                            <?php echo esc_html( $portfolio_category ); ?>
                                        </span>
									<?php endif;
									?>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php endforeach; ?>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</div>