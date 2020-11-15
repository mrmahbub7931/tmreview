<?php
get_header();
global $wpdb;
    $product_review_table = $wpdb->prefix.'product_review'; 
    $user_table = $wpdb->prefix.'users'; 
        if (isset($_REQUEST['user_id'])) : 
            $userID = sanitize_key( $_GET['user_id'] );
            $sql = "SELECT * FROM $user_table WHERE id=$userID";
            $user_data = $wpdb->get_results($sql) or "data not found";
            // print_r($user_data);exit;
            $sql_review = "SELECT * FROM $product_review_table WHERE user_id=$userID";
            $user_reviews = $wpdb->get_results($sql_review) or "data not found";
            if (count($user_data) > 0) :
?>
<div class="wrapper brand" id="page-wrapper">

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="single-brand-header">
                <div class="brand-thumb">
                    <?php echo get_avatar($userID); ?>
                </div>
                <div class="brand-details">
                    <div class="brand-details-left">
                        <h3 class="brand-title"><?php echo $user_data[0]->display_name?></h3>
                        <div class="user-review-questions">
                            <ul>
                                <li><?php echo count($user_reviews); ?> Total Reviews</li>
                                <li><span>|</span></li>
                                <li>24 Questions Answered</li>
                            </ul>
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
                        <div class="user-follower-box">
                            <a href="#">Follows <span class="sep">|</span> 35</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-filter-box">
                <div class="review-type-filter">
                    <h3 class="product_total_review"><?php echo count($user_reviews);?> Reviews</h3>
                </div>
            </div>
            <?php foreach ($user_reviews as $user_review) :
                    // $sql_user = "SELECT * FROM $user_table WHERE ID=$product_review->user_id";
                    // $user_form = $wpdb->get_results($sql_user) or "data not found";
                    // $review_user = "SELECT count(user_id) as total_review FROM $product_review_table WHERE user_id=$product_review->user_id";
                    // $total_review_user = $wpdb->get_results($review_user) or "data not found";
                ?>
                    <div class="review-box">
                    <div class="user-part">
                        <div class="user-box">
                            <div class="thumb">
                                <a href="#"><?php echo get_avatar( $userID ); ?></a>
                            </div>
                            <div class="user-desc">
                                <a href="javascript:void(0)"><h3><?php echo $user_data[0]->display_name?></h3></a>
                                <span class="count-review"><i class="fas fa-user-edit"></i> <a href="#"><?php echo count($user_reviews);?> reviews</a></span>
                            </div>
                        </div>
                    </div> <!-- end user-part -->
                    <div class="review-part">
                        <div class="review-part-top">
                            <div class="review-part-top-left">
                                <ul class="user-review-icon">
                                    <?php if ($user_review->star === '4') :?>
                                        <?php for ($i=0; $i < $user_review->star; $i++) :?>
                                            <li class="single-star-<?php echo $user_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php elseif($user_review->star === '5') : ?>
                                            <?php for ($i=0; $i < $user_review->star; $i++) :?>
                                            <li class="single-star-<?php echo $user_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php endfor;?>
                                        <?php elseif($user_review->star === '3') : ?>
                                            <?php for ($i=0; $i < $user_review->star; $i++) :?>
                                            <li class="single-star-<?php echo $user_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                            
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php elseif($user_review->star === '2') : ?>
                                        <?php for ($i=0; $i < $user_review->star; $i++) :?>
                                        <li class="single-star-<?php echo $user_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                            
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php elseif($user_review->star === '1'): ?>
                                            <?php for ($i=0; $i < $user_review->star; $i++) :?>
                                        <li class="single-star-<?php echo $user_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                            
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php endif; ?>
                                    
                                </ul>
                                <span><i class="fas fa-check-circle"></i> Verified</span>
                            </div>
                            <div class="review-part-top-right">
                                <span class="date"><?php echo date('F d, Y', strtotime($user_review->time)) ?></span>
                            </div>
                        </div>
                        <div class="review-part-message">
                            <h3><?php echo $user_review->title; ?></h3>
                            <p><?php echo $user_review->body; ?></p>
                        </div>
                    </div><!-- end review-part -->
                    <!-- .. -->
                    <div class="review-like-box">
                        <ul class="like-box-menu">
                            <li><a href="#"><i class="far fa-thumbs-up"></i>Useful</a></li>
                            <li><a href="#"><i class="fas fa-share-alt"></i></i>Share</a></li>
                        </ul>
                    </div>
                </div><!-- end review-box -->
                        
                <?php endforeach; ?>
        </div> <!-- end col -->
        <div class="col-12 col-lg-3">
            
        </div>
    </div> <!-- end row -->
</div><!-- end container -->

</div><!-- #page-wrapper -->
<?php endif;endif;get_footer();