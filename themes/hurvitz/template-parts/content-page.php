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
	<h1 class="entry-title"><?php echo esc_html($title); ?></h1>
</header>

