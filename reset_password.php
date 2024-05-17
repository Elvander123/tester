<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <form method="POST" action="../process_reset_password.php">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="password" name="new_password" placeholder="Enter new password" required><br>
        <button type="submit">Update Password</button>
    </form>
</body>
</html>

