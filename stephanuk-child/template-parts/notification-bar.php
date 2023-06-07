<?php
$enabled = get_field('enabled', 'option');
$logo = get_field('logo', 'option');
$content = get_field('content', 'option');
$background_color = get_field('background_color', 'option');
$text_color = get_field('text_color', 'option');
$image_size = get_field('image_size', 'option');

if ($image_size == 'small') {
	$class = 'col-md-2';
	$class_2 = 'col-md-10';
} else if ($image_size == 'medium') {
	$class = 'col-md-2';
	$class_2 = 'col-md-10';
} else {
	$class = 'col-md-3';
	$class_2 = 'col-md-9';
}

?>
<?php if ($enabled) { ?>
	<div class="notification-bar elementor-section elementor-section-boxed has-edit" style="background-color: <?= $background_color ?>; color: <?= $text_color ?>">
		<?php if (current_user_can('administrator')) { ?>
			<div class="edit-holder"><a target="_blank" href="/wp-admin/admin.php?page=notification-bar-settings" class="edit-contents"> Edit </a></div>
		<?php } ?>
		<div class="elementor-container">
			<div class="row">
				<?php if ($logo) { ?>
					<div class="<?= $class ?>">
						<div class="image-box image-<?= $image_size ?>">
							<?= wp_get_attachment_image($logo, 'medium') ?>
						</div>
					</div>
				<?php } ?>
				<?php if ($content) { ?>
					<div class="<?= $class_2 ?>">
						<div class="description-box">
							<?= do_shortcode($content) ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>