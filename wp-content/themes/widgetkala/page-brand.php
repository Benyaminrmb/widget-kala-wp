<?php
/*
Template Name: brand template

Template Post Type: page
*/
get_header();
$container_class = wp_parse_args(['brands'], ['container', 'mx-auto', 'px-4', 'sm:px-6', 'lg:px-8']);
$container_class = implode(' ', $container_class);
$post_categories = get_field('articles_categories', get_the_ID());
$post_count = get_field('post_count', get_the_ID());

$brands = get_terms(['taxonomy' => 'product_brand', 'hide_empty' => false])

?>
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="w-full">
            <div class="grid gap-x-7 grid-cols-12 justify-between mb-10">
                <div class="col-span-6 md:col-span-9 flex gap-x-5"><span class="flex"><span class="horizontalLines"></span></span>
                    <?php the_title('<h1 class="flex text-gray-600 text-xl">', '</h1>') ?>
                </div>
                <div class="col-span-6 md:col-span-3 justify-end flex">
                    <form action="<?php echo home_url(); ?>" method="get" class="flex search-brands search-box">
                        <label for="search_query" class="hidden"></label>
                        <input placeholder="<?php echo esc_attr(__('برند مورد نظر خود را جستجو کنید', 'widgetize')); ?>" type="search" name="search_query" id="search_query" class="form-control search-input">
                        <span class="submit-button">
                            <button type="submit" class="btn search-submit"><span class="icon icon-search"></span><span class="sr-only"><?php echo esc_attr(__('جستجو', 'widgetize')); ?></span></button>
                        </span>
                    </form>
                </div>
            </div>
            <div class="main-brands-list">
                <?php
                if ($brands) {
                    foreach ($brands as $brand) {
                        get_template_part('template-parts/global/brand-item', null, ['brand' => $brand]);
                    }
                }
                ?>
            </div>

        </div>
    </div>
<?php
if ($post_categories && $post_count) {
    $articles = new WP_Query([
        'posts_per_page' => $post_count,
        'cat' => implode(',', $post_categories)
    ]);

    ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 md:mt-24 mt-10 mb-5 lg:mb-44">
        <div class="w-full md:flex hidden flex-col gap-12">
            <div class="grid gap-x-7 grid-cols-12 justify-between mb-1">
                <div class="col-span-6 md:col-span-10 flex gap-x-5"><span class="flex"><span class="horizontalLines"></span></span>
                    <div class="flex text-gray-600 text-xl">نقد و بررسی برندها</div>
                </div>
                <div class="col-span-6 md:col-span-2 justify-end flex">
                    <a href="<?php echo esc_url(get_term_link($post_categories[0])) ?>"
                       class="custom-btn-secondary-outline">
                        مقالات بیشتر را بخوانید
                    </a>
                </div>
            </div>
            <?php if (wp_is_mobile()) { ?>
                <?php if ($articles->have_posts()) { ?>
                    <div class="owl-carousel owl-theme owl-posts">
                    <?php
                    $index = 0;
                    while ($articles->have_posts()) {
                        $index++;
                        $articles->the_post();
                        get_template_part('template-parts/global/article');
                    }
                } ?>
                </div>
            <?php } else { ?>
                <div class="grid mt-1 gap-7 grid-cols-3">
                    <?php if ($articles->have_posts()) { ?>
                        <?php
                        $index = 0;
                        while ($articles->have_posts()) {
                            $index++;
                            $articles->the_post();
                            get_template_part('template-parts/global/article');
                        }
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
}
get_footer();