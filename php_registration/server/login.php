<?php
require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/database.php';
if(isset($_POST['email']) ||isset($_POST['password']))
{
    $email=$_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM user WHERE email='{$email}' and password='{$password}'");
    if(mysqli_num_rows($query) > 0)
    {
        $status=1;  
        session_start();
        $_SESSION['email'] = $email;      
        if(isset($_POST['s_cookie'])){                       
            setcookie('email', $email, time()+(365 * 24 * 60), "/");
    }
    }else{
        $status=0;
    }
    $data['status'] = $status;
    echo json_encode($data);
    exit;

}
?>