console.log('behavior.js loaded...');

/**
 * Custom tabs Function
 * @param { object } tabs with name, content and parent
 * name - selector of tab button you click
 * content - selector what element should appear
 * parent - selector in what area this tab working
 **/
function custom_tabs ( tabs ) {

    console.log( 'Tabs for:');
    console.log(    tabs );
    if ( !tabs['parent'] ) { tabs['parent'] = document }

    jQuery( document ).on( 'click', tabs['name'],  function (e) {

        e.stopImmediatePropagation();
        var tab_id = jQuery(this).attr('data-tab');                                       // Get id of tab on which we will switch

        if ( !tab_id ) {
            return
        }

        var this_parent = jQuery(this).parents( tabs['parent'] );                         // Get id of tab on which we will switch

        this_parent.find( tabs['content']).removeClass('current');                        // Remove active class from all tabs
        this_parent.find( tabs['name']).removeClass('current');                           // Remove active class from all tabs

        jQuery( this ).addClass('current');                                               // Add active class to clicked tab
        this_parent.find( tabs['content'] + '[data-tab='+tab_id+']').addClass('current'); // Add active class to needed tab

    });
}

/**
 * Universal DropDown
 *
 * @param {object} dropdown settings
 * Both a class names what we give to the function
 * dropdown = {
 *     'container': 'class',
 *     'autoclose': bool,
 *     'toggled_container': 'class',
 *     'toggled_item': 'class',
 *     'field': 'class',
 *     'item': 'class',
 *     'item_content': 'class'
 * }
 */
function universal_dropdown( dropdown ) {

    console.log( 'DropDown for:');
    console.log( dropdown );

    if ( dropdown['container'] === undefined) {
        console.error('Please specify a container');
        return;
    }
    if (typeof(dropdown['autoclose']) === 'undefined') dropdown['autoclose'] = true;
    if (!dropdown['toggled_container'])  dropdown['toggled_container']    = 'open';
    if (!dropdown['toggled_item'])       dropdown['toggled_item']         = 'checked';
    if (!dropdown['field'])              dropdown['field']                = '.itf_dropdown__field';
    if (!dropdown['item'])               dropdown['item']                 = '.itf_dropdown__row, .itf_dropdown__cell';
    if (!dropdown['item_content'])       dropdown['item_content']         = '.itf_dropdown__row_html';
    if (!dropdown['preview'])            dropdown['preview']              = '.itf_dropdown__preview';

    jQuery(document).find(dropdown['container']).on( 'click', function (e) {

        var this_cont = jQuery(this);
        var this_field = this_cont.find( dropdown['field'] );

        if ( dropdown['autoclose'] === true ) {
            this_cont.toggleClass( dropdown['toggled_container'] );
        } else if ( !dropdown['autoclose'] ) {
            if ( jQuery( e.target )[0] === this_field[0] || jQuery( e.target )[0] === this_cont[0] ) {
                e.stopImmediatePropagation();
                this_cont.toggleClass( dropdown['toggled_container'] );
            }
        }

    });

    jQuery(document).find(dropdown['container']).find(dropdown['item']).on( 'click', function() {

        if ( jQuery( this ).hasClass('disabled') ) {

        } else {
            var this_cont = jQuery( this ).parents( dropdown['container'] );
            var this_list_field = this_cont.find(dropdown['field']);
            var this_item_html = jQuery( this ).find(dropdown['item_content']);
            var select_type = this_cont.attr('data-type');

            if ( select_type === 'single_select') {
                this_cont.find(dropdown['item']).removeClass(dropdown['toggled_item']);
                jQuery( this ).addClass(dropdown['toggled_item']);
                this_list_field.html( this_item_html.html() );
                this_list_field.attr( 'data-value', jQuery( this ).attr('data-value') );
            } else {
                jQuery( this ).toggleClass( dropdown['toggled_item'] );
            }

            if ( this_cont.find(dropdown['preview']).length > 0 ) {
                var content = jQuery(this).html();
                this_cont.find(dropdown['preview']).html( content );
            }
        }

    });

}

/** Slide this
 *
 * @param {object} elements
 *
 * name - element we clicked
 * content - element we slided
 * parent - parent of this elements
**/
function custom_slide( elements ) {

    console.log( 'Custom slide for:' );
    console.log( elements );

    if ( !elements['parent'] ) { elements['parent'] = document; }
    if ( !elements['name'] ) { elements['name'] = '.ToggleOnClick'; }
    if ( !elements['content'] ) { elements['content'] =  jQuery( elements['name'] ).siblings('.SlideOnClick'); }
    if ( !elements['class'] ) { elements['class'] = 'collapse' }

    jQuery( document ).on( 'click', elements['name'], function(e){

        e.stopImmediatePropagation();

        var this_parent = jQuery(this).parents( elements['parent'] );

        jQuery( this ).toggleClass(elements['class']);
        this_parent.find( elements['content'] ).toggleClass(elements['class']);

    });
}

function close_all( elements ) {

    console.log( 'Close all:' );
    console.log( elements );

    if ( !elements['parent'] ) { elements['parent'] = document; }
    if ( !elements['name'] ) { elements['name'] = '.CollapceOnClick'; }
    if ( !elements['content'] ) { elements['content'] =  jQuery( elements['parent'] ).find('.SlideContainer'); }
    if ( !elements['class'] ) { elements['class'] = 'collapse' }

    jQuery( document ).on( 'click', elements['name'], function(e){

        e.stopImmediatePropagation();

        var this_parent = jQuery(this).parents( elements['parent'] );

        jQuery( this ).addClass(elements['class']);
        this_parent.find( elements['content'] ).addClass(elements['class']);

    });
}

function open_all( elements ) {

    console.log( 'Open all:' );
    console.log( elements );

    if ( !elements['parent'] ) { elements['parent'] = document; }
    if ( !elements['name'] ) { elements['name'] = '.ExpandOnClick'; }
    if ( !elements['content'] ) { elements['content'] =  jQuery( elements['parent'] ).find('.SlideContainer'); }
    if ( !elements['class'] ) { elements['class'] = 'collapse' }

    jQuery( document ).on( 'click', elements['name'], function(e) {

        e.stopImmediatePropagation();

        var this_parent = jQuery(this).parents(elements['parent']);

        jQuery(this).removeClass(elements['class']);
        this_parent.find(elements['content']).removeClass(elements['class']);

    });
}