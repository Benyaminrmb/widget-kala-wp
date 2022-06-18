<?php
$product_tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($product_tabs)) {
    ?>
    <div class="mobile-product-tabs">
        <?php foreach ($product_tabs as $key => $product_tab) : ?>
            <div class="product-tab">
                <div class="tab-title">
                <span class="tab-icon">
                    <?php mt_svg_icon('product_tab_' . $key); ?>
                </span>
                    <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                </div>
                <div class="tab-content">
                    <?php
                    if (isset($product_tab['callback'])) {
                        call_user_func($product_tab['callback'], $key, $product_tab);
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php }