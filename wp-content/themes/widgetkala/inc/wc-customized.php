<?php
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action( 'pre_get_posts', 'mt_pre_get_products_query',99 );

function mt_pre_get_products_query( $query ) {
    $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
//    echo $per_page;die();
    if( /*$query->is_main_query() &&*/ !is_admin() /*&& is_post_type_archive( 'product' )*/ ){
//        echo 'test';
        $query->set( 'posts_per_page', $per_page );
    }
//    echo get_query_var('posts_per_page');
}

if ( ! function_exists('mt_wc_cat_header_start') ){
    add_action('mt_wc_cat_header', 'mt_wc_cat_header_start', 10);
    function mt_wc_cat_header_start()
    {
        echo '<div class="flex w-full justify-between">';
    }
}

if ( ! function_exists('mt_wc_cat_header_end') ){
    add_action('mt_wc_cat_header', 'mt_wc_cat_header_end', 50);
    function mt_wc_cat_header_end()
    {
        echo '</div>';
    }
}

add_action('mt_wc_cat_header','woocommerce_catalog_ordering',20);
add_action('mt_wc_cat_header','woocommerce_result_count',30);
