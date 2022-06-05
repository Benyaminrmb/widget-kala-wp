<?php get_header();
while (have_posts()): the_post();
    ?>

    <div class="col-span-12 mt-7">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-5 grid-cols-12">
                <div class="col-span-12 gap-5 flex flex-wrap flex-col">
                    <div class="flex flex-wrap gap-4 w-full">
                        <h1 class="horizontalLines text-customDarkblue mr-10 cursor-pointer text-xl font-light leading-7">
                            <?php the_title(); ?>
                        </h1>
                    </div>

                    <div
                            class="grid bg-customLightgray3 p-6 px-9 grid-cols-12 rounded-md gap-4 w-full border-customLightgray2 border">
                        <div class="block flex-wrap col-span-8">
                            <div class="flex flex-wrap w-full gap-12 pb-4">
                                <div class="flex justify-center gap-3">
                                    <svg
                                            class="flex"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18.783"
                                            height="15.653"
                                            viewBox="0 0 18.783 15.653">
                                        <g
                                                id="_18_Calendar"
                                                data-name="18_Calendar"
                                                transform="translate(0 -5.333)">
                                            <path
                                                    id="Path_182"
                                                    data-name="Path 182"
                                                    d="M14.87,6.9h-.783V6.116a.783.783,0,1,0-1.565,0V6.9H10.174V6.116a.783.783,0,1,0-1.565,0V6.9H6.261V6.116a.783.783,0,0,0-1.565,0V6.9H3.913A3.918,3.918,0,0,0,0,10.812v6.261a3.918,3.918,0,0,0,3.913,3.913H14.87a3.918,3.918,0,0,0,3.913-3.913V10.812A3.918,3.918,0,0,0,14.87,6.9Zm2.348,10.174a2.35,2.35,0,0,1-2.348,2.348H3.913a2.35,2.35,0,0,1-2.348-2.348V10.812A2.35,2.35,0,0,1,3.913,8.464H14.87a2.35,2.35,0,0,1,2.348,2.348Z"
                                                    fill="#9195a0"/>
                                            <path
                                                    id="Path_183"
                                                    data-name="Path 183"
                                                    d="M22.406,24H11.449a.783.783,0,1,0,0,1.565H22.406a.783.783,0,1,0,0-1.565Z"
                                                    transform="translate(-7.536 -13.188)"
                                                    fill="#9195a0"/>
                                        </g>
                                    </svg>

                                    <span class="flex text-xs text-customGray">
                    منتشر شده در تاریخ 12 اردیبهشت
                  </span>
                                </div>

                                <div class="flex justify-center gap-3">
                                    <svg
                                            class="flex"
                                            id="_22_Delivery_Time"
                                            data-name="22_Delivery Time"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="15.902"
                                            height="15.905"
                                            viewBox="0 0 15.902 15.905">
                                        <path
                                                id="Path_40"
                                                data-name="Path 40"
                                                d="M15.228,5.6V4.112h1.446a.723.723,0,1,0,0-1.446H12.337a.723.723,0,1,0,0,1.446h1.446V5.6a6.505,6.505,0,1,0,1.446,0Zm-.723,11.523a5.06,5.06,0,1,1,5.06-5.06A5.06,5.06,0,0,1,14.505,17.123Z"
                                                transform="translate(-6.554 -2.667)"
                                                fill="#9195a0"/>
                                        <path
                                                id="Path_41"
                                                data-name="Path 41"
                                                d="M30.779,27.315V24.723a.723.723,0,1,0-1.446,0v2.891a.723.723,0,0,0,.212.511l2.169,2.169a.723.723,0,1,0,1.022-1.022Z"
                                                transform="translate(-22.105 -18.217)"
                                                fill="#9195a0"/>
                                        <path
                                                id="Path_42"
                                                data-name="Path 42"
                                                d="M6.792,10.878a.723.723,0,0,0-1.022,0L2.878,13.77A.723.723,0,1,0,3.9,14.792L6.792,11.9A.723.723,0,0,0,6.792,10.878Z"
                                                transform="translate(-2.666 -8.498)"
                                                fill="#9195a0"/>
                                        <path
                                                id="Path_43"
                                                data-name="Path 43"
                                                d="M49.458,13.769l-2.892-2.891A.723.723,0,1,0,45.545,11.9l2.891,2.891a.723.723,0,1,0,1.022-1.022Z"
                                                transform="translate(-33.768 -8.498)"
                                                fill="#9195a0"/>
                                    </svg>


                                    <?php

                                    if (!function_exists('it_word_count')) {
                                        function it_word_count($str = ''): int
                                        {
                                            return count(preg_split('~[^\p{L}\p{N}\']+~u', $str));
                                        }
                                    }

                                    if (!function_exists('it_reading_time')) {
                                        function it_reading_time($id = null): string
                                        {
                                            global $post;
                                            if ($id) {
                                                $post = get_post($id);
                                            }
                                            $content = get_post_field('post_content', $post->ID);
                                            $word_count = it_word_count(strip_tags($content));
                                            $reading_time = ceil($word_count / 160);
                                            if ($reading_time > 1) {
                                                return sprintf(__(' %d دقیقه', 'it'), $reading_time);
                                            }

                                            return sprintf(__('کم تر از یک دقیقه', 'it'), $reading_time);
                                        }
                                    }


                                    echo sprintf(
                                        '<div class="flex text-xs text-customGray"><span class="key">%1$s </span>
                                <span class="value">%2$s</span></div>',
                                        __('مدت زمان مطالعه :', 'it'), it_reading_time()
                                    ); ?>

                                </div>
                            </div>

                            <div
                                    class="flex flex-wrap w-full gap-12 items-center justify-between pb-4 mt-4 border-b border-customLightGray">
                                <div class="flex items-center justify-center gap-3">
                  <span class="flex font-bold text-customMediumGray">
                    دسته بندی مطالب :
                  </span>

                                    <?php
                                    printf(
                                        '<div class="flex text-xs text-customGray"> %2$s</div>',
                                        __('Categories : ', 'it'),
                                        get_the_category_list('<span class="separator"></span>')
                                    );


                                    ?>


                                </div>

                                <div class="flex justify-center gap-3">
                                  <span class="flex font-bold text-customMediumGray">
                                    اشتراک گذاری این مطلب
                                  </span>
                                </div>
                            </div>

                            <div
                                    class="flex flex-wrap w-full gap-12 mt-4 justify-between pb-4 border-b border-customLightGray">
                                <div class="flex justify-center gap-3">
                  <span class="flex font-bold text-customMediumGray">
                    برچسب :
                  </span>


                                    <?php

                                    echo get_the_tag_list(
                                        sprintf(
                                            '<div class="flex text-xs items-center justify-center gap-3 text-customGray">',
                                            __('Tags : ', 'it')
                                        ), '<span class="separator flex w-1 h-1 bg-customLightblue rounded-full"></span>', '</div>'
                                    );

                                    ?>

                                </div>


                                <div class="flex justify-center gap-3">
                  <span class="flex font-bold text-customMediumGray">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18.729"
                            height="17.039"
                            viewBox="0 0 18.729 17.039">
                      <path
                              id="icons8-telegram-app-150"
                              d="M21.374,6.236a1.305,1.305,0,0,0-1.34-.1h0c-.546.219-15.446,6.61-16.053,6.871-.11.038-1.074.4-.975,1.2a1.449,1.449,0,0,0,.958,1.056l3.788,1.3C8,17.394,8.93,20.481,9.135,21.14c.128.411.336.951.7,1.062a.87.87,0,0,0,.845-.151L13,19.9l3.739,2.916.089.053a1.8,1.8,0,0,0,.729.169,1.349,1.349,0,0,0,.516-.1,1.563,1.563,0,0,0,.808-.824L21.67,7.6A1.287,1.287,0,0,0,21.374,6.236ZM11.093,17.076,9.815,20.484l-1.278-4.26,9.8-7.241Z"
                              transform="translate(-2.999 -6.002)"/>
                    </svg>
                  </span>

                                    <span class="flex font-bold text-customMediumGray">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18.729"
                            height="17.039"
                            viewBox="0 0 18.729 17.039">
                      <path
                              id="icons8-telegram-app-150"
                              d="M21.374,6.236a1.305,1.305,0,0,0-1.34-.1h0c-.546.219-15.446,6.61-16.053,6.871-.11.038-1.074.4-.975,1.2a1.449,1.449,0,0,0,.958,1.056l3.788,1.3C8,17.394,8.93,20.481,9.135,21.14c.128.411.336.951.7,1.062a.87.87,0,0,0,.845-.151L13,19.9l3.739,2.916.089.053a1.8,1.8,0,0,0,.729.169,1.349,1.349,0,0,0,.516-.1,1.563,1.563,0,0,0,.808-.824L21.67,7.6A1.287,1.287,0,0,0,21.374,6.236ZM11.093,17.076,9.815,20.484l-1.278-4.26,9.8-7.241Z"
                              transform="translate(-2.999 -6.002)"/>
                    </svg>
                  </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap col-span-4">

                            <?php the_post_thumbnail(
                                'post_archive', [ 'class' => 'img-fluid w-full' ]
                            ); ?>


                            <img class="w-full" src="" alt=""/>
                        </div>

                        <div class="flex flex-wrap col-span-12">
                            <?php the_content(); ?>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>

<?php
endwhile;
get_footer();
?>