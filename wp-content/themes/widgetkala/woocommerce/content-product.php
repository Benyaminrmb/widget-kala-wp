<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$col_class = '';
if (is_shop() || is_front_page() || is_singular('product')) {
    $col_class = 'col-span-3';
} else {
    $col_class = 'col-span-4';
}
?>
<div <?php wc_product_class(['single-product-item', 'group', $col_class], $product); ?>>
    <div class="w-full flex">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full rounded-lg">
        </a>
    </div>
    <div class="flex">
        <h3 class="text-customDarkblue cursor-pointer text-base font-light leading-7">
            <a href="<?php the_permalink(); ?>">
                <?php echo $product->get_title(); ?>
            </a>
        </h3>
    </div>
    <?php echo(get_the_term_list(get_the_ID(), 'product_brand', '<div class="mb-7 flex cursor-pointer text-orange-500 text-xs justify-end w-full">', '&nbsp;,&nbsp;', '</div>')); ?>
    <?php
    if ($product->get_regular_price() != $product->get_price()) { ?>
        <div class="flex line-through text-gray-700 text-xl w-full">
            <span data-after="<?php echo esc_attr(get_woocommerce_currency_symbol()); ?>" class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative">
                <?php echo $product->get_regular_price(); ?>
            </span>
        </div>
    <?php }
    ?>
    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full">
        <span data-after="<?php echo esc_attr(get_woocommerce_currency_symbol()) ?>" class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative">
            <?php echo $product->get_price(); ?>
        </span>
        <?php
        $regular_price = (float)$product->get_regular_price();
        $sale_price = (float)$product->get_sale_price();
        if ($sale_price != 0 || !empty($sale_price)) {
            $percentage = round(100 - ($sale_price / $regular_price * 100)) . '%';
            ?>
            <div class="px-2 py-1 bg-customLightGray text-xs rounded">
                <?php echo $percentage; ?>
            </div>
        <?php }
        do_action('woocommerce_after_shop_loop_item'); ?>
    </div>
</div>
<?php
//	/**
//	 * Hook: woocommerce_before_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_open - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item' );
//
//	/**
//	 * Hook: woocommerce_before_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_show_product_loop_sale_flash - 10
//	 * @hooked woocommerce_template_loop_product_thumbnail - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_product_title - 10
//	 */
//	do_action( 'woocommerce_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_rating - 5
//	 * @hooked woocommerce_template_loop_price - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_close - 5
//	 * @hooked woocommerce_template_loop_add_to_cart - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop_item' );
//	?>
