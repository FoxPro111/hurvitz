<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

$hurvitz_acf_pro = class_exists('acf_pro');
$sticky = is_sticky() ? 'sticky' : '';
$post_thumbnail = get_the_post_thumbnail();

?>
<div class="hurvitz-blog__item grid-item <?php echo esc_attr($sticky);?>">
    <div class="hurvitz-blog__item-top">
        <?php

        $post_format = $hurvitz_acf_pro ? get_field('post_format') : 'Image';
        if ( $post_format == 'Image' ) : ?>
            <div class="hurvitz-blog__item-img">
                <?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
            </div>
        <?php endif;
        if ( $post_format == 'Video' ) : ?>
            <div class="hurvitz-blog__item-video">
                <?php the_field('post_video'); ?>
            </div>
        <?php endif;
        if ( $post_format == 'Quotes' ) : ?>
            <div class="hurvitz-blog__item-quote">
                <div class="hurvitz-blog__item-quote-text"><?php the_field('post_quotes_text'); ?></div>
                <div class="hurvitz-blog__item-quote-author">- <?php the_field('post_quotes_author'); ?></div>
            </div>
        <?php endif;
        if ( $post_format == 'Gallery' ) : ?>
            <div class="hurvitz-blog__item-gallery">
                <?php if( have_rows('post_gallery' ) ): ?>
                    <div class="zoom-gallery">
                        <?php

	                        while ( have_rows( 'post_gallery' ) ) : the_row();
		                        $gallery_image = get_sub_field( 'gallery_item' );
		                        ?>
                                <div class="hurvitz-blog__item-gallery-item">
                                    <a href="<?php echo esc_url( $gallery_image['url'] ); ?>"
                                       style="background-image: url('<?php echo esc_url( $gallery_image['url'] ); ?>'); ?>">
                                        <img src="<?php echo esc_url( $gallery_image['url'] ); ?>">
                                        <span class="hidden-block"></span>
                                    </a>
                                </div>
	                        <?php endwhile;

                        ?>
                    </div>
                <?php endif;
                ?>
            </div>
        <?php endif; ?>
        <?php
            if(!empty($post_thumbnail) && isset($post_thumbnail)){ ?>
                <div class="hurvitz-blog__item-date-top"><?php echo get_the_time( 'M d'); ?></div>
            <?php }
        ?>
    </div>
    <div class="hurvitz-blog__item-bottom">
        <svg class="sticky_icon" contentScriptType="text/ecmascript" contentStyleType="text/css" enable-background="new 0 0 220 227"
             height="23.833999633789062px" id="Layer_1" preserveAspectRatio="xMidYMid meet" version="1.0"
             viewBox="91.57300186157227 82.5 23.833999633789062 23.833999633789062" width="23.833999633789062px"
             xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             zoomAndPan="magnify"><g><polygon fill="#434343" points="107.936,95.459 99.042,95.459 99.042,93.517 101.019,92.514 101.019,88.508 99.042,87.318    99.042,84.605 107.936,84.605 107.936,87.506 105.961,88.508 105.961,92.514 107.938,93.453  "/>
                <polygon fill="#434343" points="104.979,95.479 102.061,95.479 102.061,98.395 103.542,106.334 104.979,98.395  "/>
                <rect fill="#434343" height="0.918" width="8.874" x="99.042" y="82.5"/></g>
        </svg>
        <a href="<?php the_permalink(); ?>" class="hurvitz-blog__item-title"><?php the_title(); ?></a>
	    <?php
	    if(empty($post_thumbnail)){ ?>
            <div class="hurvitz-blog__item-date-bottom"><?php echo get_the_time( 'M d'); ?></div>
	    <?php }
	    ?>
        <div class="hurvitz-blog__item-excerpt"><?php the_excerpt(); ?></div>
    </div>
</div>