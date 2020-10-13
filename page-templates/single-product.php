<?php 
    get_header();

    global $wpdb;
    $table = $wpdb->prefix.'product'; 
        if (isset($_REQUEST['product_id'])) : 
            $productID = sanitize_key( $_GET['product_id'] );
            $sql = "SELECT * FROM $table WHERE id=$productID";
                    $single_form = $wpdb->get_results($sql) or die("data not found");
                    if (count($single_form) > 0) :
?>
<div class="wrapper product" id="page-wrapper">

<div class="container" id="content">
    <div class="product-short-desc-block">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="product-thumb">
                <img src="<?php echo esc_url( $single_form[0]->product_logo )?>" alt="<?php echo $single_form[0]->slug?>">
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="product-short-desc">
                    <h3 class="font-p"><?php echo $single_form[0]->name ?></span>
                    <div class="rating_share_block">
                        <div class="single_product_rating_block">
                            <ul class="rating_review">
                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                <li><a href="#"><i class="ion-android-star"></i></a></li>
                                <li><a href="#"><i class="ion-ios-star-half"></i></a></li>
                            </ul>
                            <a href="#" class="avg_rating">4.9 Ratings</a> <span class="sep"> | </span>
                            <a href="#" class="question_answer">42 Answer Questions</a>
                        </div>
                        <div class="single_product_share_block">
                            <ul>
                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                            </ul>
                        </div>

                    </div><!-- end single_product_rating_block -->
                    <div class="single-product-overview">
                        <ul class="single-product-overview-list">
                        <?php 
                                $description = explode(",",$single_form[0]->description);
                                $number_text = explode(",",$single_form[0]->number_text);
                                $desc = new MultipleIterator();
                                $desc->attachIterator(new ArrayIterator($number_text));
                                $desc->attachIterator(new ArrayIterator($description));
                                foreach ($desc as $value) :
                            ?>
                            <li>
                                <h3><?php echo $value[0]?></h3>
                                <p><?php echo $value[1]?></p>
                            </li>
                            <?php endforeach;?>

                        </ul>
                    </div>
                    <div class="product_review_button">
                        <a href="<?php echo $single_form[0]->check_price?>" class="check_price_btn">Check Price</a>
                        <a href="<?php echo home_url( '/review?p_id='.$single_form[0]->id )?>" class="write_review_btn">Write Review</a>
                    </div>
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- end product-short-desc-block -->
    <div class="single-product-after-desc">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="review-filter-box">
                    <div class="review-type-filter">
                        <h3 class="product_total_review">2589 Reviews</h3>
                        <div class="filter-box">

                        </div>
                    </div>
                    <div class="review-type">
                        <ul>
                            <li>
                                <div class="single-review-type">
                                    <input type="checkbox" value="5" name="excellent" id="excellent">
                                    <label for="excellent">Excellent</label>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 86%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="perchentage">86%</span>
                            </li>
                            
                            <li>
                                <div class="single-review-type">
                                    <input type="checkbox" value="4" name="great" id="great">
                                    <label for="great">Great</label>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 8%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="perchentage">8%</span>
                            </li>
                            <li>
                                <div class="single-review-type">
                                    <input type="checkbox" value="3" name="average" id="average">
                                    <label for="average">Average</label>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="perchentage">1%</span>
                            </li>
                            <li>
                                <div class="single-review-type">
                                    <input type="checkbox" value="2" name="poor" id="poor">
                                    <label for="poor">Poor</label>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="perchentage">1%</span>
                            </li>
                            <li>
                                <div class="single-review-type">
                                    <input type="checkbox" value="1" name="bad" id="bad">
                                    <label for="bad">Bad</label>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 4%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="perchentage">4%</span>
                            </li>

                        </ul>
                    </div>
                </div><!-- end review-filter-box -->
                <div class="review-box">
                    <div class="user-part">
                        <div class="user-box">
                            <div class="thumb">
                                <a href="#"><img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/mahbub.jpg" alt=""></a>
                            </div>
                            <div class="user-desc">
                                <a href="#"><h3>Anders Gross</h3></a>
                                <span class="count-review"><i class="fas fa-user-edit"></i> <a href="#">3 reviews</a></span>
                            </div>
                        </div>
                        <div class="user-follower-box">
                            <a href="#">Follows <span class="sep">|</span> 35</a>
                        </div>
                    </div> <!-- end user-part -->
                    <div class="review-part">
                        <div class="review-part-top">
                            <div class="review-part-top-left">
                                <ul class="user-review-icon">
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                </ul>
                                <span><i class="fas fa-check-circle"></i> Verified</span>
                            </div>
                            <div class="review-part-top-right">
                                <span class="date">Mar, 1 2020</span>
                            </div>
                        </div>
                        <div class="review-part-message">
                            <h3>Let bookingprocess</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni commodi doloremque at enim officia ipsum eum quas consequatur, possimus unde.</p>
                        </div>
                    </div><!-- end review-part -->
                    <div class="review-like-box">
                        <ul class="like-box-menu">
                            <li><a href="#"><i class="far fa-thumbs-up"></i>Useful</a></li>
                            <li><a href="#"><i class="fas fa-share-alt"></i></i>Share</a></li>
                        </ul>
                    </div>
                </div><!-- end review-box -->
                
                <div class="review-box">
                    <div class="user-part">
                        <div class="user-box">
                            <div class="thumb">
                                <a href="#"><img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/mahbub.jpg" alt=""></a>
                            </div>
                            <div class="user-desc">
                                <a href="#"><h3>Anders Gross</h3></a>
                                <span class="count-review"><i class="fas fa-user-edit"></i> <a href="#">3 reviews</a></span>
                            </div>
                        </div>
                        <div class="user-follower-box">
                            <a href="#">Follows <span class="sep">|</span> 35</a>
                        </div>
                    </div> <!-- end user-part -->
                    <div class="review-part">
                        <div class="review-part-top">
                            <div class="review-part-top-left">
                                <ul class="user-review-icon">
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                </ul>
                                <span><i class="fas fa-check-circle"></i> Verified</span>
                            </div>
                            <div class="review-part-top-right">
                                <span class="date">Mar, 1 2020</span>
                            </div>
                        </div>
                        <div class="review-part-message">
                            <h3>Let bookingprocess</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni commodi doloremque at enim officia ipsum eum quas consequatur, possimus unde.</p>
                        </div>
                    </div><!-- end review-part -->
                    <div class="review-like-box">
                        <ul class="like-box-menu">
                            <li><a href="#"><i class="far fa-thumbs-up"></i>Useful</a></li>
                            <li><a href="#"><i class="fas fa-share-alt"></i></i>Share</a></li>
                        </ul>
                    </div>
                </div><!-- end review-box -->
                <div class="review-paginate">
                    <ul class="review-paginate-list">
                        <li><a href="#" class="prev-paginate"><i class="ion-ios-arrow-left"></i></a></li>
                        <li><a href="#" class="active paginate-item">1</a></li>
                        <li><a href="#" class="paginate-item">2</a></li>
                        <li><a href="#" class="paginate-item">3</a></li>
                        <li><a href="#" class="paginate-item">4</a></li>
                        <li><a href="#" class="next-paginate"><i class="ion-ios-arrow-right"></i></a></li>
                    </ul>
                </div> <!-- end review-paginate  -->
                <div class="single-product-qa">
                    <h3 class="title">Question about this product <span>(12)</span></h3>
                    <div class="question-box qa-box-wrap">
                        <span>Q</span>
                        <div class="qa-box">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus dicta ex quisquam?</p>
                            <div class="question-details">
                                <a href="#" class="user-name">Habiba</a>
                                <span class="sep"> - </span>
                                <p>3 Days ago</p>
                                <a href="#" class="reply-question">Reply</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="answer-box qa-box-wrap">
                        <span>A</span>
                        <div class="qa-box">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus dicta ex quisquam?</p>
                            <div class="question-details">
                                <a href="#" class="user-name">Habiba</a>
                                <span class="sep"> - </span>
                                <p>3 Days ago</p>
                                <a href="#" class="reply-question">Reply</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- end col-lg-9 -->
            <div class="col-12 col-lg-3"></div> <!-- end col-lg-3 -->
        </div>
    </div>
</div><!-- end .container -->

</div><!-- #page-wrapper -->

<?php endif;endif;get_footer(); ?>