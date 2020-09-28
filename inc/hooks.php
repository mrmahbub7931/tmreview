<?php
/**
 * Custom hooks.
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'techmix_review_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function techmix_review_site_info() {
		do_action( 'techmix_review_site_info' );
	}
}

if ( ! function_exists( 'techmix_review_add_site_info' ) ) {
	add_action( 'techmix_review_site_info', 'techmix_review_add_site_info' );

	/**
	 * Add site info content.
	 */
	function techmix_review_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'techmix_review' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'techmix_review' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'techmix_review' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://techmix_review.com', 'techmix_review' ) ) . '">techmix_review.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'techmix_review' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'techmix_review_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
