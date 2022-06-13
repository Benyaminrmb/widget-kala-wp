<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>




        <div class="main-item">


            <?php
            do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input(
                array(
                    'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                    'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                    'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                )
            );

            do_action( 'woocommerce_after_add_to_cart_quantity' );
            ?>

            <button type="submit" value="<?php echo esc_attr( $product->get_id() ); ?>" class="cart-button gap-x-4">
                <span class="md:flex hidden">
                    <?php echo esc_html( $product->single_add_to_cart_text() ); ?>
                </span>
                <span class="btn-cart-icon icon icon-trolley"></span>
            </button>




        </div>

<!--		<button type="submit" name="add-to-cart" value="--><?php //echo esc_attr( $product->get_id() ); ?><!--" class="single_add_to_cart_button button alt">--><?php //echo esc_html( $product->single_add_to_cart_text() ); ?><!--</button>-->

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

        <div
                class="main-footer-logo">
            <div class="flex gap-2">
                <div class="flex">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="34.34"
                            height="28.412"
                            viewBox="0 0 34.34 28.412">
                        <g id="berooz" transform="translate(0 0)">
                            <g
                                    id="Group_19"
                                    data-name="Group 19"
                                    transform="translate(0 2.533)">
                                <path
                                        id="Path_24"
                                        data-name="Path 24"
                                        d="M33.856,3.805A6.231,6.231,0,0,0,28.117,0H6.229A6.223,6.223,0,0,0,0,6.23V19.649a6.225,6.225,0,0,0,6.229,6.23H28.117a6.228,6.228,0,0,0,6.223-6.225V6.23a6.2,6.2,0,0,0-.484-2.425ZM32.407,19.649a4.3,4.3,0,0,1-4.29,4.292H6.229a4.3,4.3,0,0,1-4.291-4.292V6.23A4.3,4.3,0,0,1,6.229,1.938H28.117a4.3,4.3,0,0,1,4.29,4.292Z"
                                        transform="translate(0 0)"
                                        fill="#282828" />
                            </g>
                            <path
                                    id="Path_25"
                                    data-name="Path 25"
                                    d="M30.473,4.293v.189H0V4.293A4.3,4.3,0,0,1,4.292,0H26.179A4.3,4.3,0,0,1,30.473,4.293Z"
                                    transform="translate(1.938 4.47)"
                                    fill="#50a8ea" />
                            <g
                                    id="Group_20"
                                    data-name="Group 20"
                                    transform="translate(9.705 0)">
                                <rect
                                        id="Rectangle_169"
                                        data-name="Rectangle 169"
                                        width="1.937"
                                        height="6.49"
                                        rx="0.969"
                                        transform="translate(12.998)"
                                        fill="#282828" />
                                <rect
                                        id="Rectangle_170"
                                        data-name="Rectangle 170"
                                        width="1.937"
                                        height="6.49"
                                        rx="0.969"
                                        fill="#282828" />
                            </g>
                            <g
                                    id="Group_21"
                                    data-name="Group 21"
                                    transform="translate(14.225 10.894)">
                                <path
                                        id="Path_26"
                                        data-name="Path 26"
                                        d="M9.307,6.627H7.371A4.692,4.692,0,0,0,.785,2.336L0,.565A6.626,6.626,0,0,1,9.307,6.627Z"
                                        transform="translate(0 0.002)"
                                        fill="#262626" />
                            </g>
                            <path
                                    id="Path_27"
                                    data-name="Path 27"
                                    d="M.485,3.435l2.9.326A.544.544,0,0,0,3.947,3L2.775.327A.543.543,0,0,0,1.84.221L.1,2.572a.546.546,0,0,0,.38.863Z"
                                    transform="translate(11.309 10.731)"
                                    fill="#262626" />
                            <g
                                    id="Group_22"
                                    data-name="Group 22"
                                    transform="translate(10.814 17.582)">
                                <path
                                        id="Path_28"
                                        data-name="Path 28"
                                        d="M6.625,6.626A6.6,6.6,0,0,1,4.046,6.1,6.6,6.6,0,0,1,1.941,4.686,6.579,6.579,0,0,1,.521,2.579,6.582,6.582,0,0,1,0,0H1.937A4.693,4.693,0,0,0,6.625,4.688a4.642,4.642,0,0,0,1.9-.4L9.308,6.06a6.584,6.584,0,0,1-2.683.566Z"
                                        transform="translate(0)"
                                        fill="#262626" />
                            </g>
                            <path
                                    id="Path_29"
                                    data-name="Path 29"
                                    d="M3.508.329.605,0A.543.543,0,0,0,.046.761L1.215,3.439a.543.543,0,0,0,.935.1l1.735-2.35a.544.544,0,0,0-.377-.86Z"
                                    transform="translate(19.045 20.608)"
                                    fill="#262626" />
                        </g>
                    </svg>
                </div>
                <span class="flex items-center"> قیمت های بروز </span>
            </div>

            <div class="flex gap-2">
                <div class="flex">
                    <svg
                            id="Group_47"
                            data-name="Group 47"
                            xmlns="http://www.w3.org/2000/svg"
                            width="28.929"
                            height="27.409"
                            viewBox="0 0 28.929 27.409">
                        <rect
                                id="Rectangle_41"
                                data-name="Rectangle 41"
                                width="6.546"
                                height="7.188"
                                rx="1"
                                transform="translate(11.246 1.195)"
                                fill="#50a8ea" />
                        <path
                                id="Rectangle_42"
                                data-name="Rectangle 42"
                                d="M1.034,0H5.512A1.034,1.034,0,0,1,6.546,1.034V7.188H0V1.034A1.034,1.034,0,0,1,1.034,0Z"
                                transform="translate(11.246 19.275)"
                                fill="#50a8ea" />
                        <g id="Group_6" data-name="Group 6">
                            <path
                                    id="Path_16"
                                    data-name="Path 16"
                                    d="M22.892,27.409H6.035a6.069,6.069,0,0,1-4.267-1.726A5.786,5.786,0,0,1,0,21.513V5.9A5.786,5.786,0,0,1,1.768,1.726,6.068,6.068,0,0,1,6.035,0H22.894a6.069,6.069,0,0,1,4.266,1.726A5.783,5.783,0,0,1,28.929,5.9V21.513a5.783,5.783,0,0,1-1.769,4.167,6.069,6.069,0,0,1-4.269,1.728ZM6.035,2.052A3.892,3.892,0,0,0,2.1,5.9V21.513a3.892,3.892,0,0,0,3.93,3.841H22.891a3.893,3.893,0,0,0,3.93-3.841V5.9a3.893,3.893,0,0,0-3.93-3.841Z"
                                    transform="translate(0 0)"
                                    fill="#262626" />
                        </g>
                        <g
                                id="Group_7"
                                data-name="Group 7"
                                transform="translate(9.106 7.647)">
                            <path
                                    id="Path_17"
                                    data-name="Path 17"
                                    d="M.323,6.8l.269.271.653.651.782.784.682.681.331.331h.005a.833.833,0,0,0,.356.229.827.827,0,0,0,.424.1L4.118,9.8A1.114,1.114,0,0,0,4.6,9.521l.207-.207.559-.557.821-.821,1-1,1.1-1.094L9.4,4.729l1.034-1.034.874-.873.63-.63.3-.3.012-.012a.82.82,0,0,0,.228-.355.818.818,0,0,0,.1-.425.82.82,0,0,0-.1-.425.821.821,0,0,0-.228-.355L12.025.151A1.1,1.1,0,0,0,11.468,0l-.3.039a1.094,1.094,0,0,0-.486.283L10.477.53l-.548.555L9.1,1.906l-1,1L7,4.009,5.9,5.12,4.861,6.154l-.874.873-.632.627c-.1.1-.2.2-.3.3l-.013.012H4.606l-.273-.271-.65-.65L2.9,6.26l-.682-.682-.332-.331a.835.835,0,0,0-.355-.228.834.834,0,0,0-.426-.1.827.827,0,0,0-.424.1.817.817,0,0,0-.355.228L.149,5.47A1.091,1.091,0,0,0,0,6.023l.038.293A1.11,1.11,0,0,0,.323,6.8Z"
                                    transform="translate(0 0)"
                                    fill="#262626" />
                        </g>
                    </svg>
                </div>
                <span class="flex items-center"> موجود در انبار </span>
            </div>

            <div class="flex gap-2">
                <div class="flex">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="28.973"
                            height="31.711"
                            viewBox="0 0 28.973 31.711">
                        <path
                                id="best-seller"
                                d="M18.474,2A12.383,12.383,0,0,0,8.5,21.756L4.082,29.3A.69.69,0,0,0,4.6,30.331l3.447.388,1.874,2.693a.689.689,0,0,0,1.163-.043l4.093-7a12.235,12.235,0,0,0,6.593,0l4.093,7a.689.689,0,0,0,1.163.043L28.9,30.719l3.447-.388a.69.69,0,0,0,.517-1.034l-4.417-7.541A12.383,12.383,0,0,0,18.474,2Zm0,1.379a11.025,11.025,0,0,1,8.639,17.882c-.016.022-.03.043-.043.065a11.046,11.046,0,0,1-17.149.065.837.837,0,0,0-.086-.129A11.025,11.025,0,0,1,18.474,3.379Zm0,.689a.689.689,0,1,0,.689.689A.691.691,0,0,0,18.474,4.068Zm-2.025.194a.693.693,0,1,0,.819.539A.7.7,0,0,0,16.449,4.262Zm3.77,0a.693.693,0,1,0,.28,0A.7.7,0,0,0,20.219,4.262ZM14.79,4.8a.756.756,0,0,0-.28.065.666.666,0,0,0-.366.883.7.7,0,0,0,.9.388A.7.7,0,0,0,14.79,4.8Zm7.368,0A.7.7,0,0,0,21.9,6.137a.7.7,0,0,0,.9-.388.666.666,0,0,0-.366-.883A.756.756,0,0,0,22.158,4.8Zm-9.178.9a.694.694,0,0,0-.452,1.056.7.7,0,0,0,.97.194.678.678,0,0,0,.194-.948A.706.706,0,0,0,12.98,5.706Zm10.729,0a.728.728,0,0,0-.452.3.678.678,0,0,0,.194.948.7.7,0,0,0,.969-.194.678.678,0,0,0-.194-.948A.691.691,0,0,0,23.709,5.706ZM11.644,6.891a.669.669,0,0,0-.474.215.686.686,0,0,0,.969.969C12.409,7.806,11.822,6.891,11.644,6.891Zm13.659,0a.718.718,0,0,0-.5.215.686.686,0,1,0,.97,0A.67.67,0,0,0,25.3,6.891ZM10.309,8.377a.652.652,0,0,0-.431.28.7.7,0,0,0,.194.969.678.678,0,0,0,.948-.194.7.7,0,0,0-.194-.97A.679.679,0,0,0,10.309,8.377Zm16.051,0a.588.588,0,0,0-.237.108.684.684,0,1,0,.754,1.142.7.7,0,0,0,.194-.969A.692.692,0,0,0,26.359,8.377Zm-16.8,1.659a.666.666,0,0,0-.625.409.69.69,0,1,0,1.271.539.7.7,0,0,0-.388-.9A.622.622,0,0,0,9.554,10.036Zm17.839,0a.622.622,0,0,0-.259.043.7.7,0,0,0-.388.9.69.69,0,0,0,1.271-.539A.666.666,0,0,0,27.393,10.036ZM8.865,11.846a.693.693,0,1,0,.28,0A.7.7,0,0,0,8.865,11.846Zm18.938,0a.693.693,0,1,0,.819.539A.7.7,0,0,0,27.8,11.846Zm-15.361.969-.5.991-1.1.151.8.776-.194,1.1.991-.539.97.539-.194-1.1.8-.776-1.077-.151Zm11.72,0-.5.991-1.1.151.8.776-.194,1.1.991-.539.97.539-.194-1.1.8-.776-1.077-.151Zm-15.34.9a.689.689,0,1,0,.689.689A.691.691,0,0,0,8.822,13.72Zm19.3,0a.689.689,0,1,0,.689.689A.691.691,0,0,0,28.126,13.72Zm-19.261,1.9a.693.693,0,1,0,.819.539A.7.7,0,0,0,8.865,15.616Zm18.938,0a.693.693,0,1,0,.819.819.693.693,0,0,0-.819-.819ZM9.554,17.4a.653.653,0,0,0-.259.065.69.69,0,0,0-.366.9.666.666,0,0,0,.883.366.7.7,0,0,0,.388-.9A.716.716,0,0,0,9.554,17.4Zm17.839,0a.716.716,0,0,0-.646.431.7.7,0,0,0,.388.9.666.666,0,0,0,.883-.366.69.69,0,0,0-.366-.9A.653.653,0,0,0,27.393,17.4Zm-17.085,1.68a.589.589,0,0,0-.237.108.7.7,0,0,0-.194.97.69.69,0,0,0,1.142-.776A.706.706,0,0,0,10.309,19.085Zm16.331,0a.706.706,0,0,0-.711.3.69.69,0,0,0,1.142.776.7.7,0,0,0-.194-.97A.589.589,0,0,0,26.639,19.085ZM11.644,20.55a.646.646,0,0,0-.474.194.686.686,0,1,0,.969,0A.7.7,0,0,0,11.644,20.55Zm13.659,0a.7.7,0,0,0-.5.194.686.686,0,1,0,.97,0A.647.647,0,0,0,25.3,20.55ZM12.98,21.756a.684.684,0,0,0-.431.3.674.674,0,0,0,.172.948.7.7,0,0,0,.969-.194.678.678,0,0,0-.194-.948A.691.691,0,0,0,12.98,21.756Zm10.729,0a.694.694,0,0,0-.452,1.056.7.7,0,0,0,.97.194.695.695,0,0,0-.517-1.25Zm-8.941.883a.686.686,0,0,0-.625.431.666.666,0,0,0,.366.883.69.69,0,0,0,.539-1.271A.725.725,0,0,0,14.768,22.64Zm7.411,0a.725.725,0,0,0-.28.043.69.69,0,1,0,.539,1.271.666.666,0,0,0,.366-.883A.686.686,0,0,0,22.18,22.64Zm-12.733.237a12.456,12.456,0,0,0,4.373,3.038l-3.4,5.817-1.4-2.047a.689.689,0,0,0-.5-.28l-2.693-.323Zm18.054,0,3.619,6.2-2.693.323a.689.689,0,0,0-.5.28l-1.4,2.047-3.4-5.817A12.457,12.457,0,0,0,27.5,22.877ZM16.449,23.2a.693.693,0,1,0,.819.819.693.693,0,0,0-.819-.819Zm3.77,0a.693.693,0,1,0,.819.539A.7.7,0,0,0,20.219,23.2Zm-1.745.172a.689.689,0,1,0,.689.689A.691.691,0,0,0,18.474,23.372Z"
                                transform="translate(-3.987 -2)" />
                    </svg>
                </div>
                <span class="flex items-center"> تایید اصالت کالا </span>
            </div>
        </div>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
