/** Awesome notifications!
 * @param {string} type - success || error || warning
 * @param {string} text - any string
 **/

function notify( type, text ) {

    if ( !type || !text ) {
        console.log('Notify argument is missing');
    } else {

        if ( type === 'console' ) {
            console.log( text );
        }

        else {

            var area = jQuery('.NotifyArea');
            var template = jQuery('#notification').html();
            var data = { 'type': type, 'text': text };
            var ready_html = ejs.render( template, data );

            jQuery( area ).prepend( ready_html );
            jQuery('.notification:first-of-type').addClass('show').delay(3500).animate({
                right: -800,
                opacity: 0
            }, 1000, function () {
                jQuery(this).remove();
            });
        }

    }

}