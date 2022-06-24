<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- styles -->
    <?php wp_head(); ?>
</head>
<?php $body_class = (wp_is_mobile()) ? 'is-mobile' : ''; ?>
<body <?php body_class($body_class); ?>>
<div class="grid grid-cols-12 gap-x-5">
    <header class="col-span-12">
        <nav aria-label="Top" class="container mx-auto px-4 sm:px-6 lg:px-8 nav-container">
            <div class="md:grid flex justify-between md:grid-cols-12 flex-wrap py-5 items-center">
                <div class="menu-toggle">
                    <?php echo mt_svg_icon('menu_toggle'); ?>
                </div>
                <div class="col-span-2 flex-wrap flex logo-container">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                </div>
                <div class="col-span-5 flex-wrap flex hidden md:block md:-ml-2.5">
                    <?php get_search_form(); ?>
                </div>
                <div class="col-span-5 justify-end gap-x-2 flex-wrap flex">
                    <div class="relative inline-flex">
                        <?php if (WC()->cart->get_cart_contents_count()) { ?>
                            <a href="<?php echo wc_get_cart_url(); ?>" class="cart-button gap-x-4">
                                <span class="md:flex hidden"><?php wc_cart_totals_subtotal_html(); ?></span>
                                <span class="icon flex relative text-customDarkblue md:text-white icon-trolley">
<span class="cart-count-badge">
                     <span class="animate"></span>
                     <span class="count">
	                     <span class="w-full text-xs"><?php echo WC()->cart->get_cart_contents_count() ?></span></span></span>

                                </span>


                            </a>
                        <?php } else { ?>
                            <a href="<?php echo get_permalink(wc_get_page_id('shop')) ?>" class="cart-button gap-x-4">
                                <span class="md:flex hidden">همین الان خرید کنید</span>
                                <span class="btn-cart-icon icon icon-trolley basket-logo"></span>
                            </a>

                        <?php } ?>
                    </div>
                    <a class="register-button md:inline-flex hidden"
                       href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <?php if (!is_user_logged_in()) { ?>
                            ورود | ثبت نام
                        <?php } else { ?>
                            حساب کاربری
                        <?php } ?>
                        <span class="icon text-3xl text-gray-500 icon-profile"></span></a>
                </div>
            </div>
        </nav>
    </header>
    <div class="col-span-12 flex px-4 justify-between container mx-auto md:hidden">
        <?php get_search_form(); ?>
    </div>
    <div class="menu-section md:flex hidden">
        <div class="container">
            <div class="grid grid-cols-12 justify-between">
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => '',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'navbar-nav main-menu',
                        'menu_id' => 'main-menu',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker(),
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ]
                );
                if (have_rows('header_options', 'options')) {
                    while (have_rows('header_options', 'options')) {
                        the_row();
                        $major_buy_link = get_sub_field('major_buy_link');
                        if ($major_buy_link) {
                            ?>
                            <div class="major-shopping-container">
                                <a href="<?php echo esc_url($major_buy_link['url']); ?>"
                                   class="major-shopping"><?php echo esc_attr($major_buy_link['title']); ?></a>
                            </div>
                        <?php }
                    }
                } ?>
            </div>
        </div>
    </div>

    <div class="mobile-menu-section menu-section">
        <div class="container p-4">
            <div class="flex justify-between gap-3">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <button type="button" class="navbar-close">
                    <?php echo mt_svg_icon('close'); ?>
                </button>
            </div>
        </div>
        <div class="container py-3 max-h-full thin-scrollbar overflow-auto">
            <?php
            wp_nav_menu(
                [
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'navbar-nav mobile-menu',
                    'menu_id' => 'main-menu',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ]
            );
            ?>
        </div>
        <div class="container p-4">
            <div class="flex justify-center gap-4">
                <?php
                $register = wp_registration_url();
                $login = wp_login_url(mt_current_URL());
                if (!is_user_logged_in()) {
                    ?>
                    <a href="<?php echo esc_url($login); ?>" class="login-button"><?php _e('ورود', 'widgetize'); ?></a>
                    <a href="<?php echo esc_url($register); ?>" class="register-button"><?php _e('ثبت نام', 'widgetize'); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url($login); ?>" class="profile-button"><?php _e('حساب کاربری', 'widgetize'); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="mobile-menu-backdrop"></div>

    <div class="col-span-12 mt-7">