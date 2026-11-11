<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php'; // Include Composer's autoloader

$msg = '';

// Only handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    date_default_timezone_set('Etc/UTC');

    $senderName = htmlspecialchars(trim($_POST['myname'] ?? ''));
    $senderEmail = htmlspecialchars(trim($_POST['myemail'] ?? ''));
    $receiverName = htmlspecialchars(trim($_POST['jkname'] ?? ''));
    $receiverEmail = htmlspecialchars(trim($_POST['email'] ?? ''));
    $tracking = htmlspecialchars(trim($_POST['tracking'] ?? ''));

    if (empty($senderEmail) || empty($receiverEmail) || empty($tracking)) {
        $msg = "Required fields are missing.";
    } else {
        $mail = new PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER'); // or use a config file
            $mail->Password = getenv('SMTP_PASS');
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender
            $mail->setFrom($senderEmail, 'USPC Logistics');
            $mail->addReplyTo($senderEmail, $senderName);

            // Receiver
            $mail->addAddress($receiverEmail, $receiverName);
            $mail->isHTML(false);
            $mail->Subject = 'Your Tracking Number from USPC Logistics';

            // Message
            $mail->Body = <<<EOT
Sender Name: {$senderName}
Sender Email: {$senderEmail}

Receiver Name: {$receiverName}
Receiver Email: {$receiverEmail}

Tracking Number: {$tracking}

Message:
Hello {$receiverName},

If you are receiving this message, it means a shipment was successfully placed in our agency using your details.

Please copy the tracking number above and go to:
https://uspclogistics.net/tracking.php
to track your shipment.

Thank you,
USPC Logistics Team
EOT;

            $mail->send();

            echo "<script>alert('Tracking Number Successfully Mailed To JK.');
            window.location.href = 'mail.php';
            </script>";

        } catch (Exception $e) {
            $msg = "Mailer Error: " . htmlspecialchars($mail->ErrorInfo);
        }
    }
}
?>
