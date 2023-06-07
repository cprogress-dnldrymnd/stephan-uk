<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trydus
 */

if ( ! is_active_sidebar( 'trydus_blog_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'trydus_blog_sidebar'); 
		
	?>

</aside><!-- #secondary -->
