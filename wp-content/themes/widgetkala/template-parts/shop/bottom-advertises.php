<div class="bottom-advertises container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid gap-6 grid-cols-12 justify-between">
        <?php
        $page_id = get_option('woocommerce_shop_page_id');
        if (have_rows('advertise_boxes', $page_id)) {
            while (have_rows('advertise_boxes', $page_id)) {
                the_row();
                $image = get_sub_field('image');
                $link = get_sub_field('link');
                $size = get_sub_field('size'); ?>
                <div class="col-span-<?php echo $size; ?>">
                    <div class="w-full flex h-full">
                        <?php
                        if ($link) {
                            echo '<a href="' . esc_url($link['url']) . '" >';
                        }
                        echo wp_get_attachment_image($image, 'full', false,
                            ['class' => 'w-full h-full border rounded-lg']);
                        if ($link) {
                            echo '</a>';
                        } ?>
                    </div>
                </div>
            <?php }
        }
        ?>
    </div>
</div>