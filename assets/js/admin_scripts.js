// mediaControl for wp.media in widget
// uses jquery data attached to object
// 		uploader-title 	: Title for the wordpress media windows
//		button-text 	: Text for the button
//		targetid		: target ID of the hidden input that contains the attachment id of the selected picture
// @hugosolar
function bindEventWidgetImage(id) {
	var obj = jQuery('#'+id);
	// Create the media frame.
	file_frame  = wp.media({
		title: obj.data( 'uploader-title' ),
		button: {
			text: obj.data( 'button-text' )
		},
		multiple: false  // Set to true to allow multiple files to be selected
	});
	// When an image is selected, run a callback.
	file_frame.on( 'select', function() {
		//var img_obj = obj.data('targetimg');
		var img_id = obj.data('targetid');
		attachment = file_frame.state().get('selection').first().toJSON();
		if (attachment.sizes !== undefined)
			var img_selected = '<img src="'+attachment.sizes.thumbnail.url+'">';
		else
			var img_selected = '<img src="'+attachment.url+'" width="150" height="150" />';

		obj.prev().html(img_selected);

		jQuery('#'+img_id).val(attachment.id);
	});

	file_frame.open();

	return false;
}
