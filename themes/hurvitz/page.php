<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

get_header();

$sidebar = get_field('sidebar', get_the_ID());

$content_class = (isset($sidebar) && $sidebar != 'No') ? 'col-md-9': '';
$sidebar_class = (isset($sidebar) && $sidebar === 'Right') ? 'order-first' : '';
$sidebar_enable = (isset($sidebar) && $sidebar != 'No') ? true : false;

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$content = get_the_content();

		if ( !empty($content) ) { ?>
			<div class="hr-editor hr-section">
				<div class="container">
					<div class="row">
						<div class="col-12 <?php echo esc_attr($content_class); ?>">
							<?php the_content(); ?>
						</div>
						<?php if ( $sidebar_enable ) { ?>
							<div class="col-12 col-md-3 sidebar <?php echo esc_attr($sidebar_class); ?>">
								<?php if ( !dynamic_sidebar('sidebar') ) {

								} ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php }
	endwhile;
endif;

$hurvitz_acf_pro = class_exists('acf_pro');

if ( $hurvitz_acf_pro && have_rows('shortcodes') ):
	while ( have_rows('shortcodes') ) : the_row();

		get_template_part('template-parts/content', get_row_layout());

	endwhile;
endif;

get_footer();
