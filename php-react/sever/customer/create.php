<?php

//importing database file
require 'database.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

    print_r($request);

    $customer_name = $request->customer_name;
    $customer_age = $request->customer_age;
    $customer_email = $request->customer_email;
    $customer_gender = $request->customer_gender;
    $customer_dob = $request->customer_dob;
    $customer_address = $request->customer_address;

    $sql = "INSERT INTO customer (customer_name, customer_age, customer_email, customer_gender, customer_dob, customer_address)
    VALUES ('{$customer_name}', '{$customer_age}', '{$customer_email}','{$customer_gender}', '{$customer_dob}', '{$customer_address}')";

    if(mysqli_query($con,$sql))
    {
        http_response_code(201);
    }
    else{
        http_response_code(422);
    }
}

?>