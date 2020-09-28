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

userCreate.init();