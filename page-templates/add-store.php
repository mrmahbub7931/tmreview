<div class="wrap">
    <h3>Add store</h3>
    <form id="add-store-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container">

                <div class="card">
                    <div class="card-body">
                        
                            <?php wp_nonce_field('tm_add_store980', 'tm_add_store_security'); ?>
                            <div class="form-group">
                                <input type="text" name="store_name" id="store_name" class="widefat" placeholder="store Name">
                            </div>
                            
                            <div class="form-group">
                                <textarea name="description" id="description" class="widefat" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="facebook_url" id="facebook_url" placeholder="Facebook Url" class="widefat">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="youtube_url" id="youtube_url" placeholder="Youtube Url" class="widefat">
                            </div>
                            <div class="form-group">
                                <input type="text" name="instagram_url" id="instagram_url" placeholder="Instagram Url" class="widefat">
                            </div>
                            <div class="form-group">
                                <input type="text" name="linkedin_url" id="linkedin_url" placeholder="Linkedin Url" class="widefat">
                            </div>
                            <div class="form-group">
                                <input type="text" name="website_url" id="website_url" placeholder="Website Url" class="widefat">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="affiliate_url" id="affiliate_url" placeholder="Affiliates Url" class="widefat">
                            </div>
                        
                    </div>
                </div>
            </div> <!-- end  postbox-container-->
            
            <div class="postbox-container">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                                echo '<a href="#" class="store up-img button button-secondary">Upload image</a>
                                        <a href="#" class="rmv-img">Remove image</a>
                                        <input type="hidden" name="img-id" value="">';
                            
                            ?>
                        </div>
                        <div class="form-group">
                            <button class="save_store button button-primary">Publish store</button>
                        </div>
                        <span class="message"></span>
                    </div>
                </div> <!-- end card -->
            </div><!-- end  postbox-container-->
        </div>
    </div>
    </form>
</div>
    

</div> <!-- end wrap -->
<script type="text/javascript">
    var form = document.getElementById('add-store-form'),
        form_submit =  document.querySelector('.save_store');
    if (form_submit) {
        form_submit.addEventListener("click",function (e) {
            e.preventDefault();
            form_submit.setAttribute("disabled", "");
            var ajaxurl = form.dataset.url,
                store_name = document.getElementById("store_name").value,
                store_slug = store_name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),
                description = document.getElementById("description").value,
                facebook_url = document.getElementById("facebook_url").value,
                youtube_url = document.getElementById("youtube_url").value,
                instagram_url = document.getElementById("instagram_url").value,
                linkedin_url = document.getElementById("linkedin_url").value,
                website_url = document.getElementById("website_url").value,
                affiliate_url = document.getElementById("affiliate_url").value,
                store_logo = document.getElementById("store_logo"),
                message =  document.querySelector('.message');
                if (store_name && store_logo != null) {
                    store_logo = store_logo.src;
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'store_form_ajax_save',
                            store_name: store_name,
                            store_slug: store_slug,
                            description: description,
                            facebook_url: facebook_url,
                            youtube_url: youtube_url,
                            instagram_url: instagram_url,
                            linkedin_url: linkedin_url,
                            website_url: website_url,
                            affiliate_url: affiliate_url,
                            store_logo: store_logo
                        },
                        success: function(response) {
                            message.textContent = "Successfully Inserted!";
                            message.style.color = "#4CAF50";
                            form.reset();
                            form_submit.removeAttribute("disabled");
                        }
                    });
                }else{
                    message.textContent = "Insertation Failed! store name & store Logo field is required";
                    message.style.color = "#df2029";
                    form.reset();
                    form_submit.removeAttribute("disabled");
                }
                
        });
    }
</script>