<?php
/**
 * loancard custom post type
 *
 * @package loancard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action('wp_ajax_store_form_ajax_update', 'tm_review_store_form_ajax_update_callback');
add_action('wp_ajax_nopriv_store_form_ajax_update', 'tm_review_store_form_ajax_update_callback');

add_action('wp_ajax_product_form_ajax_update', 'tm_review_product_form_ajax_update_callback');
add_action('wp_ajax_nopriv_product_form_ajax_update','tm_review_product_form_ajax_update_callback');

add_action('wp_ajax_store_form_ajax_save', 'tm_review_store_form_ajax_save_callback');
add_action('wp_ajax_nopriv_store_form_ajax_save', 'tm_review_store_form_ajax_save_callback');

add_action('wp_ajax_product_form_ajax_save', 'tm_review_product_form_ajax_save_callback');
add_action('wp_ajax_nopriv_product_form_ajax_save', 'tm_review_product_form_ajax_save_callback');

function tm_review_store_form_ajax_update_callback()
{
	global $wpdb;
	$table = $wpdb->prefix.'store';

	$name = wp_strip_all_tags($_POST['store_name']);
	$form_id =  wp_strip_all_tags($_POST['form_id']);
	$slug = wp_strip_all_tags($_POST['store_slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$facebook_url = wp_strip_all_tags($_POST['facebook_url']);
	$youtube_url = wp_strip_all_tags($_POST['youtube_url']);
	$instagram_url = wp_strip_all_tags($_POST['instagram_url']);
	$linkedin_url = wp_strip_all_tags($_POST['linkedin_url']);
	$website_url = wp_strip_all_tags($_POST['website_url']);
	$affiliate_url = wp_strip_all_tags($_POST['affiliate_url']);
	$store_logo = wp_strip_all_tags($_POST['store_logo']);

	$data = [
		'name' => $name,
		'slug' => $slug,
		'description' => $description ? $description : "",
		'facebook_url' => $facebook_url ? $facebook_url : NULL,
		'youtube_url' => $youtube_url ? $youtube_url : NULL,
		'instagram_url'	=>	$instagram_url ? $instagram_url : NULL,
		'linkedin_url'	=>	$linkedin_url ? $linkedin_url : NULL,
		'website_url'	=>	$website_url ? $website_url : NULL,
		'affiliate_url'	=>	$affiliate_url ? $affiliate_url : NULL,
		'store_logo'	=>	$store_logo,
	];
	$condition = [
		'id'	=>	$form_id
	];
	$wpdb->update($table,$data,$condition);

	var_dump($wpdb); //for error checking
	die();
}
function tm_review_product_form_ajax_update_callback()
{
	global $wpdb;
	$table = $wpdb->prefix.'product';

	$form_id = wp_strip_all_tags($_POST['form_id']);
	$name = wp_strip_all_tags($_POST['product_name']);
	$slug = wp_strip_all_tags($_POST['product_slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$number_text = wp_strip_all_tags($_POST['number_text']);
	$check_price = wp_strip_all_tags($_POST['check_price']);
	$product_logo = wp_strip_all_tags($_POST['product_logo']);

	$data = [
		'name' => $name,
		'slug' => $slug,
		'description' => $description,
		'number_text' => $number_text,
		'check_price' => $check_price,
		'product_logo'	=>	$product_logo,
	];

	$condition = [
		'id'	=>	$form_id
	];
	$wpdb->update($table,$data,$condition);

	var_dump($wpdb); //for error checking
	die();
}

function tm_review_store_form_ajax_save_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'store';

	$name = wp_strip_all_tags($_POST['store_name']);
	$slug = wp_strip_all_tags($_POST['store_slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$facebook_url = wp_strip_all_tags($_POST['facebook_url']);
	$youtube_url = wp_strip_all_tags($_POST['youtube_url']);
	$instagram_url = wp_strip_all_tags($_POST['instagram_url']);
	$linkedin_url = wp_strip_all_tags($_POST['linkedin_url']);
	$website_url = wp_strip_all_tags($_POST['website_url']);
	$affiliate_url = wp_strip_all_tags($_POST['affiliate_url']);
	$store_logo = wp_strip_all_tags($_POST['store_logo']);

	$data = [
		'name' => $name,
		'slug' => $slug,
		'description' => $description,
		'facebook_url' => $facebook_url,
		'youtube_url' => $youtube_url,
		'instagram_url'	=>	$instagram_url,
		'linkedin_url'	=>	$linkedin_url,
		'website_url'	=>	$website_url,
		'affiliate_url'	=>	$affiliate_url,
		'store_logo'	=>	$store_logo,
	];

	$formdata = $wpdb->insert($table,$data);

	die();
}

function tm_review_product_form_ajax_save_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'product';

	$name = wp_strip_all_tags($_POST['product_name']);
	$slug = wp_strip_all_tags($_POST['product_slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$number_text = wp_strip_all_tags($_POST['number_text']);
	$check_price = wp_strip_all_tags($_POST['check_price']);
	$product_logo = wp_strip_all_tags($_POST['product_logo']);

	$data = [
		'name' => $name,
		'slug' => $slug,
		'description' => $description,
		'number_text' => $number_text,
		'check_price' => $check_price,
		'product_logo'	=>	$product_logo,
	];

	$formdata = $wpdb->insert($table,$data);

	die();
}