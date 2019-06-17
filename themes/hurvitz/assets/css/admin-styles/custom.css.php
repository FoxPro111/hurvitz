<?php
header("Content-type: text/css; charset: UTF-8"); ?>

/* ======= START THEME COLORS ======= */

/* ======= START COLOR WHITE ======= */
<?php $color_white = get_field( 'color_white', 'option');
if ( $color_white && $color_white !== '#ffffff' ) : ?>
body {
    --c-white: <?php echo esc_html($color_white) ?>;
}

<?php endif;
/* ======= END COLOR WHITE ======= */

/* ======= START COLOR BLACK ======= */
$color_black = get_field( 'color_black', 'option');
if ( $color_black && $color_black !== '#000000' ) : ?>
body {
    --c-black: <?php echo esc_html($color_black) ?>;
}

<?php endif;
/* ======= END COLOR BLACK ======= */

/* ======= START COLOR DARK ======= */
$color_dark = get_field( 'color_dark', 'option');
if ( $color_dark && $color_dark !== '#222222' ) : ?>
body {
    --c-dark: <?php echo esc_html($color_dark) ?>;
}

<?php endif;
/* ======= END COLOR DARK ======= */

/* ======= START COLOR SEMI DARK ======= */
$color_semi_dark = get_field( 'color_semi_dark', 'option');
if ( $color_semi_dark && $color_semi_dark !== '#333333' ) : ?>
body {
    --c-semi-dark: <?php echo esc_html($color_semi_dark) ?>;
}

<?php endif;
/* ======= END COLOR SEMI DARK ======= */

/* ======= START COLOR SEMI GREY ======= */
$color_semi_grey = get_field( 'color_semi_grey', 'option');
if ( $color_semi_grey && $color_semi_grey !== '#555555' ) : ?>
body {
    --c-semi-grey: <?php echo esc_html($color_semi_grey) ?>;
}

<?php endif;
/* ======= END COLOR SEMI GREY ======= */

/* ======= START COLOR GREY ======= */
$color_grey = get_field( 'color_grey', 'option');
if ( $color_grey && $color_grey !== '#888888' ) : ?>
body {
    --c-grey: <?php echo esc_html($color_grey) ?>;
}

<?php endif;
/* ======= END COLOR GREY ======= */

/* ======= START COLOR LIGHT GREY ======= */
$color_light_grey = get_field( 'color_light_grey', 'option');
if ( $color_light_grey && $color_light_grey !== '#bfbfbf' ) : ?>
body {
    --c-light-grey: <?php echo esc_html($color_light_grey) ?>;
}

<?php endif;
/* ======= END COLOR LIGHT GREY ======= */

/* ======= START COLOR SOFT GREY ======= */
$color_soft_grey = get_field( 'color_soft_grey', 'option');
if ( $color_soft_grey && $color_soft_grey !== '#eeeeee' ) : ?>
body {
    --c-soft-grey: <?php echo esc_html($color_soft_grey) ?>;
}

<?php endif;
/* ======= END COLOR SOFT GREY ======= */

/* ======= START COLOR PRIMARY ======= */
$color_primary = get_field( 'color_primary', 'option');
if ( $color_primary && $color_primary !== '#00c483' ) : ?>
body {
    --c-primary: <?php echo esc_html($color_primary) ?>;
}

<?php endif;
/* ======= END COLOR PRIMARY ======= */

/* ======= END THEME COLORS ======= */


/* ======= START PAGE COLORS ======= */
$post_id = isset($_GET['post']) && is_numeric($_GET['post']) ? $_GET['post'] : '' ;
$change_colors_on_this_page = get_field('change_colors_on_this_page', $post_id);
$colors_group = get_field('colors_group', $post_id);
if ( isset($change_colors_on_this_page) && !empty($change_colors_on_this_page) ):

/* ======= START COLOR WHITE ======= */
$color_white = $colors_group['color_white'];
if ( $color_white && $color_white !== '#ffffff' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-white: <?php echo esc_html($color_white) ?>;
}

<?php endif;
/* ======= END COLOR WHITE ======= */

/* ======= START COLOR BLACK ======= */
$color_black = $colors_group['color_black'];
if ( $color_black && $color_black !== '#000000' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-black: <?php echo esc_html($color_black) ?>;
}

<?php endif;
/* ======= END COLOR BLACK ======= */

/* ======= START COLOR DARK ======= */
$color_dark = $colors_group['color_dark'];
if ( $color_dark && $color_dark !== '#222222' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-dark: <?php echo esc_html($color_dark) ?>;
}

<?php endif;
/* ======= END COLOR DARK ======= */

/* ======= START COLOR SEMI DARK ======= */
$color_semi_dark = $colors_group['color_semi_dark'];
if ( $color_semi_dark && $color_semi_dark !== '#333333' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-semi-dark: <?php echo esc_html($color_semi_dark) ?>;
}

<?php endif;
/* ======= END COLOR SEMI DARK ======= */

/* ======= START COLOR SEMI GREY ======= */
$color_semi_grey = $colors_group['color_semi_grey'];
if ( $color_semi_grey && $color_semi_grey !== '#555555' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-semi-grey: <?php echo esc_html($color_semi_grey) ?>;
}

<?php endif;
/* ======= END COLOR SEMI GREY ======= */

/* ======= START COLOR GREY ======= */
$color_grey = $colors_group['color_grey'];
if ( $color_grey && $color_grey !== '#888888' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-grey: <?php echo esc_html($color_grey) ?>;
}

<?php endif;
/* ======= END COLOR GREY ======= */

/* ======= START COLOR LIGHT GREY ======= */
$color_light_grey = $colors_group['color_light_grey'];
if ( $color_light_grey && $color_light_grey !== '#bfbfbf' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-light-grey: <?php echo esc_html($color_light_grey) ?>;
}

<?php endif;
/* ======= END COLOR LIGHT GREY ======= */

/* ======= START COLOR SOFT GREY ======= */
$color_soft_grey = $colors_group['color_soft_grey'];
if ( $color_soft_grey && $color_soft_grey !== '#eeeeee' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-soft-grey: <?php echo esc_html($color_soft_grey) ?>;
}

<?php endif;
/* ======= END COLOR SOFT GREY ======= */

/* ======= START COLOR PRIMARY ======= */
$color_primary = $colors_group['color_primary'];
if ( $color_primary && $color_primary !== '#00c483' ) : ?>
body.page-id-<?php echo esc_attr($post_id); ?> {
    --c-primary: <?php echo esc_html($color_primary) ?>;
}

<?php endif;
/* ======= END COLOR PRIMARY ======= */

endif;
/* ======= END PAGE COLORS ======= */


/* ======= DARK VERSION START ======= */
$enable_dark_version = get_field('enable_dark_version', 'option');
if ( $enable_dark_version ) : ?>
body .site-content__inner-right,
body .site-content__sidebar,
body .left-menu {
    --c-dark: #ffffff;
    --c-white: #1c1e1f;
}

.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
    opacity: 0.1;
}

.hurvitz-sc__skills-line{
    background-color: var(--c-semi-dark);
}

.site-content__sidebar .search-wrap .search-field,
.site-content__sidebar select{
    border-color: var(--c-semi-dark);
}

<?php endif;
/* ======= DARK VERSION END ======= */


/* ======= START CURSOR SETTING ======= */
$enable_custom_cursor = get_field('enable_custom_cursor', 'option');
if ( $enable_custom_cursor ) : ?>
.site-content:not(.unit),
.site-content:not(.unit) a,
.site-content:not(.unit) .mCSB_scrollTools .mCSB_dragger {
    cursor: none;
}

<?php endif;
/* ======= END CURSOR SETTING ======= */

