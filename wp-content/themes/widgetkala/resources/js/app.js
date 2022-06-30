import 'owl.carousel';

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
        loop: true,
        rtl: true,
        margin: 16,
        dots: true,
        items: 1,
    });
    $('.owl-brands').owlCarousel({
        loop: true,
        rtl: true,
        margin: 16,
        dots: true,
        items: 2
    });
    $('.owl-posts').owlCarousel({
        loop: true,
        rtl: true,
        margin: 16,
        dots: true,
        items: 1,
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
        let qty = $(this).closest('.quantity-container').find('.qty'),
            val = parseFloat(qty.val()),
            max = parseFloat(qty.attr('max')),
            min = parseFloat(qty.attr('min')),
            step = parseFloat(qty.attr('step'));
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

    /*faq show hide question*/
    $(document).on('click', '.faq-item .question', function (e) {
        e.preventDefault();
        let faq_container = $(this).closest('.faq-container'),
            curr_item = $(this).parent('.faq-item');
        // item_answer = curr_item.find('.answer');
        faq_container.find('.faq-item').removeClass('active');
        curr_item.toggleClass('active');

    })

    /*sidebar filter box in product-archive pages*/
    $(document).ready(function () {
        $("#search-brand-input").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".brand-list .brand-item").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
});