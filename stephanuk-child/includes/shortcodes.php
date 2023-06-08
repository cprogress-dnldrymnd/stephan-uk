<?php

function application_categories()
{

    ob_start();

    get_template_part('template-parts/application-category', 'parent');

    return ob_get_clean();

}

add_shortcode('application_categories', 'application_categories');





function product_categories_icon()
{

    ob_start();

    get_template_part('template-parts/product', 'categories');

    return ob_get_clean();

}

add_shortcode('product_categories_icon', 'product_categories_icon');



function application_categories_resources()
{

    ob_start();

    get_template_part('template-parts/application-category', 'resources');

    return ob_get_clean();

}

add_shortcode('application_categories_resources', 'application_categories_resources');



/*function client_portal() {
ob_start();
?>
<a href="">test</a>
<?php
return ob_get_clean();
}
add_shortcode('client_portal', 'client_portal');*/



function username()
{

    global $current_user;

    wp_get_current_user();

    return '<i class="fas fa-user"></i>&nbsp;' . $current_user->user_login;

}



add_shortcode('username', 'username');



function product_name()
{

    if (isset($_GET['product_name'])) {

        return $_GET['product_name'];

    }

}



add_shortcode('product_name', 'product_name');







function pf_search()
{

    ob_start();

    ?>

    <div id="woocommerce_product_search-4" class="trydus-wc-widget col widget woocommerce widget_product_search">
        <h4 class="widget-title">Search</h4>

        <form role="search" method="get" class="woocommerce-product-search">

            <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>

            <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…"
                value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>" name="s">

            <button type="submit" value="Search">Search</button>

            <input type="hidden" name="post_type" value="product">

        </form>

    </div>

    <?php

    return ob_get_clean();

}



add_shortcode('pf_search', 'pf_search');





function application_menu()
{

    ob_start();

    ?>

    <?php

    $terms = get_terms(
        array(

            'taxonomy'   => 'application_category',

            'hide_empty' => false,

            'parent'     => 0



        )
    );

    ?>



    <div class="container-fluid application-list application-menu-list">

        <div class="row justify-content-center">

            <?php foreach ($terms as $term) { ?>

                <?php

                $image = get_field('icon', $term->taxonomy . '_' . $term->term_id);

                $permalink = get_term_link($term->term_id);

                ?>

                <div class="elementor-element elementor-element-deef466 elementor-position-left elementor-vertical-align-middle trydus-sticky-no elementor-widget elementor-widget-image-box"
                    data-id="deef466" data-element_type="widget" data-settings="{&quot;trydus_sticky&quot;:&quot;no&quot;}"
                    data-widget_type="image-box.default">

                    <div class="elementor-widget-container" style="padding: 10px 0;">

                        <div class="elementor-image-box-wrapper">

                            <figure class="elementor-image-box-img">

                                <a href="<?= $permalink ?>">

                                    <img width="93" height="93" src="<?= wp_get_attachment_image_url($image, 'medium'); ?>"
                                        class="attachment-full size-full" alt="" loading="lazy">

                                </a>

                            </figure>

                            <div class="elementor-image-box-content">

                                <h3 class="elementor-image-box-title">

                                    <a href="<?= $permalink ?>"><?= $term->name ?></a>

                                </h3>

                                <p class="elementor-image-box-description"><?= $term->description ?></p>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

    <?php

    return ob_get_clean();

}



add_shortcode('application_menu', 'application_menu');


function pages_grid($atts)
{
    extract(
        shortcode_atts(
            array(
                'parent'         => '',
                'posts_per_page' => '',
            ),
            $atts
        )
    );
    $child_args = array(
        'post_parent'    => $parent,
        'posts_per_page' => $posts_per_page,
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $children = get_children($child_args);
    ob_start();
    ?>
    <div class="row row-pages g-4">

        <?php foreach ($children as $child) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="column-holder">
                    <a href="<?= get_permalink($child->ID) ?>" class="d-block">
                        <div class="heading-box">
                            <h3 class="d-flex justify-content-between align-items-center">
                                <span class="text">
                                    <?= $child->post_title ?>
                                </span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path fill="currentColor"
                                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                                    </svg>
                                </span>
                            </h3>
                        </div>
                        <div class="image-box">
                            <img src="<?= get_the_post_thumbnail_url($child->ID, 'large') ?>" alt="">
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('pages_grid', 'pages_grid');


function product_grid($atts)
{
    extract(
        shortcode_atts(
            array(
                'product_ids' => '',
            ),
            $atts
        )
    );

    $args = array(
        'post__in'       => explode(', ', $product_ids),
        'post_type'      => 'product',
        'posts_per_page' => -1
    );

    $posts = get_posts($args);


    ob_start();
    ?>
    <div class="woocommerce">
        <ul class="products owl-carousel product-carousel">
            <?php foreach ($posts as $p) { ?>
                <li class="product item">
                    <a href="<?= get_permalink($p->ID) ?>"
                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                        <div class="product-thumb-wrapper">
                            <img src="<?= get_the_post_thumbnail_url($p->ID, 'large') ?>" alt="<?= $p->post_title ?>">
                        </div>
                        <h2 class="woocommerce-loop-product__title">
                            <?= $p->post_title ?>
                        </h2>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('product_grid', 'product_grid');


function email_preview()
{
    return '<iframe src="https://stephan-uk.co.uk/email-signatures/email-signature.php?id='.get_the_ID().'"> </iframe>';
}

add_shortcode('email_preview', 'email_preview');

// Allow for shortcodes in messages
function acf_load_field_message($field)
{
    $type = get_post_type();
    if ($type !== "acf-field-group") {
        $field['message'] = do_shortcode($field['message']);
    }
    return $field;
}

add_filter('acf/load_field/type=message', 'acf_load_field_message', 10, 3);