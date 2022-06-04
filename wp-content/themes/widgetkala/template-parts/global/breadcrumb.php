<div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-7">
    <?php if ( ! is_front_page()) { ?>
        <div class="w-full">
            <div class="grid gap-7 grid-cols-2 relative">
                <div class="col-span-1 flex breadcrumb-container bottom-0">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        echo '<div class="breadcrumb-title">'.__('شما در اینجا هستید','widgetize').'</div>';
                        yoast_breadcrumb();
                    } ?>

                </div>
                <div class="col-span-1 call-to-action-container">

                </div>
            </div>
        </div>
    <?php } ?>
</div>
