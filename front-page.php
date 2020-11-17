<?php get_header(); 
$current_user = wp_get_current_user();
?>

<section class="tmxr_welcome_area">
    <div class="banner_bg" style="background-image: url(<?php echo esc_url(get_template_directory_uri())?>/assets/img/banner-01.jpg)">
        <div class="tmxr_flex caption_box">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h3 class="title-1">ইংরেজি শিখে বদলে দিন জীবন</h3>
                        <h1 class="quotation">BBC Janala এর জন্যে তৈরীকৃত ইংরেজি লেসন</h1>
                        <button class="primary_btn tmxr_btn">ফ্রি রেজিস্ট্রেশন করুন</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end welcome area -->
<section class="tmxr_review_section section-padding" style="background: #ececec;">
    <div class="container">
        <div class="row">
            <div class="col-12 padd-none text-center">
                <div class="section-heading">
                    <h3>Recent reviews</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- <marquee behavior="" direction="left">Hello world</marquee> -->
    <?php
        global $wpdb; 
        $review_table = $wpdb->prefix.'product_review';
        $reviews_sql = "SELECT * from $review_table";

        $user_sql = 'SELECT * from '.$wpdb->prefix.'product_review INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID = '.$wpdb->prefix.'product_review.user_id';

        $product_sql = 'SELECT * from '.$wpdb->prefix.'product_review INNER JOIN '.$wpdb->prefix.'product ON '.$wpdb->prefix.'product.id = '.$wpdb->prefix.'product_review.product_id';

        $user_results = $wpdb->get_results($user_sql) or 'Data not found';
        $product_results = $wpdb->get_results($product_sql) or 'Data not found';

    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 padd-none">
                <div class="review_slide">
                    <?php foreach($user_results as $key => $user_result) : ?>
                    <div class="single-review-box">
                        <div class="thumb-part">
                            <?php echo get_avatar($user_result->ID); ?>
                            <ul class="single-review-<?php echo $user_result->star;?>">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="reviewer_details">
                            <a href="<?php echo home_url( '/user/'.$user_result->user_login.'?user_id='.$user_result->ID ); ?>"><h3><?php echo $user_result->display_name; ?></h3></a>
                            <span>reviewed</span>
                            <a href="<?php echo home_url( '/'.$product_results[$key]->slug.'?product_id='.$product_results[$key]->id ) ?>"><h3><?php echo $product_results[$key]->name; ?></h3></a>
                        </div>
                        <div class="review_text">
                            <p><?php echo $user_result->body; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php
        global $wpdb;
        $table = $wpdb->prefix.'brand';
            $sql = "SELECT * FROM $table";
            $brands = $wpdb->get_results($sql) or "data not found";
            if(count($brands) > 0) : 
            ?>
<section class="tmxr_top_brands section-padding" style="background: #f7f7f7">
    <div class="container">
        <div class="row">
            <div class="col-12 padd-none">
                <div class="section-heading both tmxr_flex">
                    <h3>Top Brands</h3>
                    <a href="<?php echo get_permalink( get_page_by_path( 'brand' ) )?>">See All Brands <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12 padd-none">
                <div class="brands_image tmxr_flex">
                    <?php foreach ($brands as $key => $brand) : ?>
                    <div class="single_brands_img">
                        <a href="javascript:void(0)">
                        <img src="<?php echo $brand->brand_logo; ?>" alt="">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end top brands -->
<?php endif; ?>
<?php
        global $wpdb;
        $table = $wpdb->prefix.'store';
            $sql = "SELECT * FROM $table";
            $stores = $wpdb->get_results($sql) or "data not found";
            if(count($stores) > 0) : 
            ?>
<section class="tmxr_top_stores section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 padd-none">
                <div class="section-heading both tmxr_flex">
                    <h3>Top Stores</h3>
                    <a href="<?php echo get_permalink( get_page_by_path( 'store' ) )?>">See All Stores <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12 padd-none">
                <div class="brands_image tmxr_flex">
                    <?php foreach ($stores as $key => $store) :  ?>
                    <div class="single_brands_img">
                        <a href="javascript:void(0)"><img src="<?php echo $store->store_logo?>" alt=""></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- end top brands -->

<section class="tmxr_top_products section-padding" style="background: #fafafa">
    <div class="container">
        <div class="row">
            <div class="col-12 padd-none">
                <div class="section-heading both tmxr_flex">
                    <h3>Top Products</h3>
                    <a href="<?php echo get_permalink( get_page_by_path( 'product' ) )?>">See All Products <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end row -->
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
        <?php 
        $wishlist_table = $wpdb->prefix.'wishlist';
        $wishlist_sql = "SELECT * from $wishlist_table";
        $wishlist_results = $wpdb->get_results($wishlist_sql) or '';
        // var_dump($wishlist_result[0]->user_id.' '.$current_user->ID);
        foreach ($products as $key => $product) :?>
            <div class="col-12 col-md-3 mb-4">
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
                        <form action="#" method="post" id="wishlist-form" data-url="<?php echo admin_url('admin-ajax.php');?>">
                            <input type="hidden" name="item_name" id="item_name" value="<?php echo $product->name?>" >
                            <input type="hidden" name="item_image" id="item_image" value="<?php echo $product->product_logo ?>" >
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user->ID ?>" >
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo $product->id ?>" >
                            <button type="submit" class="wishlist"><i class="far fa-heart"></i></button>
                        </form>
                        <a class="add-to-cart-btn" href="<?php echo home_url( '/'.$product->slug.'?product_id='.$product->id ) ?>">View Review</a>
                    </div>
                </div>
                
            </div>
        <?php endforeach; ?>

        </div>
        <!-- row -->
        <?php endif; ?>
    </div>

</section>
<!-- end top products -->
<?php get_footer(); ?>