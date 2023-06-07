<?php



add_action('wp_enqueue_scripts', 'trydus_child_enqueue_styles');



function trydus_child_enqueue_styles()
{



	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');



}



require_once('includes/post-types.php');

require_once('includes/shortcodes.php');

require_once('includes/woocommerce.php');

require_once('includes/ajax.php');





/*-----------------------------------------------------------------------------------*/

/* Background image function
/*-----------------------------------------------------------------------------------*/



function _background_image($image, $size = 'full')
{

	return "background-image: url(" . wp_get_attachment_image_url($image, $size) . ")";

}



/*-----------------------------------------------------------------------------------*/

/* Search Form
/*-----------------------------------------------------------------------------------*/

function search_form()
{

	ob_start();

	?>

	<div class="search-on-menu">

		<i class="fas fa-search"></i>

		<form action="<?= get_site_url() ?>" id="search-on-menu-form">

			<input type="text" name="s" placeholder="Search" required />

			<input type="submit" value="Search">

		</form>

	</div>

	<?php

	return ob_get_clean();

}



add_shortcode('search_form', 'search_form');





add_action('wp_footer', 'my_footer_scripts');

function my_footer_scripts()
{

	?>

	<script>

		jQuery(document).ready(function ($) {

			jQuery('.search-anchor').click(function (event) {

				if (jQuery('.search-on-menu').hasClass('search-active')) {

					jQuery('.search-on-menu').removeClass('search-active');

					jQuery('.search-on-menu i').removeClass('fa-times');

				} else {

					jQuery('.search-on-menu').addClass('search-active');

					jQuery('.search-on-menu i').addClass('fa-times');

				}

				event.preventDefault();

			});





			jQuery('.search-anchor form').click(function (event) {

				event.stopPropagation();

				event.preventDefault();

			});





			jQuery('.search-on-menu input[type="submit"]').click(function (event) {

				jQuery('#search-on-menu-form').submit();

			});

			jQuery(document).ready(function () {
				jQuery('.product-carousel').owlCarousel({
					loop: true,
					margin: 10,
					nav: false,
					dots: true,
					responsive: {
						0: {
							items: 1
						},
						576: {
							items: 2
						},
						768: {
							items: 3
						},
						992: {
							items: 4
						}
					}
				})
			});




		});

	</script>

	<?php

}

/*-----------------------------------------------------------------------------------*/

/* Session for breadcrumbs
/*-----------------------------------------------------------------------------------*/

function set_session()
{

	session_start();

	$term = get_queried_object();

	if (is_tax('application_category')) {

		$_SESSION['application_id'] = $term->term_id;

	}



	if (is_product_category()) {

		$_SESSION['product_cat_id'] = $term->term_id;

	}

}



add_action('template_redirect', 'set_session');



function get_session($var)
{

	if (isset($_SESSION[$var])) {

		return $_SESSION[$var];

	}

}



/*-----------------------------------------------------------------------------------*/

/* Add arrow to product title
/*-----------------------------------------------------------------------------------*/

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 2);



function action_woocommerce_shop_loop_item_title()
{

	?>

	<h2 class="woocommerce-loop-product__title">

		<?php the_title() ?>

		<svg xmlns="http://www.w3.org/2000/svg" width="17.691" height="17.447" viewBox="0 0 17.691 17.447">

			<g id="Group_61" data-name="Group 61" transform="translate(-806.976 -665.589)">

				<path id="Path_11" data-name="Path 11" d="M0,0,6.509,6.509,13.018,0"
					transform="translate(818.939 680.522) rotate(-135)" fill="none" stroke="#000" stroke-width="1.5" />

				<line id="Line_11" data-name="Line 11" y1="11.025" x2="11.282" transform="translate(807.5 671.475)" fill="none"
					stroke="#000" stroke-width="1.5" />

			</g>

		</svg>

	</h2>

	<?php

}
;



// add the action 

add_action('woocommerce_shop_loop_item_title', 'action_woocommerce_shop_loop_item_title', 10, 2);



/*-----------------------------------------------------------------------------------*/

/* Case Studies Breadcrumbs
/*-----------------------------------------------------------------------------------*/

function case_studies_breadcrumbs()
{

	ob_start();

	?>

	<div class="custom-breadcrumbs application-breadcrumbs case-study-breadcrumbs">

		<ul class="list-inline">

			<li class="list-inline-item">

				<a href="https://performancefluids.theprogressteam.com">HOME</a>

			</li>

			<li class="list-inline-item">

				<a href="https://performancefluids.theprogressteam.com">Case Studies</a>

			</li>

			<li class="list-inline-item">

				<span><?php the_title() ?></span>

			</li>

		</ul>

	</div>

	<?php

	return ob_get_clean();

}

add_shortcode('case_studies_breadcrumbs', 'case_studies_breadcrumbs');



/*-----------------------------------------------------------------------------------*/

/* Remove menu items on dashboard
/*-----------------------------------------------------------------------------------*/

function performance_fluids_remove_menus()
{

	remove_menu_page('PerformanceFluidsChild');

	remove_submenu_page('themes.php', 'one-click-demo-import');

}

add_action('admin_init', 'performance_fluids_remove_menus');



/*-----------------------------------------------------------------------------------*/

/* Add class to body
/*-----------------------------------------------------------------------------------*/

function wp_body_classes($classes)
{

	if (!is_user_logged_in()) {

		$classes[] = 'not-logged-in';

	}



	return $classes;

}

add_filter('body_class', 'wp_body_classes');



/*-----------------------------------------------------------------------------------*/

/* Pagination
/*-----------------------------------------------------------------------------------*/



function pf_pagination($custom_query)
{

	$total_pages = $custom_query->max_num_pages;

	$big = 999999999; // need an unlikely integer



	if ($total_pages > 1) {

		$current_page = max(1, get_query_var('paged'));



		echo paginate_links(
			array(

				'prev_text' => '<span><</span>',

				'next_text' => '<span>></span>',

				'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),

				'format'    => '?paged=%#%',

				'current'   => $current_page,

				'total'     => $total_pages,



			)
		);

	}

}



/*-----------------------------------------------------------------------------------*/

/* Get resources image
/*-----------------------------------------------------------------------------------*/



function get_resource_image($resource_type, $resource_thumbnail)
{




	if ($resource_type == 'Brochure') {

		$thumb = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/thumb-3.jpg"/>';

	}
	else if ($resource_type == 'Technical Data') {

		$thumb = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/thumb-1.jpg"/>';


	}
	else {
		$thumb = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/thumb-2.jpg"/>';
	}

	if ($resource_thumbnail) {

		$return = '<img src="' . wp_get_attachment_image_url($resource_thumbnail, 'large') . '"/>';

	}
	else {
		$return = $thumb;
	}


	return $return;

}



/*-----------------------------------------------------------------------------------*/

/* Redirect not-logged in user
/*-----------------------------------------------------------------------------------*/



function redirect_not_logged_in()
{

	if (get_field('for_logged_in_users_only')) {

		if (!is_user_logged_in()) {

			wp_redirect(home_url('/client-portal-account/'));

			die;

		}

	}

}



add_action('template_redirect', 'redirect_not_logged_in');



/*-----------------------------------------------------------------------------------*/

/* Disable Gutenberg
/*-----------------------------------------------------------------------------------*/

add_filter('use_block_editor_for_post', '__return_false', 10);





/*-----------------------------------------------------------------------------------*/

/* ACF Options Page
/*-----------------------------------------------------------------------------------*/

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(
		array(
			'page_title' => 'Notification Bar',
			'menu_title' => 'Notification Bar',
			'menu_slug'  => 'notification-bar-settings',
			'capability' => 'edit_posts',
			'redirect'   => false
		)
	);




	acf_add_options_sub_page(
		array(

			'page_title'  => 'Product Settings',

			'menu_title'  => 'Product Settings',

			'parent_slug' => 'edit.php?post_type=product',

		)
	);



}



/*-----------------------------------------------------------------------------------*/

/* ACF Map Choices
/*-----------------------------------------------------------------------------------*/

function acf_load_shortcode_select_field_choices($field)
{



	// reset choices

	$field['choices'] = array();



	global $wpdb;

	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}i_world_map", OBJECT);

	foreach ($results as $result) {

		$choices[$result->id] = $result->name . ' : [show-map id="' . $result->id . '"]';

	}









	// loop through array and add to field 'choices'

	if (is_array($choices)) {



		foreach ($choices as $key => $choice) {



			$field['choices'][$key] = $choice;



		}



	}





	// return the field

	return $field;



}



add_filter('acf/load_field/name=application_map', 'acf_load_shortcode_select_field_choices');



/*-----------------------------------------------------------------------------------*/

/* Return only shortcodes from content
/*-----------------------------------------------------------------------------------*/
/*
function pf_do_only_shortcode($value = '') {
if($value) {
preg_match_all( '/' . get_shortcode_regex() . '/', $value, $matches, PREG_SET_ORDER );
foreach( $matches as $shortcode ) {
return do_shortcode(  $shortcode[0] );
}
}
}
add_action( 'wp', 'pf_do_only_shortcode' );
*/

/*-----------------------------------------------------------------------------------*/

/* Interactive Map Array
/*-----------------------------------------------------------------------------------*/



function pf_map_array($map_id)
{

	global $wpdb;

	$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}i_world_map where id =$map_id", OBJECT);

	foreach ($results as $result) {

		$array_value = explode(';', $result->places);

		return $array_value;

		//return $result->places;

		//echo 'test test test <br><br><br>';

		//var_dump(pf_map_array($result->places));

	}

}


function pf_explode($value, $string)
{

	$array_value = explode($string, $value);

	return $array_value;

}

function notification_bar()
{
	get_template_part('template-parts/notification-bar');
}

function action_admin_head_3()
{
	?>
	<style>
		#toplevel_page_customtaxorder ul li a {
			display: none !important;
		}

		#toplevel_page_customtaxorder ul li a[href="admin.php?page=customtaxorder-application_category"] {
			display: block !important;
		}
	</style>
	<?php
}

add_action('admin_head', 'action_admin_head_3');

/*function action_wp_footer() {
?>
<script>
jQuery(document).ready(function($) {
jQuery('.header-desktop .g-translate').insertBefore('.header-desktop .contact-link').addClass('show-gtranslate');
if(window.innerWidth < 992) {
jQuery('.header-desktop').remove();
} else {
jQuery('.header-mobile').remove();
}
setTimeout(function() {
jQuery('.switcher-popup').addClass('show-popup');
}, 500);
});
</script>
<?php
}
add_action('wp_footer', 'action_wp_footer');*/