<div class="col-span-1 brand-item">
    <?php
    /** @var array $args
     * @var int|WP_Term|object $brand
     */
    $brand = $args['brand'];
    $logo_id = get_term_meta($brand->term_id, 'logo', true);
    $logo = wp_get_attachment_image($logo_id, 'full', false, ['class' => 'w-full','alt'=>$brand->name]);
    $link = get_term_link($brand);
    echo '<div class="w-full rounded-five border border-customGray bg-white overflow-hidden"><a href="' . $link . '">' . $logo . '</a></div>';
    ?>
</div>
