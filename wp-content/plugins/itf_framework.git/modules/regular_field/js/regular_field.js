'use strict';

console.log( 'regular_fields.js loaded...' );

jQuery(document).ready(function () {

    class RegularField {

        constructor() {
            this.template = window.templates.RegularField;
        }

        render( props ) {
            return ejs.render( this.template, {'field': props } );
        }

    }

    window.regular_field = new RegularField();
});