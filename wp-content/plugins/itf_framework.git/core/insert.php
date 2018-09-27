<?php

Class ITFF_INSERT {

    public static function sprite() {
        include_once ( ITFF_SVG . 'svg_sprite.php');
    }

    public static function styles() {
        wp_enqueue_style('itff_style', plugin_dir_url( __FILE__ ) . '../assets/styles/style.css' );
    }

    public static function scripts() {
        wp_enqueue_media();
        wp_enqueue_editor();
        wp_enqueue_script( 'itff_ejs',        plugin_dir_url( __FILE__ ) . '../assets/js/libs/ejs.js', '', '',true );
        wp_enqueue_script( 'itff_jpicker',        plugin_dir_url( __FILE__ ) . '../assets/js/libs/jpicker-1.1.6.js', '', '',true );
        wp_enqueue_script( 'itff_air_date_picker',        plugin_dir_url( __FILE__ ) . '../assets/js/libs/datepicker.js', '', '',true );
        wp_enqueue_script( 'itff_operator',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/operator.js', '', '',true );
        wp_enqueue_script( 'itff_render',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/render.js', '', '',true );
        wp_enqueue_script( 'itff_behavior',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/behavior.js', '', '',true );
        wp_enqueue_script( 'itff_interface',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/interface.js', '', '',true );
        wp_enqueue_script( 'itff_media',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/media.js', '', '',true );
        wp_enqueue_script( 'itff_editor',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/editor.js', '', '',true );
        wp_enqueue_script( 'itff_color_picker',        plugin_dir_url( __FILE__ ) . '../assets/js/framework/color_picker.js', '', '',true );
    }

    function color_picker_area() { ?>

        <div class="color_picker_cont">
            <div class="color_picker_area ColorPickerArea">
                <div class="color_picker__body">
                    <div class="color_picker__header">
                        <h2 class="color_picker__title">Color Picker</h2>
                    </div>
                    <div class="color_picker__close">
                        x
                    </div>

                    <div class="color_picker__page ColorPickerPage">
                    </div>
                    <div class="color_picker__footer">
                        <span class="ColorPickerChooseButton confirm_button">Choose</span>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    public static function modal_area() { ?>

        <div class="modal">
            <div class="modal__back"></div>
        </div>

        <?php
    }

    public static function modal_templates() { ?>

        <script id="modal_greetings" type="text/x-mustache-template">
            <?php include_once 'test.ejs'; ?>
        </script>

        <?php
    }

    public static function ajax_url() { ?>
	    <script type='text/javascript'>
		/* <![CDATA[ */
			var ajaxurl = {"url": "<?php echo site_url(); ?>/wp-admin/admin-ajax.php"};
		/* ]]> */
        </script>
    <?php
    }

}