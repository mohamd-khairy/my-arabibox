<section class="wn__bestseller__area bg--white pt--50  pb--30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
					<h2 class="shop-title">Shop</h2>
			</div>
		</div>


		<div class="row mt--20">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="product__nav nav align-items-center" role="tablist">
					<a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">ALL</a>
					<?php

						$taxonomy     = 'product_cat';
						$orderby      = 'name';  
						$show_count   = 0;      // 1 for yes, 0 for no
						$pad_counts   = 0;      // 1 for yes, 0 for no
						$hierarchical = 1;      // 1 for yes, 0 for no  
						$title        = '';  
						$empty        = 0;

						$args = array(
								'taxonomy'     => $taxonomy,
								'orderby'      => $orderby,
								'show_count'   => $show_count,
								'pad_counts'   => $pad_counts,
								'hierarchical' => $hierarchical,
								'title_li'     => $title,
								'hide_empty'   => $empty
						);
						$all_categories = get_categories( $args );
						foreach ($all_categories as $cat) {
							if($cat->category_parent == 0) { 
								$category_id = $cat->term_id;  
								?>     
								<a class="nav-item nav-link" data-toggle="tab" href="#<?php echo $cat->name; ?>" role="tab">
									<?php echo $cat->name; ?>
								</a>
								<?php
							}       
						}
					?>
				</div>
			</div>
		</div>
		<div class="tab__container mt--20">
			<!-- Start Single Tab Content -->
			<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">

				<?php
					$args = [
						'post_type' => 'product',
						'order' => 'desc',
					];
					$query = new WP_query($args);
					if($query->have_posts()){
						while($query->have_posts()){
							$query->the_post();
							global $product;
						
					
				?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						<div class="product product_block">
							<div class="">
								<div class="product__thumb">
								
									<a class="first__img" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
									</a>
									<a class="second__img animation1" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="product__content content--center">
									<a href="<?php echo $product->add_to_cart_url(); ?>" class="add_to_cart_button">+</a>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									
									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span>
										</div>
									</div>
									<div class="action">
										<div class="actions_inner">
											<ul class="add_to_links">
												<li>
													<a data-toggle="modal" title="Quick View"
														class="quickview modal-view detail-link"
														href="#<?php echo $product->get_id(); ?>">
														<i class="fa fa-eye"></i>
													</a>
												</li>
											</ul>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- QUICKVIEW PRODUCT -->
					<div id="quickview-wrapper">
						<!-- Modal -->
						<div class="modal fade" id="<?php echo $product->get_id(); ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog modal__container" role="document">
								<div class="modal-content">

									<div class="modal-body">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
												aria-hidden="true">&times;</span></button>
										<div class="modal-product">
											<!-- Start product images -->
											<div class="col-md-5 col-12">
												<div class="product-images">
													<div class="main-image images text-center">
													<?php the_post_thumbnail(); ?>
														<!-- <img alt="big images" src="images/book-large.png"> -->
													</div>
												</div>
											</div>
											<!-- end product images -->
											<div class="col-md-7 col-12">
												<div class="product-info">

													<a href="<?php echo $product->add_to_cart_url(); ?>" class="add_to_cart_button">+</a>

													<h1><?php the_title(); ?></h1>

													<div class="price-box-3">
														<div class="s-price-box">
															<span class="new-price">
															<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
															</span>
														</div>
													</div>
													<div class="quick-desc">
														<?php the_content(); ?>
													</div>

													<div class="social-sharing">
														<div class="widget widget_socialsharing_widget">
															<h4>Share</h4>
															<ul class="social__net social__net--2 ml-4 d-flex justify-content-start">
																<li>
																	<a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri()?>/images/facebook.svg" alt="" /></a>
																</li>
																<li>
																	<a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri()?>/images/messenger.svg" alt="" /></a>
																</li>
																<li>
																	<a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri()?>/images/twitter.svg" alt="" /></a>
																</li>
																<li>
																	<a href="#" class="tumblr social-icon"><img src="<?php echo get_template_directory_uri()?>/images/whatsapp.svg" alt="" /></a>
																</li>
															</ul>
														</div>
													</div>

												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END QUICKVIEW PRODUCT -->
			
				<?php
					} wp_reset_query();
				}
				// do_action( 'woocommerce_before_shop_loop_item' );
				// do_action( 'woocommerce_before_shop_loop_item_title' ); // product image
				?>
			</div>

			<?php 
			
			foreach ($all_categories as $cat) {
				if($cat->category_parent == 0) { 
					$category_id = $cat->term_id;  
					?>     
					
					<div class="row single__tab tab-pane fade" id="<?php echo $cat->name; ?>" role="tabpanel">

						<?php
						
							$args = [
								'post_type' => 'product',
							 	// 'stock' => 1,
							//   'posts_per_page' => 2,
							  	'product_cat' => $cat->name, 
							  	'orderby' =>'date',
							  	'order' => 'desc' 
							];

							// $args = array(
							// 	'post_type' => 'product',
							// 	'order' => 'desc',
							// 	'post_status' => 'publish',
							// 	'tax_query' => array(
							// 		 'taxonomy' => 'product_cat',
							// 		 'field'    => 'term_id',
							// 		 'terms'     =>  $category_id, // When you have more term_id's seperate them by komma.
							// 		 'operator'  => 'IN'
							// 		 )
							// 	);
							$query = new WP_query($args);
							if($query->have_posts()){
								while($query->have_posts()){
									$query->the_post();
									global $product;
								
							
						?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="product product_block">
									<div class="">
										<div class="product__thumb">
										
											<a class="first__img" href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											</a>
											<a class="second__img animation1" href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											</a>
										</div>
										<div class="product__content content--center">
											<a href="<?php echo $product->add_to_cart_url(); ?>" class="add_to_cart_button">+</a>
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											
											<div class="price-box-3">
												<div class="s-price-box">
													<span class="new-price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span>
												</div>
											</div>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li>
															<a data-toggle="modal" title="Quick View"
																class="quickview modal-view detail-link"
																href="#<?php echo $product->get_id(); ?>">
																<i class="fa fa-eye"></i>
															</a>
														</li>
													</ul>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- QUICKVIEW PRODUCT -->
							<div id="quickview-wrapper">
								<!-- Modal -->
								<div class="modal fade" id="<?php echo $product->get_id(); ?>" tabindex="-1" role="dialog">
									<div class="modal-dialog modal__container" role="document">
										<div class="modal-content">

											<div class="modal-body">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
														aria-hidden="true">&times;</span></button>
												<div class="modal-product">
													<!-- Start product images -->
													<div class="col-md-5 col-12">
														<div class="product-images">
															<div class="main-image images text-center">
															<?php the_post_thumbnail(); ?>
																<!-- <img alt="big images" src="images/book-large.png"> -->
															</div>
														</div>
													</div>
													<!-- end product images -->
													<div class="col-md-7 col-12">
														<div class="product-info">

															<a href="<?php echo $product->add_to_cart_url(); ?>" class="add_to_cart_button">+</a>

															<h1><?php the_title(); ?></h1>

															<div class="price-box-3">
																<div class="s-price-box">
																	<span class="new-price">
																	<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
																	</span>
																</div>
															</div>
															<div class="quick-desc">
																<?php the_content(); ?>
															</div>

															<div class="social-sharing">
																<div class="widget widget_socialsharing_widget">
																	<h4>Share</h4>
																	<ul class="social__net social__net--2 ml-4 d-flex justify-content-start">
																		<li>
																			<a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri()?>/images/facebook.svg" alt="" /></a>
																		</li>
																		<li>
																			<a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri()?>/images/messenger.svg" alt="" /></a>
																		</li>
																		<li>
																			<a href="#" class="social-icon"><img src="<?php echo get_template_directory_uri()?>/images/twitter.svg" alt="" /></a>
																		</li>
																		<li>
																			<a href="#" class="tumblr social-icon"><img src="<?php echo get_template_directory_uri()?>/images/whatsapp.svg" alt="" /></a>
																		</li>
																	</ul>
																</div>
															</div>

														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END QUICKVIEW PRODUCT -->
					
						<?php
							} 
							wp_reset_query();
						}
						?>
					</div>

					<?php
				}       
			}

			?>

		</div>
	</div>
</section>

<!-- <li <?php //wc_product_class( 'container', $product ); ?>> -->

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' ); // product image

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' ); //product name

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' ); // product price

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' ); // button add to product
	?>
<!-- </li> -->
