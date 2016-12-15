<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bunny
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() ) {
	?>
		<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <i class="pinned fa"></i></h1>
	<?php } else { ?>
		<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<?php }	?>
		<div class="post-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date( get_option( 'date_format' ) );?></a></div>
		<?php
		if ( strpos( $post->post_content,'[gallery' ) === false ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
		}
		the_content();
		wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'bunny' ), 'after' => '</div>' ) );
		bunny_meta();
		?>
</div>
