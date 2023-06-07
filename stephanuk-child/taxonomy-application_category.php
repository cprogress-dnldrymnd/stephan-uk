<?php 
get_header();
$term = get_queried_object();
?>
<main id="application">
	<?php
	get_template_part('template-parts/breadcrumbs');
	get_template_part('template-parts/application', 'hero-banner');
	?>
</main>
<?php
get_footer();
?>