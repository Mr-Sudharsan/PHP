<?php
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/baseurl.php';
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/database.php';
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM user WHERE email='{$email}'");
$row = mysqli_fetch_assoc($query);
?>