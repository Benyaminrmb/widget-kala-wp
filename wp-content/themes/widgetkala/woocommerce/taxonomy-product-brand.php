<?php get_header();
$current_cat = get_queried_object();
$image_id    = get_term_meta($current_cat->term_id, 'thumbnail_id', true);
?>
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
                    <div class="col-span-12 md:col-span-9 gap-5 flex flex-wrap flex-col justify-start">
                        <div class="relative w-full flex flex-wrap border border-customGray rounded-md p-5">
                            <div class="flex flex-wrap gap-4 w-full justify-center">
                                <h1 class="category-title"><?php woocommerce_page_title(); ?></h1>
                                <div class="flex w-full">
                                    <div class="category-description">
                                        <?php
                                        if (get_field('short_description', 'product_cat_'.$current_cat->term_id)) {
                                            the_field('short_description', 'product_cat_'.$current_cat->term_id);
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="scroll-to-description"><?php mt_svg_icon('arrow_down', [8, 11]) ?></a>
                        </div>
                    </div>
                    <?php wc_get_template_part('global/sidebar', 'filter-categories'); ?>
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
                        if ($current_cat->description) { ?>
                            <div id="category-description" class="container description-container">
                                <?php echo $current_cat->description; ?>
                            </div>
                            <?php
                        }
                        if (have_rows('faq', 'product_cat_'.$current_cat->term_id)) { ?>
                            <div class="faq-container">
                                <?php
                                while (have_rows('faq', 'product_cat_'.$current_cat->term_id)) {
                                    the_row();
                                    $question = get_sub_field('question');
                                    $answer   = get_sub_field('answer'); ?>
                                    <div class="faq-item">
                                        <div class="question flex items-center gap-4">
                                            <span class="question-icon flex"><?php mt_svg_icon('question', 30); ?></span>
                                            <span class="flex">
                                                <?php echo $question; ?>
                                            </span>
                                        </div>
                                        <div class="answer flex items-center gap-4">
                                            <span class="answer-icon"><?php mt_svg_icon('answer', 30); ?></span>
                                            <span class="flex py-2  w-full border-t border-customDarkWhite">
                                                <?php echo $answer ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        <?php } ?>

                    </div><!--col-span-9-->
                </div>
            </div>
        </div>
    </div>
<?php get_footer();