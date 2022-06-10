<div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-7">
    <?php if ( ! is_front_page()) { ?>
        <div class="w-full">
            <div class="grid md:gap-7 grid-cols-1 md:grid-cols-2 relative">
                <div class="breadcrumb-container">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        echo '<div class="hidden md:block breadcrumb-title">'.__('شما در اینجا هستید','widgetize').'</div>';
                        yoast_breadcrumb();
                    } ?>
                </div>
                <div class="call-to-action-container">
                    <span>اگر در مورد حین خرید سوال یا مشکلی برای شما پیش آمد با شماره پشتیبانی تماس بگیرید</span>
                    <span>۹۹۰۳ ۱۷۱ ۰۹۱۲</span>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
