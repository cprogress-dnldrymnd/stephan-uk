<?php
/*
Template name: Breadcrumbs
*/
?>
<?php
get_header();
while (have_posts()) {
    the_post();
    get_template_part('template-parts/breadcrumbs');
    ?>
    <main id="main">
        <div class="site-content">
            <div class="container">
                <?php the_content() ?>
            </div>
        </div>
    </main>
    <?php
}
get_footer();
?>