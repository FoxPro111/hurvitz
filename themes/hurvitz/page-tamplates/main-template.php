<?php
/**
 * Template Name: Main Page Template
 *
 * @package hurvitz
 * @since   hurvitz 1.0
 */
$hurvitz_acf_pro = class_exists('acf_pro');

get_header();

if ( $hurvitz_acf_pro && have_rows( 'templates' ) ):
	while ( have_rows( 'templates' ) ) : the_row();

		$template_parts = ['about', 'services', 'pricing', 'counter', 'clients', 'contacts', 'contact_form', 'portfolio', 'skills', 'experience'];

		foreach ( $template_parts as $part ) :
			if ( get_row_layout() == $part ):
				get_template_part( 'template-parts/content', $part );
			endif;
		endforeach;

	endwhile;
endif;

get_footer();