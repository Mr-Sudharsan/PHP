<?php

//importing database file
require 'database.php';

header("Access-Control-Allow-Origin:*");
error_reporting(E_ERROR);
$customer=[];

//sql query to fetch data
$sql="SELECT * FROM customer";

if($result = mysqli_query($con,$sql))
{
    $cr=0;
    while($row = mysqli_fetch_assoc($result))
    {
        $customer[$cr]['customer_id'] = $row['customer_id'];
        $customer[$cr]['customer_name'] = $row['customer_name'];
        $customer[$cr]['customer_age'] = $row['customer_age'];
        $customer[$cr]['customer_email'] = $row['customer_email'];
        $customer[$cr]['customer_gender'] = $row['customer_gender'];
        $customer[$cr]['customer_dob'] = $row['customer_dob'];
        $customer[$cr]['customer_address'] = $row['customer_address'];
        $cr++;
    }   

    echo json_encode($customer);
}
else{
    http_response_code(404);
}
?>