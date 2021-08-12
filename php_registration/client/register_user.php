<?php 
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/baseurl.php';
session_start();
if (isset($_SESSION['email'])) 
{
    header("Location: welcome.php");
    exit();
}
?>
<html>
<head>
    <title> Registration Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap/css/custom.css">
    <script type="text/javascript" src="<?php echo $base_url ?>bootstrap/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url ?>bootstrap/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo $base_url ?>config/controller.js">
</script>
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
    <div ><?php require $_SERVER['DOCUMENT_ROOT'].'/php_registration/client/index.php' ?></div>
    <div  class="container ">
        <div class="row">
            <div  class="center">
                <div class="box">
                    <h4 class="text-center">User Registration Form</h4>
                    <form id="registeruser" method="post" action='<?php echo $base_url ?>server/register.php' redir="<?php echo $base_url ?>client/index.php">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input id="firstname" name="firstname" class="form-control" placeholder="First Name" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input id="lastname" name="lastname" class="form-control" placeholder="Last Name" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input class="form-control" id="email" name="email" placeholder="Email-ID" type="text" emailval="<?php echo $base_url ?>config/validation.php"/>
                       </div>
                       <div class="form-group">
                            <label for="phone_no">Mobile No</label>
                            <input class="form-control"  id="phone_no" name="phone_no" placeholder="Mobile No" type="tel" phoneval="<?php echo $base_url ?>config/phonevalidation.php"/>
                       </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" placeholder="Password" type="password" />
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" type="password"/>
                        </div>
                        <div class="form-group">
                            <label>Gender :</label>
                            <label class="form-control">
                                <input type="radio" name="gender" value="Male" checked> Male
                                <input type="radio" name="gender" value="Female"> Female
                                <input type="radio" name="gender" value="Other"> Other
                            </label>
                        </div>
                        <div class="form-group">
                            <label >Profile picture</label>
                            <input class="form-control" id="uploadimage" name="uploadimage" type="file" accept="image/*"/>
                        </div>
                       
                        <input id="submitbtn"  type="submit" class="btn btn-success" value="Sign Up">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>