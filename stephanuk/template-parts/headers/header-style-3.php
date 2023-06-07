<?php
$has_sticky_logo = (!empty(trydus_get_site_sticky_logo())) ? 'has-sticky-logo' : '';
$has_site_logo =   (!empty(trydus_get_site_logo())) ? 'has-site-logo' : '';

?>
<header class="trydus-header-style-3 trydus-header-area <?php echo trydus_get_navbar_scheme() ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 col-6">
                <div class="site-branding <?php echo esc_attr($has_sticky_logo) . ' ' . esc_attr($has_site_logo)  ?>">
                    <a href="<?php echo esc_url(home_url()) ?>">
                        <?php
                        echo trydus_get_site_logo();
                        echo trydus_get_site_sticky_logo();
                        ?>
                    </a>
                </div><!-- .site-branding -->
            </div>
            <?php if (!is_page_template('page-templates/template-coming-soon.php') &&  !is_page_template('page-templates/template-login.php')) : ?>
                <div class="col-md-9 col-6 text-center">
                    <div class="trydus-mobile-menu"></div>
                    <nav id="site-navigation" class="main-navigation d-flex align-items-center justify-content-end">
                        <?php
         				    if( has_nav_menu('main-menu') ) {
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'navbar-nav',
                                        'menu_id' => 'navbar-nav',
                                    )
                                );
                            }

                        ?>
                        <div class="trydus-login-btn-wrap d-none d-lg-block">
                            <?php echo trydus_get_header_buttons(); ?>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>