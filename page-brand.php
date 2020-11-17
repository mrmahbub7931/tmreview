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

<div class="wrapper brand" id="page-wrapper">
<?php 
    global $wpdb;
    $brand_table = $wpdb->prefix.'brand';
    $brand_sql = "SELECT * FROM $brand_table";
    $brand_resutls = $wpdb->get_results($brand_sql) or "Data not found";
    // print_r($brand_resutls);

?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- <div class="single-brand-header">
                    <div class="brand-thumb">
                        <img src="http://lorempixel.com/80/80/" alt="">
                    </div>
                    <div class="brand-details">
                        <div class="brand-details-left">
                            <h3 class="brand-title">Little App</h3>
                            <div class="rating-count">
                                <ul>
                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                </ul>
                                <a href="#">4.9 Ratings</a>
                            </div>
                            <div class="brand_social_account">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="brand-details-right">
                            <a href="#" class="social_share_btn"><i class="fas fa-share-alt"></i></a>
                            <a href="#" class="visit_website_btn">Visit Website</a>
                        </div>
                    </div>
                </div> -->
                <?php if (count($brand_resutls) > 0) : ?>
                <div class="row">
                    <?php foreach($brand_resutls as $key => $brand) : ?>
                    <div class="col-12 col-lg-3">
                        <div class="single-brand-box">
                            <div class="thumb">
                                <img src="<?php echo $brand->brand_logo?>" alt="">
                            </div>
                            <h3 class="brand_title"><?php echo $brand->brand_name; ?></h3>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-3">
                
            </div>
        </div>
    </div><!-- end container -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
