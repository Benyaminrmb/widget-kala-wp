<?php
$page_id       = get_option('page_on_front');
$categories    = get_field('latest_product_categories', $page_id);
$archive_link  = get_field('latest_button_link',$page_id);
$query_params  = [
    'post_type'      => 'product',
    'posts_per_page' => '4',
];
$tab_arguments = [
    'container_class' => 'latest-products',
    'section_title'   => 'جدیدترین ها',
    'categories'      => $categories,
    'archive_link'    => $archive_link,
    'query_params'    => $query_params
];
get_template_part('template-parts/products', 'tab', $tab_arguments);