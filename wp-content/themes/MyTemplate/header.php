<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo bloginfo('name'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/logo-with-outline.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/plugins.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Header -->
        <header id="wn__header" class="header__area sticky__header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <div class="logo">
                            <a href="<?php echo get_bloginfo('siteurl'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/">Home</a></li>
                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/shop">Shop</a></li>
                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/about">About</a></li>
                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/learning">Learning Tools</a></li>
                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/blog">Blog</a></li>
                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/contactus">Contact</a></li>
                            <?php
                                // wp_nav_menu( array(
                                //     'theme_location' => 'top-menu',
                                //     )
                                // );
                            ?>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                            <li class="shopcart">
                                <a class="cartbox_active" href="<?php echo get_bloginfo('siteurl'); ?>/cart/">
                                    <span class="product_qun"><?php echo WC()->cart->get_cart_contents_count(); ?> </span>
                                </a>

                                <!-- Start Shopping Cart -->
                                <div class="block-minicart minicart__active">
                                    <div class="minicart-content-wrapper">

                                        <div class="single__items">
                                            <div class="miniproduct">
                                            <?php
                                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                    
                                            ?>
                                                <div class="item01 d-flex">
                                                    <div class="thumb">
                                                        <a href="#">
                                                            <?php 
                                                             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
                                                             ?> 
                                                            <img src="<?php echo $image[0]; ?>" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h6><a href="<?php echo $_product->get_permalink( $cart_item ) ?>"><?php echo $_product->get_name(); ?></a></h6>
                                                        <span class="prize">
                                                        <?php
                                                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                        ?>
                                                        </span>
                                                    </div>
                                                    <ul class="d-flex justify-content-end detete-item">
                                                        <li><a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>">x</a></li>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                            </div>
                                        </div>

                                        <div class="items-total d-flex justify-content-between">
                                            <span>Subtotal</span>
                                            <label>
                                            <?php wc_cart_totals_order_total_html(); ?>
                                            </label>
                                        </div>

                                        <div class="mini_action cart">
                                            <a class="cart__btn" href="<?php echo get_bloginfo('siteurl'); ?>/cart/">View cart</a>
                                        </div>

                                        <div class="mini_action checkout">
                                            <a class="checkout__btn" href="<?php echo get_bloginfo('siteurl'); ?>/checkout/">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Shopping Cart -->
                            </li>
                            <?php     if ( is_user_logged_in() ) { global $current_user; ?>

                            <li class="setting__bar__icon">
                                <a class="setting__active" href="#"></a>
                                <div class="searchbar__content setting__block">
                                    <div class="content-inner">

                                        <div class="profile-menu">
                                            <h4><?php echo $current_user->display_name ; ?></h4>
                                            <span><?php echo  $current_user->user_email ; ?></span>
                                            <ul>
                                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/my-account/">My Account</a></li>
                                                <li><a href="<?php echo get_bloginfo('siteurl'); ?>/my-account/?active">My Orders</a></li>
                                            </ul>
                                            <a class="logout" href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } else{ ?> 
                                <a class="logout" href="<?php echo get_permalink( woocommerce_get_page_id( 'myaccount' ) ); ?>">Login</a>

                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- Start Mobile Menu -->
                <div class="row d-none">
                    <div class="col-lg-12 d-none">
                        <nav class="mobilemenu__nav">
                            <ul class="meninmenu">
                                <li><a href="<?php echo get_template_directory(); ?>">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Learning Tools</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Mobile Menu -->
                <div class="mobile-menu d-block d-lg-none"></div>
                <!-- Mobile Menu -->
            </div>
        </header>
        <!-- //Header -->

 
