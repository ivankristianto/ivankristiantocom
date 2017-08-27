<?php

function calibrefx_customize_register( $wp_customize ) {
	global $calibrefx;
	
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->add_section( 'calibrefx_layout_settings', array(
		'title'         => __( 'Layout Settings', 'calibrefx' ),
		'priority'      => 35,
	) );

	$wp_customize->add_setting( 'calibrefx-settings[layout_type]', array(
		'sanitize_callback' => 'calibrefx_sanitize_layout_type',
		'capability'    	=> 'manage_options',
	) );

	$wp_customize->add_control( 'calibrefx-settings[layout_type]', array(
		'label'         => __( 'Default Layout Type', 'calibrefx' ),
		'section'       => 'calibrefx_layout_settings',
		'type'          => 'select',
		'choices' 		=> array(
								'fluid'   => __( 'Fluid Layout', 'calibrefx' ),
								'static'  => __( 'Static Layout', 'calibrefx' ),
							),
		'priority'      => 1,
	) );

	$wp_customize->add_setting( 'calibrefx-settings[calibrefx_layout_width]', array(
		'default'       	=> 960,
		'type'          	=> 'theme_mod',
		'sanitize_callback' => 'calibrefx_sanitize_layout_width',
		'capability'    	=> 'edit_theme_options',
	) );

	$wp_customize->add_control( 'calibrefx-settings[calibrefx_layout_width]', array(
		'label'         => __( 'Layout Width', 'calibrefx' ),
		'section'       => 'calibrefx_layout_settings',
		'type'          => 'text',
		'priority'      => 2,
	) );

	/*$wp_customize->add_setting( 'calibrefx-settings[site_layout]', array(
		'default'       	=> '',
		'type'          	=> 'theme_mod',
		'sanitize_callback' => 'calibrefx_sanitize_layout_width',
		'capability'    	=> 'edit_theme_options',
	) );

	$wp_customize->add_control( 'site_layout', array(
		'label'         => __( 'Default Layout Column', 'calibrefx' ),
		'section'       => 'calibrefx_layout_settings',
		'settings'      => 'calibrefx-settings[site_layout]',
		'type'          => 'text',
		'priority'      => 5,
	) );*/
}
add_action( 'customize_register', 'calibrefx_customize_register' );

/**
 * Save back custom theme mod to calibrefx settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 */
function calibrefx_save_back_customize_setting( $wp_customize ) {
	$custom_theme_mod = get_theme_mod( 'calibrefx-settings' );
	//Somehow and sometimes this return False
	if( !$custom_theme_mod ){
		$custom_theme_mod = array();
	}
	$calibrefx_settings = get_option( 'calibrefx-settings' );
	$merge_value = array_merge( $calibrefx_settings, $custom_theme_mod );
	update_option( 'calibrefx-settings', $merge_value );
}
add_action( 'customize_save_after', 'calibrefx_save_back_customize_setting' );

/**
 * Used by hook: 'customize_preview_init'
 *
 * @see add_action( 'customize_preview_init', $func )
 */
function calibrefx_customizer_live_preview() {
	wp_enqueue_script(
		'calibrefx_themecustomizer_js',            //Give the script an ID
		get_template_directory_uri() . '/assets/js/theme-customize.js',//Point to file
		array( 'customize-preview' ),    //Define dependencies
		'',                       //Define a version (optional)
		true                      //Put script in footer?
	);
}
add_action( 'customize_preview_init', 'calibrefx_customizer_live_preview' );

function calibrefx_sanitize_layout_type( $value ) {
	$layout_types = array( 'fluid', 'static' );
	
	if ( ! in_array( $value, $layout_types ) ) {
		$value = 'static';
	}

	return $value;
}

function calibrefx_sanitize_layout_width( $value ) {
	
	$value = absint( $value );

	if( 0 >= $value ) {
		$value = 960;
	}

	return $value;
}