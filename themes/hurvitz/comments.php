<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-block">
    <div class="comments" id="comments">
		<?php if ( get_comments_number() > 0 ) { ?>
            <h4 class="comments-title"><?php comments_number( '0 Comments', '1 Comment', '% comments' ); ?></h4>
		<?php } ?>

		<?php
		wp_list_comments( array(
			'callback'   => 'hurvitz_comment',
			'short_ping' => true,
		) );
		?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'hurvitz' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'hurvitz' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'hurvitz' ) ); ?></div>
            </nav>
		<?php endif; ?>

    </div>
</div>
<div class="reply-block">
    <h5 class="contact-form"><?php esc_html_e( 'Leave a Reply', 'hurvitz' ); ?></h5>
	<?php
	comment_form(
		array(
			'id_form'              => 'comment-form',
			'fields'               => array(
				'author' => '<input name="author" type="text" placeholder="' . esc_html__( 'Name', 'hurvitz' ) . '" required />',
				'email'  => '<input name="email" type="email" placeholder="' . esc_html__( 'Email', 'hurvitz' ) . '" required />'
			),
			'comment_field'        => '<textarea cols="30"  name="comment" rows="10" placeholder="' . esc_html__( 'Message', 'hurvitz' ) . '" required></textarea>',
			'must_log_in'          => '',
			'logged_in_as'         => '',
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'title_reply'          => '',
			'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'hurvitz' ),
			'cancel_reply_link'    => esc_html__( 'Cancel', 'hurvitz' ),
			'label_submit'         => esc_html__( 'SUBMIT', 'hurvitz' ),
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s-btn" value="%4$s" />',
			'submit_field'         => '%1$s %2$s',
		)
	);
	?>
</div>
