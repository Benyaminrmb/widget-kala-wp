<?php
$page_id = get_option('page_on_front');
if(have_rows('frontpage_brands',$page_id)){?>
<div class="bg-customDarkblue my-7 w-full">
    <div class="container p-14 mx-auto px-5 sm:px-6 lg:px-8"><h3 class="text-2xl text-white"><?php _e('برند ها','widgetize');?></h3>
        <div class="mt-7 grid gap-x-5 grid-cols-6">
            <?php while (have_rows('frontpage_brands')) : the_row();
            $image = get_sub_field('brand');
            $link = get_sub_field('link')
            ?>
            <div class="col-span-1 flex flex-wrap transition duration-150 group transform">
                <?php
                $before = $after = '';
                if($link){
                    $before = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
                    $after = '</a>';
                }
                if($image){
                    echo $before.wp_get_attachment_image($image,'medium',false,['class'=>'w-full grayscale flex rounded-md group-hover:grayscale-0']).$after;
                }
                ?>
            </div>
    <?php endwhile;?>
        </div>
    </div>
</div>
<?php }?>