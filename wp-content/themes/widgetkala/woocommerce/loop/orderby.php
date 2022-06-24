<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}
$cur_order = isset($_GET['orderby']) ? $_GET['orderby'] : '';
$catalog_orderby_options = apply_filters(
    'woocommerce_catalog_orderby',
    array(
        'price' => __('ارزان ترین', 'widgetize'),
        'price-desc' => __('گران ترین', 'widgetize'),
        'rating' => __('پرفروش ترین', 'widgetize'),
        'popularity' => __('محبوب ترین', 'widgetize'),
    )
);
?>
    <div class="hidden md:flex items-center gap-x-3">
        <?php ?>
        <span class="flex">
        <?php mt_svg_icon('orderby'); ?>
    </span>
        <span class="flex">مرتب سازی :</span>
        <ul class="flex gap-x-5 text-xs text-customLighterMediumGray">
            <?php
            foreach ($catalog_orderby_options as $id => $name) :
                ?>
                <li>
                    <a href="<?php echo ($id != $cur_order) ? add_query_arg(['paged' => 1, 'orderby' => esc_attr($id)]) : '#'; ?>"><?php echo esc_html($name); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php if (wp_is_mobile()) { ?>
    <label class="orderby-container orderby-button" for="orderby"><?php mt_svg_icon('orderby'); ?>
        <select name="orderby" id="orderby">
            <option value="">مرتب سازی </option>
            <?php
            foreach ($catalog_orderby_options as $id => $name) : ?>
                <option value="<?php echo esc_attr($id) ?>"><?php echo esc_html($name); ?></option>
            <?php endforeach; ?>
        </select>

    </label>
<?php }