<?php
include 'connection.php';
$to_email = "muhammad.saqlain.0978@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: msaqlain.0978@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>
