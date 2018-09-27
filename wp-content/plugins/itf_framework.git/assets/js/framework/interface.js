console.log('interface.js loaded...');

function itff_interface() {
    checbox_click();
}

function checbox_click() {
    jQuery( document ).on( 'click', '.itff_checkbox', function () {
        checkbox( jQuery( this ) );
    });
}

function checkbox( checkbox ) {
    checkbox
    if ( checkbox.hasClass( 'disabled' ) ) {
        checkbox.toggleClass( 'error' );

        var x = 0;
        var intervalID = setInterval(function () {
            setTimeout(function(){
                checkbox.toggleClass( 'error' );
            },100);

            if ( ++x === 3 ) {
                window.clearInterval(intervalID);
            }
        }, 200);

    } else {
        checkbox.toggleClass( 'checked' );
        checkbox.toggleAttr( 'data-value', 'true' );
    }
}