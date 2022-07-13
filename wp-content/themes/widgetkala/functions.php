<?php
defined('MT_GOOGLE_KEY') OR define('MT_GOOGLE_KEY','AIzaSyDbpVUUXQyrIIm9G8HL-5WRiuzl5bIlrJQ');
if ( ! function_exists('mt_setup')) {
    function mt_setup()
    {
        require_once get_stylesheet_directory().'/inc/class-wp-bootstrap-navwalker.php';
        load_theme_textdomain('widgetize', get_template_directory().'/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('woocommerce');
        add_image_size('mobile_slider', 390, 220);
        add_image_size('post_archive', 365, 273);
        add_image_size('mobile_product_archive', 110, 80);
//        add_image_size('transcript_archive', 330, 324, true);
        set_post_thumbnail_size(1140, 9999);
        register_nav_menus(
            [
                'primary' => __('Primary', 'widgetize'),
                'mobile'  => __('Mobile', 'widgetize'),
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
                'height'      => 40,
                'width'       => 145,
                'flex-width'  => true,
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
if ( ! function_exists('mt_register_widgets')) {
    function mt_register_widgets()
    {
        register_sidebar(
            [
                'id'            => 'footer-1',
                'name'          => esc_html__('footer-1', 'widgetkala'),
                'description'   => esc_html__('please add only list and links to this widget area', 'widgetkala'),
                'before_widget' => '<div id="%1$s" class="footer-list block flex-wrap gap-4 col-span-1 w-full %2$s">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<div class="flex w-full"><h4 class="text-white text-base_16">',
                'after_title'   => '</h4></div><div class="flex w-full">'
            ]
        );
        register_sidebar([
            'id'            => 'shop',
            'name'          => esc_html__('shop', 'widgetkala'),
            'description'   => esc_html__('please add only list and links to this widget area', 'widgetkala'),
            'before_widget' => '<div id="%1$s" class="footer-list block flex-wrap gap-4 col-span-1 w-full %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<div class="flex w-full"><h4 class="text-white text-base_16">',
            'after_title'   => '</h4></div><div class="flex w-full">'
        ]);
    }

    add_action('widgets_init', 'mt_register_widgets');
}
if ( ! function_exists('mt_excerpt_more')) {
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

        return ' &hellip; '.$link;
    }

    add_filter('excerpt_more', 'mt_excerpt_more');
}
if ( ! function_exists('mt_content_width')) {
    function mt_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('mt_content_width', 1140);
    }

    add_action('after_setup_theme', 'mt_content_width', 0);
}
if ( ! function_exists('mt_scripts')) {
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
        if(is_page_template('template-contact.php')){
            wp_enqueue_script('google_map','https://maps.googleapis.com/maps/api/js?key='.MT_GOOGLE_KEY);
            add_action('wp_footer','mt_contact_footer');
        }
        wp_register_script(
            'mt-app', mt_asset('js/app.js', false), [], wp_get_theme()->get('Version'), true
        );
        wp_localize_script('mt-app', 'mt_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
        wp_enqueue_script('mt-app');

    }

    add_action('wp_enqueue_scripts', 'mt_scripts');
}

if(!function_exists('mt_contact_footer')){
    function mt_contact_footer(){?>
        <script type="text/javascript">
            (function( $ ) {
                function initMap( $el ) {
                    var $markers = $el.find('.marker');
                    var mapArgs = {
                        zoom        : $el.data('zoom') || 16,
                        mapTypeId   : google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map( $el[0], mapArgs );

                    // Add markers.
                    map.markers = [];
                    $markers.each(function(){
                        initMarker( $(this), map );
                    });

                    // Center map based on markers.
                    centerMap( map );

                    // Return map instance.
                    return map;
                }

                /**
                 * initMarker
                 *
                 * Creates a marker for the given jQuery element and map.
                 *
                 * @date    22/10/19
                 * @since   5.8.6
                 *
                 * @param   jQuery $el The jQuery element.
                 * @param   object The map instance.
                 * @return  object The marker instance.
                 */
                function initMarker( $marker, map ) {

                    // Get position from marker.
                    var lat = $marker.data('lat');
                    var lng = $marker.data('lng');
                    var latLng = {
                        lat: parseFloat( lat ),
                        lng: parseFloat( lng )
                    };

                    // Create marker instance.
                    var marker = new google.maps.Marker({
                        position : latLng,
                        map: map
                    });

                    // Append to reference for later use.
                    map.markers.push( marker );

                    // If marker contains HTML, add it to an infoWindow.
                    if( $marker.html() ){

                        // Create info window.
                        var infowindow = new google.maps.InfoWindow({
                            content: $marker.html()
                        });

                        // Show info window when marker is clicked.
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open( map, marker );
                        });
                    }
                }

                /**
                 * centerMap
                 *
                 * Centers the map showing all markers in view.
                 *
                 * @date    22/10/19
                 * @since   5.8.6
                 *
                 * @param   object The map instance.
                 * @return  void
                 */
                function centerMap( map ) {

                    // Create map boundaries from all map markers.
                    var bounds = new google.maps.LatLngBounds();
                    map.markers.forEach(function( marker ){
                        bounds.extend({
                            lat: marker.position.lat(),
                            lng: marker.position.lng()
                        });
                    });

                    // Case: Single marker.
                    if( map.markers.length == 1 ){
                        map.setCenter( bounds.getCenter() );

                        // Case: Multiple markers.
                    } else{
                        map.fitBounds( bounds );
                    }
                }

// Render maps on page load.
                $(document).ready(function(){
                    $('.acf-map').each(function(){
                        var map = initMap( $(this) );
                    });
                });

            })(jQuery);
        </script>
    <?php }
}

if (function_exists('wp_is_mobile')) {
    add_filter('wp_is_mobile', 'customized_wp_is_mobile', 99, 1);
    function customized_wp_is_mobile()
    {
        error_log('agent is = '.$_SERVER['HTTP_USER_AGENT'].PHP_EOL, 3, 'mobile.log');

        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
            , $_SERVER["HTTP_USER_AGENT"]);

    }
}

require get_template_directory().'/inc/svg-icons.php';
require get_template_directory().'/inc/template-functions.php';
require get_template_directory().'/inc/acf/acf.php';
require get_template_directory().'/inc/product_brand-tax.php';
require get_template_directory().'/inc/wc-customized.php';
define('THEME_ACF_PATH', get_template_directory().'/inc/acf/');
define('THEME_ACF_URL', get_theme_file_uri('/inc/acf/'));
add_filter('acf/settings/url', function ($url) {
    return THEME_ACF_URL;
});
require get_template_directory().'/inc/acf-local-field-groups.php';
require get_template_directory().'/inc/template-tags.php';
