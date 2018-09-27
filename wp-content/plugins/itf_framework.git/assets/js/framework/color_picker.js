console.log( 'color_picker.js loaded...' );

function clear_colorpicker( picker_area, picker_draw_area) {
    jQuery( picker_area ).fadeOut( 300, function () {
        jQuery( picker_draw_area ).html('');
    });
}

function close_picker( picker_area, picker_draw_area ){
    jQuery( picker_area ).on( 'mousedown', function (e) {
        if ( e.target === this ) {
            clear_colorpicker( picker_area, picker_draw_area);
        }
    });
    jQuery(document).on( 'keyup', function(e) {
        if (e.keyCode === 27) { // escape key maps to keycode `27`
            clear_colorpicker( picker_area, picker_draw_area);
        }
    });
    jQuery('.color_picker__close').on( 'click', function () {
        clear_colorpicker( picker_area, picker_draw_area);
    });
}

function choose_color( selector_name, picker_area, picker_draw_area ) {
    if ( !selector_name ) {
        selector_name = '.ChooseColor';
    }
    if ( !picker_area ) {
        picker_area = '.ColorPickerArea';
    }
    if ( !picker_draw_area ) {
        picker_draw_area = '.ColorPickerPage';
    }
    jQuery( selector_name ).on( 'click', function (e) {
        var old_rgb = jQuery( this ).css( 'background-color');
        var old_hex = rgbToHex( old_rgb );
        choose_button = jQuery( this );
        color_field = jQuery( this ).siblings('.ColorPicker');
        call_colorpicker( picker_area, picker_draw_area, old_hex );
        console.log( choose_button, color_field, old_rgb, old_hex );
        jQuery('.ColorPickerChooseButton').on( 'click', function (e) {
            e.stopImmediatePropagation();
            var new_color = '#' + jQuery('input.Hex').val();
            color_field.html( new_color );
            choose_button.css( 'background-color', new_color );
            clear_colorpicker( picker_area, picker_draw_area );
        });
        jQuery(document).on( 'keyup', function(e) {
            if (e.keyCode === 13) { // Enter key maps to keycode `13`
                e.stopImmediatePropagation();
                var new_color = '#' + jQuery('input.Hex').val();
                color_field.html(new_color);
                choose_button.css('background-color', new_color);
                clear_colorpicker(picker_area, picker_draw_area);
            }
        });
    });
}