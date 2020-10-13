<div class="wrap">
    <?php
    global $wpdb;
    $table = $wpdb->prefix.'store'; 
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
    <form id="update-store-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container">

                <div class="card">
                    <div class="card-body">
                        
                            <?php wp_nonce_field('tm_add_store980', 'tm_add_store_security'); ?>
                            <input type="hidden" name="form_id" id="form_id" value="<?php echo $single_data->id?>">
                            <div class="form-group">
                                <input type="text" name="store_name" id="store_name" class="widefat" placeholder="store Name" value="<?php echo $single_data->name?>">
                            </div>
                            
                            <div class="form-group">
                                <textarea name="description" id="description" class="widefat" placeholder="Description"><?php echo $single_data->description?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="facebook_url" id="facebook_url" placeholder="Facebook Url" class="widefat" value="<?php echo $single_data->facebook_url; ?>">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="youtube_url" id="youtube_url" placeholder="Youtube Url" class="widefat" value="<?php echo $single_data->youtube_url; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="instagram_url" id="instagram_url" placeholder="Instagram Url" class="widefat" value="<?php echo $single_data->instagram_url; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="linkedin_url" id="linkedin_url" placeholder="Linkedin Url" class="widefat" value="<?php echo $single_data->linkedin_url; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="website_url" id="website_url" placeholder="Website Url" class="widefat" value="<?php echo $single_data->website_url; ?>">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="affiliate_url" id="affiliate_url" placeholder="Affiliates Url" class="widefat" value="<?php echo $single_data->affiliate_url; ?>">
                            </div>
                        
                    </div>
                </div>
            </div> <!-- end  postbox-container-->
            
            <div class="postbox-container">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                        <?php if ($single_data->store_logo) : 
                        $image_url = $single_data->store_logo;
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
                        <div class="form-group" style="margin-top: 5px;">
                            <button class="update_store button button-primary">Update store</button>
                        </div>
                        <span class="message"></span>
                    </div>
                </div> <!-- end card -->
            </div><!-- end  postbox-container-->
        </div>
    </form>
    <?php endforeach;endif; else: ?>
    <h1 class="wp-heading-inline">All stores</h1>
    <a href="<?php echo admin_url( 'admin.php?page=add-store' )?>" class="page-title-action">Add store</a>
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
                <th>store name</th>
                <th>Created Date</th>
                <th>Action</th>
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
                    <input id="cb-select-1" type="checkbox" name="store[]" value="1">
			    </th>
                <td><?php echo $key + 1?></td>
                <td><?php echo $data->name; ?></td>
                <td><?php echo date('F d, Y', strtotime($data->time)) ?></td>
                <td>
                    <a href="<?php echo admin_url('admin.php?page=store&view=results&id='.$data->id) ?>" class="button button-secondary">Details</a>
                    <a href="<?php echo home_url( '/'.$data->slug.'?store_id='.$data->id ) ?>" class="button button-secondary">View Page</a>
                </td>
            </tr>
             <?php endforeach; }?>
        </tbody>
    </table>
                <?php endif; ?>
</div>

<script type="text/javascript">
    var form = document.getElementById('update-store-form'),
        form_submit =  document.querySelector('.update_store');
    if (form_submit) {
        form_submit.addEventListener("click",function (e) {
            e.preventDefault();
            form_submit.setAttribute("disabled", "");
            var ajaxurl = form.dataset.url,
                store_name = document.getElementById("store_name").value,
                form_id = document.getElementById("form_id").value,
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
                if (store_logo != null) {
                    store_logo = store_logo.src;
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: {
                            action: 'store_form_ajax_update',
                            store_name: store_name,
                            form_id: form_id,
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