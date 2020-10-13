<?php 
    get_header();

    global $wpdb;
    $table = $wpdb->prefix.'store'; 
        if (isset($_REQUEST['store_id'])) : 
            $storeID = sanitize_key( $_GET['store_id'] );
            $sql = "SELECT * FROM $table WHERE id=$storeID";
                    $single_form = $wpdb->get_results($sql) or die("data not found");
                    if (count($single_form) > 0) :
?>
<div class="wrapper brand" id="page-wrapper">

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="single-brand-header">
                <div class="brand-thumb">
                    <img src="<?php echo esc_url( $single_form[0]->store_logo )?>" alt="<?php echo $single_form['0']->name; ?>">
                </div>
                <div class="brand-details">
                    <div class="brand-details-left">
                        <h3 class="brand-title"><?php echo $single_form['0']->name; ?></h3>
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
                                <?php if (isset($single_form['0']->facebook_url)) :?>
                                <li><a href="<?php echo $single_form['0']->facebook_url?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                                <?php if ($single_form['0']->youtube_url !== NULL) :?>
                                <li><a href="<?php echo $single_form['0']->youtube_url?>"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if ($single_form['0']->instagram_url !== NULL) :?>
                                <li><a href="<?php echo $single_form['0']->instagram_url?>"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>
                                <?php if ($single_form['0']->linkedin_url !== NULL) :?>
                                <li><a href="<?php echo $single_form['0']->linkedin_url?>"><i class="fab fa-linkedin"></i></a></li>
                                <?php endif; ?>
                                
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="brand-details-right">
                        <a href="#" class="social_share_btn"><i class="fas fa-share-alt"></i></a>
                        <?php if ($single_form['0']->affiliate_url !== NULL) : ?>
                            <a href="<?php echo $single_form['0']->affiliate_url?>" class="visit_website_btn">Visit Website</a>
                        <?php else: ?>
                            <a href="<?php echo $single_form['0']->website_url?>" class="visit_website_btn">Visit Website</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            
        </div>
    </div>
</div><!-- end container -->

</div><!-- #page-wrapper -->

<?php endif;endif;get_footer(); ?>