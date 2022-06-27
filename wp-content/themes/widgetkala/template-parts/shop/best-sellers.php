<?php
/** @var array $args */
$query_params  = [
    'post_type'      => 'product',
    'posts_per_page' => '8',
    'meta_key'       => 'total_sales',
    'orderby'        => 'meta_value_num',
];
$tab_arguments = [
    'container_class' => 'best-sellers-container',
    'section_title'   => $args['page_title'] ?? 'پرفروش ترین ها',
    'categories'      => $args['categories'] ?? [],
    'archive_link'    => $args['archive_link'] ?? '#',
    'query_params'    => $query_params
];

get_template_part('template-parts/products', 'tab', $tab_arguments);