<?php

Class ITFF_NOTIFICATION {

    public static function css() {
        wp_enqueue_style( 'itff_notification_css', plugin_dir_url( __FILE__ ) . 'css/notification.css' );
    }

    public static function js() {
        wp_enqueue_script( 'itff_notification_js',plugin_dir_url( __FILE__ ) . 'js/notification.js', '', '',true );
    }

    public static function area() { ?>

        <div class="itf_notify_area NotifyArea">

        </div>

        <?php
    }

    public static function templates() { ?>

        <script id="notification" type="text/ejs-template">
			<?php include_once ( 'templates/notification.ejs'); ?>
        </script>

        <?php
    }

}