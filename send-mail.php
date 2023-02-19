<?php
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create instance of PHPMailer
$mail = new PHPMailer();

//Set mailer to use smtp
$mail->isSMTP();

//Define smtp host
$mail->Host = "smtp.gmail.com";

//Enable smtp authentication
$mail->SMTPAuth = true;

//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";

//Port to connect smtp
$mail->Port = "587";

//Set gmail username
$mail->Username = "almerjuneb@gmail.com";

//Set gmail password
$mail->Password = "tibzortzaltphcfk";

//Get form values
$name = $_POST['name'];
$emailS = $_POST['email'];
$message = $_POST['message'];

//Email subject
$mail->Subject = "Email Message";

//Set sender email and name
$mail->setFrom($emailS);

//Enable HTML
$mail->isHTML(true);

//Attachment
//$mail->addAttachment('./assets/images/myprofile.png');

//Set email body
$mail->Body = "Dear Almer June Ba-ad,<br>
<br>You have received a new message from:<br><br>Name: $name
<br>Email: $emailS<br>
<br>Message:<br>$message";


//Add recipient
$mail->addAddress('almerjuneb@gmail.com');

//Finally send email
if ( $mail->send() ) {
    echo "Email Sent..!";
    header('Location: index.html');
} else {
    echo "Message could not be sent. Mailer Error: ";
}
//Closing smtp connection
$mail->smtpClose();
?>
