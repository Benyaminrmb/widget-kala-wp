<?php get_header();
get_template_part('template-parts/frontpage-top-advertises'); ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php
if ( have_rows( 'front_page_options', 'options' ) ) {
    while (have_rows('front_page_options', 'options')):
        the_row();
        $categories = get_sub_field('frontpage_sales_categories');
        ?>
        <div class="w-full">
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-10 flex gap-x-5"><span class="flex"><span class="icon text-3xl icon-shield"></span></span>
                    <div class="flex text-gray-600 text-2xl">پرفروش ترین ها</div>
                    <div class="relative after:w-0.5 after:absolute after:bg-gray-600 after:h-6 after:left-0 after:top-1"></div>
                    <ul class="tabs">
                        <?php
                        foreach ($categories as $k=> $category) {
                            ?>
                            <li <?php if($k == 0){echo 'class="active"';} ?>>
                                <button data-id="<?php esc_attr($category['value']); ?>"><?php echo $category['label'];?></button>
                            </li>
                        <?php }
                         ?>
                    </ul>
                </div>
                <div class="col-span-2 justify-end flex">
                    <a href="" class="custom-btn-secondary-outline">
                        همه محصولات را ببینید
                    </a>
                </div>
            </div>
            <div class="product-tabs-content">
                <?php
                $products = new WP_Query([
                    'post_type' => 'product',
                    'per_page' => '4',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => ['17'], /*category id*/
                            'operator' => 'IN',
                        )
                    ),
                ]);
                while ($products->have_posts()) {
                    $products->the_post();
                    wc_get_template_part('content','product');
                }
                wp_reset_postdata(); ?>
            </div>
        </div>
    <?php
    endwhile;
} ?>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-10 flex gap-x-5"><span class="flex"><span class="icon text-3xl icon-shield"></span></span>
                    <div class="flex text-gray-600 text-2xl">پرفروش ترین ها</div>
                    <div class="relative after:w-0.5 after:absolute after:bg-gray-600 after:h-6 after:left-0 after:top-1"></div>
                    <ul class="tabs">
                        <li class="active">
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 justify-end flex">
                    <button class="custom-btn-secondary-outline">
                        همه محصولات را ببینید
                    </button>
                </div>
            </div>
            <div class="product-tabs-content">
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-customDarkblue my-7 w-full">
        <div class="container p-14 mx-auto px-5 sm:px-6 lg:px-8"><h3 class="text-2xl text-white">برند ها</h3>
            <div class="mt-7 grid gap-x-5 grid-cols-6">
                <div class="col-span-1 flex flex-wrap transition duration-150 group transform"><img
                            src="/_nuxt/img/adv1.d41b13d.png" alt
                            class="w-full grayscale flex rounded-md group-hover:grayscale-0"></div>
                <div class="col-span-1 flex flex-wrap transition duration-150 group transform"><img
                            src="/_nuxt/img/adv2.330a155.png" alt
                            class="w-full grayscale flex rounded-md group-hover:grayscale-0"></div>
                <div class="col-span-1 flex flex-wrap transition duration-150 group transform"><img
                            src="/_nuxt/img/adv3.152950c.png" alt
                            class="w-full grayscale flex rounded-md group-hover:grayscale-0"></div>
                <div class="col-span-1 flex flex-wrap transition duration-150 group transform"><img
                            src="/_nuxt/img/adv4.cabd3d7.png" alt
                            class="w-full grayscale flex rounded-md group-hover:grayscale-0"></div>
                <div class="col-span-1 flex flex-wrap transition duration-150 group transform"><img
                            src="/_nuxt/img/adv5.cf35e66.png" alt
                            class="w-full grayscale flex rounded-md group-hover:grayscale-0"></div>
                <div class="col-span-1 flex flex-wrap transition duration-150 group transform"><img
                            src="/_nuxt/img/adv6.4c28a1a.png" alt
                            class="w-full grayscale flex rounded-md group-hover:grayscale-0"></div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-10 flex gap-x-5"><span class="flex"><span class="icon text-3xl icon-shield"></span></span>
                    <div class="flex text-gray-600 text-2xl">پرفروش ترین ها</div>
                    <div class="relative after:w-0.5 after:absolute after:bg-gray-600 after:h-6 after:left-0 after:top-1"></div>
                    <ul class="tabs">
                        <li class="active">
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 justify-end flex">
                    <button class="custom-btn-secondary-outline">
                        همه محصولات را ببینید
                    </button>
                </div>
            </div>
            <div class="product-tabs-content">
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-10 flex gap-x-5"><span class="flex"><span class="icon text-3xl icon-shield"></span></span>
                    <div class="flex text-gray-600 text-2xl">پرفروش ترین ها</div>
                    <div class="relative after:w-0.5 after:absolute after:bg-gray-600 after:h-6 after:left-0 after:top-1"></div>
                    <ul class="tabs">
                        <li class="active">
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                        <li>
                            <button>هدفون</button>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 justify-end flex">
                    <button class="custom-btn-secondary-outline">
                        همه محصولات را ببینید
                    </button>
                </div>
            </div>
            <div class="product-tabs-content">
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
                <div class="single-product-item group col-span-3">
                    <div class="w-full flex"><img src="/_nuxt/img/product1.1caab58.png" alt
                                                  class="w-full rounded-lg"></div>
                    <div class="flex"><h3
                                class="text-customDarkblue cursor-pointer text-base font-light leading-7"
                        >
                            لنز سوپر واید گوشی موبایل F30 0.3X Super Wide JSJSJSJSJSJSJSJs
                        </h3></div>
                    <div class="flex cursor-pointer text-orange-500 text-xs justify-end w-full"><a
                        >VIVU برند</a></div>
                    <div class="flex line-through text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] after:text-sm items-center after:left-0 relative"
                        >150،000</span></div>
                    <div class="flex gap-x-4 items-center justify-between text-gray-700 text-xl w-full"><span
                                data-after="هزار تومان"
                                class="after:content-[attr(data-after)] text-customLightblue after:text-sm items-center after:left-0 relative"
                        >150،000</span>
                        <div class="px-2 py-1 bg-customLightGray text-xs rounded">40%</div>
                        <div class="border-2 group-hover:bg-customDarkblue group-hover:text-white transition duration-150 items-center justify-center rounded-xl border-customDarkblue"
                        >
                            <button class="flex justify-center"><span
                                        class="icon justify-center w-10 flex text-4xl icon-trolley"
                                ></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-customLightblue my-7 w-full">
        <div class="container p-14 mx-auto px-5 sm:px-6 lg:px-8">
            <div class="grid gap-5 grid-cols-6"><img src="/_nuxt/img/category1.1786de5.png" alt=""
                                                     class="w-full flex rounded-md col-span-2"><img
                        src="/_nuxt/img/category2.1fa580d.png"
                        alt=""
                        class="w-full flex rounded-md col-span-2"><img
                        src="/_nuxt/img/category3.1786de5.png" alt="" class="w-full flex rounded-md col-span-2">
                <div class="btn-custom-white col-span-1 font-light bg-customDarkblue text-white"><a href="#">دسته بندی
                        محصولات</a></div>
                <div class="btn-custom-white col-span-1 font-light bg-white text-customDarkblue"><a href="#">دسته بندی
                        محصولات</a></div>
                <div class="btn-custom-white col-span-1 font-light bg-white text-customDarkblue"><a href="#">دسته بندی
                        محصولات</a></div>
                <div class="btn-custom-white col-span-1 font-light bg-white text-customDarkblue"><a href="#">دسته بندی
                        محصولات</a></div>
                <div class="btn-custom-white col-span-1 font-light bg-white text-customDarkblue"><a href="#">دسته بندی
                        محصولات</a></div>
                <div class="btn-custom-white col-span-1 font-light bg-white text-customDarkblue"><a href="#">دسته بندی
                        محصولات</a></div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-10 flex gap-x-5"><span class="flex"><span class="icon text-3xl icon-shield"></span></span>
                    <div class="flex text-gray-600 text-2xl">مقالات ما</div>
                </div>
                <div class="col-span-2 justify-end flex">
                    <button class="custom-btn-secondary-outline">
                        مقالات بیشتر را بخوانید
                    </button>
                </div>
            </div>
            <div class="grid mt-7 gap-7 grid-cols-3">
                <div class="flex col-span-1 relative">
                    <div class="flex w-full"><img src="/_nuxt/img/blog1.1055fb6.png" alt class="rounded-md w-full">
                    </div>
                    <div class="absolute rounded-md text-over-image bottom-0 text-center inset-x-0"><h2
                                class="text-white mb-2 text-xl"><a href="#">یک پست اختصاصی</a></h2>
                        <div class="flex justify-center"><span
                                    class="bg-white flex items-center px-2 crooked-line relative text-xl"><span
                                        class="flex">JANEBI</span> <span
                                        class="icon text-xl flex icon-book"></span></span></div>
                    </div>
                </div>
                <div class="grid gap-7 grid-rows-2 col-span-1 relative">
                    <div class="grid grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
                        <div class="grid justify-center text-xl font-thin items-center grid-rows-2 col-span-2 w-full h-full bg-customLightSky rounded-md">
                            <div class="flex h-full border-b-2 border-gray-100 row-span-1 items-center justify-center">
                                4
                            </div>
                            <div class="flex h-full row-span-1 items-center justify-center">
                                اردیبشهت
                            </div>
                        </div>
                        <div class="col-span-5 font-thin gap-4 flex flex-wrap">
                            <div class="w-full"><h2 class="text-base font-medium"><a href="#"> چگونه کیبورد بلوتوثی را
                                        به گوشی وصل کنیم؟ </a></h2></div>
                            <div class="w-full"><span class="text-justify text-sm">
        توضیحات در این بخش ایجاد می شود و میتواند یک خط توضیحات در این بخش
        ایجاد می شود و میتواند یک خط
      </span></div>
                            <div class="w-full justify-between flex">
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-file"></span> <span
                                            class="text-xs">اخبار روز</span></div>
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-clock"></span> <span class="text-xs">دقیقه مطالعه 14</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
                        <div class="grid justify-center text-xl font-thin items-center grid-rows-2 col-span-2 w-full h-full bg-customLightSky rounded-md">
                            <div class="flex h-full border-b-2 border-gray-100 row-span-1 items-center justify-center">
                                4
                            </div>
                            <div class="flex h-full row-span-1 items-center justify-center">
                                اردیبشهت
                            </div>
                        </div>
                        <div class="col-span-5 font-thin gap-4 flex flex-wrap">
                            <div class="w-full"><h2 class="text-base font-medium"><a href="#"> چگونه کیبورد بلوتوثی را
                                        به گوشی وصل کنیم؟ </a></h2></div>
                            <div class="w-full"><span class="text-justify text-sm">
        توضیحات در این بخش ایجاد می شود و میتواند یک خط توضیحات در این بخش
        ایجاد می شود و میتواند یک خط
      </span></div>
                            <div class="w-full justify-between flex">
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-file"></span> <span
                                            class="text-xs">اخبار روز</span></div>
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-clock"></span> <span class="text-xs">دقیقه مطالعه 14</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid gap-7 grid-rows-2 col-span-1 relative">
                    <div class="grid grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
                        <div class="grid justify-center text-xl font-thin items-center grid-rows-2 col-span-2 w-full h-full bg-customLightSky rounded-md">
                            <div class="flex h-full border-b-2 border-gray-100 row-span-1 items-center justify-center">
                                4
                            </div>
                            <div class="flex h-full row-span-1 items-center justify-center">
                                اردیبشهت
                            </div>
                        </div>
                        <div class="col-span-5 font-thin gap-4 flex flex-wrap">
                            <div class="w-full"><h2 class="text-base font-medium"><a href="#"> چگونه کیبورد بلوتوثی را
                                        به گوشی وصل کنیم؟ </a></h2></div>
                            <div class="w-full"><span class="text-justify text-sm">
        توضیحات در این بخش ایجاد می شود و میتواند یک خط توضیحات در این بخش
        ایجاد می شود و میتواند یک خط
      </span></div>
                            <div class="w-full justify-between flex">
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-file"></span> <span
                                            class="text-xs">اخبار روز</span></div>
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-clock"></span> <span class="text-xs">دقیقه مطالعه 14</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
                        <div class="grid justify-center text-xl font-thin items-center grid-rows-2 col-span-2 w-full h-full bg-customLightSky rounded-md">
                            <div class="flex h-full border-b-2 border-gray-100 row-span-1 items-center justify-center">
                                4
                            </div>
                            <div class="flex h-full row-span-1 items-center justify-center">
                                اردیبشهت
                            </div>
                        </div>
                        <div class="col-span-5 font-thin gap-4 flex flex-wrap">
                            <div class="w-full"><h2 class="text-base font-medium"><a href="#"> چگونه کیبورد بلوتوثی را
                                        به گوشی وصل کنیم؟ </a></h2></div>
                            <div class="w-full"><span class="text-justify text-sm">
        توضیحات در این بخش ایجاد می شود و میتواند یک خط توضیحات در این بخش
        ایجاد می شود و میتواند یک خط
      </span></div>
                            <div class="w-full justify-between flex">
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-file"></span> <span
                                            class="text-xs">اخبار روز</span></div>
                                <div class="flex items-center text-gray-500 gap-x-2"><span
                                            class="icon text-base icon-clock"></span> <span class="text-xs">دقیقه مطالعه 14</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>