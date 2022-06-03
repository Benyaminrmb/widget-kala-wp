<?php
if ( ! function_exists('it_acf_options')) {
    add_action('acf/init', 'it_acf_options');
    function it_acf_options()
    {
        // Check function exists.
        if (function_exists('acf_add_options_page')) {
            // Register options page.
            $option_page = acf_add_options_page(
                [
                    'page_title' => __('Theme General Settings', 'widgetize'),
                    'menu_title' => __('Theme Settings', 'widgetize'),
                    'menu_slug'  => 'theme-general-settings',
                    'capability' => 'edit_posts',
                    'redirect'   => false,
                ]
            );
        }
    }
}
if ( ! function_exists('it_template_choose')) {
    function it_template_choose($template)
    {
        global $wp_query;
        $post_type = get_query_var('post_type') ? get_query_var('post_type') : 'post';
        if (isset($_GET['s']) && $post_type == 'post') {
            return locate_template(
                '/includes/searchform-post.php'
            );  //  redirect to archive-search.php
        }

        return $template;
    }
    //	add_filter('template_include', 'it_template_choose');
}
if (function_exists('yoast_breadcrumb')) {
    /***************************************
     * Add this code to theme functions.php
     ***************************************/
    /**
     * @param $wrapper
     *
     * @return string
     */
    function it_breadcrumb_output_wrapper($wrapper)
    {
        return 'ol';
    }

    add_filter('wpseo_breadcrumb_output_wrapper', 'it_breadcrumb_output_wrapper', 10, 1);
    /**
     * @param $class
     *
     * @return string
     */
    function it_breadcrumb_output_class($class)
    {
        return 'breadcrumb flex-nowrap mb-0';
    }

    add_filter('wpseo_breadcrumb_output_class', 'it_breadcrumb_output_class', 10, 1);
    /**
     * @param $separator
     *
     * @return string
     */
    function it_breadcrumb_separator($separator)
    {
        return '';
    }

    add_filter('wpseo_breadcrumb_separator', 'it_breadcrumb_separator', 10, 1);
    /**
     * @param $wrapper
     *
     * @return string
     */
    function it_breadcrumb_single_link_wrapper($wrapper)
    {
        return 'li';
    }

    add_filter('wpseo_breadcrumb_single_link_wrapper', 'it_breadcrumb_single_link_wrapper', 10, 1);
    /**
     * @param $link_output
     * @param $link
     *
     * @return string|string[]
     */
    function it_breadcrumb_single_link($link_output, $link)
    {
        $id   = null;
        $icon = 'search';
        if (isset($link['id'])) {
            $type = 'post';
            $id   = $link['id'];
            $icon = 'page';
            if ($id == get_option('page_on_front')) {
                $icon = 'home';
            }
        } elseif (isset($link['term_id'])) {
            $type = 'term';
            $id   = $link['term_id'];
            $icon = 'category';
        }

        $result = str_replace(
            [
                '<li>',
                '<span class="breadcrumb_last" aria-current="page">',
                '</span>',
            ],
            [
                '<li class="breadcrumb-item"><i class="icon-'.$icon.'"></i> ',
                ' </li><li class="breadcrumb-item text-truncate active" aria-current="page"><i class="icon-page"></i>',
                '</li>',
            ],
            $link_output
        );

        return $result;
    }

    add_filter('wpseo_breadcrumb_single_link', 'it_breadcrumb_single_link', 10, 2);
}
if (class_exists('WP_Bootstrap_Navwalker') && ! function_exists('it_bs5_dropdown_attr')) {
    add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
    /**
     * Use namespaced data attribute for Bootstrap's dropdown toggles.
     *
     * @param  array  $atts  HTML attributes applied to the item's `<a>` element.
     * @param  WP_Post  $item  The current menu item.
     * @param  stdClass  $args  An object of wp_nav_menu() arguments.
     *
     * @return array
     */
    function it_bs5_dropdown_attr($atts, $item, $args)
    {
        //		if ( is_a($args->walker, 'WP_Bootstrap_Navwalker') ){
        //			if ( array_key_exists('data-toggle', $atts) ){
        //				unset($atts[ 'data-toggle' ]);
        //				$atts[ 'data-bs-toggle' ] = 'dropdown';
        //			}
        //		}
        return $atts;
    }
}
if (function_exists('wp_pagenavi')) {
    add_filter('wp_pagenavi', __NAMESPACE__.'\\it_pagination', 10, 2);
    function it_pagination($html)
    {
        $out = str_replace(
            [
                'class=\'wp-pagenavi\' role=\'navigation\'>', '<a', '<div', '</a>',
                '<span aria-current=\'page\' class=\'current\'', '<span class=\'pages\'',
                '<span class=\'extend\'', '</span>', '</div>',
            ], [
            '<ul class="pagination pagination-lg justify-content-center flex-wrap rounded rounded-pill" role="navigation">',
            '<li class="page-item"><a class="page-link"', '', '</a></li>',
            '<li aria-current="page" class="page-item active"><span class="page-link current"',
            '<li class="page-item"><span class="page-link pages"',
            '<li class="page-item"><span class="page-link extend"', '</span></li>', '</ul>',
        ], $html
        );

        return $out;
    }
}
if ( ! function_exists('it_comment')) {
    function it_comment($comment, $args, $depth)
    {
        global $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                echo '<li class="'.implode(' ', get_comment_class()).'" id="li-comment-'.
                     get_comment_ID().
                     '" >';
                ?>
                <p><?php esc_html_e(
                        'Pingback:',
                        'widgetize'
                    ); ?><?php comment_author_link(); ?><?php edit_comment_link(
                        esc_html__(
                            '(Edit)',
                            'widgetize'
                        ), '<span class="edit-link">', '</span>'
                    ); ?></p>
                <?php
                break;
            default :
                global $post;
                echo '<li class="'.implode(' ', get_comment_class()).'" id="li-comment-'.
                     get_comment_ID().
                     '" >';
                $childArgs  = [
                    'post_id' => $post->ID, //main post id
                    'parent'  => get_comment_ID(), //the comment id
                    'count'   => true, //just count
                ];
                $childCount = get_comments($childArgs);
                ?>
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <div>
                        <div class="comment-meta-first">
                            <?php
                            printf(
                                '<span class="comment-author" itemprop="name">%1$s %2$s</span>',
                                get_comment_author_link(), '<a class="comment-edit-link" href="'.
                                                           esc_url(
                                                               get_edit_comment_link($comment)
                                                           ).'">'.esc_html__('Edit', 'widgetize').
                                                           '</a>'
                            );
                            comment_reply_link(
                                array_merge(
                                    $args, [
                                        'reply_text' => sprintf(
                                            '<span class="reply-text">%s</span>',
                                            __('Send Reply', 'widgetize')
                                        ),
                                        'depth'      => $depth,
                                        'max_depth'  => $args['max_depth'],
                                    ]
                                )
                            );
                            ?>
                        </div>
                    </div>
                    <div class="col">
                        <section class="comment-content" itemprop="text">
                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation p-1 alert alert-info alert-link"><?php esc_html_e(
                                        'Your comment is awaiting moderation.',
                                        'widgetize'
                                    ); ?></p>
                            <?php endif; ?>
                            <?php comment_text(); ?>
                        </section>
                    </div>
                    <div>
                        <footer class="comment-meta-last">
                            <?php
                            printf(
                                '<a class="d-block comment-date" itemprop="datePublished" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                esc_url(get_comment_link($comment->comment_ID)),
                                get_comment_time('c'),
                                sprintf(
                                    esc_html__('%1$s', 'widgetize'), get_comment_date('F j')
                                )
                            );
                            if (0 === $childCount) {
                                printf(
                                    '<span class="reply-count">%s</span>',
                                    esc_html__('No&zwnj;Replies', 'widgetize')
                                );
                            } elseif (1 === $childCount) {
                                printf(
                                    '<span class="reply-count">%s</span>',
                                    sprintf(esc_html__('One reply', 'widgetize'))
                                );
                            } else {
                                printf(
                                    '<span class="reply-count">%s</span>',
                                    sprintf(esc_html__('%d Replies', 'widgetize'), $childCount)
                                );
                            }
                            ?>
                        </footer>
                    </div>
                </article>
                <?php
                break;
        endswitch;
    }
}
if ( ! function_exists('it_move_comment_field_to_bottom')) {
    function it_move_comment_field_to_bottom($fields)
    {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;

        return $fields;
    }

    add_filter('comment_form_fields', 'it_move_comment_field_to_bottom');
}
if ( ! function_exists('change_js_view_cart_button')) {
    function change_js_view_cart_button($params, $handle)
    {
        if ('wc-add-to-cart' !== $handle) {
            return $params;
        }

        // Changing "view_cart" button text and URL
//    $params['i18n_view_cart'] = esc_attr__("Checkout", "woocommerce"); // Text
//    $params['cart_url']      = esc_url( wc_get_checkout_url() ); // URL
        $params['cart_redirect_after_add'] = 'yes';

        return $params;
    }
}
add_filter('woocommerce_get_script_data', 'change_js_view_cart_button', 10, 2);

if ( ! function_exists('mt_ajax_products')) {
    function mt_ajax_products($params = [])
    {

        $count    = $params['count'];
        $category = $params['cat_id'];
        $products = new WP_Query([
            'post_type'      => 'product',
            'posts_per_page' => $count,
            'meta_key'       => 'total_sales',
            'orderby'        => 'meta_value_num',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => [$category], /*category id*/
                    'operator' => 'IN',
                )
            ),
        ]);
        while ($products->have_posts()) {
            $products->the_post();
            wc_get_template_part('content', 'product');
        }
        wp_reset_postdata();
    }
}