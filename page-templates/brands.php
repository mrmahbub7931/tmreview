<div class="wrap">
    <h1 class="wp-heading-inline">Brands</h1>
    <hr class="wp-header-end">
    <!-- <form class="search-form wp-clearfix" method="get">
<input type="hidden" name="taxonomy" value="category">
<input type="hidden" name="post_type" value="post">

        <p class="search-box">
            <label class="screen-reader-text" for="tag-search-input">Search Categories:</label>
            <input type="search" id="tag-search-input" name="s" value="">
            <input type="submit" id="search-submit" class="button" value="Search Categories">
        </p>
		
    </form> -->
    <?php 
        global $wpdb;
        $table = $wpdb->prefix.'brand';
        if (isset($_REQUEST['brand_edit'])) :
                $brandID = sanitize_key( $_GET['id'] );
                $sql = "SELECT * FROM $table WHERE id=$brandID";
                $single_form = $wpdb->get_results($sql) or die("data not found");  
    ?>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                    <div class="form-wrap">
                    <h2>Update Brand</h2>
                    <form action="#" method="post"  data-url="<?php echo admin_url('admin-ajax.php'); ?>" id="update-product-brand-form">
                        <?php wp_nonce_field('tm_update_product_brand4657', '_wpnonce_update_product_brand'); ?>
                        <input type="hidden" name="form-id" id="form-id" value="<?php echo $single_form[0]->id; ?>">
                        <div class="form-field form-required term-name-wrap">
                            <label for="p-brand-name">Name</label>
                            <input type="text" id="p-brand-name" name="name" class="p-brand-name" size="40" aria-required="true" value="<?php echo $single_form[0]->brand_name; ?>">
                            <p>The name is how it appears on your site.</p>
                        </div>
                        
                        <div class="form-field term-description-wrap">
                            <label for="brand-description">Description</label>
                            <textarea name="description" id="brand-description" rows="5" cols="40"><?php echo $single_form[0]->description; ?></textarea>
                            <p>The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                        <div class="form-field">
                        <?php if ($single_form[0]->brand_logo) : 
                        $image_url = $single_form[0]->brand_logo;
                        $image_id = tm_review_get_image_id($image_url);
                        echo '<a href="#" class="up-img"><img id="store_logo" src="' . $image_url . '" /></a>
                        <a href="#" class="rmv-img" style="display:block;">Remove image</a>
                        <input type="hidden" name="img-id" value="' . $image_id . '">';
                        
                        else:
                            echo '<a href="#" class="brand up-img button button-secondary">Upload image</a>
                            <a href="#" class="rmv-img" style="display:block;">Remove image</a>
                            <input type="hidden" name="img-id" value="">';
                        endif;
                            
                            ?>
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" id="p-brand-update" class="button button-primary" value="Update Brand Info">
                        </p>
                        <span class="message"></span>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-left -->
        <div id="col-right">
            <div class="col-wrap">
            <form action="#" id="display_brand" data-url="<?php echo admin_url('admin-ajax.php'); ?>" method="get">
                <table id="categoryTable" class="wp-list-table widefat fixed striped table-view-list tags">
                    <thead>
                        <tr>
                            <th scope="col" id="sl_no">SL No</th>
                            <th scope="col" id="image">Image</th>
                            <th scope="col" id="name">Name</th>
                            <th scope="col" id="slug">Slug</th>
                            <th scope="col" id="count">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tm-brand-list">
                        <!-- <tr id="cat-">
                            <th>Parent</th>
                            <th>Parent</th>
                            <th>Parent</th>
                            <th>Parent</th>
                        </tr> -->
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
    <?php elseif(isset($_REQUEST['brand_delete'])) :
        $brandID = sanitize_key( $_GET['id'] );
        $sql = "SELECT * FROM $table WHERE id=$brandID";
        $single_form = $wpdb->get_results($sql) or die("data not found");
        $condition = [
            'id'	=>	$brandID
        ];
        $wpdb->delete($table,$condition);
        $redirect = admin_url( 'admin.php?page=brand' );
        echo("<script>location.href = '".$redirect."'</script>");
        
    ?>
    <?php else: ?>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                    <div class="form-wrap">
                    <h2>Add New Brand</h2>
                    <form action="#" method="post"  data-url="<?php echo admin_url('admin-ajax.php'); ?>" id="add-product-brand-form">
                        <?php wp_nonce_field('tm_add_product_brand4657', '_wpnonce_add_product_brand'); ?>
                        <div class="form-field form-required term-name-wrap">
                            <label for="p-brand-name">Name</label>
                            <input type="text" id="p-brand-name" name="name" class="p-brand-name" size="40" aria-required="true">
                            <p>The name is how it appears on your site.</p>
                        </div>
                        
                        <div class="form-field term-description-wrap">
                            <label for="brand-description">Description</label>
                            <textarea name="description" id="brand-description" rows="5" cols="40"></textarea>
                            <p>The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                        <div class="form-field">
                            <?php
                                echo '<a href="#" class="brand up-img button button-secondary">Upload image</a>
                                        <a href="#" class="rmv-img" style="display:block;">Remove image</a>
                                        <input type="hidden" name="img-id" value="">';
                            
                            ?>
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" id="p-brand-submit" class="button button-primary" value="Add New Brand">
                        </p>
                        <span class="message"></span>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-left -->
        <div id="col-right">
            <div class="col-wrap">
            <form action="#" id="display_brand" data-url="<?php echo admin_url('admin-ajax.php'); ?>" method="get">
                <table id="categoryTable" class="wp-list-table widefat fixed striped table-view-list tags">
                    <thead>
                        <tr>
                            <th scope="col" id="sl_no">SL No</th>
                            <th scope="col" id="image">Image</th>
                            <th scope="col" id="name">Name</th>
                            <th scope="col" id="slug">Slug</th>
                            <th scope="col" id="count">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tm-brand-list">
                        <!-- <tr id="cat-">
                            <th>Parent</th>
                            <th>Parent</th>
                            <th>Parent</th>
                            <th>Parent</th>
                        </tr> -->
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


<script type="text/javascript">
    var form = document.getElementById('add-product-brand-form'),
        form_update = document.getElementById('update-product-brand-form'),
        form_submit =  document.getElementById('p-brand-submit'),
        form_update_submit = document.getElementById('p-brand-update');
        
    if (form_submit) {
        form_submit.addEventListener("click",function (e) {
            e.preventDefault();
            form_submit.setAttribute("disabled", "");
            
            var ajaxurl = form.dataset.url,
                name = document.getElementById("p-brand-name").value,
                description = document.getElementById("brand-description").value,
                slug = name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),
                nonce = document.getElementById("_wpnonce_add_product_brand").value,
                brand_logo = document.getElementById("store_logo"),
                message =  document.querySelector('.message');

                if (name && nonce && brand_logo != null) {
                    brand_logo = brand_logo.src;

                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'create_brand_product',
                            name: name,
                            slug: slug,
                            description: description,
                            brand_logo: brand_logo,
                            nonce: nonce
                        },
                        success: function(response) {
                            message.textContent = "Successfully Inserted!";
                            // message.textContent = response;
                            message.style.color = "#4CAF50";
                            form.reset();
                            form_submit.removeAttribute("disabled");
                        }
                    });
                }else{
                    message.textContent = "Insertation Failed! Brand Name field is required";
                    message.style.color = "#df2029";
                    form.reset();
                    form_submit.removeAttribute("disabled");
                }
                setTimeout(() => {
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
                }, 200);
                
                
        });
    }
    if (form_update_submit) {
        form_update_submit.addEventListener("click",function (e) {
            e.preventDefault();
            form_update_submit.setAttribute("disabled", "");
            
            var ajaxurl = form_update.dataset.url,
                name = document.getElementById("p-brand-name").value,
                description = document.getElementById("brand-description").value,
                slug = name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),
                brand_logo = document.getElementById("store_logo"),
                form_id = document.getElementById("form-id").value,
                message =  document.querySelector('.message');

                if (brand_logo != null) {
                    brand_logo = brand_logo.src;
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'update_brand_product',
                            name: name,
                            slug: slug,
                            description: description,
                            brand_logo: brand_logo,
                            form_id: form_id,
                        },
                        success: function(response) {
                            message.textContent = "Successfully Inserted!";
                            // message.textContent = response;
                            message.style.color = "#4CAF50";
                            form.reset();
                            form_submit.removeAttribute("disabled");
                        }
                    });
                }else{
                    message.textContent = "Something is wrong!";
                    message.style.color = "#df2029";
                    form.reset();
                    form_submit.removeAttribute("disabled");
                }
                setTimeout(() => {
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
                }, 200);
                
                
        });
    }
    var dc_form = document.getElementById('display_brand'),
        dc_ajaxurl = dc_form.dataset.url;
    jQuery.ajax({
        url: dc_ajaxurl,
        type: 'get',
        data: {
            action: 'display_product_brand',
        },
        success: function(response) {
            jQuery("#tm-brand-list").html(response); 
        }
    });
    
</script>