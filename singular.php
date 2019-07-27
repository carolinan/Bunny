<?php
/**
 * The template for displaying all single posts and pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bunny
 */

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="post-title"><?php the_title(); ?></h2>
		<div class="post-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></div>
		<?php
		if ( is_attachment() ) {
			echo '<div class="fullimg">' . wp_get_attachment_image( '', 'full' ) . '</div>';
			if ( ! empty( $post->post_excerpt ) ) :
				echo '<br /><p>' . the_excerpt() . '</p>';
			endif;
		} else {
			the_content();
		}
		wp_link_pages(
			array(
				'before' => '<div class="page-link">' . __( 'Pages: ', 'bunny' ),
				'after'  => '</div>',
			)
		);
		bunny_meta();
		?>
	</article><!-- end post -->
	<?php
	if ( is_single() ) {
		the_post_navigation(
			array(
				'prev_text' => __( '&larr; Previous post','bunny' ),
				'next_text' => __( 'Next post &rarr;', 'bunny' ),
			)
		);
	}
	comments_template( '', true );
}
?>
</main><!-- end main -->
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) {
	get_sidebar();
}

get_footer();
