<?php

/*
Plugin Name: IT Forge FrameWork
Plugin URI: https://git.it-forge.tech/users/leninkerrigan/repos/itf_framework/
Description: Simple framework for WP
Version: 0.2.10
Author: IT Forge
Text Domain: itff
Domain Path: /languages
Author URI: https://it-forge.tech/
Copyright 2018 IT Forge LTD ( email: dev@it-forge.tech )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'ITFF_DIR', dirname( __FILE__ )                              );
define( 'ITFF_ADM', dirname( __FILE__ ) . '/admin/'                  );
define( 'ITFF_COR', dirname( __FILE__ ) . '/core/'                   );
define( 'ITFF_MOD', dirname( __FILE__ ) . '/modules/'                );
define( 'ITFF_SVG', dirname( __FILE__ ) . '/assets/svg/'             );


/**
 * Dependencies
 **/

require_once( ABSPATH . 'wp-includes/pluggable.php'      ); // Cause many wp functions won't work without it!!! It's very important!!! And it must go first of.

// Other depending's may be useful for add page

require_once( ABSPATH . 'wp-admin/includes/image.php'    );
require_once( ABSPATH . 'wp-admin/includes/file.php'     );
require_once( ABSPATH . 'wp-admin/includes/media.php'    );
require_once( ABSPATH . 'wp-admin/includes/template.php' );

/** Other **/

require_once( ITFF_MOD . 'autoload.php' );
require_once( ITFF_ADM . 'menu.php' );
require_once( dirname( __FILE__ ) . '/assets/framework_scripts.php' );


/**Setting page **/
require_once( ITFF_COR . 'settings/settings_page.php' );
require_once( ITFF_COR . 'settings/settings.php' );

/** Docs Page **/
require_once( ITFF_COR . 'docs/docs.php' );
require_once( ITFF_COR . 'docs/docs_page.php' );

require_once( ITFF_COR . 'insert.php' );

/** Common Functions **/
require_once( ITFF_DIR . '/common/post/post.php' );
require_once( ITFF_DIR . '/common/user/user.php' );