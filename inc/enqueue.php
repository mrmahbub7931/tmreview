<?php
/**
 * tm_newspaper enqueue scripts
 *
 * @package tm_newspaper
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'tm_newspaper_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function tm_newspaper_scripts() {

		wp_enqueue_style( 'bs-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), uniqid() );
		
		wp_enqueue_style( 'carousel-style', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), uniqid() );
		
		wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), uniqid() );
		

		wp_enqueue_style( 'ionicons-style', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), uniqid() );

		wp_enqueue_style( 'tmxr_slick', get_template_directory_uri() . '/assets/css/slick.css', array(), uniqid() );
		
		wp_enqueue_style( 'tmxr_slick', get_template_directory_uri() . '/assets/css/slick.css', array(), uniqid() );

		wp_enqueue_style( 'main-style', get_stylesheet_directory() );
		
		wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), uniqid() );
		
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'bs-scripts', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), uniqid(), true );
		
		wp_enqueue_script( 'bsp-scripts', get_template_directory_uri() . '/assets/js/popper.min.js', array(), uniqid(), true );

		wp_enqueue_script( 'carousel-scripts', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), uniqid(), true );

		wp_enqueue_script( 'fontawesome-scripts', '//kit.fontawesome.com/a076d05399.js', array(), uniqid(), true );


		wp_enqueue_script( 'theme-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), uniqid(), true );

		wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/app.js', array(), uniqid(), true );
		wp_enqueue_script( 'theme-user', get_template_directory_uri() . '/assets/js/tm-ajax.js', array(), uniqid(), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'tm_newspaper_scripts' ).
function tm_newspaper_admin_scripts()
{
	// wp_enqueue_style( 'bs-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), uniqid() );
	wp_enqueue_style( 'theme-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), uniqid() );

	// wp_enqueue_script( 'bs-scripts', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), uniqid(), true );
	wp_enqueue_script( 'theme-admin-scripts', get_template_directory_uri() . '/assets/js/admin.js', array(), uniqid(), true );
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	wp_enqueue_script( 'theme-admin-jq', get_template_directory_uri() . '/assets/js/admin-jq.js', array(), uniqid(), true );
}
add_action( 'wp_enqueue_scripts', 'tm_newspaper_scripts' );
add_action( 'admin_enqueue_scripts', 'tm_newspaper_admin_scripts' );
