<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydus
 */

get_header();

get_template_part('template-parts/breadcrumbs', 'distributors');

global $trydusObj;

//printf($trydusObj->trydus_breadcrumb_bridge());

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
