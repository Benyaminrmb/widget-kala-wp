<?php
$page_id       = get_option('page_on_front');
$categories    = get_field('frontpage_have_discount_categories', $page_id);
$archive_link  = get_field('have_discount_button_link',$page_id);
$query_params  = [
    'post_type'      => 'product',
    'posts_per_page' => '4',
    'meta_key'       => 'total_sales',
    'orderby'        => 'meta_value_num',
    'meta_query'     => [
        'relation' => 'OR',
        [ // Simple products type
          'key'     => '_sale_price',
          'value'   => 0,
          'compare' => '>',
          'type'    => 'numeric'
        ],
        [ // Variable products type
          'key'     => '_min_variation_sale_price',
          'value'   => 0,
          'compare' => '>',
          'type'    => 'numeric'
        ]
    ]
];
$tab_arguments = [
    'container_class' => 'have-discount-container',
    'section_title'   => 'محصولات تخفیف دار',
    'categories'      => $categories,
    'archive_link'    => $archive_link,
    'query_params'    => $query_params
];
get_template_part('template-parts/products', 'tab', $tab_arguments);