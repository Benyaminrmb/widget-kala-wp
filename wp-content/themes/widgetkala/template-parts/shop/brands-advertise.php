<div class="container shop-banners-container">
    <?php
    $page_id = get_option('woocommerce_shop_page_id');
    $brands_list = get_field('brands_list', $page_id);
    $total = count($brands_list);
    $cols = ceil($total / 2);
    ?>
    <div class="mb-7 flex gap-x-5">
        <span class="horizontalLines"></span>
        <div class="section-title">
            برندهای ویجت کالا
        </div>
    </div>
    <?php if (wp_is_mobile()) { ?>
        <div class="owl-carousel owl-slider owl-theme">
            <?php foreach ($brands_list as $key => $item) { ?>
                <div class="item">
                    <div class="mx-auto overflow-hidden rounded-five">
                        <?php if ($item['link']) {
                            echo '<a href="' .
                                $item['link']['url'] .
                                '" target="' .
                                $item['link']['target'] .
                                '" >';
                        }
                        echo wp_get_attachment_image($item['image']['ID'], 'mobile_slider', false, ['class' => 'w-full']);
                        if ($item['link']) {
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="grid <?php echo 'grid-cols-' . $cols; ?> grid-rows-2 grid-flow-col gap-3">
            <?php
            foreach ($brands_list as $key => $item) {
                $col_class = 'brand-adv-small';
                if ($key == 0 && ($total % 2 == 1)) {
                    $col_class = 'brand-adv-large';
                }
                echo '<div class="' . $col_class . ' rounded-md">';
                if ($item['link']) {
                    echo '<a href="' .
                        $item['link']['url'] .
                        '" target="' .
                        $item['link']['target'] .
                        '" >';

                }
                echo wp_get_attachment_image($item['image']['ID'], 'full', false, ['class' => 'w-full']);
//            var_dump($item['image']['ID']);
                if ($item['link']) {
                    echo '</a>';
                }

                echo '</div>';

            } ?>
        </div>
    <?php } ?>
</div>