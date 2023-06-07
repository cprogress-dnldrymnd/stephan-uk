<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydus
 */

global $trydusObj;
$trydus = get_option('trydus');
$grid = (isset($trydus['blog_grid'])) ? $trydus['blog_grid'] : 'two-column';
switch ($grid) {
    case 'two-column':
        $limit	= 17;
        $title = wp_trim_words(get_the_title(), 11, '...');
        break;

    case 'one-column':
        $limit	= 30;
        $title = get_the_title();
        break;

    default:
        $limit	= 17;
        $title = wp_trim_words(get_the_title(), 11, '...');
        break;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-item <?php echo esc_attr($grid) ?>">
		<div class="post-thumbnail-wrapper">
			<?php
            if (is_sticky()) {
                echo '<span class="sticky-text" >' . esc_html__('Sticky', 'trydus') . '</span>';
            }
            ?>
			<?php trydus_post_thumbnail(); ?>
		</div>
		<div class="post-content">
			<div class="post-meta">
				<div class="post-date">
					<?php trydus_posted_on() ?>
				</div>


			</div>
			<?php
            echo '<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
            echo esc_html($title);
            echo '</a></h2>';
            ?>
			<?php echo '<p>' . esc_html($trydusObj->postExcerpt($limit, get_the_excerpt())) . '</p>'; ?>

			<div class="post-read-more">
				<a href="<?php echo  esc_url(get_permalink()); ?>">
					<?php echo (isset($trydus['continue_reading_title'])) ? $trydus['continue_reading_title'] : esc_html__('Continue Reading', 'trydus') ?>  
					<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.16669 14H26.25" stroke="#171B24" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.0834 5.83334L26.25 14L18.0834 22.1667" stroke="#171B24" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
				</a>
			</div>
		</div>
	</div>

</div><!-- #post-<?php the_ID(); ?> -->