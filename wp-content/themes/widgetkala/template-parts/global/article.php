<div class="flex col-span-3 relative md:col-span-1">
    <div class="post-item">
        <a href="<?php the_permalink(); ?>" class="post-image-container">
            <?php the_post_thumbnail(
                'post_archive', ['class' => 'w-full rounded-md']
            ); ?>
            <div class="meta-data d-flex">
                <div class="category"><?php
                    $cats = [];
                    foreach (get_the_category() as $item) {
                        $cats[] = $item->name;
                    }
                    echo implode(',', $cats)
                    ?></div>
                <time datetime="<?php echo get_the_date('c'); ?>"
                      itemprop="datePublished"
                      class="date"><?php echo get_the_date(
                        'F j, Y'
                    ) ?></time>
            </div>
        </a>
        <div class="post-content">
            <h4 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="post-text"><?php the_excerpt(); ?></div>
        </div>
    </div>
</div>