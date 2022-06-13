<div class="product-main-category">


    <?php
    /**
     * Single product short description
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see     https://docs.woocommerce.com/document/template-structure/
     * @package WooCommerce\Templates
     * @version 3.3.0
     */

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
    }

    global $post;
    $product = wc_get_product($post);

    ?>
    <span class="posted_in">
        برند:
       <?php echo get_the_term_list(get_the_id(), 'product_brand'); ?>
    </span>

    <span class="posted_in">
        کد محصول:
      <a><?php echo get_the_id(); ?></a>
    </span>

    <?php
    echo wc_get_product_category_list($product->get_id(), ',', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>');

    echo wc_get_product_tag_list($product->get_id(), '', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>');

    $short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);

    if (!$short_description) {
        return;
    }

    ?>


</div>
<div class="woocommerce-product-details__short-description">
    <?php echo $short_description; // WPCS: XSS ok. ?>
</div>
