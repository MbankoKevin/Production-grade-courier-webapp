<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    date_default_timezone_set('Etc/UTC');

    $jkName    = htmlspecialchars(trim($_POST['jkname'] ?? ''));
    $email     = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $tracking  = htmlspecialchars(trim($_POST['tracking'] ?? ''));
    $message   = htmlspecialchars(trim($_POST['gram'] ?? ''));

    if (!$email || empty($jkName) || empty($tracking)) {
        echo "<script>alert('Please fill all required fields.');</script>";
    } else {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'sitestarter2.xyz';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'send@sitestarter2.xyz';
            $mail->Password   = 'Cornellekacy45'; // ⚠️ Move this to .env or secure config in real deployment
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('send@sitestarter2.xyz', 'Happy Tails Movers Inc');
            $mail->addAddress($email, $jkName);
            $mail->addReplyTo('info@happytailsmovers.info', 'Happy Tails');

            $mail->isHTML(true);
            $mail->Subject = 'Cargo Express Inc - Shipment Notification';

            // Embedded images
            $mail->AddEmbeddedImage('bar.png', 'barimg');
            $mail->AddEmbeddedImage('logo.png', 'logoimg');

            // Email Body
            $mail->Body = "
                <img src='cid:logoimg' />
                <h3><strong style='color: #ff9900;'>HELLO</strong> <strong style='text-transform: capitalize; color: #ff9900;'>$jkName</strong></h3>
                <p>$message</p>
                <h3>Tracking No: $tracking</h3>
                <img src='cid:barimg' />
                <br><br>
                <a href='https://cargo-express.online/track.php'>Track your shipment here</a>
                <br><br><br>
                <p style='font-size: 11px;'>This message was processed by Cargo Express Logistics Inc.<br>
                1289 Franklin Street, Greensboro AL, USA<br>
                Contact: info@cargo-express.online</p>
                <p style='font-size: 11px;'>By using our services, you agree to our Privacy Notice and Terms of Use.</p>
                <p style='font-size: 11px;'>This email was sent from a notification-only address. Do not reply.</p>
            ";

            $mail->send();

            echo "<script>alert('Message successfully sent!'); window.location.href = 'mail.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Mailer Error: " . htmlspecialchars($mail->ErrorInfo) . "');</script>";
        }
    }
}
?>
