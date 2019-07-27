<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bunny
 */

/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments">
<?php if ( have_comments() ) { ?>
	<div class="comment-header">
		<h2 id="comments-title">
		<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'bunny' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		?>
		</h2>
	</div>
	<?php
	the_comments_navigation(
		array(
			'prev_text' => __( '&larr; Older Comments', 'bunny' ),
			'next_text' => __( 'Newer Comments &rarr;', 'bunny' ),
		)
	);
	?>
	<ol class="commentlist">
		<?php
		wp_list_comments(
			array(
				'avatar_size' => 46,
			)
		);
		?>
	</ol>
	<?php
	the_comments_navigation(
		array(
			'prev_text' => __( '&larr; Older Comments', 'bunny' ),
			'next_text' => __( 'Newer Comments &rarr;', 'bunny' ),
		)
	);
} // End if().

comment_form();
?>
</section><!--  end comments -->
