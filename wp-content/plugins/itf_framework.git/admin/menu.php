<?php

class ITFF_MENU {

    public static function construct() {

        // After plugin's page created, page suffix will writen to var 'some_page_suffix'.
        // It needs to connect scripts and styles ONLY on plugin pages!!!
        // Other Pages will have no this plugins scrips and styles and wll work FAST.

        $settings_suffix = add_menu_page(
            'ITF FrameWork',
            'ITF FrameWork',
            8,
            'itff.php',
            array ( 'ITFF_SETTINGS_PAGE', 'construct' ),
            'dashicons-palmtree',
            45, 5 );

        $docs_suffix = add_submenu_page( 'itff.php',
            'Docs',
            'Docs',
            8,
            'itff_docs',
            array( 'ITFF_DOCS_PAGE', 'construct' )
        );

        $suffixes = array(
            $settings_suffix,
            $docs_suffix
        );

        foreach ( $suffixes as $suffix ) {

            add_action( 'admin_head-' . $suffix, array( 'ITFF_INSERT', 'sprite') ); // SVG Sprite

            /** Modals **/
            add_action( 'admin_head-' . $suffix, array( 'ITFF_INSERT', 'modal_area') );
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_INSERT', 'modal_templates') );

            /** Common framework css & js **/
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_INSERT', 'styles') );
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_INSERT', 'scripts') );

            /** Notifications **/
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_NOTIFICATION', 'area') );
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_NOTIFICATION', 'js') );
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_NOTIFICATION', 'css') );
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_NOTIFICATION', 'templates') );



            /** Color Picker Area **/
            add_action( 'admin_print_footer_scripts-' . $suffix, array( 'ITFF_INSERT', 'color_picker_area') );

        }

        /** Settings page **/
        add_action( 'admin_print_footer_scripts-' . $settings_suffix, array( 'ITFF_SETTINGS_PAGE', 'js') );
        add_action( 'admin_print_footer_scripts-' . $settings_suffix, array( 'ITFF_SETTINGS_PAGE', 'templates') );

        add_action( 'admin_head-' . $settings_suffix, array( 'ITFF_SCRIPTS', 'templates_js') );
        /** Regular Fields **/
        add_action( 'admin_head-' . $settings_suffix, array( 'ITFF_REGULAR_FIELD', 'js') );

        /** Docs page **/
        add_action( 'admin_print_footer_scripts-' . $docs_suffix, array( 'ITFF_DOCS_PAGE', 'js') );
        add_action( 'admin_print_footer_scripts-' . $docs_suffix, array( 'ITFF_DOCS_PAGE', 'css') );
        add_action( 'admin_print_footer_scripts-' . $docs_suffix, array( 'ITFF_DOCS_PAGE', 'templates') );


    }

}

add_action( 'admin_menu', array ('ITFF_MENU', 'construct' ) );