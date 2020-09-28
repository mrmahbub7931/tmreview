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

if (! is_user_logged_in()) {
    wp_redirect( home_url(  ).'/login',301 );
    exit;
}

get_header();

$container = get_theme_mod( 'techmix_review_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row justify-content-center my-4">

<div class="col-md-3">
    <div class="short-profile">
        <img src="img/1.jpg" alt="name">
        <div>
            <span>hello!</span>
            <h4>md.faizul kabir</h4>
        </div>
    </div>
    <div class="list-group aside" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="list-group-item list-group-item-action" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
            role="tab" aria-controls="v-pills-home" aria-selected="true">my accounts</a>
        <a class="list-group-item list-group-item-action" id="v-pills-profile-tab" data-toggle="pill"
            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">my reviews</a>
        <a class="list-group-item list-group-item-action" id="v-pills-messages-tab" data-toggle="pill"
            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">my question &
            answers</a>
        <a class="list-group-item list-group-item-action" id="v-pills-settings-tab" data-toggle="pill"
            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">my rewards</a>
        <a class="list-group-item list-group-item-action" id="v-pills-my-wishlist-tab" data-toggle="pill"
            href="#v-pills-my-wishlist" role="tab" aria-controls="v-pills-my-wishlist" aria-selected="false">my
            wishlist</a>
        <a href="<?php echo wp_logout_url(home_url()); ?>" class="list-group-item list-group-item-action">log out</a>
    </div>
</div>
<div class="col-md-9">
    <div class="tab-content right" id="v-pills-tabContent">

        <!---MY-ACCOUNTS-START--->
        <div class="tab-pane fade show active my-accounts" id="v-pills-home" role="tabpanel"
            aria-labelledby="v-pills-home-tab">
            <form action="">
                <div class="heading">
                    <h5>personal information</h5><a href="#">change information</a>
                </div>
                <hr>
                <div class="form-group">
                    <label for="fname">name</label><br>
                    <input type="text" id="fname" name="fname">
                </div>
                <div class="form-group">
                    <label for="birthday">your date of Birth</label><br>
                    <input type="date" id="birthday" name="birthday">
                </div>
                <div class="form-group">
                    <label for="fname">Gender</label><br>
                    <input type="radio" id="male" name="gender" value="male">&nbsp;Male&nbsp;&nbsp;<input type="radio"
                        id="female" name="gender" value="female">&nbsp;Female&nbsp;&nbsp;
                </div>
                <hr>

                <div class="form-group">
                    <div class="heading">
                        <h5>mobile number</h5><a href="#">change mobile number</a>
                    </div>
                    <hr>
                    <input type="text" value="01876464617" name="date">
                </div>
                <hr>

                <div class="form-group">
                    <div class="heading">
                        <h5>Email address</h5><a href="#">change Email address</a>
                    </div>
                    <hr>
                    <input type="text" value="nazmulhasan@gmail.com" name="">
                </div>
                <hr>

                <div class="heading">
                    <h5>profile picture</h5><a href="#">change profile picture</a>
                </div>
                <hr>

                <label for="fname">your profile photo</label><br>
                <img src="img/1.jpg" alt="name">
                <hr>
                <div class="heading">
                    <h5>password</h5><a href="#">change password</a>
                </div>
                <hr>
                <div class="form-group">
                    <label for="fname">your current password</label><br>
                    <input type="password" value="23hjy679" name="">
                </div>


            </form>
        </div>
        <!---MY-ACCOUNTS-END----->

        <!---MY-REVIEWS-START---->
        <div class="tab-pane fade my-review" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="heading">
                <h5>my reviews</h5>
            </div>
            <div class="review-list">
                <img src="img/1.jpg" alt="name">
                <div>
                    <h6>jordana matte lpstick</h6>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span>4</span>
                    <span>(you rated this book)</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. necessitatibus est corporis quaerat
                        ratione debitis voluptate dignissimos!</p>
                    <a href="#" class="line">Edit review</a><a href="#">Delete review</a>
                </div>

            </div>
            <div class="review-list">
                <img src="img/1.jpg" alt="name">
                <div>
                    <h6>jordana matte lpstick</h6>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span>4</span>
                    <span>(you rated this book)</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. necessitatibus est corporis quaerat
                        ratione debitis voluptate dignissimos!</p>
                    <a href="#" class="line">Edit review</a><a href="#">Delete review</a>
                </div>
            </div>
        </div>
        <!---MY-REVIEWS-END---->

        <!---MY-QUESTION-AND-ANSWER-START---->
        <div class="tab-pane fade myquestion-and-answer" id="v-pills-messages" role="tabpanel"
            aria-labelledby="v-pills-messages-tab">
            <div class="heading">
                <h5>my questions and answers</h5>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">my questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">my answers</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active question" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="question-list">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.?</p>
                            <span>habiba</span><span>3 hours ago</span>
                        </div>
                    </div>
                    <div class="question-list">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.?</p>
                            <span>habiba</span><span>3 hours ago</span>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">what</div>
            </div>
        </div>
        <!---MY-QUESTION-AND-ANSWER-END---->

        <!---MY-REWARDS-START---->
        <div class="tab-pane fade my-rewards" id="v-pills-settings" role="tabpanel"
            aria-labelledby="v-pills-settings-tab">
            <div class="heading">
                <h5>my rewards</h5>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">earned from</th>
                        <th scope="col">gift cird</th>
                        <th scope="col">value</th>
                        <th scope="col">expired date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!---MY-REWARDS-END---->

        <!---MY-WISHLIST-START---->
        <div class="tab-pane fade my-wishlist" id="v-pills-my-wishlist" role="tabpanel"
            aria-labelledby="v-pills-my-wishlist-tab">
            <div class="heading">
                <h5>my rewards</h5>
                <span>you have 3 products in your wishlist</span>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="single-wishlist">
                        <img src="img/product.jpg" alt="product" class="img-fluid product-img">
                        <i class="fa fa-heart-o"></i>
                        <p>Lorem ipsum dolor sit amet,dipisicing elit.!</p>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="single-wishlist">
                        <img src="img/product.jpg" alt="product" class="img-fluid product-img">
                        <i class="fa fa-heart-o"></i>
                        <p>Lorem ipsum dolor sit amet,dipisicing elit.!</p>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="single-wishlist">
                        <img src="img/product.jpg" alt="product" class="img-fluid product-img">
                        <i class="fa fa-heart-o"></i>
                        <p>Lorem ipsum dolor sit amet,dipisicing elit.!</p>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </a>
                </div>
            </div>
        </div>
        <!---MY-WISHLIST-END---->

    </div>
</div>

</div>

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>