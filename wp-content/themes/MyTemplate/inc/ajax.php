<?php

add_action('wp_ajax_nopriv_load_more_post' , 'load_more_post');
add_action('wp_ajax_load_more_post' , 'load_more_post');

function load_more_post()
{

    $paged = $_POST['page']+1;


    $args = [
        'post_type' => 'features',
        'posts_per_page' => 3,
        'paged' => $paged,
        'order' => 'ASC'
    ];

    $query = new WP_Query($args);

    if($query->have_posts()):
        
        while($query->have_posts()): $query->the_post(); 
    
            set_query_var( 'page_num', $paged);
            get_template_part( 'content' );
    
        endwhile; 
        
        wp_reset_query();
    
    endif;

    die();
}