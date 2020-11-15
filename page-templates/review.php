<div class="wrap">
    <?php
    global $wpdb;
    $table = $wpdb->prefix.'product_review'; 
    $product_sql = 'SELECT name,slug from '.$wpdb->prefix.'product_review INNER JOIN '.$wpdb->prefix.'product ON '.$wpdb->prefix.'product.id = '.$wpdb->prefix.'product_review.product_id';
    
    $user_sql = 'SELECT display_name from '.$wpdb->prefix.'product_review INNER JOIN '.$wpdb->prefix.'users ON '.$wpdb->prefix.'users.id = '.$wpdb->prefix.'product_review.user_id';
    $users = $wpdb->get_results($user_sql);
    $products = $wpdb->get_results($product_sql);
        if (isset($_REQUEST['view']) && $_REQUEST['view'] === 'review') : 
            $reviewID = sanitize_key( $_GET['id'] );
            $sql = "SELECT * FROM $table WHERE id=$reviewID";
                    $review_data = $wpdb->get_results($sql) or die("data not found");
                    if (count($review_data) > 0) :
    ?>
    <h1 class="wp-heading-inline">View <?php echo $review_data[0]->title?> Details</h1>
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th>
                    <a href="<?php echo admin_url('admin.php?page=review');?>" class=""><i class="dashicons dashicons-arrow-left-alt"></i>Go Back</a>
                </th>
                <th style="text-align: center;">
                    
                </th>
                <th style="text-align: right;">
                    
                </th>
            </tr>
        </thead>
    </table>
    
    <?php foreach ($review_data as $review) : ?>
    <form id="update-review-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container">

                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="review_id" id="review_id" value="<?php echo $review->id; ?>">
                        <div class="form-field" style="margin: 0 0 10px;">
                            <label for="review_title">Review Title: </label>
                            <input type="text" name="review_title" id="review_title" class="widefat" placeholder="Review Title" value="<?php echo $review->title?>">
                        </div>
                        <div class="form-field" style="margin: 0 0 10px;">
                            <label for="body">Review Body: </label>
                            <textarea name="body" id="body" cols="30" rows="5" style="resize: none"><?php echo $review->body; ?></textarea>
                        </div>
                        <div class="form-field" style="margin: 0 0 10px;">
                            <label for="status">Approved: </label>
                            <input type="checkbox" name="status" id="status" <?php echo $review->status === '1' ? 'checked' : '' ?>>
                            <input type="hidden" name="status_val" id="status_val" value="<?php echo $review->status === '1' ? '1' : '0'?>">
                        </div>
                        <div class="form-field" style="margin: 0 0 10px;">
                            <label for="verify">Verified: </label>
                            <input type="checkbox" name="verify" id="verify" <?php echo $review->verify === '1' ? 'checked' : '' ?>>
                            <input type="hidden" name="verify_val" id="verify_val" value="<?php echo $review->verify === '1' ? '1' : '0'?>">
                        </div>
                        <div class="form-field" style="margin: 0 0 10px;">
                            <button class="update_review button button-primary">Update Review</button>
                        </div>
                        <span class="message"></span>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end  postbox-container-->
        </div>
    </div>
    </form>
    <?php endforeach;endif; else: ?>
   
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
                <th>Review Title</th>
                <th>Product name</th>
                <th>User name</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM $table";
            $results = $wpdb->get_results($sql);
            // echo "<pre>".print_r($results);exit;
            if (count($results) <= 0) {
                echo "Data not found!";
            }else{
                foreach( $results as $key => $data ) :
        ?>
            <tr>
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="cb-select-1">Select !</label>
                    <input id="cb-select-1" type="checkbox" name="product[]" value="1">
			    </th>
                <td><?php echo $key + 1?>
                <div class="row-actions"><span class="trash"><a href="#" class="submitdelete">Trash</a> | </span><span class="view"><a href="<?php echo admin_url('admin.php?page=review&view=review&id='.$data->id) ?>" rel="bookmark">View</a></span></div>
                </td>
                <td><?php echo $data->title; ?></td>
                <td><?php echo $products[$key]->name; ?></td>
                <td><?php echo $users[$key]->display_name; ?></td>
                <td><?php echo date('F d, Y', strtotime($data->time)) ?></td>
            </tr>
             <?php endforeach; }?>
        </tbody>
    </table>
                <?php endif; ?>
</div>

<script type="text/javascript">
    var review_form = document.getElementById('update-review-form'),
        review_submit =  document.querySelector('.update_review');

        var ajaxurl = review_form.dataset.url,
            status_value = document.getElementById("status_val"),
            verify_value = document.getElementById("verify_val");

            const status = document.getElementById('status'),
            verify = document.getElementById('verify');

            status.addEventListener('change', (e) => {
                if (e.target.checked) {
                    status_value.value = 1;
                } else {
                    status_value.value = 0;
                }
            });

            verify.addEventListener('change', (e) => {
                if (e.target.checked) {
                    verify_value.value = 1;
                } else {
                    verify_value.value = 0;
                }
            });
        
    if (review_submit) {
        review_submit.addEventListener("click",function (e) {
            e.preventDefault();
            var status_val = document.getElementById("status_val").value,
                verify_val = document.getElementById("verify_val").value,
                review_id = document.getElementById("review_id").value,
                review_title = document.getElementById("review_title").value,
                body = document.getElementById("body").value,
                message =  document.querySelector('.message');

                console.log(status_val+ ' '+verify_val);

            review_submit.setAttribute("disabled", "");
            if (status_val !== '0' || verify_val !== '0') {
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: {
                        action: 'review_ajax_update',
                        review_id: review_id,
                        review_title: review_title,
                        body: body,
                        status: status_val,
                        verify: verify_val,
                    },
                    success: function(response) {
                        // console.log(response);
                        message.textContent = "Successfully Updated!";
                        message.style.color = "#4CAF50";
                        review_submit.removeAttribute("disabled");
                    }
                });
                
            }
                // else{
                //     message.textContent = "Something is wrong!";
                //     message.style.color = "#df2029";
                //     form.reset();
                //     form_submit.removeAttribute("disabled");
                // }
                
        });
    }
</script>