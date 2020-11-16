<?php 
    get_header();
    // $user = wp_get_current_user();
    global $wpdb;
    $table = $wpdb->prefix.'product'; 
    $product_review_table = $wpdb->prefix.'product_review'; 
    $user_table = $wpdb->prefix.'users'; 
        if (isset($_REQUEST['product_id'])) : 
            $productID = sanitize_key( $_GET['product_id'] );
            $sql = "SELECT * FROM $table WHERE id=$productID";
            $single_form = $wpdb->get_results($sql) or "data not found";

            $sql_review = "SELECT * FROM $product_review_table WHERE product_id=$productID and status=1";
            $product_reviews = $wpdb->get_results($sql_review) or "data not found";

                    
                    
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
                        <h3 class="product_total_review"><?php echo count($product_reviews);?> Reviews</h3>
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
                <?php foreach ($product_reviews as $product_review) :
                    $sql_user = "SELECT * FROM $user_table WHERE ID=$product_review->user_id";
                    $user_form = $wpdb->get_results($sql_user) or "data not found";
                    $review_user = "SELECT count(user_id) as total_review FROM $product_review_table WHERE user_id=$product_review->user_id and status=1";
                    $total_review_user = $wpdb->get_results($review_user) or "data not found";
                ?>
                    <div class="review-box">
                    <div class="user-part">
                        <div class="user-box">
                            <div class="thumb">
                                <a href="#"><img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/mahbub.jpg" alt=""></a>
                            </div>
                            <div class="user-desc">
                                <a href="<?php echo home_url( '/user/'.$user_form[0]->user_login.'?user_id='.$user_form[0]->ID ); ?>"><h3><?php echo $user_form[0]->display_name; ?></h3></a>
                                <span class="count-review"><i class="fas fa-user-edit"></i> <a href="#"><?php echo $total_review_user[0]->total_review;?> reviews</a></span>
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
                                    <?php if ($product_review->star === '4') :?>
                                        <?php for ($i=0; $i < $product_review->star; $i++) :?>
                                            <li class="single-star-<?php echo $product_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php elseif($product_review->star === '5') : ?>
                                            <?php for ($i=0; $i < $product_review->star; $i++) :?>
                                            <li class="single-star-<?php echo $product_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php endfor;?>
                                        <?php elseif($product_review->star === '3') : ?>
                                            <?php for ($i=0; $i < $product_review->star; $i++) :?>
                                            <li class="single-star-<?php echo $product_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                            
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php elseif($product_review->star === '2') : ?>
                                        <?php for ($i=0; $i < $product_review->star; $i++) :?>
                                        <li class="single-star-<?php echo $product_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                            
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php elseif($product_review->star === '1'): ?>
                                            <?php for ($i=0; $i < $product_review->star; $i++) :?>
                                        <li class="single-star-<?php echo $product_review->star ?>"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                            
                                        <?php endfor;?>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <li class="single-star"><a href="javascript:void(0)"><i class="ion-android-star" data-index="1"></i></a></li>
                                        <?php endif; ?>
                                    
                                </ul>
                                <?php if($product_review->verify === '1') : ?>
                                <span><i class="fas fa-check-circle"></i> Verified</span>
                                <?php endif; ?>
                            </div>
                            <div class="review-part-top-right">
                                <span class="date"><?php echo date('F d, Y', strtotime($product_review->time)) ?></span>
                            </div>
                        </div>
                        <div class="review-part-message">
                            <h3><?php echo $product_review->title; ?></h3>
                            <p><?php echo $product_review->body; ?></p>
                        </div>
                    </div><!-- end review-part -->
                    <div class="review-like-box">
                        <ul class="like-box-menu">
                            <li><a href="#"><i class="far fa-thumbs-up"></i>Useful</a></li>
                            <li><a href="#"><i class="fas fa-share-alt"></i></i>Share</a></li>
                        </ul>
                    </div>
                </div><!-- end review-box -->
                        
                <?php endforeach; ?>
                <!-- start paginate -->
                <!-- <div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div>
<div class="page-content">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
	Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
	<option value="all-links">Display All Page Link</option>
	<option value="prev-next">Display Prev Next Only</option>
	</select>
	</div>
	
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div> -->
<!-- end paginate -->
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
                <div class="make-question-area" style="margin: 10px 0;">
                    <button type="button" class="review_primary_btn" data-toggle="collapse" href="#askQuestion" role="button" aria-expanded="false" aria-controls="askQuestion">Ask Question</button>
                    <div class="collapse" id="askQuestion">
                        <div class="card card-body" style="border-radius: 0px;">
                            <form action="#" method="post" id="ask_question_form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                <?php $user = wp_get_current_user();?>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->ID ?>">
                                <input type="hidden" name="product_id" id="product_id" value="<?php echo $productID ?>">
                                <div class="form-group">
                                    <label for="body"></label>
                                    <textarea name="body" id="body" style="width: 100%;resize: none" rows="5" class="form-control"></textarea>
                                </div>
                                <button class="review_secondary_btn" type="submit">Submit</button>
                                <span class="message"></span>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $question_table = $wpdb->prefix.'questions';  
                $q_sql = "SELECT * FROM $question_table WHERE product_id=$productID";
                $product_questions = $wpdb->get_results($q_sql) or "data not found";
                // print_r($product_questions);
                ?>
                <div class="single-product-qa">
                    <h3 class="title">Question about this product <span>(<?php echo count($product_questions);?>)</span></h3>
                    <?php foreach ($product_questions as $key => $product_question) :
                    $user_sql = 'SELECT user_login, display_name from '.$wpdb->prefix.'questions INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID = '.$wpdb->prefix.'questions.user_id';
                    $q_user_form = $wpdb->get_results($user_sql) or "data not found";
                    ?>
                    <div class="question-box qa-box-wrap">
                        <span>Q</span>
                        <div class="qa-box">
                            <p><?php echo $product_question->body; ?></p>
                            <div class="question-details">
                            
                                <a href="#" class="user-name"><?php echo $q_user_form[$key]->display_name; ?></a>
                            
                                <span class="sep"> - </span>
                                <p>3 Days ago</p>
                                <button class="reply-question" data-toggle="collapse" href="#replyQuestion<?php echo $product_question->id; ?>" role="button" aria-expanded="false" aria-controls="replyQuestion<?php echo $product_question->id; ?>">Reply</button>
                            </div>
                            <div class="collapse" id="replyQuestion<?php echo $product_question->id; ?>">
                                <div class="card card-body" style="border-radius: 0px;">
                                    <form action="#" method="post" id="reply_question_form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                        <?php $user = wp_get_current_user();?>
                                        <input type="hidden" name="question_id" id="question_id" value="<?php echo $product_question->id; ?>">
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->ID ?>">
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $productID ?>">
                                        <div class="form-group">
                                            <label for="body"></label>
                                            <textarea name="body" id="body" style="width: 100%;resize: none" rows="2" class="form-control"></textarea>
                                        </div>
                                        <button class="review_secondary_btn" type="submit">Submit</button>
                                        <span class="message"></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $question_reply = $wpdb->prefix.'question_reply';  
                    $q_sql = "SELECT * FROM $question_reply WHERE product_id=$productID and question_id=$product_question->id";
                    $questions_reply = $wpdb->get_results($q_sql) or "data not found";

                    foreach ($questions_reply as $key => $question_reply) :
                    $user_sql = 'SELECT user_login, display_name from '.$wpdb->prefix.'question_reply INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.ID = '.$wpdb->prefix.'question_reply.user_id';
                    $q_user_form = $wpdb->get_results($user_sql) or "data not found";
                    // print_r($q_user_form);
                    
                    ?>
                    <div class="answer-box qa-box-wrap">
                        <span>A</span>
                        <div class="qa-box">
                            <p><?php echo str_replace( '\\', '', $question_reply->body); ?></p>
                            <div class="question-details">
                                <a href="#" class="user-name"><?php echo $q_user_form[$key]->display_name; ?></a>
                                <span class="sep"> - </span>
                                <p>3 Days ago</p>
                                <a href="#" class="reply-question">Reply</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;endforeach; ?>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" class="read_more_q">Read More</button>
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

<script type="text/javascript">
    // reply form controller
var form_reply = (function () {
    return {
        switchForm: function (e) {
            e.preventDefault();
            currentForm = e.currentTarget;
            var question_id = currentForm.querySelector('#question_id').value,
                user_id = currentForm.querySelector('#user_id').value,
                product_id = currentForm.querySelector('#product_id').value,
                body = currentForm.querySelector('#body').value,
                form_submit = currentForm.querySelector('button');
                ajaxurl = currentForm.dataset.url;
            form_submit.setAttribute("disabled", "");
            if (body !== '') {
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: {
                        action: 'make_reply_fn',
                        question_id: question_id,
                        user_id: user_id,
                        product_id: product_id,
                        body: body
                    },
                    success: function(response) {
                        // console.log(response);
                        form_submit.removeAttribute("disabled");
                        currentForm.reset();
                        location.reload();
                    }
                });
            }

            jQuery.ajax({
                url: ajaxurl,
                type: 'get',
                data: {
                    action: 'display_product_brand',
                },
                success: function(response) {
                    // console.log(response);
                    jQuery("#tm-brand-list").html(response); 
                }
            });

            
        }
    }
})();


// GLOBAL SCOPE CONTROLLER
var Controller = (function (forms_reply) {

    var NodeListLoop = function (list,callback) {
        for(let i = 0; i<list.length; i++) {
            callback(list[i],i);
        }
    }

    // all event setup function
    var setupEvenetListerner = function () {
        
        window.addEventListener("load",() => {
            var forms;
            forms = document.querySelectorAll("#reply_question_form");
            
            if (forms) {
                NodeListLoop(forms,function (cur) {
                    cur.addEventListener("submit",forms_reply.switchForm);
                });
            }

            var qbox = document.querySelectorAll(".single-product-qa div.qa-box-wrap"),
                qboxarr = [...qbox],
                read_more_q = document.querySelector('.read_more_q');
                // read_more_q.addEventListener('click',function (e) {
                //     e.preventDefault();
                //     // qboxarr.slice(0,2).show();
                // });
                jQuery('.read_more_q').click(function () {
                    jQuery('.single-product-qa div.qa-box-wrap:hidden').slice(0, 4).css("display", "flex");
                    if (jQuery('.single-product-qa div.qa-box-wrap').length == jQuery('.single-product-qa div.qa-box-wrap:visible').length) {
                        jQuery('.read_more_q ').hide();
                    }
                });
            // console.log(qboxarr.slice(0,2));
            
        });

    };

    return {
        init: function () {
            // call event listener function
            setupEvenetListerner();
        }
    }
})(form_reply);

// initialize
Controller.init();
</script>