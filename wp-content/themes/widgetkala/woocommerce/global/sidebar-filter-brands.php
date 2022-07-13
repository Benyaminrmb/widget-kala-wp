<?php if (wp_is_mobile()): ?>
    <div class="mobile-sidebar-filter-container">
        <div class="w-full flex flex-wrap border border-customDarkWhite rounded-md overflow-hidden">
            <div class="flex w-full bg-customLightblue p-3 pr-12 px-4 justify-between">
                <span class="darkHorizontalLines text-white">فیلتر ها</span>
                <span class="close-filters">&times;</span>
            </div>
            <div class="flex flex-wrap p-3 py-4">
                <div class="flex w-full justify-between border-b pb-4">
                    <span class="flex text-customGray text-base">
                        جستجو کنید
                    </span>
                    <span class="flex">+</span>
                </div>
                <div class="flex mt-3 flex-wrap w-full">
                    <?php $brands = mt_wc_get_brands();
                    if ($brands) { ?>
                        <div class="flex w-full text-base">برند ها</div>
                        <div class="flex mt-3 w-full">
                            <label for="search-brand-input" class="sr-only"><?php _e('برند خود را جستجو کنید', 'widgetize'); ?></label>
                            <input id="search-brand-input" placeholder="برند خود را جستجو کنید" class="p-2 text-gray-600 w-full border rounded-md"/>
                        </div>
                        <div class="flex flex-wrap mt-3 w-full pb-4 thin-scrollbar border-b overflow-y-scroll h-290">
                            <div class="brand-list">
                                <?php
                                $get_brands = explode('-', $_GET['brand']);
                                $new_brands = $get_brands;
                                foreach ($brands as $brand) { ?>
                                    <div class="brand-item">
                                        <div class="flex gap-x-2 items-center">
                                            <?php
                                            $checked = '';
                                            if (in_array($brand->term_id, $get_brands)) {
                                                $checked = ' checked="checked" ';
                                            }
                                            ?>
                                            <div class="flex">
                                                <input data-type="brand" id="brand-checkbox-<?php echo $brand->term_id ?>"
                                                    <?php echo $checked ?>
                                                       value="<?php echo $brand->term_id; ?>"
                                                       type="checkbox"
                                                       class="w-4 h-4 accent-customDarkblue ajax-product-filters"/>
                                            </div>
                                            <label class="flex" for="brand-checkbox-<?php echo $brand->term_id ?>"><?php echo $brand->name; ?></label>
                                        </div>
                                        <div class="flex">
                                            <span class="text-customGray text-xs"><?php echo urldecode($brand->slug); ?></span>
                                        </div>
                                    </div>
                                    <?php

                                }
                                $_GET['brand'] = $new_brands;
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="flex border-b border-customDarkWhite pb-3 mt-3 w-full">
                        <div class="flex w-full justify-between items-center flex-wrap">
                            <span class="flex text-customGray">آیتم‌های موجود</span>
                            <div class="flex">
                                <label for="toggleA" class="cursor-pointer">
                                                    <span class="relative">
                                                        <input type="checkbox" id="toggleA" class="sr-only"/>
                                                        <span class="block parent bg-customLightgraytwo w-14 h-7 rounded-md"></span>
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
                                                        <span class="block parent bg-customLightgraytwo w-14 h-7 rounded-md"></span>
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
<?php else : ?>
    <div class="sidebar-filter-container">
        <div class="w-full flex flex-wrap border border-customDarkWhite rounded-md">
            <div class="flex w-full bg-customLightblue p-3 px-12">
                <span class="darkHorizontalLines text-white">فیلتر ها</span>
            </div>
            <div class="flex flex-wrap p-3 py-4">
                <div class="flex w-full justify-between border-b pb-4">
                    <span class="flex text-customGray text-base">
                      جستجو کنید
                    </span>
                    <span class="flex">+</span>
                </div>
                <div class="flex mt-3 flex-wrap w-full">
                    <div class="flex w-full text-base">برند ها</div>
                    <div class="flex mt-3 w-full">
                        <label for="search-brand-input" class="sr-only"><?php _e('برند خود را جستجو کنید', 'widgetize'); ?></label>
                        <input id="search-brand-input" placeholder="برند خود را جستجو کنید" class="p-2 text-gray-600 w-full border rounded-md"/>
                    </div>
                    <?php
                    $brands = mt_wc_get_brands();
                    if ($brands){ ?>
                    <div class="flex flex-wrap mt-3 w-full pb-4 thin-scrollbar border-b overflow-y-scroll h-290">
                    <div class="brand-list">
                            <?php
                            $get_brands = explode('-', $_GET['brand']);
                            $new_brands = $get_brands;
                            foreach ($brands as $brand) { ?>
                                <div class="brand-item">
                                    <div class="flex gap-x-2 items-center">
                                        <?php
                                        $checked = '';
                                        if (in_array($brand->term_id, $get_brands)) {
                                            $checked = ' checked="checked" ';
                                        }

                                        $brand_string = implode('-', $new_brands);
                                        $url          = add_query_arg('brand', $brand_string);
                                        ?>
                                        <div class="flex">
                                            <input data-type="brand" id="brand-checkbox-<?php echo $brand->term_id ?>"
                                                <?php echo $checked ?>
                                                   value="<?php echo $brand->term_id; ?>"
                                                   type="checkbox"
                                                   class="w-4 h-4 accent-customDarkblue ajax-product-filters"/>
                                        </div>
                                        <label class="flex" for="brand-checkbox-<?php echo $brand->term_id ?>"><?php echo $brand->name; ?></label>
                                    </div>
                                    <div class="flex">
                                        <span class="text-customGray text-xs"><?php echo urldecode($brand->slug); ?></span>
                                    </div>
                                </div>
                                <?php

                            }
                            $_GET['brand'] = $new_brands;
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="flex border-b border-customDarkWhite py-4 w-full">
                        <div class="flex w-full justify-between items-center flex-wrap">
                            <span class="flex text-customGray text-base">آیتم‌های موجود</span>
                            <label for="toggleA" class="switch-check">
                                <input type="checkbox" id="toggleA" name="only-available"/>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="flex mt-3 w-full pt-4">
                        <div class="flex w-full justify-between items-center flex-wrap">
                            <span class="flex text-customGray text-base">آیتم‌های تخفیف دار</span>
                            <label for="toggleB" class="switch-check">
                                <input type="checkbox" id="toggleB" name="only-discounted"/>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;
//get_sidebar('shop');