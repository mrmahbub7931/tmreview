<?php
/**
 * Check and setup theme's default settings
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'techmix_review_setup_theme_default_settings' ) ) {
	function techmix_review_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$techmix_review_posts_index_style = get_theme_mod( 'techmix_review_posts_index_style' );
		if ( '' == $techmix_review_posts_index_style ) {
			set_theme_mod( 'techmix_review_posts_index_style', 'default' );
		}

		// Sidebar position.
		$techmix_review_sidebar_position = get_theme_mod( 'techmix_review_sidebar_position' );
		if ( '' == $techmix_review_sidebar_position ) {
			set_theme_mod( 'techmix_review_sidebar_position', 'right' );
		}

		// Container width.
		$techmix_review_container_type = get_theme_mod( 'techmix_review_container_type' );
		if ( '' == $techmix_review_container_type ) {
			set_theme_mod( 'techmix_review_container_type', 'container' );
		}
	}
}
