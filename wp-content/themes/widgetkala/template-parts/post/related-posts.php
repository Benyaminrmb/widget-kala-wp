<?php
global $post;
$category      = $post->post_category;
$arguments     = [
	'post_type'           => 'post',
	'category__in'        => wp_get_post_categories(get_the_ID()),
	'post__not_in'        => [ get_the_ID() ],
	'posts_per_page'      => 4,
	'ignore_sticky_posts' => 1,
	'orderby'             => 'date',
];
$related_posts = new WP_Query($arguments);
if ( $related_posts->have_posts() ) :
	?>
	<div class="related-posts mt-3">
		<h3 class="heading-with-icon"><?php _e(
				'مقالات مرتبط', 'widgetize'
			); ?></h3>
		<div class="container-fluid">
			<div class="grid gap-7 grid-cols-3">
				<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
					<?php get_template_part('template-parts/global/article') ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<?php
	wp_reset_postdata();
endif;
