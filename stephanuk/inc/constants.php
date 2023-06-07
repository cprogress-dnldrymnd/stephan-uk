<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// theme version
if(! defined('TRYDUS_THEME_VERSION') ){
    define('TRYDUS_THEME_VERSION', wp_get_theme()->get('Version'));
} 

// Define the DHRUBOK Folder
if( ! defined( 'TRYDUS_DIR' ) ) {
	define('TRYDUS_DIR', get_template_directory() );
}

// Define the DHRUBOK Partials Folder
if( ! defined( 'TRYDUS_PARTIALS_DIR' ) ) {
	define('TRYDUS_PARTIALS_DIR', trailingslashit( TRYDUS_DIR ) . 'partials' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_ASSETS_DIR' ) ) {
	define('TRYDUS_ASSETS_DIR', trailingslashit( TRYDUS_DIR ) . 'assets' );
}


// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_INC_DIR' ) ) {
	define('TRYDUS_INC_DIR', trailingslashit( TRYDUS_DIR ) . 'inc' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_FRAMEWORK_DIR' ) ) {
	define('TRYDUS_FRAMEWORK_DIR', trailingslashit( TRYDUS_INC_DIR ) . 'framework' );
}

// Define the Libs Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_LIBS_DIR' ) ) {
	define('TRYDUS_LIBS_DIR', trailingslashit( TRYDUS_DIR ) . 'libs' );
}

// Define the Shortcodes Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_SHORTCODES_DIR' ) ) {
	define('TRYDUS_SHORTCODES_DIR', trailingslashit( TRYDUS_INC_DIR ) . 'shortcodes' );
}

// Define the Classes Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_CLASSES_DIR' ) ) {
	define('TRYDUS_CLASSES_DIR', trailingslashit( TRYDUS_INC_DIR ) . 'classes' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_WIDGETS_DIR' ) ) {
	define('TRYDUS_WIDGETS_DIR', trailingslashit( TRYDUS_INC_DIR ) . 'widgets' );
}


// Define the PLUGINS Folder of the DHRUBOK Directory
if( ! defined( 'TRYDUS_INC_PLUGINS_DIR' ) ) {
	define('TRYDUS_INC_PLUGINS_DIR', trailingslashit( TRYDUS_INC_DIR ) . 'plugins' );
}
