<?php get_header();
$current_cat = get_queried_object();
$image_id = get_term_meta($current_cat->term_id, 'thumbnail_id', true);
?>
    <div class="grid grid-cols-12 gap-x-5">
        <div class="col-span-12 mt-7">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-x-5 gap-y-10 grid-cols-12">
                    <div class="col-span-3 flex flex-wrap">
                        <div class="w-full flex h-full">
                            <?php echo wp_get_attachment_image($image_id, 'medium', false,
                                ['class' => 'w-full h-full border rounded-lg']); ?>
                        </div>
                    </div>
                    <div class="col-span-9 gap-5 flex flex-wrap flex-col justify-between">
                        <?php
                        $children_categories = get_terms([
                            'taxonomy' => 'product_cat', 'parent' => $current_cat->term_id, 'hide_empty' => false,
                            'order_by' => 'name'
                        ]);
                        if ($children_categories) {
                            ?>
                            <ul class="flex flex-wrap gap-x-3 gap-y-1 w-full">
                                <?php foreach ($children_categories as $category) { ?>
                                    <li>
                                        <?php ?>
                                        <a href="<?php echo get_term_link($category); ?>"
                                           class="btn-custom-outline-dark-blue">
                                            <?php echo $category->name ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <div class="relative w-full flex flex-wrap border border-customGray rounded-md p-5">
                            <div class="flex flex-wrap gap-4 w-full justify-center">
                                <h1 class="category-title"><?php woocommerce_page_title(); ?></h1>
                                <div class="flex w-full">
                                    <div class="category-description">
                                        <?php echo $current_cat->description; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="scroll-to-products"><?php mt_svg_icon('arrow_down', [8, 11]) ?></a>
                        </div>
                    </div>

                    <div class="col-span-3 block flex-wrap">
                        <div class="w-full flex flex-wrap border border-customDarkWhite rounded-md">
                            <div class="flex w-full bg-customLightblue p-3 px-12">
                                <span class="darkHorizontalLines text-white">فیلتر ها</span>
                            </div>
                            <div class="flex flex-wrap p-3 py-4">
                                <div class="flex w-full justify-between border-b pb-4">
                                <span class="flex text-customGray">
                                  جستجو کنید
                                </span>
                                    <span class="flex">+</span>
                                </div>
                                <div class="flex mt-3 flex-wrap w-full">
                                    <div class="flex w-full">برند ها</div>
                                    <div class="flex mt-3 w-full">
                                        <label for="search-brand-input" class="sr-only"><?php _e('برند خود را جستجو کنید', 'widgetize'); ?></label>
                                        <input id="search-brand-input" placeholder="برند خود را جستجو کنید" class="p-2 text-gray-600 w-full border rounded-md"/>
                                    </div>
                                    <?php $brands = mt_wc_get_brands();
                                    if ($brands){ ?>
                                    <div class="flex flex-wrap mt-3 w-full pb-4 border-b">
                                        <div class="flex flex-wrap w-full gap-y-2 overflow-y-scroll h-280 thin-scrollbar px-2">
                                            <?php foreach ($brands as $brand) { ?>
                                                <div class="flex w-full justify-between items-center flex-wrap">
                                                    <div class="flex gap-x-2 items-center">
                                                        <div class="flex">
                                                            <input id="brand-checkbox-<?php echo $brand->term_id ?>" value="<?php echo $brand->term_id; ?>" type="checkbox" class="w-4 h-4"/>
                                                        </div>
                                                        <label class="flex" for="brand-checkbox-<?php echo $brand->term_id ?>"><?php echo $brand->name; ?></label>
                                                    </div>
                                                    <div class="flex">
                                                        <span class="text-gray-600 text-xs"><?php echo $brand->slug; ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="flex border-b border-customDarkWhite pb-3 mt-3 w-full">
                                        <div class="flex w-full justify-between items-center flex-wrap">
                                            <span class="flex text-customGray">آیتم‌های موجود</span>
                                            <div class="flex">
                                                <label for="toggleA" class="cursor-pointer">
                                                    <span class="relative">
                                                        <input type="checkbox" id="toggleA" class="sr-only"/>
                                                        <span class="block parent bg-customLightgray2 w-14 h-7 rounded-md"></span>
                                                        <span class="dot absolute left-1 top-1 bg-customGray w-5 h-5 rounded-full transition"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex mt-3 w-full">
                                        <div class="flex w-full justify-between items-center flex-wrap">
                                            <span class="flex text-customGray">آیتم‌های تخفیف دار</span>
                                            <div class="flex">
                                                <label for="toggleB" class="cursor-pointer">
                                                    <span class="relative">
                                                        <input type="checkbox" id="toggleB" class="sr-only"/>
                                                        <span class="block parent bg-customLightgray2 w-14 h-7 rounded-md"></span>
                                                        <span class="dot absolute left-1 top-1 bg-customGray w-5 h-5 rounded-full transition"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-9 gap-5 flex flex-wrap flex-col">
                        <?php do_action('mt_wc_cat_header');?>
                    <?php if ( woocommerce_product_loop() ) {

                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_before_shop_loop - 30
                     */

                    do_action('woocommerce_before_shop_loop');

                    woocommerce_product_loop_start();

    if (wc_get_loop_prop('total')) {
        while (have_posts()) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action('woocommerce_shop_loop');

            wc_get_template_part('content', 'product');
        }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
}
                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();