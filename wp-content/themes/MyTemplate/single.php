<?php  get_header(); ?>

<header class="pt-5 pageHeader">
        <div class="container">
            <a href="<?php echo bloginfo('siteurl'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
            </a>
            <button class="btn btn-primary float-right h-65 lh-50" data-target="#bookYourTeam" data-toggle="modal">
                <?php echo get_field('navbar',8)['right_button_text']; ?>
            </button>
        </div>
    </header>

<main>

        <section class="details pt-5 pb-5 mb-5">
            <div class="container">

                <div class="details-main">
                    <div class="img-block">
                        <div class="img-container">
                            <?php if(get_field('header_image_in_single__page')){
                                $img = get_field('header_image_in_single__page');
                            }else{
                                $img = get_field('img');

                            } ?>
                            <img src="<?php echo $img; ?>" style="width:100%;height:315px" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <ul>
                        <li>
                            <label>CLIENT</label>
                            <h4><?php the_field('client'); ?></h4>
                        </li>
                        <li>
                            <label>SOLUTIONS</label>
                            <h4><?php the_field('solution'); ?></h4>
                        </li>
                        <li>
                            <label>Technologies</label>
                                <?php 
                                    $terms = get_the_terms( get_the_ID(), 'feature_technologies' );

                                    if ( $terms && ! is_wp_error( $terms ) ) :
                                        $types ='';

                                        foreach ( $terms as $term ) { 
                                            $types .= ucfirst($term->name).', ';

                                        }
                                        $typesz = rtrim($types, ', ');
                                    endif;
                                ?>
                                <h4><?php echo $typesz; ?></h4>

                        </li>
                    </ul>
                </div>


                <div class="content-details" data-aos="fade-up" data-aos-duration="500">


                <?php the_field('text'); ?>

                </div>
            </div>
        </section>


        <?php //echo do_shortcode('[INSERT_ELEMENTOR id="255"]'); ?>
        <?php // echo do_shortcode('[su_image_carousel source="media: 118,114,84,77,75"]'); ?>
        <?php
                $my_query = new WP_Query( ['post_type' => 'page'] ); // I used a category id 1 as an example
                // TO SHOW THE PAGE CONTENTS
                while ( $my_query->have_posts() ) : $my_query->the_post(); 
                        the_content();
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
        ?>   

        <section class="details pt-5 pb-5">
            <div class="container">

               
                <div class="content-details" data-aos="fade-up" data-aos-duration="500">

                
                    <?php echo get_field('text',121); ?>

                </div> 


                <div class="contact-us start-project">
                    <div class="wrapper">
                        <h1 data-aos="fade-up" data-aos-duration="500">
                            <?php the_field('title_inside_block',121); ?>
                        </h1>
                        <p data-aos="fade-up" data-aos-duration="500">
                            
                            <?php the_field('content_inside_block',121); ?>
                        </p>

                        <button data-aos="fade-up" data-aos-duration="500" data-target="#bookYourTeam" data-toggle="modal"
                            class="continue-btn btn-arrow btn btn-primary">
                            <span>
                                
                                <?php the_field('button_text_inside_block',121); ?>
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                    </div>
                </div>


            </div>
        </section>

    </main>


    <?php get_footer(); ?>