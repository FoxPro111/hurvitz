<?php
/**
 * Template Name: Main Page Template
 *
 * @package hurvitz
 * @since   hurvitz 1.0
 */
$hurvitz_acf_pro = class_exists('acf_pro');

get_header();

if ( $hurvitz_acf_pro && have_rows( 'shortcodes' ) ):
	while ( have_rows( 'shortcodes' ) ) : the_row();

		get_template_part( 'template-parts/content', get_row_layout() );

	endwhile;
endif;

get_footer();