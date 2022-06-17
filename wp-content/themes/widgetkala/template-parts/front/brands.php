<?php
$page_id = get_option('page_on_front');
if (have_rows('frontpage_brands', $page_id)) {
    ?>
    <div class="bg-customDarkblue my-7 w-full">
        <div class="brands-box">
            <div class="flex my-9 w-full gap-x-7 gap-y-4 justify-between flex-wrap md:flex-nowrap">
                <div class="flex flex-wrap gap-5">
                    <div class="flex text-white section-title">
                        <h3>
                            <?php _e('برند ها', 'widgetize'); ?>
                        </h3>
                    </div>
                </div>
                <div class="justify-end flex">
                    <a href="http://localhost/wordpress/" target="" class="custom-btn-secondary-outline">
                        <span class="flex items-center gap-2">
                           همه برند ها
                           <svg
                                   xmlns="http://www.w3.org/2000/svg" class="md:hidden flex" width="14.49"
                                   height="11.146" viewBox="0 0 14.49 11.146">
                            <path id="Path_15172" data-name="Path 15172"
                                  d="M27.91,18.8l-2.556,2.556v-9.57a1.115,1.115,0,1,0-2.229,0v9.57L20.569,18.8a1.114,1.114,0,1,0-1.576,1.576l4.458,4.458a1.114,1.114,0,0,0,1.576,0l4.458-4.458A1.114,1.114,0,1,0,27.91,18.8Z"
                                  transform="translate(25.156 -18.667) rotate(90)" fill="#50a8ea"></path>
                          </svg>
                        </span>
                    </a>
                </div>
            </div>


            <?php if (wp_is_mobile()) {
                echo '<div class="owl-carousel owl-theme owl-brands">';
            }else{ ?>
            <div class="mt-7 flex overflow-x-auto md:overflow-x-hidden md:grid gap-x-5 grid-cols-6">
                <?php } ?>
                <?php while (have_rows('frontpage_brands')) : the_row();
                    $image = get_sub_field('brand');
                    $link = get_sub_field('link')
                    ?>
                    <div class="item">
                        <?php
                        $before = $after = '';
                        if ($link) {
                            $before = '<a href="' . $link['url'] . '" target="' . $link['target'] . '">';
                            $after = '</a>';
                        }
                        if ($image) {
                            echo $before . wp_get_attachment_image($image, 'medium', false, ['class' => 'w-full grayscale flex rounded-five group-hover:grayscale-0']) . $after;
                        }
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php } ?>