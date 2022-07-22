<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
global $post;
$product = wc_get_product($post);
?>
    <div class="product-main-category top-categories">
        <?php
        echo get_the_term_list($product->get_id(), 'product_brand', '<span class="posted_in brand">' . __('برند: ', 'widgetize'), ',', '</span>');
        echo wc_get_product_category_list($product->get_id(), ',', '<span class="posted_in categories">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . '<span class="category-list">', '</span></span>');
        ?>
        <span class="posted_in post-id">
        کد محصول:
      <a><?php the_ID(); ?></a>
    </span>
    </div>
<?php