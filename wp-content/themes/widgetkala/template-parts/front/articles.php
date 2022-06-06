<?php
$articles = new WP_Query([
    'posts_per_page'      => '4',
    'ignore_sticky_posts' => 1,
]);
$args     = array(
    // display the first sticky post, if none return the last post published
    'posts_per_page'      => 1,
    'post__in'            => get_option('sticky_posts'),
    'ignore_sticky_posts' => 0,
);
$sticky   = new WP_Query($args);
?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="w-full">
        <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
            <div class="col-span-10 flex gap-x-5"><span class="flex"><span
                            class="horizontalLines"></span></span>
                <div class="section-title">مقالات ما</div>
            </div>
            <div class="col-span-2 justify-end flex">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))) ?>"
                   class="custom-btn-secondary-outline">
                    مقالات بیشتر را بخوانید
                </a>
            </div>
        </div>
        <div class="grid mt-7 gap-7 grid-cols-3">
            <?php if ($sticky->have_posts()) {
                while ($sticky->have_posts()) {
                    $sticky->the_post(); ?>
                    <div class="flex col-span-1 relative">
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
            <?php if ($articles->have_posts()){ ?>
            <div class="grid gap-7 grid-rows-2 col-span-1 relative">
                <?php
                $index = 0;
                while ($articles->have_posts()) {
                    $index ++;
                    $articles->the_post(); ?>
                    <div class="grid grid-cols-7 gap-4 row-span-1 w-full border border-customDarkWhite rounded-md p-4">
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
                                <?php the_title('<h2 class="text-base font-medium"><a href="'.esc_url(get_permalink()).'">',
                                    '</a></h2>'); ?>
                            </div>
                            <div class="w-full">
                            <span class="text-justify text-sm">
                            <?php echo wp_trim_words(get_the_excerpt(),10,'&hellip;'); ?>
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
                    if($index == 2){
                        echo '</div><div class="grid gap-7 grid-rows-2 col-span-1 relative">';
                    }
                } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>