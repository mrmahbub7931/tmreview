
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
            <div class="col-md-8 login-page">
                <h2>Log in to your account</h2>
                <span>new to storetasker?</span> <a href="#">Create a free account</a>
                <form action="/action_page.php" method="post">
                    <label for="uname"><b>phone</b></label>
                    <input type="text" placeholder="Phone Number" name="uname" required>

                    <label for="psw" class="d-flex justify-content-between"><b>Password</b> <a href="#">forgot your password?</a></label>
                    <input type="password" placeholder="Password" name="psw" required>

                    <button type="submit">Login</button>
                    <label>by logging in, you are agreeing to our <a href="#">tearm & conditions</a> and <a href="#">privacy policy.</a></label>
                </form>
            </div>
        </div>

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>