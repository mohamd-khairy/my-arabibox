<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
// do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	// do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		// do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );
	?>

<?php //do_action( 'woocommerce_after_single_product' ); ?>


<!-- Start main Content -->
<div class="maincontent bg--white pt--80">
			<div class="container">
				<div class="row">

					<div class="wn__single__product">
						<div class="col-md-10 offset-md-1 col-12">
							<div class="modal-product">
								<div class="row">
									<!-- Start s -->
									<div class="col-md-5 col-12">
										<div class="product-images">
											<div class="main-image images text-center">
												<!-- <img alt="big images" src="images/book-large.png"> -->
												<?php the_post_thumbnail(); ?>

											</div>
										</div>
									</div>
									<!-- end s -->
									<div class="col-md-7 col-12">
										<div class="product-info">
											<h1><?php the_title(); ?></h1>
											<a href="<?php echo $product->add_to_cart_url(); ?>" class="add_to_cart_button">+</a>
											<div class="price-box-3">
												<div class="s-price-box">
													<span class="new-price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span>
												</div>
											</div>
											<div class="quick-desc">
												<?php the_content(); ?>
											</div>

											<div class="social-sharing">
												<div class="widget widget_socialsharing_widget">
													<h4>Share</h4>
													<ul
														class="social__net social__net--2 ml-4 d-flex justify-content-start">
														<li><a href="#" class="social-icon"><img
																	src="<?php echo get_template_directory_uri();?>/images/facebook.svg" alt="" /></a></li>
														<li><a href="#" class="social-icon"><img
																	src="<?php echo get_template_directory_uri();?>/images/messenger.svg" alt="" /></a></li>
														<li><a href="#" class="social-icon"><img
																	src="<?php echo get_template_directory_uri();?>/images/twitter.svg" alt="" /></a></li>
														<li><a href="#" class="tumblr social-icon"><img
																	src="<?php echo get_template_directory_uri();?>/images/whatsapp.svg" alt="" /></a></li>
													</ul>
												</div>
											</div>

										</div>
									</div>
								</div>

							</div>

							<div class="product__info__detailed">
								<div class="description__attribute">
									<h2>About the book</h2>
									<p>
										What are the odds of someone doing extraordinary things if that person lost
										their sight,
										hearing and speech at nineteen months of age? Helen Keller overcame enormous
										disadvantages to influence the world. Although her teacher and mentor, Anne
										Sullivan,
										achieved great results with her, ultimately, Keller’s success was up to Keller.
									</p>
								</div>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
		<!-- End main Content -->

		</div>
