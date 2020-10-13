<div class="wrap">
    <h3>Add Product</h3>
    <form id="add-product-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container">

                <div class="card">
                    <div class="card-body">
                        
                            <?php wp_nonce_field('tm_add_product980', 'tm_add_product_security'); ?>
                            <div class="form-group">
                                <input type="text" name="product_name" id="product_name" class="widefat" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                            <button id="addDescBox" type="button" class="button button-primary"><i class="dashicons dashicons-plus-alt"></i></button>
                                <div class="initialInput">
                                    <input type="text" name="number_text[]" class="social_link widefat" placeholder="Number Description">
                                    <input type="text" name="description[]" class="social_link widefat" placeholder="Text Description">
                                    <button type="button" id="removeRow" class="button button-secondary"><i class="dashicons dashicons-trash"></i></button>
                                </div>
                                <div id="newRow"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="check_price" id="check_price" class="widefat" placeholder="Check price url">
                            </div>
                            
                        
                    </div>
                </div>
            </div> <!-- end  postbox-container-->
            
            <div class="postbox-container">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                                echo '<a href="#" class="product up-img button button-secondary">Upload image</a>
                                        <a href="#" class="rmv-img">Remove image</a>
                                        <input type="hidden" name="img-id" value="">';
                            
                            ?>
                        </div>
                        <div class="form-group">
                            <button class="save_product button button-primary">Publish Product</button>
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
    var form = document.getElementById('add-product-form'),
        form_submit =  document.querySelector('.save_product');
    if (form_submit) {
        form_submit.addEventListener("click",function (e) {
            e.preventDefault();
            form_submit.setAttribute("disabled", "");
            var desc_number = document.getElementsByName('number_text[]'),
                desc_text = document.getElementsByName('description[]'),
                number_text = [],
                description = [];
            for (var i = 0; i < desc_number.length; i++) { 
                number_text[i] = desc_number[i].value; 
            }
            for (var i = 0; i < desc_text.length; i++) { 
                description[i] = desc_text[i].value; 
            }

            var ajaxurl = form.dataset.url,
                product_name = document.getElementById("product_name").value,
                product_slug = product_name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),

                check_price = document.getElementById("check_price").value,
                product_logo = document.getElementById("store_logo"),
                message =  document.querySelector('.message');
                // console.log(number_text.toString() + " " + product_name + " " + product_slug + " " + description.toString() + " "+ check_price + " "+product_logo);

                if (product_name && store_logo != null) {
                    product_logo = store_logo.src;
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'product_form_ajax_save',
                            product_name: product_name,
                            product_slug: product_slug,
                            number_text: number_text.toString(),
                            description: description.toString(),
                            check_price: check_price,
                            product_logo: product_logo
                        },
                        success: function(response) {
                            message.textContent = "Successfully Inserted!";
                            message.style.color = "#4CAF50";
                            form.reset();
                            form_submit.removeAttribute("disabled");
                        }
                    });
                }else{
                    message.textContent = "Insertation Failed! Product name & Product Logo field is required";
                    message.style.color = "#df2029";
                    form.reset();
                    form_submit.removeAttribute("disabled");
                }
                
        });
    }
</script>