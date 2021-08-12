<?php
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/baseurl.php';
session_start();
if (!isset($_SESSION['email'])) 
{
    header("Location: index.php");
    exit();
}
?>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap/css/custom.css">

</head>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/server/profile.php';
?>
<body>

    <div class="card">
    <div class="card-body text-center">
    <div style="float:left"><a  href="#" class="btn btn-primary">Edit</a></div>

    <div style="float:right"><a  href="<?php echo $base_url ?>server/logout.php" class="btn btn-primary">Logout</a></div>
    <h2 style="text-align:center">User Profile</h2>
    <img src="<?php echo $base_url ?>server/upload/<?php echo $row['profile_pic'] ?>" onerror="this.src='<?php echo $base_url ?>server/upload/profile.png'" class="img-lg rounded-circle mb-4" width="200" height="250">
        <div class="container-fluid">
            <h4><?php echo $row['firstname']." ".$row['lastname'] ?></h4>
            <p><b>Gender : </b><?php echo $row['gender'] ?></p>
            <p><b>Email : </b><?php echo $row['email'] ?></p>
        </div>
    </div>
</body>
</html>