
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'mail/autoload.php';

if(isset($_POST['trimiteMail'])) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use SSL/TLS
        $mail->Host = 'mail.REPLACE.ro';
        $mail->Port = 465;
        $mail->Username = 'test@REPLACE.ro';
        $mail->Password = '';

        // Recipients
        $mail->setFrom('test@REPLACE.ro', 'REPLACE');
        $mail->addAddress($_POST['email'], '');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body = 'This is a test email.';

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}
?>
<html>
    <head>
        
    </head>
    <body>
        <form method="POST">
            <input type="text" name="email" placeholder="email">
            <button type="submit" name="trimiteMail">trimiteMail</button>
        </form>
    </body>
</html>

