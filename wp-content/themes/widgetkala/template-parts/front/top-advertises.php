<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <?php
    $page_id          = get_option('page_on_front');
    $small_image_link = get_field('small_image_link', $page_id);
    $top_small_image  = get_field('top_small_image', $page_id);
    $big_image_link   = get_field('big_image_link', $page_id);
    $top_big_image    = get_field('top_big_image', $page_id);
    $bottom_images    = [
        [
            'img'  => get_field('bottom_image_1', $page_id),
            'link' => get_field('image_1_link_field', $page_id)
        ],
        [
            'img'  => get_field('bottom_image_2', $page_id),
            'link' => get_field('image_2_link_field', $page_id)
        ],
        [
            'img'  => get_field('bottom_image_3', $page_id),
            'link' => get_field('image_3_link_field', $page_id)
        ],
        [
            'img'  => get_field('bottom_image_4', $page_id),
            'link' => get_field('image_4_link_field', $page_id)
        ],
    ];
    if (wp_is_mobile()) {
        if (have_rows('frontpage_mobile_slider', $page_id)) {
            ?>
            <div class="owl-carousel owl-slider owl-theme">
                <?php
                while (have_rows('frontpage_mobile_slider', $page_id)) {
                    the_row();
                    $link      = get_sub_field('link');
                    $image     = get_sub_field('image');
                    $item_html = '<div class="item">';
                    $item_html .= ( ! empty($link)) ? '<a href="'.$link['url'].'" class="rounded-five overflow-hidden mx-auto w-full">' : '<div class="rounded-five overflow-hidden mx-auto w-full">';
                    $item_html .= wp_get_attachment_image($image, 'mobile_slider', false, ['class' => 'w-full rounded-five', 'title' => $link['title']]);
                    $item_html .= ( ! empty($link['url'])) ? '</a>' : '</div>';
                    $item_html .= '</div>';
                    echo $item_html;
                } ?>
            </div>
            <?php
        }
    } else { ?>
        <div class="hidden md:grid gap-6 grid-cols-12 justify-between">
            <div class="md:col-span-4 col-span-12">
                <div class="w-full flex h-full">
                    <?php
                    if (get_field('small_image_link', $page_id)) {
                        echo '<a href="'.esc_url($small_image_link['url']).'" >';
                    }
                    if ($top_small_image) {
                        echo wp_get_attachment_image($top_small_image['id'], 'full', false,
                            ['class' => 'w-full h-full border rounded-lg']);
                    }
                    if (get_field('small_image_link', $page_id)) {
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="md:col-span-8 col-span-12">
                <div class="w-full flex h-full">
                    <?php if ($big_image_link) {
                        echo '<a href="'.$big_image_link['url'].'" >';
                    }
                    if ($top_big_image) {
                        echo wp_get_attachment_image($top_big_image['id'], 'full', false,
                            ['class' => 'w-full h-full border rounded-lg']);
                    }
                    if ($big_image_link) {
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="hidden md:grid mt-6 gap-x-6 grid-cols-12 justify-between">
            <?php foreach ($bottom_images as $k => $item) {
                ?>
                <div class="col-span-3">
                    <div class="w-full flex h-full">
                        <?php if ($item['link']) {
                            echo '<a href="'.$item['link']['url'].'" target="'.$item['link']['target'].'">';
                        }
                        if ($item['img']) {
                            echo wp_get_attachment_image($item['img'], 'full', false,
                                ['class' => 'w-full h-full border rounded-lg']);
                        }
                        if ($item['link']) {
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>