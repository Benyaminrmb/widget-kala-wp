<?php
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

if (!function_exists('it_acf_options')) {
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
                    'menu_slug' => 'theme-general-settings',
                    'capability' => 'edit_posts',
                    'redirect' => false,
                ]
            );
        }
    }
}
if (!function_exists('it_template_choose')) {
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
    function mt_breadcrumb_output_wrapper($wrapper)
    {
        return 'ol';
    }

    add_filter('wpseo_breadcrumb_output_wrapper', 'mt_breadcrumb_output_wrapper', 10, 1);
    /**
     * @param $class
     *
     * @return string
     */
    function mt_breadcrumb_output_class($class)
    {
        return 'breadcrumb flex flex-nowrap mb-0 w-full';
    }

    add_filter('wpseo_breadcrumb_output_class', 'mt_breadcrumb_output_class', 10, 1);
    /**
     * @param $separator
     *
     * @return string
     */
    function mt_breadcrumb_separator($separator)
    {
        return '';
    }

    add_filter('wpseo_breadcrumb_separator', 'mt_breadcrumb_separator', 10, 1);
    /**
     * @param $wrapper
     *
     * @return string
     */
    function mt_breadcrumb_single_link_wrapper($wrapper)
    {
        return 'li';
    }

    add_filter('wpseo_breadcrumb_single_link_wrapper', 'mt_breadcrumb_single_link_wrapper', 10, 1);
    /**
     * @param $link_output
     * @param $link
     *
     * @return string|string[]
     */
    function mt_breadcrumb_single_link($link_output, $link)
    {
        $id = null;
        $icon = 'search';
        if (isset($link['id'])) {
            $type = 'post';
            $id = $link['id'];
            $icon = 'book';
            if ($id == get_option('page_on_front')) {
                $icon = 'home';
            }
        } elseif (isset($link['term_id'])) {
            $type = 'term';
            $id = $link['term_id'];
            $icon = 'folder';
        }

        $result = str_replace(
            [
                '<li>',
                '<span class="breadcrumb_last" aria-current="page">',
                '</span>',
            ],
            [
                '<li class="breadcrumb-item"><i class="icon icon-' . $icon . '"></i> ',
                ' </li><li class="breadcrumb-item text-truncate active" aria-current="page"><i class="icon icon-file"></i>',
                '</li>',
            ],
            $link_output
        );

        return $result;
    }

    add_filter('wpseo_breadcrumb_single_link', 'mt_breadcrumb_single_link', 10, 2);
}
if (class_exists('WP_Bootstrap_Navwalker') && !function_exists('mt_bs5_dropdown_attr')) {
    add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
    /**
     * Use namespaced data attribute for Bootstrap's dropdown toggles.
     *
     * @param array $atts HTML attributes applied to the item's `<a>` element.
     * @param WP_Post $item The current menu item.
     * @param stdClass $args An object of wp_nav_menu() arguments.
     *
     * @return array
     */
    function mt_bs5_dropdown_attr($atts, $item, $args)
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
    add_filter('wp_pagenavi', __NAMESPACE__ . '\\mt_pagination', 10, 2);
    function mt_pagination($html)
    {
        $out = str_replace(
            [
//                'class=\'wp-pagenavi\' role=\'navigation\'>',
//                '<a class=\'previouspostslink\'',
//                '<a',
//                'class=\'current\'',
//                '<a class=\'nextpostslink\'',
//                '</div></a>',
//                '</a>',
//                '<span aria-current=\'page\' class=\'current\'',
//                '<span class=\'pages\'',
//                '<span class=\'extend\'',
//                '</span>',
//                '</div>',

            ], [
//                'class="flex flex-wrap w-full justify-center gap-4">',
//                '<a class="previous-link flex justify-center items-center border border-customDarkWhite rounded-md px-3 py-1 gap-3"',
//                '<a class="page-link flex justify-center items-center border border-customDarkWhite rounded-md px-3 py-1 gap-3"',
//                'class="page-link flex justify-center items-center border border-customDarkWhite rounded-md px-3 py-1 gap-3 bg-customLightblue text-white"',
//                '<a class="next-page flex justify-center items-center border border-customDarkWhite rounded-md px-3 py-1 gap-3"',
//                '</a><div class="test">',
//                '</div>',
//                '</a></li>',
//                '<li aria-current="page" class="flex justify-center items-center border border-customDarkWhite rounded-md px-3 gap-3 bg-customLightblue text-white"><span class="page-link current"',
//                '<li class="flex justify-center items-center border border-customDarkWhite rounded-md px-3 gap-3"><span class="page-link pages"',
//                '<li class="flex justify-center items-center border border-customDarkWhite rounded-md px-3 gap-3"><span class="page-link extend"',
//                '</span></li>',
//                '</ul>',
        ], $html
        );
//        $contains = (bool) preg_match('/class="[^"]*\binsights\b[^"]*"/', $out);

//        $out = preg_replace('/(aria-current="page"|class="current")="\d*"\s/', "page-link flex justify-center items-center border border-customDarkWhite rounded-md px-3 py-1 gap-3 bg-customLightblue text-white",$out);
        return $out;
    }
}

if (!function_exists('mt_pagination')) {
    function mt_pagination($args = [])
    {
        global $wp_query;
        $max_num_pages = $wp_query->max_num_pages;
        $paged = get_query_var('paged');
        $defaults = [
            'echo' => true,
            'max_num_pages' => $max_num_pages,
        ];
        $args = wp_parse_args($args, $defaults);
        $html = '<div class="pagination-container">' . __('لطفا پلاگین wp_pagenavi را نصب کنید', 'widgetize') . '</div>';
        if (function_exists('wp_pagenavi')) {
            $html = '<div class="pagination-container">';
            if ($paged > 1) {
                $html .= '<a href="' . previous_posts(false) . '" class="page-link prev-link">' . __('قبلی ', 'widgetize') . '</a>';
            } else {
                $html .= '<div></div>';
            }
            $html .= wp_pagenavi(['echo' => false]);
            if ($paged < $max_num_pages) {
                $html .= '<a href="' . next_posts($max_num_pages, false) . '" class="page-link next-link">' . __('بعدی', 'widgetize') . '</a>';
            } else {
                $html .= '<div></div>';
            }
            $html .= '</div>';
        }

        if ($args['echo'] != true) {
            return $html;
        }
        echo $html;
        return null;

    }
}

if (!function_exists('mt_comment')) {
    function mt_comment($comment, $args, $depth)
    {
        global $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                echo '<li class="' . implode(' ', get_comment_class()) . '" id="li-comment-' .
                    get_comment_ID() .
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
                echo '<li class="' . implode(' ', get_comment_class()) . '" id="li-comment-' .
                    get_comment_ID() .
                    '" >';
//                $childArgs = [
//                    'post_id' => $post->ID, //main post id
//                    'parent' => get_comment_ID(), //the comment id
//                    'count' => true, //just count
//                ];
//                $childCount = get_comments($childArgs);
                ?>
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <div class="comment-meta-first">
                        <?php
                        printf('<div class="comment-avatar">%s</div>', get_avatar(get_comment_author(), '72'));
                        printf(
                            '<span class="comment-author" itemprop="name">%1$s</span>',
                            get_comment_author_link(),
                        );
                        printf(
                            '<time class="comment-date" datetime="%1$s">%2$s</time></a>',
                            get_comment_time('c'),
                            sprintf(
                                esc_html__('%1$s', 'widgetize'), get_comment_date('Y-m-d')
                            )
                        );
                        comment_reply_link(
                            array_merge(
                                $args, [
                                    'reply_text' => sprintf(
                                        '<span class="reply-text">%s</span>',
                                        __('Send Reply', 'widgetize')
                                    ),
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                ]
                            )
                        );
                        ?>
                    </div>
                    <section class="comment-content" itemprop="text">
                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation p-1 alert alert-info alert-link"><?php esc_html_e(
                                    'Your comment is awaiting moderation.',
                                    'widgetize'
                                ); ?></p>
                        <?php endif; ?>
                        <?php comment_text(); ?>
                    </section>
                </article>
                <?php
                break;
        endswitch;
    }
}
if (!function_exists('mt_move_comment_field_to_bottom')) {
    function mt_move_comment_field_to_bottom($fields)
    {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;

        return $fields;
    }

    add_filter('comment_form_fields', 'mt_move_comment_field_to_bottom');
}
if (!function_exists('change_js_view_cart_button')) {
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

if (!function_exists('mt_ajax_products')) {
    function mt_ajax_products($params = [])
    {

        $count = $params['count'];
        $category = $params['cat_id'];
        $products = new WP_Query([
            'post_type' => 'product',
            'posts_per_page' => $count,
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => [$category], /*category id*/
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

add_action('comment_post', 'mt_save_comment_meta_data');
if (!function_exists('mt_save_comment_meta_data')) {

    function mt_save_comment_meta_data($comment_id)
    {
        if ((isset($_POST['phone'])) && ($_POST['phone'] != ''))
            $phone = wp_filter_nohtml_kses($_POST['phone']);
        add_comment_meta($comment_id, 'phone', $phone);
    }
}

if (!function_exists('mt_add_meta_box')) {
    function mt_add_meta_box()
    {
        add_meta_box('title', __('Comment Metadata - Extend Comment'), 'mt_comment_meta_box', 'comment', 'normal', 'high');
    }
}
add_action('add_meta_boxes_comment', 'mt_add_meta_box');
if (!function_exists('mt_comment_meta_box')) {
    function mt_comment_meta_box($comment)
    {
        $phone = get_comment_meta($comment->comment_ID, 'phone', true);
        wp_nonce_field('mt_comment_update', 'mt_comment_update', false);
        ?>
        <p>
            <label for="phone"><?php _e('Phone'); ?></label>
            <input type="text" name="phone" value="<?php echo esc_attr($phone); ?>" class="widefat"/>
        </p>
        <?php
    }
}
if (!function_exists('mt_comment_edit_metafields')) {
    function mt_comment_edit_metafields($comment_id)
    {
        if (!isset($_POST['mt_comment_update']) || !wp_verify_nonce($_POST['mt_comment_update'], 'mt_comment_update')) return;

        if ((isset($_POST['phone'])) && ($_POST['phone'] != '')) :
            $phone = wp_filter_nohtml_kses($_POST['phone']);
            update_comment_meta($comment_id, 'phone', $phone);
        else :
            delete_comment_meta($comment_id, 'phone');
        endif;
    }
}
add_action('edit_comment', 'mt_comment_edit_metafields');
