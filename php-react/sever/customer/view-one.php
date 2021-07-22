<?php

//importing database file
require 'database.php';

header("Access-Control-Allow-Origin:*");
error_reporting(E_ERROR);

$customer_id=$_GET['customer_id'];

//sql query to fetch data
$sql="SELECT * FROM customer WHERE customer_id=".$customer_id;

if($result = mysqli_query($con,$sql))
{

    $row = mysqli_fetch_assoc($result);
    
        $customer['customer_id'] = $row['customer_id'];
        $customer['customer_name'] = $row['customer_name'];
        $customer['customer_age'] = $row['customer_age'];
        $customer['customer_email'] = $row['customer_email'];
        $customer['customer_gender'] = $row['customer_gender'];
        $customer['customer_dob'] = $row['customer_dob'];
        $customer['customer_address'] = $row['customer_address'];
   
        echo json_encode($customer);
}
else{
    http_response_code(404);
}
?>