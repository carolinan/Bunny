<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bunny
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() ) {
		?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <i class="pinned fa"></i></h2>
		<?php
	} else {
		?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
	}
	?>

	<div class="post-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></div>
	<?php
	if ( strpos( $post->post_content,'[gallery' ) === false ) {

		if ( has_post_thumbnail() ) {
			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
			the_post_thumbnail();
			echo '<span class="screen-reader-text">' . esc_html__( 'Follow this link to read the post.', 'bunny' ) . ' </span>';
			echo '</a>';
		}
	}
	the_content();
	wp_link_pages(
		array(
			'before' => '<div class="page-link">' . __( 'Pages: ', 'bunny' ),
			'after'  => '</div>',
		)
	);
	bunny_meta();
	?>
</article>