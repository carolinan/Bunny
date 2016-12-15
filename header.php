<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bunny
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="skip-link screen-reader-text"><?php esc_html_e( 'Skip to content', 'bunny' );?></a>
<div id="header" role="banner">
	<?php
	if ( has_nav_menu( 'header' ) ) {
		wp_nav_menu( array( 'theme_location' => 'header', 'container' => 'div', 'container_id' => 'header-menu' ) );
	}
	?>
	<div class="logo">
	<?php
	if ( has_custom_logo() ) {
		the_custom_logo();
	} elseif ( ! get_theme_mod( 'bunny_hide' ) ) {
		echo '<img src="' . get_template_directory_uri() . '/images/cloud-large.png" height="146" width="316" alt="" />';
	}
	?>
	</div>
	<?php
	if ( get_bloginfo( 'name' ) && display_header_text() ) {
	?>
		<h1 class="site-title" id="headline"><?php bloginfo( 'name' ); ?></h1>
	<?php
	}
	if ( get_bloginfo( 'description' ) && display_header_text() ) {
	?>
		<h2 class="site-description" id="tagline"><?php bloginfo( 'description' ); ?></h2>
	<?php
	}

	if ( has_nav_menu( 'header' ) ) {
		echo '<button id="mobile-menu"><img src="' . get_template_directory_uri() . '/images/burger.png">' . esc_html__( 'Menu', 'bunny' ) . '</button>';
		wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'nav-menu' ) );
	}
	?>
</div>
<?php
// Hide these if the 'hide images' option is chosen.
if ( ! get_theme_mod( 'bunny_hide' ) ) {
?>
	<div id="sol" class="sol"></div>
	<div id="far-clouds" class="far-clouds"></div>
	<div id="near-clouds" class="near-clouds"></div>
	<div id="kaninf" class="kanin"></div>
	<div id="grass" class="grass"></div>
<?php
}
?>
<div id="wrapper">
	<div id="main" role="main">
