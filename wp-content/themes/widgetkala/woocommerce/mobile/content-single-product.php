<?php
global $product;
?>
<div class="mobile-single-product">
    <h1 class="product-title"><?php echo $product->get_title() ?></h1>
    <h2 class="product-subtitle"><?php the_field('subtitle', $product->get_id()); ?></h2>
    <?php wc_get_template_part('mobile/product-gallery');
    wc_get_template_part('single-product/top-categories'); ?>
    <div class="mt-4 flex justify-between">
        <div class="product-rating">
            <?php do_action('mt_wc_template_single_rating'); ?>
        </div>
        <div class="product-sharing">
            <?php do_action('mt_wc_template_single_sharing'); ?>
        </div>
    </div>

    <?php
    remove_action('mt_wc_template_single_add_to_cart', 'woocommerce_template_single_excerpt', 10);
    do_action('mt_wc_template_single_add_to_cart');

    wc_get_template_part('mobile/product-tabs');
    ?>

</div>
