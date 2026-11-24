<?php
session_start();
include 'db.php';

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin | Mahima Engineerig</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="style/login.css">

</head>

<body>

<div class="login-box">

    <div class="login-icon">
        <img src="../templates/images/mEE.png" alt="">
    </div>

    <div class="login-title">Mahima Engineering</div>

    <form method="POST" action="login_process.php">

        <div class="form-group">
            <i class="fa fa-envelope"></i>
            <input type="text" name="user" class="form-control" placeholder="Email ID" required>
        </div>

        <div class="form-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="login-options">
            <label>
                <input type="checkbox"> Remember me
            </label>
            <!-- <a href="#">Forgot Password?</a> -->
        </div>

        <button class="login-btn">LOGIN</button>

    </form>
</div>

</body>
</html>
