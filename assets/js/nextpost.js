var singlePageNextPost = (function($){
    
    return {
        singlePostNext: function(){
            $(window).scroll(function(){
               var footerPos = $('footer').last().position().top;
               var pos = $(window).scrollTop();
               
               if (pos+(screen.height*4) > footerPos){
                   if ($(".tm_newspaper-infinite-scroll").first().hasClass('working')) {
                        return false;
                    } else {
                      $(".tm_newspaper-infinite-scroll").first().addClass('working');
                    }
                    var NextPostId = $(".tm_newspaper-infinite-scroll").first().text();
                    var ajaxurl = $(".tm_newspaper-infinite-scroll").data('url');
                    var data = {
                      'action': 'tm_newspaper_next',
                      'NextPostId': NextPostId
                    };
        
                    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                    $.post(ajaxurl, data, function(response) {
                    	// console.log(response);
                      $(".tm_newspaper-infinite-scroll").first().replaceWith(response);
                    }, 'html');
               }
            var currUrl = $(".tm_newspaper-post-header").first().attr("url");
            var currTitle = $(".tm_newspaper-post-header").first().attr("title");
            
            if ($(".tm_newspaper-post-header").length > 1 && history.pushState) {
            for (var i=0; i<$(".tm_newspaper-post-header").length; i++) {
              if (pos+(screen.height/2) >= $(".tm_newspaper-post-header").eq(i).next().position().top) {
                currUrl = $(".tm_newspaper-post-header").eq(i).attr("url");
                currTitle = $(".tm_newspaper-post-header").eq(i).attr("title");
              }
            }
          }
          if (location.href != currUrl) {
            history.pushState({}, currTitle, currUrl);
          }
            
            });
        },
        
        init: function() {
            this.singlePostNext();
        }
    }
})(jQuery);

singlePageNextPost.init();