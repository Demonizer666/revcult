console.log('render.js loaded...');

function clear_editable() {
    jQuery('*[contenteditable]').on('paste',function(evnt) {
        evnt.stopImmediatePropagation();
        console.log('paste');
        evnt.preventDefault();
        var plain_text = (evnt.originalEvent || evnt).clipboardData.getData('text/plain');
        if(typeof plain_text!=='undefined'){
            document.execCommand('insertText', false, plain_text);
        }
    });
}

/**
 * Render modal Function
 *
 * @param {string} template
 * @param {object} content
 */
function modalRender ( template, content ) {
    if (template === undefined) {
        // console.error('Please specify a template');
        notify('error', 'Please specify a template');
        return;
    }
    if (!content) { var content = {}; }
    var area = '.modal__back';

    var template = jQuery('#' + template).html(),
        modal = ejs.render( template, content );


    jQuery('.modal .modal__body').remove();
    jQuery( area ).html( modal ).addClass( 'open' );

    jQuery('.modal .ModalClose').on('click', modalClose );
    jQuery(document).on( 'keyup', modalCloseKeypress );
    jQuery( area ).on('mousedown', modalCloseArea );
    clear_editable();
}
function modalCloseKeypress (e) {
    if (e.keyCode === 27) { // escape key maps to keycode `27`
        modalClose();
        jQuery(document).off( 'keyup', modalCloseKeypress );
    }
}
function modalCloseArea (e) {
    if ( e.target === this ) {
        modalClose();
        jQuery( '.modal__back' ).off('click', modalCloseArea );
    }
}
function modalClose () {

    jQuery( '.modal__back' ).removeClass( 'open');

    if( jQuery('#WPEditor').length > 0 ) {
        console.log('Run clear wp.editor');
        wp.editor.remove('WPEditor');
    }

    jQuery('.modal .modal__body, .ModalBody, .modal_body' ).remove();
    jQuery('.modal .modalClose').off('click', modalClose);

}

function call_colorpicker( picker_area, picker_draw_area, default_color ) {
    if ( !default_color ) {
        default_color = 'bb0000';
    }
    jQuery( picker_draw_area ).jPicker({color:{active: new jQuery.jPicker.Color({ ahex: default_color })}});
    jQuery( picker_area ).fadeIn( 300 );
    close_picker( picker_area, picker_draw_area );
}

function ejs_component_render( component ) {

    if ( !component['template'] ) {
        return 'No component template received';
    }

    if ( !jQuery( component['template'] ) ) {
        return 'Failed to get template';
    }

    if ( !component['data'] ) {
		component['data'] = {};
    }

	return ejs.render( jQuery( component['template'] ).html(), component['data'] );
}