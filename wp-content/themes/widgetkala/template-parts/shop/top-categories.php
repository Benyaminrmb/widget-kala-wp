<?php
$page_id = get_option('woocommerce_shop_page_id');
$top_categories = get_field('top_categories_list', $page_id);
?>
<div class="container shop-top-categories-container">
    <?php if ($top_categories) { ?>
        <ul class="categories-list">
            <?php foreach ($top_categories as $category) {
                $cat = get_term($category);
                ?>
                <li>
                    <?php ?>
                    <a href="<?php echo get_term_link($cat); ?>"
                       class="item">
                        <?php echo $cat->name ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
