<?php 
/*
Template name: Page Template : Projects
*/
?>
<?php 
get_header();
?>
<main id="projects">
	<?php
	get_template_part('template-parts/project', 'title');
	get_template_part('template-parts/project', 'list');
	?>
</main>
<?php
get_footer();
?>