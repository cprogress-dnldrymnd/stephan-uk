<?php 
/*
Template name: Page Template : Distributors
*/
?>
<?php 
get_header();
?>

<?php 
$terms = get_terms( array(
	'taxonomy' => 'application_category',
	'hide_empty' => false,
	'parent' => 0
) );
$application_class = '';
if(isset($_GET['term_id'])){
	$term_id = $_GET['term_id'];
} else {
	$application_class = 'application-category';
	?>
	<link href="<?= get_stylesheet_directory_uri().'/assets/globe2/css/globe.css' ?>" rel="stylesheet" />
	<script src="<?= get_stylesheet_directory_uri().'/assets/globe2/js/jquery-1.11.1.min.js' ?>"></script>
	<script src="<?= get_stylesheet_directory_uri().'/assets/globe2/js/velocity.min.js' ?>"></script>
	<script src="<?= get_stylesheet_directory_uri().'/assets/globe2/js/globe_animation.js' ?>"></script>
	<?php
}
if(isset($_GET['term_name'])){
	$term_name =$_GET['term_name'];
}
if(isset($term_id)) { 
	$map = get_field('application_map', 'application_category' . '_' . $term_id);
}
function get_string_between($string, $start, $end){
	$string = ' ' . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return '';
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}
function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>
<main id="main">
	<div class="site-content">
		<?php while (have_posts()) { the_post(); ?>
			<?php get_template_part('template-parts/breadcrumbs', 'distributors'); ?>
		<?php } ?>
		<?php 
		//global $wpdb;
		//$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}i_world_map", OBJECT );
		//foreach($results as $result) {
			//echo $result->places;
			//echo 'test test test <br><br><br>';
			//var_dump(pf_map_array($result->places));
		//}
		?>
		
		<section class="distributors bg-light-gray <?= isset($term_id) ? 'application-active' : 'application-not-active' ?>">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="column-holder <?= $application_class ?>">
							<div class="heading-box">
								<?php if(isset($term_id)) { ?>
									<div class="custom-button back-btn">
										<a href="<?php the_permalink() ?>">
											<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1.16669 14H26.25" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M18.0834 5.83334L26.25 14L18.0834 22.1667" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">

												</path>
											</svg>
											BACK
										</a>
									</div>
									<h2 class="application-title"><?= $term_name ?></h2>
								<?php } else { ?>
									<h2>Select application</h2>
								<?php } ?>
							</div>
							<div class="distributors-wrapper">
								<span class="line"></span>
								<ul class="list-inline distributors-list" id="distributors-list">	
									<?php if(isset($term_id)) { ?>
										<?php 
										$pf_map_array = pf_map_array($map['value']);
										$key = 1;

										$top_map = array();
										$warehouses = array();
										$other = array();
										foreach(array_filter($pf_map_array) as $map_arr) {
											$pf_map_item_array = pf_explode($map_arr, ',');
											$pf_map_details_arr = pf_explode($pf_map_item_array[2], '</div>');
											$strip_tag = get_string_between($pf_map_details_arr[0], '<h3>', '</h3>');
											$name = clean($strip_tag);
											$details = $pf_map_details_arr[0].'</div></div>'.$pf_map_details_arr[2].'</div>'.$pf_map_details_arr[3].'</div></div>';
											if(str_contains($name, 'PerformanceFluids')) {
												$top_map[$name] = array(
													'key' => $key,
													'details' => $details
												);
											} else if(str_contains($name, 'PFLWarehouse')) {
												$warehouses[$name] = array(
													'key' => $key,
													'details' => $details
												);
											} else {
												$other[$name] = array(
													'key' => $key,
													'details' => $details
												);;
											}
											$key++ ;
										}
										ksort($other);
										ksort($warehouses);
										$pf_map_array_merge = array_merge($top_map, array_merge($other, $warehouses));
										?>
										<?php foreach($pf_map_array_merge as $key => $map_arr) { ?> 
											<li class="google-visualization-tooltip-item country-list fixed-css" for="map-id-<?= $map_arr['key'] ?>">
												<?= $map_arr['details'] ?>
											</li>
										<?php } ?>

									<?php } else { ?>
										<?php foreach($terms as $term) { ?>
											<li>
												<a href="?term_id=<?= $term->term_id ?>&term_name=<?= $term->name ?>" class="term-name" for="term-<?= $term->slug ?>">
													<?= $term->name ?>
													<svg xmlns="http://www.w3.org/2000/svg" width="17.691" height="17.447" viewBox="0 0 17.691 17.447">
														<g id="Group_61" data-name="Group 61" transform="translate(-806.976 -665.589)">
															<path id="Path_11" data-name="Path 11" d="M0,0,6.509,6.509,13.018,0" transform="translate(818.939 680.522) rotate(-135)" fill="none" stroke="#000" stroke-width="1.5"></path>
															<line id="Line_11" data-name="Line 11" y1="11.025" x2="11.282" transform="translate(807.5 671.475)" fill="none" stroke="#000" stroke-width="1.5"></line>
														</g>
													</svg>
												</a>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-lg-8">
						<div class="application-map-holder">
							<?php if(isset($term_id)) { ?>
								<div class="pseudo-tooltip">
									<ul>
										<li class="google-visualization-tooltip-item"></li>
									</ul>
								</div>
								<?php if($map) { ?>
									<div class="term-map" id="term-<?= $term_id ?>">
										<?= pf_do_only_shortcode($map['label']) ?>
									</div>
								<?php } ?>
							<?php } else { ?>
								<!-- globe -->
								<div class="globe__placeholder">
									<div class="globe__container">
										<div class="globe" style="visibility: hidden;">
											<div class="globe__sphere"></div>
											<!--<div class="globe__outer_shadow"></div>-->
											<!--<div class="globe__reflections__bottom"></div>-->

											<div class="globe__worldmap">
												<div class="globe__worldmap__back"></div>
												<div class="globe__worldmap__front"></div>
											</div>

											<div class="globe__inner_shadow"></div>
											<!--<div class="globe__reflections__top"></div>-->
										</div>
									</div>
								</div>


								<!-- globe END -->
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>
<?php
get_footer();
?>

<script>
	var $pseudo_tooltip_p = jQuery('.pseudo-tooltip');
	var $pseudo_tooltip = jQuery('.pseudo-tooltip ul li');
	
	jQuery(window).click(function() {
		$pseudo_tooltip_p.css('display', 'none');
		jQuery('.iwm_map_canvas').removeClass('hide-tooltip');
		jQuery('.country-name-trigger.active').removeClass('active');
	});

	$pseudo_tooltip_p.click(function(event){
		event.stopPropagation();
	});
	
	jQuery(document).ready(function() {
		
		var $country_name_trigger = jQuery('.country-list');

		$country_name_trigger.click(function(event) {
			$x = jQuery(this).attr('x')+'px';
			$y = jQuery(this).attr('y')+'px';
			jQuery('.google-visualization-tooltip-item.active').removeClass('active');
			jQuery(this).addClass('active');
			jQuery($pseudo_tooltip).html('');
			jQuery(this).find('.map-tooltip').clone().appendTo( $pseudo_tooltip );

			$height = $pseudo_tooltip_p.outerHeight();
			$width = ($pseudo_tooltip_p.outerWidth()/2);

			$left = parseInt($x)-parseInt($width)-15;
			$top = parseInt($y)-parseInt($height)-15;
			$pseudo_tooltip_p.css({
				'left': $left+'px',
				'top': $top+'px',
				'display': 'block',
			});

			event.stopPropagation();

		});

		setTimeout(function() {
			$key = 1;
			jQuery('#defs + g > g > g:nth-child(3) g').each(function(index, el) {
				jQuery(this).find('circle').clone(jQuery(this));
				jQuery(this).attr('id', 'map-id-'+$key);
				jQuery(this).attr('key', $key);

				$x = jQuery(this).find('image').attr('x');
				$y = jQuery(this).find('image').attr('y');

				if(!$x) {
					$x = jQuery(this).find('circle:first-child').attr('cx');
				}

				if(!$y) {
					$y = jQuery(this).find('circle:first-child').attr('cy');
				}

				jQuery('.country-list[for="map-id-'+$key+'"]').attr('x', $x);
				jQuery('.country-list[for="map-id-'+$key+'"]').attr('y', $y);

				$key++;
			});
		}, 2000);
	});
</script>