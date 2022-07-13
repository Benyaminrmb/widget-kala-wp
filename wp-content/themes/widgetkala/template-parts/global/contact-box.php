<?php if (wp_is_mobile()) { ?>
    <section class="contact-box">
        <!--        <div class="flex items-center justify-center w-full">-->
        <!--            <a href="tel:02191010500">-->
        <!--                <i class="icon icon-call text-22 text-white float-right ml-2"></i>-->
        <!--                <span class="align-bottom">021-91010500</span>-->
        <!--            </a>-->
        <!--        </div>-->
        <div class="address-item">
            <address>
                <i class="icon icon-pin"></i>
                بندردیلم خیابان پاسداران نبش کوچه فاطمی فروشگاه فاطمی
            </address>
            <span class="tel">
                <a href="tel:07733240250">07733240250</a>
                <a href="tel:09121719903">09121719903</a>
            </span>
        </div>
        <div class="address-item">
            <address>
                <i class="icon icon-pin"></i>
                بندردیلم خیابان ساحلی پاساژ دریملند پلاک۱۰
            </address>
            <span class="tel"><a href="tel:+989173708740">09173708740</a></span>
        </div>
        <div class="address-item">
            <address>
                <i class="icon icon-pin"></i>
                10 Street 24, Al Murar, Dubai, United Arab Emirates
            </address>
            <span class="tel"><a href="tel:+971545661265">+971 54 566 1265</a></span>
        </div>
        <small class="text-center text-white-50 w-full">هفت روز هفته از ساعت 10 صبح تا 8 شب پاسخگوی شما هستیم.</small>
    </section>
<?php } else { ?>
    <div class="contact-box desktop">
        <img src="<?php mt_asset('images/contact-box-bg.jpg') ?>" class="box-img">
        <div class="content">
            <div class="w-1/2 flex flex-col justify-center px-12">
                <div class="address-item">
                    <address>
                        <i class="icon icon-pin"></i>
                        بندردیلم خیابان پاسداران نبش کوچه فاطمی فروشگاه فاطمی
                    </address>
                    <span class="tel"><a href="tel:07733240250">07733240250</a>
                        <a href="tel:09121719903">09121719903</a></span>
                </div>
                <div class="address-item">
                    <address>
                        <i class="icon icon-pin"></i>
                        بندردیلم خیابان ساحلی پاساژ دریملند پلاک۱۰
                    </address>
                    <span class="tel"><a href="tel:+989173708740">09173708740</a></span>
                </div>
                <div class="address-item">
                    <address>
                        <i class="icon icon-pin"></i>
                        10 Street 24, Al Murar, Dubai, United Arab Emirates
                    </address>
                    <span class="tel"><a href="tel:+971545661265">+971 54 566 1265</a></span>
                </div>
            </div>
            <div class="w-1/2 p-12 text-center border-r-[3px_solid_white]">
                <?php
                if (have_rows('footer_social_links', 'options')) { ?>
                <h5 class="mt-4 mb-4">مارا در شبکه های اجتماعی دنبال کنید:</h5>
                <ul class="social-list">
                    <?php while (have_rows('footer_social_links', 'options')) {
                        the_row();
                        $social_link = get_sub_field('social_link');
                        $social_icon = get_sub_field('social_icon');
                        if ($social_link && $social_icon) {
                            echo '
<div id="tooltip-'.$social_icon.'" role="tooltip" class="tooltip tooltip-customRed">
'.$social_icon.'
<div class="tooltip-arrow" data-popper-arrow></div>
</div>
<li data-tooltip-target="tooltip-'.$social_icon.'"><a class="social-link-item" target="'.$social_link['target'].'" href="'.$social_link['url'].'">
'.mt_svg_icon($social_icon, 32, false).'</a></li>';
                        }
                    } ?>
                </ul>
            </div>
            <?php }
            ?>


            <li title="" data-toggle="tooltip" data-placement="bottom" data-original-title="اینستاگرام"><a href="https://www.instagram.com/pspro.ir/" target="_blank"><i class="icon-font icon-font-instagram"></i></a></li>
            <li title="" data-toggle="tooltip" data-placement="bottom" data-original-title="تلگرام"><a href="http://t.me/pspro" target="_blank"><i class="icon-font icon-font-telegram"></i></a></li>
            <li title="" data-toggle="tooltip" data-placement="bottom" data-original-title="توییتر"><a href="https://twitter.com/psproir" target="_blank"><i class="icon-font icon-font-twitter"></i></a></li>
            <li title="" data-toggle="tooltip" data-placement="bottom" data-original-title="یوتیوب"><a href="https://www.youtube.com/channel/UCEzT6U4u8331UkPBx5nOe2A?sub_confirmation=1" target="_blank"><i class="icon-font icon-font-youtube"></i></a></li>

        </div>
    </div>
<?php } ?>