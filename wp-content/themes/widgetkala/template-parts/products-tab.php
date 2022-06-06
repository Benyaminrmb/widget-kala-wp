<?php
/** @var array $args */
$section_title = $args['section_title'];
$categories = $args['categories'];
$archive_link = $args['archive_link'];
$query_params = $args['query_params'];
$container_class = wp_parse_args((array)$args['container_class'],['container','mx-auto','px-4','sm:px-6','lg:px-8','product-section-container']);

$container_class = implode(' ',$container_class);

?>
<div class="<?php echo esc_attr($container_class);?>">
    <?php
    if ($categories) : ?>
        <div class="w-full">
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-10 flex gap-x-5"><span class="horizontalLines"></span>
                    <div class="flex text-gray-600 section-title"><?php echo esc_attr($section_title);?></div>
<!--                    <div class="relative after:w-0.5 after:absolute after:bg-gray-600 after:h-6 after:left-0 after:top-1"></div>-->
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
                <?php if ($archive_link) { ?>
                    <div class="col-span-2 justify-end flex">
                        <a href="<?php echo esc_url($archive_link['url']); ?>"
                           target="<?php echo esc_attr($archive_link['target']); ?>"
                           class="custom-btn-secondary-outline"><?php echo esc_attr($archive_link['title']); ?></a>
                    </div>
                <?php } ?>
            </div>
            <?php foreach ($categories as $key => $cat) :
                $tax_query = [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'id',
                        'terms'    => [$cat['value']],
                        'operator' => 'IN',
                    ]
                ];
                ?>
                <div id="product-tabs-content-<?php echo $cat['value']; ?>"
                     class="product-tabs-content<?php echo ($key == 0) ? ' active' : ''; ?>">
                    <?php
                    $query_params['tax_query'] = $tax_query;
                    $products = new WP_Query($query_params);
                    if($products->have_posts()):
                        while ($products->have_posts()) {
                            $products->the_post();
                            wc_get_template_part('content', 'product');
                        }
                        wp_reset_postdata();
                    else: ?>
                    <div class="col-span-12 relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                        <p><?php _e('متاسفانه محصولی یافت نشد','widgetize');?></p>
                    </div>

                    <?php endif;
                    ?>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    <?php endif; ?>
</div>
