<div class="wrap">
    <h1 class="wp-heading-inline">Categories</h1>
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
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
            <?php
                global $wpdb;
                $table = $wpdb->prefix.'categories';
                $sql = "SELECT * FROM $table WHERE parent=0";
                $categories = $wpdb->get_results($sql);
            ?>
            <?php //foreach ($categories as $category) : echo $category->parent; ?>

            <?php// endforeach; ?>
                <div class="form-wrap">
                    <h2>Add New Category</h2>
                    <form action="#" method="post"  data-url="<?php echo admin_url('admin-ajax.php'); ?>" id="add-product-category-form">
                        <?php wp_nonce_field('tm_add_product_category4657', '_wpnonce_add_product_category'); ?>
                        <div class="form-field form-required term-name-wrap">
                            <label for="p-category-name">Name</label>
                            <input type="text" id="p-category-name" name="name" class="p-category-name" size="40" aria-required="true">
                            <p>The name is how it appears on your site.</p>
                        </div>
                        <!-- <div class="form-field term-slug-wrap">
                            <label for="p-category-slug">Slug</label>
                            <input name="slug" id="p-category-slug" type="text" value="" size="40">
                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div> -->
                        
                        <div class="form-field term-parent-wrap">
                            <label for="parent">Parent Category</label>
                            <select name="parent" id="parent" class="postform">
                                <option value="0">None</option>
                                <?php foreach ($categories as $category) :  ?>
                                <option value="<?php echo $category->id?>"><?php echo $category->category_name?></option>
                                <?php  endforeach; ?>
                            </select>
                            <p>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
                        </div>
                        <p class="submit">
                            <input type="submit" name="submit" id="p-category-submit" class="button button-primary" value="Add New Category">
                        </p>
                        <span class="message"></span>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-left -->
        <div id="col-right">
            <div class="col-wrap">
            <form action="#" id="display_category" data-url="<?php echo admin_url('admin-ajax.php'); ?>" method="get">
                <table id="categoryTable" class="wp-list-table widefat fixed striped table-view-list tags">
                    <thead>
                        <tr>
                            <th scope="col" id="name">Name</th>
                            <th scope="col" id="slug">Slug</th>
                            <th scope="col" id="parent">Parent</th>
                            <th scope="col" id="count">Count</th>
                        </tr>
                    </thead>
                    <tbody id="tm-category-list">
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
</div>


<script type="text/javascript">
    var form = document.getElementById('add-product-category-form'),
        form_submit =  document.getElementById('p-category-submit');
    if (form_submit) {
        form_submit.addEventListener("click",function (e) {
            e.preventDefault();
            form_submit.setAttribute("disabled", "");
            
            var ajaxurl = form.dataset.url,
                name = document.getElementById("p-category-name").value,
                slug = name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),

                parent = document.getElementById("parent").value,
                nonce = document.getElementById("_wpnonce_add_product_category").value,
                message =  document.querySelector('.message');

                if (name && nonce) {
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'create_category_product',
                            name: name,
                            slug: slug,
                            parent: parent,
                            nonce: nonce
                        },
                        success: function(response) {
                            message.textContent = "Successfully Inserted!";
                            message.style.color = "#4CAF50";
                            form.reset();
                            form_submit.removeAttribute("disabled");
                        }
                    });
                }else{
                    message.textContent = "Insertation Failed! Category Name field is required";
                    message.style.color = "#df2029";
                    form.reset();
                    form_submit.removeAttribute("disabled");
                }
                setTimeout(() => {
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'get',
                        data: {
                            action: 'display_category_product',
                        },
                        success: function(response) {
                            // console.log(response);
                            jQuery("#tm-category-list").html(response); 
                        }
                    });
                }, 200);
                
                
        });
        var dc_form = document.getElementById('display_category'),
            dc_ajaxurl = dc_form.dataset.url;
        jQuery.ajax({
            url: dc_ajaxurl,
            type: 'get',
            data: {
                action: 'display_category_product',
            },
            success: function(response) {
                jQuery("#tm-category-list").html(response); 
            }
        });
    }
</script>