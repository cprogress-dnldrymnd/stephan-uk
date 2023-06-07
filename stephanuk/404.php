<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trydus
 */

get_header();
?>

<div class="error-404 not-found">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-7">
				<!--<img src="<?php echo esc_url( get_theme_file_uri('/assets/img/404.png') );  ?>" alt="<?php echo esc_attr('404 page') ?>">-->
				<h1><?php echo esc_html__( 'Page not found', 'trydus' ) ?></h1>
				<p><?php echo esc_html__('We can&#39;t seem to find the page you&#39;re looking for! Try going back to the previous page or back to home.', 'trydus') ?></p>
				<a href="<?php echo esc_url(home_url()) ?>" class="trydus-btn trydus-bordered-btn"><?php echo esc_html__( 'Back to Home', 'trydus' ) ?></a>
			</div>
		</div>
	</div>
</div><!-- .error-404 -->


<?php
get_footer();
