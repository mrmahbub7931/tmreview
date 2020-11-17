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
                    site_url = form.find("#site_url").val(),
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
                                window.location.href=site_url+'/account';
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
                

                var ratedIndex = 1;

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
                var form = $("#review-message-form");
                $("#p_review_submit").on("click",function (e) {
                    e.preventDefault();
                    var star = ratedIndex,
                        body = form.find("#review-message-box").val(),
                        title = form.find("#review_title").val(),
                        nonce = form.find("#tm_add_product_review_security").val(),
                        age_group = form.find("#age_group").val(),
                        hair_type = form.find("#hair_type").val(),
                        skin_type = form.find("#skin_type").val(),
                        user_id = form.find("#user_id").val(),
                        product_id = form.find("#product_id").val(),
                        product_slug = form.find("#product_slug").val(),
                        site_url = form.find("#site_url").val(),
                        ajaxurl = form.data('url');
                        
                        $.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: {
                                action: 'product_review_save',
                                nonce: nonce,
                                title: title,
                                body: body,
                                star: star,
                                age_group: age_group,
                                hair_type: hair_type,
                                skin_type: skin_type,
                                user_id: user_id,
                                product_id: product_id

                            },
                            success: function(response){
                                // console.log(response);
                                if (response === "1") {
                                    form.find('.message').html("Thanks for reviewing the products");
                                    form.find('.message').css({'color':'#4CAF50'});
                                    form[0].reset();
                                    window.location.href = site_url+product_slug+'?product_id='+product_id;
                                }else{
                                    window.location.href = response;
                                }
                                
                            }
                        });

                        
                });
            });
        },
        
        init: function () {
            this.productReviewCreatefn();
        }
    }
})(jQuery)

// product category create

var productCreate = (function($){
    
    return{
        slug: function(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
            var to   = "aaaaaeeeeeiiiiooooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        },
        productCreatefn: function(){
            $(document).ready(function(){
                $("#p-category-submit").on("click",function(e){
                    e.preventDefault();
                    var slug;
                    var form = $("#add-product-category-form"),
                    name = form.find("#p-category-name").val(),
                    parent = form.find("#parent").val(),
                    nonce = form.find("#_wpnonce_add_product_category").val(),
                    ajaxurl = form.data('url');
                    if (!form.find("#p-category-slug").val()) {
                        slug = this.slug(form.find("#p-category-name").val());
                    }else{
                        slug = this.slug(form.find("#p-category-slug").val());
                    }
                    if (!name || !nonce) {
                        $message = $('.message');
                        $message.addClass("text-danger");
                        $message.html("Required form field is missing");
                    } else {
                        $.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: {
                                action: "create_category_product",
                                name: name,
                                slug: slug,
                                parent: parent,
                                nonce: nonce
                            },
                            success: function (response) {
                                // window.location.href=site_url+'/account';
                                console.log(response);
                            }
                        });
                    }
                });
            });
        },
        init: function() {
            this.productCreatefn();
        }
    }

})(jQuery)

var questionCreate = (function ($) {
    return {
        questionCreatefn: function () {
            $(document).ready(function () {
                var question_form = $("#ask_question_form");
                question_form.on("submit",function (e) {
                   e.preventDefault();
                   var ajaxurl = question_form.data('url'),
                        user_id = $("#user_id").val(),
                        product_id = $("#product_id").val(),
                        body = $("#body").val();
                        // console.log(user_id);

                $.ajax({
                    type: 'post',

                    url: ajaxurl,
                    data: {
                        action: "make_question_fn",
                        user_id: user_id,
                        product_id: product_id,
                        body: body
                    },
                    success: function (response) {
                        if (response === "1") {
                            question_form.find('.message').html("Thanks for your question.we will reply as soon as possible");
                            question_form.find('.message').css({'color':'#4CAF50'});
                            question_form[0].reset();
                        }else{
                            window.location.href = response;
                        }
                    }
                });

               }); 
            });
        },
        init: function () {
            this.questionCreatefn();
        }
    }
})(jQuery);

var wishlistfn = (function () {
    return {
        wishlistCreate: function (e) {
            e.preventDefault();
            currentForm = e.currentTarget;
            var item_name = currentForm.querySelector('#item_name').value,
                item_image = currentForm.querySelector('#item_image').value,
                user_id = currentForm.querySelector('#user_id').value,
                product_id = currentForm.querySelector('#product_id').value,
                form_submit = currentForm.querySelector('button'),
                wishlist_icon = currentForm.querySelector('.far.fa-heart'),
                ajaxurl = currentForm.dataset.url;

                if (!wishlist_icon.classList.contains('fas fa-check')) {
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: "wishlist_ajax",
                            item_name: item_name,
                            item_image: item_image,
                            user_id: user_id,
                            product_id: product_id
                        },
                        success: function(response){
                            console.log(response);
                            wishlist_icon.classList.add('fas','fa-check');
                            form_submit.setAttribute("disabled", "");
                            if (response !== "1") {
                                window.location.href = response;
                            }else{
                                wishlist_icon.classList.add('fas','fa-check');
                            }
                        }
                    });
                }
                
                // if(wishlist_icon.classList.contains('fas fa-check')){
                //     wishlist_icon.classList.remove('fas','fa-check');
                // }
        }
    }
    
    // wishlistfn: function () {
//     var wishlist_form = $('#wishlist-form'),
//         wishlist_btn = $('span.wishlist');
//         wishlist_btn.on("click",function (e) {
//            e.preventDefault();
//            var item_name = wishlist_form.find('#item_name').val(),
//                 item_image = wishlist_form.find('#item_image').val(),
//                 user_id = wishlist_form.find('#user_id').val(),
//                 product_id = wishlist_form.find('#product_id').val(),
//                 ajaxurl = wishlist_form.data('url');
//                 // console.log(wishlist_form.html());
//                 // if (!wishlist_btn.find('.far.fa-heart').hasClass('fas fa-check')) {
//                 //     jQuery.ajax({
//                 //         url: ajaxurl,
//                 //         type: 'post',
//                 //         data: {
//                 //             action: "wishlist_ajax",
//                 //             item_name: item_name,
//                 //             item_image: item_image,
//                 //             user_id: user_id,
//                 //             product_id: product_id
//                 //         },
//                 //         success: function(response){
//                 //             console.log(response);
//                 //             // if (response !== "1") {
//                 //             //     window.location.href = response;
//                 //             // }else{
//                 //             //     wishlist_btn.find('.far.fa-heart').addClass('fas fa-check');
//                 //             // }
//                 //         }
//                 //     });
//                 // }else{
//                 //     wishlist_btn.find('.far.fa-heart').removeClass('fas fa-check');
//                 // }
//         });
// }
})();

var wishlistController = (function (wishlist) {
    var NodeListLoop = function (list,callback) {
        for(let i = 0; i<list.length; i++) {
            callback(list[i],i);
        }
    }
    var setupEvenetListerner = function () {
        
        window.addEventListener("load",() => {
            var wishlist_form = document.querySelectorAll("#wishlist-form");
            if (wishlist_form) {
                NodeListLoop(wishlist_form,function (cur) {
                    cur.addEventListener("submit",wishlist.wishlistCreate);
                });
            }
            
        });

    };
    return {
        init: function () {
            setupEvenetListerner();
        }
    }
})(wishlistfn);



userCreate.init();
productReviewCreate.init();
productCreate.init();
questionCreate.init();
wishlistController.init();