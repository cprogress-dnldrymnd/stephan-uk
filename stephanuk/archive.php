<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydus
 */

get_header();

global $trydusObj;

printf($trydusObj->trydus_breadcrumb_bridge());

$trydus = get_option('trydus');
$grid = (isset($trydus['blog_grid'])) ? $trydus['blog_grid'] : 'two-column';

?>

<div class="content-block">
	<div class="container">
		<div class="row blog-content-row">

			<?php
			// If Redux Framework Active
			if (class_exists('ReduxFrameworkPlugin')) :
				$trydusObj->postMarkupGenerator($trydus['blog_layout'], $grid);

			else : // If Redux Framework Is Not Active

				$trydusObj->postMarkupGenerator(null, $grid);

			endif;

			?>


		</div>
	</div>
</div>


<?php
get_footer();
