jQuery(function($){
 
	// on upload button click
	$('body').on( 'click', '.up-img', function(e){
 
		e.preventDefault();
 
		var button = $(this),
		custom_uploader = wp.media({
			title: 'Upload image',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: false
		}).on('select', function() { // it also has "open" and "close" events
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			button.html('<img id="store_logo" src="' + attachment.url + '" alt="">').next().val(attachment.id).next().show();
		}).open();
 
	});
 
	// on remove button click
	$('body').on('click', '.rmv-img', function(e){
 
		e.preventDefault();
 
		var button = $(this);
		button.next().val(''); // emptying the hidden field
		console.log(button.prev().html('Upload image'));
		// button.hide().prev().html('Upload image');
    });
    
    // add row
    $("#addDescBox").click(function () {
        var html = '';
        html += '<div class="initialInput">';
        html += '<input type="text" name="number_text[]" class="social_link widefat" placeholder="Number Description">';
        html += '<input type="text" name="description[]" class="social_link widefat" placeholder="Text Description">';
        html += '<button type="button" id="removeRow" class="button button-secondary"><i class="dashicons dashicons-trash"></i></button>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('.initialInput').remove();
    });
 
});