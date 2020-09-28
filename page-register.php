
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'techmix_review_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row justify-content-center">
            <div class="col-md-8 sing-up-page">
                <h2>welcome to storetasker!</h2>
                <span class="get-started">Sing up to get started.</span>
                <span>Already have an accoiunt?</span> <a href="/login">Log in here</a>
                
                <form id="tm_user_insert" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <?php wp_nonce_field('tm_user_registration980', 'user_regi_security'); ?>
                    <div class="form-group">
                        <label for="name"><b>name</b></label>
                        <input type="text" placeholder="Full Name" name="name" id="name">
                        <span class="message"></span>
                    </div>

                    <div class="form-group">
                        <label for="uname"><b>usernane</b></label>
                        <input type="text" placeholder="Username" name="uname" id="uname">
                        <span class="message"></span>
                    </div>

                    <div class="form-group">
                        <label for="number"><b>phone</b></label>
                        <input type="text" placeholder="Phone Number" name="number" id="number">
                    </div>

                    <div class="form-group">
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Password" name="password" id="password">
                        <span class="message"></span>
                    </div>
                    <label>Minimum 8 characters, should contain an uppercase letter, and a special symbol.</label>

                    <button type="submit" name="register" id="user_register" data-url="<?php echo admin_url( 'admin-ajax.php' )?>">Sign up</button>
                    <label>by logging in, you are agreeing to our <a href="#">tearm & conditions</a> and <a href="#">privacy policy.</a></label>
                </form>
                <?php
                    // if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                    //     if (!isset($_POST['user_regi_security'] ) || ! wp_verify_nonce( $_POST['user_regi_security'], 'tm_user_registration980' )) {
                    //         echo "Sorry, your nonce did not verify.'";
                    //     }else{
                            	
                    //         function registration_validation( $username, $password )  {
                    //             global $reg_errors;
                    //             $reg_errors = new WP_Error;
                    //             if (empty($username) || $password) {
                    //                 $reg_errors->add('field', 'Required form field is missing');
                    //             }
                    //             if (strlen(trim($_POST['psw'])) < 6 ) {
                    //                 $reg_errors->add( 'password_length', 'Password length too short. At least 6 characters is required' );
                    //             }
                    //             if ( username_exists( $username ) ) {
                    //                 $reg_errors->add('user_name', 'Sorry, that username already exists!');
                    //             }
                    //             if ( ! validate_username( $username ) ) {
                    //                 $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
                    //             }
                    //         }
                    //         registration_validation($_POST['uname'],$_POST['psw']);
                    //         if ( is_wp_error( $reg_errors ) ) {
 
                    //             foreach ( $reg_errors->get_error_messages() as $error ) {
                                 
                    //                 echo '<ul>';
                    //                 echo '<li class="alert alert-danger">'.$error .'</li>';
                    //                 echo '</ul>';
                                     
                    //             }
                             
                    //         }

                    //         function complete_registration() {
                    //             global $reg_errors;
                    //             if (count($reg_errors->get_error_messages()) === 0) {
                    //                 $userdata = [
                    //                     'user_pass' =>  esc_attr( $_POST['psw'] ),
                    //                     'user_login'    =>  sanitize_text_field( $_POST['uname'] ),
                    //                     'display_name'  =>  sanitize_text_field( $_POST['name'] )
                    //                 ];

                    //                 $user = wp_insert_user( $userdata );
                    //                 echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';
                    //             }
                    //         }

                    //         complete_registration();
                                
                    //     }
                    // }
                
                ?>
                
            </div>
        </div>

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>