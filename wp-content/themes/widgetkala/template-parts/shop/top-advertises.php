<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <?php
    $page_id          = get_option('woocommerce_shop_page_id');
    $small_image_link = get_field('small_image_link', $page_id);
    $top_small_image  = get_field('top_small_image', $page_id);
    $big_image_link   = get_field('big_image_link', $page_id);
    $top_big_image    = get_field('top_big_image', $page_id);
    ?>
    <div class="grid gap-x-7 grid-cols-12 justify-between">
        <div class="col-span-4">
            <div class="w-full flex h-full">
                <?php
                if (get_field('small_image_link', $page_id)) {
                    echo '<a href="'.esc_url($small_image_link['url']).'" >';
                }
                if ($top_small_image) {
                    echo wp_get_attachment_image($top_small_image, 'full', false,
                        ['class' => 'w-full h-full border rounded-lg']);
                }
                if (get_field('small_image_link', $page_id)) {
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
</div>