<?php
function mt_product_brand_taxonomy() {

    /**
     * Taxonomy: Brands.
     */

    $labels = [
        "name" => __( "Brands", "custom-post-type-ui" ),
        "singular_name" => __( "Brand", "custom-post-type-ui" ),
        "menu_name" => __( "Brands", "custom-post-type-ui" ),
        "all_items" => __( "All Brands", "custom-post-type-ui" ),
        "edit_item" => __( "Edit Brand", "custom-post-type-ui" ),
        "view_item" => __( "View Brand", "custom-post-type-ui" ),
        "update_item" => __( "Update Brand name", "custom-post-type-ui" ),
        "add_new_item" => __( "Add New Brand", "custom-post-type-ui" ),
        "new_item_name" => __( "New Brand Name", "custom-post-type-ui" ),
        "parent_item" => __( "Parent Brand", "custom-post-type-ui" ),
        "parent_item_colon" => __( "Parent Brand", "custom-post-type-ui" ),
        "search_items" => __( "Search Brands", "custom-post-type-ui" ),
        "popular_items" => __( "Popular Brands", "custom-post-type-ui" ),
        "separate_items_with_commas" => __( "Seperate Brands with commas", "custom-post-type-ui" ),
        "add_or_remove_items" => __( "Add or Remove Brands", "custom-post-type-ui" ),
        "choose_from_most_used" => __( "Choose frome most used Brands", "custom-post-type-ui" ),
        "not_found" => __( "No Brands found", "custom-post-type-ui" ),
        "no_terms" => __( "No Brands", "custom-post-type-ui" ),
        "items_list_navigation" => __( "Brands List Navigation", "custom-post-type-ui" ),
        "items_list" => __( "Brands List", "custom-post-type-ui" ),
        "back_to_items" => __( "Back to Brands", "custom-post-type-ui" ),
    ];


    $args = [
        "label" => __( "Brands", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'brand', 'with_front' => true,  'hierarchical' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "product_brand",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "product_brand", [ "product" ], $args );
}
add_action( 'init', 'mt_product_brand_taxonomy' );
