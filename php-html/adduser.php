<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <h3>Add New User</h3>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label>Name :</label>
                        <input type="text" name="name" id="name" value="" placeholder="enter your name" required class="form-control" autofocus></br>
                        <label>Age :</label>
                        <input type="number" name="age" value="" placeholder="enter your age" required class="form-control"></br>
                        <label>Email :</label>
                        <input type="email" name="email" value="" placeholder="enter your email" required class="form-control"></br>
                        <label>Gender :</label>
                        <input type="radio" name="gender" value="male" class="form-control">Male
                        <input type="radio" name="gender" value="female" class="form-control">Female
                        <input type="radio" name="gender" value="other" class="form-control">Other</br>
                        <label>Date:</label>
                        <input type="date" name="dob" value="" placeholder="enter your dob" required class="form-control"></br>
                        <label>Address :</label>
                        <input type="textarea" name="address" value="" placeholder="enter your address" required class="form-control"></br>
                        <input type="submit" name="addnew" class="btn btn-success" value="Add New">

                    </form>
                </div>
            </div>
        </div>
        <?php
        require 'database.php';

        header("Access-Control-Allow-Origin: *");

        if (isset($_POST['addnew'])) {

            if (empty($_POST['name']) || empty($_POST['age']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['address'])) {
                echo "Please fillout all required fields";
                $url="https://localhost/php-html/viewuser.php";
                echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
            } else {
                $customer_name = $_POST['name'];
                $customer_age = $_POST['age'];
                $customer_email = $_POST['email'];
                $customer_gender = $_POST['gender'];
                $customer_dob = $_POST['dob'];
                $customer_address = $_POST['address'];;

                $sql = "INSERT INTO customer (customer_name, customer_age, customer_email, customer_gender, customer_dob, customer_address)
                 VALUES ('{$customer_name}', '{$customer_age}', '{$customer_email}','{$customer_gender}', '{$customer_dob}', '{$customer_address}')";

                if (mysqli_query($con, $sql)) {
                    echo "<div class='alert alert-success'>Successfully added new user</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
                }
            }
        }
        ?>
    </div>

</body>

</html>