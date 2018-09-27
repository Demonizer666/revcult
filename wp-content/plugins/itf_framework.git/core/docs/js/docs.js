jQuery( document ).ready( function () {

    media_for_field();

    $( document ).on( 'click', '.ViewDocument', function () {
       var doc_id = jQuery( this ).parents('.DocumentElement').attr( 'data-id' );
       var send_data = {
           'action': 'itff_docs',
           'command': 'get_data',
           'docs_data': {
               'ID': doc_id
           }
       };
       ajax_send( send_data ).then( function ( answer ) {
           if ( answer['result'] === 'success') {
               var template = jQuery('#doc_ejs').html();
               var ready_html = ejs.render( template, answer['post'] );
               console.log( ready_html );
               jQuery('.DocsContainer').html( ready_html );
           }
       })
    });

    $( document ).on( 'click', '.DeleteDocument', function () {

        var document_container = jQuery( this ).parents('.DocumentElement');
        var doc_id = document_container.attr( 'data-id' );
        var send_data = {
            'action': 'itff_docs',
            'command': 'delete',
            'docs_data': {
                'ID': doc_id
            }
        };
        ajax_send( send_data ).then( function ( answer ) {
            if ( answer['result'] === 'success') {
                document_container.fadeOut( 300, function () {
                    document_container.remove();
                });
            }
        })
    });

    $( document ).on( 'click', '.AddNewDoc', function () {

        modalRender( 'edit_doc_ejs', { 'post': {} } );
        wp.editor.initialize('WPEditor', wp_editor_default_settings );

        jQuery('.SubmitNewDoc').on('click', function () {

            var docs_data = prepare_data('.DocModalField');
            docs_data['post_excerpt'] = wp.editor.getContent('WPEditor');
            var send_data = {
                'action': 'itff_docs',
                'command': 'add',
                'docs_data': docs_data
            };
            ajax_send( send_data ).then(function ( answer ) {
               if ( answer['result'] === 'success') {
                   if ( answer['html'] ) {
                       jQuery('.DocsNavigation').prepend( answer['html'] );
                   }
                   modalClose();
               }
            });
        });

    });

    $( document ).on( 'click', '.EditDocument', function () {

        var document_container = jQuery( this ).parents('.DocumentElement');
        var ID = document_container.attr('data-id');

        var send_data = {
            'action': 'itff_docs',
            'command': 'get_data',
            'docs_data': {
                'ID': ID
            }
        };
        ajax_send( send_data ).then(function ( answer ) {
            if ( answer['post'] ){
                modalRender( 'edit_doc_ejs', answer );
                wp.editor.initialize('WPEditor', wp_editor_default_settings );

                jQuery('.SubmitEditDoc').on('click', function () {

                    var docs_data = prepare_data('.DocModalField');
                    docs_data['ID'] = ID;
                    docs_data['post_excerpt'] = wp.editor.getContent('WPEditor');
                    var send_data = {
                        'action': 'itff_docs',
                        'command': 'edit',
                        'docs_data': docs_data
                    };
                    ajax_send( send_data ).then(function ( answer ) {
                        if ( answer['result'] === 'success' ) {
                            if ( answer['html'] ) {
                                document_container.replaceWith( answer['html'] );
                            }
                            modalClose();
                        }
                    });
                });
            }
        });
    });

});

console.log( 'docs.js loaded...' );