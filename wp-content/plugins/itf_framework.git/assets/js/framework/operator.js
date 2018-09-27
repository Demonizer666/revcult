console.log('operator.js loaded...');

/**
 * Prepare data from all elements with special class selector
 * @param {string} class_selector
 */
function prepare_data( class_selector ) {
    data = {};
    jQuery(class_selector).each(function() {
        data_type = jQuery(this).attr('data-type');
        if ( data_type === 'select' || data_type === 'checkbox' || data_type === 'bool' ) {
            data_name = jQuery(this).attr('data-name');
            data_value  = jQuery(this).attr('data-value');
            data[data_name] = data_value;
        } else if ( data_type === 'text' ) {
            data_name = jQuery(this).attr('data-name');
            data_value  = jQuery(this).html();
            data[data_name] = data_value;
        } else if ( data_type === 'single_check') {
            if ( jQuery(this).hasClass('checked') ) {
                data_name = jQuery(this).attr('data-name');
                data_value  = jQuery(this).attr('data-value');
                data[data_name] = data_value;
            }
        } else if ( data_type === 'input') {
            if (
                jQuery(this).attr('type') === 'text'   ||
                jQuery(this).attr('type') === 'email'  ||
                jQuery(this).attr('type') === 'number' ||
                jQuery(this).attr('type') === 'tel'    ||
                jQuery(this).attr('type') === 'url'
            ) {
                data_name = jQuery(this).attr('name');
                data_value  = jQuery(this).val();
                data[data_name] = data_value;
            } else if (
                jQuery(this).attr('type') === 'checkbox' ||
                jQuery(this).attr('type') === 'radio'
            ) {
                if ( jQuery(this).is(':checked') ) {
                    data_name = jQuery(this).attr('name');
                    data_value  = jQuery(this).val();
                    data[data_name] = data_value;
                }
            }
        } else if ( jQuery(this).is("textarea") ) {
            data_name = jQuery(this).attr('name');
            data_value  = jQuery(this).val();
            data[data_name] = data_value;
        }
    });
    return data;
}

/**
 * Prepare data from all elements with special class selector
 * @param {string} class_selector
 */

function prepare_flat_data( class_selector ) {
    var data = [];
    jQuery(class_selector).each(function() {
        data_type = jQuery(this).attr('data-type');
        if ( data_type === 'select' || data_type === 'checkbox' || data_type === 'bool' ) {
            data_value  = jQuery(this).attr('data-value');
            data.push( data_value );
        } else if ( data_type === 'text' ) {
            data_value  = jQuery(this).html();
            data.push( data_value );
        } else if ( data_type === 'single_check') {
            if ( jQuery(this).hasClass('checked') ) {
                data_value  = jQuery(this).attr('data-value');
                data.push( data_value );
            }
        } else if ( data_type === 'input') {
            if (
                jQuery(this).attr('type') === 'text'   ||
                jQuery(this).attr('type') === 'email'  ||
                jQuery(this).attr('type') === 'number' ||
                jQuery(this).attr('type') === 'tel'    ||
                jQuery(this).attr('type') === 'url'
            ) {
                data_value  = jQuery(this).val();
                data.push( data_value );
            } else if (
                jQuery(this).attr('type') === 'checkbox' ||
                jQuery(this).attr('type') === 'radio'
            ) {
                if ( jQuery(this).is(':checked') ) {
                    data_value  = jQuery(this).val();
                    data.push( data_value );
                }
            }
        }
    });
    return data;
}

/**
 * Prepare data from all elements with special class selector
 * @param {string} class_selector
 */
function prepare_pair_data( class_selector ) {
    data = {};
    keys = [];
    values = [];
    empty_fileds = jQuery(class_selector + ':empty');
    if ( empty_fileds.length > 0 ) {
        notify('error', 'Set all');
        return false;
    } else {
        jQuery(class_selector).each(function() {
            data_type = jQuery(this).attr('data-type');
            if ( data_type === 'select' || data_type === 'checkbox' || data_type === 'bool' ) {
                if ( jQuery(this).attr('data-name') === 'key') {
                    temp_val = jQuery(this).attr('data-value');
                    keys.push( temp_val );
                } else if ( jQuery(this).attr('data-name') === 'value' ) {
                    temp_val = jQuery(this).attr('data-value');
                    values.push( temp_val );
                }
            } else if ( data_type === 'text' ) {
                if ( jQuery(this).attr('data-name') === 'key') {
                    temp_val = jQuery(this).html();
                    keys.push( temp_val );
                } else if ( jQuery(this).attr('data-name') === 'value' ) {
                    temp_val = jQuery(this).html();
                    values.push( temp_val );
                }
            } else if ( data_type === 'single_check') {
                if ( jQuery(this).attr('data-name') === 'key') {
                    temp_val = jQuery(this).attr('data-value');
                    keys.push( temp_val );
                } else if ( jQuery(this).attr('data-name') === 'value' ) {
                    temp_val = jQuery(this).attr('data-value');
                    values.push( temp_val );
                }
            } else if ( data_type === 'input') {
                if (
                    jQuery(this).attr('type') === 'text'   ||
                    jQuery(this).attr('type') === 'email'  ||
                    jQuery(this).attr('type') === 'number' ||
                    jQuery(this).attr('type') === 'tel'    ||
                    jQuery(this).attr('type') === 'url'
                ) {
                    if ( jQuery(this).attr('name') === 'key') {
                        temp_val = jQuery(this).val();
                        keys.push( temp_val );
                    } else if ( jQuery(this).attr('name') === 'value' ) {
                        temp_val = jQuery(this).val();
                        values.push( temp_val );
                    }
                } else if (
                    jQuery(this).attr('type') === 'checkbox' ||
                    jQuery(this).attr('type') === 'radio'
                ) {
                    if ( jQuery(this).is(':checked') ) {
                        if ( jQuery(this).attr('name') === 'key') {
                            temp_val = jQuery(this).val();
                            keys.push( temp_val );
                        } else if ( jQuery(this).attr('name') === 'value' ) {
                            temp_val = jQuery(this).val();
                            values.push( temp_val );
                        }
                    }
                } else if ( jQuery(this).is("textarea") ) {
                    if ( jQuery(this).attr('name') === 'key') {
                        temp_val = jQuery(this).html();
                        keys.push( temp_val );
                    } else if (jQuery(this).attr('name') === 'value' ) {
                        temp_val = jQuery(this).val();
                        values.push( temp_val );
                    }
                }
            }
        });

        keys.forEach(function(value, index) {
            data[value] = values[index];
        });
        return data;
    }
}

function prepare_list_data( list ) {

    if ( !list['class_selector'] ) {
        return false;
    }

    if ( !list['container'] ) {
        list['container'] = document;
    }

    if ( !list['check_role'] ) {
        list['check_role'] = 'all';
    }

    data = {};

    var fields = jQuery( list['container'] ).find( list['class_selector'] );

    var empty_fileds = jQuery( list['container'] ).find( list['class_selector'] + ':empty');
    if ( empty_fileds.length > 0 ) {
        notify( 'error', 'Set all' );
        return false;
    }

    jQuery( fields ).each(function() {

        data_type = jQuery(this).attr('data-type');
        if ( data_type === 'select' || data_type === 'checkbox' || data_type === 'bool' ) {
            data_name = jQuery(this).attr('data-name');
            data_value  = jQuery(this).attr('data-value');

            if ( list['check_role'] === 'all' ) {
                data[data_name] = data_value;
            } else {
                if ( jQuery(this).hasClass('checked') ) {
                    data[data_name] = data_value;
                }
            }
        }
    });

    return data;

}

function componentFromStr(numStr, percent) {
    var num = Math.max(0, parseInt(numStr, 10));
    return percent ?
        Math.floor(255 * Math.min(100, num) / 100) : Math.min(255, num);
}

function rgbToHex(rgb) {
    var rgbRegex = /^rgb\(\s*(-?\d+)(%?)\s*,\s*(-?\d+)(%?)\s*,\s*(-?\d+)(%?)\s*\)$/;
    var result, r, g, b, hex = "";
    if ( (result = rgbRegex.exec(rgb)) ) {
        r = componentFromStr(result[1], result[2]);
        g = componentFromStr(result[3], result[4]);
        b = componentFromStr(result[5], result[6]);

        hex = (0x1000000 + (r << 16) + (g << 8) + b).toString(16).slice(1);
    }
    return hex;
}

/**
 * Send some data via AJAX
 * @param {object} data
 */
function ajax_send( data ) {
    return new Promise(function ( resolve, reject ) {
        jQuery.post( ajaxurl, data, function(response) {
            answer = jQuery.parseJSON(response);
            if ( !answer ) {
                answer = {
                    'result': 'error',
                    'message': 'No response from server'
                };
                console.log(answer);
                notify( answer['result'], answer['message'] );
                reject(answer);
            } else {
                console.log(answer);
                notify( answer['result'], answer['message'] );
                resolve(answer);
            }
        });
    });
}

function auth() {

    jQuery(document).on('click', '.ITFF_AUTH', function () {

        var user_data = prepare_data('.ITFF_AUTH_FIELD');
        var request_data = {
            'action': 'itff_user',
            'command': 'login',
            'user_data': user_data
        };
        ajax_send( request_data ).then( function ( answer ) {
        	if ( answer['result'] === 'success' ) {
				window.location.reload();
			}
		});

	});

}

jQuery(document).ready( function () {
	auth();
});