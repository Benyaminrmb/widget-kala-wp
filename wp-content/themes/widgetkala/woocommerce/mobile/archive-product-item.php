<?php global $product; ?>
<div class="archive-product-item">
    <div class="item-title">
        <a href="<?php echo $product->get_permalink() ?>">
            <?php echo $product->get_image('mobile_product_archive', ['class' => 'w-full archive-image', 'alt' => $product->get_title()]) ?>
        </a>
        <h4 class="product-title">
            <a href="<?php echo $product->get_permalink() ?>">
                <?php echo $product->get_title(); ?>
            </a>
        </h4>
    </div>
    <div class="item-price">
        <?php echo $product->get_price_html(); ?>
    </div>
</div>
