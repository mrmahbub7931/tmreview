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

<div class="wrapper product" id="page-wrapper">

	<div class="container" id="content">
        <div class="row">
            <div class="col-12 col-lg-3"></div>
            <div class="col-12 col-lg-9">
            <?php
        global $wpdb;
        $table = $wpdb->prefix.'product';
            $sql = "SELECT * FROM $table";
            $products = $wpdb->get_results($sql) or "data not found";
            // echo "<pre>";
            // print_r();
            if(count($products) > 0) : 
            ?>
        <div class="row">
        <?php foreach ($products as $product) :?>
            <div class="col-12 col-md-4 mb-4">
                <div class="single-product">
                    <div class="product-thumb">
                        <a href="<?php echo home_url( '/'.$product->slug.'?product_id='.$product->id ) ?>"><img src="<?php echo $product->product_logo ?>" alt=""></a>
                    </div>
                    <div class="product-short-desc">
                        <h3 class="product-title"><a href="<?php echo home_url( '/'.$product->slug.'?product_id='.$product->id ) ?>"><?php echo wp_trim_words( $product->name, 10, '[...]' )?></a></h3>
                        
                    </div>
                    <div class="review">
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="add-to-cart">
                        <span class="wishlist"><a href="#"><i class="far fa-heart"></i></a></span>
                        <a class="add-to-cart-btn" href="<?php echo home_url( '/'.$product->slug.'?product_id='.$product->id ) ?>">View Review</a>
                    </div>
                </div>
                
            </div>
        <?php endforeach; ?>

        </div>
        <!-- row -->
        <?php endif; ?>
            </div>
        </div>
	</div><!-- end .container -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
