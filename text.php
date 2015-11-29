<?php
/** Text with PHP: here's how
*	You can use the mail() function:
*	http://php.net/manual/en/function.mail.php
*	http://www.w3schools.com/php/func_mail_mail.asp
*
* Or you can use PHPMailer (include the correct file first)
* Whose github is here:
*	https://github.com/PHPMailer/PHPMailer
*
* Treat text like email
**/

$subject = "Fk u";

$message = "  BITCHHHH!!";

/**
 * Name of the recipient
 * @var string
 */
$name = "A Friend";

/**
 * Address of the recipient (look up the correct company.dom address format for the appropriate carrier)
 * @var string
 * Use an API to determine the correct address format
 */
$address = "7085673467@vtext.com";

/**
 * Make sure to require the PHPMailer code to actually use it
 */
require_once('PHPMailer-master/PHPMailerAutoload.php');

/**
 * Instantiate a new instace of PHPMailer
 * @var PHPMailer
 */
$mail = new PHPMailer;

/**
 * Set some important information for our email; note the method syntax
 * @var string
 */
$mail->From = 'ac447@duke.edu';
$mail->FromName = 'asian';
$mail->Subject = $subject;

$mail->addAddress($address,$name);
$mail->Body = $message;

/**
 * Actually send the email and even check for errors!
 */
if($mail->send()){
  $error = 'Success';
}
else{
  $error = 'There was an error in processing the email.';
}
echo $error."\n";

/**
 * Start using the native mail() function and set the recipient
 * @var string
 
$to = "$name <$address>";

/**
 * These headers specify from
 * @var string
 
$headers = "From: CS190 Class! <robm@cs.duke.edu>\r\n";

/**
 * Send the mail and simultaneously generate errors if it doesn't work
 
if(mail($to, $subject, $message, $headers)){
  $error = 'Success';
}
else{
  $error = 'There was an error in processing the email.';
}
echo $error."\n";
?>*/