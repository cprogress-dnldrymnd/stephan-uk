<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}



/* Theme demo data setup */
function trydus_import_files()
{
    return array(
        array(
            'import_file_name' => 'Initial Setup',
            'categories' => array('Inner Pages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/inner-content.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'trydus',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/trydus/screenshot.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'trydus'),
            'preview_url' => 'https://finestdevs.com/demos/wp/trydus/',
        ),
        array(
            'import_file_name' => 'Factory',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/factory.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'trydus',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/trydus/inc/demo-contents/previews/factory.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'trydus'),
            'preview_url' => 'https://finestdevs.com/demos/wp/trydus',
        ),
        array(
            'import_file_name' => 'Oil Industry',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/oil-industry.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'trydus',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/trydus/inc/demo-contents/previews/oil-industry.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'trydus'),
            'preview_url' => 'https://finestdevs.com/demos/wp/trydus/oil-industry',
        ),
        array(
            'import_file_name' => 'Solar Energy',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/solar-energy.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'trydus',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/trydus/inc/demo-contents/previews/solar-energy.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'trydus'),
            'preview_url' => 'https://finestdevs.com/demos/wp/trydus/solar-energy',
        ),
        array(
            'import_file_name' => 'Chemical Factory',
            'categories' => array('Homepages'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/chemical-factory.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'trydus',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/trydus/inc/demo-contents/previews/chemical-factory.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'trydus'),
            'preview_url' => 'https://finestdevs.com/demos/wp/trydus/chemical-factory',
        ),
        array(
            'import_file_name' => 'Portfolio',
            'categories' => array('Portfolio'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/portfolio.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'inc/demo-contents/customizer.dat',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'inc/demo-contents/theme-options.json',
                    'option_name' => 'trydus',
                ),
            ),
            'import_preview_image_url' => home_url() . '/wp-content/themes/trydus/inc/demo-contents/previews/portfolio.png',
            'import_notice' => __('After you import this demo, you will have to setup the nav menu.', 'trydus'),
            'preview_url' => 'https://finestdevs.com/demos/wp/trydus/',
        ),
    );
}
add_filter('pt-ocdi/import_files', 'trydus_import_files');


function ocdi_after_import($selected_import)
{    


    // Assign front page and posts page (blog page).
    if ('Factory' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Factory');
    } elseif ('Oil Industry' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Oil Industry');
    } elseif ('Chemical Factory' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Chemical Factory');
    } elseif ('Solar Energy' === $selected_import['import_file_name']) {
        $front_page_id = get_page_by_title('Solar Energy');
    }else{
        $front_page_id = get_page_by_title('Factory');
    }



    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
    ));
    
    $blog_page_id  = get_page_by_title('Blog');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

    update_option('elementor_scheme_color', array('#161c2d', '#161c2d', '#6E727D', '#473bf0'));
    $elem_clear_cache = new\Elementor\Core\Files\Manager();
    $elem_clear_cache->clear_cache();



    //Import Revolution Slider
    if ( class_exists( 'RevSlider' ) ) {
        $slider_array = array(
            get_template_directory()."/inc/demo-contents/revslider/home-1.zip",
            );

        $slider = new RevSlider();

        foreach($slider_array as $filepath){
            $slider->importSliderFromPost(true,true,$filepath);  
        }

    }
}
add_action('pt-ocdi/after_import', 'ocdi_after_import');
