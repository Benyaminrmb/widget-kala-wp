<?php
/*
Template Name: shop template

Template Post Type: page
*/
get_header();
$page_id = wc_get_page_id('shop');
$categories_one = get_field('seller_one_categories', $page_id);
$archive_one = get_field('seller_one_link', $page_id);
$categories_two = get_field('seller_two_categories', $page_id);
$archive_two = get_field('seller_two_link', $page_id);
$categories_three = get_field('seller_three_categories', $page_id);
$archive_three = get_field('seller_three_link', $page_id);

get_template_part('template-parts/shop/top-advertises');
get_template_part('template-parts/shop/top-categories');
get_template_part('template-parts/shop/brands-advertise');
$best_seller_lenovo_args = ['page_title' => 'پر فروش ترین محصولات لنوو', 'categories' => $categories_one, 'archive_link' => $archive_one];
get_template_part('template-parts/shop/best-sellers', null, $best_seller_lenovo_args);
$best_seller_wimu_args = ['page_title' => 'پر فروش ترین محصولات wiwu', 'categories' => $categories_two, 'archive_link' => $archive_two];
get_template_part('template-parts/shop/best-sellers', null, $best_seller_wimu_args);
get_template_part('template-parts/shop/bottom-advertises');
$best_seller_moxom_args = ['page_title' => 'پر فروش ترین محصولات moxom', 'categories' => $categories_three, 'archive_link' => $archive_three];
get_template_part('template-parts/shop/best-sellers', null, $best_seller_moxom_args);
get_template_part('template-parts/shop/articles');

get_footer();