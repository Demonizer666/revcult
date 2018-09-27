<?php

Class ITFF_TABLES {

    public static function import_all() {
        self::css();
        self::js();
        self::templates();
    }

    public static function css() {
        wp_enqueue_style( 'itff_tables_css', plugin_dir_url( __FILE__ ) . 'css/style.css' );
    }

    public static function js() {
        wp_enqueue_script( 'itff_tables_cjs', plugin_dir_url( __FILE__ ) . 'js/table.js' );
    }

    public static function templates() {

    }

}