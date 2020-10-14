// user_register

var userCreate = (function($){
    
    return{
        userCreatefn: function(){
            $(document).ready(function(){
                $("#user_register").on("click",function(e){
                    e.preventDefault();
                    var form = $("#tm_user_insert"),
                    name = form.find("#name").val(),
                    password = form.find("#password").val(),
                    phone = form.find("#phone").val(),
                    username = form.find("#uname").val(),
                    nonce = form.find("#user_regi_security").val(),
                    ajaxurl = form.data('url');
                    if (!name || !password || !username || !nonce) {
                        $message = $('.message');
                        $message.addClass("text-danger");
                        $message.html("Required form field is missing");
                    } else {
                        
                        $.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: {
                                action: "user_create_custom",
                                name: name,
                                password: password,
                                phone: phone,
                                username: username,
                                nonce: nonce
                            },
                            success: function (response) {
                                console.log(response);
                            }
                        });
                    }
                });
            });
        },
        init: function() {
            this.userCreatefn();
        }
    }

})(jQuery)

var productReviewCreate = (function ($) {
    return {
        productReviewCreatefn: function () {
            $(document).ready(function () {
                var color = ['#FF381C','#e6672b','#ffc31c','#73cf11','#00b67a'];
               
                $('.review-form-top li .ion-android-star').mouseover(function() {
                    var star_index  = parseInt($(this).data('index'));
                    for (var i = 0; i < star_index; i++) {
                        $('.review-form-top li.single-star-'+i+' .ion-android-star').css({'background-color': color[i]});
                    }
                    
                });

                $('.review-form-top li .ion-android-star').mouseleave(function() {
                    resetColor();
                    $('.review-form-top li.single-star-0 .ion-android-star').css({'background-color': '#FF381C'});
                });
                

                var ratedIndex = -1;

                $('.review-form-top li .ion-android-star').on("click",function () {
                    resetColor();
                    ratedIndex = parseInt($(this).data("index"));
                });

                $('.review-form-top li .ion-android-star').mouseleave(function () {
                    if (ratedIndex != -1) {
                            for (var i = 0; i < ratedIndex; i++) {
                                $('.review-form-top li.single-star-'+i+' .ion-android-star').css({'background-color':color[i]});
                            };
                    }
                });

                function resetColor() {
                    $('.review-form-top li .ion-android-star').css({'background-color': "#DCDAE5"});
                }
                $("#p_review_submit").on("click",function (e) {
                    e.preventDefault();
                    
                });
            });
        },
        
        init: function () {
            this.productReviewCreatefn();
        }
    }
})(jQuery)

userCreate.init();
productReviewCreate.init();