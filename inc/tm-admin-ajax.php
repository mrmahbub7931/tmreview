<?php
/**
 * loancard custom post type
 *
 * @package loancard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action('wp_ajax_brand_form_ajax_save', 'loancard_brand_form_ajax_save_callback');
add_action('wp_ajax_nopriv_brand_form_ajax_save', 'loancard_brand_form_ajax_save_callback');

// add_action('wp_ajax_admin_form_save_status', 'loancard_admin_form_save_status_callback');
// add_action('wp_ajax_nopriv_admin_form_save_status', 'loancard_admin_form_save_status_callback');

// function loancard_admin_form_save_status_callback()
// {
// 	global $wpdb;
// 	$table = $wpdb->prefix.'loancard_contact';

// 	$status_value =  wp_strip_all_tags($_POST['status_value']);
// 	$send_to_bank =  wp_strip_all_tags($_POST['send_to_bank']);
// 	$note =  wp_strip_all_tags($_POST['note']);
// 	$form_id =  wp_strip_all_tags($_POST['form_id']);

// 	$data = [
// 		'status'	=>	$status_value,
// 		'send_to_bank'	=>	$send_to_bank,
// 		'note'	=>	$note
// 	];
// 	$condition = [
// 		'id'	=>	$form_id
// 	];
// 	$wpdb->update($table,$data,$condition);

// 	var_dump($wpdb); //for error checking
// 	die();
// }

function loancard_brand_form_ajax_save_callback()
{
    global $wpdb;
    echo $_POST['brand_name'];
	// $table = $wpdb->prefix.'loancard_contact';

	// $type_of_application = wp_strip_all_tags($_POST['type_of_application']);
	// $name = wp_strip_all_tags($_POST['name']);
	// $email = wp_strip_all_tags($_POST['email']);
	// $credit_card = $_POST['credit_card'];
	// $type_of_loan = $_POST['type_of_loan'];
	// $loan_amount = wp_strip_all_tags($_POST['loan_amount']);
	// $date_of_birth = wp_strip_all_tags($_POST['date_of_birth']);
	// $phone = wp_strip_all_tags($_POST['phone']);
	// $address = wp_strip_all_tags($_POST['address']);
	// $company_name = wp_strip_all_tags($_POST['company_name']);
	// $designation = wp_strip_all_tags($_POST['designation']);
	// $salary_paid_system = wp_strip_all_tags($_POST['salary_paid_system']);
	// $salary = wp_strip_all_tags($_POST['salary']);
	// $loan_or_card = wp_strip_all_tags($_POST['loan_or_card']);
	// $date_of_appointment = wp_strip_all_tags($_POST['date_of_appointment']);
	// $comments = wp_strip_all_tags($_POST['message']);

	// $data = [
	// 	'type' => $type_of_application,
	// 	'name' => $name,
	// 	'email' => $email,
	// 	'credit_card' => $credit_card,
	// 	'type_of_loan' => $type_of_loan,
	// 	'loan_amount' => $loan_amount,
	// 	'date_of_birth'	=>	$date_of_birth,
	// 	'phone'	=>	$phone,
	// 	'address'	=>	$address,
	// 	'company_name'	=>	$company_name,
	// 	'designation'	=>	$designation,
	// 	'salary_paid_system'	=>	$salary_paid_system,
	// 	'salary'	=>	$salary,
	// 	'loan_or_card'	=>	$loan_or_card,
	// 	'date_of_appointment'	=>	$date_of_appointment,
	// 	'message'	=>	$comments
	// ];

	// $formdata = $wpdb->insert($table,$data);


	// $u_loan_or_card;
	// if ($loan_or_card === "1") {
	// 	$u_loan_or_card = 'Yes';
	// }else {
	// 	$u_loan_or_card = 'No';
	// }
	// $u_type_of_application;
	// if ($type_of_application === "credit_card") {
	// 	$u_type_of_application = 'Credit Card';
	// }else{
	// 	$u_type_of_application = 'Loan';
	// }


	// $to = get_bloginfo('admin_email');
	// $subject = 'New credit card application From '.$name;
	
	// $message  = "Type of application: ".$u_type_of_application."\n"; 
	// $message .= "Name: ".$name."\n"; 
	// $message .= "Email: ".$email."\n"; 
	// $message .= "Date of Birth: ".$date_of_birth."\n";
	// $message .= "Address: ".$address."\n";
	// $message .= "Phone: ".$phone."\n";

	// if ($type_of_application === "credit_card") {
	// 	$message .= "Apply for: ".$credit_card."\n";
	// }else{
	// 	$message .= "Apply for: ".$type_of_loan."\n";
	// 	$message .= "Loan Amount: ".$loan_amount."\n";
	// }
	
	// $message .= "Company Name: ".$company_name."\n"; 
	// $message .= "Designation: ".$designation."\n"; 
	// $message .= "Salary Paid By: ".$salary_paid_system."\n"; 
	// $message .= "Salary: ".$salary."\n"; 
	// $message .= "EXISTING LOAN or CREDIT CARD: ".$u_loan_or_card."\n";
	// $message .= "Date of Appointment: ".$date_of_appointment."\n"; 
	// $message .= "Message: ".$comments."\n"; 
	
	// if (count($formdata) > 0) {
	// 	wp_mail($to,$subject,$message);
	// }

	die();
}