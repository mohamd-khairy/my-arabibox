<?php
if(isset($_POST['go'])){

$parse_uri = explode( 'wp-content', dirname( dirname( __FILE__ ) ) );
require( $parse_uri[0] . '/wp-load.php' );

    $email_to = get_bloginfo('admin_email');
    $email_subject = 'Pencil Solutions New Request';
    $email_message = "name: ".$_POST['name']." .\n\n"
    ."email: " .$_POST['email']." .\n\n"
    ."message: " . $_POST['message'];
   

    wp_mail($email_to , $email_subject , strip_tags($email_message));
    
    wp_redirect(get_bloginfo('siteurl')."?msg#success");
}
?>
