<?php

if(!isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    } else {
 	// EDIT THE 2 LINES BELOW AS REQUIRED
  $recipients = array(
            'sabry@pencil-designs.com',
            'moneer@pencil-designs.com'
          );
    $email_to = "mohamed.khairy.eg@gmail.com";//implode(',', $recipients);
    $email_subject = 'Pencil Solutions New Request';

 
 
  // if(strlen($error_message) > 0) {
  //   died($error_message);
  // } 

    $email_from = $_POST['email'];
    $name = $_POST['name'];
    $overview = $_POST['overview'];
    // $team = $_POST['team'];
    $project_type = $_POST['project'];
    $monthly_cost = $_POST['monthly_cost'];
    $members = $_POST['members'];

 
    $email_message = "Form details below.\n\n";
    $email_message .= "Full Name: ".clean_string($name)."\n";
    $email_message .= "Email Address: ".clean_string($email_from)."\n";
    $email_message .= "Project Overview: ".clean_string($overview)."\n";
    // $email_message .= "Team Manager: ".clean_string($team)."\n";
    $email_message .= "Product Design Project Type: ".clean_string($project_type)."\n";
    $email_message .= "Total Cost: ".clean_string($monthly_cost)."\n";
    $email_message .= "Requested Team Members: ".clean_string($members)."\n";
 
// create email headers
// $headers = 'From: '.$email_from."\r\n".
// 'Reply-To: '.$email_from."\r\n" .
$headers = 'From: pencil-solutions@pencil.com'."\r\n".
'Reply-To: pencil-solutions@pencil.com'."\r\n" .
'X-Mailer: PHP/' . phpversion();

ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port", 587);
ini_set("sendmail_from","shimoo1281@gmail.com");
ini_set("sendmail_path", 'C:\xampp\sendmail\sendmail.exe -t');
mail($email_to , $email_subject , strip_tags($email_message) , $headers);
 
$message = 'Thank you for contacting us. We will be in touch with you very soon.';
echo $message;
 die;
 
}

 function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die;
       
    }

     function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
?>