<?php

Class ITFF_SETTINGS_PAGE {

    public static function construct() {

        ?>

        <div class="app">

        </div>

    <?php
    }

    public static function js() {
        wp_enqueue_script( 'framework_settings_js', plugin_dir_url( __FILE__ ) . 'js/settings.js' );
	    wp_enqueue_script( 'framework_settings2_js', plugin_dir_url( __FILE__ ) . 'js/settings2.js' );
    }

    public static function templates() { ?>
        <script id="settings_page" type="text/ejs-template">
            <?php include_once ( 'templates/settings_page.ejs'); ?>
        </script>
        <script id="test1" type="text/ejs-template">
            <?php include_once ( 'templates/test1.ejs'); ?>
        </script>
    <?php
    }

}