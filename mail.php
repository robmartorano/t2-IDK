<?php
/** Email with PHP: here's how
*	You can use the mail() function:
*	http://php.net/manual/en/function.mail.php
*	http://www.w3schools.com/php/func_mail_mail.asp
*
* Or you can use PHPMailer (include the correct file first)
* Whose github is here:
*	https://github.com/PHPMailer/PHPMailer
*
*
* Have fun!
**/

/**
 * [$first_name the first name of the person]
 * [$last_name the last name of the person]
 * @var string
 */
$first_name = "fuck";
$last_name = "bitches";

/**
 * [$subject the subject of the email]
 * @var string
 */
$subject = 'Official Email';

/**
 * [$message the message of the email itself, in HTML/CSS markup]
 * @var a long heredoc
 */
$message = <<<END
<html>
<head>
<title>$subject</title>
<style>
body {
  font-family: 'Helvetica Neue','Helvetica',sans;
}
.body_main {
  width: 95%;
  max-width: 800px;
  background-color: #FFFFFF;
  box-shadow: 0px 0px 10px #888888;
}
h1 {
  background-color: #315EB2;
  color: #FFFFFF;
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: center;
  font-weight: 100;
  font-size: 3em;
}
.mail_body {
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 10px;
  padding-bottom: 10px;
  font-size: 1.2em;
  font-weight: 400;
  color: #000000;
}
</style>
</head>

<body>
<div class="body_main">
  <h1>Official Email</h1>
  <div class="mail_body">
    Dear $first_name $last_name,<br />
    <br />
    We are writing to inform you that I feel like talking to you. Thank you for being a customer of us for a while now.<br />
    <br />
    Here is a link to the <a href="http://duke.edu">Duke</a> homepage. Because why not.<br />
    <br />
    Sincerely,<br />
    Whichever Site
  </div>
</div>
</body>

</html>
END;

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
$mail->From = 'qp7@duke.edu';
$mail->FromName = 'MastaPan';
/*
$mail->addAddress("dvd4@duke.edu", "Dev Duke");
$mail->addAddress("d.d@duke.edu", "Dev Duke");*/
$mail->Subject = $subject;
$mail->Body = $message;
$mail->isHTML(true);

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
 */
$to = 'Anderson Chenmeister <ac447@duke.edu>';

/*
Note that the subject was already set way at the top as $subject
 */

/**
 * These headers are important to specify the content type (to be interpreted as HTML)
 * And we need to set the from, reply-to, CC, etc.
 * @var string
 */
$headers = "From: MastaPan <qp7@cs.duke.edu>\r\n";
$headers .= "Reply-To: Dev CS <qp7@cs.duke.edu>\r\n";
/*$headers .= "CC: Dev Duke <d.d@duke.edu>\r\n";*/
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

/**
 * Send the mail and simultaneously generate errors if it doesn't work
 */
if(mail($to, $subject, $message, $headers)){
  $error = 'Success';
}
else{
  $error = 'There was an error in processing the email.';
}
echo $error."\n";
?>
