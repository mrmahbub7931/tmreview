<?php
/**
 * loancard custom post type
 *
 * @package loancard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// store update ajax
add_action('wp_ajax_store_form_ajax_update', 'tm_review_store_form_ajax_update_callback');
add_action('wp_ajax_nopriv_store_form_ajax_update', 'tm_review_store_form_ajax_update_callback');

// product update ajax
add_action('wp_ajax_product_form_ajax_update', 'tm_review_product_form_ajax_update_callback');
add_action('wp_ajax_nopriv_product_form_ajax_update','tm_review_product_form_ajax_update_callback');

// store create ajax
add_action('wp_ajax_store_form_ajax_save', 'tm_review_store_form_ajax_save_callback');
add_action('wp_ajax_nopriv_store_form_ajax_save', 'tm_review_store_form_ajax_save_callback');

// product create ajax
add_action('wp_ajax_product_form_ajax_save', 'tm_review_product_form_ajax_save_callback');
add_action('wp_ajax_nopriv_product_form_ajax_save', 'tm_review_product_form_ajax_save_callback');

// product review create ajax
add_action('wp_ajax_product_review_save', 'tm_review_product_review_save_callback');
add_action('wp_ajax_nopriv_product_review_save', 'tm_review_product_review_save_callback');

// product category create ajax
add_action('wp_ajax_create_category_product', 'tm_review_create_category_product_callback');
add_action('wp_ajax_nopriv_create_category_product', 'tm_review_create_category_product_callback');

// product category read ajax
add_action('wp_ajax_display_category_product', 'tm_review_display_category_product_callback');
add_action('wp_ajax_nopriv_display_category_product', 'tm_review_display_category_product_callback');

// product brand create ajax
add_action('wp_ajax_create_brand_product', 'tm_review_create_brand_product_callback');
add_action('wp_ajax_nopriv_create_brand_product', 'tm_review_create_brand_product_callback');
// product brand update ajax
add_action('wp_ajax_update_brand_product', 'tm_review_update_brand_product_callback');
add_action('wp_ajax_nopriv_update_brand_product', 'tm_review_update_brand_product_callback');

// review update ajax
add_action('wp_ajax_review_ajax_update', 'tm_review_review_ajax_update_callback');
add_action('wp_ajax_nopriv_review_ajax_update', 'tm_review_review_ajax_update_callback');

// product brand read ajax
add_action('wp_ajax_display_product_brand', 'tm_review_display_product_brand_callback');
add_action('wp_ajax_nopriv_display_product_brand', 'tm_review_display_product_brand_callback');

// Question ajax
add_action('wp_ajax_make_question_fn', 'tm_review_make_question_fn_callback');
add_action('wp_ajax_nopriv_make_question_fn', 'tm_review_make_question_fn_callback');

// Question reply ajax
add_action('wp_ajax_make_reply_fn', 'tm_review_make_reply_fn_callback');
add_action('wp_ajax_nopriv_make_reply_fn', 'tm_review_make_reply_fn_callback');

// Question reply ajax
add_action('wp_ajax_wishlist_ajax', 'tm_review_wishlist_ajax_callback');
add_action('wp_ajax_nopriv_wishlist_ajax', 'tm_review_wishlist_ajax_callback');


// store update callback function
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

// product update ajax callback function
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
	$category_id = wp_strip_all_tags($_POST['category_id']);
	$brand_id = wp_strip_all_tags($_POST['brand_id']);
	$product_logo = wp_strip_all_tags($_POST['product_logo']);

	$data = [
		'name' => $name,
		'slug' => $slug,
		'description' => $description,
		'number_text' => $number_text,
		'check_price' => $check_price,
		'category_id' => $category_id,
		'brand_id' => $brand_id,
		'product_logo'	=>	$product_logo,
	];

	$condition = [
		'id'	=>	$form_id
	];
	$wpdb->update($table,$data,$condition);

	var_dump($wpdb); //for error checking
	die();
}

// Store create callback function
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

// product create callback function
function tm_review_product_form_ajax_save_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'product';

	$name = wp_strip_all_tags($_POST['product_name']);
	$slug = wp_strip_all_tags($_POST['product_slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$number_text = wp_strip_all_tags($_POST['number_text']);
	$check_price = wp_strip_all_tags($_POST['check_price']);
	$category_id = wp_strip_all_tags($_POST['category_id']);
	$brand_id = wp_strip_all_tags($_POST['brand_id']);
	$product_logo = wp_strip_all_tags($_POST['product_logo']);

	$data = [
		'name' => $name,
		'slug' => $slug,
		'description' => $description,
		'number_text' => $number_text,
		'check_price' => $check_price,
		'category_id' => $category_id,
		'brand_id' => $brand_id,
		'product_logo'	=>	$product_logo,
	];

	$formdata = $wpdb->insert($table,$data);

	die();
}

// product review create callback function
function tm_review_product_review_save_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'product_review';

	$star = wp_strip_all_tags($_POST['star']);
	$title = wp_strip_all_tags($_POST['title']);
	$body = wp_strip_all_tags($_POST['body']);
	$age_group = wp_strip_all_tags($_POST['age_group']);
	$hair_type = wp_strip_all_tags($_POST['hair_type']);
	$skin_type = wp_strip_all_tags($_POST['skin_type']);
	$user_id = wp_strip_all_tags($_POST['user_id']);
	$product_id = wp_strip_all_tags($_POST['product_id']);
	$nonce = wp_strip_all_tags($_POST['nonce']);


	$data = [
		'title' => $title,
		'body' => $body,
		'star' => $star,
		'age_group' => $age_group,
		'hair_type' => $hair_type,
		'skin_type' => $skin_type,
		'user_id' => $user_id,
		'product_id'	=>	$product_id,
	];
	if (is_user_logged_in()) {
		$formdata = $wpdb->insert($table,$data);
		echo 1;
	}else {
		$redirect = site_url( '/' ) . login;
		echo $redirect;
	}
	

	die();
}

// product category create callback function
function tm_review_create_category_product_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'categories';

	$name = wp_strip_all_tags($_POST['name']);
	$slug = wp_strip_all_tags($_POST['slug']);
	$parent = wp_strip_all_tags($_POST['parent']);
	$nonce = wp_strip_all_tags($_POST['nonce']);

	echo $name . " ".$slug." ".$parent." ".$nonce;
	if ( 
		! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'tm_add_product_category4657' ) 
	) {
	 
	   print 'Sorry, your nonce did not verify.';
	   exit;
	 
	} else {
	 
		$data = [
			'category_name' => $name,
			'category_slug' => $slug,
			'parent' => $parent,
		];
		$formdata = $wpdb->insert($table,$data);
	}

	die();
}

// Product Category Display
function tm_review_display_category_product_callback($parent_id = 0)
{
	
	global $wpdb;
	$table = $wpdb->prefix.'categories';

	$sql = '';
	$row = '';

	$sql = "SELECT * FROM $table";
	$single_form = $wpdb->get_results($sql);
	
	// print_r($single_form);
	foreach ($single_form as $single_data) :
		$cat_sql = "SELECT category_name FROM $table WHERE parent=$single_data->id";
		$catParent = $wpdb->get_results($cat_sql);
		$row .="<tr class='cat-".$single_data->id."'><th>".$single_data->category_name."</th><th>".$single_data->category_slug."</th><th>".$catParent[0]->category_name."</th><th></th></tr>";
	endforeach;
	echo $row;

	die();
}

// product brand create callback function
function tm_review_create_brand_product_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'brand';

	$name = wp_strip_all_tags($_POST['name']);
	$slug = wp_strip_all_tags($_POST['slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$brand_logo = wp_strip_all_tags($_POST['brand_logo']);
	$nonce = wp_strip_all_tags($_POST['nonce']);
	if ( 
		! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'tm_add_product_brand4657' ) 
	) {
	 
	   print 'Sorry, your nonce did not verify.';
	   exit;
	 
	} else {
	 
		$data = [
			'brand_name' => $name,
			'brand_slug' => $slug,
			'description' => $description,
			'brand_logo' => $brand_logo,
		];
		$formdata = $wpdb->insert($table,$data);
	}

	die();
}
// product brand update callback function
function tm_review_update_brand_product_callback()
{
    global $wpdb;
	$table = $wpdb->prefix.'brand';

	$name = wp_strip_all_tags($_POST['name']);
	$slug = wp_strip_all_tags($_POST['slug']);
	$description = wp_strip_all_tags($_POST['description']);
	$brand_logo = wp_strip_all_tags($_POST['brand_logo']);
	$form_id = wp_strip_all_tags($_POST['form_id']);
	if ( ! isset( $form_id ) ) {
	 
	   print 'Sorry, your nonce did not verify.';
	   exit;
	 
	} else {
	 
		$data = [
			'brand_name' => $name,
			'brand_slug' => $slug,
			'description' => $description,
			'brand_logo' => $brand_logo,
		];
		$condition = [
			'id'	=>	$form_id
		];
		$wpdb->update($table,$data,$condition);
	}

	die();
}

// Product Category Display
function tm_review_display_product_brand_callback()
{
	
	global $wpdb;
	$table = $wpdb->prefix.'brand';

	$sql = '';
	$row = '';

	$sql = "SELECT * FROM $table";
	$single_form = $wpdb->get_results($sql);
	

	foreach ($single_form as $key => $single_data) :
		$row .="<tr class='brand-".$single_data->id."'><th>".($key + 1)."</th><th><img src='".$single_data->brand_logo."' style='width: 60px; height: 60px;'/></th><th>".$single_data->brand_name."</th><th>".$single_data->brand_slug."</th><th><a href='".admin_url('admin.php?page=brand&brand_edit=result&id='.$single_data->id)."' class='button button-secondary'>Edit</a><a href='".admin_url('admin.php?page=brand&brand_delete=result&id='.$single_data->id)."' class='button button-primary delete-brand' style='margin-left: 5px;'>Delete</a></th></tr>";
	endforeach;
	echo $row;

	die();
}

function tm_review_review_ajax_update_callback()
{
	global $wpdb;
	$table = $wpdb->prefix.'product_review';

	$title = wp_strip_all_tags($_POST['review_title']);
	$body = wp_strip_all_tags($_POST['body']);
	$status = wp_strip_all_tags($_POST['status']);
	$verify = wp_strip_all_tags($_POST['verify']);
	$review_id = wp_strip_all_tags($_POST['review_id']);
	// echo $title . ' '.$body.' '.$status.' '.$review_id.' '.$verify;
	if ( ! isset( $review_id ) ) {
	 
		print 'Sorry, your nonce did not verify.';
		exit;
	  
	 } else {
	  
		 $data = [
			 'title' => $title,
			 'body' => $body,
			 'status' => $status,
			 'verify' => $verify,
			 'id' => $review_id,
		 ];
		//  print_r($data);
		 $condition = [
			 'id'	=>	$review_id
		 ];
		 $wpdb->update($table,$data,$condition);
	 }
	die();
}

function tm_review_make_question_fn_callback()
{
	global $wpdb;
	$table = $wpdb->prefix.'questions';

	$user_id = wp_strip_all_tags($_POST['user_id']);
	$body = wp_strip_all_tags($_POST['body']);
	$product_id = wp_strip_all_tags($_POST['product_id']);
	// echo $body . ' '.$user_id.' '.$product_id;

	$data = [
		'body' => $body,
		'user_id' => $user_id,
		'product_id' => $product_id,
	];
	if (is_user_logged_in()) {
		$formdata = $wpdb->insert($table,$data);
		echo 1;
	}else {
		$redirect = site_url( '/' ) . login;
		echo $redirect;
	}
	die;
}
// question reply
function tm_review_make_reply_fn_callback()
{
	global $wpdb;
	$table = $wpdb->prefix.'question_reply';

	$question_id = wp_strip_all_tags($_POST['question_id']);
	$user_id = wp_strip_all_tags($_POST['user_id']);
	$body = wp_strip_all_tags($_POST['body']);
	$product_id = wp_strip_all_tags($_POST['product_id']);

	$data = [
		'body' => $body,
		'user_id' => $user_id,
		'product_id' => $product_id,
		'question_id' => $question_id,
	];
	if (is_user_logged_in()) {
		$formdata = $wpdb->insert($table,$data);
		echo 1;
	}else {
		$redirect = site_url( '/' ) . login;
		echo $redirect;
	}
	die;
}
// wishlit
function tm_review_wishlist_ajax_callback()
{
	global $wpdb;

	$item_name = wp_strip_all_tags($_POST['item_name']);
	$item_image = wp_strip_all_tags($_POST['item_image']);
	$user_id = wp_strip_all_tags($_POST['user_id']);
	$product_id = wp_strip_all_tags($_POST['product_id']);

	$table = $wpdb->prefix.'wishlist';
	$currentUserId = wp_get_current_user()->ID;
	$sql = "SELECT * from $table where user_id=$currentUserId and product_id=$product_id";
	$user_reviews = $wpdb->get_results($sql);

	

	$data = [
		'item_name' => $item_name,
		'item_image' => $item_image,
		'user_id' => $user_id,
		'product_id' => $product_id,
	];
	
	// print_r($data);
	if (is_user_logged_in()){

		if (count($user_reviews) <= 0) {
			$formdata = $wpdb->insert($table,$data);
		}
		echo 1;
	}else{
		$redirect = site_url( '/' ) . login;
		echo $redirect;
	}
	die;
}