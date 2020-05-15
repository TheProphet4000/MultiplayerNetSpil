<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\vendor\autoload.php';

$base_url = "localhost/forumLectio/LogInSystem/";

$mail_body = "
<p>Hi ".$_POST['username'].",</p>
<p>Thanks for Registration.</p>
<p>Please Open this link to verified your email address - <a href=".$base_url."email_verification.php?get_activation_code=".$activation_code.">Verify Link</a>
<p>Best Regards,<br />MultiplayerNetSpil.</p>
";

$mail = new PHPMailer(TRUE);
$mail->SMTPDebug = 3;
$mail->IsSMTP();        //Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Gmail
$mail->Port = '587';        //Sets the default SMTP server port
$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'thisemailisforschool420@gmail.com';     //Sets SMTP username
$mail->Password = 'iamapasswordlol420';     //Sets SMTP password
$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
$mail->setFrom('thisemailisforschool420@google.com');
$mail->AddAddress($_POST['email'], $_POST['username']);  //Adds a "To" address   
$mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);       //Sets message type to HTML    
$mail->Subject = 'Email Verification';   //Sets the Subject of the message
$mail->Body = $mail_body;       //An HTML or plain text message body
if($mail->Send())        //Send an Email. Return true on success or false on error
{
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
} 