<?php





/*remove all price*/



remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);



add_action('woocommerce_single_product_summary', 'customizing_single_product_summary_hooks', 2);



function customizing_single_product_summary_hooks()
{



	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);







}







/*remove product tabs price*/



/*hide add to cart button*/



remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);







/*Single Product Template Parts */



/*add_action( 'woocommerce_after_single_product', 'action_woocommerce_after_single_product' );
function action_woocommerce_after_single_product(){
get_template_part( 'template-parts/single-product', 'resources' );
get_template_part( 'template-parts/single-product', 'accordion' );
}*/



/* Product Attribute and Enquire */



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);





function action_woocommerce_after_add_to_cart_button()
{



	get_template_part('template-parts/single-product', 'summary');



}
;





add_action('woocommerce_single_product_summary', 'action_woocommerce_after_add_to_cart_button', 10, 0);





// define the woocommerce_after_shop_loop_item callback 



function action_woocommerce_after_shop_loop_item()
{



	echo the_excerpt();



}
;





// add the action 



add_action('woocommerce_after_shop_loop_item', 'action_woocommerce_after_shop_loop_item', 10, 0);





/* Breadcrumbs */



/*function action_woocommerce_before_main_content() { 
get_template_part('template-parts/breadcrumbs', 'product');
}; 
// add the action 
add_action( 'woocommerce_before_single_product_summary', 'action_woocommerce_before_main_content', 10, 2 ); */



/*-----------------------------------------------------------------------------------*/

/* Register Fields
/*-----------------------------------------------------------------------------------*/

// 1. VALIDATE FIELDS



add_filter('woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3);



function bbloomer_validate_name_fields($errors, $username, $email)
{

	if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {

		$errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));

	}

	if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {

		$errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));

	}

	if (isset($_POST['company']) && empty($_POST['company'])) {

		$errors->add('company_error', __('<strong>Error</strong>: Company is required!.', 'woocommerce'));

	}

	if (isset($_POST['application']) && empty($_POST['application'])) {

		$errors->add('application_error', __('<strong>Error</strong>: application is required!.', 'woocommerce'));

	}





	if (strcmp($_POST['password'], $_POST['password2']) !== 0) {

		return new WP_Error('registration-error', __('Passwords do not match.', 'woocommerce'));

	}



	return $errors;

}



// 2. SAVE FIELDS



add_action('woocommerce_created_customer', 'bbloomer_save_name_fields');



function bbloomer_save_name_fields($customer_id)
{

	if (isset($_POST['billing_first_name'])) {

		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));

		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));

	}

	if (isset($_POST['billing_last_name'])) {

		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));

		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));

	}



	if (isset($_POST['company'])) {
		update_user_meta($customer_id, 'company', sanitize_text_field($_POST['company']));

	}

	if (isset($_POST['application'])) {
		update_user_meta($customer_id, 'application', sanitize_text_field($_POST['application']));
	}



}



/*-----------------------------------------------------------------------------------*/

/* Remove tabs to my account
/*-----------------------------------------------------------------------------------*/

add_filter('woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 9999);



function bbloomer_remove_address_my_account($items)
{

	unset($items['edit-address']);

	unset($items['orders']);

	unset($items['downloads']);

	return $items;

}

/*-----------------------------------------------------------------------------------*/

/* Redirect after login
/*-----------------------------------------------------------------------------------*/

function fp_redirect_login()
{

	return '/client-portal/';

}



add_filter('woocommerce_login_redirect', 'fp_redirect_login');



/**
 * @snippet       Remove SALE badge @ Product Archives and Single Product
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    Woo 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);



remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);







/*-----------------------------------------------------------------------------------*/

/* Get application options
/*----------------------------------------------------------------------------------*/

function get_application_option()
{

	$terms = get_terms(
		array(

			'taxonomy'   => 'application_category',

			'hide_empty' => false,

			'parent'     => 0,

		)
	);



	ob_start();

	foreach ($terms as $term) {

		?>

		<option value="<?= $term->term_id ?>"> <?= $term->name ?> </option>

		<?php

	}

	return ob_get_clean();



}

/**
 * Add a custom product data tab
 */
add_filter('woocommerce_product_tabs', 'woo_resources_tab');
function woo_resources_tab($tabs)
{

	// Adds the new tab

	$tabs['resources'] = array(
		'title'    => __('Resources', 'woocommerce'),
		'priority' => 50,
		'callback' => 'woo_resources_tab_content'
	);

	return $tabs;

}
function woo_resources_tab_content()
{
	if (have_rows('resources')) {
		while (have_rows('resources')) {
			the_row();
			$resources_array[] = array(
				'resource_product'   => get_the_title(),
				'resource_type'      => get_sub_field('resource_type'),
				'resource_title'     => get_sub_field('resource_title'),
				'resource_thumbnail' => get_sub_field('resource_thumbnail'),
				'resource_file'      => get_sub_field('resource_file'),
			);
		}
	}
	?>
	<div class="trydus-woocommerce-page woocommerce">

		<ul class="products columns-3 resources" id="resources">

			<?php if ($resources_array) { ?>

				<?php foreach ($resources_array as $resource_val) { ?>

					<?php

					$resource_product = $resource_val['resource_product'];
					$resource_type = $resource_val['resource_type'];
					$resource_title = $resource_val['resource_title'];
					$resource_thumbnail = $resource_val['resource_thumbnail'];
					$resource_file = $resource_val['resource_file'];

					?>

					<li
						class="product type-product post-15169 status-publish first instock product_cat-rubber has-post-thumbnail shipping-taxable purchasable product-type-simple">

						<a href="<?= $resource_file['url'] ?>" target="_blank"
							class="woocommerce-LoopProduct-link woocommerce-loop-product__link">

							<div class="product-thumb-wrapper">

								<?= get_resource_image($resource_type, $resource_thumbnail) ?>

							</div>

							<h2 class="woocommerce-loop-product__title">

								<?= $resource_product ?>

								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.867 477.867"
									style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve">
									<g>
										<g>
											<path
												d="M409.6,153.6h-85.333c-9.426,0-17.067,7.641-17.067,17.067s7.641,17.067,17.067,17.067H409.6c9.426,0,17.067,7.641,17.067,17.067v221.867c0,9.426-7.641,17.067-17.067,17.067H68.267c-9.426,0-17.067-7.641-17.067-17.067V204.8c0-9.426,7.641-17.067,17.067-17.067H153.6c9.426,0,17.067-7.641,17.067-17.067S163.026,153.6,153.6,153.6H68.267c-28.277,0-51.2,22.923-51.2,51.2v221.867c0,28.277,22.923,51.2,51.2,51.2H409.6c28.277,0,51.2-22.923,51.2-51.2V204.8C460.8,176.523,437.877,153.6,409.6,153.6z" />
										</g>
									</g>
									<g>
										<g>
											<path
												d="M335.947,243.934c-6.614-6.387-17.099-6.387-23.712,0L256,300.134V17.067C256,7.641,248.359,0,238.933,0s-17.067,7.641-17.067,17.067v283.068l-56.201-56.201c-6.78-6.548-17.584-6.361-24.132,0.419c-6.388,6.614-6.388,17.1,0,23.713l85.333,85.333c6.657,6.673,17.463,6.687,24.136,0.03c0.01-0.01,0.02-0.02,0.031-0.03l85.333-85.333C342.915,261.286,342.727,250.482,335.947,243.934z" />
										</g>
									</g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
									<g></g>
								</svg>

							</h2>
							<p>

								<?= $resource_title ?>

							</p>

						</a>

						<a class="trydus-btn  d-inline-flex align-items-center elementor-animation- disable-default-hover-no"
							href="<?= $resource_file['url'] ?>" target="_blank">

							<?php
							if ($resource_type == 'Brochure') {

								echo 'READ THE BROCHURE';

							}
							else if ($resource_type == 'Technical Data') {

								echo 'READ THE SPEC';

							}
							else {
								echo 'WATCH THE VIDEO';
							}
							?>
							<span class="icon-after btn-icon"><i aria-hidden="true" class="fas fa-arrow-right"></i></span>
						</a>

					</li>

				<?php } ?>

			<?php }
			else { ?>

				<li class="no-resource">

					<h2>No resources found</h2>

				</li>

			<?php } ?>



		</ul>

	</div>
	<?php

}