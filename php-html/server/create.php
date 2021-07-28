<?php
        require '../config/database.php';

       // header("Access-Control-Allow-Origin: *");

        // if (isset($_POST['addnew'])) {

            if (empty($_POST['name']) || empty($_POST['age']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['address'])) {
                echo "Please fillout all required fields";
            } else  if (isset($_POST['name']) || isset($_POST['age']) || isset($_POST['email']) || isset($_POST['gender']) || isset($_POST['dob']) || isset($_POST['address']))
               {
                $customer_name = $_POST['name'];
                $customer_age = $_POST['age'];
                $customer_email = $_POST['email'];
                $customer_gender = $_POST['gender'];
                $customer_dob = $_POST['dob'];
                $customer_address = $_POST['address'];           
               
                $sql = "INSERT INTO customer (customer_name, customer_age, customer_email, customer_gender, customer_dob, customer_address)
                 VALUES ('{$customer_name}', '{$customer_age}', '{$customer_email}','{$customer_gender}', '{$customer_dob}', '{$customer_address}')";

                if (mysqli_query($con, $sql)) {
                    echo "<div class='alert alert-success'>Successfully added new user</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
                }
            }
        // }
       // }
