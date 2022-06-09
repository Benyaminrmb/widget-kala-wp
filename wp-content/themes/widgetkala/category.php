<?php
get_header();
$container_class = wp_parse_args(['category-archive'], ['container', 'mx-auto', 'px-4', 'sm:px-6', 'lg:px-8', 'product-section-container']);
$container_class = implode(' ', $container_class); ?>

<div class="<?php echo esc_attr($container_class); ?>">
    <div class="w-full py-8">
        <div class="flex flex-col gap-7 justify-center items-center">
            <div class="archive-title">
                <i class="horizontalLines"></i>
                <h1 class="title pt-4"><?php single_cat_title(); ?></h1>
            </div>
            <div class="grid gap-7 grid-cols-3">
                <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part('template-parts/global/article');
                }
                ?>
            </div>

        </div>
    </div>
</div>

<?php get_footer();