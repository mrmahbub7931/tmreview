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
			button.html('<img id="brand_logo" src="' + attachment.url + '">').next().val(attachment.id).next().show();
		}).open();
 
	});
 
	// on remove button click
	$('body').on('click', '.rmv-img', function(e){
 
		e.preventDefault();
 
		var button = $(this);
		button.next().val(''); // emptying the hidden field
		button.hide().prev().html('Upload image');
    });
    
    // add row
    $("#addSocialBox").click(function () {
        var html = '';
        html += '<div class="initialInput">';
        html += '<input type="text" name="social_link[]" class="social_link widefat">';
        html += '<button type="button" id="removeRow" class="button button-primary"><i class="dashicons dashicons-trash"></i></button>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('.initialInput').remove();
    });
 
});