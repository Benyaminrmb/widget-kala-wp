<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}

    if (function_exists('wp_pagenavi')){
        mt_pagination();
//        function wp_corenavi() {
//            global $wp_query, $wp_rewrite;
//            $pages = '';
//            $max = $wp_query->max_num_pages;
//            if (!$current = get_query_var('paged')) $current = 1;
//            $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
//            $a['total'] = $max;
//            $a['current'] = $current;
//
//            $total = 1; //1 - display the text "Page N of N", 0 - not display
//            $a['mid_size'] = 5; //how many links to show on the left and right of the current
//            $a['end_size'] = 1; //how many links to show in the beginning and end
//            $a['prev_text'] = '&laquo; Previous'; //text of the "Previous page" link
//            $a['next_text'] = 'Next &raquo;'; //text of the "Next page" link
//
//            if ($max > 1) echo '<div class="navigation">';
//            if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
//            echo $pages . paginate_links($a);
//            if ($max > 1) echo '</div>';
//        }

    }else {
        echo paginate_links(
            apply_filters(
                'woocommerce_pagination_args',
                array( // WPCS: XSS ok.
                    'base' => $base,
                    'format' => $format,
                    'add_args' => false,
                    'current' => max(1, $current),
                    'total' => $total,
                    'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                    'next_text' => is_rtl() ? '&larr;' : '&rarr;',
//				'type'      => '',
                    'end_size' => 3,
                    'mid_size' => 3,
                    'before_page_number' => '<div class="flex justify-center items-center border border-customDarkWhite rounded-md p-3 gap-3">',
                    'after_page_number' => '</div>'
                )
            )
        );
    }
//    var_dump($paginations);
	?>
