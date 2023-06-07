<?php 
/*

Template name: No Header Footer



*/
?>
<?php 
get_header('empty');
?>
<main id="main">
	<div class="site-content">
		<div class="container">
			<!-- <div class="heading-box">
				<h1><?php the_title() ?></h1>
			</div> -->
			<?php the_content() ?>
		</div>
	</div>
</main>
<?php
get_footer('empty');
?>