<?php
/**
 * techmix_review functions and definitions
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$techmix_review_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/custom-user-insert.php',				// Custom user insert.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/include.php',                         // Include php file.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $techmix_review_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');

// add_action( 'template_redirect', 'redirect_to_specific_page' );
// function redirect_to_specific_page() {
// 	// if ( is_page('account') && ! is_user_logged_in() ) {
// 	// 	auth_redirect();
// 	// }

// 	// if (! is_user_logged_in()) {
// 	// 	if (is_page('account')) {
// 	// 		wp_redirect( home_url(  ).'/login',301 );
// 	// 		exit;
// 	// 	}
// 	// }
// }

function tm_my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        //check for admins
        if ( in_array( 'administrator', $user->roles ) ) {
            // redirect them to the default place
            return $redirect_to;
        } else {
            return home_url() . '/account';
        }
    } else {
        return $redirect_to;
    }
}
 
add_filter( 'login_redirect', 'tm_my_login_redirect', 10, 3 );