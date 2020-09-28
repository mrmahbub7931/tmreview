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

if($_POST){  
                       
    global $wpdb;

    $username = $wpdb->_escape($_REQUEST['username']);  
    $password = $wpdb->_escape($_REQUEST['password']); 
   
   
    $login_data = array();  
    $login_data['user_login'] = $username;  
    $login_data['user_password'] = $password;
   
    $user_verify = wp_signon( $login_data, false );   
   
    if ( is_wp_error($user_verify) ){  
        print "<span class='text-danger'>Invalid login details</span>";
    }else{    
       echo "<script type='text/javascript'>window.location.href='". get_bloginfo('url') ."/account'</script>";  
       exit();  
    }  
}
?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row justify-content-center my-4">
            <div class="col-md-8 login-page">
                <h2>Log in to your account</h2>
                <span>new to storetasker?</span> <a href="#">Create a free account</a>
                <form action="<?php echo home_url()?>/wp-login.php" method="post">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Username" name="log">

                    <label for="psw" class="d-flex justify-content-between"><b>Password</b> <a href="#">forgot your
                            password?</a></label>
                    <input type="password" placeholder="Password" name="pwd">

                    <button type="submit" name="login">Login</button>
                    <label>by logging in, you are agreeing to our <a href="#">tearm & conditions</a> and <a
                            href="#">privacy policy.</a></label>
                </form>

            </div>
        </div>

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>