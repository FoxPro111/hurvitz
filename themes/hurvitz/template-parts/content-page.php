<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

$hurvitz_acf_pro = class_exists('acf_pro');
$id = isset( $post_id ) ? $post_id : get_the_ID();
?>

<header class="entry-header">
    <?php
    if ($hurvitz_acf_pro):
	    $home_title = get_sub_field( 'blog_title', $id ) ? get_sub_field( 'blog_title', $id ) : esc_html__('My Blog', 'hurvitz');
	    $title = (is_home()) ? $home_title : get_the_title( $id );
	    if ( is_single() ): ?>
            <h3 class="entry-title"><?php echo esc_html($title); ?></h3>
	    <?php else: ?>
            <h1 class="entry-title"><?php echo esc_html($title); ?></h1>
	    <?php endif;
    endif;
    ?>
</header>

