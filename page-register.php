
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
                
                
            </div>
        </div>

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>