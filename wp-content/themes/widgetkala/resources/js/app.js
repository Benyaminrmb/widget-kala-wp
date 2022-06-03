jQuery(document).ready(function ($) {
    $('body').on('click', '.product-category-tab button', function (e) {
        e.preventDefault();
        let cat_id = $(this).data('category-id');
        let parent_li = $(this).parent();
        let container_element = $(this).closest('.product-section-container');
        console.log(container_element.attr('class'));
        let tab_element = container_element.find('#product-tabs-content-'+cat_id);
        let all_tabs = container_element.find('.product-tabs-content');

        parent_li.siblings('.product-category-tab').removeClass('active');
        parent_li.addClass('active');
        all_tabs.removeClass('active');
        tab_element.addClass('active');
        console.log(tab_element.attr('id'),cat_id);
    })
});