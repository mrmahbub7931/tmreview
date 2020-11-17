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
        add_menu_page( 
            __( 'Reviews', 'textdomain' ),
            'Review',
            'manage_options',
            'review',
            'review_custom_page',
            '',
            8
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
function review_custom_page()
{
    include(get_stylesheet_directory().'/page-templates/review.php');
}


if (!function_exists('tm_review_store_db')) {
    add_action( 'after_setup_theme', 'tm_review_store_db' );
    function tm_review_store_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'store';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
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
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
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
            brand_name varchar(255) NOT NULL,
            brand_slug varchar(255) NOT NULL,
            description varchar(255) NULL,
            brand_logo varchar(255) NULL,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
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
        $category_table = $wpdb->prefix . 'categories';
        $brand_table = $wpdb->prefix . 'brand';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            slug varchar(255) NOT NULL,
            description varchar(255) NULL,
            number_text varchar(50) NULL,
            check_price varchar(50) NULL,
            category_id mediumint(11) NULL,
            brand_id mediumint(11) NULL,
            product_logo varchar(255) NULL,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            FOREIGN KEY (category_id) REFERENCES $category_table(id),
            FOREIGN KEY (brand_id) REFERENCES $brand_table(id),
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
        $product_table = $wpdb->prefix . 'product';
        $user_table = $wpdb->prefix . 'users';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            title varchar(255) NOT NULL,
            body varchar(255) NOT NULL,
            star varchar(50) NOT NULL,
            age_group varchar(100) NULL,
            skin_type varchar(100) NULL,
            hair_type varchar(100) NULL,
            user_id BIGINT(20) UNSIGNED NOT NULL,
            product_id mediumint(11) NOT NULL,
            status mediumint(11) NULL,
            verify mediumint(11) NULL,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            FOREIGN KEY (user_id) REFERENCES $user_table(id),
            FOREIGN KEY (product_id) REFERENCES $product_table(id),
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
            category_name varchar(255) NOT NULL,
            category_slug varchar(255) NOT NULL,
            parent int(10) DEFAULT 0,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

// questions table
if (!function_exists('tm_review_questions_db')) {
    add_action( 'after_setup_theme', 'tm_review_questions_db' );
    function tm_review_questions_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'questions';
        $user_table = $wpdb->prefix . 'users';
        $product_table = $wpdb->prefix . 'product';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            body varchar(255) NOT NULL,
            user_id BIGINT(20) UNSIGNED NOT NULL,
            product_id mediumint(11) NOT NULL,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            FOREIGN KEY (user_id) REFERENCES $user_table(id),
            FOREIGN KEY (product_id) REFERENCES $product_table(id),
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}
// questions reply
if (!function_exists('tm_review_question_reply_db')) {
    add_action( 'after_setup_theme', 'tm_review_question_reply_db' );
    function tm_review_question_reply_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . 'question_reply';
        $questions_table = $wpdb->prefix . 'questions';
        $user_table = $wpdb->prefix . 'users';
        $product_table = $wpdb->prefix . 'product';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            body varchar(255) NOT NULL,
            question_id mediumint(11) NOT NULL,
            user_id BIGINT(20) UNSIGNED NOT NULL,
            product_id mediumint(11) NOT NULL,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            FOREIGN KEY (question_id) REFERENCES $questions_table(id),
            FOREIGN KEY (user_id) REFERENCES $user_table(id),
            FOREIGN KEY (product_id) REFERENCES $product_table(id),
            UNIQUE KEY id (id)
        ) $charset_collate;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

// wishlist table
if (!function_exists('tm_review_wishlist_db')) {
    add_action( 'after_setup_theme', 'tm_review_wishlist_db' );
    function tm_review_wishlist_db() {

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . 'wishlist';
        $user_table = $wpdb->prefix . 'users';
        $product_table = $wpdb->prefix . 'product';
    
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id mediumint(11) NOT NULL AUTO_INCREMENT,
            item_name varchar(255) NOT NULL,
            item_review varchar(255) NULL,
            item_image varchar(255) NULL,
            user_id BIGINT(20) UNSIGNED NOT NULL,
            product_id mediumint(11) NOT NULL,
            time datetime DEFAULT CURRENT_TIMESTAMP NULL,
            FOREIGN KEY (user_id) REFERENCES $user_table(id),
            FOREIGN KEY (product_id) REFERENCES $product_table(id),
            PRIMARY KEY (id),
            UNIQUE KEY wishlistItem (user_id,product_id)
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
add_filter( 'init', function( $template ) {
    if ( isset( $_GET['user_id'] ) ) {
        $store_id = $_GET['user_id'];
        include get_template_directory() . '/page-templates/single-user.php';
        die;
    }
} );