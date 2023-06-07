<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package trydus
 */

get_header();

global $trydusObj;
if (have_posts()) {
	$trydusObj->trydus_breadcrumb_bridge();
}

$trydus = get_option('trydus');
$grid = (isset($trydus['blog_grid'])) ? $trydus['blog_grid'] : 'one-column';

?>

<div class="content-block sp-80">
	<div class="container">
		<div class="row blog-content-row justify-content-center">

			<?php
			// If Redux Framework Active
			if (have_posts()) :

				if (class_exists('ReduxFrameworkPlugin')) :
					// var_dump($trydus['blog_layout']);
					$trydusObj->postMarkupGenerator($trydus['blog_layout'], $grid);

				else : // If Redux Framework Is Not Active

					$trydusObj->postMarkupGenerator(null, $grid);

				endif;
			else :

				get_template_part('template-parts/contents/content-none');
			endif;
			?>
		</div>
	</div>
</div>


<?php
get_footer();
