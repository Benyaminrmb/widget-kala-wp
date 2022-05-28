<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <?php
    $page_id = get_option('page_on_front');
            $small_image_link = get_field('small_image_link');
            $top_small_image  = get_field('top_small_image');
            $big_image_link   = get_field('big_image_link');
            $top_big_image    = get_field('top_big_image');
            $bottom_images    = [
                '1' => [
                    'img'  => get_field('bottom_image_1'),
                    'link' => get_field('image_1_link_field')
                ],
                '2' => [
                    'img'  => get_field('bottom_image_2'),
                    'link' => get_field('image_2_link_field')
                ],
                '3' => [
                    'img'  => get_field('bottom_image_3'),
                    'link' => get_field('image_3_link_field')
                ],
                '4' => [
                    'img'  => get_field('bottom_image_4'),
                    'link' => get_field('image_4_link_field')
                ],
            ]


            ?>
            <div class="grid gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-4">
                    <div class="w-full flex h-full">
                        <?php
                        if (get_field('small_image_link')) {
                            echo '<a href="'.esc_url($small_image_link['url']).'" >';
                        }
                        if ($top_small_image) {
                            echo wp_get_attachment_image($top_small_image, 'full', false,
                                ['class' => 'w-full h-full border rounded-lg']);
                        }
                        if (get_field('small_image_link')) {
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="w-full flex h-full">
                        <?php if ($big_image_link) {
                            echo '<a href="'.$big_image_link['url'].'" >';
                        }
                        if ($top_big_image) {
                            echo wp_get_attachment_image($top_big_image, 'full', false,
                                ['class' => 'w-full h-full border rounded-lg']);
                        }
                        if ($big_image_link) {
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
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
        <?php ?>
</div>