<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
if (isset($_POST['send'])) {

//capturing sending details:
    $usermail = $_POST['email'];
    $subject = '<strong>Hi there, this is a test mail.</strong>';
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {

        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.googlemail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'makadeaminat@gmail.com';        // SMTP username
        $mail->Password = 'makade93';                    // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('makadeaminat@gmail.com', 'Aminat');
        $mail->addAddress($usermail, 'User');     // Add a recipient

        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                             // Set email format to HTML
        $mail->Subject = 'Test';
        $mail->Body    = $subject;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="#" method="post">
    <label>Email: </label>
    <input type="email" name="email"><br>
    <label>Password: </label>
    <input type="password" name="password"><br>
    <input type="submit" name="send" value="Send Mail">
</form>
</body>
</html>

