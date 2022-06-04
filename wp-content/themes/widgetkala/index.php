<?php get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
            <div class="container">
                <?php the_title(); ?>
                <?php the_content(); ?><?php if (comments_open() || get_comments_number()) {
                    comments_template();
                } ?>
            </div>
        </article>
        <?php
    }
}
get_footer(); ?>