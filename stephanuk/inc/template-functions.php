<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package trydus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function trydus_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'trydus_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function trydus_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'trydus_pingback_header');

function trydus_dd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * Detect Homepage
 *
 * @return boolean value
 */
function trydus_detect_homepage()
{
    // If front page is set to display a static page, get the URL of the posts page.
    $homepage_id = get_option('page_on_front');

    // current page id
    $current_page_id = (is_page(get_the_ID())) ? get_the_ID() : '';

    if ($homepage_id == $current_page_id) {
        return true;
    } else {
        return false;
    }
}

/**
 *   Get the site logo for Bufet
 *
 */
function trydus_get_site_logo()
{
    $logo = '';
    $trydus = get_option('trydus');
    $logo_url = '';

    $custom_logo = get_post_meta(get_the_ID(), 'use_custom_logo', true);
    $page_logo = get_post_meta(get_the_ID(), 'select_logo', true);

    if (!empty($custom_logo)) {
        $img_url = wp_get_attachment_image_src($page_logo, 'full');
        $logo_url = esc_url($img_url[0]);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
    } else if (!empty($trydus['logo']['url'])) {
        $logo_url = esc_url($trydus['logo']['url']);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
    } else {
        if (has_custom_logo()) {
            $core_logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_src($core_logo_id, 'full');
            $logo = '<img src="' . esc_url($logo_url[0]) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__regular">';
        } else {
            $logo = '<h1 class="navbar-brand__regular">' . get_bloginfo('name') . '</h1>';
        }
    }

    return $logo;
}

/**
 * Get the site logo for Bufet
 */
function trydus_get_site_sticky_logo()
{

    $trydus = get_option('trydus');

    $logo = '';
    $logo_url = '';

    $custom_logo = get_post_meta(get_the_ID(), 'use_custom_logo', true);
    $page_sticky_logo = get_post_meta(get_the_ID(), 'select_sticky_logo', true);

    if (!empty($custom_logo) && $page_sticky_logo) {
        $img_url = wp_get_attachment_image_src($page_sticky_logo, 'full');
        $logo_url = esc_url($img_url[0]);
        $logo = '<img src="' . esc_url($logo_url) . ' ?>" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__sticky">';
    } else if (!empty($trydus['sticky_logo']['url'])) {
        $logo_url = esc_url($trydus['sticky_logo']['url']);
        $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="navbar-brand__sticky">';
    }
    return $logo;
}

/**
 * Get header buttons
 */
function trydus_get_header_buttons()
{

    $trydus = get_option('trydus');

    $buttons = '';
    $btn_text_1 = get_post_meta(get_the_ID(), 'header_btn1_text', true) ? get_post_meta(get_the_ID(), 'header_btn1_text', true) : array();
    $btn_url_1 = get_post_meta(get_the_ID(), 'header_btn1_url', true) ? get_post_meta(get_the_ID(), 'header_btn1_url', true) : array();
    $btn_text_2 = get_post_meta(get_the_ID(), 'header_btn2_text', true) ? get_post_meta(get_the_ID(), 'header_btn2_text', true) : array();
    $btn_url_2 = get_post_meta(get_the_ID(), 'header_btn2_url', true) ? get_post_meta(get_the_ID(), 'header_btn2_url', true) : array();

    if ($btn_text_1) {

        if ($btn_text_1) {
            $buttons .= '<a class="trydus-login-btn" href=" ' . esc_url($btn_url_1) . ' "> ' . esc_html($btn_text_1) . ' </a>';
        }
        if ($btn_text_2) {
            $buttons .= '<a class="trydus-login-btn" href=" ' . esc_url($btn_url_2) . ' "> ' . esc_html($btn_text_2) . ' </a>';
        }
    } elseif (isset($trydus['header_btn1_text'])) {
        if (isset($trydus['header_btn1_text'])) {
            $buttons .= '<a class="trydus-login-btn" href=" ' . esc_url($trydus['header_btn1_url']) . ' "> ' . esc_html($trydus['header_btn1_text']) . ' </a>';
        }
        if (isset($trydus['header_btn2_text'])) {
            $buttons .= '<a class="trydus-login-btn" href=" ' . esc_url($trydus['header_btn2_url']) . ' "> ' . esc_html($trydus['header_btn2_text']) . ' </a>';
        }
    }

    return $buttons;
}
add_action('wp_ajax_cloadmore', 'trydus_comments_loadmore_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_cloadmore', 'trydus_comments_loadmore_handler'); // wp_ajax_nopriv_{action}

function trydus_comments_loadmore_handler()
{

    // maybe it isn't the best way to declare global $post variable, but it is simple and works perfectly!
    global $post;
    $post = get_post($_POST['post_id']);
    setup_postdata($post);

    wp_list_comments(
        array(
            'page' => $_POST['cpage'], // current comment page
            'per_page' => get_option('comments_per_page'),
            'style' => 'ol',
            'short_ping' => true,
        )
    );
    die; // don't forget this thing if you don't want "0" to be displayed
}

/**
 * Get navbar scheme classes
 *
 */
function trydus_get_navbar_scheme()
{
    $trydus = get_option('trydus');

    $output = '';


    $navbar_color_scheme = get_post_meta(get_the_ID(), 'navbar_color_scheme', true);

    if (!empty($navbar_color_scheme)) {
        $output .= $navbar_color_scheme;
    } else if (isset($trydus['header_navbar_scheme'])) {
        $output .= $trydus['header_navbar_scheme'];
    }

    return $output;
}

/**
 * trydus header Settings
 *
 */
function trydus_header_settings()
{

    $trydus = get_option('trydus');
    $check_header_post = get_posts(['post_type' => 'trydus_header']);

    if (0 != count($check_header_post)) {
        printf('<header class="site-header trydus-elementor-header">');
        trydus_header_footer_template_query('trydus_header');
        printf('</header>');
    }else{
        get_template_part('template-parts/headers/header-style-1');
    }

}

/**
 * trydus Footer Settings
 *
 */
function trydus_footer_settings()
{
        $check_footer_post = get_posts(['post_type' => 'trydus_footer']);


        if ( 0 != count($check_footer_post)) {
            trydus_header_footer_template_query('trydus_footer');
        } else {
            trydus_raw_footer();
        }
}


/**
 * trydus Raw Footer
 *
 */
function trydus_raw_footer()
{
    $trydus = get_option('trydus');

    if (isset($trydus['footer_copyright'])) {
        echo '<div class="trydus-copyright text-center">' . $trydus['footer_copyright'] . '</div>';
    } else {
        echo '<div class="trydus-copyright text-center">' . esc_html__('Copyright 2020, All Rights Reserved', 'trydus') . '</div>';
    }
}

/**
 * trydus Footer Query
 *
 */
function trydus_header_footer_template_query($post_type,  $post_id = '')
{

    global $post;
    $current_page_id = isset( $post->ID ) ? $post->ID : false;
   
    // Query for blog posts
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
    );
    if(empty( $post_id )){
        $argc['p'] =  $post_id;
    }

    $footer_query = new WP_Query($args);

    if ($footer_query->have_posts()) :
        while ($footer_query->have_posts()) :
            $footer_query->the_post();

           ob_start();
           the_content();
           $content = ob_get_clean();
            $output = '';
  

            if( get_field('include_rules', get_the_ID() ) ) {
              
                while( the_repeater_field('include_rules', get_the_ID()) ) {
                    $specific_pages = get_sub_field( 'pages' );
                    $entire_website = get_sub_field( 'include_on' );

                   
                    if( 'all' == $entire_website || $current_page_id == $specific_pages){
                        $output = $content;
                    }
                }
            }
            
            
            
            if( get_field('exclude_rules', get_the_ID() ) ) {
                
                while( the_repeater_field('exclude_rules', get_the_ID()) ) {
                    $specific_pages = get_sub_field( 'pages' );
                    $entire_website = get_sub_field( 'exclude_on' );
                    if( 'all' == $entire_website || $current_page_id == $specific_pages){
                        $output = '';
                    }
                }
            }
            
            echo $output;

        endwhile;
    endif;
}

/**
 * trydus get archive post type
 *
 */
function trydus_get_archive_post_type()
{
    $postname = isset(get_queried_object()->name) ? get_queried_object()->name : '';
    return is_archive() ? $postname : '';
}

function trydus_update_elementor_scheme($colors = array())
{
    global $trydus;
    if (class_exists('ReduxFrameworkPlugin')) :
        $accent_color = $trydus['custom_accent_color'];
        $heading_color = $trydus['heading_color'];
        $text_color = $trydus['text_color'];
        $colors = [
            "1" => "$heading_color",
            "2" => "$heading_color",
            "3" => "$text_color",
            "4" => "$accent_color"
        ];
        return $colors;
    endif;
    return false;
}
add_action('after_switch_theme', 'trydus_update_elementor_scheme');

if (!function_exists('is_shop') && !class_exists('woocommerce')) {
    function is_shop()
    {
        return false;
    }
}

function trydus_preloader()
{
    $trydus = get_option('trydus');

    $preloader = '
    <div class="trydus-preloader-wrap">
        <div class="trydus-preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    ';

    if (isset($trydus['enable_preloader'])) {
        if (true == $trydus['enable_preloader']) {
            printf($preloader);
        }
    } else {
        printf($preloader);
    }
}