<?php 

$product_categories = get_field('product_categories');
$terms = get_terms(array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'include' => $product_categories,
	'parent' => 0

));

?>

<div class="container-fluid application-list product-category-list">
	<div class="row justify-content-center column-5">
		<?php foreach($terms as $term) { ?>
			<?php 
			$image = get_field('icon', $term->taxonomy . '_' . $term->term_id);
			$permalink = get_site_url().'/industries/'.$term->slug.'/';
			?>
			<div class="col trydus-service-widget-wrap">
				<div class="trydus-service-widget-item service-style-1">
					<div class="service-thumbnail-wrapper center">
						<div class="service-thumbnail center-image">
							<span class="image-shape"></span>
							<img src="<?= wp_get_attachment_image_url( $image, 'medium' ); ?>">
						</div>
					</div>
					<div class="service-content-wrap">
						<div class="service-content">
							<a href="<?= $permalink ?>" class="service-title-link d-block">
								<h3 class="service-title"> <?= $term->name ?> <span class="title-icon right"></span></h3>
							</a>
							<p> <?= $term->description ?> </p>                                    
						</div>
						<div class="service-btn-wrap">
							<a class="service-btn elementor-animation-" href="<?= $permalink ?>">
								EXPLORE
								<span class="icon-after btn-icon">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1.16669 14H26.25" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M18.0834 5.83334L26.25 14L18.0834 22.1667" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">

										</path>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div> 
		<?php } ?>
	</div>
</div>