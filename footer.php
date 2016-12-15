<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bunny
 */

if ( is_active_sidebar( 'sidebar-2' ) ) {
	echo '<div id="footer" role="contentinfo"><ul class="sidebar-inner">';
		dynamic_sidebar( 'sidebar-2' );
	echo '</ul></div>';
}
?>
</div>
<div id="kaninsmall" class="kaninsmall"></div>
<?php
/*Add easter eggs and christmas*/
if ( get_theme_mod( 'bunny_easter_eggs' ) || get_theme_mod( 'bunny_christmas' ) || get_theme_mod( 'bunny_spooky' ) ) {
	echo '<div class="egg2"></div>
	<div class="egg1"></div>';
}

wp_footer();
?>
</body>
</html>
