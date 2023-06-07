<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydus
 */
$idd = get_the_ID();
$job_type = get_the_terms($idd, 'job-type');
$job_type = join(', ', wp_list_pluck($job_type, 'name'));

$job_location = get_the_terms($idd, 'job-location');
$job_location = join(', ', wp_list_pluck($job_location, 'name'));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="trydus-job-title text-center">
                    <?php the_title('<h1>', '</h1>'); ?>
                    <div class="trydus-job-meta">
                        <?php if (!empty($job_type)) : ?>
                            <span class="job-address"> <?php echo esc_html($job_type); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($job_location)) : ?>
                            <span class="job-address"> <?php echo esc_html(', ' . $job_location) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="job-content entry-content">
                    <?php
                    trydus_post_thumbnail();
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'trydus'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            esc_html(get_the_title())
                        )
                    );

                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'trydus'),
                            'after'  => '</div>',
                        )
                    );
                    ?>

                    <?php if (!empty(get_field('apply_button_label'))) :
                        $link = get_field('apply_button_url');
                    ?>
                        <div class="trydus-job-apply">
                            <a href="<?php echo  esc_url($link); ?>" class="trydus-btn btn-type-boxed"><?php the_field('apply_button_label') ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</article><!-- #post-<?php the_ID(); ?> -->
<?php if (get_field('job_form')) : ?>
    <div class="trydus-job-form-area" id="apply-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <?php if (!empty(get_field('form_title'))) : ?>
                        <h3 class="apply-form-title"><?php echo esc_html(get_field('form_title'))  ?></h3>
                    <?php endif; ?>
                    <div class="trydus-apply-form">
                        <?php echo do_shortcode(get_field('job_form')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>