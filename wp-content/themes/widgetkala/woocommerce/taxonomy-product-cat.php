<?php get_header();
$current_cat = get_queried_object();
$image_id    = get_term_meta($current_cat->term_id, 'thumbnail_id', true); ?>
    <div class="grid grid-cols-12 gap-x-5">
        <div class="col-span-12 mt-7">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-x-5 gap-y-10 grid-cols-12">
                    <div class="hidden md:col-span-3 md:flex md:flex-wrap">
                        <div class="w-full flex h-full">
                            <?php echo wp_get_attachment_image($image_id, 'medium', false,
                                ['class' => 'w-full h-full border rounded-lg']); ?>
                        </div>
                    </div>
                    <div class="md:col-span-9 col-span-12 gap-5 flex flex-wrap flex-col justify-between">
                        <?php
                        $children_categories = get_terms([
                            'taxonomy' => 'product_cat', 'parent' => $current_cat->term_id, 'hide_empty' => false,
                            'order_by' => 'name'
                        ]);
                        if ($children_categories) {
                            ?>
                            <ul class="child-categories">
                                <?php foreach ($children_categories as $category) { ?>
                                    <li>
                                        <?php ?>
                                        <a href="<?php echo get_term_link($category); ?>"
                                           class="btn-custom-outline-dark-blue">
                                            <?php echo $category->name ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <div class="title-box-container">
                            <div class="flex flex-wrap gap-4 w-full justify-center">
                                <h1 class="category-title"><?php woocommerce_page_title(); ?></h1>
                                <div class="flex w-full">
                                    <div class="category-description">
                                        <?php
                                        if (get_field('short_description', 'product_cat_'.$current_cat->term_id)) {
                                            the_field('short_description', 'product_cat_'.$current_cat->term_id);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="scroll-to-products"><?php mt_svg_icon('arrow_down', [8, 11]) ?></a>
                        </div>
                    </div>
                    <?php wc_get_template_part('global/sidebar', 'filter-brands'); ?>
                    <div class="md:col-span-9 col-span-12 gap-4 md:gap-0 flex flex-wrap flex-col">
                        <?php do_action('mt_wc_cat_header'); ?>
                        <?php if (woocommerce_product_loop()) {
                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_before_shop_loop - 30
                             */

                            do_action('woocommerce_before_shop_loop');

                            woocommerce_product_loop_start();
                            ?>
                            <?php
                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
                                    the_post();

                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action('woocommerce_shop_loop');
                                    if (wp_is_mobile()) {
                                        wc_get_template_part('mobile/archive-product-item');
                                    } else {
                                        wc_get_template_part('content', 'product');
                                    }
                                }
                            }

                            woocommerce_product_loop_end();

                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action('woocommerce_after_shop_loop');
                        }
                        ?>
                        <div class="container description-container">
                            <?php echo $current_cat->description; ?>
                        </div>
                        <?php if (have_rows('faq', 'product_cat_'.$current_cat->term_id)) { ?>
                            <div class="faq-container">
                                <?php
                                while (have_rows('faq', 'product_cat_'.$current_cat->term_id)) {
                                    the_row();
                                    $question = get_sub_field('question');
                                    $answer   = get_sub_field('answer'); ?>
                                    <div class="faq-item">
                                        <div class="question flex items-center gap-4">
                                            <span class="question-icon flex">
                                            <svg id="_x31_7" xmlns="http://www.w3.org/2000/svg"
                                                 class="flex"
                                                 width="30.924" height="30.924" viewBox="0 0 30.924 30.924">
                                              <path id="Path_445" data-name="Path 445" d="M5.176,26.226a1.435,1.435,0,0,1-1.434-1.433V19.024C1.326,17.505,0,14.756,0,11.245,0,5.044,5.468,0,12.19,0S24.379,5.044,24.379,11.245,18.911,22.486,12.19,22.486c-.324,0-1.4.022-1.889.045L6.069,25.912a.5.5,0,0,1-.122.072A1.373,1.373,0,0,1,5.176,26.226ZM12.19,1C6.018,1,1,5.594,1,11.245c0,3.258,1.24,5.768,3.493,7.066a.5.5,0,0,1,.249.432v6.05a.42.42,0,0,0,.7.331.517.517,0,0,1,.105-.066L9.8,21.652a.5.5,0,0,1,.278-.108c.421-.028,1.758-.055,2.109-.055,6.171,0,11.192-4.6,11.192-10.245S18.361,1,12.19,1Z" fill="#2f3835"/>
                                              <path id="Path_446" data-name="Path 446" d="M49.65,48.678l-.446-.341-4.231-3.382c-.5-.021-1.574-.041-1.889-.041a12.736,12.736,0,0,1-8.256-2.987.5.5,0,1,1,.647-.759,11.734,11.734,0,0,0,7.609,2.75c.371,0,1.694.026,2.1.05l.158.009,4.485,3.57a.422.422,0,0,0,.7-.327V40.883l.249-.144c2.252-1.3,3.493-3.813,3.493-7.07a10.021,10.021,0,0,0-5.317-8.707.5.5,0,1,1,.492-.867,11,11,0,0,1,5.822,9.574c0,3.509-1.326,6.259-3.742,7.782V47.22A1.434,1.434,0,0,1,50.1,48.65a1.336,1.336,0,0,1-.393-.059Zm-12.4-14.256v-.016a.491.491,0,0,0-.5-.49.505.505,0,0,0-.5.507.5.5,0,0,0,1,0ZM37.2,32.251a4.656,4.656,0,0,1,.093-1.03,1.393,1.393,0,0,1,.216-.463,5.9,5.9,0,0,1,.777-.769,6.567,6.567,0,0,0,1.4-1.584,3.144,3.144,0,0,0,.4-1.547A3.216,3.216,0,0,0,38.978,24.4a4.1,4.1,0,0,0-2.868-.994,3.743,3.743,0,0,0-4,3.558.5.5,0,0,0,.434.555.492.492,0,0,0,.555-.434,2.758,2.758,0,0,1,3.011-2.682,3.1,3.1,0,0,1,2.195.733,2.228,2.228,0,0,1,.783,1.719,2.134,2.134,0,0,1-.269,1.064,5.788,5.788,0,0,1-1.194,1.322,6.8,6.8,0,0,0-.92.927,2.39,2.39,0,0,0-.374.791,5.656,5.656,0,0,0-.128,1.271.5.5,0,0,0,.489.508H36.7A.5.5,0,0,0,37.2,32.251Z" transform="translate(-24.35 -17.754)" fill="#50a8ea"/>
                                            </svg>

                                            </span>
                                            <span class="flex">
                                                <?php echo $question; ?>
                                            </span>
                                        </div>
                                        <div class="answer flex items-center gap-4">
                                            <span class="answer-icon">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="flex"
                                                 width="31.972" height="29.914" viewBox="0 0 31.972 29.914">
                                              <g id="_x39_" transform="translate(-0.001 -4.12)">
                                                <path id="Path_481" data-name="Path 481" d="M7.3,34.034a1.517,1.517,0,0,1-1.516-1.513V28.247H2.479A2.482,2.482,0,0,1,0,25.766V6.6A2.482,2.482,0,0,1,2.479,4.12H29.495A2.482,2.482,0,0,1,31.973,6.6V25.766a2.482,2.482,0,0,1-2.478,2.481H16.447l-8.3,5.532A.552.552,0,0,1,8,33.848,1.422,1.422,0,0,1,7.3,34.034ZM2.479,5.222A1.378,1.378,0,0,0,1.1,6.6V25.766a1.379,1.379,0,0,0,1.375,1.379H6.339a.551.551,0,0,1,.551.551v4.825a.413.413,0,0,0,.414.411.361.361,0,0,0,.212-.08.561.561,0,0,1,.13-.066l8.327-5.549a.553.553,0,0,1,.306-.093H29.495a1.378,1.378,0,0,0,1.375-1.379V6.6a1.379,1.379,0,0,0-1.375-1.379H2.479Z" fill="#2f3835"/>
                                                <path id="Path_482" data-name="Path 482" d="M42.88,40.232H23.449a.551.551,0,0,1,0-1.1H42.88a.551.551,0,0,1,0,1.1Zm0-4.961H23.449a.551.551,0,0,1,0-1.1H42.88a.551.551,0,0,1,0,1.1Zm0-4.961H23.449a.551.551,0,1,1,0-1.1H42.88a.551.551,0,1,1,0,1.1Z" transform="translate(-17.178 -18.821)" fill="#50a8ea"/>
                                              </g>
                                            </svg>


                                            </span>
                                            <span class="flex py-2  w-full border-t border-customDarkWhite">
                                                <?php echo $answer ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();