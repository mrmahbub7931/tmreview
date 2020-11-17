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
    $store_table = $wpdb->prefix.'store';
    $store_sql = "SELECT * FROM $store_table";
    $store_resutls = $wpdb->get_results($store_sql) or "Data not found";
    // print_r($brand_resutls);

?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                
                <?php if (count($store_resutls) > 0) : ?>
                <div class="row">
                    <?php foreach($store_resutls as $key => $store) : ?>
                    <div class="col-12 col-lg-3">
                        <div class="single-brand-box">
                            <div class="thumb">
                                <a href="<?php echo home_url( '/'.$store->slug.'?store_id='.$store->id ) ?>"><img src="<?php echo $store->store_logo?>" alt=""></a>
                            </div>
                            <a href="<?php echo home_url( '/'.$store->slug.'?store_id='.$store->id ) ?>"><h3 class="brand_title"><?php echo $store->name; ?></h3></a>
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
