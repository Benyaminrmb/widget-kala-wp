<?php
get_header();
$container_class = wp_parse_args([], ['container', 'mx-auto', 'px-4', 'sm:px-6', 'lg:px-8', 'product-section-container']);
$container_class = implode(' ', $container_class); ?>
<?php
$paged = get_query_var('paged');
if ($paged == '0') {
    $articles_args = [
        'posts_per_page' => '4',
        'ignore_sticky_posts' => 1,
    ];
    if (wp_is_mobile()) {
        $articles_args = [
            'posts_per_page' => '5',
        ];
    }
    $articles = new WP_Query($articles_args);
    $args = array(
        // display the first sticky post, if none return the last post published
        'posts_per_page' => 1,
        'post__in' => get_option('sticky_posts'),
        'ignore_sticky_posts' => 0,
    );
    $sticky = new WP_Query($args);
    $articles = new WP_Query($articles_args);
    $args = array(
        // display the first sticky post, if none return the last post published
        'posts_per_page' => 1,
        'post__in' => get_option('sticky_posts'),
        'ignore_sticky_posts' => 0,
    );
    $sticky = new WP_Query($args);

    ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="grid my-7 gap-x-7 grid-cols-12 justify-between">
                <div class="col-span-12 justify-between flex gap-x-5">
                    <div class="flex flex-wrap gap-4">
                        <span class="flex"><span class="horizontalLines"></span></span>
                        <div class="section-title">جدیدترین مقالات ما</div>
                    </div>
                </div>
            </div>
            <?php if (wp_is_mobile()) {
                if ($articles->have_posts()) { ?>
                    <div class="owl-carousel  owl-theme owl-posts">
                        <?php while ($articles->have_posts()) {
                            $articles->the_post(); ?>
                            <div class="item">
                                <div class="grid min-w-full grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
                                    <div class="grid justify-center text-xl font-thin items-center grid-rows-2 col-span-2 w-full h-full bg-customLightSky rounded-md">
                                        <div class="flex h-full border-b-2 border-gray-100 row-span-1 items-center justify-center">
                                            <?php the_time('d'); ?>
                                        </div>
                                        <div class="flex h-full row-span-1 items-center justify-center">
                                            <?php the_time('F'); ?>
                                        </div>
                                    </div>
                                    <div class="col-span-5 font-thin gap-4 flex flex-wrap">
                                        <div class="w-full">
                                            <?php the_title('<h2 class="text-base font-medium"><a href="' . esc_url(get_permalink()) . '">',
                                                '</a></h2>'); ?>
                                        </div>
                                        <div class="w-full">
                                            <span class="text-justify text-sm">
                                                <?php echo wp_trim_words(get_the_excerpt(), 10, '&hellip;'); ?>
                                            </span>
                                        </div>
                                        <div class="w-full justify-between flex">
                                            <div class="flex items-center text-gray-500 gap-x-2">
                                                <span class="icon text-base icon-file"></span>
                                                <span class="text-xs"><?php the_category(' '); ?></span>
                                            </div>
                                            <div class="flex items-center text-gray-500 gap-x-2">
                                                <span class="icon text-base icon-clock"></span>
                                                <span class="text-xs"><?php echo mt_reading_time(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
            } else { ?>
                <div class="md:grid flex overflow-y-hidden overflow-x-auto md:overflow-hidden mt-7 gap-7 grid-cols-3">
                <?php if ($sticky->have_posts()) {
                    while ($sticky->have_posts()) {
                        $sticky->the_post(); ?>
                        <div class="hidden md:flex col-span-1 relative">
                            <div class="flex w-full">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('large', ['class' => 'rounded-md w-full']);
                                    ?>
                                    <!--                    <img src="/_nuxt/img/blog1.1055fb6.png" alt class="rounded-md w-full">-->
                                <?php } ?>
                            </div>
                            <div class="absolute rounded-md text-over-image bottom-0 text-center inset-x-0"><h2
                                        class="text-white mb-2 text-xl"><a
                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="flex justify-center"><span
                                            class="bg-white flex items-center px-2 crooked-line relative text-xl"><span
                                                class="flex"><?php the_category(', '); ?></span> <span
                                                class="icon text-xl flex icon-book"></span></span></div>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_query();

                ?>
                <?php if ($articles->have_posts()) { ?>
                    <div class="flex md:grid  gap-7 grid-rows-2 col-span-1 relative">
                        <?php
                        $index = 0;
                        while ($articles->have_posts()) {
                            $index++;
                            $articles->the_post(); ?>
                            <div class="grid min-w-full grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
                                <div class="grid justify-center text-22  items-center grid-rows-2 col-span-2 w-full h-full bg-customLightSky rounded-md">
                                    <div class="flex h-full border-b-2 border-gray-100 row-span-1 items-center justify-center">
                                        <?php the_time('d'); ?>
                                    </div>
                                    <div class="flex h-full row-span-1 items-center justify-center">
                                        <?php the_time('F'); ?>
                                    </div>
                                </div>
                                <div class="col-span-5 font-thin gap-4 flex flex-wrap">
                                    <div class="w-full">
                                        <?php the_title('<h2 class="text-base font-medium"><a href="' . esc_url(get_permalink()) . '">',
                                            '</a></h2>'); ?>
                                    </div>
                                    <div class="w-full">
                            <span class="text-justify text-sm">
                            <?php echo wp_trim_words(get_the_excerpt(), 10, '&hellip;'); ?>
                            </span></div>
                                    <div class="w-full justify-between flex">
                                        <div class="flex items-center text-gray-500 gap-x-2"><span
                                                    class="icon text-base icon-file"></span> <span
                                                    class="text-xs"><?php the_category(' '); ?></span></div>
                                        <div class="flex items-center text-gray-500 gap-x-2"><span
                                                    class="icon text-base icon-clock"></span> <span
                                                    class="text-xs"><?php echo mt_reading_time(); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($index == 2) {
                                echo '</div><div class="grid gap-7 grid-rows-2 col-span-1 relative">';
                            }
                        } ?>
                    </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

<?php }
wp_reset_query();
wp_reset_postdata(); ?>
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="w-full py-8">
            <div class="flex flex-col gap-7 justify-center">
                <div class="col-span-12 justify-between flex gap-x-5">
                    <div class="flex flex-wrap gap-4">
                        <span class="flex"><span class="horizontalLines"></span></span>
                        <h1 class="section-title">همه مقالات ما</h1>
                    </div>
                </div>
<!--                <div class="archive-title">-->
<!--                    <i class="horizontalLines"></i>-->
<!--                    <h1 class="title pt-4">همه مقالات ما</h1>-->
<!--                </div>-->
                <div class="grid gap-x-6 gap-y-12 grid-cols-3">
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/global/article');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();