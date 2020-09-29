<?php
/**
 * Custom Menu with Database setup.
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'techmix_review_cs_menu' ) ) {
    add_action( 'admin_menu', 'techmix_review_cs_menu' );
    function techmix_review_cs_menu() {
        add_menu_page( 
            __( 'Brand', 'textdomain' ),
            'Brand',
            'manage_options',
            'brand',
            'brand_custom_page',
            '',
            6
        );
        add_submenu_page( 
            'brand',
            'All Brand',
            'All Brand',
            'manage_options',
            'brand'
        );
        add_submenu_page( 
            'brand',
            'Add Brand',
            'Add Brand',
            'manage_options',
            'add-brand',
            'add_brand_custom_page'
        );
    }
}

function brand_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/all-brand.php');
}

function add_brand_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/add-brand.php');
}