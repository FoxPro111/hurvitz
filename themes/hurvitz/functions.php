<?php
/**
 * hurvitz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hurvitz
 */

if ( ! function_exists( 'hurvitz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hurvitz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hurvitz, use a find and replace
		 * to change 'hurvitz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hurvitz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'hurvitz' ),
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hurvitz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hurvitz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hurvitz_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hurvitz_content_width', 640 );
}
add_action( 'after_setup_theme', 'hurvitz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hurvitz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hurvitz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hurvitz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'hurvitz_widgets_init' );


/**
 * Register fonts
 */
if ( ! function_exists( 'hurvitz_fonts_url' ) ) {
	function hurvitz_fonts_url() {
		$font_url = '';
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'hurvitz' ) ) {
			$fonts    = array(
				'Roboto:400,500,500i,700,900',
			);
			$font_url = add_query_arg( 'family', ( implode( '|', $fonts ) . "&subset=latin,latin-ext" ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}
}

/**
 * Enqueue scripts and styles.
 */
function hurvitz_scripts() {
	wp_enqueue_style( 'hurvitz-fonts', hurvitz_fonts_url(), array(), '1.0.0' );


	// register style
	wp_enqueue_style( 'hurvitz-theme', get_template_directory_uri() . '/style.css' );
	//Enqueue styles
    wp_enqueue_style( 'swiper',    get_template_directory_uri() .'/assets/css/swiper.min.css' );
    wp_enqueue_style( 'bootstrap',    get_template_directory_uri() .'/assets/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome',    get_template_directory_uri() .'/assets/css/font-awesome.css' );
    wp_enqueue_style( 'hurvitz-main',    get_template_directory_uri() .'/assets/css/main.css', '', '1.0.5' );


	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'hurvitz', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.5', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_localize_script( 'jquery', 'js_data',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'siteurl' => get_template_directory_uri(),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'hurvitz_scripts' );

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * ACF Options.
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


//
//function get_acf_theme_options() {
//	$query = new WP_Query( array(
//		'post_parent' => 9,
//		'post_type' => 'acf-field',
//		'posts_per_page' => -1,
//		'post_status' => 'publish'
//	) );
//
//	$res_options = array();
//
//	foreach ( $query->get_posts() as $post_item ) {
//
//		$option_key = 'options_' . $post_item->post_excerpt;
//		$option_count = get_option( $option_key );
//
//		$res_options[ $option_key ] = $option_count;
//		$res_options[ '_' . $option_key ] = $post_item->post_name;
//
//		if ( is_numeric( $option_count ) ) {
//
//			$child_post = get_posts( array(
//				'post_parent' => $post_item->ID,
//				'post_type' => 'acf-field'
//			) );
//
//			if ( ! empty( $child_post ) ) {
//
//				foreach ( $child_post as $post_child_item ) {
//
//					$child_oprion_key = $post_child_item->post_excerpt;
//
//					for( $i = 0; $i <= $option_count; $i++ ) {
//						$shild_option_key = $option_key . '_' . $i . '_' . $child_oprion_key;
//						$child_oprion_val = get_option( $shild_option_key );
//
//						if ( ! empty( $child_oprion_val ) ) {
//							$res_options[ $shild_option_key ] = $child_oprion_val;
//							$res_options[ '_' . $shild_option_key ] = $post_child_item->post_name;
//						}
//					}
//
//
//				}
//
//			}
//
//
//		}
//
//
//	}
//
//	return json_encode( $res_options );
//}









