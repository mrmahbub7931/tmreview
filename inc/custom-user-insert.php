<?php
/**
 * Rest in peace.
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Create user custom
 *
 */
if ( ! function_exists( 'tm_user_create' ) ) {

    add_action("wp_ajax_user_create_custom", "tm_user_create");
    add_action("wp_ajax_nopriv_user_create_custom", "tm_user_create");

    function tm_user_create()
    {

        if (isset($_POST['nonce']) || wp_verify_nonce($_POST['nonce'],'tm_user_registration980')) {
            
            if ( !username_exists($_POST['username']) || strlen($_POST['password']) >= 6 || validate_username( $username ) ) {
                $userdata = [
                    'user_pass' =>  esc_attr( $_POST['password'] ),
                    'user_login'    =>  sanitize_text_field( $_POST['username'] ),
                    'display_name'  =>  sanitize_text_field( $_POST['name'] )
    
                ];
                $user_id = wp_insert_user( $userdata );
                if (get_user_meta($user_id, 'phone', true)){
                    update_user_meta( $user_id, 'phone', $_POST['phone'], true );
                }else{
                    add_user_meta( $user_id, 'phone', $_POST['phone'], false );
                }
            }else{
                global $reg_errors;
                $reg_errors = new WP_Error;
                $reg_errors->add('errors', 'field are invalid!');
            }

            if ( is_wp_error( $reg_errors ) ) {
 
                foreach ( $reg_errors->get_error_messages() as $error ) {
                 
                    echo '<ul>';
                    echo '<li class="text-danger">'.$error . '</li>';
                    echo '</ul>';
                     
                }
             
            }
            


        }
        

        wp_die();
    }
}