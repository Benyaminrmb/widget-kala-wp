<?php get_header();
while (have_posts()): the_post();
    ?>

    <div class="col-span-12 mt-7">
        <div class="container mx-auto px-4 sm:px-6 lg:px-44 single-post-container">
            <div class="grid gap-5 grid-cols-12">
                <div class="col-span-12 gap-5 flex flex-wrap flex-col">
                    <div class="flex flex-wrap gap-4 w-full">
                        <?php the_title('<h1 class="post-title">', '</h1>'); ?>
                    </div>

                    <div class="single-content">
                        <div class="single-top-container">
                            <div class="single-meta-container">
                                <div class="flex flex-wrap w-full gap-12 pb-4 justify-between md:justify-start ">
                                    <div class="flex justify-center gap-3">
                                        <?php mt_svg_icon('calendar', [18, 15]); ?>
                                        <span class="flex text-xs text-customGray"><?php echo sprintf(__('منتشر شده در : %s', 'widgetize'), get_the_date()); ?></span>
                                    </div>

                                    <div class="flex justify-center gap-3">
                                        <?php
                                        mt_svg_icon('clock');
                                        echo sprintf(
                                            '<div class="flex text-xs text-customGray"><span class="key">%1$s </span>
                                    <span class="value">%2$s</span></div>',
                                            __('مدت زمان مطالعه :', 'widgetize'), mt_reading_time()
                                        ); ?>

                                    </div>
                                </div>
                                <div class="flex flex-wrap md:flex-nowrap gap-4 items-stretch py-4 border-y border-y-customGray/50">
                                    <div class="md:w-auto w-full h-full flex-grow flex flex-col gap-4 md:gap-8">
                                        <div class="flex gap-4"><?php
                                            printf(
                                                '<span class="meta-title"> %1$s</span><div class="meta-value">%2$s</div>',
                                                __('دسته بندی مطالب : ', 'widgetize'),
                                                get_the_category_list('<span class="separator"></span>')
                                            );
                                            ?></div>
                                        <div class="flex gap-4"><?php
                                            printf(
                                                '<span class="meta-title"> %1$s</span><div class="meta-value">%2$s</div>',
                                                __('برچسب : ', 'widgetize'),
                                                get_the_tag_list('', '<span class="separator"></span>')
                                            );
                                            ?></div>
                                    </div>
                                    <div class="h-full md:flex hidden">
                                        <div class="flex flex-col gap-8">
                                        <span class="meta-title">
                                          اشتراک گذاری این مطلب
                                      </span>
                                            <?php echo mt_share_links(get_permalink()); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-image-container">

                                <?php the_post_thumbnail(
                                    'post_archive', ['class' => 'img-fluid w-full']
                                ); ?>
                            </div>
                        </div>

                        <div class="post-content">
                            <?php the_content(); ?>
                            <?php
                            if (have_rows('faq')) { ?>
                                <h2 class="faq-title"><?php _e('پرسش و پاسخ های متداول', 'widgetize'); ?></h2>
                                <ol>
                                    <?php while (have_rows('faq')) {
                                        the_row(); ?>
                                        <li>
                                            <strong><?php the_sub_field('question'); ?></strong>
                                            <p><?php the_sub_field('answer'); ?></p>
                                        </li>
                                    <?php } ?>
                                </ol>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <?php get_template_part('template-parts/post/related-posts'); ?>

            <?php if (comments_open() || get_comments_number()) {
                comments_template();
            } ?>
        </div>

    </div>

<?php
endwhile;
get_footer();
?>