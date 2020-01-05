<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- <div class="woocommerce-order">

	<?php if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
				<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order );
				?>
			</p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div> -->



<section class="shops-area aboutUs pt--80 pb--80  pb--30">

<div class="row justify-content-between">
    <div class="col-lg-12  offset-lg-2 col-md-7">
        <div class="about-title">
				<h1><?php do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?> </h1>
				<?php if ( $order->has_status( 'failed' ) ) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>

				<?php else : ?>

				<h1>
					<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order );
					?>
				</h1>

				<div class="col-lg-8 col-12">
					<div id="accordion" class="checkout_accordion mt--30" role="tablist">
						<div class="order">
							<div class="che__header" role="tab" id="headingOne">
								<div class="checkout__title" data-toggle="collapse" data-target="<?php echo _x('#', 'hash before order number', 'woocommerce') . $order->get_order_number(); ?>" aria-expanded="false" aria-controls="collapseOne">
									<ul>
										<li>
											<span><?php esc_html_e( 'Order number:', 'woocommerce' ); ?></span>
											<label><?php echo $order->get_order_number(); ?></label>
										</li>
										<li>
											<span><?php esc_html_e( 'Date:', 'woocommerce' ); ?></span>
											<label><?php echo wc_format_datetime( $order->get_date_created() ); ?></label>
										</li>
									</ul>
									<ul>
										<li>
											<span><?php esc_html_e( 'Email:', 'woocommerce' ); ?></span>
											<label><?php echo $order->get_billing_email(); ?></label>
										</li>
										<li class="woocommerce-order-overview__total total">
											<span><?php esc_html_e( 'Total:', 'woocommerce' ); ?></span>
											<label><?php echo $order->get_formatted_order_total(); ?></label>
										</li>
									</ul>
									<?php if ( $order->get_payment_method_title() ) : ?>
										<ul>
											<li class="woocommerce-order-overview__payment-method method">
												<span><?php esc_html_e( 'Payment method:', 'woocommerce' ); ?></span>
												<label><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></label>
											</li>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							
							<div id="<?php echo $order->get_order_number(); ?>" class="" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">

								<ul class="order_product">
									<?php
											if (!$order) {
												return;
											}

											$order_items           = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));                                                    
											foreach ($order_items as $item_id => $item) {
												$product = $item->get_product();
												
									?>
										<li>
											<a href="#"><img src="<?php echo wp_get_attachment_image_url( $product->get_image_id(), 'full' );?>" alt="" /></a>
											<div class="book-detail">
												<div class="cart-item">

													<?php
														$is_visible        = $product && $product->is_visible();
														$product_permalink = apply_filters('woocommerce_order_item_permalink', $is_visible ? $product->get_permalink($item) : '', $item, $order);


														$qty          = $item->get_quantity();
														$refunded_qty = $order->get_qty_refunded_for_item($item_id);

														if ($refunded_qty) {
															$qty_display = '<del>' . esc_html($qty) . '</del> <ins>' . esc_html($qty - ($refunded_qty * -1)) . '</ins>';
														} else {
															$qty_display = esc_html($qty);
														}
													?>

													<h4>
														<?php
															echo apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( '<a href="%s">%s</a>', $product_permalink, $item->get_name() ) : $item->get_name(), $item, $is_visible ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
															echo apply_filters('woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $qty_display) . '</strong>', $item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														?>
													</h4>


													<label> <?php echo $order->get_formatted_line_subtotal($item); ?></label>
												</div>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

					</div>
				</div>

				
				<?php endif; ?>

        </div>
    </div>
</div>
</section>
