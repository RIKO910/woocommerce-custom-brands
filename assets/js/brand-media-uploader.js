;(function($) {
alert('riko');
    jQuery(document).ready(function($){
        var mediaUploader;
        $('#upload_brand_image_button').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Brand Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#brand_image').val(attachment.url);
            });
            mediaUploader.open();
        });
    });


})(jQuery);