<?php get_header(); ?>

<!-- Start Slider area -->
<div class="slider-area brown__nav slide__activation slide__arrow01 owl-carousel owl-theme">
    <!-- Start Single Slide -->
    <div class="slide animation__style08 slide-bg fullscreen" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="content-box col-md-10 offset-md-1">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/marhaba-quote-with-dots.svg" class="mx-auto d-block img-fluid" alt="" />
                            <h1>
                                Welcome To My Arabi Box
                            </h1>
                            <p>
                                Your one stop for FUN, innovative, visually stimulating Arabic reading curriculum, hands-on resources and children literature!
                            </p>
                            <a href="#">Shop Full Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single Slide -->

</div>
<!-- End Slider area -->

<!-- Start section -->
<section class="shops-area pt--80 pb--150  pb--30">

    <img src="<?php echo get_template_directory_uri(); ?>/images/group-7.png" class="shops-area-top" alt="" />
    <img src="<?php echo get_template_directory_uri(); ?>/images/group-7-copy.png" class="shops-area-bottom" alt="" />

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h1>Shop My Arabi Box</h1>
                    <p>
                        Our curriculums and resources are developed by Arabic educators and mothers with over 20+ years of experience in teaching Arabic
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="shop-block">
                    <div class="shop-content d-flex justify-content-between flex-column">
                        <div class="img-container d-flex justify-content-center flex-column">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/group-16.svg" alt="" />
                        </div>
                        <h3>Arabic Curriculum</h3>
                        <p>
                            Beautifully-designed, comprehensive and engaging curriculum and activity books
                        </p>
                        <a href="#">Shop Full Collection</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="shop-block">
                    <div class="shop-content d-flex justify-content-between flex-column">
                        <div class="img-container d-flex justify-content-center flex-column">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/open-book.svg" alt="" />
                        </div>
                        <h3>Hands-on Resources</h3>
                        <p>
                            My Arabi Box reproduces are developed to make learning Arabic fun! Games and resources your children will love!
                        </p>
                        <a href="#">Shop Full Collection</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="shop-block">
                    <div class="shop-content d-flex justify-content-between flex-column">
                        <div class="img-container d-flex justify-content-center flex-column">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/book.svg" alt="" />
                        </div>
                        <h3>Children’s Literature</h3>
                        <p>
                            Build your child’s Arabic library with high quality and incredible stories accompanied with whimsical illustrations!
                        </p>
                        <a href="#">Shop Full Collection</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Start section -->
<section class="products-area pt--60  pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h1>Best Selling books</h1>
                    <p>
                        Build Your Child's Arabic Library!
                    </p>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="row">
            <div class="furniture--4 arrows_style owl-carousel owl-theme ">

                <?php
                $args = [
                    'post_type' => 'product',
                    'order' => 'desc',
                ];
                $query = new WP_Query($args);
                    $i = 0;
                    while ($query->have_posts()): $query->the_post();
                        global $product;
            
                ?>
                    <div class="product">
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
                                        <ul class="prize d-flex">
                                            <!-- <li>$35.00</li> -->
                                            <?php do_action('woocommerce_after_shop_loop_item_title'); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $i++;
                    endwhile; wp_reset_query();
                ?>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="<?php echo get_bloginfo('siteurl'); ?>/shop/" class="visit-shop">Shop full collection</a>
            </div>
        </div>
    </div>
</section>
<!-- Best Sale Area Area -->




<?php get_footer(); ?>