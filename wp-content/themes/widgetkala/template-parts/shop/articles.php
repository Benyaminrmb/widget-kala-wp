<?php
$articles = new WP_Query([
    'posts_per_page'      => '3',
    'ignore_sticky_posts' => 1,
]);
?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="w-full">
        <div class="grid mt-7 gap-x-7 grid-cols-12 justify-between">
            <div class="col-span-10 flex gap-x-5"><span class="flex"><span
                            class="icon text-3xl icon-shield"></span></span>
                <div class="flex text-gray-600 text-2xl">مقالات ما</div>
            </div>
            <div class="col-span-2 justify-end flex">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))) ?>"
                   class="custom-btn-secondary-outline">
                    مقالات بیشتر را بخوانید
                </a>
            </div>
        </div>
        <div class="grid mt-7 gap-7 grid-cols-3">
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
    </div>
</div>