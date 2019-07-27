<?php
/**
 *  Bunny Theme Customizer.
 *
 * @package bunny
 */

/**
 * Add settings and controls for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bunny_customizer( $wp_customize ) {

	$wp_customize->remove_section( 'header_image' ); /*We are not actually using a header image, only the text options.*/

	$wp_customize->add_panel(
		'bunny_options_panel',
		array(
			'title' => __( 'Theme Options', 'bunny' ),
			'priority' => 210,
		)
	);

	$wp_customize->add_section(
		'bunny_section_one',
		array(
			'title' => __( 'Arc Settings', 'bunny' ),
			'priority' => 10,
			'panel' => 'bunny_options_panel',
		)
	);

	$wp_customize->add_section(
		'bunny_section_two',
		array(
			'title'    => __( 'Meta Settings', 'bunny' ),
			'priority' => 210,
			'panel'   => 'bunny_options_panel',
		)
	);

	$wp_customize->add_section(
		'bunny_section_three',
		array(
			'title'    => __( 'Image Settings', 'bunny' ),
			'priority' => 210,
			'panel'    => 'bunny_options_panel',
		)
	);

	$wp_customize->add_section(
		'bunny_section_four',
		array(
			'title'    => __( 'Animation Settings', 'bunny' ),
			'priority' => 210,
			'panel'    => 'bunny_options_panel',
		)
	);

	$wp_customize->add_setting(
		'bunny_title_arc_size',
		array(
			'sanitize_callback' => 'bunny_sanitize_arc_value',
			'default' => '400',
		)
	);
	$wp_customize->add_control(
		'bunny_title_arc_size',
		array(
			'type'    => 'text',
			'label'   => __( 'Adjust the value of the arc to match the length of your site title. Set a small number for a high arc, and high number for a low arc.', 'bunny' ),
			'section' => 'bunny_section_one',
		)
	);

	$wp_customize->add_setting(
		'bunny_tagline_arc_size',
		array(
			'sanitize_callback' => 'bunny_sanitize_arc_value',
			'default' => '400',
		)
	);
	$wp_customize->add_control(
		'bunny_tagline_arc_size',
		array(
			'type'    => 'text',
			'label'   => __( 'Adjust the value of the arc to match the length of your tagline', 'bunny' ),
			'section' => 'bunny_section_one',
		)
	);

	$wp_customize->add_setting(
		'bunny_disable_arc',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'bunny_disable_arc',
		array(
			'type' => 'checkbox',
			'label' => __( 'Check this box to disable the arc.', 'bunny' ),
			'section' => 'bunny_section_one',
		)
	);

	$wp_customize->add_setting(
		'bunny_easter_eggs',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'bunny_easter_eggs',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to turn Bunny into the Easter bunny!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);
	$wp_customize->add_setting(
		'bunny_christmas',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bunny_christmas',
		array(
			'type' 	  => 'checkbox',
			'label'   => __( 'Check this box to add that Christmas feeling!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);

	$wp_customize->add_setting(
		'bunny_spooky',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'bunny_spooky',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to spook things up!', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);

	$wp_customize->add_setting(
		'bunny_hide',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('bunny_hide',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to hide all decorative images.', 'bunny' ),
			'section' => 'bunny_section_three',
		)
	);

	$wp_customize->add_setting(
		'bunny_replace',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'bunny_replace',
			array(
				'description' => __( 'The image needs to be 436 x 443 pixels', 'bunny' ),
				'label'       => __( 'Upload an image to replace the bunny', 'bunny' ),
				'height'      => 443,
				'width'       => 436,
				'flex_width'  => false,
				'flex_height' => false,
				'section'     => 'bunny_section_three',
			)
		)
	);

	$wp_customize->add_setting(
		'bunny_animation',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'bunny_animation',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to stop the animations.', 'bunny' ),
			'section' => 'bunny_section_four',
		)
	);

	$wp_customize->add_setting(
		'bunny_meta',
		array(
			'sanitize_callback' => 'bunny_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'bunny_meta',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Check this box to hide the meta information (post author, categories, tags, edit button).', 'bunny' ),
			'section' => 'bunny_section_two',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'bunny_meta',
		array(
			'selector'            => '.meta',
			'container_inclusive' => true,
			'render_callback'     => 'bunny_meta',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title',
			'render_callback' => get_bloginfo( 'name' ),
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => get_bloginfo( 'description' ),
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'the_custom_logo',
		array(
			'selector'        => '.custom-logo-link',
			'render_callback' => get_custom_logo(),
		)
	);

}
add_action( 'customize_register', 'bunny_customizer' );

function bunny_sanitize_arc_value( $value ) {
	$value = (int) $value;
	return ( 0 < $value ) ? $value : null;
}

/**
 * Checkbox sanitization callback, from https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function bunny_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 * 
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function bunny_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}