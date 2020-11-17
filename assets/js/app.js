(function ($) {

    "use strict";

    $('.navbar-menu .menu-item-has-children').hover(function() {

        $(this).find('.sub-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {

        $(this).find('.sub-menu').first().stop(true, true).delay(100).slideUp();

    });

    

    $('.right-menu-nav .menu-item-has-children').hover(function() {

        $(this).find('.sub-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {

        $(this).find('.sub-menu').first().stop(true, true).delay(100).slideUp();

    });



    var mainMenu,mainMenuWdith, mainMenuChildren,mainMenuChildrenParent, mChildrenWidth = 0;

    

    mainMenu = document.querySelector('#primary-navbar');

    mainMenuChildrenParent = document.querySelectorAll('#primary-navbar #navbar-menu');

    mainMenuChildren = document.querySelectorAll('#primary-navbar #navbar-menu li');

    if(mainMenu){

        mainMenuWdith = mainMenu.clientWidth;

    }

    

    mainMenuChildren = Array.prototype.slice.call(mainMenuChildren);



    for (var i = 0; i < mainMenuChildren.length; i++) {

        mChildrenWidth += mainMenuChildren[i].offsetWidth;

    }



    if (mainMenuChildren.length > 6) {

        var ul = $('<ul class="sub-menu"/>').append(mainMenuChildren.slice(6));

        ul.wrap('<li class="menu-item-has-children" />').parent().appendTo(mainMenuChildrenParent).prepend("<a href='#'>All</a>");



        $('.navbar-menu .menu-item-has-children').hover(function() {

            $(this).find('.sub-menu').first().stop(true, true).delay(250).slideDown();

        }, function() {

            $(this).find('.sub-menu').first().stop(true, true).delay(100).slideUp();

        });

    }

    $('.l-search-icoin').on('click',function() {
        $('.l-search').toggleClass('show');
    });

    // mobile menu

    $('.navbar-menu').clone().appendTo("#mNav");

    $('.mobile_menu .menu-item-has-children').hover(function() {

        $(this).find('.sub-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {

        $(this).find('.sub-menu').first().stop(true, true).delay(100).slideUp();

    });

    $('.mobile-header .m-menu-toggler').on('click',function(){

        $('.mobile_menu').toggleClass('show');

    });

    $('.m-menu-close').click(function(){

            $('.mobile_menu').removeClass('show');

    });

    $('.m-menu-search').on('click',function(){
        $('.mobile-header .search-form').toggleClass('show');
    });



    // append child item to parent div video section

    var singleItem = $('.video_news_parent .single_video_news');

    if (singleItem.length) {

        if (singleItem.length > 1) {

            var divVideo = $('<div class="single_video_news_child"/>').append(singleItem.slice(1));

            divVideo.wrap('<div class="single_video_news_right" />').parent().appendTo('.video_news_parent')

        }

        // console.log(document.querySelector('.single_video_news_child').length);
        
        if (document.querySelector('.single_video_news_child')) {

            var singleVideoList = document.querySelector('.single_video_news_child').children;
            var singleVideo = Array.prototype.slice.call(singleVideoList);
            singleVideo.forEach(e => {
                e.classList.remove('single_video_news');
                e.classList.add('single_video_list_right');

            });
        }

    }
    $(document).ready(function(){
        $('div.review_slide').css({'opacity':'1', 'visibility':'visible'});
        $('.review_slide').slick({
            infinite: true,
            // slidesToShow: 3,
            slidesPerRow: 5,
            rows: 2,
            slidesToScroll: 1,
            draggable:true,
            autoplay: true,
            autoplaySpeed: -1,
            speed:80000,
            easing:'linear',
            arrows:false,
            pauseOnHover:true,
        });
    });
    

    // $(window).on('scroll',function(){
    //     if ($(window).scrollTop() >= 150) {
    //         $('.tm_navbar').addClass('sticky');
    //         $('.mobile-header').addClass('m_sticky');
    //     }else {
    //         $('.tm_navbar').removeClass('sticky');
    //         $('.mobile-header').removeClass('m_sticky');
    //     }
    // });

    // var featured_slide = $('.techmix-soebd-welcome-area');

    // featured_slide.owlCarousel({

    //     items: 1,
    //     loop: true,
    //     nav: true,
    //     navText: ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>']

    // });



})(jQuery)