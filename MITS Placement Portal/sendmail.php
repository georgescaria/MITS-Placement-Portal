<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



if (isset($_GET['company']))
       {
        $company_name=$_GET['company'];

           }

           if (isset($_GET['emails']))
       {
        $emails = unserialize(rawurldecode($_GET['emails']));


echo "<pre>";
print_r($emails);
echo "</pre>";

           }

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mits.pc123@gmail.com';                     // SMTP username
    $mail->Password   = 'mits1234';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mits.pc123@gmail.com', 'admin@mitsplacementcell');    // Add a recipient


    foreach ($emails as $val){
    $mail->addAddress($val);
}
  //  $mail->addAddress('sdygeorgescaria@gmail.com');               // Name is optional


    // Attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject =  strip_tags($company_name) .' placement drive';
    $mail->Body    = 'Hi,<br> You are eligible to apply for ' . strip_tags($company_name) . ' drive. Log in to <b>http://www.mits.com</b> to apply for the drive.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';

     echo "<script> type='text/javascript'
             window.location = 'adminuser.php';
       </script>";



} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
