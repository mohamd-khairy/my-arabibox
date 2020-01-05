<?php

$parse_uri = explode( 'wp-content', dirname( dirname( __FILE__ ) ) );
require( $parse_uri[0] . '/wp-load.php' );

if(isset($_POST['project'])){
    $array = [
        'post_type' => 'emails',
        'post_title' => $_POST['name'],
        'post_content' => $_POST['overview'],
        'post_status' => 'publish'
    ];

    $new_post_id = wp_insert_post($array);
    update_post_meta( $new_post_id,  'project', $_POST['project'] );
    update_post_meta( $new_post_id,  'request_type', $_POST['info'] );
    update_post_meta( $new_post_id,  'members', $_POST['members'] );
    update_post_meta( $new_post_id,  'monthly_cost', $_POST['monthly_cost'] );

    die();
}
