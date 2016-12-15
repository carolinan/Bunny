<?php
/**
 * Bunny functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bunny
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bunny_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bunny_content_width', 700 );
}
add_action( 'after_setup_theme', 'bunny_content_width', 0 );

function bunny_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 140,
		'width'       => 200,
		'flex-height' => false,
		'flex-width'  => true,
	) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'uploads'	=> false,
		'header-text'	 => true,
		'default-text-color'	=> '000000',
	) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array( 'header' => __( 'Header Navigation', 'bunny' ) ) );

	add_editor_style();

	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'bunny_setup' );

if ( ! function_exists( 'bunny_fonts_url' ) ) {
	function bunny_fonts_url() {
		$fonts_url = '';

		/*
		* Translators: If there are characters in your language that are not
		* supported by Oswald, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$oswald = _x( 'on', 'Oswald font: on or off', 'bunny' );

		/*
		* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$open_sans = _x( 'on', 'Open Sans font: on or off', 'bunny' );

		if ( 'off' !== $oswald || 'off' !== $open_sans ) {
			$font_families = array();
			if ( 'off' !== $oswald ) {
				$font_families[] = 'Oswald:400,700,300';
			}
			if ( 'off' !== $open_sans ) {
				$font_families[] = 'Open+Sans:400italic,400,700';
			}
			$query_args = array(
				'family' => rawurlencode( implode( '|', $font_families ) ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			);
			$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
		return esc_url_raw( $fonts_url );
	}
}

/**
 * Enqueue scripts and styles.
 */
function bunny_fonts_styles() {
	wp_enqueue_style( 'bunny-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bunny-fonts', bunny_fonts_url(), array(), null );

	// Only enqueue the scripts for the animation and arc if they are needed.
	if ( ! get_theme_mod( 'bunny_animation' ) ) {
		wp_enqueue_script( 'spritely', get_template_directory_uri() . '/inc/spritely.js', array( 'jquery' ) );
		wp_enqueue_style( 'bunny-clouds', get_template_directory_uri() . '/inc/clouds.css' );
		wp_enqueue_script( 'bunny-animation', get_template_directory_uri() . '/inc/bunnyanimation.js', array( 'jquery' ) );
	}

	if ( ! get_theme_mod( 'bunny_disable_arc' ) ) {
		// Prefixed, since changes where made to the script. The file also includes Lettering.js.
		wp_enqueue_script( 'bunny-circletype', get_template_directory_uri() . '/inc/circletype.js', array( 'jquery' ) );
		wp_enqueue_script( 'bunny-circletype-helper', get_template_directory_uri() . '/inc/circletype_helper.js', array( 'jquery' ) );

		$array = array(
			'headline' => esc_attr( get_theme_mod( 'bunny_title_arc_size','400' ) ),
			'tagine' => esc_attr( get_theme_mod( 'bunny_tagline_arc_size','400' ) ),
		);
		wp_localize_script( 'bunny-circletype-helper', 'bunny_text_radius', $array );
	}

	wp_enqueue_script( 'bunny-js', get_template_directory_uri() . '/inc/bunny.js', array( 'jquery' ) );

	/* Enqueue comment reply / threaded comments. */
	if ( ! is_admin() ) {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	// Add Easter eggs.
	if ( get_theme_mod( 'bunny_easter_eggs' ) ) {
		wp_enqueue_style( 'bunny-eggs', get_template_directory_uri() . '/inc/eggs.css' );
		// Add that Christmas feeling.
	} elseif ( get_theme_mod( 'bunny_christmas' ) ) {
		wp_enqueue_style( 'bunny-christmas', get_template_directory_uri() . '/inc/christmas.css' );
		// Spook things up.
	} elseif ( get_theme_mod( 'bunny_spooky' ) ) {
		wp_enqueue_style( 'bunny-spooky', get_template_directory_uri() . '/inc/spooky.css' );
	}

}
add_action( 'wp_enqueue_scripts', 'bunny_fonts_styles' );


function bunny_css() {
	echo '<style type="text/css">
	.site-title, .site-description { color: #' . esc_attr( get_header_textcolor() ) . ';}';

	if ( ! has_nav_menu( 'header' ) ) {
		echo '.site-title {margin-top: 6px;}';
	}

	if ( get_theme_mod( 'bunny_hide' ) ) {
		echo '#wrapper{margin: 40px auto auto auto;}
		#main{position: relative; overflow: auto; float: none; margin: 0 auto;}
		#footer{position: relative; overflow: auto; float: none; margin-top: 40px;}
		@media screen and (max-width: 840px){
			#wrapper{margin-top: 40px; margin-left: 1%;}
			.kaninsmall{display: none;}
		}
		@media screen and (max-width: 600px){
			.kaninsmall{display :none;}
		}';

		/*center the main content when there is no sidebar*/
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			echo '#main, #footer {display: block;}';
		}
	}

	if ( ! get_bloginfo( 'name' ) ) {
		echo '.site-description{margin-top: 90px;}';
	}

	if ( get_theme_mod( 'bunny_disable_arc' ) and get_bloginfo( 'name' ) ) {
		echo '.site-description{margin-top: -20px;}';
	}

	if ( get_theme_mod( 'bunny_disable_arc' ) and ! get_bloginfo( 'name' ) ) {
		echo '.site-description{margin-top: 60px;}';
	}

	if ( ! display_header_text() ) {
		echo '.logo{margin-bottom: 66px;}';
		echo '@media screen and (max-width: 1200px) {
			.has-menu .logo {
			    margin-bottom: 60px;
			}
		}';
	}

	echo '</style>';
}
add_action( 'wp_head', 'bunny_css' );

/**
 *	Add a class to body if the header-menu is active.
 *	This allows us to push down the clouds below the menu.
 */
function bunny_classes( $classes ) {
	if ( has_nav_menu( 'header' ) ) {
		$classes[] = 'has-menu';
	}
	return $classes;
}
add_filter( 'body_class', 'bunny_classes' );

/* Add title to read more links */
add_filter( 'get_the_excerpt', 'bunny_custom_excerpt_more',100 );
add_filter( 'excerpt_more', 'bunny_excerpt_more',100 );
add_filter( 'the_content_more_link', 'bunny_content_more', 100 );

function bunny_continue_reading( $id ) {
	return '<a href="' . get_permalink( $id ) . '">' . __( 'Read more: ', 'bunny' ) . get_the_title( $id ) . '</a>';
}

function bunny_content_more( $more ) {
	global $id;
	return bunny_continue_reading( $id );
}

function bunny_excerpt_more( $more ) {
	global $id;
	return '... ' . bunny_continue_reading( $id );
}

function bunny_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		global $id;
		$output .= ' ' . bunny_continue_reading( $id );
	}
	return $output;
}

/**
 * Add a title to posts that are missing title.
 */
function bunny_post_title( $title ) {
	if ( $title == '' ) {
		return __( 'Untitled', 'bunny' );
	} else {
		return $title;
	}
}
add_filter( 'the_title', 'bunny_post_title' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bunny_widgets_init() {
	register_sidebar(
		array(
		'name' => __( 'Sidebar', 'bunny' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widgets in this area will be shown in the right hand sidebar.', 'bunny' ),
		)
	);
	register_sidebar(
		array(
		'name' => __( 'Footer Widget area', 'bunny' ),
		'id' => 'sidebar-2',
		'description' => __( 'Widgets in this area will be shown in the footer.', 'bunny' ),
		)
	);
}
add_action( 'widgets_init', 'bunny_widgets_init' );


if ( ! function_exists( 'bunny_meta' ) ) {
	function bunny_meta() {
		if ( ! get_theme_mod( 'bunny_meta' ) ) {
		?>
			<div class="meta">
				<?php
				if ( get_avatar( get_the_author_meta( 'ID' ) ) ) {
					printf( ('<a href="%1$s" rel="author"><span class="screen-reader-text">%2$s</span>%3$s</a> '),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'bunny' ), get_the_author() ) ),
						get_avatar( get_the_author_meta( 'ID' ), 46 ),
						get_the_author()
					);
				} else {
					// if avatars are off, show a font-awesome icon instead.
					printf( ('<a href="%1$s" rel="author"><span class="screen-reader-text">%2$s</span><i class="author-links fa"></i></a> '),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'bunny' ), get_the_author() ) ),
						get_the_author()
					);
				}
				if ( ! post_password_required() ) {
					if ( comments_open() ) :
						comments_popup_link( '<span class="screen-reader-text">' . esc_html__( 'Leave a comment', 'bunny' ) . '</span><i class="comment-icon fa"></i>',
							'<span class="screen-reader-text">' . esc_html__( '1 Comment', 'bunny' ) . '</span><i class="comment-icon fa"></i>',
						'<span class="screen-reader-text">' . esc_html__( '% Comments', 'bunny' ) . '</span><i class="comment-icon fa"></i>', null, null );
						echo '&nbsp;';
					endif;
				}

				if ( count( get_the_category() ) ) {
					echo '<div class="cat-links-border">';
					echo '<span class="screen-reader-text">' . esc_html__( 'Categories: ','bunny' ) . '</span><i class="cat-links fa"></i>';
					echo get_the_category_list( ', ' );
					echo '</div> ';
				}

				if ( get_the_tag_list() ) {
					echo '<div class="tag-links-border">';
					echo '<span class="screen-reader-text">' . esc_html__( 'Tags: ','bunny' ) . '</span><i class="tag-links fa"></i>';
					echo get_the_tag_list( '', ', ' );
					echo '</div>';
				}

				edit_post_link( '<span class="screen-reader-text">' . esc_html__( 'Edit','bunny' ) . '</span><i class="edit-links fa"></i>' );
			?>
			</div>
		<?php
		}
	}
}

require get_template_directory() . '/inc/customizer.php';
