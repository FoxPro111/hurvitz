<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrap">
		<div class="post-thumb">
			<?php hurvitz_post_thumbnail();

			$categories = get_the_category();

			$category = [];
			if ( !empty($categories) ) {
				foreach ( $categories as $key => $item ) {
					$category[$key]['name'] = $item->name;
					$category[$key]['link'] = get_category_link($item->term_id);
				}
			}

			if ( $category ) {
				?>
				<div class="post-categories">
					<?php foreach ( $category as $item ) { ?>
						<a href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['name']); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="post-info">
			<header class="entry-header">
				<?php
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				?>
			</header><!-- .entry-header -->
			<div class="post-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark"
			   class="post-link"><?php esc_html_e('Read More', 'hurvitz') ?></a>
		</div>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->
