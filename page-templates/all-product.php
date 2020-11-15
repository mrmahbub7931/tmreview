<div class="wrap">
    <?php
    global $wpdb;
    $table = $wpdb->prefix.'product'; 
        $category_sql = 'SELECT * from '.$wpdb->prefix.'product INNER JOIN '.$wpdb->prefix.'categories ON '.$wpdb->prefix.'categories.id = '.$wpdb->prefix.'product.category_id';
        
        $brand_sql = 'SELECT * from '.$wpdb->prefix.'product INNER JOIN '.$wpdb->prefix.'brand ON '.$wpdb->prefix.'brand.id = '.$wpdb->prefix.'product.brand_id';

        $selected_category = $wpdb->get_results($category_sql);
        $selected_brand = $wpdb->get_results($brand_sql);
        if (isset($_REQUEST['view'])) : 
            $storeID = sanitize_key( $_GET['id'] );
            $sql = "SELECT * FROM $table WHERE id=$storeID";
                    $single_form = $wpdb->get_results($sql) or die("data not found");
                    if (count($single_form) > 0) :
    ?>
    <h1 class="wp-heading-inline">View <?php echo $single_form[0]->name?> Details</h1>
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th>
                    <a href="<?php echo admin_url('admin.php?page=store');?>" class=""><i class="dashicons dashicons-arrow-left-alt"></i>Go Back</a>
                </th>
                <th style="text-align: center;">
                    
                </th>
                <th style="text-align: right;">
                    
                </th>
            </tr>
        </thead>
    </table>
    
    <?php foreach ($single_form as $single_data) : ?>
        <form id="update-product-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container">

                <div class="card">
                    <div class="card-body">
                        
                            <?php wp_nonce_field('tm_add_product980', 'tm_add_product_security'); ?>
                            <input type="hidden" name="form_id" id="form_id" value="<?php echo $single_data->id?>">
                            <div class="form-group">
                                <input type="text" name="product_name" id="product_name" class="widefat" placeholder="Product Name" value="<?php echo $single_data->name?>">
                            </div>
                            <div class="form-group">
                            <button id="addDescBox" type="button" class="button button-primary"><i class="dashicons dashicons-plus-alt"></i></button>
                            <?php 
                                $description = explode(",",$single_data->description);
                                $number_text = explode(",",$single_data->number_text);
                                $desc = new MultipleIterator();
                                $desc->attachIterator(new ArrayIterator($number_text));
                                $desc->attachIterator(new ArrayIterator($description));
                                foreach ($desc as $value) :
                            ?>
                                
                                <div class="initialInput">
                                    <input type="text" name="number_text[]" class="social_link widefat" placeholder="Number Description" value="<?php echo $value[0]?>">
                                    <input type="text" name="description[]" class="social_link widefat" placeholder="Text Description" value="<?php echo $value[1]?>">
                                    <button type="button" id="removeRow" class="button button-secondary"><i class="dashicons dashicons-trash"></i></button>
                                </div>
                                <?php endforeach; ?>
                                <div id="newRow"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="check_price" id="check_price" class="widefat" placeholder="Check price url" value="<?php echo $single_data->check_price?>">
                            </div>
                            <?php
                                $table = $wpdb->prefix.'categories';
                                $sql = "SELECT * FROM $table";
                                $single_form = $wpdb->get_results($sql) or 0; 
                                if ($single_form !== 0) :
                            ?>
                            <div class="form-field" style="margin-top: 10px;">
                                <label for="category_id">Categories</label>
                                <select name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    <?php foreach ($single_form as $item) :?>
                                    <option <?php if($item->id === $selected_category[0]->id) : ?> selected <?php endif; ?> value="<?php echo $item->id?>"><?php echo $item->category_name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php endif; ?>
                            
                            <?php
                                $table = $wpdb->prefix.'brand';
                                $sql = "SELECT * FROM $table";
                                $single_form = $wpdb->get_results($sql) or 0; 
                                if ($single_form !== 0) :
                            ?>
                            <div class="form-field" style="margin-top: 10px;">
                                <label for="brand_id">Brands</label>
                                <select name="brand_id" id="brand_id">
                                    <option value="">Select Brand</option>
                                    <?php foreach ($single_form as $item) :?>
                                    <option <?php if($item->id === $selected_brand[0]->id) : ?> selected <?php endif; ?> value="<?php echo $item->id?>"><?php echo $item->brand_name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php endif; ?>
                            
                        
                    </div>
                </div>
            </div> <!-- end  postbox-container-->
            
            <div class="postbox-container">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                        <?php if ($single_data->product_logo) : 
                        $image_url = $single_data->product_logo;
                        $image_id = tm_review_get_image_id($image_url);
                        echo '<a href="#" class="up-img"><img id="store_logo" src="' . $image_url . '" /></a>
                        <a href="#" class="rmv-img button button-secondary">Remove image</a>
                        <input type="hidden" name="img-id" value="' . $image_id . '">';
                        
                        else:
                                echo '<a href="#" class="store up-img button button-primary">Upload image</a>
                                        <a href="#" class="rmv-img button button-secondary">Remove image</a>
                                        <input type="hidden" name="img-id" value="">';
                        endif;
                            
                            ?>
                        </div>
                        <div class="form-group">
                            <button class="update_product button button-primary">Update Product</button>
                        </div>
                        <span class="message"></span>
                    </div>
                </div> <!-- end card -->
            </div><!-- end  postbox-container-->
        </div>
    </div>
    </form>
    <?php endforeach;endif; else: ?>
    <h1 class="wp-heading-inline">All Products</h1>
    <a href="<?php echo admin_url( 'admin.php?page=add-product' )?>" class="page-title-action">Add product</a>
    <form method="get" id="posts-filter">
        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Search stores:</label>
            <input type="search" id="post-search-input" name="s" value="">
            <input type="submit" id="search-submit" class="button" value="Search Posts">
        </p>
    </form>
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
            <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td>
                <th>#</th>
                <th>Product image</th>
                <th>Product name</th>
                <th>Category name</th>
                <th>Brand name</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM $table";
            $results = $wpdb->get_results($sql);
            if (count($results) <= 0) {
                echo "Data not found!";
            }else{
                foreach( $results as $key => $data ) :
        ?>
            <tr>
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="cb-select-1">Select Hello world!</label>
                    <input id="cb-select-1" type="checkbox" name="product[]" value="1">
			    </th>
                <td><?php echo $key + 1?>
                <div class="row-actions"><span class="edit"><a href="<?php echo admin_url('admin.php?page=product&view=results&id='.$data->id) ?>">Edit</a> | </span><span class="inline hide-if-no-js"> | </span><span class="trash"><a href="#" class="submitdelete">Trash</a> | </span><span class="view"><a href="<?php echo home_url( '/'.$data->slug.'?product_id='.$data->id ) ?>" rel="bookmark">View</a></span></div>
                </td>
                <td><img src="<?php echo $data->product_logo; ?>" alt="" style="width: 60px; height: 60px;"></td>
                <td><?php echo $data->name; ?></td>
                <td><?php echo $selected_category[0]->category_name ?></td>
                <td><?php echo $selected_brand[0]->brand_name ?></td>
                <td><?php echo date('F d, Y', strtotime($data->time)) ?></td>
            </tr>
             <?php endforeach; }?>
        </tbody>
    </table>
                <?php endif; ?>

    <form action="" method="post" name="uploadProduct" enctype="multipart/form-data">
        <div class="form-field">
            <label for="file">Import CSV Data: </label>
            <input type="file" name="file" id="file" accept=".csv">
        </div>
        <input type="submit" value="import" name="p_import" class="button button-primary">
    </form>
</div>
<?php
    
    if (isset($_POST['p_import'])) {
        $import_product_table = $wpdb->prefix.'product'; 
        $filename = $_FILES['file']['tmp_name'];
        if ($_FILES['file']['size'] > 0) {
            $file = fopen($filename,"r");
            $data = fgetcsv($file,10000,",");

            while ($column = fgetcsv($file,10000,",")) {
                $id = $column[0];
                $name = $column[1];
	            $slug = $column[2];
	            $description = $column[3];
	            $number_text = $column[4];
                $check_price = $column[5];
                $data = [
                    'id' => $id,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'number_text' => $number_text,
                    'check_price' => $check_price,
                ];
                $wpdb->insert($import_product_table,$data);
            }
        }
    }

?>
<script type="text/javascript">
    var form = document.getElementById('update-product-form'),
        form_submit =  document.querySelector('.update_product');
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
                form_id = document.getElementById("form_id").value,
                product_name = document.getElementById("product_name").value,
                product_slug = product_name.toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,''),

                check_price = document.getElementById("check_price").value,
                product_logo = document.getElementById("store_logo"),
                brand_id = document.getElementById("brand_id").value,
                category_id = document.getElementById("category_id").value,
                message =  document.querySelector('.message');
                // console.log(form_id + " " + number_text.toString() + " " + product_name + " " + product_slug + " " + description.toString() + " "+ check_price);

                if (store_logo != null) {
                    product_logo = store_logo.src;
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'product_form_ajax_update',
                            form_id: form_id,
                            product_name: product_name,
                            product_slug: product_slug,
                            number_text: number_text.toString(),
                            description: description.toString(),
                            check_price: check_price,
                            category_id: category_id,
                            brand_id: brand_id,
                            product_logo: product_logo
                        },
                        success: function(response) {
                            message.textContent = "Successfully Updated!";
                            message.style.color = "#4CAF50";
                            form_submit.removeAttribute("disabled");
                        }
                    });
                }else{
                    message.textContent = "Something is wrong!";
                    message.style.color = "#df2029";
                    form.reset();
                    form_submit.removeAttribute("disabled");
                }
                
        });
    }
</script>