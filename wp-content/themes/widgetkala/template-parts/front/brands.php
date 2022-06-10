<?php
$page_id = get_option('page_on_front');
if(have_rows('frontpage_brands',$page_id)){?>
<div class="bg-customDarkblue my-7 w-full">
    <div class="brands-box">
        <h3 class="front-brands-title"><?php _e('برند ها','widgetize');?></h3>
        <?php if(wp_is_mobile()) {
            echo '<div class="owl-carousel owl-theme owl-brands">';
        }else{?>
        <div class="mt-7 flex overflow-x-auto md:overflow-x-hidden md:grid gap-x-5 grid-cols-6">
        <?php }?>
            <?php while (have_rows('frontpage_brands')) : the_row();
            $image = get_sub_field('brand');
            $link = get_sub_field('link')
            ?>
            <div class="item">
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