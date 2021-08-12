<?php
require $_SERVER['DOCUMENT_ROOT'] . '/php_registration/config/baseurl.php';
session_start();
if (isset($_SESSION['email'])) {
    header("Location: welcome.php");
    exit();
}
?>
<html>

<head>
    <title> Login Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap/css/custom.css">
    <script type="text/javascript" src="<?php echo $base_url ?>bootstrap/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../config/logincontroller.js"></script>
    <style>
        .center {
            margin: auto;
            width: 60%;
            border: 3px solid #73AD21;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="center">
                <div class="box">
                    <h4 class="text-center">Login Form</h4>
                    <form id="loginuser" method="post" action='<?php echo $base_url ?>server/login.php' redir='<?php echo $base_url ?>client/welcome.php'>
                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input class="form-control" id="email" name="email" placeholder="Enter your email" type="text" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" placeholder="Enter your password " type="password" required />
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Sign in">
                        </div>
                        <div class="form-group">
						<p>Don't have an account? <a href="<?php echo $base_url ?>client/register_user.php">Register Here</a></p>
					    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>