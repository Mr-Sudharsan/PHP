<?php
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/database.php';

// header("Access-Control-Allow-Origin: *");

if (isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['email']) || isset($_POST['gender'])|| isset($_POST['phone_no']) || isset($_POST['password'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no=$_POST['phone_no'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);
   if(isset($_FILES['uploadimage']))
   {
    $img_name = $_FILES['uploadimage']['name'];
    $tmp_name = $_FILES['uploadimage']['tmp_name'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = 'upload/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);
   }else{
    $new_img_name="";
   }
    $sql = "INSERT INTO user (firstname, lastname, email,phone_no, password, gender, profile_pic)
                 VALUES ('{$firstname}', '{$lastname}', '{$email}','{$phone_no}', '{$password}','{$gender}','{$new_img_name}')";

    if (mysqli_query($con, $sql)) {
        echo "<div class='alert alert-success'>Successfully Add the user</div>";
        http_response_code(201);
    } else {
        http_response_code(422);
    }
}
