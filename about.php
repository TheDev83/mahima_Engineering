<?php
$title = "About Us";

ob_start();
?>
<h1>About us</h1>
<p>Welcome to Home Page</p>
<?php
$content = ob_get_clean();

include 'base.php';
?>
