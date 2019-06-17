<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package hurvitz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hurvitz_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'hurvitz_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hurvitz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'hurvitz_pingback_header' );

/**
 * Show menu
 */
if(!function_exists('hurvitz_main_menu')) {
	function hurvitz_main_menu( $theme_location = 'left-menu' ) {
	    if ( has_nav_menu( $theme_location ) ) {
            wp_nav_menu( array(
                'theme_location' => $theme_location,
                'menu_id'        => $theme_location,
            ) );
		}
		else{
		   echo '<div class="no-menu">' . esc_html__( 'Please register Top Navigation from', 'hurvitz' ) . ' <a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance &gt; Menus', 'hurvitz' ) . '</a></div>';
		}
	}
}

/**
 *
 * Create custom html structure for comments
 *
 */
function hurvitz_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $reply_class = ( $comment->comment_parent ) ? 'indented' : '';
    switch ( $comment->comment_type ):
        case 'pingback':
        case 'trackback': ?>
            <div class="pingback">
                <?php esc_html_e( 'Pingback:', 'hurvitz' ); ?> <?php comment_author_link(); ?>
                <?php edit_comment_link( esc_html__( '(Edit)', 'hurvitz' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
            <?php
            break;
        default:
            // generate comments
            ?>
        <div <?php comment_class('ct-part'); ?> id="li-comment-<?php comment_ID(); ?>">
            <div class="comm-block" id="comment-<?php comment_ID(); ?>">
                <div class="comm-img">
                    <?php print get_avatar( $comment, 60 ); ?>
                </div>
                <div class="comm-meta">
                    <div class="date-author">
                        <div><span class="name"><?php comment_author(); ?></span><span class="date"><?php comment_date( get_option( 'date_format' ) ); ?></span></div>
                    </div>
                    <div class="comm-txt">
                        <?php comment_text(); ?>
                    </div>
                    <?php
                    comment_reply_link(
                        array_merge( $args,
                            array(
                                'reply_text' => esc_html__( 'Reply', 'hurvitz' ),
                                'after' => '',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth']
                            )
                        )
                    );
                    ?>
                </div>

            </div>
            <?php
            break;
    endswitch;
}

/*
 *
 * Add custom class to menu item
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
function prefix_add_custom_class_menu_item( $classes, $item ) {

    $hurvitz_acf_pro = class_exists('acf_pro');
    if ( $hurvitz_acf_pro && get_field( 'enable_onepage_style', 'option' ) && is_page_template( 'page-tamplates/main-template.php' ) ) {
	    $classes[] = "js-load-post";
    }


	return $classes;
}

add_filter( 'nav_menu_css_class' , 'prefix_add_custom_class_menu_item' , 10 , 2 );

/*
 *
 * Add custom attribute to menu item
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
function prefix_add_custom_attr_menu_item( $atts, $item, $args ) {
    $hurvitz_acf_pro = class_exists('acf_pro');

	if ( $hurvitz_acf_pro && get_field( 'enable_onepage_style', 'option' ) && is_page_template( 'page-tamplates/main-template.php' ) ) {
		$atts['data-page-id'] = $item->object_id;
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'prefix_add_custom_attr_menu_item', 10, 3 );

/*
 *
 * Load post with ajax
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
function hurvitz_ajax_load_post_callback() {

    if ( ! defined( 'DOING_AJAX' ) && ! DOING_AJAX ) return;

	$post_id = isset( $_POST['post_id'] ) ? $_POST['post_id'] : 0;

    ob_start();

	include( locate_template( 'template-parts/content-page.php', false, false ) );

    if ( get_option( 'page_for_posts' ) == $post_id ) {
        $args = [
            'post_type'         => 'post',
            'posts_per_page'    =>  get_option( 'posts_per_page' ),
        ];
        $blog_posts = new WP_Query( $args );
        if ( $blog_posts->have_posts() ) : ?>
            <div class="hurvitz-blog">
                <div class="hurvitz-blog__list grid">
                    <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
                        get_template_part( 'template-parts/content', 'blog' );
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif;
    } else {
	    if ( have_rows( 'templates', $post_id ) ):
		    while ( have_rows( 'templates', $post_id ) ) : the_row();

			    $template_parts = ['about', 'services', 'pricing', 'counter', 'clients', 'contacts', 'contact_form', 'portfolio', 'skills', 'experience'];

			    foreach ( $template_parts as $part ) {
				    if ( get_row_layout() == $part ):
					    get_template_part( 'template-parts/content', $part );
				    endif;
			    }

		    endwhile;
	    endif;
    }

	$content = ob_get_contents();

	ob_end_clean();

	wp_send_json( $content );
}

add_action( 'wp_ajax_hurvitz_ajax_load_post', 'hurvitz_ajax_load_post_callback' );
add_action( 'wp_ajax_nopriv_hurvitz_ajax_load_post', 'hurvitz_ajax_load_post_callback' );


/*
 *
 * Add custom icons to ACF
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
add_filter( 'acf_icon_path_suffix', 'acf_icon_path_suffix' );

function acf_icon_path_suffix( $path_suffix ) {
	return 'assets/img/acf/';
}

/*
 *
 * Add custom icons to menu
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
// define the nav_menu_css_class callback
function filter_nav_menu_css_class( $array, $item, $args, $depth ) {
    $hurvitz_acf_pro = class_exists('acf_pro');
    if ( $hurvitz_acf_pro ) {
        // make filter magic happen here...
	    $menu_icon = get_field('menu_icon', $item->ID);

	    if($menu_icon) {
		$array[] = 'icon_for_child';
		$array[] = $menu_icon;
	    }
	    return $array;
    }else{
       return $array;
    }
};

// add the filter
add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_class', 10, 4 );

/*
 *
 * Add Google Maps API key
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
function my_acf_google_map_api( $api ){
	$api_key = get_field('api_key', 'option');

	$api['key'] = "{$api_key}";

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*
 *
 * Include custom.css file
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
add_action( 'wp_footer', 'hurvitz_enqueue_main_style' );

function hurvitz_enqueue_main_style() {
	global $post;

	if ( is_page() || is_home() ) {
		$post_id = get_queried_object_id();
	} else {
		$post_id = get_the_ID();
	}

	wp_enqueue_style( 'hurvitz_dynamic-css', admin_url( 'admin-ajax.php' ) . '?action=hurvitz_dynamic_css&post=' . $post_id, array( 'hurvitz-theme-css' ) );
}

if ( ! function_exists( 'hurvitz_dynamic_css' ) ) {
	function hurvitz_dynamic_css() {
		require_once get_template_directory() . '/assets/css/admin-styles/custom.css.php';
		wp_die();
	}
}
add_action( 'wp_ajax_nopriv_hurvitz_dynamic_css', 'hurvitz_dynamic_css' );
add_action( 'wp_ajax_hurvitz_dynamic_css', 'hurvitz_dynamic_css' );


/*
 *
 * Include editor styles
 * @since 1.0.0
 * @version 1.0.0
 *
 **/
if ( ! function_exists( 'hurvitz_add_editor_styles' ) ) {
	function hurvitz_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
}
add_action( 'admin_init', 'hurvitz_add_editor_styles' );