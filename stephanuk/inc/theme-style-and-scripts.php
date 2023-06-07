<?php

/**
 * Enqueue scripts and styles.
 */
function trydus_scripts()
{
	wp_enqueue_style('trydus-fonts', get_theme_file_uri( '/assets/css/fonts.css'), array(), '4.7.0');
	wp_enqueue_style('Font-awesome', get_theme_file_uri( '/assets/css/all.min.css'), array(), '4.7.0');
	wp_enqueue_style('bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css'), array(), '4.0');
	wp_enqueue_style('nice-select', get_theme_file_uri( '/assets/css/nice-select.min.css'), array(), 'null');

	wp_enqueue_style('trydus-core', get_theme_file_uri( '/assets/css/core.css'), array(), TRYDUS_THEME_VERSION);
	wp_style_add_data( 'trydus-core', 'rtl', 'replace' );

	wp_enqueue_style('trydus-gutenberg', get_theme_file_uri( '/assets/css/gutenberg.css'), array(), TRYDUS_THEME_VERSION);
	wp_enqueue_style('trydus-custom', get_theme_file_uri( '/assets/css/trydus-style.css'), array(), TRYDUS_THEME_VERSION);
	wp_style_add_data( 'trydus-custom', 'rtl', 'replace' );

	wp_enqueue_style('trydus-style', get_stylesheet_uri(), array(), TRYDUS_THEME_VERSION);

	wp_enqueue_style('trydus-responsive', get_theme_file_uri( '/assets/css/trydus-responsive.css'), array(), TRYDUS_THEME_VERSION);
	wp_style_add_data( 'trydus-responsive', 'rtl', 'replace' );

	wp_enqueue_script('masonry', get_theme_file_uri( '/assets/js/masonry.pkgd.min.js'), array('jquery'), null, true);
	wp_enqueue_script('nice-select', get_theme_file_uri( '/assets/js/jquery.nice-select.min.js'), array('jquery'), null, true);
	wp_enqueue_script('meanmenu-js', get_theme_file_uri( '/assets/js/jquery.meanmenu.min.js'), array('jquery'), null, true);
	wp_enqueue_script('trydus-main', get_theme_file_uri( '/assets/js/trydus-main.js'), array('jquery'), TRYDUS_THEME_VERSION, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'trydus_scripts');


/**
 * Registers an editor stylesheet for the theme.
 */
function trydus_theme_add_editor_styles()
{
	add_editor_style(get_theme_file_uri( '/assets/css/editor-style.css'));
}
add_action('admin_init', 'trydus_theme_add_editor_styles');
