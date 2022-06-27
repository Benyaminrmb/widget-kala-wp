<?php
$page_id          = get_option('woocommerce_shop_page_id');
$small_image_link = get_field('small_image_link', $page_id);
$top_small_image  = get_field('top_small_image', $page_id);
$big_image_link   = get_field('big_image_link', $page_id);
$top_big_image    = get_field('top_big_image', $page_id);
//var_dump($top_small_image['id']);
?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid gap-x-7 gap-2 grid-cols-12 justify-between">
        <?php if(!wp_is_mobile()){ ?>
        <div class="col-span-12 md:col-span-4">
            <div class="w-full flex h-full">
                <?php
                $alt = '';
                if (get_field('small_image_link', $page_id)) {
                    echo '<a target="'.esc_url($small_image_link['target']).'" href="'.esc_url($small_image_link['url']).'" >';
                    $alt = $small_image_link['title'];
                }
                if ($top_small_image) {
                    echo wp_get_attachment_image($top_small_image['id'], 'full', false,
                        ['class' => 'w-full h-full border rounded-lg','alt'=>$alt]);
                }
                if (get_field('small_image_link', $page_id)) {
                    echo '</a>';
                }
                ?>
            </div>
        </div>
        <?php }?>
        <div class="col-span-12 md:col-span-8">
            <div class="w-full flex h-full">
                <?php
                $big_alt = '';
                if ($big_image_link) {
                    echo '<a href="'.$big_image_link['url'].'" >';
                    $big_alt = $big_image_link['title'];
                }
                if ($top_big_image) {
                    echo wp_get_attachment_image($top_big_image['id'], 'full', false,
                        ['class' => 'w-full h-full border rounded-lg','alt'=>$big_alt]);
                }
                if ($big_image_link) {
                    echo '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>