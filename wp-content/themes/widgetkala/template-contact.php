<?php
/*
Template Name: Contact us template

Template Post Type: page
*/
get_header();

?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="page-title-center my-6 md:my-12">
            <h1 class="text-center heading-with-icon mb-5">تماس با ما</h1>
        </div>
        <div class="grid grid-cols-12 gap-8 w-full ">
            <div class="block order-2 md:order-1 flex-wrap col-span-12 md:col-span-6">
                <div class="flex flex-wrap w-full gap-5 main-contact-form">
                   <span class="w-full text-bold text-base_22 text-customDarkblue2">
                       با ما در ارتباط باشید
                   </span>

                    <span class="w-full  text-base_16 text-customBlack">
                        صنعت چاپ و با استفاده صنعت چاپ و با استفاده صنعت چاپ و با استفاده صنعت چاپ و با استفاده صنعت چاپ و با استفاده صنعت چاپ و با استفاده صنعت
                   </span>
                    <?php $form_code = get_field('contact_form_code');
                   echo do_shortcode($form_code);
                   ?>


                    
                </div>
            </div>
            <div class="block order-1 md:order-2 flex-wrap col-span-12 md:col-span-6  gap-5">
                <div class="flex flex-wrap w-full">
                    <img src="<?php bloginfo('template_url'); ?>/map.png" style="height: 480px" class="w-full flex flex-wrap" alt="">
                </div>
                <div class="flex justify-between w-full gap-x-3 mt-4 ">
                    <div class="hidden md:flex gap-x-3 w-full">
                        <div class="flex">
                           <span class="text-base text-customGray">
                               ما را در شبکه های اجتماعی دنبال کنید
                           </span>
                        </div>
                    </div>
                    <div class="hidden md:flex w-full md:w-auto">
                        <div class="flex gap-x-3 w-full md:w-auto justify-center">
                            <?php
                            if (have_rows('footer_social_links', 'options')) {
                                while (have_rows('footer_social_links', 'options')) {
                                    the_row();
                                    $social_link = get_sub_field('social_link');
                                    $social_icon = get_sub_field('social_icon');
                                    if ($social_link && $social_icon) {
                                        echo '<span class="flex"><a target="' . $social_link['target'] . '" href="' . $social_link['url'] . '">' . mt_svg_icon($social_icon,
                                                24, false) . '</a></span>';
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

get_footer();