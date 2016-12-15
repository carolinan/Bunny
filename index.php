<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bunny
 */

get_header();

if ( have_posts() ) {
	if ( is_archive() ) {
		the_archive_title( '<h1 class="archive-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	} elseif ( is_search() ) {?>
		<div class="search-post">
			<h1 class="search-title"><?php printf( esc_html( 'Search Results for: %s', 'bunny' ), get_search_query() ); ?></h1>		
			<?php get_search_form(); ?>
			<br/>
		</div>
	<?php
	}
	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
	endwhile;

	the_posts_navigation( array( 'prev_text' => __( '&larr; Previous page','bunny' ), 'next_text' => __( 'Next page &rarr;', 'bunny' ) ) );

} else {
	if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bunny' ),
			array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php
	} elseif ( is_search() ) { ?>
		<div class="search-post">
			<h1 class="post-title"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bunny' ); ?></h1>	
			<?php get_search_form(); ?>
			<br/>
		</div>
	<?php
	} elseif ( is_404() ) {
		?>
		<div class="search-post">
			<h1 class="post-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found. Perhaps searching can help.', 'bunny' ); ?></h1>	
			<?php get_search_form(); ?>
			<br/>
		</div>
	<?php
	} else { ?>
		<div class="search-post">
			<h1 class="post-title"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bunny' ); ?></h1>	
			<?php get_search_form(); ?>
			<br/>
		</div>
	<?php
	}
}

?>
<br/><br/>
</div>
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) {
	get_sidebar();
}

get_footer();
