<?php

require '../config/database.php';
//header("Access-Control-Allow-Origin: *");

$customer_id=$_REQUEST['customer_id'];
$sql= "DELETE FROM customer WHERE customer_id=".$customer_id;

if(mysqli_query($con,$sql))
    {
        http_response_code(201);
    }
    else{
        http_response_code(422);
    }
