<?php if (wp_is_mobile()): ?>
    <div class="mobile-sidebar-filter-container">
        <div class="w-full flex flex-wrap border border-customDarkWhite rounded-md overflow-hidden">
            <div class="flex w-full bg-customLightblue p-3 pr-12 px-4 justify-between">
                <span class="darkHorizontalLines text-white"><?php _e('فیلتر ها', 'widgetize'); ?></span>
                <span class="close-filters">&times;</span>
            </div>
            <div class="flex flex-wrap p-3 py-4">
                <div class="flex w-full justify-between border-b pb-4">
                    <span class="flex text-customGray text-base"><?php _e('جستجو کنید', 'widgetize'); ?></span>
                    <span class="flex">+</span>
                </div>

                <div class="flex mt-3 flex-wrap w-full">
                    <?php $categories = mt_wc_get_brand_categories();
                    if ($categories) { ?>
                        <div class="flex w-full text-base"><?php _e('دسته بندی ها', 'widgetize'); ?></div>
                        <div class="flex mt-3 w-full">
                            <label for="search-brand-input" class="sr-only"><?php _e('دسته خود را جستجو کنید', 'widgetize'); ?></label>
                            <input id="search-brand-input" placeholder="دسته خود را جستجو کنید" class="p-2 text-gray-600 w-full border rounded-md"/>
                        </div>
                        <div class="flex flex-wrap mt-3 w-full pb-4 thin-scrollbar border-b overflow-y-scroll h-290">
                            <div class="brand-list">
                                <?php
                                $current_url    = mt_current_URL();
                                $get_categories = explode('-', $_GET['pcat']);
                                $new_categories = $get_categories;
                                foreach ($categories as $category) {
                                    ?>
                                    <div class="brand-item">
                                        <div class="flex gap-x-2 items-center">
                                            <?php
                                            $checked = '';
                                            if (in_array($category->term_id, $get_categories)) {
                                                $checked = ' checked="checked" ';
                                            }

                                            if ($key = array_search($category->term_id, $get_categories) !== false) {
                                                $st = '<span style="color: red">'.$category->term_id.'</span>';
                                                unset($new_categories[$key]);
                                            } else {
                                                $new_categories[] = $category->term_id;
                                                $st               = '<span style="color: green">'.$category->term_id.'</span>';
                                            }
                                            //                                        $new_brands  = $get_brands;
                                            $category_string = implode('-', $new_categories);
                                            $url             = add_query_arg('pcat', $category_string);
                                            ?>
                                            <div class="flex">
                                                <input data-type="category" id="brand-checkbox-<?php echo $category->term_id ?>"
                                                    <?php echo $checked ?>
                                                       value="<?php echo $category->term_id; ?>"
                                                       type="checkbox"
                                                       class="w-4 h-4 accent-customDarkblue ajax-product-filters"/>
                                            </div>
                                            <label class="flex" for="brand-checkbox-<?php echo $category->term_id ?>"><?php echo $category->name; ?></label>
                                        </div>
                                        <div class="flex">
                                            <span class="text-customGray text-xs"><?php echo urldecode($category->slug); ?></span>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $_GET['pcat'] = $new_categories;
                                ?>
                            </div>
                        </div><!--mt-3 w-full-->
                    <?php } ?>
                    <div class="flex border-b border-customDarkWhite py-4 w-full">
                        <div class="flex w-full justify-between items-center flex-wrap">
                            <span class="flex text-customGray text-base"><?php _e('آیتم‌های موجود','widgetize');?></span>
                            <label for="toggleA" class="switch-check">
                                <input type="checkbox" id="toggleA" name="only-available"/>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="flex mt-3 w-full pt-4">
                        <div class="flex w-full justify-between items-center flex-wrap">
                            <span class="flex text-customGray text-base"><?php _e('آیتم‌های تخفیف دار','widgetize'); ?></span>
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
                    <?php $categories = mt_wc_get_brand_categories();
                    if ($categories) { ?>
                        <div class="flex w-full text-base">دسته بندی ها</div>
                        <div class="flex mt-3 w-full">
                            <label for="search-brand-input" class="sr-only"><?php _e('دسته خود را جستجو کنید', 'widgetize'); ?></label>
                            <input id="search-brand-input" placeholder="دسته خود را جستجو کنید" class="p-2 text-gray-600 w-full border rounded-md"/>
                        </div>
                        <div class="flex flex-wrap mt-3 w-full pb-4 thin-scrollbar border-b overflow-y-scroll h-290">
                            <div class="brand-list">
                                <?php
                                $current_url    = mt_current_URL();
                                $get_categories = explode('-', $_GET['pcat']);
                                $new_categories = $get_categories;
                                foreach ($categories as $category) {
                                    ?>
                                    <div class="brand-item">
                                        <div class="flex gap-x-2 items-center">
                                            <?php
                                            $checked = '';
                                            if (in_array($category->term_id, $get_categories)) {
                                                $checked = ' checked="checked" ';
                                            }
                                            ?>
                                            <div class="flex">
                                                <input data-type="category" id="category-checkbox-<?php echo $category->term_id ?>"
                                                    <?php echo $checked ?>
                                                       value="<?php echo $category->term_id; ?>"
                                                       type="checkbox"
                                                       class="w-4 h-4 accent-customDarkblue ajax-product-filters"/>
                                            </div>
                                            <label class="flex" for="category-checkbox-<?php echo $category->term_id ?>"><?php echo $category->name; ?></label>
                                        </div>
                                        <div class="flex">
                                            <span class="text-customGray text-xs"><?php echo urldecode($category->slug); ?></span>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $_GET['pcat'] = $new_categories;
                                ?>
                            </div>
                        </div><!--mt-3 w-full-->
                    <?php } ?>
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
            </div><!--flex-wrap p-3-->
        </div><!--flex-->
    </div><!--sidebar-filter-container-->
<?php endif;