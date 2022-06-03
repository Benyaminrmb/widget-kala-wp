<?php
$page_id       = get_option('page_on_front');
$categories    = get_field('frontpage_sales_categories', $page_id);
$archive_link  = get_field('best_sellers_button_link',$page_id);
$query_params  = [
    'post_type'      => 'product',
    'posts_per_page' => '4',
    'meta_key'       => 'total_sales',
    'orderby'        => 'meta_value_num',
];
$tab_arguments = [
    'container_class' => 'best-sellers-container',
    'section_title'   => 'پرفروش ترین ها',
    'categories'      => $categories,
    'archive_link'    => $archive_link,
    'query_params'    => $query_params
];

get_template_part('template-parts/products', 'tab', $tab_arguments);