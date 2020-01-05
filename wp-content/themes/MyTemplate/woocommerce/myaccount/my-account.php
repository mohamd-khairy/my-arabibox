<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

// do_action( 'woocommerce_account_navigation' ); 

global $current_user;

?>

<section class="wn__bestseller__area bg--white pt--50  pb--80">
    <div class="container">
        <div class="row mt--20">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="product__nav nav align-items-center" role="tablist">
                    <a class="nav-item nav-link <?php if(! isset($_GET['active'])) echo "active" ?>" data-toggle="tab" href="#myAccount" role="tab">My
                        Account</a>
                    <a class="nav-item nav-link <?php if(isset($_GET['active'])) echo "active" ?>" data-toggle="tab" href="#myOrders" role="tab">My Orders</a>
                </div>
            </div>
        </div>
        <div class="tab__container mt--20">
            <?php wc_print_notices(); ?>

            <div class="row single__tab tab-pane fade <?php if(! isset($_GET['active'])) echo "show active" ?>" id="myAccount" role="tabpanel">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <form action="" method="post">
                        <div class="customer_details myAccount">
                            <div class="customar__field">
                                <div class="myaccount-data">
                                    <div class="input_box">
                                        <label class="control-label">First Name</label>
                                        <p><?php echo $current_user->user_firstname; ?></p>
                                        <input class="form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr($current_user->first_name); ?>" type="text">
                                    </div>
                                    <div class="input_box">
                                        <label class="control-label">Last Name</label>
                                        <p><?php echo $current_user->user_lastname; ?></p>
                                        <input class="form-control" name="account_last_name" id="account_last_name" value="<?php echo esc_attr($current_user->last_name); ?>" type="text">
                                    </div>
                                    <div class="input_box">
                                        <label class="control-label">Display Name</label>
                                        <p><?php echo $current_user->display_name; ?></p>
                                        <input class="form-control" name="account_display_name" id="account_display_name" value="<?php echo esc_attr($current_user->display_name); ?>" type="text">
                                    </div>
                                    <div class="input_box">
                                        <label class="control-label">Email</label>
                                        <p><?php echo  $current_user->user_email; ?></p>
                                        <input class="form-control" name="account_email" id="account_email" value="<?php echo esc_attr($current_user->user_email); ?>" type="email" readonly="readonly">
                                    </div>

                                    <div class="input_box password" style="display:none">
                                        <label class="control-label">Current password</label>
                                        <input type="password" class="form-control" name="password_current" id="password_current" placeholder="input the password">
                                    </div>

                                    <div class="input_box password" style="display:none">
                                        <label class="control-label">New password</label>
                                        <input type="password" class="form-control" name="password_1" id="password_1" placeholder="input the password">
                                    </div>

                                    <div class="input_box password" style="display:none">
                                        <label class="control-label">Confirm new password</label>
                                        <input type="password" class="form-control" name="password_2" id="password_2" placeholder="input the password">
                                    </div>
                                </div>
                            </div>

                            <div class="payment_method myaccount-data">
                                <div class="col-xs-12 complete_order">

                                    <a class="btn btn-success btn-lg btn-block editMyAccount" href="#" type="submit">Edit my account</a>

                                    <button class="btn btn-success btn-lg btn-block saveChanges" name="save_account_details" value="<?php _e('Save changes', 'woocommerce'); ?>  type=" submit">Save Changes</button>

                                    <?php wp_nonce_field('save_account_details'); ?>
                                    <input type="hidden" name="action" value="save_account_details" />

                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
            <!-- End Single Tab Content-->
            <!-- Start Single Tab Content -->
            <div class="row single__tab tab-pane fade <?php if(isset($_GET['active'])) echo "show active" ?>" id="myOrders" role="tabpanel">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div id="accordion" class="checkout_accordion mt--30" role="tablist">

                            <?php

                            $customer_orders = get_posts(
                                apply_filters(
                                    'woocommerce_my_account_my_orders_query',
                                    array(
                                        'numberposts' => $order_count,
                                        'meta_key'    => '_customer_user',
                                        'meta_value'  => get_current_user_id(),
                                        'post_type'   => wc_get_order_types('view-orders'),
                                        'post_status' => array_keys(wc_get_order_statuses()),
                                    )
                                )
                            );

                            // print_r($customer_orders);
                            if ($customer_orders) :
                                $i = 0;
                                $num = ['One' , 'Two'] ;
                                foreach ($customer_orders as $customer_order) {
                                    $order = wc_get_order($customer_order);
                                    $item_count = $order->get_item_count();
                                    $actions = wc_get_account_orders_actions($order);
                                    ?>
                                <div class="order">
                                    <div class="che__header" role="tab" id="headingOne">
                                        <div class="checkout__title" data-toggle="collapse" data-target="<?php echo _x('#', 'hash before order number', 'woocommerce') . $order->get_order_number(); ?>" aria-expanded="false" aria-controls="collapseOne">
                                            <ul>
                                                <li>
                                                    <span>Order placed on</span>
                                                    <label><time datetime="<?php echo esc_attr($order->get_date_created()->date('c')); ?>">
                                                            <?php echo esc_html(wc_format_datetime($order->get_date_created())); ?>
                                                        </time></label>
                                                </li>
                                                <li>
                                                    <span>Total</span>
                                                    <label>
                                                        <?php
                                                                /* translators: 1: formatted order total 2: total order items */
                                                                printf(_n('%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce'), $order->get_formatted_order_total(), $item_count); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                ?>
                                                    </label>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <span>Order ID</span>
                                                    <label>
                                                        <?php echo _x('#', 'hash before order number', 'woocommerce') . $order->get_order_number(); ?>
                                                    </label>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="collapse" data-target="<?php echo _x('#', 'hash before order number', 'woocommerce') . $order->get_order_number(); ?>">Order details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="<?php echo $order->get_order_number(); ?>" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">

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

                            <?php $i++; }
                            endif; ?>
                    </div>
                </div>
            </div>
            <!-- End Single Tab Content -->
        </div>
    </div>
</section>