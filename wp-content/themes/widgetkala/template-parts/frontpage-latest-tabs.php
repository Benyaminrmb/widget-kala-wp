<?php
$page_id    = get_option('page_on_front');
$categories = get_field('latest_product_categories', $page_id);
if($categories){

?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="w-full">
        <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
            <div class="col-span-10 flex gap-x-5"><span class="flex"><span class="icon text-3xl icon-shield"></span></span>
                <div class="flex text-gray-600 text-2xl">جدیدترین ها</div>
                <div class="relative after:w-0.5 after:absolute after:bg-gray-600 after:h-6 after:left-0 after:top-1"></div>
                <ul class="tabs">
                    <?php
                    foreach ($categories as $k => $category) {
                        ?>
                        <li class="product-category-tab<?php if ($k == 0) {
                            echo ' active';
                        } ?>">
                            <button data-category-id="<?php echo esc_attr($category['value']); ?>"><?php echo $category['label']; ?></button>
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>
            <?php if ($best_seller_link = get_field('latest_button_link')) { ?>
                <div class="col-span-2 justify-end flex">
                    <a href="<?php echo esc_url($best_seller_link['url']); ?>"
                       target="<?php echo esc_attr($best_seller_link['target']); ?>"
                       class="custom-btn-secondary-outline"><?php echo esc_attr($best_seller_link['title']); ?></a>
                </div>
            <?php } ?>
        </div>
        <?php foreach ($categories as $key => $cat) : ?>
            <div id="product-tabs-content-<?php echo $cat['value']; ?>" class="product-tabs-content<?php echo ($key == 0)?' active': ''; ?>">
                <?php
                $products = new WP_Query([
                    'post_type'      => 'product',
                    'posts_per_page' => '4',
                    'tax_query'      => [
                        [
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => [$cat['value']], /*category id*/
                            'operator' => 'IN',
                        ]
                    ],
                ]);
                while ($products->have_posts()) {
                    $products->the_post();
                    wc_get_template_part('content', 'product');
                }
                wp_reset_postdata(); ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php ?>
</div>
<?php }