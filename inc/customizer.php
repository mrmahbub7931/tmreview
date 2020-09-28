<?php
/**
 * techmix_review Theme Customizer
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'techmix_review_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function techmix_review_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'techmix_review_customize_register' );

if ( ! function_exists( 'techmix_review_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function techmix_review_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'techmix_review_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'techmix_review' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'techmix_review' ),
				'priority'    => 160,
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function techmix_review_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'techmix_review_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'techmix_review_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'techmix_review_container_type',
				array(
					'label'       => __( 'Container Width', 'techmix_review' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'techmix_review' ),
					'section'     => 'techmix_review_theme_layout_options',
					'settings'    => 'techmix_review_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'techmix_review' ),
						'container-fluid' => __( 'Full width container', 'techmix_review' ),
					),
					'priority'    => '10',
				)
			)
		);

		$wp_customize->add_setting(
			'techmix_review_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'techmix_review_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'techmix_review' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'techmix_review'
					),
					'section'           => 'techmix_review_theme_layout_options',
					'settings'          => 'techmix_review_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'techmix_review_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'techmix_review' ),
						'left'  => __( 'Left sidebar', 'techmix_review' ),
						'both'  => __( 'Left & Right sidebars', 'techmix_review' ),
						'none'  => __( 'No sidebar', 'techmix_review' ),
					),
					'priority'          => '20',
				)
			)
		);
	}
} // endif function_exists( 'techmix_review_theme_customize_register' ).
add_action( 'customize_register', 'techmix_review_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'techmix_review_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function techmix_review_customize_preview_js() {
		wp_enqueue_script(
			'techmix_review_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'techmix_review_customize_preview_js' );
