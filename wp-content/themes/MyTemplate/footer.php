        <!-- Footer Area -->
        <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
            <div class="footer-static-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="section__title about_wrapper text-center">
                                <h1>
                                    <span>What the Buzz is about</span>
                                </h1>
                                <p>
                                    <span>Far far away, behind the word mountains, far from the countries Vokalia and
										Consonantia, there live the blind texts</span>
                                </p>
                            </div>
                        </div>

                        <div class="testimonials">
                            <div class="about-slider owl-carousel owl-theme">
                                <div class="about-block">
                                    <p>
                                        “ It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using this. ”
                                    </p>
                                    <h4>Nicholas Davis</h4>
                                    <label>Co-Founder of Company</label>
                                </div>
                                <div class="about-block">
                                    <p>
                                        “ It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using this. ”
                                    </p>
                                    <h4>Nicholas Davis</h4>
                                    <label>Co-Founder of Company</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="copyright__wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer__widget footer__menu d-flex justify-content-between align-items-center">
                                <div class="ft__logo d-flex align-items-end">
                                    <img src="images/rocket.png" alt="">
                                    <img src="images/logo-with-outline.png" alt="">
                                </div>
                                <div class="footer__content">
                                    <ul class="mainmenu">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Learning Tools</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>


                                <div class="footer-social">
                                    <a class="icon icon-facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="icon icon-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="icon icon-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <?php echo do_shortcode('[google-translator]'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </footer>
        <!-- //Footer Area -->
        
    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/active.js"></script>

    <script src="<?php echo plugins_url(); ?>/woocommerce/assets/js/frontend/cart.js"></script>
	<script>
	$(document).ready(function() {

        $('.editMyAccount').click(function() {
            $('.myAccount .input_box input').show();
            $('.myAccount .password ').show();
            $('.myAccount .password input').show();
            $('.myAccount .input_box p').hide();
            $(this).hide();
            $('.saveChanges').show();
        });
        
	});
		</script>
</body>

</html