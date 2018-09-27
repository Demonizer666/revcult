<?php

Class ITFF_DOCS {

    static $post_type = 'itff_doc';
    static $def_post_status = 'publish';
    static $default_fields = array( 'post_content', 'post_title', 'comment_status', 'post_excerpt', 'post_name', 'post_author', 'ping_status' );

    public static function register() {

        if ( post_type_exists( self::$post_type ) ) {
            // do_nothing
        } else {
            register_post_type( self::$post_type, array(
                'label'               => null,
                'labels'              => array(
                    'name'               => 'Docs',
                    'singular_name'      => 'Doc',
                    'add_new'            => 'Add Doc',
                    'add_new_item'       => 'Adding new doc',
                    'edit_item'          => 'Edit doc',
                    'new_item'           => 'New doc',
                    'view_item'          => 'View doc',
                    'search_items'       => 'Search doc ',
                    'not_found'          => 'Doc Not Found',
                    'not_found_in_trash' => 'No one Doc in trash',
                    'parent_item_colon'  => '',
                    'menu_name'          => 'ITFF Docs',
                ),
                'description'         => 'Requests for money operation, like deposit or withdraw', // Custom post type description
                'public'              => true, // define may we work with this type publicy
                'publicly_queryable'  => true, // if false, theme query will not work with this type
                'exclude_from_search' => true, // if true, this post type will be exclude from query
                'show_ui'             => true, // if false, this post type will exclude from user interfase
                'show_in_menu'        => false, // if false, this post type will exclude from user menu
                'show_in_admin_bar'   => false, // if false, this post type will exclude from admin bar
                'show_in_nav_menus'   => false, // if false, this post type will exclude from nav menus
                'show_in_rest'        => true, // add to WP REST API. From WP 4.7
                'rest_base'           => self::$post_type, 	// $post_type. From WP 4.7
                'menu_position'       => 38, 6,
                'menu_icon'           => null,
                //'capability_type'   => 'post',
                //'capabilities'      => 'post', // array of user capabilities to interact with post type массив
                //'map_meta_cap'      => null, // If true standart capabilities handler will be used
                'hierarchical'        => false, // Doese this post type will have hierarch (like pages) or haven't (like posts)
                'supports'            => array( 'title', 'excerpt', 'fields', 'comments', 'custom-fields', 'editor' ),
                // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
                'taxonomies'          => array( 'category', 'post_tag' ),
                'has_archive'         => true,
                'rewrite'             => true,
                'query_var'           => true,
            ) );

        }
    }

    public static function render( $doc ) {

        $answer = null;

        if( !$doc ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Doc not received',
                'source'  => __METHOD__
            );
        } else {
            if ( !$doc['ID'] ) {
                $answer = array(
                    'result'  => 'error',
                    'message' => 'Doc ID not received',
                    'source'  => __METHOD__,
                    'dump'    => array(
                        'received' => $doc
                    )
                );
            } else {

                $post = get_post( $doc['ID'] );

                ob_start();
                include( 'templates/doc.php');
                $html = ob_get_clean();

                $answer = array(
                    'result'  => 'success',
                    'message' => 'Here it is',
                    'source'  => __METHOD__,
                    'html'    => $html,
                    'dump'    => array(
                        'received' => $doc
                    )
                );
            }
        }

        if ( !$answer ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Nothing Happens ¯\_(ツ)_/¯',
                'source'  => __METHOD__
            );
        }
        return $answer;

    }

    public static function get_data( $doc ) {

        $answer = null;

        if( !$doc ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Doc not received',
                'source'  => __METHOD__
            );
        } else {
            if ( !$doc['ID'] ) {
                $answer = array(
                    'result' => 'error',
                    'message' => 'Doc ID not received',
                    'source' => __METHOD__,
                    'dump' => array(
                        'received' => $doc
                    )
                );
            } else {

                $post = get_post( $doc['ID'], 'ARRAY_A' );
                $answer = array(
                    'result' => 'success',
                    'message' => 'Here it is',
                    'source' => __METHOD__,
                    'post'   => $post,
                    'dump' => array(
                        'received' => $doc
                    )
                );

            }
        }
        if ( !$answer ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Nothing Happens ¯\_(ツ)_/¯',
                'source'  => __METHOD__
            );
        }
        return $answer;

    }

    public static function add( $doc ) {

        $answer = null;
        if( !$doc ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Doc not received',
                'source'  => __METHOD__
            );
        } else {
            if ( $doc['ID'] ) {
                $answer = self::edit( $doc );
            } else {

                if( !$doc['post_title'] ) {
                    $answer = array(
                        'result'  => 'error',
                        'message' => 'Post title not received',
                        'source'  => __METHOD__
                    );
                } else {

                    $new_doc = array();
                    $default_fields = self::$default_fields;

                    foreach ( $default_fields as $field ) {
                        if ( $doc[$field] ) {
                            $new_doc[$field] = $doc[$field];
                            unset( $doc[$field] );
                        }
                    }

                    $new_doc['post_type'] = self::$post_type;
                    $new_doc['post_status'] = self::$def_post_status;

                    $post_id = wp_insert_post( $new_doc, true );

                    if ( is_wp_error( $post_id ) ) {
                        $answer = array(
                            'result'  => 'error',
                            'message' => $post_id->get_error_message(),
                            'source'  => __METHOD__
                        );
                    } else {

                        foreach ( $doc as $key => $value ) {
                            update_post_meta( $post_id, $key, $value );
                        }

                        $get_data = array(
                            'ID' => $post_id
                        );

                        $post = get_post( $post_id );
                        ob_start();
                            include( 'templates/doc_nav.php' );
                        $html = ob_get_clean();

                        $answer = array(
                            'result'  => 'success',
                            'message' => 'Doc was added',
                            'post_id' => $post_id,
                            'post_data' => self::get_data( $get_data ),
                            'html'    => $html,
                            'source'  => __METHOD__
                        );
                    }
                }
            }
        }



        if ( !$answer ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Nothing Happens ¯\_(ツ)_/¯',
                'source'  => __METHOD__
            );
        }
        return $answer;
    }

    public static function edit( $doc ) {

        $answer = null;
        if( !$doc ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Doc not received',
                'source'  => __METHOD__
            );
        } else {
            if ( !$doc['ID'] ) {
                $answer = array(
                    'result'  => 'error',
                    'message' => 'No ID received',
                    'source'  => __METHOD__
                );
            } else {

                $editable_doc = array();

                if ( $doc['post_content'] ) {
                    $editable_doc['post_content'] = $doc['post_content'];
                    unset( $doc['post_content'] );
                }

                if ( $doc['post_title'] ) {
                    $editable_doc['post_title'] = $doc['post_title'];
                    unset( $doc['post_title'] );
                }

                if ( $doc['comment_status'] ) {
                    $editable_doc['comment_status'] = $doc['comment_status'];
                    unset( $doc['comment_status'] );
                }

                if ( $doc['post_excerpt'] ) {
                    $editable_doc['post_excerpt'] = $doc['post_excerpt'];
                    unset( $doc['post_excerpt'] );
                }

                $editable_doc['ID'] = $doc['ID'];

                $update_result = wp_update_post( $editable_doc );

                if ( $update_result != $editable_doc['ID'] ) {
                    $answer = array(
                        'result'  => 'error',
                        'message' => 'Updated failed',
                        'source'  => __METHOD__
                    );
                } else {

                    foreach ( $doc as $key => $value ) {

                        if ( $doc['ID'] ) {

                        } else {
                            update_post_meta( $doc['ID'], $key, $value );
                        }
                    }

                    $get_data = array(
                        'ID' => $doc['ID']
                    );

                    $post = get_post( $doc['ID'] );
                    ob_start();
                        include( 'templates/doc_nav.php' );
                    $html = ob_get_clean();

                    $answer = array(
                        'result'  => 'success',
                        'message' => 'Doc was edited successfully',
                        'post_data' => self::get_data( $get_data ),
                        'html'    => $html,
                        'source'  => __METHOD__
                    );

                }
            }
        }

        if ( !$answer ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Nothing Happens ¯\_(ツ)_/¯',
                'source'  => __METHOD__
            );
        }
        return $answer;
    }

    public static function delete( $doc ) {

        $answer = null;

        if( !$doc ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Doc not received',
                'source'  => __METHOD__
            );
        } else {
            if ( !$doc['ID'] ) {
                $answer = array(
                    'result' => 'error',
                    'message' => 'No ID received',
                    'source' => __METHOD__
                );
            } else {

                $delete_result = wp_delete_post( $doc['ID'], true );

                if ( !$delete_result ) {
                    $answer = array(
                        'result' => 'error',
                        'message' => 'Failed to delete post',
                        'source' => __METHOD__
                    );
                } else {
                    $answer = array(
                        'result' => 'success',
                        'message' => 'Post successfully deleted',
                        'source' => __METHOD__,
                        'dump'   =>  array(
                            'deleted_post' => $delete_result
                        )
                    );
                }
            }
        }

        if ( !$answer ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Nothing Happens ¯\_(ツ)_/¯',
                'source'  => __METHOD__
            );
        }
        return $answer;

    }

    public static function ajax_handler() {

        $answer = null;

        if ( !$_POST ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'No request received',
                'source'  => __METHOD__
            );
        } else {
            if ( !$_POST['command'] ) {
                $answer = array(
                    'result'  => 'error',
                    'message' => 'No command received',
                    'source'  => __METHOD__
                );
            } else {
                if ( !$_POST['docs_data'] ) {
                    $answer = array(
                        'result'  => 'error',
                        'message' => 'No docs_data received',
                        'source'  => __METHOD__
                    );
                } else {

                    if ( $_POST['command'] == 'render' ) {
                        $answer = self::render( $_POST['docs_data'] );
                    }

                    else if ( $_POST['command'] == 'get_data' ) {
                        $answer = self::get_data( $_POST['docs_data'] );
                    }

                    else if ( $_POST['command'] == 'add' ) {
                        $answer = self::add( $_POST['docs_data'] );
                    }

                    else if ( $_POST['command'] == 'edit' ) {
                        $answer = self::edit( $_POST['docs_data'] );
                    }

                    else if ( $_POST['command'] == 'delete' ) {
                        $answer = self::delete( $_POST['docs_data'] );
                    }

                    else {
                        $answer = array(
                            'result'  => 'error',
                            'message' => 'Unknown command ¯\_(ツ)_/¯',
                            'source'  => __METHOD__
                        );
                    }
                }
            }
        }

        if ( !$answer ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'Nothing Happens ¯\_(ツ)_/¯',
                'source'  => __METHOD__
            );
        }
        echo json_encode( $answer );
        wp_die();

    }

}

add_action('init', array( 'ITFF_DOCS', 'register') );

add_action( 'wp_ajax_nopriv_itff_docs', array( 'ITFF_DOCS', 'ajax_handler') );
add_action( 'wp_ajax_itff_docs', array( 'ITFF_DOCS', 'ajax_handler') );