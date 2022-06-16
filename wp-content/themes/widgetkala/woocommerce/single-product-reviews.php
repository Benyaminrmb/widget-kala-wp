<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined('ABSPATH') || exit;

global $product;

if (!comments_open()) {
    return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
    <div id="comments">
        <h2 class="woocommerce-Reviews-title">
            <?php
            $count = $product->get_review_count();
            if ($count && wc_review_ratings_enabled()) {
                /* translators: 1: reviews count 2: product name */
                $reviews_title = sprintf(esc_html(_n('%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce')), esc_html($count), '<span>' . get_the_title() . '</span>');
                echo apply_filters('woocommerce_reviews_title', $reviews_title, $count, $product); // WPCS: XSS ok.
            } else {
                esc_html_e('Reviews', 'woocommerce');
            }
            ?>
        </h2>

        <?php if (have_comments()) : ?>
            <ol class="commentlist">
                <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
            </ol>

            <?php
            if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                echo '<nav class="woocommerce-pagination">';
                paginate_comments_links(
                    apply_filters(
                        'woocommerce_comment_pagination_args',
                        array(
                            'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                            'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                            'type' => 'list',
                        )
                    )
                );
                echo '</nav>';
            endif;
            ?>
        <?php else : ?>
            <div class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'woocommerce'); ?></div>
        <?php endif; ?>
    </div>

    <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>
        <div id="review_form_wrapper" class="comments comments-area px-1">
            <div id="review_form">
                <?php
                $commenter = wp_get_current_commenter();
                $comment_form = array(
                    /* translators: %s is product title */
                    'title_reply' => have_comments() ? esc_html__('Add a review', 'woocommerce') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'woocommerce'), get_the_title()),
                    /* translators: %s is product title */
                    'title_reply_to' => esc_html__('Leave a Reply to %s', 'woocommerce'),
                    'title_reply_before' => '<span id="reply-title" class="comment-reply-title">',
                    'title_reply_after' => '</span>',
                    'comment_notes_after' => '',
                    'label_submit' => esc_html__('Submit', 'woocommerce'),
                    'logged_in_as' => '',
                    'comment_field' => '',
                );

                $name_email_required = (bool)get_option('require_name_email', 1);
                $fields = array(
                    'author' => array(
                        'label' => __('Name', 'woocommerce'),
                        'type' => 'text',
                        'value' => $commenter['comment_author'],
                        'required' => $name_email_required,
                    ),
                    'email' => array(
                        'label' => __('Email', 'woocommerce'),
                        'type' => 'email',
                        'value' => $commenter['comment_author_email'],
                        'required' => $name_email_required,
                    ),
                    'phone' => [
                        'label' => __('موبایل', 'widgetize'),
                        'type' => 'text',
                        'value' => ''
                    ]
                );

                $comment_form['fields'] = array();

                foreach ($fields as $key => $field) {
                    $field_html = '';
                    if($key == 'author'){
                        $field_html .= '<div class="commenter-data-container">' .
                            '<div class="comment-data">' .
                            '<div class="flex flex-col gap-4 w-full">';
                    }
                    $field_html .= '<div class="comment-form-' . esc_attr($key) . '">';
                    $field_html .= '<label class="hidden" for="' . esc_attr($key) . '">' . esc_html($field['label']);

                    if ($field['required']) {
                        $field_html .= '&nbsp;<span class="required">*</span>';
                    }

                    $field_html .= '</label><input id="' . esc_attr($key) . '" class="form-control" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" ' . ($field['required'] ? 'required' : '') . ' /></div>';

                    if($key == 'phone'){
                        $field_html .= '</div>' .
                            '</div>';
                    }

                    $comment_form['fields'][$key] = $field_html;
                }

                $account_page_url = wc_get_page_permalink('myaccount');
                if ($account_page_url) {
                    /* translators: %s opening and closing link tags respectively */
                    $comment_form['must_log_in'] = '<div class="col-span-4 row-span-3 must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'woocommerce'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</div>';
                }
                $comment_form['comment_field'] = '';
                $comment_form['comment_field'] .= '<div class="col-span-8 row-span-3 comment-form-comment"><label for="comment">' . esc_html__('Your review', 'woocommerce') . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" class="form-control" rows="4" required></textarea></div></div>';

//                comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                ?>

                <div class="container-fluid comment-form-container">
                    <?php
                    $consent = empty($commenter[ 'comment_author_email' ]) ? 'yes' :
                        'no';
                    $comment_form =                         [
                        'title_reply_before'   => '<div class="title-container hidden"><h4 id="reply-title" class="heading-with-icon comment-reply-title">',
                        'title_reply_after'    => '</h4></div>',
                        'comment_notes_after'  => '',
                        'comment_notes_before' => '',
                        'fields'               => apply_filters(
                            'comment_form_default_fields', [
                                'author'  => '<div class="form-col author-detail">' .
                                    '<div class="comment-form-author form-group col-md-6 col-sm-12">' .
                                    '<input id="author" name="author" type="text"
								            value="' . esc_attr($commenter[ 'comment_author' ]) . '" 
								            class="form-control" 
								            placeholder="' . esc_attr__('Fullname', 'widgetize') .
                                    '" />' .
                                    '<span class="svg-icon">' .
                                    mt_svg_icon('author',[15,14],false) .
                                    '</span>' .
                                    '</div>',
                                'email'   => '<div class="comment-form-email form-group col-md-6 col-sm-12">' .
                                    '<input id="email" name="email" type="email"
                                            value="' .
                                    esc_attr($commenter[ 'comment_author_email' ]) . '"
                                            class="form-control" 
                                            placeholder="' . esc_attr__('Email Address', 'widgetize') .
                                    '" />' .
                                    '<span class="svg-icon">' .
                                    mt_svg_icon('mail',[13,10],false) .
                                    '</span>' .
                                    '</div>',
                                'url'     => '',
                                'cookies' => '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="' .
                                    $consent . '"/>',
                                'phone'=>'<div class="comment-form-phone form-group col-md-6 col-sm-12">' .
                                    '<input id="phone" name="phone" type="text" class="form-control" placeholder="' . esc_attr__('Phone', 'widgetize') .
                                    '" />' .
                                    '<span class="svg-icon">' .
                                    mt_svg_icon('chat',[12,14],false) .
                                    '</span>' .
                                    '</div>'.
                                    '</div>',
                            ]
                        ),
                        'comment_field'        => '<div class="form-col comment-textbox">' .
                            '<div class="form-group col-md-12">' .
                            '<textarea id="comment" name="comment" cols="45" rows="6" aria-required="true" class="form-control"  placeholder="' .
                            esc_attr__('Comment', 'widgetize') . '"></textarea>' .
                            '<span class="svg-icon">' .
                            mt_svg_icon('chat_bobble',[15,11],false) .
                            '</span>' .
                            '</div>' .
                            '</div>',
                        'submit_field'         => '<div class="form-submit form-group">%1$s %2$s</div>',
                        'label_submit'         => __('Send Comment', 'widgetize'),
                        'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-it-blue btn-submit px-4 %3$s" >%4$s</button>',
                        'cancel_reply_link'    => '&times',
                        'format'               => 'html5',
                    ];
                    if (wc_review_ratings_enabled()) {
                        $comment_form['submit_button'] .= '<div class="comment-form-rating">' .
                            '<label for="rating">' . esc_html__('Your rating', 'woocommerce') . (wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '') . '</label>' .
                            '<select name="rating" id="rating" required>' .
                            '<option value="">' . esc_html__('Rate&hellip;', 'woocommerce') . '</option>' .
                            '<option value="5">' . esc_html__('Perfect', 'woocommerce') . '</option>' .
                            '<option value="4">' . esc_html__('Good', 'woocommerce') . '</option>' .
                            '<option value="3">' . esc_html__('Average', 'woocommerce') . '</option>' .
                            '<option value="2">' . esc_html__('Not that bad', 'woocommerce') . '</option>' .
                            '<option value="1">' . esc_html__('Very poor', 'woocommerce') . '</option>' .
                            '</select></div>';
                    }

                    comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                    ?>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></div>
    <?php endif; ?>

    <div class="clear"></div>
</div>
