<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action( 'woocommerce_checkout_before_customer_details' ); 

global $current_user;

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>


<form name="checkout" method="post" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
	<?php if ($checkout->get_checkout_fields()) : ?>

		<!-- Start Checkout Area -->
		<section class="wn__checkout__area mt-4 mb-5 bg__white">
			<div class="container">
				<div class="row">

					<div class="col-lg-10 offset-lg-1 col-12">
						<div class="row">
							<div class="col-lg-12 mb-4">
								<h2 class="shop-title">Checkout</h2>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-8 col-12">
								<div class="customer_details">
									<h3>Billing Info</h3>
									<div class="customar__field">
										<div class="margin_between">
											<div class="input_box space_between validate-required" id="billing_first_name_field">
												<label>First name <span>*</span></label>
												<input value="<?php echo get_user_meta( $current_user->ID, 'billing_first_name', true ); ?>" class="form-control" name="billing_first_name" id="billing_first_name" type="text" required>
											</div>
											<div class="input_box space_between validate-required" id="billing_last_name_field">
												<label>last name <span>*</span></label>
												<input value="<?php echo get_user_meta( $current_user->ID, 'billing_last_name', true ); ?>" class="form-control  validate-required" name="billing_last_name" id="billing_last_name" type="text" required>
											</div>
										</div>
										<div class="margin_between">
											<div class="input_box space_between">
												<label>Email Address <span>*</span></label>
												<input value="<?php echo get_user_meta( $current_user->ID, 'billing_email', true ); ?>" type="email" class=" validate-required" required name="billing_email">
											</div>
											<div class="input_box space_between">
												<label>Phone <span>*</span></label>
												<input value="<?php echo get_user_meta( $current_user->ID, 'billing_phone', true ); ?>" type="tel" name="billing_phone" class=" validate-required" required>
											</div>
										</div>
										<div class="input_box">
											<label>Address<span>*</span></label>
											<input value="<?php echo get_user_meta( $current_user->ID, 'billing_address_1', true ); ?>" class="form-control validate-required" required name="billing_address_1" type="text">
										</div>
										<div class="input_box">
											<label>Town / City <span>*</span></label>
											<input value="<?php echo get_user_meta( $current_user->ID, 'billing_city', true ); ?>" class="form-control" name="billing_city" type="text">
										</div>
										<div class="input_box">
											<label>State <span>*</span></label>
											<input value="<?php echo get_user_meta( $current_user->ID, 'billing_state', true ); ?>" class="form-control" name="billing_state" type="text">
										</div>
										<div class="input_box">
											<label>Country<span>*</span></label>
											<select  name="billing_country" id="billing_country" class="form-control" autocomplete="country">
												<option value="">Select a country…</option>
												<option value="AX">Åland Islands</option>
												<option value="AF">Afghanistan</option>
												<option value="AL">Albania</option>
												<option value="DZ">Algeria</option>
												<option value="AS">American Samoa</option>
												<option value="AD">Andorra</option>
												<option value="AO">Angola</option>
												<option value="AI">Anguilla</option>
												<option value="AQ">Antarctica</option>
												<option value="AG">Antigua and Barbuda</option>
												<option value="AR">Argentina</option>
												<option value="AM">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="AU">Australia</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BS">Bahamas</option>
												<option value="BH">Bahrain</option>
												<option value="BD">Bangladesh</option>
												<option value="BB">Barbados</option>
												<option value="BY">Belarus</option>
												<option value="PW">Belau</option>
												<option value="BE">Belgium</option>
												<option value="BZ">Belize</option>
												<option value="BJ">Benin</option>
												<option value="BM">Bermuda</option>
												<option value="BT">Bhutan</option>
												<option value="BO">Bolivia</option>
												<option value="BQ">Bonaire, Saint Eustatius and Saba</option>
												<option value="BA">Bosnia and Herzegovina</option>
												<option value="BW">Botswana</option>
												<option value="BV">Bouvet Island</option>
												<option value="BR">Brazil</option>
												<option value="IO">British Indian Ocean Territory</option>
												<option value="BN">Brunei</option>
												<option value="BG">Bulgaria</option>
												<option value="BF">Burkina Faso</option>
												<option value="BI">Burundi</option>
												<option value="KH">Cambodia</option>
												<option value="CM">Cameroon</option>
												<option value="CA">Canada</option>
												<option value="CV">Cape Verde</option>
												<option value="KY">Cayman Islands</option>
												<option value="CF">Central African Republic</option>
												<option value="TD">Chad</option>
												<option value="CL">Chile</option>
												<option value="CN">China</option>
												<option value="CX">Christmas Island</option>
												<option value="CC">Cocos (Keeling) Islands</option>
												<option value="CO">Colombia</option>
												<option value="KM">Comoros</option>
												<option value="CG">Congo (Brazzaville)</option>
												<option value="CD">Congo (Kinshasa)</option>
												<option value="CK">Cook Islands</option>
												<option value="CR">Costa Rica</option>
												<option value="HR">Croatia</option>
												<option value="CU">Cuba</option>
												<option value="CW">Curaçao</option>
												<option value="CY">Cyprus</option>
												<option value="CZ">Czech Republic</option>
												<option value="DK">Denmark</option>
												<option value="DJ">Djibouti</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EG" selected="selected">Egypt</option>
												<option value="SV">El Salvador</option>
												<option value="GQ">Equatorial Guinea</option>
												<option value="ER">Eritrea</option>
												<option value="EE">Estonia</option>
												<option value="ET">Ethiopia</option>
												<option value="FK">Falkland Islands</option>
												<option value="FO">Faroe Islands</option>
												<option value="FJ">Fiji</option>
												<option value="FI">Finland</option>
												<option value="FR">France</option>
												<option value="GF">French Guiana</option>
												<option value="PF">French Polynesia</option>
												<option value="TF">French Southern Territories</option>
												<option value="GA">Gabon</option>
												<option value="GM">Gambia</option>
												<option value="GE">Georgia</option>
												<option value="DE">Germany</option>
												<option value="GH">Ghana</option>
												<option value="GI">Gibraltar</option>
												<option value="GR">Greece</option>
												<option value="GL">Greenland</option>
												<option value="GD">Grenada</option>
												<option value="GP">Guadeloupe</option>
												<option value="GU">Guam</option>
												<option value="GT">Guatemala</option>
												<option value="GG">Guernsey</option>
												<option value="GN">Guinea</option>
												<option value="GW">Guinea-Bissau</option>
												<option value="GY">Guyana</option>
												<option value="HT">Haiti</option>
												<option value="HM">Heard Island and McDonald Islands</option>
												<option value="HN">Honduras</option>
												<option value="HK">Hong Kong</option>
												<option value="HU">Hungary</option>
												<option value="IS">Iceland</option>
												<option value="IN">India</option>
												<option value="ID">Indonesia</option>
												<option value="IR">Iran</option>
												<option value="IQ">Iraq</option>
												<option value="IE">Ireland</option>
												<option value="IM">Isle of Man</option>
												<option value="IL">Israel</option>
												<option value="IT">Italy</option>
												<option value="CI">Ivory Coast</option>
												<option value="JM">Jamaica</option>
												<option value="JP">Japan</option>
												<option value="JE">Jersey</option>
												<option value="JO">Jordan</option>
												<option value="KZ">Kazakhstan</option>
												<option value="KE">Kenya</option>
												<option value="KI">Kiribati</option>
												<option value="KW">Kuwait</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="LA">Laos</option>
												<option value="LV">Latvia</option>
												<option value="LB">Lebanon</option>
												<option value="LS">Lesotho</option>
												<option value="LR">Liberia</option>
												<option value="LY">Libya</option>
												<option value="LI">Liechtenstein</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="MO">Macao</option>
												<option value="MG">Madagascar</option>
												<option value="MW">Malawi</option>
												<option value="MY">Malaysia</option>
												<option value="MV">Maldives</option>
												<option value="ML">Mali</option>
												<option value="MT">Malta</option>
												<option value="MH">Marshall Islands</option>
												<option value="MQ">Martinique</option>
												<option value="MR">Mauritania</option>
												<option value="MU">Mauritius</option>
												<option value="YT">Mayotte</option>
												<option value="MX">Mexico</option>
												<option value="FM">Micronesia</option>
												<option value="MD">Moldova</option>
												<option value="MC">Monaco</option>
												<option value="MN">Mongolia</option>
												<option value="ME">Montenegro</option>
												<option value="MS">Montserrat</option>
												<option value="MA">Morocco</option>
												<option value="MZ">Mozambique</option>
												<option value="MM">Myanmar</option>
												<option value="NA">Namibia</option>
												<option value="NR">Nauru</option>
												<option value="NP">Nepal</option>
												<option value="NL">Netherlands</option>
												<option value="NC">New Caledonia</option>
												<option value="NZ">New Zealand</option>
												<option value="NI">Nicaragua</option>
												<option value="NE">Niger</option>
												<option value="NG">Nigeria</option>
												<option value="NU">Niue</option>
												<option value="NF">Norfolk Island</option>
												<option value="KP">North Korea</option>
												<option value="MK">North Macedonia</option>
												<option value="MP">Northern Mariana Islands</option>
												<option value="NO">Norway</option>
												<option value="OM">Oman</option>
												<option value="PK">Pakistan</option>
												<option value="PS">Palestinian Territory</option>
												<option value="PA">Panama</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												<option value="PH">Philippines</option>
												<option value="PN">Pitcairn</option>
												<option value="PL">Poland</option>
												<option value="PT">Portugal</option>
												<option value="PR">Puerto Rico</option>
												<option value="QA">Qatar</option>
												<option value="RE">Reunion</option>
												<option value="RO">Romania</option>
												<option value="RU">Russia</option>
												<option value="RW">Rwanda</option>
												<option value="ST">São Tomé and Príncipe</option>
												<option value="BL">Saint Barthélemy</option>
												<option value="SH">Saint Helena</option>
												<option value="KN">Saint Kitts and Nevis</option>
												<option value="LC">Saint Lucia</option>
												<option value="SX">Saint Martin (Dutch part)</option>
												<option value="MF">Saint Martin (French part)</option>
												<option value="PM">Saint Pierre and Miquelon</option>
												<option value="VC">Saint Vincent and the Grenadines</option>
												<option value="WS">Samoa</option>
												<option value="SM">San Marino</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SN">Senegal</option>
												<option value="RS">Serbia</option>
												<option value="SC">Seychelles</option>
												<option value="SL">Sierra Leone</option>
												<option value="SG">Singapore</option>
												<option value="SK">Slovakia</option>
												<option value="SI">Slovenia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SO">Somalia</option>
												<option value="ZA">South Africa</option>
												<option value="GS">South Georgia/Sandwich Islands</option>
												<option value="KR">South Korea</option>
												<option value="SS">South Sudan</option>
												<option value="ES">Spain</option>
												<option value="LK">Sri Lanka</option>
												<option value="SD">Sudan</option>
												<option value="SR">Suriname</option>
												<option value="SJ">Svalbard and Jan Mayen</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="SY">Syria</option>
												<option value="TW">Taiwan</option>
												<option value="TJ">Tajikistan</option>
												<option value="TZ">Tanzania</option>
												<option value="TH">Thailand</option>
												<option value="TL">Timor-Leste</option>
												<option value="TG">Togo</option>
												<option value="TK">Tokelau</option>
												<option value="TO">Tonga</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TN">Tunisia</option>
												<option value="TR">Turkey</option>
												<option value="TM">Turkmenistan</option>
												<option value="TC">Turks and Caicos Islands</option>
												<option value="TV">Tuvalu</option>
												<option value="UG">Uganda</option>
												<option value="UA">Ukraine</option>
												<option value="AE">United Arab Emirates</option>
												<option value="GB">United Kingdom (UK)</option>
												<option value="US">United States (US)</option>
												<option value="UM">United States (US) Minor Outlying Islands</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VU">Vanuatu</option>
												<option value="VA">Vatican</option>
												<option value="VE">Venezuela</option>
												<option value="VN">Vietnam</option>
												<option value="VG">Virgin Islands (British)</option>
												<option value="VI">Virgin Islands (US)</option>
												<option value="WF">Wallis and Futuna</option>
												<option value="EH">Western Sahara</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											</select>
										</div>

										<div class="input_box">
											<label>Postcode / ZIP <span>*</span></label>
											<input value="<?php echo get_user_meta( $current_user->ID, 'billing_postcode', true ); ?>" class="form-control" name="billing_postcode" type="text">
										</div>

										<div class="input_box">
											<label>Order note</label>
											<textarea placeholder="" name="order_comments" value="<?php echo get_user_meta( $current_user->ID, 'order_comments', true ); ?>"></textarea>
										</div>
									</div>

								</div>
								<a href="<?php echo bloginfo('siteurl');?>/my-account/edit-address/shipping">add shipping address</a>
							</div>


							<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
								<div class="wn__order__box">
									<h3 class="onder__title">Your order</h3>

									<ul class="order_product">
										<?php
											foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
												$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
												$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

												if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
													$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
													?>
												<li>
													<?php
																$image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
																?>
													<a href="<?php echo $_product->get_permalink($cart_item) ?>"><img src="<?php echo $image[0]; ?>" alt="" /></a>
													<div class="book-detail">
														<div class="cart-item">
															<h4><?php echo $_product->get_name(); ?></h4>
															<?php
																		if ($_product->is_sold_individually()) {
																			$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
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
															<label><?php echo $product_quantity . " X " . WC()->cart->get_product_price($_product); ?></label>
														</div>
													</div>
												</li>
										<?php }
											} ?>
									</ul>

									<?php if (wc_coupons_enabled()) { ?>

										<div class="add_copoun">
											<a class="showcoupon" href="#">+ ADD COUPON </a>
										</div>

										<div class="checkout_coupon">
											<form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
												<div class="form__coupon">
													<input type="text" name="coupon_code" placeholder="Coupon code">
													<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">Apply coupon</button>
												</div>
											</form>
										</div>
									<?php } ?>


									<ul class="shipping__method">
										<li>Cart Subtotal <h4><?php wc_cart_totals_subtotal_html(); ?></h4>
										</li>
										<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
											<li><?php wc_cart_totals_coupon_label($coupon); ?>
												<span><?php wc_cart_totals_coupon_html($coupon); ?></span>
											</li>
										<?php endforeach; ?>

										<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

											<li><?php esc_html_e('Shipping', 'woocommerce'); ?>
												<span><?php wc_cart_totals_shipping_html(); ?></span>
											</li>

										<?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>

											<li><?php esc_html_e('Shipping', 'woocommerce'); ?>
												<span><?php woocommerce_shipping_calculator(); ?></span>
											</li>

										<?php endif; ?>

										<?php foreach (WC()->cart->get_fees() as $fee) : ?>
											<li><?php echo esc_html($fee->name); ?>
												<span><?php wc_cart_totals_fee_html($fee); ?></span>
											</li>
										<?php endforeach; ?>

										<?php
											if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
												$taxable_address = WC()->customer->get_taxable_address();
												$estimated_text  = '';

												if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
													/* translators: %s location. */
													$estimated_text = sprintf(' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
												}

												if ('itemized' === get_option('woocommerce_tax_total_display')) {
													foreach (WC()->cart->get_tax_totals() as $code => $tax) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
														?>
													<li><?php echo esc_html($tax->label) . $estimated_text; ?>
														<span><?php echo wp_kses_post($tax->formatted_amount); ?></span>
													<?php
																}
															} else {
																?>
													<li><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?>
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
										<h3>Payment Method</h3>
										<ul>
											<?php
												$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
												?>

											<li>
												<?php
													if (!empty($available_gateways)) {
														foreach ($available_gateways as $gateway) {
															wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
														}
													} else {
														echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', esc_html__('Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce')) . '</li>'; // @codingStandardsIgnoreLine
													}
													?>
											</li>
										</ul>

										<div class="col-xs-12 complete_order">
											<!-- <button class="btn btn-success btn-lg btn-block" type="submit">Complete Order</button> -->
											<!-- <button type="submit" class="btn btn-success btn-lg btn-block" name="woocommerce_checkout_place_order" id="place_order" value="<?php echo esc_attr($order_button_text); ?>" data-value="<?php echo  esc_attr($order_button_text) . esc_html($order_button_text); ?>">place order</button> -->
											<?php do_action('woocommerce_review_order_before_submit'); ?>

											<?php echo apply_filters('woocommerce_order_button_html', '<button type="submit"  class="btn btn-success btn-lg btn-block" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">complete</button>'); // @codingStandardsIgnoreLine 
												?>

											<?php do_action('woocommerce_review_order_after_submit'); ?>
											<?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>

										</div>

									</div>
									<?php //do_action( 'woocommerce_checkout_order_review' ); ?>

								</div>

							</div>
						</div>


					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

</form>