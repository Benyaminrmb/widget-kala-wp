<?php
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-slider');
add_theme_support('wc-product-gallery-lightbox');

add_action('pre_get_posts', 'mt_pre_get_products_query', 99);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


add_action('woocommerce_share', 'show_mt_sharing_links', 10);
//add_action('mt_wc_template_single_sharing','show_mt_sharing_links',5);
//add_action('mt_wc_single_product_title','woocommerce_template_single_title',5);
add_action('mt_wc_template_single_title', 'woocommerce_template_single_title', 5);
add_action('mt_wc_template_single_rating', 'woocommerce_template_single_rating', 10);
add_action('mt_wc_template_single_price', 'woocommerce_template_single_price', 10);
//add_action('woocommerce_before_add_to_cart_button', 'woocommerce_template_single_price', 10);
add_action('mt_wc_template_single_top_categories', 'mt_wc_template_single_top_categories', 10);
add_action('mt_wc_template_single_add_to_cart', 'woocommerce_template_single_excerpt', 10);
add_action('mt_wc_template_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 20);
add_action('mt_wc_template_single_sharing', 'show_mt_product_like_button', 40);
add_action('mt_wc_template_single_sharing', 'woocommerce_template_single_sharing', 50);
add_action('mt_wc_template_single_meta', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_after_add_to_cart_form', 'mt_wc_template_single_add_to_cart_footer_logo', 10);

if (!function_exists('mt_reorder_tabs')) {
    add_filter('woocommerce_product_tabs', 'mt_reorder_tabs', 98);
    function mt_reorder_tabs($tabs)
    {
        $tabs['description']['title'] = __('بررسی محصول', 'widgetize');
        $tabs['description']['priority'] = 20;
        $tabs['additional_information']['priority'] = 10;
        $tabs['additional_information']['title'] = __('ویژگی محصول', 'widgetize');

        return $tabs;
    }
}

if (!function_exists('mt_wc_template_single_add_to_cart_footer_logo')) {
    function mt_wc_template_single_add_to_cart_footer_logo()
    {
        wc_get_template('single-product/add-to-cart/footer-logo.php');
    }
}

if (!function_exists('mt_wc_template_single_top_categories')) {
    function mt_wc_template_single_top_categories()
    {
        wc_get_template('single-product/top-categories.php');
    }
}

function mt_pre_get_products_query($query)
{
    $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
//    echo $per_page;die();
    if ($query->is_main_query() && !is_admin() && is_post_type_archive('product')) {
//        echo 'test';
        $query->set('posts_per_page', $per_page);
    }
//    echo get_query_var('posts_per_page');
}

if (!function_exists('mt_wc_cat_header_start')) {
    add_action('mt_wc_cat_header', 'mt_wc_cat_header_start', 10);
    function mt_wc_cat_header_start()
    {
        echo '<div class="flex w-full justify-between gap-2.5">';
    }
}

if (!function_exists('mt_wc_cat_header_end')) {
    add_action('mt_wc_cat_header', 'mt_wc_cat_header_end', 50);
    function mt_wc_cat_header_end()
    {
        echo '</div>';
    }
}

add_action('mt_wc_cat_header', 'woocommerce_catalog_ordering', 20);
add_action('mt_wc_cat_header', 'woocommerce_result_count', 30);
