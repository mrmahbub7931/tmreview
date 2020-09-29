<div class="wrap">
    <h1 class="wp-heading-inline">All Brands</h1>
    <a href="<?php echo admin_url( 'admin.php?page=add-brand' )?>" class="page-title-action">Add Brand</a>
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
            <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td>
                <th>#</th>
                <th>Brand name</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="check-column">
                    <label class="screen-reader-text" for="cb-select-1">Select Hello world!</label>
                    <input id="cb-select-1" type="checkbox" name="brand[]" value="1">
			    </th>
                <td>1</td>
                <td>Samsung</td>
                <td>January 10, 2020</td>
                <td>
                    <a href="javascript:void(0)" class="button button-secondary">View</a>
                    <a href="javascript:void(0)" class="button button-primary">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>