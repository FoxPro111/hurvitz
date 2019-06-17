<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hurvitz
 */

get_header();?>

    <div class="hurvitz-single hurvitz-single__top">
        <div class="hurvitz-single__top-info">
            <div class="hurvitz-single__top-date"><?php echo get_the_time( 'M j' ); ?></div>
            <div class="hurvitz-single__top-category"><?php the_category(); ?></div>
        </div>
		<?php
		$feature_img = get_the_post_thumbnail_url();
		if ( ! empty( $feature_img ) ): ?>
            <div class="hurvitz-single__top-img"><img src="<?php echo esc_url( $feature_img ); ?>" alt=""></div>
		<?php endif;
		?>
    </div>

<?php
while ( have_posts() ) : the_post();
	?>
    <div class="hurvitz-single__main">
        <div class="hurvitz-single__main-content">
            <div class="hurvitz-single__main-text"><?php the_content(); ?></div>
            <div class="hurvitz-single__main-tag">
				<?php the_tags( 'Tags: ', ', ', '' ); ?>
            </div>
        </div>
        <div class="hurvitz-single__main-links">
            <div class="pagination"><p><?php previous_post_link(); ?></p></div>
            <div class="pagination"><p><?php next_post_link(); ?></p></div>
        </div>
        <div class="hurvitz-single__comments">
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
        </div>
    </div>

<?php wp_link_pages( 'link_before=<span class="pages">&link_after=</span>&before=<div class="post-nav"> <span>' . esc_html__( "Page:", 'hurvitz' ) . ' </span> &after=</div>' ); ?>
<?php endwhile;
get_footer();