<?php
$page_id = get_option('page_on_front');
if (have_rows('frontpage_bottom_advertises', $page_id) || have_rows('frontpage_bottom_buttons',$page_id)):?>
    <div class="bg-customLightblue my-7 w-full">
        <div class="container p-7 md:p-14 mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid gap-5 grid-cols-1 w-full">
            <?php if (have_rows('frontpage_bottom_advertises', $page_id)): ?>
                <div class="flex overflow-x-auto md:overflow-x-hidden md:grid gap-5 grid-cols-6">
                    <?php while (have_rows('frontpage_bottom_advertises',$page_id)): the_row();
                        $link   = get_sub_field('link');
                        $img    = get_sub_field('image');
                        $before = $after = '';
                        if (has_sub_field('link')) {
                            $before = '<a class="flex rounded-md overflow-hidden  min-w-full col-span-2" href="'.$link['url'].'" target="'.esc_attr($link['target']).'" title="'.$link['title'].'">';
                            $after  = '</a>';
                        }
                        echo $before.wp_get_attachment_image($img, 'full', false,
                                ['class' => 'w-full', 'alt' => $link['title']]).$after;

                    endwhile; ?>
                </div>
            <?php endif;
            if (have_rows('frontpage_bottom_buttons', $page_id)):?>
                <div class="flex overflow-x-auto mt-4 md:overflow-x-hidden md:grid gap-5 grid-cols-6">
                    <?php while (have_rows('frontpage_bottom_buttons',$page_id)) {
                        the_row();
                        $link = get_sub_field('link');?>
                        <a href="<?php echo esc_url($link['url']);?>"
                        class="btn-custom-white col-span-1 min-w-1/2 font-light text-white"
                        target="<?php echo esc_attr($link['target']);?>"><?php echo esc_attr($link['title']); ?></a>
                    <?php } ?>
                </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
<?php endif;