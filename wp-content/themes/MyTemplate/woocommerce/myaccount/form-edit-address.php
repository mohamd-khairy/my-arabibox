<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
global $current_user;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>


<!-- Start Checkout Area -->
<section class="wn__checkout__area mt-4 mb-5 bg__white">
	<div class="container">
		<?php if ( ! $load_address ) : ?>
			<?php //wc_get_template( 'myaccount/my-address.php' ); ?>
		<?php else : ?>

			<form method="post">

				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
					<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3><?php // @codingStandardsIgnoreLine ?>

						<div class="customer_details mt--20">
							<div class="customar__field  mt--40">

							<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

								<div class="margin_between">
									<div class="input_box space_between" id="<?php echo $load_address;?>_first_name_field">
										<label>First name <span>*</span></label>
										<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_first_name', true ); ?>" class="form-control" required name="<?php echo $load_address;?>_first_name" id="<?php echo $load_address;?>_first_name" type="text">
									</div>
									<div class="input_box space_between" id="<?php echo $load_address;?>_last_name_field">
										<label>last name <span>*</span></label>
										<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_last_name', true ); ?>" class="form-control" required name="<?php echo $load_address;?>_last_name" id="<?php echo $load_address;?>_last_name" type="text">
									</div>
								</div>
								
								<div class="input_box" id="<?php echo $load_address;?>_company_field">
									<label>Company</label>
									<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_company_name', true ); ?>" class="form-control" type="text"  name="<?php echo $load_address;?>_company" id="<?php echo $load_address;?>_company">
								</div> 
								
								<div class="input_box" id="<?php echo $load_address;?>_address_1_field">
									<label>Address<span>*</span></label>
									<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_address_1', true ); ?>" class="form-control" type="text" required name="<?php echo $load_address;?>_address_1" id="<?php echo $load_address;?>_address_1">
								</div>

								<div class="input_box" id="<?php echo $load_address;?>_address_2_field">
									<label>Address 2</label>
									<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_address_2', true ); ?>" class="form-control" type="text" name="<?php echo $load_address;?>_address_2" id="<?php echo $load_address;?>_address_2">
								</div>
								
								<div class="input_box" id="<?php echo $load_address;?>_city_field">
									<label>Town / City <span>*</span></label>
									<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_city', true ); ?>" class="form-control" type="text" required name="<?php echo $load_address;?>_city" id="<?php echo $load_address;?>_city">
								</div>

								<div class="input_box" id="<?php echo $load_address;?>_state_field">
									<label>State <span>*</span></label>
									<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_state', true ); ?>" class="form-control" type="text" required name="<?php echo $load_address;?>_state" id="<?php echo $load_address;?>_state">
								</div>
								
								<div class="input_box" id="<?php echo $load_address;?>_country_field">
									<label>Country<span>*</span></label>
									<select  class="select__option" required name="<?php echo $load_address;?>_country" id="<?php echo $load_address;?>_country">
										<option>Select a country…</option>
									</select>
								</div>

								<div class="input_box" id="<?php echo $load_address;?>_postcode_field">
									<label>Postcode / ZIP <span>*</span></label>
										
									<input value="<?php echo get_user_meta( $current_user->ID, $load_address.'_postcode', true ); ?>" class="form-control" type="text" required name="<?php echo $load_address;?>_postcode" id="<?php echo $load_address;?>_postcode">
								</div>
								<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

								<button type="submit" class="btn btn-success btn-lg btn-block" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
								<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
								<input type="hidden" name="action" value="edit_address" />							
							</div>
						</div>
					</div>
				</div>

			</form>

		<?php endif; ?>
	</div>
</section>
<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>

