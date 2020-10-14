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
global $wpdb;
    $table = $wpdb->prefix.'product'; 
        if (isset($_REQUEST['p_id'])) : 
            $productID = sanitize_key( $_GET['p_id'] );
            $sql = "SELECT * FROM $table WHERE id=$productID";
                    $single_form = $wpdb->get_results($sql) or die("data not found");
                    if (count($single_form) > 0) :
?>

<div class="wrapper reivew" id="page-wrapper">

    <div class="single-product-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="single-product-header-inner">
                        <div class="thumb">
                            <img src="<?php echo esc_url( $single_form[0]->product_logo )?>" alt="">
                        </div>
                        <div class="s-product-title">
                            <h3 class="font-p"><?php echo $single_form[0]->name?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </div>
    

	<div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="review-message-box-wrap">
                    <form action="" method="post" id="review-message-form">
                        <div class="review-form-top">
                            <div class="form-group">
                                <label for="star-rating">Rate your recent experience</label>
                                <ul>
                                    <li class="single-star-0"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                    <li class="single-star-1"><a href="javascript:void(0)"><i class="ion-android-star" data-index="2"></i></a></li>
                                    <li class="single-star-2"><a href="javascript:void(0)"><i class="ion-android-star" data-index="3"></i></a></li>
                                    <li class="single-star-3"><a href="javascript:void(0)"><i class="ion-android-star" data-index="4"></i></a></li>
                                    <li class="single-star-4"><a href="javascript:void(0)"><i class="ion-android-star" data-index="5"></i></a></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="review-message-box">Tell us about your experience</label>
                                <textarea rows="5" name="review-message-box" id="review-message-box" placeholder="This is where your write your review."></textarea>
                            </div>
                            <a href="#" class="useful-review">How to write a useful review</a>
                            <div class="form-group">
                                <label for="review-message-title">Give your review a title</label>
                                <div class="review_title-div"><input type="text" name="review_title" id="review_title">
                                <span class="icon"><i class="fas fa-pen"></i></span></div>
                            </div>
                        </div>

                        <div class="review-form-bottom">
                            <div class="form-group">
                                <input type="checkbox" required id="privacy_policy" name="privacy_policy">
                                <label for="privacy_policy">I accept the <a href="#">Terms & Conditions</a> and  <a href="#">Privacy Policy</a> </label>
                            </div>
                            <input type="submit" id="p_review_submit" name="review_submit" value="Submit Review">
                        </div>
                    </form>
                    
                </div> <!-- end review message box wrap -->
            </div>
        </div>
	</div><!-- end .container -->

</div><!-- #page-wrapper -->

<?php endif; endif; get_footer(); ?>
