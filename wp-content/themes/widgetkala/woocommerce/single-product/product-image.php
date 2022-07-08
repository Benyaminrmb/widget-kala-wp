<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

global $product;

$post_thumbnail_id = $product->get_image_id();
$attachment_ids    = $product->get_gallery_image_ids();
if ( ! $post_thumbnail_id) {
    return;
}
?>
<div class="woocommerce-product-gallery images">
    <figure class="woocommerce-product-gallery__wrapper">
        <div class="product-image">
            <div class="slider-container">
                <div id="slider" class="slider owl-carousel">
                    <div class="item">
                        <div class="content">
                            <a class="fancybox" rel="group" href="<?php echo wp_get_attachment_image_src($post_thumbnail_id, 'full')[0] ?>" data-fancybox="gallery" data-caption="<?php the_title_attribute(); ?>">
                                <?php echo wp_get_attachment_image($post_thumbnail_id, 'full', false, ['class' => 'rounded-five overflow-hidden w-full zoom']); ?>
                            </a>
                        </div>
                    </div>
                    <?php foreach ($attachment_ids as $attachment_id) { ?>
                        <div class="item">
                            <div class="content">
                                <a class="fancybox" rel="group" href="<?php echo wp_get_attachment_image_src($attachment_id, 'full')[0]; ?>" data-fancybox="gallery" data-caption="<?php the_title_attribute(); ?>">
                                    <?php echo wp_get_attachment_image($attachment_id, 'full', false, ['class' => 'rounded-five overflow-hidden w-full zoom']); ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="thumbnail-slider-container">
                <div id="thumbnailSlider" class="thumbnail-slider owl-carousel columns-3">
                    <div class="item">
                        <div class="content">
                            <?php echo wp_get_attachment_image($post_thumbnail_id, 'thumbnail', false, ['class' => 'rounded-five overflow-hidden w-full']); ?>
                        </div>
                    </div>
                    <?php foreach ($attachment_ids as $attachment_id) { ?>
                        <div class="item">
                            <div class="content">
                                <?php echo wp_get_attachment_image($attachment_id, 'thumbnail', false, ['class' => 'rounded-five overflow-hidden w-full']); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </figure>
</div>
