<?php while (have_posts()) : the_post(); 

$idd = get_the_ID();
$job_type = get_the_terms($idd, 'job-type');
$job_type = join(', ', wp_list_pluck($job_type, 'name'));

$job_location = get_the_terms($idd, 'job-location');
$job_location = join(', ', wp_list_pluck($job_location, 'name'));
?>
    <div class="trydus-job-list-item">
        <a href="<?php echo get_the_permalink() ?>" class="job-details-link">
            <?php the_title('<h4>', '</h4>') ?>
            <div class="trydus-job-meta">
                <?php if (!empty($job_type)) : ?>
                    <span class="job-address"> <?php echo esc_html($job_type); ?></span>
                <?php endif; ?>
                <?php if (!empty($job_location)) : ?>
                    <span class="job-address"> <?php echo esc_html(', ' . $job_location) ?></span>
                <?php endif; ?>
            </div>
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
<?php
endwhile;
