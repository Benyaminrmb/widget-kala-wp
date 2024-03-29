<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && $product->get_image_id() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}
}
?>
<div class="product-image">
    <div class="slider-container">
        <div id="slider" class="slider owl-carousel">
            <div class="item">
                <div class="content">
                    <a class="fancybox" rel="group" href="https://adak.shop/wp-content/uploads/2020/05/20VE-1.jpg"  data-fancybox="gallery">
                        <img src="https://adak.shop/wp-content/uploads/2020/05/20VE-1.jpg" class="zoom">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="thumbnail-slider-container">
        <div id="thumbnailSlider" class="thumbnail-slider owl-carousel columns-3">
            <div class="item">
                <div class="content">
                    <img src="https://adak.shop/wp-content/uploads/2020/05/20VE-1.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-2.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-3.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-4.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-6.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-7.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-8.jpg" width="100" height="100"></div></div><div class="item"><div class="content"><img src="https://adak.shop/wp-content/uploads/2020/05/20VE-9.jpg" width="100" height="100"></div></div>        </div>
    </div>
</div>
