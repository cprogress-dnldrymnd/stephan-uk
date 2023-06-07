<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trydus
 */

get_header();
$trydus = get_option('trydus');
$use_custom_layout = get_post_meta(get_the_ID(), 'use_custom_page_layout', true);
$custom_page_layout = get_post_meta(get_the_ID(), 'select_custom_layout', true);
$layout = '';
if (!empty($custom_page_layout && $use_custom_layout)) {
	$layout = $custom_page_layout;
}
elseif (isset($trydus['single_page_layout'])) {
	$layout = $trydus['single_page_layout'];
}
else {
	$layout = 'right-sidebar';
}


while (have_posts()):
	the_post();
	get_template_part('template-parts/breadcrumbs');
	?>
	<div class="content-block post-details-page">
		<div class="container">
			<div class="row justify-content-center">

				<?php if ('left-sidebar' == $layout && is_active_sidebar('trydus_blog_sidebar')): ?>
					<div class="col-md-4"><?php get_sidebar('trydus_blog_sidebar'); ?></div>
				<?php endif; ?>
				<div class="col-md-8">
					<header class="entry-header">

						<?php
						if ('post' === get_post_type()):
							?>
							<div class="entry-meta entry-meta-date mb-4">
								<span><?= get_the_date() ?></span>
							</div><!-- .entry-meta -->
						<?php endif;
						the_title('<h1 class="entry-title">', '</h1>');


						if ('post' === get_post_type()):
							?>
							<div class="entry-meta">
								<?php
								trydus_posted_by();
								?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
					<main id="primary" class="site-main">

						<?php


						get_template_part('template-parts/single/post');





						?>

					</main><!-- #main -->
				</div>
				<?php if ('right-sidebar' == $layout && is_active_sidebar('trydus_blog_sidebar')): ?>
					<div class="col-md-4"><?php get_sidebar(); ?></div>
				<?php endif; ?>


			</div>
		</div>
		<div class="single-footer">
			<div class="container">
				<footer class="entry-footer">
					<?php trydus_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'trydus') . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'trydus') . '</span> <span class="nav-title">%title</span>',
					)
				);
				?>
			</div>
		</div>
	</div>
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()):
		comments_template();
	endif;
?>
<?php
endwhile; // End of the loop.

get_footer();