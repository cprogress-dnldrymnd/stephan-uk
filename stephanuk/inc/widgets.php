<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trydus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'trydus' ),
			'id'            => 'trydus_blog_sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'trydus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'WooCommerce Widgets', 'trydus' ),
			'id'            => 'trydus_woocommerce_widgets',
			'description'   => esc_html__( 'Add widgets here.', 'trydus' ),
			'before_widget' => '<div id="%1$s" class="trydus-wc-widget col widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'trydus_widgets_init' );