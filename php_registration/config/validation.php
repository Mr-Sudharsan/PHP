<?php

 require $_SERVER['DOCUMENT_ROOT'].'/php_registration/config/database.php'; 
 
    $email=$_POST['email'];

    $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
    if(mysqli_num_rows($query) > 0)
    {
        echo 'false';
        
    }else{
        echo 'true';
      
    }  
?>