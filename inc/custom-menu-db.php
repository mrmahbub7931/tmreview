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
            __( 'Stores', 'textdomain' ),
            'Store',
            'manage_options',
            'store',
            'store_custom_page',
            '',
            6
        );
        
        add_menu_page( 
            __( 'Products', 'textdomain' ),
            'Product',
            'manage_options',
            'product',
            'product_custom_page',
            '',
            7
        );

        add_submenu_page( 
            'store',
            'All Store',
            'All Store',
            'manage_options',
            'store'
        );
        
        add_submenu_page( 
            'product',
            'All Products',
            'All Products',
            'manage_options',
            'product'
        );

        add_submenu_page( 
            'store',
            'Add Store',
            'Add Store',
            'manage_options',
            'add-store',
            'add_store_custom_page'
        );
        
        add_submenu_page( 
            'product',
            'Add Product',
            'Add Product',
            'manage_options',
            'add-product',
            'add_product_custom_page'
        );
        add_submenu_page( 
            'product',
            'Categories',
            'Categories',
            'manage_options',
            'add-category',
            'add_category_custom_page'
        );
        add_submenu_page( 
            'product',
            'Brands',
            'Brands',
            'manage_options',
            'brand',
            'brand_custom_page'
        );

    }
}

function store_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/all-store.php');
}
function product_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/all-product.php');
}
function add_store_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/add-store.php');
}
function add_product_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/add-product.php');
}
function add_category_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/category.php');
}
function brand_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/brands.php');
}

if (!function_exists('tm_review_store_db')) {
    add_action( 'after_setup_theme', 'tm_review_store_db' );
    function tm_review_store_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'store';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            name varchar(255) NOT NULL,
            slug varchar(255) NOT NULL,
            description varchar(255) NULL,
            facebook_url varchar(50) NULL,
            youtube_url varchar(50) NULL,
            instagram_url varchar(50) NULL,
            linkedin_url varchar(50) NULL,
            website_url varchar(50) NULL,
            affiliate_url varchar(50) NULL,
            store_logo varchar(255) NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}
if (!function_exists('tm_review_brand_db')) {
    add_action( 'after_setup_theme', 'tm_review_brand_db' );
    function tm_review_brand_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'brand';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            name varchar(255) NOT NULL,
            slug varchar(255) NOT NULL,
            description varchar(255) NULL,
            brand_logo varchar(255) NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

if (!function_exists('tm_review_product_db')) {
    add_action( 'after_setup_theme', 'tm_review_product_db' );
    function tm_review_product_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'product';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            name varchar(255) NOT NULL,
            slug varchar(255) NOT NULL,
            description varchar(255) NULL,
            number_text varchar(50) NULL,
            check_price varchar(50) NULL,
            product_logo varchar(255) NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

if (!function_exists('tm_review_product_review_db')) {
    add_action( 'after_setup_theme', 'tm_review_product_review_db' );
    function tm_review_product_review_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'product_review';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            title varchar(255) NOT NULL,
            body varchar(255) NOT NULL,
            star varchar(50) NOT NULL,
            user_id varchar(50) NOT NULL,
            product_id varchar(255) NOT NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

if (!function_exists('tm_review_product_category_db')) {
    add_action( 'after_setup_theme', 'tm_review_product_category_db' );
    function tm_review_product_category_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'categories';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            name varchar(255) NOT NULL,
            slug varchar(255) NOT NULL,
            parent int(10) DEFAULT 0,
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}


// retrieves the attachment ID from the file URL
function tm_review_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}


add_filter( 'init', function( $template ) {
    if ( isset( $_GET['store_id'] ) ) {
        $store_id = $_GET['store_id'];
        include get_template_directory() . '/page-templates/single-store.php';
        die;
    }
} );
add_filter( 'init', function( $template ) {
    if ( isset( $_GET['product_id'] ) ) {
        $store_id = $_GET['product_id'];
        include get_template_directory() . '/page-templates/single-product.php';
        die;
    }
} );