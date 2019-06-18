<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package hurvitz
 */


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
	function hurvitz_main_menu( $theme_location = 'primary' ) {
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