<?php

Class ITFF_DOCS_PAGE {

    public static function construct() {

        include( 'templates/docs_content.php' );

        wp_enqueue_media();
    }

    public static function js() {
        wp_enqueue_script( 'framework_docs_js', plugin_dir_url( __FILE__ ) . 'js/docs.js' );
    }

    public static function css() {
        wp_enqueue_style( 'framework_docs_css', plugin_dir_url( __FILE__ ) . 'css/docs.css' );
    }

    public static function templates() { ?>

        <script id="doc_ejs" type="text/ejs-template">
			<?php include_once ( 'templates/doc.ejs'); ?>
        </script>

        <script id="edit_doc_ejs" type="text/ejs-template">
            <?php include_once ( 'templates/edit_doc.ejs'); ?>
        </script>

    <?php
    }

}