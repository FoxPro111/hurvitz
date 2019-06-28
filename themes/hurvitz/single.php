<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hurvitz
 */

get_header();

get_template_part('template-parts/content', 'breadcrumbs');

while ( have_posts() ) : the_post();

	?>
	<div class="hr-single">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-9">
					<h2 class="hr-single__title"><?php echo get_the_title(); ?></h2>
					<ul class="hr-single__top">
						<li class="hr-single__top-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<li class="hr-single__top-author"><i class="far fa-user"></i><?php echo get_the_author(); ?></li>
						<li class="hr-single__top-category"><i class="fas fa-edit"></i><?php the_category(', '); ?></li>
					</ul>
					<?php hurvitz_post_thumbnail(); ?>
					<div class="hr-single__content"><?php the_content(); ?></div>
				</div>
				<div class="col-12 col-md-3 sidebar">
					<?php if ( !dynamic_sidebar('sidebar') ) {

					} ?>
				</div>
			</div>
		</div>
	</div>

	<?php wp_link_pages('link_before=<span class="pages">&link_after=</span>&before=<div class="post-nav"> <span>' . esc_html__("Page:", 'hurvitz') . ' </span> &after=</div>'); ?>
<?php endwhile;
get_footer();