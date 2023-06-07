<?php 
$resources_heading = (get_field('resources_heading', 'option') ? get_field('resources_heading', 'option') : 'Resources');
$resources_description = (get_field('resources_description', 'option') ? get_field('resources_description', 'option') : 'Sign in to the client portal to access resources and manuals for this product.');
$button_text = (get_field('button_text', 'option') ? get_field('button_text', 'option') : 'Client Portal');
$button_link = (get_field('button_link', 'option') ? get_field('button_link', 'option') : '/client-portal/'); 
?>

<section class="resources fixed-full-width">
	<div class="container">
		<div class="inner">
			<img src="<?= get_site_url() ?>/wp-content/uploads/2021/05/Component-1-–-1.png" alt="icon">
			<h2><?= $resources_heading ?></h2>
			<p> <?= $resources_description ?> </p>
			<div class="custom-button dark-blue">
				<a href="<?= $button_link ?>" class="elementor-button-link elementor-button elementor-size-sm" role="button">
					<span class="elementor-button-content-wrapper">
						<span class="elementor-button-text"><?= $button_text ?></span>
					</span>
				</a>
			</div>
		</div>
	</div>
</section>