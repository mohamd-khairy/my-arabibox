<?php

require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/ajax_save_mail.php';



add_action('phpmailer_init', 'send_smtp_email');
function send_smtp_email($phpmailer)
{
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'pencilproduction.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = '465';
    $phpmailer->Username = 'support@pencilproduction.com';
    $phpmailer->Password = 'F1$fcw#(P3zP';
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->From = 'support@pencilproduction.com';
    $phpmailer->FromName = 'Pencil Solutions';
}


add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => 'top menu'
    )
);


$theme              = wp_get_theme('MyTemplate');
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 980; /* pixels */
}

$storefront = (object) array(
    'version'    => $storefront_version,

    /**
     * Initialize all the things.
     */
    'main'       => require 'inc/class-storefront.php',
    'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if (class_exists('Jetpack')) {
    $storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if (storefront_is_woocommerce_activated()) {
    $storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
    $storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

    require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

    require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
    require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
    require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if (is_admin()) {
    $storefront->admin = require 'inc/admin/class-storefront-admin.php';

    require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if (version_compare(get_bloginfo('version'), '4.7.3', '>=') && (is_admin() || is_customize_preview())) {
    require 'inc/nux/class-storefront-nux-admin.php';
    require 'inc/nux/class-storefront-nux-guided-tour.php';

    if (defined('WC_VERSION') && version_compare(WC_VERSION, '3.0.0', '>=')) {
        require 'inc/nux/class-storefront-nux-starter-content.php';
    }
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
   
function bbloomer_separate_registration_form() {
if ( is_admin() ) return;
ob_start();
if ( ! is_user_logged_in() ) {   
   // NOTE: THE FOLLOWING <FORM> IS COPIED FROM woocommerce/templates/myaccount/form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
   ?>
       
        <!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg-account">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
                            <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

                            <?php do_action( 'woocommerce_register_form_start' ); ?>
								<div class="account__form">
                                    
                                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

									<div class="input__box">
										<input type="text" name="username" placeholder="Name">
                                    </div>

                                    <?php  endif; ?>

									<div class="input__box">
										<input type="email" name="email" placeholder="Email">
									</div>
                                    
                                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                                        <div class="input__box">
                                            <input type="password"  name="password" placeholder="Password">
                                        </div>

                                    <?php else : ?>

                                        <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

                                    <?php endif; ?>

									<div class="form__btn">
                                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				                        <button type="submit" class="submit-btn  woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
									</div>
								</div>
							</form>
							<div class="new-account">
								<h4>
									Have Accouunt?
									<a href="#">Login</a>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
 
   <?php
   // END OF COPIED HTML
   // ------------------
    
}
return ob_get_clean();
}

add_filter('woocommerce_ship_to_different_address_checked', '__return_true', 999);


add_action( 'get_header', 'sk_conditionally_remove_wc_assets' );
/**
 * Unload WooCommerce assets on non WooCommerce pages.
 */
function sk_conditionally_remove_wc_assets() {

    // if WooCommerce is not active, abort.
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    // if this is a WooCommerce related page, abort.
    if ( is_woocommerce() || is_cart() || is_checkout() || is_page( array( 'my-account' ) ) ) {
        return;
    }

    remove_action( 'wp_enqueue_scripts', [ WC_Frontend_Scripts::class, 'load_scripts' ] );
    remove_action( 'wp_print_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );
    remove_action( 'wp_print_footer_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );

}