<?php get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="page-title-center">
                    <h1 class="text-center heading-with-icon mb-5"><?php the_title(); ?></h1>
                </div>
                <?php the_content(); ?><?php if (comments_open() || get_comments_number()) {
                    comments_template();
                } ?>
            </div>
        </article>
        <?php
    }
}
get_footer(); ?>