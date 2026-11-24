<?php
include 'db.php';


$user = $_POST['user'];
$pass = $_POST['password'];


$query = "SELECT * FROM Admin_login WHERE (username='$user' OR email='$user') AND password='$pass'";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) == 1) {
$_SESSION['user'] = $user;
header("Location: dashboard.php");
} else {
echo "<script>alert('Invalid Login');window.location='login.php';</script>";
}
?>