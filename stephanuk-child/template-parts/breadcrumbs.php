<?php
$blog_page = get_option('page_for_posts');
$breadcrumbs_width = get_field('breadcrumbs_width');
$description = get_field('text_after_title');
$custom_breadcrumbs_text = get_field('custom_breadcrumbs_text');
$light_bg_breadcrumbs = get_field('light_bg_breadcrumbs');
$shop_page = get_the_title(get_option('woocommerce_shop_page_id'));
$term = get_queried_object();
$class = '';
$button = '';
if (is_product_category()) {
	$title = $term->name;
	$title_breadcrumbs = $term->name;
	$description = $term->description;
	$class = 'centered';
	$button = '<div class="trydus-btn-wrapper enable-icon-box-no">
                            <a class="trydus-btn  d-inline-flex align-items-center elementor-animation- disable-default-hover-no" href="'.wc_get_page_permalink( 'shop' ) .'">
            
                    
                    VIEW ALL MACHINES
                                            <span class="icon-after btn-icon"><i aria-hidden="true" class="fas fa-arrow-right"></i></span>
                                                        </a>
                </div>';
}
else {
	if (is_home()) {
		$title = get_the_title($blog_page);
		$title_breadcrumbs = 'NEWS';
		$class = 'centered';
		$description = 'Confectionery manufacturing equipment from Stephan UK includes world-class starch-free depositing systems which enable seamless production of a wide range of products.';

	}
	else {
		if (is_archive()) {
			if (is_shop()) {
				$title = $shop_page;
				$title_breadcrumbs = $shop_page;
			}
			else {
				$title_breadcrumbs = $term->name;
				$title = $term->name;
			}
		}
		else {
			if (get_post_type() == 'post') {
				$title = get_the_title();
				$title_breadcrumbs = 'BLOG ARTICLE';
			}
			else {
				$title = get_the_title();
				$title_breadcrumbs = $custom_breadcrumbs_text ? $custom_breadcrumbs_text : get_the_title();
			}
		}
	}
}
?>
<div class="custom-breadcrumbs no-padding style-2 <?= $light_bg_breadcrumbs ? 'light-bg' : '' ?>">
	<div class="container <?= $class ?> breadcrumbs-<?= $breadcrumbs_width ?>">
		<div class="breadcrumbs-holder">
			<ul class="list-inline">
				<li class="list-inline-item">
					<a href="<?= get_home_url() ?>">HOME</a>
				</li>

				<?php if (has_post_parent()) { ?>
					<li class="list-inline-item">
						<a href="<?= get_permalink(wp_get_post_parent_id()) ?>"><?= get_the_title(wp_get_post_parent_id()) ?></a>
					</li>
				<?php } ?>
				<?php if (get_post_type() == 'post') { ?>
					<li class="list-inline-item">
						<a href="<?= get_permalink($blog_page) ?>">NEWS</a>
					</li>
				<?php }
				else if (get_post_type() == 'product') { ?>
						<li class="list-inline-item">
							<a href="<?= get_permalink(get_option('woocommerce_shop_page_id')) ?>"> <?= $shop_page ?> </a>
						</li>
				<?php } ?>
				<li class="list-inline-item">
					<span><?= $title_breadcrumbs ?></span>
				</li>

			</ul>
		</div>
		<?php if ($title && !is_product() && !is_single()) { ?>
			<div class="term-title">
				<h1>
					<?= $title ?>
				</h1>

			</div>
			<?php if ($description) { ?>
				<div class="description-box">
					<?= wpautop($description) ?>
				</div>
			<?php } ?>

			<?= $button ?>
		<?php } ?>

	</div>
</div>