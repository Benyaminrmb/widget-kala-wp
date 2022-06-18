<?php
global $product;

$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();
if (!$post_thumbnail_id) {
    return;
}
//wc_placeholder_img_src( 'woocommerce_single' )
?>
<div class="owl-carousel owl-theme owl-posts">
    <div class="item"><?php echo wp_get_attachment_image($post_thumbnail_id, 'full', false, ['class' => 'rounded-five overflow-hidden w-full']); ?></div>
    <?php if ($attachment_ids && $product->get_image_id()) {
        foreach ($attachment_ids as $attachment_id) { ?>
            <div class="item"><?php echo wp_get_attachment_image($attachment_id, 'full', false, ['class' => 'rounded-five overflow-hidden w-full']); ?></div>
        <?php }
    } ?>
</div>