console.log('media.js loaded...');

function media_for_field() {

    jQuery(document).on( 'click', '.MediaForField', function (e) {

        var button = jQuery( this );
        var media_field = button.siblings('.MediaField');

        e.preventDefault();
        var media_frame;

        media_frame = wp.media({
            title: 'Выбрать картинку',
            multiple : false,
            library : {
                type : 'image',
            }
        });

        media_frame.on( 'close', function() {

            var selection =  media_frame.state().get('selection');
            selection.each( function( attachment ) {
                media_field.html(attachment['attributes']['url']);
            });
        });

        media_frame.open();

    });

}

function example_wp_media() {

    jQuery(document).on( 'click', '.custom_wp_media_button', function(e) {

        button = jQuery( this );

        e.preventDefault();
        var media_frame;

        // if( media_frame ){
        //     media_frame.open();
        // }
        // Define media_frame as wp.media object

        media_frame = wp.media({
            title: 'Select Media',
            multiple : true,
            library : {
                type : 'image',
            }
        });

        media_frame.on( 'close', function() {
            var selection =  media_frame.state().get('selection');
            selection.each( function( attachment ) {
                console.log( attachment['attributes']['url'] );
            });
        });

        media_frame.on( 'open', function() {
            console.log( button );
        });

        media_frame.open();
    });

}