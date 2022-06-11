<?php
if (!function_exists('mt_setup')) {
    function mt_setup()
    {
        require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
        load_theme_textdomain('widgetize', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('woocommerce');
        add_image_size('mobile_slider', 390, 220, true);
        add_image_size('post_archive', 365, 273, true);
        add_image_size('transcript_archive', 330, 324, true);
        set_post_thumbnail_size(1140, 9999);
        register_nav_menus(
            [
                'primary' => __('Primary', 'widgetize'),
                'mobile' => __('Mobile', 'widgetize'),
                //				'secondary' => __( 'Secondary', 'widgetize' ),
            ]
        );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
                'navigation-widgets',
            ]
        );
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            [
                'height' => 40,
                'width' => 145,
                'flex-width' => true,
                'flex-height' => true,
            ]
        );
        // Add support for editor styles.
        add_theme_support('editor-styles');
        // Enqueue editor styles.
        add_editor_style('style-editor.css');
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        // Add support for Block Styles.
        add_theme_support('wp-block-styles');
        // Add support for full and wide align images.
        add_theme_support('align-wide');
        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');
        // Add support for custom line height.
        add_theme_support('custom-line-height');
    }

    add_action('after_setup_theme', 'mt_setup');
}
if (!function_exists('mt_register_widgets')) {
    function mt_register_widgets()
    {
        register_sidebar(

            [
                'id' => 'footer-1',
                'name' => esc_html__('footer-1', 'widgetkala'),
                'description' => esc_html__('please add only list and links to this widget area', 'widgetkala'),
                'before_widget' => '<div id="%1$s" class="footer-list flex flex-wrap gap-4 col-span-1 w-full %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<div class="flex w-full"><h4 class="text-white">',
                'after_title' => '</h4></div><div class="flex w-full">'
            ]
        );
    }

    add_action('widgets_init', 'mt_register_widgets');
}
if (!function_exists('mt_excerpt_more')) {
    function mt_excerpt_more($link)
    {
        if (is_admin()) {
            return $link;
        }
        $link = sprintf(
            '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
            esc_url(get_permalink(get_the_ID())),
            /* translators: %s: Post title. */
            sprintf(
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'widgetize'),
                get_the_title(get_the_ID())
            )
        );

        return ' &hellip; ' . $link;
    }

    add_filter('excerpt_more', 'mt_excerpt_more');
}
if (!function_exists('mt_content_width')) {
    function mt_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('mt_content_width', 1140);
    }

    add_action('after_setup_theme', 'mt_content_width', 0);
}
if (!function_exists('mt_scripts')) {
    function mt_scripts()
    {
        wp_enqueue_style('mt-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
//		wp_style_add_data( 'mt-style', 'rtl', 'replace' );
//		wp_enqueue_style(
//			'mt-main', mt_asset( 'css/main.css', FALSE ), [], wp_get_theme()->get( 'Version' )
//		);
        wp_enqueue_style(
            'mt-theme', mt_asset('css/theme.css', false), [], wp_get_theme()->get('Version')
        );
//		wp_enqueue_style(
//			'mt-woocommerce', mt_asset( 'css/woocommerce.css', FALSE ), [],
//			wp_get_theme()->get( 'Version' )
//		);
//		wp_enqueue_style(
//			'mt-responsive', mt_asset( 'css/responsive.css', FALSE ), [],
//			wp_get_theme()->get( 'Version' )
//		);
        //		wp_style_add_data('mt-app', 'rtl', 'replace');
        wp_enqueue_style(
            'mt-print-style', mt_asset('css/print.css', false), [], wp_get_theme()->get('Version'),
            'print'
        );
//		if ( is_page_template( 'template-category.php' ) ) {
//			wp_enqueue_script(
//				'mt-owl-carousel', mt_asset( 'js/owl.carousel.min.js', FALSE ), [ 'jquery' ],
//				wp_get_theme()->get( 'Version' ), TRUE
//			);
//			wp_enqueue_style(
//				'mt-owl', mt_asset( 'css/owl.carousel.min.css', FALSE ), [],
//				wp_get_theme()->get( 'Version' )
//			);
//			wp_enqueue_style(
//				'mt-owl-theme', mt_asset( 'css/owl.theme.default.min.css', FALSE ), [],
//				wp_get_theme()->get( 'Version' )
//			);
//		}

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('jquery');
//		wp_enqueue_script(
//			'mt-bootstrap', mt_asset( 'js/bootstrap.bundle.min.js', FALSE ), [ 'jquery' ],
//			wp_get_theme()->get( 'Version' ), TRUE
//		);
        wp_enqueue_script(
            'mt-app', mt_asset('js/app.js', false), [], wp_get_theme()->get('Version'), true
        );
    }

    add_action('wp_enqueue_scripts', 'mt_scripts');
}

if (function_exists('wp_is_mobile')) {
    add_filter('wp_is_mobile', 'customized_wp_is_mobile', 99, 1);
    function customized_wp_is_mobile()
    {
        error_log('agent is = '.$_SERVER['HTTP_USER_AGENT'].PHP_EOL,3,'mobile.log');
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
                , $_SERVER["HTTP_USER_AGENT"]);

    }
}

require get_template_directory() . '/inc/svg-icons.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/acf/acf.php';
require get_template_directory() . '/inc/product_brand-tax.php';
require get_template_directory() . '/inc/wc-customized.php';
define('THEME_ACF_PATH', get_template_directory() . '/inc/acf/');
define('THEME_ACF_URL', get_theme_file_uri('/inc/acf/'));
add_filter('acf/settings/url', function ($url) {
    return THEME_ACF_URL;
});
require get_template_directory() . '/inc/acf-local-field-groups.php';
require get_template_directory() . '/inc/template-tags.php';
