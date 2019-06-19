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

$hurvitz_acf_pro = class_exists('acf_pro');
if ( $hurvitz_acf_pro && have_rows( 'shortcodes' ) ):
	while ( have_rows( 'shortcodes' ) ) : the_row();

		get_template_part( 'template-parts/content', get_row_layout() );

	endwhile;
else:
	?>

	<div class="hr-editor">
		<div class="container">
			<?php if (have_posts()) :
				while (have_posts()) :
					the_post(); ?>

					<h1><?php echo get_the_title(); ?></h1>
					<?php the_content(); ?>

				<?php endwhile;
			endif; ?>
		</div>
	</div>

	<?php
endif;

get_footer();
