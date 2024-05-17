<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendPasswordReset($email, $token) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.ac.id';
        $mail->SMTPAuth = true;
        $mail->Username = '20421376_elvander_h.ac.id';
        $mail->Password = 'hnmb wnxa wgzf rgjm';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('no-reply@example.com', 'verifikasi');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body    = 'Click <a href="http://yourdomain.com/templates/reset_password.php?token=' . $token . '">here</a> to reset your password.';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function generateToken() {
    return bin2hex(random_bytes(50));
}
?>
