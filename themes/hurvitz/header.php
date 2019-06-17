<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hurvitz
 */

$unitClass = class_exists('acf_pro') ? '' : 'unit';
if (class_exists('acf_pro') && !empty(get_field('color_primary', 'option')) ) :
	$color_primary = get_field('color_primary', 'option');
else :
	$color_primary = '#ffffff';
endif;

if (class_exists('acf_pro') && (get_field('enable_dark_version', 'option')) ) :
    $dark = ' dark';
endif;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="theme-color" content="<?php echo esc_attr($color_primary);?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- PRELOADER START -->
    <div class="preloader-wrap <?php echo esc_attr($dark);?>">
        <div class="preloader"></div>
    </div>
    <!-- PRELOADER END -->

    <?php
    if (class_exists('acf_pro')) {
	    $enable_sound_on_link_hover = get_field( 'enable_sound_on_link_hover', 'option' );
	    if ( $enable_sound_on_link_hover ):?>
            <audio id="sound-link" class="audio_on_hover" preload="auto">
			    <?php $template_url = get_template_directory_uri() . '/assets/audio/click.mp3' ?>
                <source src="<?php echo esc_url( $template_url ); ?>" type="audio/mpeg">
            </audio>
            <span id="click-block"></span>
	    <?php endif;
    }
    ?>
<div class="site-content <?php echo esc_attr( $unitClass ); ?>">

    <!-- The cursor elements -->
    <?php
        if ( class_exists('acf_pro') ) :
            $enable_custom_cursor = get_field('enable_custom_cursor', 'option');
            if ( $enable_custom_cursor ) :
                wp_enqueue_script( 'tweenmax-script', get_template_directory_uri() . '/assets/js/libs/TweenMax.min.js', array( 'jquery' ), '', true );
                wp_enqueue_script( 'cursor-script', get_template_directory_uri() . '/assets/js/cursor.js', array( 'jquery' ), '', true ); ?>
                <div class="circle-cursor circle-cursor--inner"></div>
                <div class="circle-cursor circle-cursor--outer"></div>
            <?php endif;
	    endif;
    ?>

    <?php if (!class_exists('acf_pro')){ ?>

        <div class="site-content__menu-wrap">
            <div class="site-content__logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </a>
            </div>
            <div class="site-content__site-menu">
                <?php hurvitz_main_menu('left-menu'); ?>
            </div>
        </div>

   <?php }

    if (class_exists('acf_pro')){
	    $add_background_image = get_field('add_background_image', 'option');
	    $background_image = get_field('background_image', 'option');
	    $add_background_color = get_field('add_background_color', 'option');
	    $page_background = get_field('page_background', 'option');
	    if ( $add_background_image && isset($background_image) && !empty($background_image) ) : ?>
            <div class="site-content__background-img">
                <img class="s-img-switch" src="<?php echo esc_attr($background_image['url']); ?>" alt="<?php echo esc_attr($background_image['title']); ?>">
            </div>
	    <?php endif;
	    if ( $add_background_color && isset($page_background) && !empty($page_background) ) : ?>
            <div class="site-content__background-color" style="background-color: <?php echo $page_background?>"></div>
	    <?php endif;

	    $add_animation_on_background = get_field('add_animation_on_background', 'option');
	    if ( $add_animation_on_background ):

		    //Enqueue styles
		    wp_enqueue_style( 'background-animation-styles', get_template_directory_uri() .'/assets/css/libs/fonts.css' );

		    //Enqueue scripts
		    wp_enqueue_script( 'p-five', get_template_directory_uri() . '/assets/js/libs/p5.min.js', array( 'jquery' ), '', true );

		    $background_color = get_field('background_color', 'option');
		    $animation_color_1 = get_field('animation_color_1', 'option');
		    $animation_color_2 = get_field('animation_color_2', 'option');
		    $animation_color_3 = get_field('animation_color_3', 'option');
		    ?>

            <div class="site-content__animation"
                 data-background-color="<?php echo esc_attr($background_color); ?>"
                 data-animation-color-1="<?php echo esc_attr($animation_color_1); ?>"
                 data-animation-color-2="<?php echo esc_attr($animation_color_2); ?>"
                 data-animation-color-3="<?php echo esc_attr($animation_color_3); ?>">
            </div>
		    <?php
		    wp_enqueue_script( 'sketch', get_template_directory_uri() . '/assets/js/libs/sketch.js', array( 'jquery' ), '', true );
	    endif;
    }

    ?>
    <div class="site-content__sidebar">
	    <?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar' ) ) {
	    } ?>
    </div>
    <span class="overlay"></span>
    <div class="site-content__inner">
        <div class="container height-100">
            <div class="row height-100 overflow-hidden">
                <div class="col-lg-6 p-0 site-content__inner-left">
	                <?php get_template_part('template-parts/content-head'); ?>
                </div>
                <div class="col-lg-6 p-0 site-content__inner-right">
                    <div class="site-content__page">
                        <div class="site-content__page-wrap">
	                        <?php get_template_part('template-parts/content-page'); ?>
