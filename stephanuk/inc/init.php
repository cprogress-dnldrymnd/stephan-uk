<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Theme Constants 
 */
require_once trailingslashit(get_template_directory()) . 'inc/constants.php';

/**
 *  update checker  
 */
require_once trailingslashit(get_template_directory())  . 'updater.php';

/**
 *  Implement the Custom Header feature. 
*/
require TRYDUS_INC_DIR . '/custom-header.php';


/**
 *  Theme Style and Scripts Enqueye
*/
require_once TRYDUS_INC_DIR . '/theme-style-and-scripts.php';

/**
 *  TGM Plugin Activation.
*/
require TRYDUS_INC_DIR . '/plugins/install-plugins.php';

/**
 *   TGM Plugin Activation.
*/
require TRYDUS_INC_DIR . '/demo-setup.php';

/**
 *  Functions which enhance the theme by hooking into WordPress.
*/
require TRYDUS_INC_DIR . '/template-functions.php';

/**
 *  Custom template tags for this theme.
*/
require TRYDUS_INC_DIR . '/template-tags.php';

/**
 *  Bufet Main Class
*/
require_once TRYDUS_CLASSES_DIR . '/Trydus_Main.php';
require_once TRYDUS_CLASSES_DIR . '/Trydus_Nav_Walker.php';

/**
 *  Theme Options
*/
require_once TRYDUS_INC_DIR . '/theme-options.php';

/**
 *  Custom Theme Options Styles
*/
require_once TRYDUS_INC_DIR . '/custom-theme-options-styles.php';

/**
 *  Theme Widgets
*/
require_once TRYDUS_INC_DIR . '/widgets.php';

/**
 *  ACf
*/
require_once TRYDUS_INC_DIR . '/acf.php';

/**
 *  WooCommerce
*/
if (class_exists('woocommerce')) {
	require TRYDUS_INC_DIR . '/woocommerce.php';
}