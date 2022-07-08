import 'owl.carousel';
import {Fancybox} from "@fancyapps/ui";

window.Fancybox = Fancybox;

jQuery(document).ready(function ($) {

    $('.dropdown-toggle').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('show');
        $(this).next('.dropdown-menu').toggleClass('show');
    })
    $('.navbar-close,.mobile-menu-backdrop').on('click', function () {
        $('.mobile-menu-section,.mobile-menu-backdrop').removeClass('show');
    })

    $('.menu-toggle').on('click', function () {
        $('.mobile-menu-section,.mobile-menu-backdrop').addClass('show');
    });

    $('.owl-slider').owlCarousel({
        loop: true, rtl: true, margin: 16, dots: true, items: 1,
    });
    $('.owl-brands').owlCarousel({
        loop: true, rtl: true, margin: 16, dots: true, items: 2
    });
    $('.owl-posts').owlCarousel({
        loop: true, rtl: true, margin: 16, dots: true, items: 1,
    });

    $(document).on('click', '.product-category-tab button', function (e) {
        e.preventDefault();
        let cat_id = $(this).data('category-id');
        let parent_li = $(this).parent();
        let container_element = $(this).closest('.product-section-container');
        console.log(container_element.attr('class'));
        let tab_element = container_element.find('#product-tabs-content-' + cat_id);
        let all_tabs = container_element.find('.product-tabs-content');

        parent_li.siblings('.product-category-tab').removeClass('active');
        parent_li.addClass('active');
        all_tabs.removeClass('active');
        tab_element.addClass('active');
        console.log(tab_element.attr('id'), cat_id);
    });

    /*woocommerce quantity input*/
    $(document).on('click', '.quantity .btn.plus, .quantity .btn.minus', function () {
        let qty = $(this).closest('.quantity-container').find('.qty'), val = parseFloat(qty.val()), max = parseFloat(qty.attr('max')), min = parseFloat(qty.attr('min')), step = parseFloat(qty.attr('step'));
        if ($(this).is('.plus')) {
            if (max && (max <= val)) {
                qty.val(max);
            } else {
                qty.val(val + step);
            }
        } else {
            if (min && (min >= val)) {
                qty.val(min);
            } else if (val > 1) {
                qty.val(val - step);
            }
        }
        qty.trigger("change");
    });

    $(document).on('click', '.scroll-to-description', function (e) {
        e.preventDefault();
        if ($('#category-description').length) {
            $('html, body').animate({
                scrollTop: $("#category-description").offset().top - 100
            }, 300);

        }
    });
    $(document).on('click', '.filter-button', function (e) {
        e.preventDefault();
        let filter_container = $('.mobile-sidebar-filter-container');
        filter_container.addClass('active');
    });
    $(document).on('click', '.close-filters', function (e) {
        e.preventDefault();
        let filter_container = $('.mobile-sidebar-filter-container');
        filter_container.removeClass('active');
    });

    $(document).on('change', '.ajax-product-filters', function (e) {
        e.preventDefault();
        let filter_type = $(this).data('type');
        let checked_array = [];
        let all_checked = $('.ajax-product-filters:checkbox:checked');
        all_checked.each(function () {
            checked_array.push($(this).val());
        })
        console.log(checked_array);

        // let current_url = window.location.href.split('?')[0];
        let url = new URL(window.location.href);
        let search_params = url.searchParams;

// add "topic" parameter
        search_params.set('paged', '1');


        let query_key = '';
        if (filter_type == 'category') {
            query_key = 'pcat';
        }
        if (filter_type == 'brand') {
            query_key = 'brand';
        }

        search_params.set(query_key, checked_array.join('-'));
        url.search = search_params.toString();
        // current_url.search = url_params.toString();

        let target_url = url.toString();
        // let target_url = current_url.toString(),/*current_url + '?paged=1' + query_key + '=' + checked_array.join('-')*/,
        let content = $('.main-content');
        console.log(target_url)
        content.addClass('spinner_loading');
        if ($('.close-filters').length) {
            $('.mobile-sidebar-filter-container').removeClass('active');
        }
        $('body').addClass('has_loading');
        window.scrollTo({top: 0, behavior: 'smooth'});


        $.ajax({
            type: 'get', url: target_url, success: function (response) {
                let content_html = $(response).find('.main-content .col-span-12.gap-4.flex.flex-wrap.flex-col').html();
                document.title = $(response).filter('title').text();
                window.history.pushState({}, '', target_url);
                content.find('.col-span-12.gap-4.flex.flex-wrap.flex-col').removeClass('items-center justify-center').html(content_html);
            }, error: function (error) {
                let res = error.responseText;
                console.log(res);
                let content_html = $(res).find('.main-content .flex.flex-col.justify-center.items-center').html();
                console.log(content_html);
                document.title = $(res).filter('title').text();
                window.history.pushState({}, '', target_url);
                content.find('.col-span-12.gap-4.flex.flex-wrap.flex-col').addClass('items-center justify-center').html(content_html);
                // alert('error loading content');
                // console.log(error);
            }, complete: function () {
                $('body').removeClass('has_loading');
                content.removeClass('spinner_loading');
            }
        })

    });

    /*faq show hide question*/
    $(document).on('click', '.faq-item .question', function (e) {
        e.preventDefault();
        let faq_container = $(this).closest('.faq-container'), curr_item = $(this).parent('.faq-item');
        // item_answer = curr_item.find('.answer');
        faq_container.find('.faq-item').removeClass('active');
        curr_item.toggleClass('active');

    })

    /*sidebar filter box in product-archive pages*/
    $(document).ready(function () {
        $("#search-brand-input").on("keyup", function () {
            var searched_query = $(this).val().toLowerCase();
            console.log(searched_query)
            $(".brand-list .brand-item").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searched_query) > -1)
            });
        });
    });

    let slider = $("#slider"), thumbnailSlider = $("#thumbnailSlider"), duration = 500;
    slider.owlCarousel({
        loop: false, nav: false, dots: false, rtl: true, items: 1, mouseDrag: false
    });

    thumbnailSlider.owlCarousel({
        loop: false, margin: 20, nav: true, rtl: true, mouseDrag: false, touchDrag: false, responsive: {
            0: {items: 4,}, 360: {items: 4,}, 400: {items: 4,}, 992: {items: 3,}, 1200: {items: 4,},
        },
    }).on("click", ".owl-item", function () {
        thumbnailSlider.find('.item .content').removeClass('active')
        $(this).find('.item .content').addClass('active')
        slider.trigger("to.owl.carousel", [$(this).index(), duration, true]);
    });
    $(".slider-right").click(function () {
        slider.trigger("next.owl.carousel");
    });
    $(".slider-left").click(function () {
        slider.trigger("prev.owl.carousel");
    });
    $("#thumbnailSlider .owl-prev").html('<span class="icon icon-chavron-right"></span>');
    $("#thumbnailSlider .owl-next").html('<span class="icon icon-chavron-left"></span>');
});