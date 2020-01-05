<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_cart' ); 

?>

<!-- Start Checkout Area -->
<section class="wn__checkout__area mt-4 mb-5 bg__white">
	<div class="container">
		<div class="row">

			<div class="col-lg-6 offset-lg-3 col-12">
				<div class="row">
					<div class="col-lg-12 mb-4">
						<h2 class="shop-title">Shopping Cart (<?php echo WC()->cart->get_cart_contents_count(); ?>)</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="wn__order__box">

							<ul class="order_product">
								<?php
									foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<li>
									<?php 
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
									?> 
									<img src="<?php echo $image[0]; ?>" alt="" />
									<div class="book-detail">
										<div class="cart-item">
											<h4><?php echo $_product->get_name(); ?></h4>
											<?php 
												if ( $_product->is_sold_individually() ) {
													$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input(
														array(
															'input_name'   => "cart[{$cart_item_key}][qty]",
															'input_value'  => $cart_item['quantity'],
															'max_value'    => $_product->get_max_purchase_quantity(),
															'min_value'    => '0',
															'product_name' => $_product->get_name(),
														),
														$_product,
														false
													);
												}
											?>
											<label><?php echo $product_quantity . " X " . WC()->cart->get_product_price( $_product ); ?></label>
										</div>
										<a class="removeFromCart" href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>">Remove from cart</a>
									</div>
								</li>
								<?php } } ?>
							</ul>
							<?php if ( wc_coupons_enabled() ) { ?>

							<div class="add_copoun">
								<a class="showcoupon" href="#">+ ADD COUPON </a>
							</div>
							<div class="checkout_coupon">
								<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
									<div class="form__coupon">
										<input type="text" name="coupon_code" placeholder="Coupon code">
										<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">Apply coupon</button>
									</div>
								</form>
							</div>
							<?php } ?>


							<ul class="shipping__method">
								<li>Cart Subtotal <h4><?php wc_cart_totals_subtotal_html(); ?></h4>
								</li>
								<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
										<li><?php wc_cart_totals_coupon_label( $coupon ); ?>
										<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
										</li>
								<?php endforeach; ?>

								<!-- shipping -->
								<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
									
									<li><?php esc_html_e( 'Shipping', 'woocommerce' ); ?>
									<span><?php wc_cart_totals_shipping_html(); ?></span>
									</li>

								<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

									<li><?php esc_html_e( 'Shipping', 'woocommerce' ); ?>
									<span><?php woocommerce_shipping_calculator(); ?></span>
									</li>

								<?php endif; ?>

								<!-- fees -->
								<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
									<li><?php echo esc_html( $fee->name ); ?>
									<span><?php wc_cart_totals_fee_html( $fee ); ?></span>
									</li>
								<?php endforeach; ?>

								<?php
								if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
								$taxable_address = WC()->customer->get_taxable_address();
								$estimated_text  = '';

								if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
									/* translators: %s location. */
									$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
								}

								if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
									foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
										?>
											<li><?php echo esc_html( $tax->label ) . $estimated_text; ?>
											<span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
										<?php
									}
								} else {
									?>
										<li><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?>
										<span><?php wc_cart_totals_taxes_total_html(); ?></span>
									<?php
									}
								}
								?>
							</ul>
							<ul class="total__amount">
								<li>
									<label>Total </label>
									<span><?php wc_cart_totals_order_total_html(); ?></span>
								</li>
							</ul>

							<div class="payment_method">
								<div class="col-xs-12 complete_order">
									<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-success btn-lg btn-block">Proceed to checkout</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Checkout Area -->