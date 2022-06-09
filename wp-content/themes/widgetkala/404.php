<?php
get_header();
$container_class = wp_parse_args(['error-404', '404'], ['container', 'mx-auto', 'px-4', 'sm:px-6', 'lg:px-8', 'product-section-container']);
$container_class = implode(' ', $container_class); ?>

    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="w-full p-4 sm:p-8 md:px-48">
            <div class="flex flex-col justify-center items-center">
                <h1 class="error-404 error-title">404</h1>
                <div class="w-full md:w-1/2">
                    <?php get_search_form(); ?>
                </div>
                <a href="<?php echo home_url(); ?>" class="return-to-home"><i class="icon icon-home"></i><span>برگشت به صفحه اصلی</span></a>
            </div>
        </div>
    </div>

<?php get_footer();