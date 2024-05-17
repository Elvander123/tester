<?php
require 'db.php';
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $token = generateToken();
        $expires_at = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $sql = "UPDATE users SET reset_token=?, reset_token_expiration=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $token, $expires_at, $email);
        $stmt->execute();

        if (sendPasswordReset($email, $token)) {
            echo "Please check your email for a link to reset your password.";
        } else {
            echo "Failed to send reset email.";
        }
    } else {
        echo "No user found with that email address.";
    }
}
?>
