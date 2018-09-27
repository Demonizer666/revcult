<?php

Class ITFF_REGULAR_FIELD {

    public static function css() {
        wp_enqueue_style( 'itff_regular_field_css', plugin_dir_url( __FILE__ ) . 'css/regular_field.css' );
    }

    public static function js() {
        wp_enqueue_script( 'itff_regular_field_js',plugin_dir_url( __FILE__ ) . 'js/regular_field.js', '', '',true );
    }

}