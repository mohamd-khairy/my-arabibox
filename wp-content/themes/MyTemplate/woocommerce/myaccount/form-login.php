<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg-account">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form class="woocommerce-form woocommerce-form-login login" method="post">
								<div class="account__form">
									<?php do_action( 'woocommerce_login_form_start' ); ?>
									<div class="input__box">
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									</div>
									<div class="input__box">

										<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
									</div>
									<?php do_action( 'woocommerce_login_form' ); ?>

									<div class="form__btn">
										<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
										<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
										</div>
									<p class="woocommerce-LostPassword lost_password">
										<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
									</p>

									<?php do_action( 'woocommerce_login_form_end' ); ?>
								</div>
							</form>
							<div class="new-account">
								<h4>
									New Accouunt?
									<a href="<?php echo bloginfo('siteurl');?>/register/">Register</a>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->


