<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
echo '<div class="flex items-center gap-x-3">';
echo '<span class="flex">نمایش تعداد :</span>';
echo '<ul class="flex gap-x-5 text-xs text-customLighterMediumGray">';
$orderby_options = array(
    '12' => '12',
    '24' => '24',
    '36' => '36'
);
foreach( $orderby_options as $value => $label ) {
    global $wp_query;
//    echo '<li><a href="'.esc_attr($value).'">'.esc_attr($label).'</a>';
//    echo get_query_var('paged');
//    set_query_var('paged',1);
//    echo get_query_var('paged').'<br>';
//
//    $query_vars = $wp_query->query_vars;
//    foreach ($query_vars as $key => $value) {
//
//    }
    ?>
    <li><a href="<?php echo ($value != $per_page) ? add_query_arg(['paged'=>1,'perpage'=>esc_attr( $value )]) : '#';?>"><?php echo esc_html( $label ); ?></a></li>
<?php //    echo "<option ".selected( $per_page, $value )." value='?perpage=$value'>$label</option>";
}
echo '</ul>';
echo '</div>';

?>
<!--<div class="flex items-center gap-x-3">-->
<!--    <span class="flex">تعداد نمایش :</span>-->
<!--    <ul-->
<!--            class="flex gap-x-5 text-xs text-customLighterMediumGray"-->
<!--    >-->
<!--        <li><a href>12</a></li>-->
<!--        <li><a href>24</a></li>-->
<!--        <li><a href>48</a></li>-->
<!--    </ul>-->
<!--</div>-->