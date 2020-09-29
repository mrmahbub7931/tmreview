<div class="wrap">
    <h3>Add Brand</h3>
</div>
<div class="card">
    <div class="card-body">
        <form id="add-brand-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
            <?php wp_nonce_field('tm_add_brand980', 'tm_add_brand_security'); ?>
            <div class="form-group">
                <input type="text" name="brand_name" id="brand_name" class="widefat" placeholder="Brand Name">
                <span class="message"></span>
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

            <!-- <div class="form-group">
                <div class="initialInput">
                    <input type="text" name="">
                    <input type="text" name="social_link[]" class="social_link widefat" placeholder="Add Social Link Url">
                    <button type="button" id="removeRow" class="button button-primary"><i class="dashicons dashicons-trash"></i></button>
                </div>

                <div id="newRow"></div>
                <button id="addSocialBox" type="button" class="button button-info">Add Row</button>
            </div> -->
            <div class="form-group">
                <?php 
                    // if( $image ) {
 
                    //     echo '<a href="#" class="misha-upl"><img src="' . $image[0] . '" /></a>
                    //           <a href="#" class="misha-rmv">Remove image</a>
                    //           <input type="hidden" name="misha-img" value="' . $image_id . '">';
                     
                    // } else {
                     
                        
                     
                    // }
                    echo '<a href="#" class="brand up-img button button-secondary">Upload image</a>
                              <a href="#" class="rmv-img">Remove image</a>
                              <input type="hidden" name="img-id" value="">';
                
                ?>
            </div>
            <div class="form-group">
                <button class="save_brand button button-primary">Publish Brand</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    var form = document.getElementById('add-brand-form'),
        form_submit =  document.querySelector('.save_brand');

    if (form_submit) {
        form_submit.addEventListener("click",function (e) {
            e.preventDefault();
            var ajaxurl = form.dataset.url,
                brand_name = document.getElementById("brand_name").value,
                brand_slug = brand_name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),
                description = document.getElementById("description").value,
                facebook_url = document.getElementById("facebook_url").value,
                youtube_url = document.getElementById("youtube_url").value,
                instagram_url = document.getElementById("instagram_url").value,
                linkedin_url = document.getElementById("linkedin_url").value,
                brand_logo = document.getElementById("brand_logo").src;
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: {
                        action: 'brand_form_ajax_save',
                        brand_name: brand_name,
                        brand_slug: brand_slug,
                        description: description,
                        facebook_url: facebook_url,
                        youtube_url: youtube_url,
                        instagram_url: instagram_url,
                        linkedin_url: linkedin_url,
                        brand_logo: brand_logo
                    },
                    success: function(response) {
                        console.log(response);
                    }
               });
        });
    }
</script>