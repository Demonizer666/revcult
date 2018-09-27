<?php

Class ITFF_SETTINGS {

    public static $settings = array(
        'dog' => 'string',
        'cat' => 'int',
        'bee' => 'string',
        'bat' => 'int',
    );

    public static $types = array(
        'bool'    => FILTER_VALIDATE_BOOLEAN,
        'string'  => FILTER_SANITIZE_STRING,
        'int'     => FILTER_VALIDATE_INT,
        'url'     => FILTER_SANITIZE_URL,
        'array'   => FILTER_UNSAFE_RAW,
        'img_url' => FILTER_SANITIZE_URL,
        'hex'     => FILTER_SANITIZE_STRING
    );

    public static $settings_name = 'framework_settings';

    public static function register() {

        register_setting( self::$settings_name, self::$settings_name, '' );

        $settings_list = self::$settings;

        foreach ( $settings_list as $setting => $type) {
            add_settings_field( $setting, '', '', '', '' );
        };

    }

    public static function default_settings() {

        $answer = null;
        $options = get_option( self::$settings_name );

        if ( !$options || empty( $options ) ) {
            $def_set = array(
                'common_svg' => true
            );
            $answer = self::update( $def_set );
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

    public static function sanitize( $raw_data ) {

        $sanitize_data = array();

        $settings_list = self::$settings;
        $types = self::$types;

        foreach ( $settings_list as $setting => $type ) {
            if( isset( $raw_data[$setting] ) ) {
                $sanitize_data[$setting] = filter_var( $raw_data[$setting], $types[$type] );
            }
        };

        return $sanitize_data;
    }

    public static function update( $new_data ) {

        $answer = null;

        if ( !$new_data ) {
            $answer = array(
                'result'  => 'error',
                'message' => 'No data received',
                'source'  => __METHOD__
            );
        } else {
            if ( !is_array( $new_data ) ) {
                $answer = array(
                    'result'  => 'error',
                    'message' => 'Received data is not array',
                    'source'  => __METHOD__
                );
            } else {

                $sanitize_data = self::sanitize( $new_data );

                if ( !$sanitize_data ) {
                    $answer = array(
                        'result'  => 'error',
                        'message' => 'Sanitaze failed',
                        'source'  => __METHOD__,
                        'dump'    => array(
                            'new_data' => $new_data,
                            'sanitaze_data' => $sanitize_data
                        )
                    );
                } else {

                    $options = get_option( self::$settings_name );
                    if ( !$options ) {
                        $options = array();
                    }

                    $updated_data = array_merge( $options, $sanitize_data );
                    $update_result = update_option(self::$settings_name, $updated_data );

                    if ( !$update_result ) {
                        $answer = array(
                            'result'  => 'error',
                            'message' => 'Update Failed',
                            'source'  => __METHOD__,
                            'dump'    => array(
                                'new_data' => $new_data,
                                'sanitaze_data' => $sanitize_data,
                                'updated_data' => $updated_data,
                                'update_result' => $update_result
                            )
                        );
                    } else {
                        $answer = array(
                            'result'  => 'success',
                            'message' => 'Update successfully complete',
                            'source'  => __METHOD__,
                            'dump'    => array(
                                'new_data' => $new_data,
                                'sanitaze_data' => $sanitize_data,
                                'updated_data' => $updated_data,
                                'update_result' => $update_result
                            )
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
                if ( !$_POST['settings_data'] ) {
                    $answer = array(
                        'result'  => 'error',
                        'message' => 'No settings_data received',
                        'source'  => __METHOD__
                    );
                } else {

                    if ( $_POST['command'] == 'update' ) {
                        $answer = self::update( $_POST['settings_data'] );
                    }

                    else if ( $_POST['command'] == 'default_settings' ) {
                        $answer = self::default_settings();
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

add_action( 'admin_init', array ('ITFF_SETTINGS', 'register' ) );

add_action('wp_ajax_framework_settings', array('ITFF_SETTINGS', 'ajax_handler') );
add_action('wp_ajax_nopriv_framework_settings', array('ITFF_SETTINGS', 'ajax_handler') );