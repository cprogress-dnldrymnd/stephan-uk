<?php 
/*
Template name: No Header Footer Full Width
*/
?>
<?php 
get_header('empty');
?>
<main id="main">
	<div class="site-content">
		<!-- <div class="heading-box">
			<h1><?php the_title() ?></h1>
		</div> -->
		<?php the_content() ?>
	</div>
</main>
<?php
get_footer('empty');
?>